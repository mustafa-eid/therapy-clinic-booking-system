<div class="hk-wrapper hk-pg-auth" data-footer="simple">
    <div class="hk-pg-wrapper py-0">
        <div class="hk-pg-body py-0">
            <div class="container-fluid">
                <div class="row auth-split">
                    <div class="col-xl-6 col-lg-6 col-md-12 position-relative mx-auto bg-primary-light-5">
                        <div class="auth-content flex-column pt-8 pb-md-8 pb-13">
                            <form action="{{ route('patient.login') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-xl-9 col-sm-10 mx-auto">
                                        <div class="card card-flush rounded-8 shadow-xl mb-0 p-sm-7 p-2">
                                            <div class="card-body">
                                                <div class="text-center mb-7">
                                                    <a class="navbar-brand me-0" href="{{ route('home') }}">
                                                        <img class="brand-img d-inline-block img-fluid"
                                                            src="https://clinic.kenooz.co/logo.png" alt="brand">
                                                    </a>
                                                </div>
                                                <div class="text-center mb-4">
                                                    <h4>Sign in to Your Account</h4>
                                                </div>
                                                <div class="row gx-3">
                                                    <div class="form-group col-lg-12">
                                                        <div class="form-label-group">
                                                            <label>Email</label>
                                                        </div>
                                                        <input class="form-control @error('email') is-invalid @enderror"
                                                            placeholder="Enter your email" type="text" name="email"
                                                            value="{{ old('email') }}" required>
                                                        @error('email')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group col-lg-12">
                                                        <div class="form-label-group">
                                                            <label>Password</label>
                                                        </div>
                                                        <div class="input-group password-check">
                                                            <span class="input-affix-wrapper affix-wth-text">
                                                                <input
                                                                    class="form-control @error('password') is-invalid @enderror"
                                                                    placeholder="Enter your password" type="password"
                                                                    name="password" required
                                                                    autocomplete="current-password">
                                                                <a href="#"
                                                                    class="input-suffix text-primary text-uppercase fs-8 fw-medium">
                                                                    <span>Show</span>
                                                                    <span class="d-none">Hide</span>
                                                                </a>
                                                            </span>
                                                        </div>
                                                        @error('password')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="d-flex justify-content-between align-items-center mb-3">
                                                    <div class="form-check form-check-sm">
                                                        <input type="checkbox" class="form-check-input" id="logged_in"
                                                            checked="">
                                                        <label class="form-check-label text-muted fs-7"
                                                            for="logged_in">Keep me logged in</label>
                                                    </div>
                                                    <a href="" class="text-primary fw-bold">Forgot Password?</a>
                                                </div>
                                                <button type="submit"
                                                    class="btn btn-primary btn-uppercase btn-block">Login</button>

                                                <div class="text-center mt-3">
                                                    <span class="text-muted">Don't have an account?</span>
                                                    <a href="{{ route('patient.register') }}"
                                                        class="text-primary fw-bold">Create one</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div
                        class="col-xl-6 col-lg-6 col-md-5 col-sm-10 d-md-block d-none position-relative bg-primary-light-5">
                        <div class="auth-content flex-column text-center py-8">
                            <img src=https://clinic.kenooz.co/login.png class="img-fluid  mt-7" alt="login">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
