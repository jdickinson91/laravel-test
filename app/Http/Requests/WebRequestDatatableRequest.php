<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WebRequestDatatableRequest extends FormRequest {
    /**
     * TODO - Implement authorisation logic here
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            'offset'           => 'nullable|integer',
            'limit'            => 'nullable|integer',
            'sort_col'         => 'nullable|string',
            'sort_dir'         => 'nullable|string',
            'response_type_id' => 'nullable|integer|exists:response_types,id',
            'country_id'       => 'nullable|integer|exists:countries,id'
        ];
    }
}
