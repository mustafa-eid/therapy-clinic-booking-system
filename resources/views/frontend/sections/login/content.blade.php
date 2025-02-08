<!-- Main Wrapper -->
<div class="main-wrapper">
    <!-- Header -->
    @include('frontend.main.home.navbar')
    <!-- /Header -->
    <div class="login-content-info">
        <div class="container">
            <!-- Login Email -->
            <div class="row justify-content-center">
                <!-- Login Form Column -->
                <div class="col-lg-6 col-md-12">
                    <div class="account-content">
                        <div class="login-shapes">
                            <div class="shape-img-left">
                                <img src="{{ asset('patient-assets/img/shape-01.png') }}" alt="shape-image">
                            </div>
                            <div class="shape-img-right">
                                <img src="{{ asset('patient-assets/img/shape-02.png') }}" alt="shape-image">
                            </div>
                        </div>
                        <div class="account-info">
                            <div class="login-title">
                                <h3>Patient Sign in</h3>
                            </div>
                            <form action="{{ route('patient.login') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label class="mb-2">E-mail</label>
                                    <input name="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror"
                                        placeholder="example@email.com" value="{{ old('email') }}" required>
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="mb-2">Password</label>
                                    <input name="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror"
                                        placeholder="*************" required>
                                    @error('password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <button class="btn w-100" type="submit">Sign in</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Login Email -->
        </div>
    </div>
</div>
<!-- Cursor -->
<div class="mouse-cursor cursor-outer"></div>
<div class="mouse-cursor cursor-inner"></div>
<!-- /Cursor -->
