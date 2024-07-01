<?php

namespace App\Http\Actions\Auth;

use App\Http\Requests\ConfirmOtpRequest;
use App\Http\Services\OtpService;
use Illuminate\Support\Facades\Log;

class ConfirmOtp
{
    public function handle(ConfirmOtpRequest $request)
    {
        try {
            Log::info('recieved request to confirm otp', [$request]);

            if (!OtpService::confirm([
                'code' => $request->otp,
                'number' => $request->number,
            ])) {
                Log::info('unable to confim otp', [$request]);

                return errorResponse(message: 'Invalid or Expired OTP');
            }

            Log::info('otp confimred', [$request]);

            return successResponse(message: 'Otp Verification Succesful');
        } catch (\Exception $exception) {
            report($exception);

            return errorResponse(message: 'Invalid or Expired OTP');
        }
    }

    public function generateOtp()
    {
        return sprintf('%04d', random_int(0, 9999));
    }
}
