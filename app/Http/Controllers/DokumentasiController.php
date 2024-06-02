<?php

namespace App\Http\Controllers;

use App\Models\Dokumentasi;
use Illuminate\Http\Request;

class DokumentasiController extends Controller
{
    public function index()
    {
        // Mengambil semua data dokumentasi
        $dokumentasi = Dokumentasi::all();

        // Mengirim data ke view home
        return view('home', compact('dokumentasi'));
    }
}
