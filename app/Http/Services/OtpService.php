<?php

namespace App\Http\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class OtpService
{
    public static function send($payload)
    {
        try {
            Log::info('recieved payload to send otp code', [$payload]);
            $payload = (object) $payload;
            $response =
            Http::withHeaders([
                'api-key' => env('ARKISEL_SMS_KEY'),
            ])->post(env('ARKISEL_SMS_GENERATE'), [
                'expiry' => 5,
                'length' => 6,
                'medium' => 'sms',
                'message' => $payload->message,
                'number' => $payload->number,
                'type' => 'numeric',
                'sender_id' => env('APP_NAME'),
            ]);

            if (!$response->successful()) {
                Log::info('error sending otp', [$response]);

                return false;
            }

            Log::info('otp sent successfully', [$response]);

            return $response['code'] == 1000;
        } catch (\Exception $exception) {
            report($exception);

            return false;
        }
    }

    public static function confirm($payload)
    {
        try {
            Log::info('recieved payload to confirm otp code', [$payload]);

            $payload = (object) $payload;

            $response =
            Http::withHeaders([
                'api-key' => env('ARKISEL_SMS_KEY'),
            ])->post(env('ARKISEL_SMS_CONFIRM'), [
                'code' => $payload->code,
                'number' => $payload->number,
            ]);

            if (!$response->successful()) {
                Log::info('invalid or expired otp code', [$response]);

                return false;
            }

            Log::info('otp verified successfully', [$response]);

            return $response['code'] == 1100;
        } catch (\Exception $exception) {
            report($exception);

            return false;
        }
    }
}
