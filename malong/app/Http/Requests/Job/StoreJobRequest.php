<?php

namespace App\Http\Requests\Job;

use Illuminate\Foundation\Http\FormRequest;

class StoreJobRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth('sanctum')->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "job_title" => "bail|required|string",
            "job_description" => "required|string",
            "type_id" => "required|exists:types,id",
            "category_id" => "required|exists:categories,id",
            "condition_id" => "required|exists:conditions,id",
            "user_id" => "required"
        ];
    }

    public function messages()
    {
        return [
            "job_title.required" => "Job title/position field cannot be empty.",
            "job_description.required" => 'Enter job description',
            "type_id.required" => 'Select job type',
            "type_id.exists" => 'Invalid job type selected',
            "category_id.required" => 'Select job category',
            "category_id.exists" => 'Invalid job category selected',
            "condition_id.required" => 'Select job condition',
            "condition_id.exists" => 'Invalid job condition selected',
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            "user_id" => auth('sanctum')->user()->id,
        ]);
    }
}
