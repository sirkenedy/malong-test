<?php

namespace App\Repositories\Eloquent\Job;

interface JobRepositoryInterface 
{
    public function searchJobs(array $data);
}