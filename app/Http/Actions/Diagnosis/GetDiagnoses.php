<?php

namespace App\Http\Actions\Diagnosis;

use App\Http\Requests\GetDiagnosesRequest;
use App\Http\Resources\DiagnosisResource;
use App\Models\Diagnosis;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class GetDiagnoses
{
    public function handle(GetDiagnosesRequest $request)
    {
        try {
            Log::info('Received request to retrieve diagnoses', [$request]);
    
            return successResponse(data: DiagnosisResource::collection( Diagnosis::where("user_id", Auth::user()->id)->orderBy('created_at', 'desc')->paginate()) );
            
        } catch (\Exception $exception) {
            report($exception);
            return errorResponse($exception->getMessage());
        }
    }
    
}
