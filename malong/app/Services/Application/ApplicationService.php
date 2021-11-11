<?php
namespace App\Services\Application;

use App\Repositories\Eloquent\Application\ApplicationRepositoryInterface;
use App\Services\Application\IApplicationService;
use App\Traits\ImageTrait;

class ApplicationService implements IApplicationService
{
    use ImageTrait;

    protected $applicationRepository;

    public function __construct(ApplicationRepositoryInterface $applicationRepository)
    {
        $this->applicationRepository = $applicationRepository;
    }

    public function submitJobApplication($data)
    {
        if (!($this->applicationRepository->applicationExists($data))) {
            if (array_key_exists('resume', $data)) {
                $data = $this->imageUploadS3($data, 'Resume/');
            }
            return $this->applicationRepository->create($data);
        }
        return false;
    }
}