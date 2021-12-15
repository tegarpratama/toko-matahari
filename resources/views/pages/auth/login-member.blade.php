<!DOCTYPE html>
<html class="h-100" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Login Page</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/favicon.png') }}">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

</head>

<body class="h-100 gradient-6">
    <div class="login-form-bg h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100">
                <div class="col-xl-6">
                    <div class="form-input-content">
                        <div class="card login-form mb-0">
                            <div class="card-body pt-5">
                                <h2 class="text-center">Selamat Datang</h2>

                                @if (session('status'))
                                    <div class="row mt-3 mb-3">
                                        <div class="col">
                                            <div class="alert alert-success text-center" role="alert">
                                                <strong>{{ session('status') }}</strong>
                                            </div>
                                        </div>
                                    </div>
                                @endif

                                <form method="POST" action="{{ route('member.post.login') }}" class="mt-4 mb-5 login-input">
                                    @csrf
                                    <div class="form-group">
                                        <input type="text" class="form-control pl-3" name="username" placeholder="Username" required autofocus>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control pl-3" placeholder="Password" name="password" required autocomplete="current-password">
                                    </div>
                                    <button class="btn  btn-info submit w-100">MASUK</button>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--**********************************
        Scripts
    ***********************************-->
    <script src="{{ asset('plugins/common/common.min.js') }}"></script>
    <script src="{{ asset('js/custom.min.js') }}"></script>
    <script src="{{ asset('js/settings.js') }}"></script>
    <script src="{{ asset('js/gleek.js') }}"></script>
    <script src="{{ asset('js/styleSwitcher.js') }}"></script>
</body>
</html>
