@extends('layouts.main')

@section('header')
<h1>Tambah Kategori</h1>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('category.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nama_kategori">Nama Kategori</label>
                <input type="text" name="nama_kategori" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('category.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>
@endsection
