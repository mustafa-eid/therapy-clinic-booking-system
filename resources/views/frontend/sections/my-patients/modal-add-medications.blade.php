<!-- Modal for adding Medication -->
<div class="modal fade" id="medicationsModal" tabindex="-1" aria-labelledby="medicationsModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form id="medicationForm" action="{{ route('medications.store') }}" method="POST">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="medicationsModalLabel">Add Medication for Patient</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Hidden patient ID field -->
                    <input type="hidden" name="patient_id" id="modalPatientId">

                    <!-- Display Patient ID dynamically -->
                    <div class="mb-3" id="patientIdContainer" style="display: none;">
                        <label for="patientIdDisplay" class="form-label"></label>
                        <span id="patientIdDisplay"></span>
                    </div>

                    <!-- Medication Name (Multiple selection) -->
                    <div class="mb-3">
                        <label for="medicationName" class="form-label">Select Medications</label>

                        <!-- Search Input for Medication Names -->
                        <input type="text" id="medicationSearch" class="form-control mb-3"
                            placeholder="Search Medication" onkeyup="filterMedications()">

                        <!-- Message when no search result is found (Normal text) -->
                        <p id="noMedicationsMessage" style="display: none; color: #888;">
                            No medications found.
                        </p>

                        <select id="medicationSelect" name="medication_names[]" class="form-control" required multiple>
                            @foreach ($medications as $medication)
                                <option value="{{ $medication->id }}">{{ $medication->medication_name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save Medication</button>
                </div>
            </div>
        </form>
    </div>
</div>
