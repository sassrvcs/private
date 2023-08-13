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
            'sic_name'      => ['sometimes'],
            'sic_code'      => ['sometimes'],
            'section_name'  => ['sometimes'],
            'step_name'     => ['sometimes'],
            'order_id'      => ['sometimes'],
            'order'         => ['sometimes'],
            'jurisdiction_id'       => ['sometimes'],
            'is_sensetibe'          => ['sometimes'],
            'c_availablity'         => ['sometimes'],
            'sesitive_documents'    => ['sometimes'],
            'same_as_name_documents'=> ['sometimes'],
        ];
    }
}
