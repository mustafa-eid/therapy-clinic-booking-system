{{-- <x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}

<!doctype html>
<html lang="en" data-layout="vertical" data-sidebar="dark" data-sidebar-size="lg" data-preloader="disable"
    data-theme="default" data-topbar="light" data-bs-theme="light">

<head>
    <meta charset="utf-8">
    <title>Sign In | Habiby Clinic</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=no">
    <meta content="Minimal Admin & Dashboard Template" name="description">
    <meta content="Themesbrand" name="author">
    <link rel="shortcut icon" href="{{ asset('assets/images/logo.png') }}">

    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/app.min.css" rel="stylesheet" type="text/css">
    <script src="assets/js/layout.js"></script>

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #cb111100 0%, #2575fc 100%);
            margin: 0;
            padding: 0;
        }

        .auth-page-wrapper {
            background: rgba(255, 255, 255, 0.9);
            border-radius: 10px;
            padding: 40px 20px;
            min-height: 100vh;
            display: flex;
            flex-wrap: wrap;
        }

        .logo-col {
            flex: 0 0 50%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .form-col {
            flex: 0 0 50%;
        }

        .card {
            border: none;
            border-radius: 20px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        .card-body {
            padding: 25px;
        }

        .form-control {
            border-radius: 12px;
            border: 1px solid #ddd;
        }

        .btn-primary {
            background-color: #6a11cb;
            border-color: #6a11cb;
            border-radius: 12px;
            padding: 10px;
            width: 100%;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .invalid-feedback {
            display: block;
            color: red;
        }
    </style>
</head>

<body>

    <section class="auth-page-wrapper py-5">
        <div class="container">
            <div class="row w-100">
                <!-- Left side with Logo -->
                <div class="logo-col">
                    <img src="{{ asset('assets/images/logo.png') }}" alt="Logo" height="170">
                </div>

                <!-- Right side with Login Form -->
                <div class="form-col">
                    <div class="card mb-0 border-0 shadow-none">
                        <div class="card-body p-sm-5 m-lg-4">
                            <div class="text-center mt-3">
                                <h5 class="fs-3xl">Welcome to Habiby Clinic</h5>
                                <p class="text-muted">Sign in to continue to your dashboard.</p>
                            </div>

                            @if (session('status'))
                                <div class="alert alert-success">
                                    {{ session('status') }}
                                </div>
                            @endif

                            <div class="p-2 mt-4">
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email <span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control @error('email') is-invalid @enderror" 
                                            name="email" id="email" placeholder="Enter email" value="{{ old('email') }}" required>
                                        @error('email')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="password-input" class="form-label">Password <span
                                                class="text-danger">*</span></label>
                                        <div class="position-relative">
                                            <input type="password" class="form-control @error('password') is-invalid @enderror" 
                                                placeholder="Enter password" id="password-input" name="password" required>
                                            @error('password')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value=""
                                                id="auth-remember-check" name="remember">
                                            <label class="form-check-label" for="auth-remember-check">Remember
                                                me</label>
                                        </div>

                                        @if (Route::has('password.request'))
                                            <a href="{{ route('password.request') }}">Forgot your password?</a>
                                        @endif
                                    </div>

                                    <div class="mt-3">
                                        <button class="btn btn-primary w-100" type="submit">Sign In</button>
                                    </div>
                                </form>
                            </div>
                        </div><!-- end card body -->
                    </div><!-- end card -->
                </div><!-- end form-col -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section>

    <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/libs/simplebar/simplebar.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/pages/password-addon.init.js"></script>

</body>

</html>
