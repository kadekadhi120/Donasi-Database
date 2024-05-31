<?php

namespace App\Models;

use App\Models\Distribution;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Volunteer extends Model
{
    use HasFactory;
    protected $fillable = ['volunteer_id', 'volunteer_name', 'volunteer_address', 'volunteer_contact'];

    public function Distribution(): HasOne
    {
        return $this->hasOne(Distribution::class);
    }
}
