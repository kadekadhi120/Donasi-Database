<?php

namespace App\Http\Controllers;

use App\Models\OpenDonasi;
use Illuminate\Http\Request;

class DonasiController extends Controller
{
    public function indexdonasi()
    {
        $opendonasis = OpenDonasi::all();
        return view('home', compact('opendonasis'));
    }
}
