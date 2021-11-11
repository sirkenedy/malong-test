<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Controllers\API\BaseController;
use App\Models\Job;
use Illuminate\Http\Request;
use App\Services\Job\IJobService;
use App\Http\Resources\Job\JobCollection;
use App\Http\Resources\Job\Job as JobResource;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\Job\StoreJobRequest;
use App\Http\Requests\Job\UpdateJobRequest;

class JobController extends BaseController
{
    private $post;

    public function __construct(IJobService $job)
    {
        $this->middleware('auth:sanctum', ['except' => ['index','show','searchJob','applyJob']]);
        $this->job = $job;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() : JsonResponse
    {
        return $this->handleResponse(new JobCollection($this->job->getAllJob()), "", Response::HTTP_OK);
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreJobRequest $request) : JsonResponse
    {
        return $this->handleResponse(new JobResource($this->job->createJob($request->validated())), "Job saved successfully", Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function show(int $job) : JsonResponse
    {
        return $this->handleResponse(new JobResource($this->job->getJobById($job)), "", Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateJobRequest $request, int $job) : JsonResponse
    {
        return $this->handleResponse(new JobResource($this->job->updateJobById($request->validated(), $job)), "Job updated successfully", Response::HTTP_OK);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $job) : JsonResponse
    {
        $this->job->deleteJobById($job);
        return $this->handleResponse([], "Job deleted successfully", Response::HTTP_OK);
        
    }

    public function searchJob(Request $request) : JsonResponse
    {
        if ($data = $this->job->filterJobsByQuery($request->all())) {
            return $this->handleResponse(new JobCollection($data), "", Response::HTTP_OK);
        }
        return $this->handleError("Enter Job title / keyword most likely to appear in job description", [], Response::HTTP_BAD_REQUEST);
    }
}
