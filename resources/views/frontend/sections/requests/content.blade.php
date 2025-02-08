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
                                    <h6 class="card-title mb-0">Bookings List</h6>
                                </div><!--end col-->
                                <div class="col-xl-2 col-md-3">
                                    <div class="search-box">
                                        <input type="text" class="form-control search"
                                            placeholder="Search for bookings, date, client or something...">
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
                                            <th scope="col" class="sort cursor-pointer" data-sort="phone"
                                                onclick="sortTable(5)">Phone Number</th>
                                            <th scope="col" class="sort cursor-pointer" data-sort="create_date"
                                                onclick="sortTable(3)">Booking Date</th>
                                            <th scope="col" class="sort cursor-pointer" data-sort="time_slot"
                                                onclick="sortTable(4)">Time Slot</th>
                                            <th scope="col" class="sort cursor-pointer" data-sort="status"
                                                onclick="sortTable(6)">Status</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="list form-check-all" id="invoice-list-data">
                                        @foreach ($bookings as $booking)
                                            <tr>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="chk_child"
                                                            value="{{ $booking->id }}">
                                                        <label class="form-check-label"></label>
                                                    </div>
                                                </td>
                                                <td>{{ $loop->iteration + $bookings->firstItem() - 1 }}</td>
                                                <td>{{ $booking->patient->name }}</td>
                                                <td>{{ $booking->patient->phone ?? 'N/A' }}</td>
                                                <td>{{ $booking->booking_date ? $booking->booking_date->format('d M, Y') : 'N/A' }}
                                                </td>
                                                <td>
                                                    {{ $booking->timeSlot->start_time ? \Carbon\Carbon::parse($booking->timeSlot->start_time)->format('h:i A') : 'N/A' }}
                                                    -
                                                    {{ $booking->timeSlot->end_time ? \Carbon\Carbon::parse($booking->timeSlot->end_time)->format('h:i A') : 'N/A' }}
                                                </td>
                                                <td>
                                                    <span
                                                        class="badge {{ $booking->status == 'confirmed' ? 'bg-success-subtle text-success' : 'bg-warning-subtle text-warning' }}">
                                                        {{ ucfirst($booking->status) }}
                                                    </span>
                                                </td>
                                                <td>
                                                    <ul class="d-flex gap-2 list-unstyled mb-0">
                                                        @if ($booking->status !== 'confirmed')
                                                            <li>
                                                                <form action="{{ route('bookings.confirm') }}"
                                                                    method="POST" style="display: inline;">
                                                                    @csrf
                                                                    <input type="hidden" name="booking_id"
                                                                        value="{{ $booking->id }}">
                                                                    <button type="submit"
                                                                        class="btn btn-subtle-secondary btn-icon btn-sm">
                                                                        <i class="ph-check"></i>
                                                                    </button>
                                                                </form>
                                                            </li>
                                                            <!-- Cancel Button -->
                                                            <li>
                                                                <form
                                                                    action="{{ route('bookings.cancel', ['bookingId' => $booking->id]) }}"
                                                                    method="POST" style="display: inline;"
                                                                    onsubmit="return confirm('Are you sure you want to cancel this invoice?');">
                                                                    @csrf
                                                                    @method('POST')
                                                                    <button type="submit"
                                                                        class="btn btn-subtle-danger btn-icon btn-sm remove-item-btn">
                                                                        <i class="ph-x"></i>
                                                                    </button>
                                                                </form>
                                                            </li>
                                                        @else
                                                            <!-- Reschedule Button -->
                                                            @if (in_array('pending', $rescheduleStatus) ||
                                                                    in_array('accepted', $rescheduleStatus) ||
                                                                    in_array('rejected', $rescheduleStatus))
                                                                <!-- Display statuses here -->
                                                                @if (in_array('pending', $rescheduleStatus) ||
                                                                        in_array('accepted', $rescheduleStatus) ||
                                                                        in_array('rejected', $rescheduleStatus))
                                                                    <!-- Display statuses here -->
                                                                    @foreach ($rescheduleStatus as $status)
                                                                        @if ($status == 'accepted')
                                                                            <span
                                                                                class="badge bg-success-subtle text-success">
                                                                                Rescheduled
                                                                            </span>
                                                                        @elseif ($status == 'rejected')
                                                                            <span
                                                                                class="badge bg-danger-subtle text-danger">
                                                                                Rejected
                                                                            </span>
                                                                        @endif
                                                                    @endforeach
                                                                @endif
                                                            @else
                                                                <li>
                                                                    <form id="rescheduleForm"
                                                                        action="{{ route('reschedule-timeSlot') }}"
                                                                        method="POST" style="display: inline;">
                                                                        @csrf
                                                                        @method('POST')
                                                                        <button type="button"
                                                                            class="btn btn-subtle-secondary btn-icon btn-sm"
                                                                            data-bs-toggle="modal"
                                                                            data-bs-target="#rescheduleModal">
                                                                            <i class="ph-calendar"></i>
                                                                        </button>
                                                                    </form>
                                                                </li>
                                                            @endif
                                                        @endif
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
                                        Showing <span class="fw-semibold">{{ $bookings->firstItem() }}</span> of <span
                                            class="fw-semibold">{{ $bookings->total() }}</span> Results
                                    </div>
                                </div><!--end col-->
                                <div class="col-sm-auto mt-3 mt-sm-0">
                                    <div class="pagination-wrap hstack justify-content-center gap-2">
                                        <!-- Previous Button -->
                                        <a class="page-item pagination-prev {{ $bookings->onFirstPage() ? 'disabled' : '' }}"
                                            href="{{ $bookings->previousPageUrl() }}">
                                            Previous
                                        </a>
                                        <!-- Pagination Links -->
                                        <ul class="pagination listjs-pagination mb-0">
                                            @foreach ($bookings->getUrlRange(1, $bookings->lastPage()) as $page => $url)
                                                <li
                                                    class="page-item {{ $page == $bookings->currentPage() ? 'active' : '' }}">
                                                    <a class="page-link"
                                                        href="{{ $url }}">{{ $page }}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                        <!-- Next Button -->
                                        <a class="page-item pagination-next {{ $bookings->hasMorePages() ? '' : 'disabled' }}"
                                            href="{{ $bookings->nextPageUrl() }}">
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


<!-- Reschedule Booking Modal -->
<div class="modal fade" id="rescheduleModal" tabindex="-1" aria-labelledby="rescheduleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="rescheduleModalLabel">Reschedule Booking</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="rescheduleForm" action="{{ route('reschedule-timeSlot') }}" method="POST">
                @csrf
                <input type="hidden" id="bookingId" name="booking_id">
                <div class="modal-body">
                    <!-- Select New Date -->
                    <div class="mb-3">
                        <label for="rescheduleDate" class="form-label">Select New Date</label>
                        <input type="date" class="form-control form-control-sm" id="rescheduleDate"
                            name="date" required>
                    </div>
                    <!-- Start Time -->
                    <div class="mb-3">
                        <label for="startTime" class="form-label">Start Time</label>
                        <input type="time" class="form-control form-control-sm" id="startTime" name="start_time"
                            required>
                    </div>
                    <!-- End Time -->
                    <div class="mb-3">
                        <label for="endTime" class="form-label">End Time</label>
                        <input type="time" class="form-control form-control-sm" id="endTime" name="end_time"
                            required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Reschedule Booking</button>
                </div>
            </form>
        </div>
    </div>
</div>
