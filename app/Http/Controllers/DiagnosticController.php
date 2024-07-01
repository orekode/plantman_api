<?php

namespace App\Http\Controllers;

use App\Http\Actions\Diagnosis\GetDiagnosis;
use App\Http\Actions\Diagnosis\GetDiagnoses;
use App\Http\Actions\Diagnosis\GetImage;
use App\Http\Requests\GetDiagnosisRequest;
use App\Http\Requests\GetDiagnosesRequest;
use App\Http\Requests\GetImageRequest;

class DiagnosticController extends Controller
{
    public function diagnose(GetImage $action, GetImageRequest $request)
    {
        return $action->handle($request);
    }

    public function getDiagnosis(GetDiagnosis $action, GetDiagnosisRequest $request)
    {
        return $action->handle($request);
    }
    public function getDiagnoses(GetDiagnoses $action, GetDiagnosesRequest $request)
    {
        return $action->handle($request);
    }
}
