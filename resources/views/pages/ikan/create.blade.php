@extends('layouts.main')

@section('header')
<div class="row mb-2">
    <div class="col-sm-6">
        <h1>Tambah Ikan</h1>
    </div>
</div>
@endsection

@section('content')
<section class="intro">
    <div class="bg-image h-100" style="background-color: #f5f7fa;">
        <div class="mask d-flex align-items-center h-100">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <form action="{{ route('ikan.store') }}" method="POST">
                            @csrf
                            <div class="card">
                                <div class="card-body">

                                    {{-- Nama Ikan --}}
                                    <div class="form-group mb-3">
                                        <label for="nama" class="form-label">Nama Ikan</label>
                                        <input type="text" name="nama" id="nama"
                                            class="form-control @error('nama') is-invalid @enderror"
                                            value="{{ old('nama') }}">
                                        @error('nama')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- Kategori Ikan --}}
                                    <div class="form-group mb-3">
                                        <label for="kategori_id" class="form-label">Kategori Ikan</label>
                                        <select name="kategori_id" id="kategori_id"
                                            class="form-control @error('kategori_id') is-invalid @enderror">
                                            <option value="" disabled selected>Pilih Kategori</option>
                                            @foreach ($categories as $kategori)
                                                <option value="{{ $kategori->id }}"
                                                    {{ old('kategori_id') == $kategori->id ? 'selected' : '' }}>
                                                    {{ $kategori->nama_kategori }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('kategori_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- Harga per KG --}}
                                    <div class="form-group mb-3">
                                        <label for="harga_per_kg" class="form-label">Harga Per KG</label>
                                        <input type="number" name="harga_per_kg" id="harga_per_kg"
                                            class="form-control @error('harga_per_kg') is-invalid @enderror"
                                            value="{{ old('harga_per_kg') }}">
                                        @error('harga_per_kg')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- Jumlah (KG) --}}
                                    <div class="form-group mb-3">
                                        <label for="jumlah" class="form-label">Jumlah (KG)</label>
                                        <input type="number" name="jumlah" id="jumlah"
                                            class="form-control @error('jumlah') is-invalid @enderror"
                                            value="{{ old('jumlah') }}">
                                        @error('jumlah')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                </div>
                                <div class="card-footer">
                                    <div class="d-flex justify-content-between">
                                        <a href="{{ route('ikan.index') }}" class="btn btn-sm btn-outline-secondary">Kembali</a>
                                        <button type="submit" class="btn btn-sm btn-primary">Tambah</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
