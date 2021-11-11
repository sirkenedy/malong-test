<?php

namespace App\Repositories\Eloquent\Job;

use Illuminate\Database\Eloquent\Model;
use App\Repositories\Eloquent\Job\JobRepositoryInterface as IJobRepository;
use App\Repositories\Eloquent\ReadWriteModifyRepository;
use App\Models\Job;

class JobRepository extends ReadWriteModifyRepository  implements IJobRepository
{
    /**      
     * @var Model      
     */     
    protected $model;       

    /**      
     * JobRepository constructor.      
     *      
     * @param Model $model      
     */     
    public function __construct(Job $model)     
    {         
        $this->model = $model;
    }
}