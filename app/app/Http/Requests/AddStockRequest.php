<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddStockRequest extends FormRequest
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
            'name'          => "required|min:2|max:500",
            'total_amount'  => "required|numeric|gt:0",
            'init_price'    => "required|numeric|gt:0"
        ];
    }
    public function messages()
    {
        return [
            'name.required'         =>"Stock name cannot be null",
            'name.min'              =>"Stock name must be more than 1 character",
            'name.max'              =>"Stock name cannot exceed 500 characters",
            'total_amount.required' =>"Amount of stock cannot be null",
            'total_amount.numeric'  =>"Amount of stock must be a number",
            'total_amount.gt:0'     =>"Amount of stock must be greater than 0",
            'init_price.required'   =>"Init price of stock must be greater than 0",
            'init_price.numeric'    =>"Init price of stock must be a number",
            'init_price.gt:0'       =>"Init price of stock must be greater than 0",
        ];
    }
}
