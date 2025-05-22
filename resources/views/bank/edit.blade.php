<x-app>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Banks
        </h2>
    </x-slot>

    <div class="mb-8">
     <h2 class="font-semibold text-xl text-center text-gray-800 leading-tight mb-4">
            Edit Bank {{ $bank->nama_bank }}
        </h2>
        <form action="{{ route('bank.update', $bank->id) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-4">
                <div>
                    <label for="nama_bank" class="block text-sm mb-2 font-medium text-gray-700">Nama Bank</label>
                    <input type="text" name="nama_bank" id="nama_bank" value="{{ old('nama_bank', $bank->nama_bank) }}" required class="@error('nama_bank') border-red-500 @enderror bg-slate-50 border border-gray-300 shadow-sm text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                    @error('nama_bank')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="kode_bank" class="block text-sm mb-2 font-medium text-gray-700">Kode Bank</label>
                    <input type="text" name="kode_bank" id="kode_bank" value="{{ old('kode_bank', $bank->kode_bank) }}" required
                           class="@error('nama_bank') border-red-500 @enderror bg-slate-50 border border-gray-300 shadow-sm text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                    @error('kode_bank')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="flex justify-start space-x-3">
                <button type="submit" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:border-indigo-900 focus:ring ring-indigo-300 disabled:opacity-25 transition ease-in-out duration-150">
                    Simpan Perubahan
                </button>
                <a href="{{ route('bank.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-300 border border-transparent rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest hover:bg-gray-400 active:bg-gray-500 focus:outline-none focus:border-gray-500 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                    Batal
                </a>
            </div>
        </form>
    </div>
</x-app>