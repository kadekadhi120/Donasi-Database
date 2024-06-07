<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OpenDonasi extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'path',
        'deskripsi',
        'open_date',
        'close_date',
    ];
}
