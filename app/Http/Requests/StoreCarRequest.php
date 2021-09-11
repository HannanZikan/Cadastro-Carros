<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCarRequest extends FormRequest
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
            'name' => 'required|max:255',
            'category_id' => 'required|integer',
            'brand_id' => 'required|integer',
            'capacity' => 'required|integer',
            'number_doors' => 'required|integer',
            'engine_type' => 'required|max:255',
        ];
    }
}
