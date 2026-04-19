<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\Room;

class AdminController extends Controller
{
    public function index()
    {
        // Ambil data yang sudah ada di tabel
        $reservations = Reservation::with(['user', 'room'])->latest()->get();

        //Kumpulkan data untuk dashboard
        $totalPesanan = $reservations->count();

        //Pendapatan yang dihitung hanya dari reservasi yang sudah dikonfirmasi
        $totalPendapatan = $reservations->where('status', 'confirmed')->sum('total_price');

        // Hitung jumlah pesanan berdasarkan status pending
        $pesananPending = $reservations->where('status', 'pending')->count();

        // Hitung jumlah pesanan berdasarkan status available
        $kamarTersedia = Room::where('status', 'available')->count();

        return view('admin.dashboard', compact('reservations', 'totalPesanan', 'totalPendapatan', 'pesananPending', 'kamarTersedia'));
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
