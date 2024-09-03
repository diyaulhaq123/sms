<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateLessonPlanRequest extends FormRequest
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
            'staff_id' => 'required|int',
            'session_id' => 'required|int',
            'term_id' => 'required|int',
            'class_id' => 'required|int',
            'subject_id' => 'required|int',
            'topic' => 'required',
            'sub_topic' => 'required',
            'behaviour' => 'required',
            'duration' => 'required',
            'date' => 'required',
            'reference' => 'required',
            'school_id' => 'required'
        ];
    }

    public function messages(){
        return [
            'school_id.required' => 'Tenancy issues',
            'term_id' => 'term unidentified',
            'session_id' => 'session unidentified',
            'class_id' => 'class unidentified',
        ];
    }
}
