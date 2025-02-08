<?php

namespace App\Http\Requests\DoctorRequests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAvailableTiming extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // You can change this to true if you want the request to be authorized for all users
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'date' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
            'notes' => 'nullable|string|max:255',
        ];
    }

    /**
     * Custom messages for validation errors.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'date.required' => 'Please select a date.',
            'start_time.required' => 'Start time is required.',
            'start_time.date_format' => 'Start time must be in HH:mm format.',
            'end_time.required' => 'End time is required.',
            'end_time.after' => 'End time must be after start time.',
            'notes.max' => 'Notes should not exceed 255 characters.',
        ];
    }
}
