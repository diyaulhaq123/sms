<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ApplicationRequest extends FormRequest
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
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'other_name' => 'required|string',
            'gender' => 'required',
            'state_id' => 'required|integer',
            'lga_id' => 'required|integer',
            'date_of_birth' => 'required',
            'class_category_id' => 'required|integer',
            'class_id' => 'required|integer',
            'guardian_name' => 'required|string',
            'guardian_phone' => 'required',
            'guardian_email' => 'required',
            'address' => 'required|min:12',
            'session_id' => 'required',
        ];
    }

    public function messages(){
        return [
            'session_id.required' => 'Not a valid application session',
            'class_id.required' => 'Please select a class',
            'class_category_id.required' => 'Please select a class category',
            'state_id.required' => 'Please select a state',
            'lga_id.required' => 'Please select a lga',
        ];
    }

}
