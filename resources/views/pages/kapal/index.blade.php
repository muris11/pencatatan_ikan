@extends('layouts.main')

@section('header')
<div class="row mb-1">
    <h1>Data Kapal</h1>
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
    <div class="bg-image h-100" style="background-color: #8EA7C3;">
        <div class="mask d-flex align-items-center h-100">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-end">
                                @if (auth()->user()->role !== 'user')
                                <a href="{{ route('kapal.create') }}" class="btn btn-sm btn-primary">
                                    Tambah Kapal
                                </a>
                                @endif
                            </div>
                            <div class="card-body p-0">
                                <div class="table-responsive table-scroll" data-mdb-perfect-scrollbar="true" style="position: relative;">
                                    <table class="table table-striped mb-0">
                                        <thead style="background-color: #0088ff;">
                                            <tr>
                                                <th class="text-white">No</th>
                                                <th class="text-white">No Kapal</th>
                                                <th class="text-white">Tanggal</th>
                                                <th class="text-white">Nama Kapal</th>
                                                <th class="text-white">Pemilik</th>
                                                <th class="text-white">Kapasitas</th>
                                                <th class="text-white">Total</th>
                                                @if(Auth::user()->role === 'admin')
                                                    <th class="text-white">Ditambahkan oleh</th>
                                                @endif
                                                @if (auth()->user()->role !== 'user')
                                                <th class="text-white">Aksi</th>
                                                @endif
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($kapals as $kapal)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $kapal->no_kapal }}</td>
                                                <td>{{ \Carbon\Carbon::parse($kapal->tanggal)->translatedFormat('d F Y') }}</td>
                                                <td>{{ $kapal->nama_kapal }}</td>
                                                <td>{{ $kapal->pemilik }}</td>
                                                <td>{{ $kapal->kapasitas }}</td>
                                                <td>{{ $kapal->total }}</td>
                                                @if(Auth::user()->role === 'admin')
                                                    <td>{{ $kapal->user->nama ?? '-' }}</td>
                                                @endif
                                                @if (auth()->user()->role !== 'user')
                                                <td>
                                                    <div class="d-flex">
                                                        <a href="{{ route('kapal.edit', $kapal->id) }}" class="btn btn-warning btn-sm mr-1">
                                                            Edit
                                                        </a>
                                                        <form action="{{ route('kapal.destroy', $kapal->id) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus data ini?')">
                                                                Hapus
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                                @endif
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
