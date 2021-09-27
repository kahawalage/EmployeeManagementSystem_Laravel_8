<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeStoreRequest extends FormRequest
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
            'last_name' => ['required'],
            'first_name' => ['required'],
            'middle_name' => ['required'],
            'address' => ['required'],
            'department_id' => ['required'],
            'country_id' => ['required'],
            'state_id' => ['required'],
            'city_id' => ['required'],
            'zip_code' => ['required'],
            'birthday' => ['required'],
            'date_hired' => ['required']
        ];
    }
}
