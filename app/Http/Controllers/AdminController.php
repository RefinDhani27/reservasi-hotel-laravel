<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;

class AdminController extends Controller
{
    public function index()
    {
        // Ambil semua reservasi beserta informasi pengguna dan kamar yang terkait
        $reservations = Reservation::with(['user', 'room'])->get();

        return view('admin.dashboard', compact('reservations'));
    }

    public function updateStatus(Request $request, Reservation $reservation)
    {
        // Validasi agar status yang diterima hanya 'pending', 'confirmed', atau 'cancelled'
        $request->validate([
            'status' => 'required|in:pending,confirmed,cancelled',
        ]);

        // Perbarui status reservasi
        $reservation->update(['status' => $request->status]);

        return redirect()->back()->with('success', 'Status reservasi berhasil diperbarui.' . strtoupper($request->status) . '!');
    }
}
