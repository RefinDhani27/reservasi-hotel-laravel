<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    // Method untuk menampilkan form tambah kamar
    public function create()
    {
        return view('admin.rooms.create');
    }

    // Method untuk menyimpan data kamar baru
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'room_number' => 'required|unique:rooms,room_number', // Nomor kamar harus unik
            'room_type' => 'required',
            'price_per_night' => 'required|numeric|min:0',
            'description' => 'nullable|string',
        ]);

        Room::create([
            'room_number' => $request->room_number,
            'room_type' => $request->room_type,
            'price_per_night' => $request->price_per_night,
            'description' => $request->description,
            'status' => 'available', // Set status default ke available
        ]);

        return redirect()->back()->with('success', 'Kamar No. ' . $request->room_number . ' berhasil ditambahkan!');
    }
}
