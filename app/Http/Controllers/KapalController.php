<?php

namespace App\Http\Controllers;

use App\Models\Kapal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KapalController extends Controller
{
    public function index()
{
    if (Auth::user()->role === 'admin') {
        // Admin lihat semua kapal, lengkap dengan user yang menambahkannya
        $kapals = Kapal::with('user')->get();
    } else {
        // User biasa hanya lihat kapal miliknya
        $kapals = Kapal::with('user')->where('user_id', Auth::id())->get();
    }

    return view('pages.kapal.index', compact('kapals'));
}


    public function create()
    {
        return view('pages.kapal.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'no_kapal' => 'required',
            'tanggal' => 'required|date',
            'nama_kapal' => 'required',
            'pemilik' => 'required',
            'kapasitas' => 'required',
            'total' => 'required',
        ]);

        Kapal::create([
            'user_id' => Auth::id(),
            'no_kapal' => $request->no_kapal,
            'tanggal' => $request->tanggal,
            'nama_kapal' => $request->nama_kapal,
            'pemilik' => $request->pemilik,
            'kapasitas' => $request->kapasitas,
            'total' => $request->total,
        ]);

        return redirect()->route('kapal.index')->with('success', 'Data kapal berhasil ditambahkan.');
    }

    public function edit(Kapal $kapal)
    {
        return view('pages.kapal.edit', compact('kapal'));
    }

    public function update(Request $request, Kapal $kapal)
    {
        $request->validate([
            'no_kapal' => 'required',
            'tanggal' => 'required|date',
            'nama_kapal' => 'required',
            'pemilik' => 'required',
            'kapasitas' => 'required',
            'total' => 'required',
        ]);

        $kapal->update($request->only([
            'no_kapal', 'tanggal', 'nama_kapal', 'pemilik', 'kapasitas', 'total'
        ]));

        return redirect()->route('kapal.index')->with('success', 'Data kapal berhasil diperbarui.');
    }

    public function destroy(Kapal $kapal)
    {
        $kapal->delete();
        return redirect()->route('kapal.index')->with('success', 'Data kapal berhasil dihapus.');
    }
}
