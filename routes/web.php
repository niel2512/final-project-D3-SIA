<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BankController;
use App\Http\Controllers\ZmijewskiModelController;
use App\Http\Controllers\FinancialPeriodController;
use App\Http\Controllers\HasilController;

Route::get('/', function () {
    return redirect('bank');
});

// Route untuk Bank
Route::prefix('bank')->name('bank.')->group(function () {
    Route::get('/', [BankController::class, 'index'])->name('index');
    Route::get('/create', [BankController::class, 'create'])->name('create');
    Route::post('/', [BankController::class, 'store'])->name('store');
    Route::get('/{bank}/edit', [BankController::class, 'edit'])->name('edit');
    Route::put('/{bank}', [BankController::class, 'update'])->name('update');
    Route::delete('/{bank}', [BankController::class, 'destroy'])->name('destroy');
});

// Route untuk Variabel (FinancialPeriod)
Route::prefix('variabel')->name('variabel.')->group(function () {
    Route::get('/input-awal', [FinancialPeriodController::class, 'createStep1'])->name('create_step1');
    Route::post('/pilih-periode', [FinancialPeriodController::class, 'createStep2'])->name('create_step2'); // Seharusnya GET jika hanya menampilkan form, tapi POST jika ada proses
    Route::post('/simpan-hitung', [FinancialPeriodController::class, 'storeAndCalculate'])->name('store_calculate');
});

// Route untuk Model Zmijewski
Route::prefix('model-zmijewski')->name('model.')->group(function () {
    Route::get('/input-model', [ZmijewskiModelController::class, 'createModelInput'])->name('create_input');
    Route::post('/hitung-tampilkan', [ZmijewskiModelController::class, 'calculateAndShow'])->name('calculate_show');
});

// Route untuk Kesimpulan
Route::get('/kesimpulan', [HasilController::class, 'index'])->name('hasil.index');