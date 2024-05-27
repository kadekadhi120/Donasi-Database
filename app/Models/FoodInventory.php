<?php

namespace App\Models;

use App\Models\Donation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FoodInventory extends Model
{
    use HasFactory;
    protected $fillable = ['food_id', 'food_name', 'quantity'];

    public function Donation(): HasOne
    {
        return $this->HasOne(Donation::class);
    }
}

