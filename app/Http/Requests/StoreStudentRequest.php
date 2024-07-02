<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStudentRequest extends FormRequest
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
            'first_name' => ['required', 'string'],
            'last_name' => ['required', 'string'],
            'other_name' => ['sometimes'],
            // 'guardian_id' => ['required'],
            'class_id' => ['required'],
            'class_category_id' => ['required'],
            'admission_no' => ['required','unique:students'],
            'wing' => ['required'],
            'state_id' => ['required'],
            'lga_id' => ['required'],
            'address' => ['required', 'min:12'],
            'name' => 'required', 'phone' => 'required', 'email' => 'required'

        ];
    }

    public function messages(){
        return [
            'class_category_id.required' => 'Class category must be selected',
            'class_id.required' => 'Class must be selected',
            'state_id.required' => 'Please select a state',
            'lga_id.required' => 'Please select a local government',
        ];
    }
}
