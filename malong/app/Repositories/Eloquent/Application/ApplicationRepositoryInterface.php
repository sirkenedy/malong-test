<?php

namespace App\Repositories\Eloquent\Application;

interface ApplicationRepositoryInterface 
{
    public function applicationExists(array $data);
}