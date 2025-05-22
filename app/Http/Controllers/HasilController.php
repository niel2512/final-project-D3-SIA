<?php

namespace App\Http\Controllers;

use App\Models\FinancialPeriod;
use Illuminate\Http\Request;

class HasilController extends Controller
{
    // Menampilkan tabel kesimpulan
    public function index()
    {
        $results = FinancialPeriod::whereNotNull('z_score') // Hanya tampilkan yang sudah dihitung
            ->with('bank')
            ->orderByDesc('tahun')
            ->orderBy('bank_id')
            ->get();

        return view('hasil.index', compact('results'));
    }
}
