@extends('layouts.main')

@section('header')
<div class="row mb-1">
    <h1>Data Ikan</h1>
    <div class="col-10 text-right">
        <div class="card d-inline-block mt-1 p-2 shadow-sm" style="border-radius: 10px;">
            <div style="font-size: 1.25rem; font-weight: 500; font-family: 'Poppins', sans-serif;" class="text-muted m-0">
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

                        {{-- Notifikasi admin --}}
                        @if (auth()->user()->role === 'admin')
                            @php
                                $notifications = \App\Models\Notification::latest()->get();
                            @endphp
                            <div class="card mb-4">
                                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                                    <span>Notifikasi Ikan Melebihi Batas</span>
                                </div>
                                <div class="card-body">
                                    @if ($notifications->isEmpty())
                                        <p class="text-muted">Belum ada notifikasi.</p>
                                    @else
                                        <ul class="list-group">
                                            @foreach ($notifications as $notif)
                                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                                    <div>
                                                        {{ $notif->message }}
                                                        <br>
                                                        <small class="text-muted">{{ $notif->created_at->diffForHumans() }}</small>
                                                    </div>
                                                    <form action="{{ route('notifications.destroy', $notif->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus notifikasi ini?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-sm btn-danger">Hapus</button>
                                                    </form>
                                                </li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </div>
                            </div>
                        @endif

                        {{-- Tabel Ikan --}}
                        <div class="card">
                            <div class="card-header d-flex justify-content-end">
                                @if (auth()->user()->role !== 'user')
                                    <a href="{{ route('ikan.create') }}" class="btn btn-sm btn-primary">
                                        Tambah Ikan
                                    </a>
                                @endif
                            </div>
                            <div class="card-body p-0">
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
                                                @if(auth()->user()->role === 'admin')
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
                                                    <td>{{ $item->kategori->nama_kategori ?? 'RELASI NULL' }}</td>
                                                    <td>{{ $item->jumlah }}</td>
                                                    <td>Rp {{ number_format($item->harga_per_kg, 0, ',', '.') }}</td>
                                                    <td>Rp {{ number_format($item->harga_per_kg * $item->jumlah, 0, ',', '.') }}</td>

                                                    @if(auth()->user()->role === 'admin')
                                                        <td>{{ $item->user->nama ?? '-' }}</td>
                                                    @endif

                                                    <td>
                                                        @if(auth()->user()->role !== 'user')
                                                            <div class="d-flex">
                                                                <a href="{{ route('ikan.edit', $item->id) }}" class="btn btn-warning btn-sm mr-1">Edit</a>
                                                                <form action="{{ route('ikan.destroy', $item->id) }}" method="POST">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                                                </form>
                                                            </div>
                                                        @elseif($item->jumlah > 500 && !$item->is_notified)
                                                            <form action="{{ route('ikan.notify', $item->id) }}" method="POST">
                                                                @csrf
                                                                <button class="btn btn-sm btn-danger">Kirim Notifikasi</button>
                                                            </form>
                                                        @elseif($item->jumlah > 500 && $item->is_notified)
                                                            <span class="badge bg-success">Sudah Diberitahu</span>
                                                        @else
                                                            <span class="text-muted">-</span>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div> {{-- End Card --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
