<x-app>
    <x-slot name="header">
        <h2 class="font-semibold text-center text-xl text-gray-800 leading-tight">
            Input Model Zmijewski - Pilih Periode
        </h2>
    </x-slot>

    @if($financialPeriods->isEmpty())
        <p class="text-gray-600">Belum ada data periode keuangan yang siap untuk dihitung model Zmijewski (pastikan X1, X2, X3 sudah dihitung).</p>
        <div class="mt-4">
            <a href="{{ route('variabel.create_step1') }}" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700">
                Input Variabel Baru
            </a>
        </div>
    @else
        <form action="{{ route('model.calculate_show') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label for="financial_period_id" class="block text-sm mb-2 font-medium text-gray-700">Pilih Periode Bank dan Tahun (X1,X2,X3 sudah terhitung)</label>
                <select name="financial_period_id" id="financial_period_id" required class="bg-slate-50 border border-gray-300 shadow-sm text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                    <option value="">-- Pilih Periode --</option>
                    @foreach ($financialPeriods as $period)
                        <option value="{{ $period->id }}" {{ old('financial_period_id') == $period->id ? 'selected' : '' }}>
                            {{ $period->bank->nama_bank }} ({{ $period->bank->kode_bank }}) - Tahun: {{ $period->tahun }}
                            (X1: {{ number_format($period->x1,3) }}, X2: {{ number_format($period->x2,3) }}, X3: {{ number_format($period->x3,3) }})
                        </option>
                    @endforeach
                </select>
            </div>
            <div>
                <button type="submit" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700">
                    Hitung Model Zmijewski
                </button>
            </div>
        </form>
    @endif
</x-app>