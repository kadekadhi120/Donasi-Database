<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Donation extends Model
{
    use HasFactory;
    protected $fillable = ['donation_id', 'staff_id', 'donor_NIK', 'food_id', 'donation_amount', 'donation_date'];
    // protected $rules = [
    //     'staff_id' => 'required|exists:staff,id',
    // ];
    public function food_inventories(): BelongsTo
    {
        return $this->belongsToMany(FoodInventory::class);
    }

    public function Donor(): BelongsTo
    {
        return $this->belongsToMany(Donor::class);
    }
 
}