<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateProfileRequest extends FormRequest
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
            'user_id' => 'required|integer',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'other_name' => 'nullable|string|max:255',
            'gender' => 'required|string|in:Male,Female,Other',
            'marital_status' => 'nullable|string|max:255',
            'phone_number' => 'required|string|max:20',
            'nationality' => 'nullable|string|max:255',
            'state' => 'required|integer|max:255',
            'lga' => 'required|integer|max:255',
            'town' => 'nullable|string|max:255',
            'address_line_1' => 'required|string|max:255',
            'address_line_2' => 'nullable|string|max:255',
            'date_of_birth' => 'required|date',
            'place_of_birth' => 'nullable|string|max:255',
            // 'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // adjust max file size as needed
        ];
    }
}
