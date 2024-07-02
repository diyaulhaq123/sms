<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateGradeRequest extends FormRequest
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
            'admission_no' => 'required',
            'subject_id' => 'required|integer',
            'term_id' => 'required|integer',
            'session_id' => 'required|integer',
            'staff_id' => 'required|integer',
            'ca1' => 'required|max:20',
            'ca2' => 'required|max:20',
            'ca3' => 'required|max:20',
            'exam' => 'required|max:20',

        ];
    }

    public function messages(){
        return [
            'student_id.required' => 'error identifying student',
            'class_id.required' => 'error identifying class',
            'subject_id.required' => 'error identifying subject',
            'term_id.required' => 'error identifying term',
            'session_id.required' => 'error identifying session',
            'staff_id.required' => 'error identifying staff info',

            ''
        ];

    }

}
