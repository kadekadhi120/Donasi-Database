<?php

namespace App\Models;

use App\Models\Locations;
use App\Models\Distribution;
use App\Models\FoodInventory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Need extends Model
{
    use HasFactory;
    protected $fillable = ['need_id', 'location_id', 'food_id', 'need_amount',];

    public function location()
    {
        return $this->belongsTo(Locations::class, 'location_id', 'location_id');
    }

    public function foodInventory(): BelongsTo
    {
        return $this->belongsTo(FoodInventory::class, 'food_id', 'food_id');
    }

    public function Distribution(): HasOne
    {
        return $this->hasOne(Distribution::class);
    }
}
