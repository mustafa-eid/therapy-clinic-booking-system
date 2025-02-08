<!-- Start right Content here -->
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <!-- Success and Error Messages -->
            @include('frontend.sections.messages.content')
            <!-- Patient List Table -->
            <div class="row" id="invoiceList">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row align-items-center g-2">
                                <div class="col-lg-3 me-auto">
                                    <h6 class="card-title mb-0">Patients List</h6>
                                </div><!--end col-->
                                <div class="col-xl-2 col-md-3">
                                    <div class="search-box">
                                        <input type="text" class="form-control search"
                                            placeholder="Search for patients, date, client or something...">
                                        <i class="ri-search-line search-icon"></i>
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
                                                onclick="sortTable(1)">Name</th>
                                            <th scope="col" class="sort cursor-pointer" data-sort="create_date"
                                                onclick="sortTable(3)">Email</th>
                                            <th scope="col" class="sort cursor-pointer" data-sort="time_slot"
                                                onclick="sortTable(4)">Gender</th>
                                            <th scope="col" class="sort cursor-pointer" data-sort="time_slot"
                                                onclick="sortTable(4)">Age</th>
                                            <th scope="col">Phone</th>
                                        </tr>
                                    </thead>
                                    <tbody class="list form-check-all" id="invoice-list-data">
                                        @foreach ($patients as $patient)
                                            <?php $patientId = $patient->id; ?>
                                            <tr>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="chk_child"
                                                            value="{{ $patientId }}">
                                                        <label class="form-check-label"></label>
                                                    </div>
                                                </td>
                                                <td>{{ $loop->iteration + $patients->firstItem() - 1 }}</td>
                                                <td>
                                                    <a href="#" class="text-primary" data-bs-toggle="offcanvas"
                                                        data-bs-target="#offcanvasRight"
                                                        onclick="loadPatientData({{ json_encode($patient) }})">
                                                        {{ $patient->name }}
                                                    </a>

                                                </td>
                                                <td>{{ $patient->email }}</td>
                                                <td>{{ $patient->gender }}</td>
                                                <td>{{ $patient->age }}</td>
                                                <td>{{ $patient->phone }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                                <!-- Offcanvas for Patient Details -->
                                <div class="offcanvas offcanvas-end w-50" tabindex="-1" id="offcanvasRight"
                                    aria-labelledby="offcanvasRightLabel">
                                    <div class="offcanvas-header">
                                        <h5 id="offcanvasRightLabel">Patient Name</h5>
                                        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="offcanvas-body">
                                        <div class="card">
                                            <div class="card-body">
                                                <!-- Nav Tabs -->
                                                <ul class="nav nav-tabs mb-3" role="tablist">
                                                    <li class="nav-item" role="presentation">
                                                        <a class="nav-link active" data-bs-toggle="tab" href="#notes"
                                                            role="tab" aria-selected="true">
                                                            Notes
                                                        </a>
                                                    </li>
                                                    <li class="nav-item" role="presentation">
                                                        <a class="nav-link" data-bs-toggle="tab" href="#medications"
                                                            role="tab" aria-selected="false">
                                                            Medications
                                                        </a>
                                                    </li>
                                                </ul>
                                                <!-- Tab Content -->
                                                <div class="tab-content text-muted">
                                                    <!-- Notes Tab -->
                                                    <div class="tab-pane active show" id="notes" role="tabpanel">
                                                        <h6>Notes</h6>
                                                        <button id="showNoteInputBtn"
                                                            class="btn btn-sm rounded-pill btn-primary mt-3">Add a
                                                            note</button>
                                                        <div id="noteInputContainer" style="display:none;">
                                                            <textarea id="noteInput" class="form-control mb-3" placeholder="Add a new note..."></textarea>
                                                            <button id="addNoteBtn"
                                                                class="btn btn-sm rounded-pill btn-success">Save
                                                                Note</button>
                                                            <button id="cancelNoteBtn"
                                                                class="btn btn-sm rounded-pill btn-danger">Cancel</button>
                                                        </div>
                                                        <ul id="notesList" class="list-group mt-3">
                                                            <!-- Notes will be displayed here -->
                                                        </ul>
                                                    </div>
                                                    <!-- Medications Tab -->
                                                    <div class="tab-pane" id="medications" role="tabpanel">
                                                        <h6>Medications</h6>
                                                        <p id="patientIdDisplay" style="display: none;"></p>
                                                        <button id="addMedicationsBtn"
                                                            class="btn btn-sm rounded-pill btn-primary mt-3"
                                                            data-bs-toggle="modal" data-bs-target="#medicationsModal">
                                                            Add Medications
                                                        </button>
                                                    
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- end table -->
                                <div class="noresult" style="display: none">
                                    <div class="text-center py-4">
                                        <i class="ph-magnifying-glass fs-1 text-primary"></i>
                                        <h5 class="mt-2">Sorry! No Result Found</h5>
                                        <p class="text-muted mb-0">We've searched more than 6+ invoice We did not find
                                            any patient for you search.</p>
                                    </div>
                                </div>
                            </div>
                            <!-- Pagination Links -->
                            <div class="row align-items-center mt-4 pt-3" id="pagination-element">
                                <div class="col-sm">
                                    <div class="text-muted text-center text-sm-start">
                                        Showing <span class="fw-semibold">{{ $patients->firstItem() }}</span> of
                                        <span class="fw-semibold">{{ $patients->total() }}</span> Results
                                    </div>
                                </div><!--end col-->
                                <div class="col-sm-auto mt-3 mt-sm-0">
                                    <div class="pagination-wrap hstack justify-content-center gap-2">
                                        <!-- Previous Button -->
                                        <a class="page-item pagination-prev {{ $patients->onFirstPage() ? 'disabled' : '' }}"
                                            href="{{ $patients->previousPageUrl() }}">
                                            Previous
                                        </a>
                                        <!-- Pagination Links -->
                                        <ul class="pagination listjs-pagination mb-0">
                                            @foreach ($patients->getUrlRange(1, $patients->lastPage()) as $page => $url)
                                                <li
                                                    class="page-item {{ $page == $patients->currentPage() ? 'active' : '' }}">
                                                    <a class="page-link"
                                                        href="{{ $url }}">{{ $page }}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                        <!-- Next Button -->
                                        <a class="page-item pagination-next {{ $patients->hasMorePages() ? '' : 'disabled' }}"
                                            href="{{ $patients->nextPageUrl() }}">
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

@include('frontend.sections.my-patients.modal-add-medications')
