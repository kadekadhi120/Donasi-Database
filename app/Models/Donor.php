<?php

namespace App\Models;

use App\Models\Donation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Donor extends Model
{
    use HasFactory;
    protected $fillable = ['donor_NIK', 'donor_name', 'donor_address', 'donor_contact'];

    public function Donation(): HasOne
    {
        return $this->HasOne(Donation::class);
    }
}
