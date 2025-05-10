@extends('layouts.main')

@section('header')
<div class="row mb-1">
    <h1>Data Ikan</h1>
    <div class="col-10 text-right">
        <div class="card d-inline-block mt-1 p-2 shadow-sm" style="border-radius: 10px;">
            <div style="font-size: 1.25rem; font-weight: 500;" class="text-muted m-0">
                {{ \Carbon\Carbon::now()->translatedFormat('l, d F Y') }}
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
<section class="intro">
    <div class="bg-image h-100" style="background-color: #f5f7fa;">
        <div class="mask d-flex align-items-center h-100 ">
            <div class="container ">
                <div class="row justify-content-center ">
                    <div class="col-12 ">
                        <div class="card ">
                            <div class="card-header d-flex justify-content-end">
                                <a href="{{ route('ikan.create') }}" class="btn btn-sm btn-primary">
                                    Tambah Ikan
                                </a>
                            </div>
                            <div class="card-body p-0 ">
                                <div class="table-responsive table-scroll" data-mdb-perfect-scrollbar="true" style="position: relative;">
                                    <table class="table table-striped mb-0">
                                        <thead style="background-color: #0088ff;">
                                            <tr>
                                                <th class="text-white">No</th>
                                                <th class="text-white">Nama</th>
                                                <th class="text-white">Kategori</th>
                                                <th class="text-white">Jumlah</th>
                                                <th class="text-white">Harga</th>
                                                <th class="text-white">Total Harga</th>
                                                @if(Auth::user()->role === 'admin')
                                                    <th class="text-white">Ditambahkan oleh</th>
                                                @endif
                                                <th class="text-white">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($ikans as $index => $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->nama }}</td>
                                                <td>{{ $item->kategori ? $item->kategori->nama_kategori : 'RELASI NULL' }}</td>
                                                <td>{{ $item->jumlah }}</td>
                                                <td>Rp {{ number_format($item->harga_per_kg, 0, ',', '.') }}</td>
                                                <td>Rp {{ number_format($item->harga_total, 0, ',', '.') }}</td>
                                                @if(Auth::user()->role === 'admin')
                                                    <td>{{ $item->user->nama ?? '-' }}</td>
                                                @endif
                                                <td>
                                                    <div class="d-flex">
                                                        <a href="{{ route('ikan.edit', $item->id) }}" class="btn btn-warning btn-sm mr-1">
                                                            Edit
                                                        </a>
                                                        <form action="{{ route('ikan.destroy', $item->id) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger btn-sm">
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
