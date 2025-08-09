<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
<h2>Login</h2>
@if(session('success'))
    <p style="color:green;">{{ session('success') }}</p>
@endif
<form method="POST" action="{{ route('login') }}">
    @csrf
    <label>Email</label>
    <input type="email" name="email" value="{{ old('email') }}">
    @error('email')<p style="color:red;">{{ $message }}</p>@enderror

    <label>Password</label>
    <input type="password" name="password">
    @error('password')<p style="color:red;">{{ $message }}</p>@enderror

    <button type="submit">Login</button>
</form>
<p>Belum punya akun? <a href="{{ route('register') }}">Register</a></p>
</body>
</html>
