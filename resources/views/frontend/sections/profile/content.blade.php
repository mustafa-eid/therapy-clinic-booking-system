<!-- Start Content here -->
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <!-- Success and Error Messages -->
            @include('frontend.sections.messages.content')
            <!-- Profile Information Section -->
            <div class="row" id="profileInfo">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body mt-3">
                            <div class="tab-pane active" id="personalDetails" role="tabpanel">
                                <div class="card-header">
                                    <h6 class="card-title mb-0">Personal Details</h6>
                                </div>
                                <div class="card-body">
                                    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
                                        @csrf
                                        @method('patch')
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="name" class="form-label">Name</label>
                                                    <input type="text" class="form-control" id="name"
                                                        name="name" placeholder="Enter your name"
                                                        value="{{ Auth::user()->name }}">
                                                    @if ($errors->has('name'))
                                                        <div class="text-danger mt-2">
                                                            {{ $errors->first('name') }}</div>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="email" class="form-label">Email
                                                        Address</label>
                                                    <input type="email" class="form-control" id="email"
                                                        name="email" placeholder="Enter your email"
                                                        value="{{ Auth::user()->email }}">
                                                    @if ($errors->has('email'))
                                                        <div class="text-danger mt-2">
                                                            {{ $errors->first('email') }}</div>
                                                    @endif
                                                    @if (Auth::user() instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !Auth::user()->hasVerifiedEmail())
                                                        <div>
                                                            <p class="text-sm mt-2 text-gray-800 dark:text-gray-200">
                                                                {{ __('Your email address is unverified.') }}
                                                                <button form="send-verification"
                                                                    class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                                                                    {{ __('Click here to re-send the verification email.') }}
                                                                </button>
                                                            </p>
                                                            @if (session('status') === 'verification-link-sent')
                                                                <p
                                                                    class="mt-2 font-medium text-sm text-green-600 dark:text-green-400">
                                                                    {{ __('A new verification link has been sent to your email address.') }}
                                                                </p>
                                                            @endif
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        <div class="flex items-center gap-4">
                                            <button type="submit" class="btn btn-primary">Save</button>
                                            @if (session('status') === 'profile-updated')
                                                <p class="text-sm text-green-600 dark:text-green-400 mt-2">
                                                    {{ __('Saved.') }}
                                                </p>
                                            @endif
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
            <!-- End Content here -->
            <!-- Start right Content here -->
            <section>
                <div class="row" id="passwordInfo">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body mt-3">
                                <div class="card-header">
                                    <h6 class="card-title mb-0">Update Password</h6>
                                </div>
                                <div class="card-body">
                                    <form method="post" action="{{ route('password.update') }}"
                                        class="mt-6 space-y-6">
                                        @csrf
                                        @method('put')
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <x-input-label for="update_password_current_password"
                                                        :value="__('Current Password')" />
                                                    <x-text-input id="update_password_current_password"
                                                        name="current_password" type="password" class="form-control"
                                                        autocomplete="current-password" />
                                                    @if ($errors->updatePassword->has('current_password'))
                                                        <div class="text-danger mt-2">
                                                            {{ $errors->updatePassword->first('current_password') }}
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <x-input-label for="update_password_password" :value="__('New Password')" />
                                                    <x-text-input id="update_password_password" name="password"
                                                        type="password" class="form-control"
                                                        autocomplete="new-password" />
                                                    @if ($errors->updatePassword->has('password'))
                                                        <div class="text-danger mt-2">
                                                            {{ $errors->updatePassword->first('password') }}
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <x-input-label for="update_password_password_confirmation"
                                                        :value="__('Confirm Password')" />
                                                    <x-text-input id="update_password_password_confirmation"
                                                        name="password_confirmation" type="password"
                                                        class="form-control" autocomplete="new-password" />
                                                    @if ($errors->updatePassword->has('password_confirmation'))
                                                        <div class="text-danger mt-2">
                                                            {{ $errors->updatePassword->first('password_confirmation') }}
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flex items-center gap-4">
                                            <button type="submit" class="btn btn-primary">Save</button>
                                            @if (session('status') === 'password-updated')
                                                <p class="text-sm text-green-600 dark:text-green-400 mt-2">
                                                    {{ __('Your password has been updated successfully.') }}
                                                </p>
                                            @endif
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div><!-- end col -->
                </div><!-- end row -->
            </section>
            <!-- End right Content here -->
        </div><!-- container-fluid -->
    </div><!-- End Page-content -->
</div><!-- end main content-->
