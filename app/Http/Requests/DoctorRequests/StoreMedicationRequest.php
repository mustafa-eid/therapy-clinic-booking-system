<?php

namespace App\Http\Requests\DoctorRequests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMedicationRequest extends FormRequest
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
            'medication_name' => 'required|string|max:255',
            'start_date' => 'required|date|before_or_equal:end_date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'quantity' => 'required|integer|min:1',
            'frequency' => 'required|string|max:255',
            'repetitionOfDay' => 'required|string|max:255',
            'dose' => 'required|integer|max:255',
            'notes' => 'nullable|string|max:1000',
        ];
    }

    /**
     * Get the custom error messages for validation failures.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'patient_id.required' => 'The patient ID is required.',
            'patient_id.exists' => 'The selected patient does not exist.',
            'medication_name.required' => 'The medication name is required.',
            'medication_name.string' => 'The medication name must be a valid string.',
            'medication_name.max' => 'The medication name cannot exceed 255 characters.',
            'start_date.required' => 'The start date is required.',
            'start_date.date' => 'The start date must be a valid date.',
            'start_date.before_or_equal' => 'The start date must be before or equal to the end date.',
            'end_date.required' => 'The end date is required.',
            'end_date.date' => 'The end date must be a valid date.',
            'end_date.after_or_equal' => 'The end date must be after or equal to the start date.',
            'quantity.required' => 'The quantity is required.',
            'quantity.integer' => 'The quantity must be an integer.',
            'quantity.min' => 'The quantity must be at least 1.',
            'frequency.required' => 'The frequency is required.',
            'frequency.string' => 'The frequency must be a valid string.',
            'frequency.max' => 'The frequency cannot exceed 255 characters.',
            'notes.nullable' => 'The notes are optional.',
            'notes.string' => 'The notes must be a valid string.',
            'notes.max' => 'The notes cannot exceed 1000 characters.',
        ];
    }
}
