<?php

namespace App\Models;

use App\Models\Need;
use App\Models\Staff;
use App\Models\Locations;
use App\Models\Volunteer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Distribution extends Model
{
    use HasFactory;

    protected $fillable = ['distribution_id', 'need_id', 'volunteer_id', 'staff_id', 'deskripsi', 'distribution_date'];

    public function Need():BelongsTo
    {
        return $this->belongsTo(Need::class, 'need_id', 'need_id');
    }

    public function Locations():BelongsTo
    {
        return $this->belongsTo(Locations::class, 'location_id', 'location_id');
    }

    public function Volunteer():BelongsTo
    {
        return $this->belongsTo(Volunteer::class, 'volunteer_id', 'volunteer_id');
    }

    public function Staff():BelongsTo
    {
        return $this->belongsTo(Staff::class, 'staff_id', 'staff_id');
    }
}
