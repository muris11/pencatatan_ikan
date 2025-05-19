<?php

// app/Http/Controllers/NotificationController.php
namespace App\Http\Controllers;

use App\Models\Ikan;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function destroy($id)
    {
        $notif = Notification::findOrFail($id);

        // Hanya admin yang bisa menghapus
       $user = Auth::user();

if (!$user || $user->role !== 'admin') {
    abort(403);
}

        // Reset is_notified = false di ikan terkait (biar muncul tombol notifikasi lagi)
        $ikan = Ikan::find($notif->ikan_id);
        if ($ikan) {
            $ikan->is_notified = false;
            $ikan->save();
        }

        $notif->delete();

        return redirect()->back()->with('success', 'Notifikasi berhasil dihapus.');
    }
}
