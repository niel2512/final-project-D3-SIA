<?php

namespace App\Http\Controllers;

use App\Models\FinancialPeriod;
use Illuminate\Http\Request;

class ZmijewskiModelController extends Controller
{
    // Menampilkan form untuk memilih periode keuangan (yang sudah ada X1,X2,X3 nya)
    public function createModelInput()
    {
        // Ambil periode yang sudah memiliki X1, X2, X3 dan belum dihitung Z-score nya atau boleh dihitung ulang
        $financialPeriods = FinancialPeriod::whereNotNull('x1')
            ->whereNotNull('x2')
            ->whereNotNull('x3')
            ->with('bank') // Eager load relasi bank
            ->orderBy('bank_id')
            ->orderBy('tahun')
            ->get();

        return view('zmijewski_model.create_input', compact('financialPeriods'));
    }

    // Menghitung dan menampilkan hasil Model Zmijewski
    public function calculateAndShow(Request $request)
    {
        $request->validate([
            'financial_period_id' => 'required|exists:financial_periods,id',
        ]);

        $financialPeriod = FinancialPeriod::with('bank')->findOrFail($request->financial_period_id);

        if (is_null($financialPeriod->x1) || is_null($financialPeriod->x2) || is_null($financialPeriod->x3)) {
            return redirect()->route('model.create_input')->with('error', 'Data X1, X2, atau X3 tidak lengkap untuk periode ini.');
        }

        // Rumus Zmijewski: X = -4.336 - 4.513(X1) + 5.679(X2) + 0.004(X3)
        $z_score = -4.336 - (4.513 * $financialPeriod->x1) + (5.679 * $financialPeriod->x2) + (0.004 * $financialPeriod->x3);
        $interpretasi = $z_score > 0 ? 'Bangkrut' : 'Sehat';

        $financialPeriod->z_score = $z_score;
        $financialPeriod->interpretasi = $interpretasi;
        $financialPeriod->save();

        return view('zmijewski_model.show_result', compact('financialPeriod'));
    }
}
