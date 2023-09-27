<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class BillRequest extends FormRequest
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
            'sold_at' =>'required|date',
            'customer_id' => 'required',
            'tax' =>'nullable|numeric',
            'notes' => 'nullable',
            'discounnt' => 'nullable|numeric',
        ];
    }

    public function messages()
    {
        return[
            'sold_at.required' => 'sold_at field required',
            'sold_at.date' => 'invalid date',
            'customer_id.required' => 'customer_id field required',
            'tax.numeric' => 'invalis value',
            'discounnt.numeric' => 'invalis value',
        ];
    }



}
