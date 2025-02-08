<div class="col-lg-8 col-xl-9">
    <div class="dashboard-header">
        <h3>Dashboard</h3>
    </div>
    <div class="dashboard-card w-100">
        <div class="dashboard-card-head">
            <div class="header-title">
                <h5>My Invoices</h5>
            </div>
        </div>
        <div class="dashboard-card-body">
            <div class="row">
                <!-- Health Records -->
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h6 class="card-title mb-0">Invoices List</h6>
                        </div>
                        <div class="card-body mt-3">
                            <!-- Success and Error Messages -->
                            @include('frontend.sections.messages.content')
                            <div class="table-responsive table-card">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Payment way</th>
                                            <th>Time slot date</th>
                                            <th>Amount</th>
                                            <th>Status</th>
                                            <th>Description</th>
                                            <th>Invoice Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $counter = 1;
                                        @endphp
                                        @foreach ($myInvoices as $myInvoice)
                                            <tr>
                                                <td>{{ $counter++ }}</td>
                                                <td>{{ $myInvoice->payment->payment_method }}</td>
                                                <td>{{ $myInvoice->slot->date->format('Y-m-d') }}</td>
                                                <td>{{ $myInvoice->amount }}</td>
                                                <td>{{ $myInvoice->status }}</td>
                                                <td>{{ $myInvoice->description }}</td>
                                                <td>{{ $myInvoice->invoice_date->format('Y-m-d') }}</td>
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
