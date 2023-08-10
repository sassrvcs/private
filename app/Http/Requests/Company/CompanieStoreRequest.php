<?php

namespace App\Http\Requests\Company;

use Illuminate\Foundation\Http\FormRequest;

class CompanieStoreRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'companie_name' => ['required'],
            'companie_type' => ['required'],
            'sic_name'      => ['required'],
            'sic_code'      => ['required'],
            'section_name'  => ['required'],
            'step_name'     => ['required'],
            'order_id'      => ['required'],
            'jurisdiction_id'=> ['required']
        ];
    }
}
