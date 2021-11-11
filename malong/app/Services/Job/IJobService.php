<?php
namespace App\Services\Job;

interface IJobService 
{
    public function createJob($data);

    public function getAllJob();

    public function updateJobById(array $data, int $id);

    public function getJobById(int $id);

    public function deleteJobById(int $id);
}