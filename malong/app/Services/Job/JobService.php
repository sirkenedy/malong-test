<?php
namespace App\Services\Job;

use App\Repositories\Eloquent\Job\JobRepositoryInterface;
use App\Services\Job\IJobService;

class JobService implements IJobService
{

    protected $jobRepository;

    public function __construct(JobRepositoryInterface $jobRepository)
    {
        $this->jobRepository = $jobRepository;
    }

    public function createJob($data)
    {
        return $this->jobRepository->create($data);
    }

    public function getAllJob()
    {
        return $this->jobRepository->fetchAll();
    }

    public function updateJobById(array $data, int $id)
    {
        return $this->jobRepository->updateById($data, $id);
    }

    public function getJobById(int $id)
    {
        return $this->jobRepository->findById($id);
    }

    public function deleteJobById(int $id)
    {
        return $this->jobRepository->delete($id);
    }

    public function filterJobsByQuery($data)
    {
        if (array_key_exists('job_title', $data) && $data['job_title']) {
            return $this->jobRepository->searchJobs($data);
        }
        return false;
    }
}