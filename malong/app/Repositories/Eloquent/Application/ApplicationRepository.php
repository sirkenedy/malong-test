<?php

namespace App\Repositories\Eloquent\Application;

use Illuminate\Database\Eloquent\Model;
use App\Repositories\Eloquent\Application\ApplicationRepositoryInterface as IApplicationRepository;
use App\Repositories\Eloquent\ReadWriteModifyRepository;
use App\Models\Application;

class ApplicationRepository extends ReadWriteModifyRepository  implements IApplicationRepository
{
    /**      
     * @var Model      
     */     
    protected $model;       

    /**      
     * ApplicationRepository constructor.      
     *      
     * @param Model $model      
     */     
    public function __construct(Application $model)     
    {         
        $this->model = $model;
    }

    public function applicationExists($data)
    {
        if ($this->model->where('email', $data['email'])->where('job_id', $data['job_id'])->first()) {
            return true;
        }
        return false;
    }

}