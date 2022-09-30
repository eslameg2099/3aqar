<?php

namespace App\Http\Controllers\Api;

use App\Events\VerificationCreated;
use App\Http\Requests\Api\RegisterRequest;
use App\Http\Requests\Api\RegisterRequestforval;

use Carbon\Carbon;

use App\Models\Customer;
use App\Models\OfficeOwner;
use App\Models\User;
use App\Models\Verification;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class RegisterController extends Controller
{
    use AuthorizesRequests;
    use ValidatesRequests;

    /**
     * Handle a login request to the application.
     *
     * @throws \Illuminate\Validation\ValidationException
     * @throws \Spatie\MediaLibrary\MediaCollections\Exceptions\FileDoesNotExist
     * @throws \Spatie\MediaLibrary\MediaCollections\Exceptions\FileIsTooBig
     *
     * @return \Illuminate\Http\Resources\Json\JsonResource
     */
    public function register(RegisterRequest $request)
    {
        switch ($request->type) {
            case User::OFFICE_OWNER_TYPE:
                $user = $this->createOffice($request);
                break;
            case User::CUSTOMER_TYPE:
            default:
                $user = $this->createCustomer($request);

                break;
        }

        if ($request->hasFile('avatar')) {
            $user->addMediaFromRequest('avatar')
                ->toMediaCollection('avatars');
        }

        event(new Registered($user));

        $this->sendVerificationCode($user);

        return $user->getResource()->additional([
            'token' => $user->createTokenForDevice(
                $request->header('user-agent')
            ),
            'message' => trans('verification.sent'),
        ]);
    }

    public function resgistervaltion(RegisterRequestforval $request)
    {
        return response()->json([
            'message' => "الي الخطوة التالية",
        ]); 
    }

    /**
     * Create new customer to register to the application.
     *
     * @return \App\Models\OfficeOwner
     */
    public function createOffice(RegisterRequest $request)
    {
        DB::beginTransaction();

        $officeOwner = new OfficeOwner();

        $officeOwner->fill($request->allWithHashedPassword())->save();

        $office = $officeOwner->office()->create($request->prefixedWith('office_'));
        $office->active_at =now () ;
        $office->save();
        $office->forceFill([
            'certified_at' => $request->boolean('certified_at'),
            'classified_at' => $request->boolean('classified_at'),
        ]);


        if ($request->hasFile('office_commercial_register')) {
            $office->addMediaFromRequest('office_commercial_register')
                ->toMediaCollection('office_commercial_register');
        }

        if ($request->hasFile('office_logo')) {
            $office->addMediaFromRequest('office_logo')
                ->toMediaCollection('office_logo');
        }

     

        if ($request->hasFile('office_classification_certificate')) {
            $office->addMediaFromRequest('office_classification_certificate')
                ->toMediaCollection('office_classification_certificate');
        }
        DB::commit();

        return $officeOwner;
    }

    /**
     * Create new customer to register to the application.
     *
     * @return \App\Models\Customer
     */
    public function createCustomer(RegisterRequest $request)
    {
        $customer = new Customer();

        $customer
            ->forceFill($request->only('phone', 'type'))
            ->fill($request->allWithHashedPassword())
            ->save();

        return $customer;
    }

    /**
     * Send the phone number verification code.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function sendVerificationCode(User $user): void
    {
        if (! $user || $user->phone_verified_at) {
            throw ValidationException::withMessages(['phone' => [trans('verification.verified')]]);
        }

        $verification = Verification::updateOrCreate([
            'user_id' => $user->id,
            'phone' => $user->phone,
        ], [
            'code' => rand(1111, 9999),
        ]);

        event(new VerificationCreated($verification));
        $details = [
            'title' => 'khabir ACTIVE CODE',
            'body' => 'your code '.$verification->code ,
            'data'=> $user->name,
            'end'=> 'is approve',
            'user' => $user->name,
        ];
         $sender = 'KhabirApp';
        $username = '966507212222';
        $password = '0507212222';

        $response = Http::get('https://www.hisms.ws/api.php', $data = [
            'send_sms' => '',
            'username' => $username,
            'password' => $password,
            'numbers' => $user->phone,
            'sender' => $sender,
          'message' => "كود اعادة التفغيل" .     $verification->code,

        ]);
      //  \Mail::to($user->email)->send(new \App\Mail\email($details));
        event(new VerificationCreated($verification));
    }
}
