<?php

namespace App\Http\Actions\Diagnosis;

use App\Http\Requests\GetImageRequest;
use App\Http\Resources\DiagnosisResource;
use App\Models\Diagnosis;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class GetImage
{
    public function handle(GetImageRequest $request)
    {
        try {
            Log::info('Received request to diagnose a plant', [$request]);
            $path = $request->image->store('images/diagnosis');
            
            // Prepare the image for the request
            $imagePath = storage_path( 'app/' . $path);
            // $image = fopen($imagePath, 'r');
    
            // Make the request to the external API
            $response = Http::attach(
                'image', file_get_contents($imagePath), $request->image->getClientOriginalName()
            )->post('https://habi.fly.dev/model/submit/');

            Log::error("resopnse from model api", [$response]);
    
            if ($response->successful()) {
                $diagnosisData = $response->json();
    
                $diagnosis = Diagnosis::create([
                    'user_id'           => Auth::user()->id,
                    'image'             => $path,
                    'title'             => $diagnosisData['title'],
                    'content'           => $diagnosisData['description'],
                    'prevention'        => $diagnosisData['prevent'] ?? null,
                    'suppliment_name'   => $diagnosisData['supplement_name'] ?? null,
                    'suppliment_image'  => $diagnosisData['supplement_image_url'] ?? null,
                    'buy_link'          => $diagnosisData['buy_link'] ?? null,
                ]);
    
                return successResponse(data: new DiagnosisResource($diagnosis));
            } else {
                return errorResponse($response->body());
            }
        } catch (\Exception $exception) {
            report($exception);
            return errorResponse($exception->getMessage());
        }
    }
    
}
