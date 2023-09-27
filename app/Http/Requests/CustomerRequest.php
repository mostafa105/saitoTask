<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
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
            'company' =>'required',
            'contact_person' => 'required',
            'email' =>'required|email',
            'address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'postal_code' => 'required',
            'country' => 'required',
            'phone' => 'required',
        ];
    }

    public function messages()
    {
        return[
            'company.required' => 'company field required',
            'contact_person.required' => 'contact person field required',
            'email.required' => 'email field required',
            'email.email' => 'invalid email',
            'address.required' => 'address field required',
            'city.required' => 'city field required',
            'state.required' => 'state field required',
            'postal_code.required' => 'postal code field required',
            'country.required' => 'country field required',
            'phone.required' => 'phone field required',
        ];
    }
}
