<?php

namespace App\Models;

use App\Models\Need;
use App\Models\Donation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FoodInventory extends Model
{
    use HasFactory;
    protected $fillable = ['food_id', 'food_name', 'quantity'];

    public function Donation(): HasOne
    {
        return $this->hasOne(Donation::class);
    }

    public function Need(): HasMany
    {
        return $this->hasMany(Need::class);
    }
}

