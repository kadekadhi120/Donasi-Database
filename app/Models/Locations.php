<?php

namespace App\Models;

use App\Models\Need;
use App\Models\Distribution;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Locations extends Model
{
    use HasFactory;
    protected $fillable = ['location_id', 'provinsi', 'KabupatenKota', 'kecamatan', "KelurahanDesa", "RTRW", "total_KK", "date"];

    public function Need(): HasMany
    {
        return $this->hasMany(Need::class, 'need_id','need_id');
    }

    public function Distribution(): HasOne
    {
        return $this->hasOne(Distribution::class);
    }
}
