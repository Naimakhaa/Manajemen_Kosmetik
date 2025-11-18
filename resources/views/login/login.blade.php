<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Login SIMAKO">
    <meta name="author" content="">

    <title>SIMAKO - Login</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('css/sb-admin-2.css') }}" rel="stylesheet"> /*'css/sb-admin-2.min.css'*/
</head>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="row justify-content-center">

            <div class="col-xl-6 col-lg-8 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">

                        <div class="row">

                            {{-- LEFT IMAGE --}}
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>

                            <div class="col-lg-6">
                                <div class="p-5">

                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-1">SIMAKO</h1>
                                        <span class="small text-muted">Sistem Manajemen Kosmetik</span>
                                        <hr>
                                        <h2 class="h5 text-gray-900 mb-4">Login</h2>
                                    </div>

                                    {{-- Global Error Use Case (E-1, E-2, E-3) --}}
                                    @if ($errors->has('loginError'))
                                    <div class="alert alert-danger small py-2 text-center">
                                        {{ $errors->first('loginError') }}
                                    </div>
                                    @endif

                                    {{-- Pesan sukses jika diperlukan --}}
                                    @if (session('success'))
                                    <div class="alert alert-success small py-2 text-center">
                                        {{ session('success') }}
                                    </div>
                                    @endif

                                    <form class="user" method="POST" action="/login">
                                        @csrf

                                        {{-- EMAIL --}}
                                        <div class="form-group">
                                            <input
                                                type="email"
                                                name="email"
                                                class="form-control form-control-user @error('email') is-invalid @enderror"
                                                placeholder="Masukkan alamat email..."
                                                value="{{ old('email') }}"
                                                required
                                                autofocus>
                                            @error('email')
                                            <small class="text-danger pl-2">{{ $message }}</small>
                                            @enderror
                                        </div>

                                        {{-- PASSWORD --}}
                                        <div class="form-group position-relative">
                                            <input
                                                type="password"
                                                id="password"
                                                name="password"
                                                class="form-control form-control-user @error('password') is-invalid @enderror"
                                                placeholder="Kata sandi"
                                                required>
                                            @error('password')
                                            <small class="text-danger pl-2">{{ $message }}</small>
                                            @enderror
                                        </div>

                                        {{-- Remember Me --}}
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input
                                                    type="checkbox"
                                                    class="custom-control-input"
                                                    id="remember"
                                                    name="remember">
                                                <label class="custom-control-label" for="remember">
                                                    Ingat saya
                                                </label>
                                            </div>
                                        </div>

                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Login
                                        </button>
                                    </form>

                                    <div class="text-center mt-3">
                                        <small class="text-muted">
                                            Masuk untuk mengelola produk & laporan kosmetik Anda.
                                        </small>
                                    </div>

                                </div>
                            </div>

                        </div> <!-- ROW -->

                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- JS FILES -->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>

</body>

</html>