<?php

namespace App\Http\Actions\Auth;

use App\Http\Requests\CreateUserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Log;

class CreateUser
{
    public function handle(CreateUserRequest $request)
    {
        try {
            $request_data = $request->only([
                'firstName',
                'lastName',
                'location',
                'number',
            ]);

            Log::info('Recieved request to create user', [$request_data]);

            $data = (object) $request->only([
                'firstName',
                'lastName',
                'location',
                'number',
                'password',
            ]);

            $user = User::create([
                'first_name' => $data->firstName,
                'last_name' => $data->lastName,
                'location' => $data->location,
                'number' => $data->number,
                'password' => bcrypt($data->password),
            ]);

            Log::info('User Created Successfully', [$request_data]);

            return successResponse(others: [
                'token' => $user->createToken('auth_token')->plainTextToken,
            ]);
        } catch (\Exception $exception) {
            report($exception);

            return errorResponse();
        }
    }
}
