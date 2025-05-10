@extends('layouts.main')

@section('header')
<div class="row mb-2">
    <div class="col-sm-6">
        <h1>Edit Data Kapal</h1>
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
                        <form action="{{ route('kapal.update', $kapal->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="card">
                                <div class="card-body">

                                    @foreach (['no_kapal' => 'No Kapal', 'tanggal' => 'Tanggal', 'nama_kapal' => 'Nama Kapal', 'pemilik' => 'Pemilik', 'kapasitas' => 'Kapasitas', 'total' => 'Total'] as $field => $label)
                                        <div class="form-group mb-3">
                                            <label for="{{ $field }}" class="form-label">{{ $label }}</label>
                                            <input type="{{ $field === 'tanggal' ? 'date' : 'text' }}" name="{{ $field }}" id="{{ $field }}"
                                                class="form-control @error($field) is-invalid @enderror"
                                                value="{{ old($field, $kapal->$field) }}">
                                            @error($field)
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    @endforeach

                                </div>
                                <div class="card-footer">
                                    <div class="d-flex justify-content-between">
                                        <a href="{{ route('kapal.index') }}" class="btn btn-sm btn-outline-secondary">Kembali</a>
                                        <button type="submit" class="btn btn-sm btn-primary">Update</button>
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
