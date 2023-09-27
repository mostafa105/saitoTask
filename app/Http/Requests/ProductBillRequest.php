<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ProductBillRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            '*.product_id' =>'required',
            '*.quantity' =>'required|numeric',
            '*.subtotal' => 'required|numeric',
        ];
    }

    public function messages()
    {
        return[
            'product_id.required' => 'product_id field required',
            'quantity.required' => 'quantity field required',
            'subtotal.required' => 'subtotal field required',
            'quantity.numeric' => 'invalis value',
            'subtotal.numeric' => 'invalis value',
        ];
    }
    public function failedValidation(Validator $validator) {
        dd($validator);
        //write your bussiness logic here otherwise it will give same old JSON response
        throw new HttpResponseException(response()->json($validator->errors(), 422));
    }
}
