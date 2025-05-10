<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background-color: #f5f7fa;">

<section class="p-3 p-md-4 p-xl-5">
    <div class="container">
        <div class="card border-light-subtle shadow-sm">
            <div class="row g-0">

                <!-- Form Registrasi -->
                <div class="col-12 col-md-6">
                    <div class="card-body p-4 p-md-5">
                        <h3 class="mb-4 text-center">Registrasi</h3>

                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach($errors->all() as $e)
                                        <li>{{ $e }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('register.post') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label>Nama</label>
                                <input type="text" name="nama" class="form-control" required value="{{ old('nama') }}">
                            </div>

                            <div class="mb-3">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control" required value="{{ old('email') }}">
                            </div>

                            <div class="mb-3">
                                <label>No HP (Opsional)</label>
                                <input type="text" name="no_hp" class="form-control" value="{{ old('no_hp') }}">
                            </div>

                            <div class="mb-3">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label>Konfirmasi Password</label>
                                <input type="password" name="password_confirmation" class="form-control" required>
                            </div>

                            <div class="d-flex justify-content-between align-items-center">
                                <a href="{{ route('login') }}">Sudah punya akun?</a>
                                <button type="submit" class="btn btn-success">Daftar</button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Gambar di sebelah kanan -->
                <div class="col-12 col-md-6 d-none d-md-block">
                    <img class="img-fluid rounded-end w-100 h-100 object-fit-contain p-4" src="{{ asset('templates/dist/img/logo.png') }}" alt="Register Image">
                </div>

            </div>
        </div>
    </div>
</section>

</body>
</html>
