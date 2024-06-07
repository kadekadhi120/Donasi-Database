<?php

namespace App\Helpers;

use App\Models\Donasi; // Sesuaikan dengan model dan namespace Controller Anda
use App\Models\Dokumentasi; 
use App\Models\OpenDonasi;// Sesuaikan dengan model dan namespace Controller Anda

class DataHelper
{
    public static function getData()
    {
        $donasiResult = OpenDonasi::all(); // Ganti dengan cara Anda mengambil data dari Controller Donasi
        $dokumentasiResult = Dokumentasi::all(); // Ganti dengan cara Anda mengambil data dari Controller Dokumentasi

        return [
            'donasiResult' => $donasiResult,
            'dokumentasiResult' => $dokumentasiResult,
        ];
    }
}
