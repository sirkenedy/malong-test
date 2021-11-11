<?php

namespace App\Http\Resources\Job;

use Illuminate\Http\Resources\Json\JsonResource;

class Job extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            "id" => $this->id,
            "job_title" => $this->job_title,
            "job_description" => $this->job_description,
            "type" => [
                "id" => $this->type->id,
                "name" => $this->type->name,
            ],
            "category" => [
                "id" => $this->category->id,
                "name" => $this->category->name,
            ],
            "condition" => [
                "id" => $this->condition->id,
                "name" => $this->condition->name,
            ],
        ];
    }
}
