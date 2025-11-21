<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Login</title>

<body>

    <div class="container">
        <h2>Login</h2>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Username -->
            <label>Username</label>
            <input type="text" name="username" required autofocus>

            <!-- Password -->
            <label>Password</label>
            <input type="password" name="password" required>

            <!-- Submit -->
            <button type="submit">
                Login
            </button>

            <div class="register-link">
                Belum punya akun? <a href="{{ route('register') }}">Daftar di sini</a>
            </div>

        </form>
    </div>

    <style>
        body {
            font-family: Arial;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: #f5f5f5;
            margin: 0;
        }

        .container {
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            width: 350px;
        }

        h2 {
            text-align: center;
            margin-bottom: 25px;
            color: #333;
            font-size: 24px;
        }

        label {
            font-weight: bold;
            margin-bottom: 5px;
            display: block;
        }

        input {
            width: 100%;
            padding: 10px;
            border-radius: 6px;
            border: 1px solid #ccc;
            margin-bottom: 15px;
            font-size: 14px;
        }

        button {
            width: 100%;
            padding: 10px;
            background: #1366d6;
            color: white;
            border: none;
            border-radius: 6px;
            font-size: 15px;
            cursor: pointer;
            margin-bottom: 15px;
        }

        button:hover {
            background: #0d4da5;
        }

        .register-link {
            text-align: center;
            font-size: 14px;
        }

        .register-link a {
            color: #1366d6;
            text-decoration: none;
            font-weight: bold;
        }

        .register-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>

</body>

</html>
