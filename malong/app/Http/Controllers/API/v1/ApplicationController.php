<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Controllers\API\BaseController;
use Illuminate\Http\Request;
use App\Http\Requests\Job\ApplicationJobRequest;
use App\Services\Application\IApplicationService;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;

class ApplicationController extends BaseController
{
    private $application;

    public function __construct(IApplicationService $application)
    {
        $this->application = $application;
    }
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(ApplicationJobRequest $request) : JsonResponse
    {
        if ($this->application->submitJobApplication($request->validated())) {
            return $this->handleResponse("", "Job application was successfully", Response::HTTP_OK);
        }

        return $this->handleError("you have applied for this Job. Application can be done once", "", Response::HTTP_BAD_REQUEST);
    }
}
