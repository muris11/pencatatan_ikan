@extends('layouts.main')

@section('header')
<div class="row mb-1">
    <h1>Data User</h1>
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
                        <div class="card">
                            <div class="card-header d-flex justify-content-end">
                                <a href="{{ route('user.create') }}" class="btn btn-sm btn-primary">
                                    Tambah User
                                </a>
                            </div>
                            <div class="card-body p-0">
                                @if (session('success'))
                                    <div class="alert alert-success m-3">{{ session('success') }}</div>
                                @endif
                                <div class="table-responsive table-scroll" data-mdb-perfect-scrollbar="true" style="position: relative;">
                                    <table class="table table-striped mb-0">
                                        <thead style="background-color: #0088ff;">
                                            <tr>
                                                <th class="text-white">No</th>
                                                <th class="text-white">Nama</th>
                                                <th class="text-white">Email</th>
                                                <th class="text-white">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($users as $user)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $user->nama }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>
                                                    <div class="d-flex">
                                                        <a href="{{ route('user.edit', $user->id) }}" class="btn btn-warning btn-sm mr-1">
                                                            Edit
                                                        </a>
                                                        <form action="{{ route('user.destroy', $user->id) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus user ini?')">
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
