<!DOCTYPE html>
<html lang="es">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>LOGIN CYBERTCODE WEB</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('../../backend/assets/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('../../backend/assets/vendors/css/vendor.bundle.base.css') }}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{ asset('../../backend/assets/css/style.css') }}">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{ asset('../../backend/assets/images/favicon.png') }}" />
</head>

<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="m-0 row w-100">
                <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
                    <div class="mx-auto card col-lg-4">
                        <div class="px-5 py-5 card-body">
                            <h3 class="mb-3 text-left card-title">Iniciar sesión</h3>
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="form-group">
                                    <label for="email">Correo electrónico *</label>
                                    <input type="text" class="form-control p_input" name="email" id="email"
                                        autofocus>
                                </div>
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <div class="form-group">
                                    <label for="password">Contraseña *</label>
                                    <input type="password" class="form-control p_input" name="password" id="password"
                                        autocomplete="current-password">
                                </div>
                                @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <div class="form-group d-flex align-items-center justify-content-between">
                                    <div class="form-check">
                                        <label for="remember_me" class="form-check-label">
                                            <input type="checkbox" class="form-check-input" id="remember_me"
                                                name="remember"> Recordarme </label>
                                    </div>
                                    <a href="{{ route('password.request') }}" class="forgot-pass">recuperar
                                        contraseña</a>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary btn-block enter-btn">Acceder al
                                        sistema</button>
                                </div>
                                <div class="d-flex">
                                    <button class="btn btn-facebook me-2 col">
                                        <i class="mdi mdi-facebook"></i> Facebook </button>
                                    <button class="btn btn-google col">
                                        <i class="mdi mdi-google-plus"></i> Google plus </button>
                                </div>
                                <p class="sign-up">Don't have an Account?<a href="#"> Sign Up</a></p>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- content-wrapper ends -->
            </div>
            <!-- row ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="{{ asset('../../backend/assets/vendors/js/vendor.bundle.base.js') }}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{ asset('../../backend/assets/js/off-canvas.js') }}"></script>
    <script src="{{ asset('../../backend/assets/js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('../../backend/assets/js/misc.js') }}"></script>
    <script src="{{ asset('../../backend/assets/js/settings.js') }}"></script>
    <script src="{{ asset('../../backend/assets/js/todolist.js') }}"></script>
    <!-- endinject -->
</body>

</html>
