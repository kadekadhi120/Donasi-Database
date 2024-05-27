<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FoodInventory extends Model
{
    use HasFactory;
    protected $fillable = ['food_id', 'food_name', 'quantity'];

    public function Donation(): HasOne
    {
        return $this->HasOne(Donation::class);
    }
}

