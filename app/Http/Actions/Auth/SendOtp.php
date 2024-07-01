<?php

namespace App\Http\Actions\Auth;

use App\Http\Requests\SendOtpRequest;
use App\Http\Services\OtpService;

class SendOtp
{
    public function handle(SendOtpRequest $request)
    {
        try {
            if (!OtpService::send([
                'message' => 'This is your OTP (one time password) from Habi: %otp_code%. This code would expire in %expiry% minutes',
                'number' => $request->number,
            ])) {
                return errorResponse(message: 'Error sending Otp');
            }

            return successResponse();
        } catch (\Exception $exception) {
            report($exception);

            return errorResponse();
        }
    }

    public function generateOtp()
    {
        return sprintf('%04d', random_int(0, 9999));
    }
}
