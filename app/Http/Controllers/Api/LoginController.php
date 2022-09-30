<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Api\LoginRequest;
use App\Http\Requests\Api\PasswordLessLoginRequest;
use App\Models\User;
use App\Support\FirebaseToken;
use Illuminate\Auth\Events\Login;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Pusher\PushNotifications\PushNotifications;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    use AuthorizesRequests;
    use ValidatesRequests;

    /**
     * @var \App\Support\FirebaseToken
     */
    private $firebaseToken;

    /**
     * LoginController constructor.
     */
    public function __construct(FirebaseToken $firebaseToken)
    {
        $this->firebaseToken = $firebaseToken;
    }

    /**
     * Handle a login request to the application.
     *
     * @throws \Illuminate\Validation\ValidationException
     *
     * @return \Illuminate\Http\Resources\Json\JsonResource
     */
    public function login(LoginRequest $request)
    {
        $user = User::wherein('type',["office_owner","customer"])->where(function (Builder $query) use ($request) {
            $query->where('email', $request->username);
            $query->orWhere('phone', $request->username);
        })
            ->first();

        if (! $user || ! Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages(['username' => [trans('auth.failed')]]);
        }

        event(new Login('sanctum', $user, false));

        return $user->getResource()->additional([
            'token' => $user->createTokenForDevice(
                $request->header('user-agent')
            ),
        ]);
    }

    public function getPusherNotificationToken(Request $request)
    {
        $config = config('services.pusher');
        $beamsClient = new PushNotifications([
            'instanceId' => $config['beams_instance_id'],
            'secretKey' => $config['beams_secret_key'],
        ]);
        $token = $beamsClient->generateToken((string)auth()->id());
        return response()->json($token);
    }

    /**
     * Handle a login request to the application using firebase.
     *
     * @throws \Illuminate\Auth\AuthenticationException
     *
     * @return \Illuminate\Http\Resources\Json\JsonResource
     */
    public function firebase(PasswordLessLoginRequest $request)
    {
        $verifier = $this->firebaseToken->accessToken($request->access_token);

        $phone = $verifier->getPhoneNumber();

        $email = $verifier->getEmail();
        $name = $verifier->getName();

        $firebaseId = $verifier->getFirebaseId();

        $userQuery = User::where(compact('phone'))
            ->orWhere(compact('email'))
            ->orWhere('firebase_id', $firebaseId);

        if ($userQuery->exists()) {
            $user = $userQuery->first();
        } else {
            $user = User::forceCreate([
                'firebase_id' => $firebaseId,
                'name' => $name ?: 'Anonymous User',
                'email' => $email,
                'phone' => $phone,
                'phone_verified_at' => $phone ? now() : null,
                'email_verified_at' => $email ? now() : null,
            ]);
        }

        event(new Login('sanctum', $user, false));

        return $user->getResource()->additional([
            'token' => $user->createTokenForDevice(
                $request->header('user-agent')
            ),
        ]);
    }
}
