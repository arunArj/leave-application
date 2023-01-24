<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDepartmentsRequest extends FormRequest
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
            'department' => ['required','min:3'],
            'reporting_emails' => ['array'],
            'reporting_emails.*' => ['required','email'],

        ];
    }
    protected function prepareForValidation()
    {
        $this->merge(['reporting_emails' => explode(",",rtrim($this->reporting_emails,","))]);
    }

    public function messages()
    {
        return [

            'reporting_emails.*.email'  => 'Enter valid email ids',
            'reporting_emails.0.required'  => 'please enter atleast one email id',
        ];
    }
}
