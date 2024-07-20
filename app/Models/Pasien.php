<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pasien extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function daftars(): HasMany
    {
        return $this->hasMany(Daftar::class, 'id_pasien');
    }
}

