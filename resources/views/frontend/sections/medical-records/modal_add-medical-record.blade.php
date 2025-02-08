<!-- Modal -->
<div class="modal fade  modal-lx" id="add_medical_records" tabindex="-1" aria-labelledby="add_medical_recordsLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="add_medical_recordsLabel">Add Medical Record</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('medical_records.store') }}" method="POST">
                    @csrf
                    <!-- Medication Name -->
                    <div class="mb-3">
                        <label for="medication_name" class="form-label">Medication Name</label>
                        <input type="text" class="form-control @error('medication_name') is-invalid @enderror"
                            id="medication_name" name="medication_name" value="{{ old('medication_name') }}" required>
                        @error('medication_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Start Date and End Date in One Row -->
                    <div class="row">
                        <div class="col-6 mb-3">
                            <label for="start_date" class="form-label">Start Date</label>
                            <input type="date" class="form-control @error('start_date') is-invalid @enderror"
                                id="start_date" name="start_date" value="{{ old('start_date') }}" required>
                            @error('start_date')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-6 mb-3">
                            <label for="end_date" class="form-label">End Date</label>
                            <input type="date" class="form-control @error('end_date') is-invalid @enderror"
                                id="end_date" name="end_date" value="{{ old('end_date') }}" required>
                            @error('end_date')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Quantity and Frequency in One Row -->
                    <div class="row">
                        <div class="col-6 mb-3">
                            <label for="quantity" class="form-label">Quantity</label>
                            <input type="number" class="form-control @error('quantity') is-invalid @enderror"
                                id="quantity" name="quantity" value="{{ old('quantity') }}" required>
                            @error('quantity')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-6 mb-3">
                            <label for="frequency" class="form-label">Frequency</label>
                            <input type="text" class="form-control @error('frequency') is-invalid @enderror"
                                id="frequency" name="frequency" value="{{ old('frequency') }}" required>
                            @error('frequency')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- repetitionOfDay and Dose in One Row -->
                    <div class="row">
                        <div class="col-6 mb-3">
                            <label for="repetitionOfDay" class="form-label">Frequency of day</label>
                            <input type="text" class="form-control @error('repetitionOfDay') is-invalid @enderror"
                                id="repetitionOfDay" name="repetitionOfDay" value="{{ old('repetitionOfDay') }}" required>
                            @error('repetitionOfDay')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-6 mb-3">
                            <label for="dose" class="form-label">Dose</label>
                            <input type="text" class="form-control @error('dose') is-invalid @enderror" id="dose"
                                name="dose" value="{{ old('dose') }}" required>
                            @error('dose')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Notes -->
                    <div class="mb-3">
                        <label for="notes" class="form-label">Notes</label>
                        <textarea class="form-control @error('notes') is-invalid @enderror" id="notes" name="notes">{{ old('notes') }}</textarea>
                        @error('notes')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>
