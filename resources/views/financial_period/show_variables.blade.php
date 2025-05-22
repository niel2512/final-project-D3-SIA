<x-app>
    <x-slot name="header">
        <h2 class="font-semibold text-center text-xl text-gray-800 leading-tight">
            Hasil Perhitungan Variabel X
        </h2>
    </x-slot>

    <div class="mb-6 p-4 border border-gray-300 rounded-md bg-gray-50">
        <p><strong>Bank:</strong> {{ $financialPeriod->bank->nama_bank }} ({{ $financialPeriod->bank->kode_bank }})</p>
        <p><strong>Tahun Periode:</strong> {{ $financialPeriod->tahun }}</p>
    </div>

    <h3 class="text-lg font-medium text-gray-900 mb-4">Data Keuangan & Hasil Variabel:</h3>
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Deskripsi</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nilai</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                <tr><td class="px-6 py-4 font-medium">Laba Bersih</td><td class="px-6 py-4">{{ number_format($financialPeriod->laba_bersih, 2) }}</td></tr>
                <tr><td class="px-6 py-4 font-medium">Total Aset</td><td class="px-6 py-4">{{ number_format($financialPeriod->total_aset, 2) }}</td></tr>
                <tr><td class="px-6 py-4 font-medium">Total Utang</td><td class="px-6 py-4">{{ number_format($financialPeriod->total_utang, 2) }}</td></tr>
                <tr><td class="px-6 py-4 font-medium">Aset Lancar</td><td class="px-6 py-4">{{ number_format($financialPeriod->aset_lancar, 2) }}</td></tr>
                <tr><td class="px-6 py-4 font-medium">Utang Lancar</td><td class="px-6 py-4">{{ number_format($financialPeriod->utang_lancar, 2) }}</td></tr>
                <tr class="bg-indigo-50"><td class="px-6 py-4 font-bold">X1 (Laba Bersih / Total Aset)</td><td class="px-6 py-4 font-bold">{{ number_format($financialPeriod->x1, 5) }}</td></tr>
                <tr class="bg-indigo-50"><td class="px-6 py-4 font-bold">X2 (Total Utang / Total Aset)</td><td class="px-6 py-4 font-bold">{{ number_format($financialPeriod->x2, 5) }}</td></tr>
                <tr class="bg-indigo-50"><td class="px-6 py-4 font-bold">X3 (Aset Lancar / Utang Lancar)</td><td class="px-6 py-4 font-bold">{{ number_format($financialPeriod->x3, 5) }}</td></tr>
            </tbody>
        </table>
    </div>

    <div class="mt-6">
        <a href="{{ route('model.create_input') }}" class="inline-flex items-center px-4 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-700">
            Lanjut ke Perhitungan Model Zmijewski
        </a>
        <a href="{{ route('variabel.create_step1') }}" class="ml-4 inline-flex items-center px-4 py-2 bg-gray-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700">
            Input Data Lain
        </a>
    </div>
</x-app>