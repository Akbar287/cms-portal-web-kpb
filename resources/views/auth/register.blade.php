<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Login') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Icon -->
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
</head>

<body>
    <div id="app">
        <section class="section">
            <div class="container mt-2">
                <div class="row justify-content-center">
                    <div class="col-12 col-sm-12 col-md-8">
                        <div class="login-brand">
                            <img src="../images/logo.png" alt="logo" width="100" class="shadow-light">
                        </div>
                        <div class="card card-primary">
                            <div class="card-header">
                                <h4>{{ __('Register') }}</h4>
                            </div>

                            <div class="card-body">
                                <form method="POST" action="{{ route('register') }}" class="form-register">
                                    @csrf

                                    <div class="row mb-3">
                                        <label for="nik" class="col-md-4 col-form-label text-md-end">{{ __('NIK')
                                            }}</label>

                                        <div class="col-md-6">
                                            <div class="input-group">
                                                <input id="nik" type="text"
                                                    class="form-control @error('nik') is-invalid @enderror form-number"
                                                    id="nik" name="nik" value="{{ old('nik') }}" required
                                                    autocomplete="nik" autofocus>
                                                <div class="input-group-append">
                                                    <button class="btn btn-primary" type="button" id="cek-nik">Cek
                                                        Nik</button>
                                                </div>
                                            </div>

                                            @error('nik')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="nomorKk" class="col-md-4 col-form-label text-md-end">{{ __('Nomor
                                            KK')
                                            }}</label>

                                        <div class="col-md-6">
                                            <input id="nomorKk" type="text"
                                                class="form-control @error('nomorKk') is-invalid @enderror form-number"
                                                name="nomor_kk" value="{{ old('nomorKk') }}" required
                                                autocomplete="nomorKk" readonly autofocus>

                                            @error('nomorKk')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="nama" class="col-md-4 col-form-label text-md-end">{{ __('Nama')
                                            }}</label>

                                        <div class="col-md-6">
                                            <input id="nama" type="text"
                                                class="form-control @error('nama') is-invalid @enderror" name="nama"
                                                value="{{ old('nama') }}" readonly required autocomplete="name"
                                                autofocus>

                                            @error('nama')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email')
                                            }}</label>

                                        <div class="col-md-6">
                                            <input id="email" type="email"
                                                class="form-control @error('email') is-invalid @enderror" name="email"
                                                value="{{ old('email') }}" readonly required autocomplete="email">

                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="username" class="col-md-4 col-form-label text-md-end">{{
                                            __('Username')
                                            }}</label>

                                        <div class="col-md-6">
                                            <input id="username" type="text"
                                                class="form-control @error('username') is-invalid @enderror"
                                                name="username" value="{{ old('username') }}" readonly required
                                                autocomplete="username">

                                            @error('username')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="password" class="col-md-4 col-form-label text-md-end">{{
                                            __('Password') }}</label>

                                        <div class="col-md-6">
                                            <input id="password" type="password"
                                                class="form-control @error('password') is-invalid @enderror"
                                                name="password" required readonly autocomplete="new-password">

                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{
                                            __('Confirm Password') }}</label>

                                        <div class="col-md-6">
                                            <input id="password-confirm" type="password" class="form-control"
                                                name="password_confirmation" readonly required
                                                autocomplete="new-password">
                                        </div>
                                    </div>

                                    <div class="row mb-0">
                                        <div class="col-md-6 offset-md-4 d-flex align-items-end">
                                            <button type="submit" disabled class="btn btn-primary">
                                                {{ __('Register') }}
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="simple-footer">
                            Copyright &copy; e-KPB {{ now()->year }}
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</body>

</html>