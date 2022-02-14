<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'name' => 'nullable|max:128',
            'breed' => 'nullable|max:128',
            'description' => 'nullable|max:1000',
            'location_lat' => 'nullable|max:128',
            'location_lon' => 'nullable|max:128',
            'birthdate' => 'required',
        ];
    }
}
