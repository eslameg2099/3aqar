<?php

namespace App\Http\Controllers\Api;
use App\Models\User;

use App\Events\VerificationCreated;
use App\Http\Controllers\Controller;
use App\Models\Verification;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class VerificationController extends Controller
{
    use ValidatesRequests;

    /**
     * Send or resend the verification code.
     *
     * @throws \Illuminate\Validation\ValidationException
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function send(Request $request)
    {
        $this->validate($request, [
            'phone' => ['required', 'unique:users,phone,'.auth()->id()],
        ], [], trans('verification.attributes'));

        $user = auth()->user();

        $verification = Verification::updateOrCreate([
            'user_id' => $user->id,
        ], [
            'phone' => $request->phone,
            'code' => rand(1111, 9999),
        ]);

        event(new VerificationCreated($verification));

        return response()->json([
            'message' => trans('verification.sent'),
        ]);
    }

    /**
     * Verify the user's phone number.
     *
     * @throws \Illuminate\Validation\ValidationException
     *
     * @return \Illuminate\Http\Resources\Json\JsonResource
     */
    public function verify(Request $request)
    {
        $this->validate($request, [
            'code' => 'required',
        ], [], trans('verification.attributes'));

        $verification = Verification::where([
            'user_id' => auth()->id(),
            'code' => $request->code,
        ])->first();

        if (! $verification || $verification->isExpired()) {
            throw ValidationException::withMessages(['code' => [trans('verification.invalid')]]);
        }

        $verification->user->forceFill([
            'phone' => $verification->phone,
            'phone_verified_at' => now(),
        ])->save();
      
        $verification->delete();
        $user = User::findorfail(auth()->id());
        $user->phone_verified_at = now();
        $user->save();
        return  $user->refresh()->getResource();
    }

    /**
     * Check if the password of the authenticated user is correct.
     *
     * @throws \Illuminate\Validation\ValidationException
     *
     * @return \Illuminate\Http\Resources\Json\JsonResource
     */
    public function password(Request $request)
    {
        $request->validate([
            'password' => 'required',
        ], [], trans('auth.attributes'));

        if (! Hash::check($request->password, $request->user()->password)) {
            throw ValidationException::withMessages(['password' => [trans('auth.password')]]);
        }

        return $request->user()->getResource();
    }
}
