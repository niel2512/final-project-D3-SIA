<x-app>
    <x-slot name="header">
        <h2 class="font-semibold text-center text-xl text-gray-800 leading-tight">
            Data Bank
        </h2>
    </x-slot>

    <div>
        <div class="flex justify-between">
        <h2 class="text-lg font-medium text-gray-900 mb-4">Daftar Bank</h2>
        <a href="{{ route('bank.create') }}" class="items-center justify-center px-4 py-2 mr-3 mb-2 text-base bg-indigo-600 border border-gray-300 font-medium text-center text-white rounded-lg hover:bg-indigo-700">+ Tambah Bank</a>
        </div>
        @if($banks->isEmpty())
            <p class="text-gray-500">Belum ada data bank.</p>
        @else
            <div class="overflow-x-auto">
                <table class="border-collapse border border-gray-400 min-w-6xl">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider border border-gray-300">Nama Bank</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider border border-gray-300">Kode Bank</th>
                            {{-- <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal Dibuat</th> --}}
                            <th scope="col" class="px-6 py-3 text-center w-12 text-xs font-medium text-gray-500 uppercase tracking-wider border border-gray-300">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-gray-50 divide-y divide-gray-200">
                        @foreach ($banks as $bank)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 border border-gray-300">{{ $bank->nama_bank }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 border border-gray-300">{{ $bank->kode_bank }}</td>
                            {{-- <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $bank->created_at->format('d M Y') }}</td> --}}
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-end border border-gray-300">
                                <a href="{{ route('bank.edit', $bank) }}" class="inline-flex items-center px-4 py-2 bg-yellow-500 border border-transparent rounded-md font-semibold text-xs uppercase tracking-widest hover:bg-yellow-600 transition ease-in-out duration-150 ml-2 text-white">Edit</a>
                                <form action="{{ route('bank.destroy', $bank->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Apakah Anda yakin ingin menghapus bank {{ addslashes($bank->nama_bank) }}? Tindakan ini tidak dapat diurungkan.');">
                                    @csrf
                                    @method('DELETE')
                                    
                                    <button type="submit" class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs uppercase tracking-widest hover:bg-red-700 transition ease-in-out duration-150 ml-2 text-white">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
</x-app>