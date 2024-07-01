<?php

function successResponse($data = [], $message = 'Request Proccessed Successfull', $others = [])
{
    return response()->json([
        'status' => true,
        'data' => $data,
        'message' => $message,
        ...$others,
    ]);
}

function errorResponse($errors = [], $message = 'An Unexpected Error Occured', $others = [], $code = 500)
{
    return response()->json([
        'status' => false,
        'errors' => $errors,
        'message' => $message,
        ...$others,
    ], $code);
}
