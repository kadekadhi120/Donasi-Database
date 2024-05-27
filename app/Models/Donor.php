<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donor extends Model
{
    use HasFactory;
    protected $fillable = ['donor_NIK', 'donor_name', 'donor_address', 'donor_contact'];

    public function Donation(): HasOne
    {
        return $this->HasOne(Donation::class);
    }
}
