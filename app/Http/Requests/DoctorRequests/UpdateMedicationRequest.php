<?php

namespace App\Http\Requests\DoctorRequests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMedicationRequest extends FormRequest
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
            'id' => 'required|exists:Medications,id',
            'medication_name' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'quantity' => 'required|integer|min:1',
            'frequency' => 'required|string|max:255',
            'repetitionOfDay' => 'nullable|integer|min:1',
            'notes' => 'nullable|string|max:1000',
        ];
    }

    public function messages()
    {
        return [
            'id.required' => 'The record ID is required.',
            'id.exists' => 'The specified record does not exist.',
            'medication_name.required' => 'The medication name is required.',
            'start_date.required' => 'The start date is required.',
            'end_date.after_or_equal' => 'The end date must be the same or after the start date.',
            'quantity.required' => 'The quantity is required.',
            'quantity.integer' => 'The quantity must be a valid number.',
            'frequency.required' => 'The frequency is required.',
            'repetitionOfDay.integer' => 'Repetition of day must be a valid number.',
            'notes.string' => 'Notes must be a valid text.',
        ];
    }
}
