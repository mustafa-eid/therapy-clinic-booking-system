<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title> Habiby Clinic </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Meta Tags -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Habiby Clinic</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="https://clinic.kenooz.co/icon.png">
    <link rel="icon" href="https://clinic.kenooz.co/favicon.ico" type="image/x-icon">
    <!-- Perfect Scrollbar CSS -->
    <link href="https://clinic.kenooz.co/dist/css/perfect-scrollbar.css" rel="stylesheet" type="text/css">
    <!-- Dragula CSS -->
    <link href="https://clinic.kenooz.co/vendors/dragula/dist/dragula.min.css" rel="stylesheet" type="text/css">
    <!-- Bootstrap Dropify CSS -->
    <link href="https://clinic.kenooz.co/vendors/dropify/dist/css/dropify.min.css" rel="stylesheet" type="text/css">
    <!-- Daterangepicker CSS -->
    <link href="https://clinic.kenooz.co/vendors/daterangepicker/daterangepicker.css" rel="stylesheet" type="text/css">
    <!-- Bootstrap Colorpicker -->
    <link href="https://clinic.kenooz.co/vendors/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css"
        rel="stylesheet" type="text/css">
    <!-- Bootstrap Dropzone CSS -->
    <link href="https://clinic.kenooz.co/vendors/dropzone/dist/dropzone.min.css" rel="stylesheet" type="text/css">
    <!-- select2 CSS -->
    <link href="https://clinic.kenooz.co/vendors/select2/dist/css/select2.min.css" rel="stylesheet" type="text/css" />
    <!-- CSS -->
    <link href="https://clinic.kenooz.co/dist/css/style.css" rel="stylesheet" type="text/css">

    <link href="https://clinic.kenooz.co/vendors/@sweetalert2/theme-bootstrap-4/bootstrap-4.min.css" rel="stylesheet"
        type="text/css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.6.0/remixicon.css"
        integrity="sha512-kJlvECunwXftkPwyvHbclArO8wszgBGisiLeuDFwNM8ws+wKIw0sv1os3ClWZOcrEB2eRXULYUsm8OVRGJKwGA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.6.0/remixicon.min.css"
        integrity="sha512-XcIsjKMcuVe0Ucj/xgIXQnytNwBttJbNjltBV18IOnru2lDPe9KRRyvCXw6Y5H415vbBLRm8+q6fmLUU7DfO6Q=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>

    <div class="hk-wrapper hk-pg-auth" data-footer="simple">
        <div class="hk-pg-wrapper py-0">
            <div class="hk-pg-body py-0">
                <div class="container-fluid">
                    <div class="row auth-split">
                        <div class="col-xl-6 col-lg-6 col-md-12 position-relative mx-auto bg-primary-light-5">
                            <div class="auth-content flex-column pt-8 pb-md-8 pb-13">
                                <form action="{{ route('login') }}" method="POST">
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
                                                        <h4>Sign in to continue to your dashboard</h4>
                                                    </div>
                                                    <div class="row gx-3">
                                                        <div class="form-group col-lg-12">
                                                            <div class="form-label-group">
                                                                <label>Email</label>
                                                            </div>
                                                            <input
                                                                class="form-control @error('email') is-invalid @enderror"
                                                                placeholder="Enter your email" type="text"
                                                                name="email" value="{{ old('email') }}" required>
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
                                                                        placeholder="Enter your password"
                                                                        type="password" name="password" required
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
                                                            <input type="checkbox" class="form-check-input"
                                                                id="logged_in" checked="">
                                                            <label class="form-check-label text-muted fs-7"
                                                                for="logged_in">Keep me logged in</label>
                                                        </div>
                                                        <a href="{{ route('password.request') }}"
                                                            class="text-primary fw-bold">Forgot Password?</a>
                                                    </div>
                                                    <button type="submit"
                                                        class="btn btn-primary btn-uppercase btn-block">Login</button>
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
    <!-- jQuery -->
    <script src="https://clinic.kenooz.co/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap Core JS -->
    <script src="https://clinic.kenooz.co/vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- FeatherIcons JS -->
    <script src="https://clinic.kenooz.co/dist/js/feather.min.js"></script>
    <!-- Fancy Dropdown JS -->
    <script src="https://clinic.kenooz.co/dist/js/dropdown-bootstrap-extended.js"></script>
    <!-- Simplebar JS -->
    <script src="https://clinic.kenooz.co/vendors/simplebar/dist/simplebar.min.js"></script>
    <!-- Tinymce JS -->
    <script src="https://clinic.kenooz.co/vendors/tinymce/tinymce.min.js"></script>
    <!-- Dragula JS -->
    <script src="https://clinic.kenooz.co/vendors/dragula/dist/dragula.min.js"></script>
    <!-- PS Scroll JS -->
    <script src="https://clinic.kenooz.co/dist/js/perfect-scrollbar.min.js"></script>
    <script src="https://clinic.kenooz.co/vendors/moment/min/moment.min.js"></script>
    <script src="https://clinic.kenooz.co/dist/js/daterangepicker-data.js"></script>
    <script src="https://clinic.kenooz.co/vendors/dropzone/dist/dropzone.min.js"></script>
    <script src="https://clinic.kenooz.co/vendors/dropify/dist/js/dropify.min.js"></script>
    <script src="https://clinic.kenooz.co/dist/js/dropify-data.js"></script>
    <!-- Apex JS -->
    <script src="https://clinic.kenooz.co/vendors/apexcharts/dist/apexcharts.min.js"></script>
    <!-- Data Table JS -->
    <script src="https://clinic.kenooz.co/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="https://clinic.kenooz.co/vendors/datatables.net-bs5/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://clinic.kenooz.co/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="https://clinic.kenooz.co/vendors/datatables.net-buttons-bs5/js/buttons.bootstrap5.min.js"></script>
    <script src="https://clinic.kenooz.co/vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="https://clinic.kenooz.co/vendors/jszip/dist/jszip.min.js"></script>

    <script src="https://clinic.kenooz.co/vendors/pdfmake/build/vfs_fonts.js"></script>
    <script src="https://clinic.kenooz.co/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="https://clinic.kenooz.co/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="https://clinic.kenooz.co/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="https://clinic.kenooz.co/vendors/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js"></script>
    <script src="https://clinic.kenooz.co/vendors/datatables.net-select/js/dataTables.select.min.js"></script>
    <script src="https://clinic.kenooz.co/vendors/datatables.net-fixedcolumns/js/dataTables.fixedColumns.min.js"></script>
    <script src="https://clinic.kenooz.co/vendors/datatables.net-rowreorder/js/dataTables.rowReorder.min.js"></script>
    <script src="https://clinic.kenooz.co/dist/js/dataTables-data.js"></script>
    <!-- Select2 JS -->
    <script src="https://clinic.kenooz.co/vendors/select2/dist/js/select2.full.min.js"></script>
    <script src="https://clinic.kenooz.co/dist/js/select2-data.js"></script>
    <!-- Init JS -->
    <script src="https://clinic.kenooz.co/dist/js/kanban-board-data.js"></script>
    <script src="https://clinic.kenooz.co/dist/js/init.js"></script>
    <script src="https://clinic.kenooz.co/dist/js/chips-init.js"></script>

    <script src="https://clinic.kenooz.co/vendors/sweetalert2/dist/sweetalert2.min.js"></script>
    <script src="https://clinic.kenooz.co/dist/js/sweetalert-data.js"></script>
    <script>
        document.addEventListener('focusin', function(e) {
            if (e.target.closest('.select2-search__field') !== null) {
                e.stopImmediatePropagation();
            }
        });
    </script>
    <script>
        'undefined' === typeof _trfq || (window._trfq = []);
        'undefined' === typeof _trfd && (window._trfd = []), _trfd.push({
            'tccl.baseHost': 'secureserver.net'
        }, {
            'ap': 'cpsh-oh'
        }, {
            'server': 'sxb1plzcpnl489831'
        }, {
            'dcenter': 'sxb1'
        }, {
            'cp_id': '9919290'
        }, {
            'cp_cl': '8'
        })
    </script>
    <script src='https://img1.wsimg.com/traffic-assets/js/tccl.min.js'></script>

</body>

</html>
