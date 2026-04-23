<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Reservation;
use App\Models\Room;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;

class ReservationController extends Controller
{
    // Fungsi untuk menampilkan daftar pemesanan kamar
    public function index()
    {
        $reservations = Reservation::with('room')->where('user_id', Auth::id())->latest()->get(); // Ambil pemesanan milik pengguna yang sedang login
        return view('reservations.index', compact('reservations'));
    }

    // Fungsi untuk menampilkan form pemesanan kamar
    public function create(Room $room)
    {
        // Kirim data kamar ke view (reservations.create) untuk ditampilkan
        return view('reservations.create', compact('room'));
    }

    // Fungsi untuk menyimpan data pemesanan kamar ke database
    public function store(Request $request, Room $room)
    {

        // Validasi tanggal tidak kosong
        $request->validate([
            'check_in_date' => 'required|date|after_or_equal:today',
            'check_out_date' => 'required|date|after:check_in_date',
        ]);

        // Validasi double booking dengan memeriksa apakah ada reservasi yang tumpang tindih untuk kamar yang sama
        $existingReservation = Reservation::where('room_id', $room->id)
            ->whereIn('status', ['pending', 'confirmed']) // Hanya periksa reservasi yang masih aktif
            ->where(function ($query) use ($request) {
                $query->where('check_in_date', '<', $request->check_out_date)
                    ->where('check_out_date', '>', $request->check_in_date);
            })->exists();

        if ($existingReservation) {
            return redirect()->back()->withInput()->with('error', 'Maaf, Kamar ini sudah dipesan untuk tanggal tersebut. Silakan pilih tanggal lain.');
        }

        // Hitung jumlah malam yang dipesan
        $checkIn = Carbon::parse($request->check_in_date);
        $checkOut = Carbon::parse($request->check_out_date);
        $jumlahMalam = $checkIn->diffInDays($checkOut);

        // Hitung total harga berdasarkan jumlah malam dan harga kamar
        $totalHarga = $jumlahMalam * $room->price_per_night;

        // Simpan data pemesanan ke database
        Reservation::create([
            'user_id' => Auth::id(), //Ambil ID pengguna
            'room_id' => $room->id, //Ambil ID kamar
            'check_in_date' => $request->check_in_date,
            'check_out_date' => $request->check_out_date,
            'total_price' => $totalHarga,
        ]);

        // Redirect ke halaman dashboard dengan pesan sukses
        return redirect()->route('dashboard')->with('success', 'Kamar berhasil dipesan! Total Bayar: Rp ' . number_format($totalHarga, 0, ',', '.'));
    }

    // Fungsi untuk mengunduh invoice pemesanan
    public function downloadInvoice(Reservation $reservation)
    {
        if ($reservation->user_id !== \Illuminate\Support\Facades\Auth::id()) {
            abort(403, 'Akses ditolak, Anda bukan pemilik reservasi ini.'); // Pastikan hanya pemilik reservasi yang dapat mengunduh invoice
        }

        $pdf = Pdf::loadView('reservations.invoice', compact('reservation')); // Load view invoice dan kirim data reservasi
        return $pdf->download('Invoice_Hotel_No_' . $reservation->id . '.pdf'); // Unduh file PDF dengan nama yang sesuai
    } 
}
