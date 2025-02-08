<div class="col-lg-8 col-xl-9">
    <div class="dashboard-header">
        <h3>Dashboard</h3>
    </div>
    <div class="dashboard-card w-100">
        <div class="dashboard-card-head">
            <div class="header-title">
                <h5>Change Password</h5>
            </div>
        </div>
        <div class="dashboard-card-body">
            <div class="row">
                <!-- Flash message -->
                @include('frontend.sections.messages.content')
                <!-- Change Password Form -->
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h6 class="card-title mb-0">Change your password</h6>
                        </div>
                        <div class="card-body mt-3">
                            <div class="setting-card">
                                <form action="{{ route('patient.update-password') }}" method="post">
                                    <div class="row">
                                        @csrf
                                        <div class="col-lg-4 col-md-6">
                                            <div class="form-wrap">
                                                <label class="col-form-label">Current Password <span
                                                        class="text-danger">*</span></label>
                                                <input type="password" name="current_password" class="form-control"
                                                    required>
                                                @error('current_password')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="form-wrap">
                                                <label class="col-form-label">New Password <span
                                                        class="text-danger">*</span></label>
                                                <input type="password" name="new_password" class="form-control"
                                                    required>
                                                @error('new_password')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="form-wrap">
                                                <label class="col-form-label">Confirm New Password <span
                                                        class="text-danger">*</span></label>
                                                <input type="password" name="new_password_confirmation"
                                                    class="form-control" required>
                                                @error('new_password_confirmation')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary prime-btn">Change Password</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Change Password -->
            </div>
        </div>
    </div>
</div>
