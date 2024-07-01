<?php

namespace App\Http\Actions\Diagnosis;

use App\Http\Requests\GetDiagnosisRequest;
use App\Http\Resources\DiagnosisResource;
use App\Models\Diagnosis;
use Illuminate\Support\Facades\Log;

class GetDiagnosis
{
    public function handle(GetDiagnosisRequest $request)
    {
        try {
            Log::info('Received request to retrieve a diagnosis', [$request]);
    
    
            return successResponse(data: new DiagnosisResource( Diagnosis::find($request->id)));
            
        } catch (\Exception $exception) {
            report($exception);
            return errorResponse($exception->getMessage());
        }
    }
    
}
