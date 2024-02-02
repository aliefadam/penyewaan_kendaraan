<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="css/login.css">

    {{-- icons --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>
    @if (session('notifikasi'))
        @include('notifikasi')
    @endif

    <div class="login-box">
        <div class="logo">
            <i class="bi bi-car-front-fill"></i>
            <h1>Vehicle Manager</h1>
        </div>
        <h1>LOGIN</h1>
        <form action="/login" method="post">
            @csrf
            <div class="form-item">
                <input required type="text" name="email" id="email" placeholder="Email">
                <input required type="password" name="password" id="password" placeholder="Password">
                <button type="submit"><i class="bi bi-box-arrow-in-right"></i> Login</button>
            </div>
        </form>
    </div>
    <script src="{{ asset('js/script.js') }}"></script>
</body>

</html>
