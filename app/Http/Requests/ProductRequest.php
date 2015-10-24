<?php

namespace CodeCommerce\Http\Requests;

use CodeCommerce\Http\Requests\Request;

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

       $this->merge(array('featured' => $this->input('featured',0)));
       $this->merge(array('recommend' => $this->input('recommend',0)));
        return [
            'name' => 'required|min:3',
            'description' => 'required',
            'price' => 'required',
        ];
    }
}