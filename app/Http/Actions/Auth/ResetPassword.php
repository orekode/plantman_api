<?php

namespace App\Http\Actions\Auth;

use App\Http\Requests\ResetPasswordRequest;
use App\Http\Services\OtpService;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class ResetPassword
{
    public function handle(ResetPasswordRequest $request)
    {
        try {
            Log::info('recieved request to reset password', [$request]);

            $user = User::where("number", $request->number)->first();
            $user->update([
                "password" => Hash::make($request->password)
            ]);

            Log::info('password reset successful', [$request]);

            return successResponse(message: 'Password Reset Successful');
        } catch (\Exception $exception) {
            report($exception);

            return errorResponse(message: 'Unable to reset your password at this time, please try again later');
        }
    }

    public function generateOtp()
    {
        return sprintf('%04d', random_int(0, 9999));
    }
}
