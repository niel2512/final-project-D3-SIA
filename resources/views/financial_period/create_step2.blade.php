<x-app>
    <x-slot name="header">
        <h2 class="font-semibold text-center text-xl text-gray-800 leading-tight">
           Variabel
        </h2>
    </x-slot>

    <div class="mb-8">
     <h2 class="font-semibold text-xl text-center text-gray-800 leading-tight mb-4">
        Input Laporan Keuangan
    </h2>
        <div class="mb-6 p-4 border border-gray-500 rounded-md bg-gray-100">
            <p><strong>Bank:</strong> {{ $bank->nama_bank }} ({{ $bank->kode_bank }})</p>
            <p><strong>Tahun Periode:</strong> {{ $tahun }}</p>
        </div>

        <form action="{{ route('variabel.store_calculate') }}" method="POST" class="space-y-4">
            @csrf
            <input type="hidden" name="bank_id" value="{{ $bank->id }}">
            <input type="hidden" name="tahun" value="{{ $tahun }}">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-4">
                <div>
                    <label for="laba_bersih" class="block text-sm mb-2 font-medium text-gray-700">Laba Bersih (Setelah Pajak)</label>
                    <input type="number" step="0.01" name="laba_bersih" id="laba_bersih" value="{{ old('laba_bersih', $financialPeriod->laba_bersih) }}" required class="bg-slate-50 border border-gray-300 shadow-sm text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                </div>
                <div>
                    <label for="total_aset" class="block text-sm mb-2 font-medium text-gray-700">Total Aset</label>
                    <input type="number" step="0.01" name="total_aset" id="total_aset" value="{{ old('total_aset', $financialPeriod->total_aset) }}" required class="bg-slate-50 border border-gray-300 shadow-sm text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                </div>
                <div>
                    <label for="total_utang" class="block text-sm mb-2 font-medium text-gray-700">Total Utang</label>
                    <input type="number" step="0.01" name="total_utang" id="total_utang" value="{{ old('total_utang', $financialPeriod->total_utang) }}" required class="bg-slate-50 border border-gray-300 shadow-sm text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                </div>
                <div>
                    <label for="aset_lancar" class="block text-sm mb-2 font-medium text-gray-700">Aset Lancar</label>
                    <input type="number" step="0.01" name="aset_lancar" id="aset_lancar" value="{{ old('aset_lancar', $financialPeriod->aset_lancar) }}" required class="bg-slate-50 border border-gray-300 shadow-sm text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                </div>
                <div>
                    <label for="utang_lancar" class="block text-sm mb-2 font-medium text-gray-700">Utang Lancar</label>
                    <input type="number" step="0.01" name="utang_lancar" id="utang_lancar" value="{{ old('utang_lancar', $financialPeriod->utang_lancar) }}" required class="bg-slate-50 border border-gray-300 shadow-sm text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                </div>
            </div>
                <button type="submit" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700">
                    Simpan dan Hitung Variabel X
                </button>
                <a href="{{ route('variabel.create_step1') }}" class="inline-flex items-center px-4 py-2 bg-gray-300 border border-transparent rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest hover:bg-gray-400 active:bg-gray-500 focus:outline-none focus:border-gray-500 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                    Batal
                </a>
            </div>
        </form>
</x-app>
