<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductFormRequest extends FormRequest
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
        $rules = [
            'category_id' => 'required|numeric',
            //'code' => 'required|numeric',
            'name' => 'required',
        ];

        
        $custom = ['main_image' => 'required' , 'main_image.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:10000'];

        if ($this->method() == "POST") { $rules['main_image'] = 'required'; $rules['main_image.*'] = 'image|mimes:jpeg,png,jpg,gif,svg|max:10000'; }
    
        return $rules;
    }
}
