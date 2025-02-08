<!-- Start right Content here -->
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <!-- Success and Error Messages -->
            @include('frontend.sections.messages.content')
            <!-- Invoice List Table -->
            <div class="row" id="invoiceList">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row align-items-center g-2">
                                <div class="col-lg-3 me-auto">
                                    <h6 class="card-title mb-0">Invoices List</h6>
                                </div><!--end col-->
                                <div class="col-xl-2 col-md-3">
                                    <div class="search-box">
                                        <input type="text" class="form-control search"
                                            placeholder="Search for invoice, date, client or something...">
                                        <i class="ri-search-line search-icon"></i>
                                    </div>
                                </div><!--end col-->
                                <div class="col-md-auto">
                                    <div class="hstack gap-2">
                                        <button class="btn btn-secondary" data-bs-toggle="modal"
                                            data-bs-target="#addInvoiceModal">
                                            <i class="bi bi-plus-circle align-baseline me-1"></i> Add Invoice
                                        </button>

                                    </div>
                                </div><!--end col-->
                            </div><!--end row-->
                        </div>
                        <div class="card-body mt-3">
                            <div class="table-responsive table-card">
                                <table class="table table-centered align-middle table-custom-effect table-nowrap mb-0">
                                    <thead class="table-light">
                                        <tr>
                                            <th>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="checkAll">
                                                    <label class="form-check-label" for="checkAll"></label>
                                                </div>
                                            </th>
                                            <th scope="col" class="sort cursor-pointer" data-sort="invoice_id"
                                                onclick="sortTable(0)">ID</th>
                                            <th scope="col" class="sort cursor-pointer" data-sort="customer_name"
                                                onclick="sortTable(1)">Customer Name</th>
                                            <th scope="col" class="sort cursor-pointer" data-sort="email"
                                                onclick="sortTable(2)">Email</th>
                                            <th scope="col" class="sort cursor-pointer" data-sort="create_date"
                                                onclick="sortTable(3)">Create Date</th>
                                            <th scope="col" class="sort cursor-pointer" data-sort="amount"
                                                onclick="sortTable(5)">Amount</th>
                                            <th scope="col" class="sort cursor-pointer" data-sort="status"
                                                onclick="sortTable(6)">Status</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="list form-check-all" id="invoice-list-data">
                                        @foreach ($invoices as $invoice)
                                            <tr>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="chk_child"
                                                            value="{{ $invoice->id }}">
                                                        <label class="form-check-label"></label>
                                                    </div>
                                                </td>
                                                <td>{{ $loop->iteration + $invoices->firstItem() - 1 }}</td>
                                                <td>{{ $invoice->patient->name }}</td>
                                                <td>{{ $invoice->patient->email }}</td>
                                                <td>{{ $invoice->created_at ? $invoice->created_at->format('d M, Y') : 'N/A' }}
                                                </td>
                                                <td>${{ number_format($invoice->amount, 2) }}</td>
                                                <td class="status">
                                                    <span
                                                        class="badge {{ $invoice->status == 'Paid' ? 'bg-success-subtle text-success' : ($invoice->status == 'pending' ? 'bg-warning-subtle text-warning' : 'bg-secondary-subtle text-secondary') }}">
                                                        {{ ucfirst($invoice->status) }}
                                                    </span>
                                                </td>
                                                <td>
                                                    <ul class="d-flex gap-2 list-unstyled mb-0">
                                                        <li>
                                                            <a href="javascript:void(0);"
                                                                class="btn btn-subtle-primary btn-icon btn-sm"
                                                                onclick="ViewInvoice(this);"
                                                                data-view-id="{{ $invoice->id }}"><i
                                                                    class="ph-eye"></i></a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:void(0);"
                                                                class="btn btn-subtle-secondary btn-icon btn-sm"
                                                                onclick="EditInvoice(this);"
                                                                data-edit-id="{{ $invoice->id }}"
                                                                data-customer-name="{{ $invoice->patient->name }}"
                                                                data-email="{{ $invoice->patient->email }}"
                                                                data-amount="{{ $invoice->amount }}"
                                                                data-status="{{ $invoice->status }}"
                                                                data-created-at="{{ $invoice->created_at->format('Y-m-d') }}"><i
                                                                    class="ph-pencil"></i></a>
                                                        </li>
                                                        <li>
                                                            <form action="{{ route('invoices.destroy') }}"
                                                                method="POST" style="display: inline;"
                                                                onsubmit="return confirm('Are you sure you want to delete this invoice?');">
                                                                @csrf
                                                                @method('DELETE')
                                                                <input type="hidden" name="id"
                                                                    value="{{ $invoice->id }}">
                                                                <button type="submit"
                                                                    class="btn btn-subtle-danger btn-icon btn-sm remove-item-btn">
                                                                    <i class="ph-trash"></i>
                                                                </button>
                                                            </form>
                                                        </li>
                                                    </ul>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table><!-- end table -->
                                <div class="noresult" style="display: none">
                                    <div class="text-center py-4">
                                        <i class="ph-magnifying-glass fs-1 text-primary"></i>
                                        <h5 class="mt-2">Sorry! No Result Found</h5>
                                        <p class="text-muted mb-0">We've searched more than 6+ invoice We did not find
                                            any invoice for you search.</p>
                                    </div>
                                </div>
                            </div>
                            <!-- Pagination Links -->
                            <div class="row align-items-center mt-4 pt-3" id="pagination-element">
                                <div class="col-sm">
                                    <div class="text-muted text-center text-sm-start">
                                        Showing <span class="fw-semibold">{{ $invoices->firstItem() }}</span> of <span
                                            class="fw-semibold">{{ $invoices->total() }}</span> Results
                                    </div>
                                </div><!--end col-->
                                <div class="col-sm-auto mt-3 mt-sm-0">
                                    <div class="pagination-wrap hstack justify-content-center gap-2">
                                        <!-- Previous Button -->
                                        <a class="page-item pagination-prev {{ $invoices->onFirstPage() ? 'disabled' : '' }}"
                                            href="{{ $invoices->previousPageUrl() }}">
                                            Previous
                                        </a>
                                        <!-- Pagination Links -->
                                        <ul class="pagination listjs-pagination mb-0">
                                            @foreach ($invoices->getUrlRange(1, $invoices->lastPage()) as $page => $url)
                                                <li
                                                    class="page-item {{ $page == $invoices->currentPage() ? 'active' : '' }}">
                                                    <a class="page-link"
                                                        href="{{ $url }}">{{ $page }}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                        <!-- Next Button -->
                                        <a class="page-item pagination-next {{ $invoices->hasMorePages() ? '' : 'disabled' }}"
                                            href="{{ $invoices->nextPageUrl() }}">
                                            Next
                                        </a>
                                    </div>
                                </div><!--end col-->
                            </div><!--end row-->
                        </div>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
        </div><!-- container-fluid -->
    </div><!-- End Page-content -->
</div><!-- end main content-->

@include('frontend.sections.invoices.add-invoice-modal')
@include('frontend.sections.invoices.edit-invoice-modal')
