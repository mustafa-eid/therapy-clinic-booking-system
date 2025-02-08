<!-- Edit Invoice Modal -->
<div class="modal fade" id="editInvoiceModal" tabindex="-1" aria-labelledby="editInvoiceModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editInvoiceModalLabel">Edit Invoice</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="editInvoiceForm" method="POST" action="{{ route('invoices.update', ':invoice_id') }}">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <input type="hidden" name="id" id="invoice-id">
                    <div class="mb-3">
                        <label for="invoice-customer-name" class="form-label">Customer Name</label>
                        <input type="text" class="form-control" id="invoice-customer-name" name="customer_name">
                    </div>
                    <div class="mb-3">
                        <label for="invoice-email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="invoice-email" name="email">
                    </div>
                    <div class="mb-3">
                        <label for="invoice-amount" class="form-label">Amount</label>
                        <input type="number" class="form-control" id="invoice-amount" name="amount" step="0.01">
                    </div>
                    <div class="mb-3">
                        <label for="invoice-status" class="form-label">Status</label>
                        <select class="form-select" id="invoice-status" name="status">
                            <option value="Pending">Pending</option>
                            <option value="paid">Paid</option>
                            <option value="unpaid">Unpaid</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="invoice-created-at" class="form-label">Create Date</label>
                        <input type="date" class="form-control" id="invoice-created-at" name="created_at">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
