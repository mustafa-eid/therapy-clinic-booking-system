<div class="modal fade" id="edit_medical_record" tabindex="-1" aria-labelledby="edit_medical_recordLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="edit_medical_recordLabel">Edit Medical Record</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="edit-medical-record-form" action="{{ route('medical_records.update') }}" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="hidden" id="edit-id" name="id">
                    <div class="mb-3">
                        <label for="edit-medication-name" class="form-label">Medication Name</label>
                        <input type="text" class="form-control" id="edit-medication-name" name="medication_name"
                            required>
                    </div>
                    <div class="mb-3">
                        <label for="edit-start-date" class="form-label">Start Date</label>
                        <input type="date" class="form-control" id="edit-start-date" name="start_date" required>
                    </div>
                    <div class="mb-3">
                        <label for="edit-end-date" class="form-label">End Date</label>
                        <input type="date" class="form-control" id="edit-end-date" name="end_date" required>
                    </div>
                    <div class="mb-3">
                        <label for="edit-quantity" class="form-label">Quantity</label>
                        <input type="number" class="form-control" id="edit-quantity" name="quantity" required>
                    </div>
                    <div class="mb-3">
                        <label for="edit-frequency" class="form-label">Frequency</label>
                        <input type="text" class="form-control" id="edit-frequency" name="frequency" required>
                    </div>
                    <div class="mb-3">
                        <label for="edit-repetitionOfDay" class="form-label">Frequency of Day</label>
                        <input type="text" class="form-control" id="edit-repetitionOfDay" name="repetitionOfDay"
                            required>
                    </div>
                    <!-- Dose -->
                    <div class="mb-3">
                        <label for="edit-dose" class="form-label">Dose</label>
                        <input type="text" class="form-control" id="edit-dose" name="dose" required>
                    </div>
                    <div class="mb-3">
                        <label for="edit-notes" class="form-label">Notes</label>
                        <textarea class="form-control" id="edit-notes" name="notes" rows="3"></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
