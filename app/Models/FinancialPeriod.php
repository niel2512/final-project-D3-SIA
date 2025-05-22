<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FinancialPeriod extends Model
{
    use HasFactory;

    protected $fillable = [
        'bank_id',
        'tahun',
        'laba_bersih',
        'total_aset',
        'total_utang',
        'aset_lancar',
        'utang_lancar',
        'x1',
        'x2',
        'x3',
        'z_score',
        'interpretasi',
    ];

    protected $casts = [
        'laba_bersih' => 'decimal:2',
        'total_aset' => 'decimal:2',
        'total_utang' => 'decimal:2',
        'aset_lancar' => 'decimal:2',
        'utang_lancar' => 'decimal:2',
        'x1' => 'decimal:5',
        'x2' => 'decimal:5',
        'x3' => 'decimal:5',
        'z_score' => 'decimal:5',
    ];

    public function bank(): BelongsTo
    {
        return $this->belongsTo(Bank::class);
    }
}
