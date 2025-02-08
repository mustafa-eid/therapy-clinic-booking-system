<!-- Add Invoice Modal -->
<div class="modal fade" id="addInvoiceModal" tabindex="-1" aria-labelledby="addInvoiceModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addInvoiceModalLabel">Add New Invoice</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('invoices.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <!-- Patient Name -->
                    <div class="mb-3">
                        <label for="patient_name" class="form-label">Patient Name</label>
                        <select class="form-select" id="patient_name" name="patient_id" required>
                            <option value="">Select Patient</option>
                            @foreach ($patients as $patient)
                                <option value="{{ $patient->id }}">{{ $patient->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <!-- Timslots -->
                    <div class="mb-3">
                        <label for="timslots" class="form-label">Timslots</label>
                        <select class="form-select" id="timslots" name="slot_id" required>
                            <option value="">Select Timslots</option>
                            @foreach ($timslots as $timslot)
                                <option value="{{ $timslot->id }}">{{ $timslot->start_time }}</option>
                            @endforeach
                        </select>
                    </div>
                    <!-- Payments -->
                    <div class="mb-3">
                        <label for="payments" class="form-label">Payments</label>
                        <select class="form-select" id="payments" name="payment_id" required>
                            <option value="">Select Payment</option>
                            @foreach ($payments as $payment)
                                <option value="{{ $payment->id }}">{{ $payment->amount }}</option>
                            @endforeach
                        </select>
                    </div>
                    <!-- Amount -->
                    <div class="mb-3">
                        <label for="amount" class="form-label">Amount</label>
                        <input type="number" class="form-control" id="amount" name="amount" required>
                    </div>
                    <!-- Description -->
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add Invoice</button>
                </div>
            </form>
        </div>
    </div>
</div>
