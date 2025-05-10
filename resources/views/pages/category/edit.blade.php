@extends('layouts.main')

@section('header')
<h1>Edit Kategori</h1>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('category.update', $category->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nama_kategori">Nama Kategori</label>
                <input type="text" name="nama_kategori" class="form-control" value="{{ $category->nama_kategori }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('category.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@endsection
