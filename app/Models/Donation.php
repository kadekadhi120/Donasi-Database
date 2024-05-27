<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Donation extends Model
{
    use HasFactory;

    protected $fillable = ['donation_id', 'staff_id', 'donor_NIK', 'food_id', 'donation_amount', 'donation_date'];

    public function foodInventory(): BelongsTo
    {
        return $this->belongsTo(FoodInventory::class, 'food_id');
    }

    public function donor(): BelongsTo
    {
        return $this->belongsTo(Donor::class, 'donor_NIK');
    }
}
