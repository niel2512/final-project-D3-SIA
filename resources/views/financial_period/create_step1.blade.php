<x-app>
    <x-slot name="header">
        <h2 class="font-semibold text-center text-xl text-gray-800 leading-tight">
            Variabel
        </h2>
    </x-slot>

    <div class="mb-8">
        <h2 class="font-semibold text-center text-xl text-gray-800 leading-tight mb-4">
            Input Bank dan Tahun
        </h2>
    
    <form action="{{ route('variabel.create_step2') }}" method="POST" class="space-y-4">
        @csrf
        <div class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-4">
            <div>
                <label for="bank_id" class="block text-sm mb-2 font-medium text-gray-700">Pilih Bank</label>
                <select name="bank_id" id="bank_id" required class="bg-slate-50 border border-gray-300 shadow-sm text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                    <option value="">-- Pilih Bank --</option>
                    @foreach ($banks as $bank)
                        <option value="{{ $bank->id }}" {{ old('bank_id') == $bank->id ? 'selected' : '' }}>
                            {{ $bank->nama_bank }} ({{ $bank->kode_bank }})
                        </option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="tahun" class="block text-sm mb-2 font-medium text-gray-700">Tahun Periode Keuangan</label>
                <input type="number" name="tahun" id="tahun" value="{{ old('tahun', date('Y')-1) }}" required class="bg-slate-50 border border-gray-300 shadow-sm text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" min="1900" max="{{ date('Y')+1 }}" placeholder="YYYY">
            </div>
        </div>
        <div>
            <button type="submit" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700">
                Selanjutnya
            </button>
        </div>
    </form>
    </div>
</x-app>