<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Controllers\DokumentasiController;
use App\Http\Controllers\DonasiController;

class HomeController extends Controller
{
    public function index()
    {
        $donasiController = new DonasiController();
        $donasiResult = $donasiController->indexdonasi();
        // Panggil method indexdokumentasi dari DokumentasiController
        $dokumentasiController = new DokumentasiController();
        $dokumentasiResult = $dokumentasiController->indexdokumentasi();

        // Panggil method indexdonasi dari DonasiController


        // Return view atau response yang sesuai dengan kebutuhan Anda
        return view('home', compact('dokumentasiResult', 'donasiResult'));
    }
}