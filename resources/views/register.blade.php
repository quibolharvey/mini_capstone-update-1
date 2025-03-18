<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    <h2>Register</h2>
    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif
    <form action="{{ route('register') }}" method="POST">
        @csrf
        <label>Name:</label>
        <input type="text" name="name" required>
        <br>

        <label>Email:</label>
        <input type="email" name="email" required>
        <br>

        <label>Password:</label>
        <input type="password" name="password" required>
        <br>

        <label>Confirm Password:</label>
        <input type="password" name="password_confirmation" required>
        <br>

        <button type="submit">Register</button>
    </form>
</body>
</html>
