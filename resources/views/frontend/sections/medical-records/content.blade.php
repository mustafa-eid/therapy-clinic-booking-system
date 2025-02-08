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
                                    <h6 class="card-title mb-0">Medications List</h6>
                                </div><!--end col-->
                                <div class="col-xl-2 col-md-3">
                                    <div class="search-box">
                                        <input type="text" id="searchInput" class="form-control search"
                                            placeholder="Search for medication, date, client or something...">
                                        <i class="ri-search-line search-icon"></i>
                                    </div>
                                </div><!--end col-->
                                <div class="col-md-auto">
                                    <div class="hstack gap-2">
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#add_medical_records"
                                            class="btn btn-primary prime-btn">Add Medication</a>
                                    </div>
                                </div><!--end col-->
                            </div><!--end row-->
                        </div>
                        <div class="card-body mt-3">
                            <div class="table-responsive table-card">
                                <table class="table table-centered align-middle table-custom-effect table-nowrap mb-0">
                                    <thead class="table-light">
                                        <tr>
                                            <th scope="col" class="sort cursor-pointer" onclick="sortTable(0)">ID
                                            </th>
                                            <th scope="col" class="sort cursor-pointer" onclick="sortTable(1)">
                                                Medication Name</th>
                                            <th scope="col" class="sort cursor-pointer" onclick="sortTable(2)">
                                                Start Date</th>
                                            <th scope="col" class="sort cursor-pointer" onclick="sortTable(3)">
                                                End Date</th>
                                            <th scope="col" class="sort cursor-pointer" onclick="sortTable(4)">
                                                Quantity</th>
                                            <th scope="col" class="sort cursor-pointer" onclick="sortTable(5)">
                                                Frequency</th>
                                            <th scope="col" class="sort cursor-pointer" onclick="sortTable(6)">
                                                Frequency of Day</th>
                                            <th scope="col" class="sort cursor-pointer" onclick="sortTable(7)">
                                                Dose</th>
                                            <th scope="col">Action</th>

                                        </tr>
                                    </thead>
                                    <tbody id="medical-record-list-data">
                                        @php
                                            $counter = 1;
                                        @endphp
                                        @forelse ($Medications as $record)
                                            <tr id="record-row-{{ $record->id }}">
                                                <td>{{ $counter++ }}</td>
                                                <td>{{ $record->medication_name }}</td>
                                                <td>{{ $record->start_date }}</td>
                                                <td>{{ $record->end_date }}</td>
                                                <td>{{ $record->quantity }}</td>
                                                <td>{{ $record->frequency }}</td>
                                                <td>{{ $record->repetitionOfDay }}</td>
                                                <td>{{ $record->dose }}</td>
                                                <td>
                                                    <form action="#" method="POST" class="d-inline"
                                                        id="deleteForm{{ $record->id }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="button"
                                                            class="btn btn-subtle-danger btn-icon btn-sm"
                                                            onclick="confirmDelete({{ $record->id }})">
                                                            <i class="ph-trash"></i>
                                                        </button>
                                                    </form>
                                                    <button class="btn btn-subtle-secondary btn-icon btn-sm"
                                                        data-bs-toggle="modal" data-bs-target="#edit_medical_record"
                                                        data-id="{{ $record->id }}"
                                                        data-medication-name="{{ $record->medication_name }}"
                                                        data-start-date="{{ $record->start_date }}"
                                                        data-end-date="{{ $record->end_date }}"
                                                        data-quantity="{{ $record->quantity }}"
                                                        data-frequency="{{ $record->frequency }}"
                                                        data-repetition-of-day="{{ $record->repetitionOfDay }}"
                                                        data-notes="{{ $record->notes }}"
                                                        data-dose="{{ $record->dose }}">
                                                        <i class="ph-pencil"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="9">
                                                    <div class="alert alert-info text-center" role="alert">
                                                        No medical records available.
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforelse
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
                                        Showing <span class="fw-semibold">{{ $Medications->firstItem() }}</span> of
                                        <span class="fw-semibold">{{ $Medications->total() }}</span> Results
                                    </div>
                                </div><!--end col-->
                                <div class="col-sm-auto mt-3 mt-sm-0">
                                    <div class="pagination-wrap hstack justify-content-center gap-2">
                                        <!-- Previous Button -->
                                        <a class="page-item pagination-prev {{ $Medications->onFirstPage() ? 'disabled' : '' }}"
                                            href="{{ $Medications->previousPageUrl() }}">
                                            Previous
                                        </a>
                                        <!-- Pagination Links -->
                                        <ul class="pagination listjs-pagination mb-0">
                                            @foreach ($Medications->getUrlRange(1, $Medications->lastPage()) as $page => $url)
                                                <li
                                                    class="page-item {{ $page == $Medications->currentPage() ? 'active' : '' }}">
                                                    <a class="page-link"
                                                        href="{{ $url }}">{{ $page }}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                        <!-- Next Button -->
                                        <a class="page-item pagination-next {{ $Medications->hasMorePages() ? '' : 'disabled' }}"
                                            href="{{ $Medications->nextPageUrl() }}">
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

@include('frontend.sections.medical-records.modal_add-medical-record')
@include('frontend.sections.medical-records.modal_edit-medical-record')
