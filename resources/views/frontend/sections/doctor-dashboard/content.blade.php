<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <!-- Total Patients Section -->
                <div class="col-xl-3 col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="dropdown float-end">
                                <a class="text-reset dropdown-btn" href="#" data-bs-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    <span class="text-muted fs-lg"><i
                                            class="mdi mdi-dots-vertical align-middle"></i></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a class="dropdown-item" href="#">Today</a>
                                    <a class="dropdown-item" href="#">Last Week</a>
                                    <a class="dropdown-item" href="#">Last Month</a>
                                    <a class="dropdown-item" href="#">Current Year</a>
                                </div>
                            </div>
                            <p class="fs-md text-muted mb-0">Total Patients</p>
                            <div class="row mt-4 align-items-end">
                                <div class="col-lg-6">
                                    <h3 class="mb-4"><span class="counter-value"
                                            data-target="{{ $totalPatients }}">{{ $totalPatients }}</span></h3>
                                    <p class="text-success mb-0"><i class="bi bi-arrow-up me-1"></i>
                                        {{ number_format($monthChange, 2) }}% This Month</p>
                                </div>
                                <div class="col-lg-6">
                                    <div id="session_chart" data-colors='["--tb-primary", "--tb-secondary"]'
                                        class="apex-charts m-n3 mt-n4" dir="ltr"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!--end col-->
                <!-- Time Slots Section -->
                <div class="col-xl-3 col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="dropdown float-end">
                                <a class="text-reset dropdown-btn" href="#" data-bs-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    <span class="text-muted fs-lg"><i
                                            class="mdi mdi-dots-vertical align-middle"></i></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a class="dropdown-item" href="#">Today</a>
                                    <a class="dropdown-item" href="#">Last Week</a>
                                    <a class="dropdown-item" href="#">Last Month</a>
                                    <a class="dropdown-item" href="#">Current Year</a>
                                </div>
                            </div>
                            <p class="fs-md text-muted mb-0">Total Time Slots</p>
                            <div class="row mt-4 align-items-end">
                                <div class="col-lg-6">
                                    <h3 class="mb-4"><span class="counter-value"
                                            data-target="{{ $totalTimeSlots }}">{{ $totalTimeSlots }}</span></h3>
                                    <p class="text-success mb-0"><i class="bi bi-arrow-up me-1"></i>
                                        {{ number_format($monthChange, 2) }}% This Month</p>
                                </div>
                                <div class="col-lg-6">
                                    <div id="time_slot_chart" data-colors='["--tb-primary", "--tb-secondary"]'
                                        class="apex-charts m-n3 mt-n4" dir="ltr"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!--end col-->
                <!-- Time Slots Today Section -->
                <div class="col-xl-3 col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="dropdown float-end">
                                <a class="text-reset dropdown-btn" href="#" data-bs-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    <span class="text-muted fs-lg"><i
                                            class="mdi mdi-dots-vertical align-middle"></i></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a class="dropdown-item" href="#">Today</a>
                                    <a class="dropdown-item" href="#">Last Week</a>
                                    <a class="dropdown-item" href="#">Last Month</a>
                                    <a class="dropdown-item" href="#">Current Year</a>
                                </div>
                            </div>
                            <p class="fs-md text-muted mb-0">Time Slots Today</p>
                            <div class="row mt-4 align-items-end">
                                <div class="col-lg-6">
                                    <h3 class="mb-4"><span class="counter-value"
                                            data-target="{{ $todayTimeSlots }}">{{ $todayTimeSlots }}</span></h3>
                                    <p class="text-success mb-0"><i class="bi bi-arrow-up me-1"></i>
                                        {{ number_format($monthChange, 2) }}% This Month</p>
                                </div>
                                <div class="col-lg-6">
                                    <div id="today_time_slot_chart" data-colors='["--tb-primary", "--tb-secondary"]'
                                        class="apex-charts m-n3 mt-n4" dir="ltr"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!--end col-->
                <!-- Total Bookings Section -->
                <div class="col-xl-3 col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="dropdown float-end">
                                <a class="text-reset dropdown-btn" href="#" data-bs-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    <span class="text-muted fs-lg"><i
                                            class="mdi mdi-dots-vertical align-middle"></i></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a class="dropdown-item" href="#">Today</a>
                                    <a class="dropdown-item" href="#">Last Week</a>
                                    <a class="dropdown-item" href="#">Last Month</a>
                                    <a class="dropdown-item" href="#">Current Year</a>
                                </div>
                            </div>
                            <p class="fs-md text-muted mb-0">Total Bookings</p>
                            <div class="row mt-4 align-items-end">
                                <div class="col-lg-6">
                                    <h3 class="mb-4"><span class="counter-value"
                                            data-target="{{ $totalBookings }}">{{ $totalBookings }}</span></h3>
                                    <p class="text-success mb-0"><i class="bi bi-arrow-up me-1"></i>
                                        {{ number_format($monthChange, 2) }}% This Month</p>
                                </div>
                                <div class="col-lg-6">
                                    <div id="session_chart" data-colors='["--tb-primary", "--tb-secondary"]'
                                        class="apex-charts m-n3 mt-n4" dir="ltr"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Confirmed Bookings Section -->
                <div class="col-xl-3 col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <p class="fs-md text-muted mb-0">Confirmed Bookings</p>
                            <h3 class="mb-4">{{ $confirmedBookings }}</h3>
                        </div>
                    </div>
                </div><!--end col-->
                <!-- Cancelled Bookings Section -->
                <div class="col-xl-3 col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <p class="fs-md text-muted mb-0">Cancelled Bookings</p>
                            <h3 class="mb-4">{{ $cancelledBookings }}</h3>
                        </div>
                    </div>
                </div><!--end col-->
                <!-- Pending Bookings Section -->
                <div class="col-xl-3 col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <p class="fs-md text-muted mb-0">Pending Bookings</p>
                            <h3 class="mb-4">{{ $pendingBookings }}</h3>
                        </div>
                    </div>
                </div><!--end col-->
                <!-- Today's Bookings Section -->
                <div class="col-xl-3 col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <p class="fs-md text-muted mb-0">Today's Bookings</p>
                            <h3 class="mb-4">{{ $todayBookings }}</h3>
                        </div>
                    </div>
                </div><!--end col-->
                <!-- Total Invoices Section -->
                <div class="col-xl-3 col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <p class="fs-md text-muted mb-0">Total Invoices</p>
                            <h3 class="mb-4">{{ $totalInvoices }}</h3>
                            <p class="text-success mb-0"><i class="bi bi-arrow-up me-1"></i>
                                {{ number_format($invoiceMonthChange, 2) }}% This Month</p>
                        </div>
                    </div>
                </div><!--end col-->
                <!-- Today's Invoices Section -->
                <div class="col-xl-3 col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <p class="fs-md text-muted mb-0">Today's Invoices</p>
                            <h3 class="mb-4">{{ $todayInvoices }}</h3>
                        </div>
                    </div>
                </div><!--end col-->
                <!-- Current Month's Invoices Section -->
                <div class="col-xl-3 col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <p class="fs-md text-muted mb-0">Invoices This Month</p>
                            <h3 class="mb-4">{{ $currentMonthInvoices }}</h3>
                        </div>
                    </div>
                </div><!--end col-->
                <!-- Previous Month's Invoices Section -->
                <div class="col-xl-3 col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <p class="fs-md text-muted mb-0">Invoices Last Month</p>
                            <h3 class="mb-4">{{ $previousMonthInvoices }}</h3>
                        </div>
                    </div>
                </div><!--end col-->
                <!-- Current Month's Reschedules Section -->
                <div class="col-xl-3 col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <p class="fs-md text-muted mb-0">Reschedules This Month</p>
                            <h3 class="mb-4">{{ $currentMonthReschedules }}</h3>
                        </div>
                    </div>
                </div><!--end col-->
                <!-- Total Reschedules Section -->
                <div class="col-xl-3 col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <p class="fs-md text-muted mb-0">Total Reschedules</p>
                            <h3 class="mb-4">{{ $totalReschedules }}</h3>
                        </div>
                    </div>
                </div><!--end col-->
                <!-- Today's Reschedules Section -->
                <div class="col-xl-3 col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <p class="fs-md text-muted mb-0">Reschedules Today</p>
                            <h3 class="mb-4">{{ $todayReschedules }}</h3>
                        </div>
                    </div>
                </div><!--end col-->
                <!-- Current Month's Medications Section -->
                <div class="col-xl-3 col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <p class="fs-md text-muted mb-0">Medications This Month</p>
                            <h3 class="mb-4">{{ $currentMonthMedications }}</h3>
                        </div>
                    </div>
                </div><!--end col-->
                <!-- Total Medications Section -->
                <div class="col-xl-3 col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <p class="fs-md text-muted mb-0">Total Medications</p>
                            <h3 class="mb-4">{{ $totalMedications }}</h3>
                        </div>
                    </div>
                </div><!--end col-->
                <!-- Today's Medications Section -->
                <div class="col-xl-3 col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <p class="fs-md text-muted mb-0">Medications Today</p>
                            <h3 class="mb-4">{{ $todayMedications }}</h3>
                        </div>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
        </div><!-- container-fluid -->
    </div><!-- End Page-content -->
</div><!-- end main content -->
