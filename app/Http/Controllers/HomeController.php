<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;

class HomeController extends Controller
{
    public function index()
    {
        $featuredRooms = Room::where('status', 'available')->latest()->take(3)->get(); // Ambil 3 kamar terbaru yang berstatus 'available'
        return view('welcome', compact('featuredRooms'));
    }
}
