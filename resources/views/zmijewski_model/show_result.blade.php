<x-app>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-center text-gray-800 leading-tight">
            Hasil Perhitungan Model Zmijewski
        </h2>
    </x-slot>

    <div class="mb-6 p-4 border border-gray-300 rounded-md bg-gray-50">
        <p><strong>Bank:</strong> {{ $financialPeriod->bank->nama_bank }} ({{ $financialPeriod->bank->kode_bank }})</p>
        <p><strong>Tahun Periode:</strong> {{ $financialPeriod->tahun }}</p>
    </div>

    <h3 class="text-lg font-medium text-gray-900 mb-4">Hasil Perhitungan:</h3>
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Deskripsi</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nilai</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                <tr><td class="px-6 py-4 font-medium">X1</td><td class="px-6 py-4">{{ number_format($financialPeriod->x1, 5) }}</td></tr>
                <tr><td class="px-6 py-4 font-medium">X2</td><td class="px-6 py-4">{{ number_format($financialPeriod->x2, 5) }}</td></tr>
                <tr><td class="px-6 py-4 font-medium">X3</td><td class="px-6 py-4">{{ number_format($financialPeriod->x3, 5) }}</td></tr>
                <tr class="bg-green-100"><td class="px-6 py-4 font-bold">Hasil Model Zmijewski (Z-Score)</td><td class="px-6 py-4 font-bold">{{ number_format($financialPeriod->z_score, 5) }}</td></tr>
                <tr class="{{ $financialPeriod->interpretasi == 'Bangkrut' ? 'bg-red-100' : 'bg-green-100' }}">
                    <td class="px-6 py-4 font-bold">Interpretasi</td>
                    <td class="px-6 py-4 font-bold text-lg {{ $financialPeriod->interpretasi == 'Bangkrut' ? 'text-red-700' : 'text-green-700' }}">
                        {{ $financialPeriod->interpretasi }}
                        @if($financialPeriod->interpretasi == 'Bangkrut') (Z-Score > 0) @else (Z-Score <= 0) @endif
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="mt-6">
        <a href="{{ route('hasil.index') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700">
            Lihat Tabel Kesimpulan
        </a>
        <a href="{{ route('model.create_input') }}" class="ml-4 inline-flex items-center px-4 py-2 bg-gray-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700">
            Hitung Model Lain
        </a>
    </div>
</x-app-layout>