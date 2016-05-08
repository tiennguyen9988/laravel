<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ProductRequest extends Request
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
            'sltParent' => 'required',
            'txtName' => 'required|unique:products,name',
            'fImages' => 'required|image|mimes:jpeg,jpg,png,bmp,gif,svg',
        ];
    }
    public function messages(){
        return [
            'sltParent.required' => 'Please select category',
            'txtName.required' => 'Please enter name',
            'txtName.unique' => 'Product name exist',
            'fImages.required' => 'Please select image',
            'fImages.image' => 'This file is not Images',
        ];
    }
}
