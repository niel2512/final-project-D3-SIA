<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Bank extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_bank',
        'kode_bank',
    ];

    public function financialPeriods(): HasMany
    {
        return $this->hasMany(FinancialPeriod::class);
    }
}
