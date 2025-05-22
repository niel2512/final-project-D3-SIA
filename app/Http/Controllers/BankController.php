<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use Illuminate\Http\Request;

class BankController extends Controller
{
    // Menampilkan form untuk menambah bank dan daftar bank
    public function index()
    {
        $banks = Bank::orderBy('nama_bank')->get();
        return view('bank.index', compact('banks'));
    }

    public function create()
    {
        return view('bank.create');
    }

    public function edit(Bank $bank)
    {
        return view('bank.edit', compact('bank'));
    }

    public function update(Request $request, Bank $bank)
    {
        $request->validate([
            'nama_bank' => 'required|string|max:255',
            'kode_bank' => 'required|string|max:50|unique:banks,kode_bank,' . $bank->id,
        ]);
        $bank->update($request->all());
        return redirect()->route('bank.index')->with('success', 'Bank berhasil diperbarui.');
    }

    public function destroy(Bank $bank)
    {
        $bank->delete();
        return redirect()->route('bank.index')->with('success', 'Bank berhasil dihapus.');
    }

    // Menyimpan bank baru
    public function store(Request $request)
    {
        $request->validate([
            'nama_bank' => 'required|string|max:255',
            'kode_bank' => 'required|string|max:50|unique:banks,kode_bank',
        ]);

        Bank::create($request->all());
        return redirect()->route('bank.index')->with('success', 'Bank berhasil ditambahkan.');
    }

}
