<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddTimeTableRequest extends FormRequest
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
        'class_id' => 'required',
        'wing' => 'required',
        'subject_id' => 'required',
        'start' => 'required',
        'end' => 'required',
        'day' => 'required',
        'session_id' => 'required',
        'term_id' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
        'class_id.required' => 'class field is required',
        'subject_id.required' => 'subject field is required',
        'start.required' => 'start time is required',
        'end.required' => 'end time is required',
        'session_id.required' => 'No current session found',
        'term_id.required' => 'No term session found',
        ];
    }

}
