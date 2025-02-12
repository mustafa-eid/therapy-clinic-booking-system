<div class="hk-wrapper hk-pg-auth" data-footer="simple">
    <div class="hk-pg-wrapper py-0">
        <div class="hk-pg-body py-0">
            <div class="container-fluid">
                <div class="row auth-split">
                    <div class="col-xl-6 col-lg-6 col-md-12 position-relative mx-auto bg-primary-light-5">
                        <div class="auth-content flex-column pt-8 pb-md-8 pb-13">
                            <form action="{{ route('patient.register') }}" method="POST">
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
                                                    <h4>Create an Account</h4>
                                                </div>
                                                <div class="row gx-3">
                                                    <div class="form-group col-lg-12">
                                                        <label>Name</label>
                                                        <input class="form-control @error('name') is-invalid @enderror"
                                                            type="text" name="name" placeholder="Enter your name">
                                                        @error('name')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group col-lg-12">
                                                        <label>Email</label>
                                                        <input class="form-control @error('email') is-invalid @enderror"
                                                            type="email" name="email"
                                                            placeholder="example@gmail.com">
                                                        @error('email')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group col-lg-12">
                                                        <label>Phone</label>
                                                        <input class="form-control @error('phone') is-invalid @enderror"
                                                            type="text" name="phone"
                                                            placeholder="Enter your phone number">
                                                        @error('phone')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group col-lg-6">
                                                        <label>Gender</label>
                                                        <select
                                                            class="form-control @error('gender') is-invalid @enderror"
                                                            name="gender" required>
                                                            <option value="" selected disabled>Select gender
                                                            </option>
                                                            <option value="Male">Male</option>
                                                            <option value="Female">Female</option>
                                                        </select>
                                                        @error('gender')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group col-lg-6">
                                                        <label>Age</label>
                                                        <input class="form-control @error('age') is-invalid @enderror"
                                                            type="number" name="age" placeholder="Enter your age">
                                                        @error('age')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group col-lg-12">
                                                        <label>Birthday</label>
                                                        <input
                                                            class="form-control @error('birthday') is-invalid @enderror"
                                                            type="date" name="birthday">
                                                        @error('birthday')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group col-lg-12">
                                                        <label>Password</label>
                                                        <input
                                                            class="form-control @error('password') is-invalid @enderror"
                                                            type="password" name="password" placeholder="********"
                                                            required>
                                                        @error('password')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group col-lg-12">
                                                        <label>Confirm Password</label>
                                                        <input
                                                            class="form-control @error('password_confirmation') is-invalid @enderror"
                                                            type="password" name="password_confirmation"
                                                            placeholder="********" required>
                                                        @error('password_confirmation')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <button type="submit"
                                                    class="btn btn-primary btn-uppercase btn-block">Register</button>

                                                <div class="text-center mt-3">
                                                    <span class="text-muted">Already have an account?</span>
                                                    <a href="{{ route('patient.login') }}"
                                                        class="text-primary fw-bold">Login</a>
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
