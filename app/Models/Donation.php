<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    use HasFactory;
    protected $fillable = ['donation_id', 'staff_id', 'donor_NIK', 'food_id', 'donation_amount', 'donation_date'];
    protected $rules = [
        'staff_id' => 'required|exists:staff,id',
    ];

    public function donor()
    {
        return $this->belongsTo(Donor::class, 'donor_NIK');
    }

    public function staff()
    {
        return $this->belongsTo(Staff::class, 'staff_id');
    }

    public function food_inventories()
    {
        return $this->belongsToMany(\App\Models\FoodInventory::class, 'donation_food_inventory');
    }
}