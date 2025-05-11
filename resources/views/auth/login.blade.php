<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-image: url('{{ asset('templates/dist/img/bg.jpg') }}');
            background-size: cover;
            background-position: center;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .form-card {
            background: rgb(142, 167, 195); /* semi-transparan */
            border-radius: 15px;
            box-shadow: 0 0 15px rgba(0,0,0,0.2);
        }
    </style>
</head>
<body>

<section class="p-3 p-md-4 p-xl-5 w-100">
    <div class="container">
        <div class="card form-card">
            <div class="row g-0">

                <!-- Form Login -->
                <div class="col-12 col-md-6">
                    <div class="card-body p-4 p-md-5">
                        <h3 class="mb-4 text-center text-white">Login</h3>

                        @if(session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif

                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach($errors->all() as $e)
                                        <li>{{ $e }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('login.post') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="email" class="form-label text-white">Email</label>
                                <input type="email" name="email" class="form-control" required autofocus>
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label text-white">Password</label>
                                <input type="password" name="password" class="form-control" required>
                            </div>

                            <div class="d-flex justify-content-between align-items-center">
                                <a href="{{ route('register') }}" >Belum punya akun?</a>
                                <button type="submit" class="btn btn-primary">Login</button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Gambar di sebelah kanan -->
                <div class="col-12 col-md-6 d-none d-md-block">
                    <img class="img-fluid rounded-end w-100 h-100 object-fit-contain p-4" src="{{ asset('templates/dist/img/logo.png') }}" alt="Login Image">
                </div>

            </div>
        </div>
    </div>
</section>

</body>
</html>
