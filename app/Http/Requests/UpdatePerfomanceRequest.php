<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePerfomanceRequest extends FormRequest
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

            'student_id' => 'required|integer',
            'class_id' => 'required|integer',
            'wing' => 'required',
            'term_id' => 'required|integer',
            'session_id' => 'required|integer',
            'staff_id' => 'required|integer',
            'punctuality' => 'required|integer|max:10',
            'neatness' => 'required|integer|max:10',
            'confidence' => 'required|integer|max:10',
            'attendance' => 'required|integer|max:10',
            'remark' => 'required',

        ];
    }

    public function messages(){
        return [
            'student_id.required' => 'error identifying student',
            'class_id.required' => 'error identifying class',
            'wing.required' => 'error identifying class wing',
            'term_id.required' => 'error identifying term',
            'session_id.required' => 'error identifying session',
            'staff_id.required' => 'error identifying staff info',

        ];

    }
}
