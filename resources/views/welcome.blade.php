<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ELeave Tracker</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <!-- Styles -->
    <style>
        body {
            font-family: 'Nunito', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f3f4f6;
            color: #333;
        }
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            text-align: center;
        }
        .heading {
            font-size: 3rem;
            font-weight: bold;
            margin-bottom: 20px;
            color: #007bff;
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.1);
        }
        .auth-links {
            margin-top: 20px;
        }
        .auth-links a {
            color: #007bff;
            text-decoration: none;
            font-weight: bold;
            margin: 0 10px;
        }
        .auth-links a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <div>
            <h1 class="heading">Leave Tracker</h1>
            <div class="auth-links">
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Log in</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                @endif
            </div>
            <a href="{{ url('/admin') }}">Admin</a>
        </div>
    </div>
</body>
</html>
