<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        body {
            background: linear-gradient(to right, #003366, #006699, #66ccff);
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            font-family: "Ubuntu", sans-serif;
            font-style: normal;
            font-weight: 400;
            overflow: hidden;
        }
        .login-container {
            background: rgba(255, 255, 255, 0.9);
            padding: 2rem;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
            max-width: 400px;
            width: 100%;
            position: relative;
        }
        .login-container h1 {
            margin-bottom: 1.5rem;
            font-size: 2rem;
            color: #003366;
            font-weight: bold;
        }
        .login-container .form-control {
            border-radius: 0.5rem;
            box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.1);
            transition: box-shadow 0.3s ease;
        }
        .login-container .form-control:focus {
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
            border-color: #006699;
        }
        .login-container .btn {
            border-radius: 0.5rem;
            background: linear-gradient(45deg, #003366, #006699);
            border: none;
            color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            transition: background 0.3s, box-shadow 0.3s;
        }
        .login-container .btn:hover {
            background: linear-gradient(45deg, #002244, #004080);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3);
        }
        .login-container .form-group {
            margin-bottom: 1.5rem;
        }
        .login-container .form-check-label {
            font-size: 0.875rem;
        }
        .login-container .text-center a {
            color: #006699;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h1 class="text-center">Login</h1>
        <form action="/login/auth" method="post">
            @csrf

            <div class="form-group">
                <label for="username">Nama Pengguna</label>
                <input type="text" class="form-control" name="username" id="username" placeholder="Nama Pengguna" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
            </div>
            <div class="form-check mb-3">
                <input type="checkbox" class="form-check-input" id="rememberMe">
                <label class="form-check-label" for="rememberMe">Remember me</label>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Login</button>
        </form>
        <div class="text-center mt-3">
            <a href="#">Forgot password lo?</a>
        </div>
    </div>
    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
