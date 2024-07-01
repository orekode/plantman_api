<?php

namespace App\Http\Actions\Auth;

use App\Http\Requests\SigninRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class Signin
{
    public function handle(SigninRequest $request)
    {
        try {
            $request_data = $request->only([
                'firstName',
                'lastName',
                'location',
                'number',
            ]);
            Log::info('Recieved request to sign in', [$request_data]);

            $user = User::where('number', $request->number)->first();

            if (!$user) {
                Log::info('User has not been registered on sign in', [$request_data]);

                return successResponse();
            }

            if (!Auth::guard('web')->attempt([
                'number' => $request->number,
                'password' => $request->password,
            ])) {
                Log::info('Invalid Credentials on sign in', [$request_data]);

                return errorResponse(code: 401);
            }

            Log::info('Sign in Successful', [$request_data]);

            return successResponse(data: [
                'firstName' => $user->first_name,
                'lastName' => $user->last_name,
                'location' => $user->location,
            ], others: [
                'token' => $user->createToken('auth_user')->plainTextToken,
            ]);
        } catch (\Exception $exception) {
            report($exception);

            return errorResponse();
        }
    }
}
