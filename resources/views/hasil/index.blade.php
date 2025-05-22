<x-app>
    <x-slot name="header">
        <h2 class="font-semibold text-center text-xl text-gray-800 leading-tight">
            Tabel Kesimpulan Prediksi Kebangkrutan
        </h2>
    </x-slot>

    @if($results->isEmpty())
        <p class="text-gray-600">Belum ada data hasil prediksi yang dapat ditampilkan.</p>
    @else
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama Bank</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kode Bank</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tahun</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Hasil Model</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kesimpulan</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($results as $result)
                    <tr class="{{ $result->interpretasi == 'Bangkrut' ? 'bg-red-50 hover:bg-red-100' : 'bg-green-50 hover:bg-green-100' }}">
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $result->bank->nama_bank }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $result->bank->kode_bank }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $result->tahun }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ number_format($result->z_score, 5) }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold {{ $result->interpretasi == 'Bangkrut' ? 'text-red-700' : 'text-green-700' }}">
                            {{ $result->interpretasi }}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
     <div class="mt-6">
        <a href="{{ route('bank.index') }}" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700">
            Kembali ke Halaman Bank
        </a>
    </div>
</x-app>
