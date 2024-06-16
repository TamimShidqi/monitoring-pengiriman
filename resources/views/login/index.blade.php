<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: #B3C8CF;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
        }
        .login-box {
            background: hsla(0, 0%, 95%, 0.7);
            padding: 40px;
            border-radius: 10px;
            backdrop-filter: blur(10px);
            width: 500px; /* Adjust the width as needed */
        }
        .btn {
            color: white;
        }
        .btn-primary {
            background-color: #2575fc;
            border: none;
            border-radius: 10px;
            font-size: 1.3rem;
            padding: 10px;
        }
        .btn-primary:hover {
            background-color: #4d8eff;
        }
        .card-header {
            border-bottom: none;
        }
        .form-control {
            font-size: 1.2rem;
            padding: 8px;
            border-radius: 5px;
        }
        .alert-danger {
            background-color: rgba(255, 0, 0, 0.8);
        }
        .card-header img {
            max-width: 100px; /* Adjust logo size */
        }
        .input-group-text {
            font-size: 1.5rem; /* Increase icon size */
        }
        .login-box-msg {
            font-size: 1.5rem; /* Increase login message size */
            color: black; /* Change text color */
        }
        .card-header h2 {
            font-family: lato, sans-serif;
            font-size: 1.8rem;
            color: black; /* Change text color */
        }
        .input-group {
            margin-bottom: 15px; /* Add space between form-control elements */
        }
    </style>
</head>
<body>
    <div class="login-box" align='center'>
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                {{-- <img src="https://via.placeholder.com/150" alt="Logo" class="img-fluid mb-3"> --}}
                <h2>PT. Dul Jaya Sempurna</h2>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Masukkan Akun Anda</p>
                <form action="{{ route('login') }}" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Email" name="email" required>
                        <div class="input-group-append">
                            {{-- <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div> --}}
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Password" name="password" required>
                        <div class="input-group-append">
                            {{-- <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div> --}}
                        </div>
                    </div>
                    @if (session()->has('loginerror'))
                    <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                        Login Gagal, Username / Password Salah
                    </div>
                @endif
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block">Login</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1