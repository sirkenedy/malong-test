<?php

namespace App\Http\Requests\Job;

use Illuminate\Foundation\Http\FormRequest;

class ApplicationJobRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "name" => "bail|required|string",
            "email" => "required|email|unique:users,email",
            "resume" => "required|file|max:1024|mimes:docx,pdf,",
            "job_id" => "required|exists:jobs,id",
        ];
    }

    public function messages()
    {
        return [
            "name.required" => "Job title/position field cannot be empty.",
            "email.required" => 'Email field cannot be empty',
            "email.unique" => 'A business email can\'t be used to apply for jobs',
            "email.email" => 'Enter a valid email',
            "resume.required" => 'upload your resume',
            "resume.file" => 'Invalid file format supplied for resume',
            "resume.mimes" => 'Invalid resume format uploaded. the supported format are jpg, png, bmp and jpeg',
            "job_id.required" => 'Missing job information/id',
            "job_id.exists" => 'This job must have been deleted by business owner',
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            //
        ]);
    }
}
