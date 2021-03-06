
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin :: @yield('title')</title>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/fontawesome-all.css">
    <link rel="stylesheet" href="/css/style.css">
</head>
<body style="">

<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="login-wrapper d-flex justify-content-center .align-items-center flex-column">
                <h3 class="text-center font-weight-bold text-logo">Jon Jalic Admin</h3>

                <div class="login-box align-items-center">
                    @include('includes.message')
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
</div>

<script src="/js/jquery-3.2.1.min.js"></script>
<script src="/js/bootstrap.bundle.min.js"></script>
<script src="/js/script.js"></script>
</body>
</html>
