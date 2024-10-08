<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JobRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required',
            'description' => 'required',
            'category_id'=> 'required',
            'country_id'=> 'required',
            'city_id'=> 'required',
            'position_level'=> 'required',
            'job_type'=> 'required',
            'salary_range'=> 'required',
            'valid_till'=> 'required'
        ];
    }
}
