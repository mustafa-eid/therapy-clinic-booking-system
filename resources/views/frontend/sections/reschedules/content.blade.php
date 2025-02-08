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
                                    <h6 class="card-title mb-0">Reschedules List</h6>
                                </div><!--end col-->
                                <div class="col-xl-2 col-md-3">
                                    <div class="search-box">
                                        <input type="text" class="form-control search"
                                            placeholder="Search for request, date, client or something...">
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
                                                onclick="sortTable(1)">Patient Name</th>
                                            <th scope="col" class="sort cursor-pointer" data-sort="create_date"
                                                onclick="sortTable(3)">Reschedule Date</th>
                                            <th scope="col" class="sort cursor-pointer" data-sort="time_slot"
                                                onclick="sortTable(4)">Old Time Slot</th>
                                            <th scope="col" class="sort cursor-pointer" data-sort="time_slot"
                                                onclick="sortTable(5)">New Date</th>
                                            <th scope="col" class="sort cursor-pointer" data-sort="time_slot"
                                                onclick="sortTable(6)">New Start Time</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="list form-check-all" id="invoice-list-data">
                                        @foreach ($reschedules as $reschedule)
                                            <tr>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="chk_child"
                                                            value="{{ $reschedule->id }}">
                                                        <label class="form-check-label"></label>
                                                    </div>
                                                </td>
                                                <td>{{ $loop->iteration + $reschedules->firstItem() - 1 }}</td>
                                                <td>{{ $reschedule->patient->name }}</td>
                                                <td>{{ $reschedule->date ? \Carbon\Carbon::parse($reschedule->date)->format('d M, Y') : 'N/A' }}
                                                </td>
                                                <td>
                                                    {{ $reschedule->oldTimeSlot->start_time ? \Carbon\Carbon::parse($reschedule->oldTimeSlot->start_time)->format('h:i A') : 'N/A' }}
                                                    -
                                                    {{ $reschedule->oldTimeSlot->end_time ? \Carbon\Carbon::parse($reschedule->oldTimeSlot->end_time)->format('h:i A') : 'N/A' }}
                                                </td>
                                                <td>{{ $reschedule->date ? \Carbon\Carbon::parse($reschedule->date)->format('d M, Y') : 'N/A' }}
                                                </td>
                                                <td>{{ $reschedule->start_time ? \Carbon\Carbon::parse($reschedule->start_time)->format('h:i A') : 'N/A' }}
                                                </td>

                                                <td>
                                                    <form action="{{ route('reschedule.delete') }}" method="POST"
                                                        style="display: inline;"
                                                        onsubmit="return confirm('Are you sure you want to delete this reschedule?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <input type="hidden" name="id"
                                                            value="{{ $reschedule->id }}">
                                                        <button type="submit"
                                                            class="btn btn-subtle-danger btn-icon btn-sm remove-item-btn">
                                                            <i class="ph-trash"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <!-- end table -->
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
                                        Showing <span class="fw-semibold">{{ $reschedules->firstItem() }}</span> of
                                        <span class="fw-semibold">{{ $reschedules->total() }}</span> Results
                                    </div>
                                </div><!--end col-->
                                <div class="col-sm-auto mt-3 mt-sm-0">
                                    <div class="pagination-wrap hstack justify-content-center gap-2">
                                        <!-- Previous Button -->
                                        <a class="page-item pagination-prev {{ $reschedules->onFirstPage() ? 'disabled' : '' }}"
                                            href="{{ $reschedules->previousPageUrl() }}">
                                            Previous
                                        </a>
                                        <!-- Pagination Links -->
                                        <ul class="pagination listjs-pagination mb-0">
                                            @foreach ($reschedules->getUrlRange(1, $reschedules->lastPage()) as $page => $url)
                                                <li
                                                    class="page-item {{ $page == $reschedules->currentPage() ? 'active' : '' }}">
                                                    <a class="page-link"
                                                        href="{{ $url }}">{{ $page }}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                        <!-- Next Button -->
                                        <a class="page-item pagination-next {{ $reschedules->hasMorePages() ? '' : 'disabled' }}"
                                            href="{{ $reschedules->nextPageUrl() }}">
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
