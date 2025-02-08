<div class="col-lg-8 col-xl-9">
    <div class="dashboard-header">
        <h3>Dashboard</h3>
    </div>
    <div class="dashboard-card w-100">
        <div class="dashboard-card-head">
            <div class="header-title">
                <h5>My Appointments</h5>
            </div>
        </div>
        <div class="dashboard-card-body">
            <div class="row">
                <!-- Health Records -->
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h6 class="card-title mb-0">Appointments List</h6>
                        </div>
                        <div class="card-body mt-3">
                            <!-- Success and Error Messages -->
                            @include('frontend.sections.messages.content')
                            <div class="table-responsive table-card">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Booking date</th>
                                            <th>Time Slot Date</th>
                                            <th>Payment Status</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $counter = 1;
                                        @endphp
                                        @foreach ($myAppointments as $appointment)
                                            <tr>
                                                <td>{{ $counter++ }}</td>
                                                <td>{{ \Carbon\Carbon::parse($appointment->booking_date)->format('d-m-Y') }}
                                                </td>
                                                <td>{{ \Carbon\Carbon::parse($appointment->timeSlot->date)->format('d-m-Y') }}
                                                </td>
                                                <td>
                                                    @if ($appointment->payment_status == 'paid')
                                                        <span
                                                            class="text-success">{{ ucfirst($appointment->payment_status) }}</span>
                                                    @elseif ($appointment->payment_status == 'unpaid')
                                                        <span
                                                            class="text-warning">{{ ucfirst($appointment->payment_status) }}</span>
                                                    @else
                                                        <span
                                                            class="text-muted">{{ ucfirst($appointment->payment_status) }}</span>
                                                    @endif
                                                </td>

                                                <td>
                                                    @if ($appointment->status == 'confirmed')
                                                        <span
                                                            class="text-success">{{ ucfirst($appointment->status) }}</span>
                                                    @elseif ($appointment->status == 'cancelled')
                                                        <span
                                                            class="text-danger">{{ ucfirst($appointment->status) }}</span>
                                                    @else
                                                        {{ ucfirst($appointment->status) }}
                                                    @endif
                                                </td>

                                                <td>
                                                    @if ($appointment->status == 'confirmed')
                                                        <span
                                                            class="text-success">{{ ucfirst($appointment->status) }}</span>
                                                    @elseif ($appointment->status == 'cancelled')
                                                        <span
                                                            class="text-danger">{{ ucfirst($appointment->status) }}</span>
                                                    @else
                                                        <form action="{{ route('patient.cancel-appointments') }}"
                                                            method="POST"
                                                            onsubmit="return confirm('Are you sure you want to cancel this appointment?');">
                                                            @csrf
                                                            @method('PATCH')
                                                            <input type="hidden" name="appointment_id"
                                                                value="{{ $appointment->id }}">
                                                            <button type="submit"
                                                                class="btn btn-danger btn-sm">Cancel</button>
                                                        </form>
                                                    @endif
                                                </td>

                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Health Records -->
            </div>
        </div>
    </div>
</div>
