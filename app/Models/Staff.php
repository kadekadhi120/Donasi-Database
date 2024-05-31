<?php

namespace App\Models;

use App\Models\Distribution;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Staff extends Model
{
    use HasFactory;
    protected $fillable = ['staff_id', 'user_id', 'staff_name', 'staff_address', 'staff_contact'];

    public function user(): BelongsTo
    {
        return $this->BelongsTo(User::class);
    }

    public function Distribution(): HasOne
    {
        return $this->hasOne(Distribution::class);
    }
}
