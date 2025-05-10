@extends('layouts.main')

@section('header')
<h1>Edit User</h1>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('user.update', $user->id) }}" method="POST">
            @csrf @method('PUT')

            <div class="form-group">
                <label>Nama</label>
                <input type="text" name="nama" class="form-control" value="{{ old('nama', $user->nama) }}" required>
            </div>

            <div class="form-group mt-2">
                <label>Email</label>
                <input type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}" required>
            </div>

            <div class="form-group mt-2">
                <label>Password (biarkan kosong jika tidak diubah)</label>
                <input type="password" name="password" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary mt-3">Simpan Perubahan</button>
            <a href="{{ route('user.index') }}" class="btn btn-secondary mt-3">Batal</a>
        </form>
    </div>
</div>
@endsection
