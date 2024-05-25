<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Locations extends Model
{
    use HasFactory;
    protected $fillable = ['location_id', 'provinsi', 'KabupatenKota', 'kecamatan', "KelurahanDesa", "RTRW", "total_KK", "date"];
}
