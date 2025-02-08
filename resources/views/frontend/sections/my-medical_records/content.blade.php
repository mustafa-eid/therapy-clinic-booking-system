<div class="col-lg-8 col-xl-9">
    <div class="dashboard-header">
        <h3>Dashboard</h3>
    </div>
    <div class="dashboard-card w-100">
        <div class="dashboard-card-head">
            <div class="header-title">
                <h5>My Medications</h5>
            </div>
        </div>
        <div class="dashboard-card-body">
            <div class="row">
                <!-- Health Records -->
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h6 class="card-title mb-0">Medications List</h6>
                        </div>
                        <div class="card-body mt-3">
                            <!-- Success and Error Messages -->
                            @include('frontend.sections.messages.content')
                            <div class="table-responsive table-card">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>S Date</th>
                                            <th>E Date</th>
                                            <th>Quantity</th>
                                            <th>Frequency</th>
                                            <th>Frequency of day</th>
                                            <th>Notes</th>
                                        </tr>
                                    </thead>
                                    <tbody id="medical-record-list-data">
                                        @php
                                            $counter = 1;
                                        @endphp

                                        @forelse ($medicalRecords as $record)
                                            <tr id="record-row-{{ $record->id }}">
                                                <td>{{ $counter++ }}</td>
                                                <td>{{ $record->medication->medication_name }}</td>
                                                <td>{{ $record->medication->start_date }}</td>
                                                <td>{{ $record->medication->end_date }}</td>
                                                <td>{{ $record->medication->quantity }}</td>
                                                <td>{{ $record->medication->frequency }}</td>
                                                <td>{{ $record->medication->repetitionOfDay }}</td>
                                                <td>{{ $record->medication->notes }}</td>
                                                <td>
                                                    <!-- Delete Button -->
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
                                                    <!-- Edit Button -->
                                                    <button class="btn btn-subtle-secondary btn-icon btn-sm"
                                                        data-bs-toggle="modal" data-bs-target="#edit_medical_record"
                                                        data-id="{{ $record->id }}"
                                                        data-patient-name="{{ $record->patient->name }}"
                                                        data-medication-name="{{ $record->medication_name }}"
                                                        data-start-date="{{ $record->start_date }}"
                                                        data-end-date="{{ $record->end_date }}"
                                                        data-quantity="{{ $record->quantity }}"
                                                        data-frequency="{{ $record->frequency }}"
                                                        data-notes="{{ $record->notes }}">
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
