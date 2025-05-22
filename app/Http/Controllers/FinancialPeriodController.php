<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use App\Models\FinancialPeriod;
use Illuminate\Http\Request;

class FinancialPeriodController extends Controller
{
    // Menampilkan form untuk memilih bank dan tahun (Step 1 Variabel)
    public function createStep1()
    {
        $banks = Bank::orderBy('nama_bank')->get();
        return view('financial_period.create_step1', compact('banks'));
    }

    // Memproses step 1 dan menampilkan form input data keuangan (Step 2 Variabel)
    public function createStep2(Request $request)
    {
        $request->validate([
            'bank_id' => 'required|exists:banks,id',
            'tahun' => 'required|digits:4|integer|min:1900|max:' . (date('Y') + 1),
        ]);

        $bank = Bank::findOrFail($request->bank_id);
        $tahun = $request->tahun;

        // Cek apakah data untuk bank dan tahun ini sudah ada
        $financialPeriod = FinancialPeriod::firstOrNew([
            'bank_id' => $bank->id,
            'tahun' => $tahun,
        ]);

        return view('financial_period.create_step2', compact('bank', 'tahun', 'financialPeriod'));
    }

    // Menyimpan data keuangan dan menghitung X1, X2, X3
    public function storeAndCalculate(Request $request)
    {
        $request->validate([
            'bank_id' => 'required|exists:banks,id',
            'tahun' => 'required|digits:4|integer',
            'laba_bersih' => 'required|numeric',
            'total_aset' => 'required|numeric|min:0.01', // Tidak boleh nol untuk pembagi
            'total_utang' => 'required|numeric',
            'aset_lancar' => 'required|numeric',
            'utang_lancar' => 'required|numeric|min:0.01', // Tidak boleh nol untuk pembagi
        ]);

        $bank = Bank::findOrFail($request->bank_id);
        $tahun = $request->tahun;

        $financialPeriod = FinancialPeriod::updateOrCreate(
            ['bank_id' => $bank->id, 'tahun' => $tahun],
            [
                'laba_bersih' => $request->laba_bersih,
                'total_aset' => $request->total_aset,
                'total_utang' => $request->total_utang,
                'aset_lancar' => $request->aset_lancar,
                'utang_lancar' => $request->utang_lancar,
            ]
        );

        // Hitung X1, X2, X3
        $financialPeriod->x1 = $financialPeriod->total_aset != 0 ? $financialPeriod->laba_bersih / $financialPeriod->total_aset : 0;
        $financialPeriod->x2 = $financialPeriod->total_aset != 0 ? $financialPeriod->total_utang / $financialPeriod->total_aset : 0;
        $financialPeriod->x3 = $financialPeriod->utang_lancar != 0 ? $financialPeriod->aset_lancar / $financialPeriod->utang_lancar : 0;
        $financialPeriod->save();

        return view('financial_period.show_variables', compact('financialPeriod'));
    }
}
