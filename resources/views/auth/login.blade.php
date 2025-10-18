<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>
<body>
    <form class="login-form" method="POST" action="{{ route('login.authenticate') }}">
        @csrf
        <div class="flex-row">
            <input name="username" class="lf--input" placeholder="Username" type="text" required>
        </div>
        <div class="flex-row">
            <input name="password" class="lf--input" placeholder="Password" type="password" required>
        </div>
        <input class="lf--submit" type="submit" value="LOGIN">
    </form>

    @if ($errors->any())
        <div style="color:red">
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

</body>
</html>