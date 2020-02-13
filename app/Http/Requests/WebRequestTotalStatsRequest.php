<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WebRequestTotalStatsRequest extends FormRequest
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
            'response_type_id' => 'nullable|integer|exists:response_types,id',
            'country_id'       => 'nullable|integer|exists:countries,id'
        ];
    }
}
