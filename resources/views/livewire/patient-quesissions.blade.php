<section class="features-section-sixteen">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="container mt-5">
                    <form wire:submit.prevent="submitForm" class="p-4 shadow-sm rounded bg-light">
                        @csrf
                        <h3 class="text-center mb-4" style="color: #yourColorCode;">Patient Therapy Questionnaire</h3>
                        <div class="progress mb-4">
                            <div class="progress-bar" role="progressbar" style="width: {{ $step * 20 }}%"
                                aria-valuenow="{{ $step * 20 }}" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        @if ($step == 1)
                            <div class="form-group mb-4">
                                <label for="question1" class="form-label">What brings you here today?</label>
                                <textarea id="question1" class="form-control" rows="4" wire:model.debounce.500ms="questions.0"
                                    placeholder="Please provide details..." required></textarea>
                                @error('questions.0')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        @elseif($step == 2)
                            <div class="form-group mb-4">
                                <label for="question2" class="form-label">Can you describe any changes in your mood or
                                    behavior recently?</label>
                                <textarea id="question2" class="form-control" rows="4" wire:model.debounce.500ms="questions.1"
                                    placeholder="Describe any changes..." required></textarea>
                                @error('questions.1')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        @elseif($step == 3)
                            <div class="form-group mb-4">
                                <label for="question3" class="form-label">Have you encountered any major life events or
                                    stressors lately?</label>
                                <textarea id="question3" class="form-control" rows="4" wire:model.debounce.500ms="questions.2"
                                    placeholder="Please provide details..." required></textarea>
                                @error('questions.2')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        @elseif($step == 4)
                            <div class="form-group mb-4">
                                <label for="question4" class="form-label">Is there a history of mental health issues in
                                    your family or personal life?</label>
                                <textarea id="question4" class="form-control" rows="4" wire:model.debounce.500ms="questions.3"
                                    placeholder="Share any relevant history..." required></textarea>
                                @error('questions.3')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        @elseif($step == 5)
                            <div class="form-group mb-4">
                                <label for="question5" class="form-label">What do you hope to achieve through
                                    therapy?</label>
                                <textarea id="question5" class="form-control" rows="4" wire:model.debounce.500ms="questions.4"
                                    placeholder="What are your goals?" required></textarea>
                                @error('questions.4')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        @endif
                        <div class="form-group d-flex justify-content-between align-items-center mt-4">
                            @if ($step == 1)
                                <a href="{{ route('patient.dashboard') }}" class="btn btn-warning btn-sm">Skip</a>
                            @endif
                            @if ($step > 1)
                                <button type="button" wire:click="prevStep"
                                    class="btn btn-outline-primary btn-sm">Previous</button>
                            @endif
                            @if ($step < 5)
                                <button type="button" wire:click="nextStep"
                                    class="btn btn-primary btn-sm">Next</button>
                            @else
                                <button type="submit" class="btn btn-success btn-sm">Finish</button>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
