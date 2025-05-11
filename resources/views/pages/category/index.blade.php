@extends('layouts.main')

@section('header')
<div class="row mb-1">
    <h1>Data Kategori</h1>
</div>
@endsection

@section('content')
<section class="intro">
    <div class="bg-image h-100" style="background-color: #8EA7C3;">
        <div class="mask d-flex align-items-center h-100">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-end">
                                <a href="{{ route('category.create') }}" class="btn btn-sm btn-primary">
                                    Tambah Kategori
                                </a>
                            </div>
                            <div class="card-body p-0">
                                <div class="table-responsive table-scroll" style="position: relative; height: auto;">
                                    <table class="table table-striped mb-0">
                                        <thead style="background-color: #0088ff;">
                                            <tr>
                                                <th class="text-white">No</th>
                                                <th class="text-white">Nama Kategori</th>
                                                <th class="text-white">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($categories as $category)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $category->nama_kategori }}</td>
                                                <td>
                                                    <div class="d-flex">
                                                        <a href="{{ route('category.edit', $category->id) }}" class="btn btn-warning btn-sm mr-1">
                                                            Edit
                                                        </a>
                                                        <form action="{{ route('category.destroy', $category->id) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">
                                                                Hapus
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div> <!-- card-body -->
                        </div> <!-- card -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
