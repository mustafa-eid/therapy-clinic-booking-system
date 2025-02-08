<!-- Main Wrapper -->
<div class="main-wrapper">
    <!-- Header -->
    @include('frontend.main.home.navbar')
    <!-- /Header -->

    <!-- Page Content -->
    <div class="login-content-info">
        <div class="container">
            <!-- Patient Signup -->
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-6">
                    <div class="account-content">
                        <div class="login-shapes">
                            <div class="shape-img-left">
                                <img src="{{ asset('patient-assets/img/shape-01.png') }}" alt="shape-image">
                            </div>
                            <div class="shape-img-right">
                                <img src="{{ asset('patient-assets/img/shape-02.png') }}" alt="shape-image">
                            </div>
                        </div>
                        <form action="{{ route('patient.register') }}" method="POST">
                            @csrf

                            <!-- Name Field -->
                            <div class="mb-3">
                                <label class="mb-2">Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" placeholder="Enter your name" value="{{ old('name') }}" required>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Email Field -->
                            <div class="mb-3">
                                <label class="mb-2">Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" placeholder="Enter your email" value="{{ old('email') }}" required>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Phone Field -->
                            <div class="mb-3">
                                <label class="mb-2">Phone Number</label>
                                <input type="text" class="form-control @error('phone') is-invalid @enderror"
                                    name="phone" placeholder="Enter your phone" value="{{ old('phone') }}" required>
                                @error('phone')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Age Field -->
                            <div class="mb-3">
                                <label class="mb-2">Age</label>
                                <input type="number" class="form-control @error('age') is-invalid @enderror"
                                    name="age" placeholder="Enter your age" value="{{ old('age') }}" required>
                                @error('age')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Gender Field -->
                            <div class="mb-3">
                                <label class="mb-2">Gender</label>
                                <select class="form-control" name="gender" required>
                                    <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>Male
                                    </option>
                                    <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>Female
                                    </option>
                                </select>
                                @error('gender')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Birthday Field -->
                            <div class="mb-3">
                                <label class="mb-2">Birthday</label>
                                <input type="date" class="form-control @error('birthday') is-invalid @enderror"
                                    name="birthday" value="{{ old('birthday') }}" required>
                                @error('birthday')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Password Field -->
                            <div class="mb-3">
                                <label class="mb-2">Password</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror"
                                    name="password" placeholder="Enter your password" required>
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Confirm Password Field -->
                            <div class="mb-3">
                                <label class="mb-2">Confirm Password</label>
                                <input type="password"
                                    class="form-control @error('password_confirmation') is-invalid @enderror"
                                    name="password_confirmation" placeholder="Confirm your password" required>
                                @error('password_confirmation')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">Sign Up</button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /Patient Signup -->
        </div>
    </div>
    <!-- /Page Content -->

    <!-- Cursor -->
    <div class="mouse-cursor cursor-outer"></div>
    <div class="mouse-cursor cursor-inner"></div>
    <!-- /Cursor -->

    @include('frontend.main.home.footer')
</div>
<!-- /Main Wrapper -->
