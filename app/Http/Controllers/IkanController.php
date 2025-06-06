<?php

namespace App\Http\Controllers;

use App\Models\Ikan;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IkanController extends Controller
{
    public function index()
    {
        // Jika admin, tampilkan semua ikan, jika petugas, tampilkan ikan miliknya
        if (Auth::user()->role === 'user') {
            $ikans = Ikan::with('kategori', 'user')->get();
        } else {
            $ikans = Ikan::with('kategori')->where('user_id', Auth::id())->get();
        }

        return view('pages.ikan.index', compact('ikans'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('pages.ikan.create', compact('categories'));
    }

    public function store(Request $request)
{
    $request->validate([
        'nama' => 'required|min:3',
        'kategori_id' => 'required|exists:categories,id',
        'harga_per_kg' => 'required|numeric',
        'jumlah' => 'required|numeric'
    ]);

    Ikan::create([
        'nama' => $request->nama,
        'kategori_id' => $request->kategori_id,
        'harga_per_kg' => $request->harga_per_kg,
        'jumlah' => $request->jumlah,
        'user_id' => Auth::id(), 
    ]);

    return redirect()->route('ikan.index')->with('success', 'Data ikan berhasil ditambahkan.');
}


    public function edit(Ikan $ikan)
    {
        $categories = Category::all();
        return view('pages.ikan.edit', compact('ikan', 'categories'));
    }

    public function update(Request $request, Ikan $ikan)
    {
        $request->validate([
            'nama' => 'required|min:3',
            'kategori_id' => 'required|exists:categories,id',
            'harga_per_kg' => 'required|numeric',
            'jumlah' => 'required|numeric'
        ]);

        $ikan->update($request->only(['nama', 'kategori_id', 'harga_per_kg', 'jumlah']));

        return redirect()->route('ikan.index')->with('success', 'Data ikan berhasil diperbarui.');
    }

    public function destroy(Ikan $ikan)
    {
        $ikan->delete();
        return redirect()->route('ikan.index')->with('success', 'Data ikan berhasil dihapus.');
    }
    public function notify(Ikan $ikan)
{
    // Hapus validasi kepemilikan
    // if (Auth::id() !== $ikan->user_id) {
    //     abort(403);
    // }

    if ($ikan->jumlah > 500 && !$ikan->is_notified) {
        $admins = \App\Models\User::where('role', 'admin')->get();

        foreach ($admins as $admin) {
            \App\Models\Notification::create([
                'user_id' => $admin->id,
                'message' => 'User "' . Auth::user()->nama . '" memberi notifikasi: ikan "' . $ikan->nama . '" melebihi 500KG (' . $ikan->jumlah . ' KG).',
            ]);
        }

        $ikan->update(['is_notified' => true]);
    }

    return back()->with('success', 'Notifikasi berhasil dikirim ke admin.');
}


}
