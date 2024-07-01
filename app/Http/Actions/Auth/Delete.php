<?php

namespace App\Http\Actions\Auth;

use App\Http\Requests\DeleteRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class Delete
{
    public function handle(DeleteRequest $request)
    {
        try {
            Log::info('recieved request to delete', [$request]);
            
            DB::table($request->target)->where('id', $request->id)->delete();

            Log::info('delete successful', [$request]);

            return successResponse();
        } catch (\Exception $exception) {
            report($exception);

            return errorResponse();
        }
    }
}
