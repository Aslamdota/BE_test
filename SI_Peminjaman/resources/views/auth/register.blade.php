<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
</head>
<body>
<h2>Register</h2>
<form method="POST" action="{{ route('register') }}">
    @csrf
    <label>Nama</label>
    <input type="text" name="name" value="{{ old('name') }}">
    @error('name')<p style="color:red;">{{ $message }}</p>@enderror

    <label>Email</label>
    <input type="email" name="email" value="{{ old('email') }}">
    @error('email')<p style="color:red;">{{ $message }}</p>@enderror

    <label>Password</label>
    <input type="password" name="password">
    @error('password')<p style="color:red;">{{ $message }}</p>@enderror

    <label>Konfirmasi Password</label>
    <input type="password" name="password_confirmation">

    <button type="submit">Register</button>
</form>
<p>Sudah punya akun? <a href="{{ route('login') }}">Login</a></p>
</body>
</html>
