@extends('layouts.main')

@section('header')
<div class="row mb-2">
    <div class="col-sm-6">
        <h1 class="m-0">Profil Saya</h1>
    </div>
</div>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form method="POST" action="{{ route('profile.update') }}">
            @csrf

            <div class="form-group">
                <label>Nama</label>
                <input type="text" class="form-control" value="{{ auth()->user()->nama }}" required>
            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" value="{{ auth()->user()->email }}" required>
            </div>

            <div class="form-group">
                <label>Password Baru</label>
                <input type="password" name="password"  class="form-control" required>
            </div>

            <div class="form-group">
                <label>Konfirmasi Password</label>
                <input type="password" name="password_confirmation"  class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Perbarui Password</button>
        </form>
    </div>
</div>
@endsection
