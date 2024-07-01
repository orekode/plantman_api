<?php

namespace App\Http\Controllers;

use App\Http\Actions\Auth\ConfirmOtp;
use App\Http\Actions\Auth\CreateUser;
use App\Http\Actions\Auth\Delete;
use App\Http\Actions\Auth\SendOtp;
use App\Http\Actions\Auth\Signin;
use App\Http\Requests\ConfirmOtpRequest;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\DeleteRequest;
use App\Http\Requests\SendOtpRequest;
use App\Http\Requests\SigninRequest;

class AuthController extends Controller
{
    public function signUp(CreateUser $action, CreateUserRequest $request)
    {
        return $action->handle($request);
    }

    public function signIn(Signin $action, SigninRequest $request)
    {
        return $action->handle($request);
    }

    public function sendOtp(SendOtp $action, SendOtpRequest $request)
    {
        return $action->handle($request);
    }

    public function confirmOtp(ConfirmOtp $action, ConfirmOtpRequest $request)
    {
        return $action->handle($request);
    }

    public function delete(Delete $action, DeleteRequest $request) {
        return $action->handle($request);
    }
}
