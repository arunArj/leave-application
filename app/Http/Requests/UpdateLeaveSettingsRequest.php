<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateLeaveSettingsRequest extends FormRequest
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
            'days_limit' => ['required',' numeric'],
            'days_gap' => ['required',' numeric'],
            'casual_per_month' => ['required',' numeric'],
            'sick_per_month' => ['required',' numeric'],
            'max_maternity' => ['required',' numeric'],
            'max_paternity' => ['required',' numeric'],
            'max_bereavement' => ['required',' numeric'],
            'max_other_leave' => ['required',' numeric'],
            'carry_forward_per_year' => ['required',' numeric']
        ];
    }
    protected function prepareForValidation()
    {
        $this->merge([
            'days_limit' => $this->daysLimit,
            'days_gap' => $this->daysGap,
            'casual_per_month' => $this->casual,
            'sick_per_month' => $this->sickLeaves,
            'max_maternity' => $this->maternity,
            'max_paternity' => $this->paternity,
            'max_bereavement' => $this->breaverment,
            'max_other_leave' => $this->otherLeave,
            'carry_forward_per_year' => $this->carryPerYear,

        ]);
    }
}
