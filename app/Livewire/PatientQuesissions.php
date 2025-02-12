<?php

namespace App\Livewire;

use App\Models\Patient;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class PatientQuesissions extends Component
{
    public $step = 1;

    public $questions = [
        '',
        '',
        '',
        '',
        ''
    ];

    protected $rules = [
        'questions.0' => 'required|string|min:5',
        'questions.1' => 'required|string|min:5',
        'questions.2' => 'required|string|min:5',
        'questions.3' => 'required|string|min:5',
        'questions.4' => 'required|string|min:5',
    ];

    protected $messages = [
        'questions.*.required' => 'This field is required.',
        'questions.*.min' => 'Your answer must be at least :min characters.',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function nextStep()
    {
        $this->validate([
            "questions." . ($this->step - 1) => 'required|string|min:5',
        ]);

        $this->step++;
    }

    public function prevStep()
    {
        $this->step--;
    }

    public function submitForm()
    {
        $this->validate();

        $patient = Auth::guard('patient')->user();
        if ($patient instanceof Patient) {
            $patient->questions = $this->questions;
            $patient->save();
        } else {
            return redirect()->route('patient.dashboard')->with('error', 'Patient not found');
        }
        return redirect()->route('home')->with('success', 'Questions answered successfully');
    }

    public function render()
    {
        return view('livewire.patient-quesissions');
    }
}
