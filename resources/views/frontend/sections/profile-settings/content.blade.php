<div class="col-lg-8 col-xl-9">
    <div class="dashboard-header">
        <h3>Dashboard</h3>
    </div>
    <div class="dashboard-card w-100">
        <div class="dashboard-card-head">
            <div class="header-title">
                <h5>My profile</h5>
            </div>
        </div>
        <div class="dashboard-card-body">
            <div class="row">
                <!-- Flash message -->
                @include('frontend.sections.messages.content')
                <!-- Health Records -->
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h6 class="card-title mb-0">Profile settings</h6>
                        </div>
                        <div class="card-body mt-3">
                            <div class="setting-card">
                                <form action="{{ route('patient.profile-settings-update') }}" method="post">
                                    <div class="row">
                                        @csrf
                                        <div class="col-lg-4 col-md-6">
                                            <div class="form-wrap">
                                                <label class="col-form-label">Name <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" name="name" class="form-control"
                                                    value="{{ Auth::guard('patient')->user()->name }}">
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="form-wrap">
                                                <label class="col-form-label">Date of Birth <span
                                                        class="text-danger">*</span></label>
                                                <input type="date" name="birthday" class="form-control"
                                                    value="{{ Auth::guard('patient')->user()->birthday ? Auth::guard('patient')->user()->birthday->format('Y-m-d') : '' }}">
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="form-wrap">
                                                <label class="col-form-label">Phone Number <span
                                                        class="text-danger">*</span></label>
                                                <input type="number" name="phone" class="form-control"
                                                    value="{{ Auth::guard('patient')->user()->phone }}">
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="form-wrap">
                                                <label class="col-form-label">Gender <span
                                                        class="text-danger">*</span></label>
                                                <select name="gender" class="form-control">
                                                    <option value="Male"
                                                        {{ Auth::guard('patient')->user()->gender == 'male' ? 'selected' : '' }}>
                                                        Male</option>
                                                    <option value="Female"
                                                        {{ Auth::guard('patient')->user()->gender == 'female' ? 'selected' : '' }}>
                                                        Female</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="form-wrap">
                                                <label class="col-form-label">Age <span
                                                        class="text-danger">*</span></label>
                                                <input type="number" name="age" class="form-control"
                                                    value="{{ Auth::guard('patient')->user()->age }}">
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary prime-btn">Save Changes</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Health Records -->
            </div>
        </div>
    </div>
</div>
