<div>
    <nav
        class="p-3 flex bg-white justify-between items-center border-b border-slate-200 shadow-sm sticky top-0 z-50 h-16">
        <a href="{{ route('bank.index') }}" id="brand"
            class="flex gap-2 items-center text-xl font-semibold text-gray-800 hover:text-gray-900 ml-2">
            <span class="text-xl font-sans font-semibold">Zmijewski</span>
        </a>
        <button class="p-2 md:hidden" onclick="handleMenu()">
            <i class="fa-solid fa-bars text-gray-600"></i>
        </button>
        <div id="nav-menu" class="hidden md:flex items-center gap-3">
            <a href="{{ route('bank.index') }}"
                class="font-medium {{ request()->routeIs('bank.*') ? 'text-blue-900' : 'text-gray-500 hover:text-gray-700' }}">Bank</a>
            <a href="{{ route('variabel.create_step1') }}"
                class="font-medium {{ request()->routeIs('variabel.*') ? 'text-blue-900' : 'text-gray-500 hover:text-gray-700' }}">Variabel</a>
            <a href="{{ route('model.create_input') }}"
                class="font-medium {{ request()->routeIs('model.*') ? 'text-blue-900' : 'text-gray-500 hover:text-gray-700' }}">Model</a>
            <a href="{{ route('hasil.index') }}"
                class="font-medium {{ request()->routeIs('hasil.*') ? 'text-blue-900' : 'text-gray-500 hover:text-gray-700' }}">Kesimpulan</a>
        </div>

        {{-- Mobile Navbar --}}
        <div id="nav-dialog" class="hidden fixed z-10 md:hidden bg-white inset-0 p-3 ">
            <div id="nav-bar" class="flex justify-between">
                <a href="{{ route('bank.index') }}" id="brand"
                    class="flex items-center text-xl font-semibold text-gray-700 hover:text-gray-800 ml-2">
                    <span class="text-lg font-sans text-bold">Zmijewski</span>
                </a>
                <button class="p-2 md:hidden" onclick="handleMenu()">
                    <i class="fa-solid fa-xmark text-gray-600"></i>
                </button>
            </div>
            <div class="mt-6">
                <a href="{{ route('bank.index') }}"
                    class="font-semibold m-3 p-3 hover:bg-slate-50 block rounded-lg">Bank</a>
                <a href="{{ route('variabel.create_step1') }}"
                    class="font-semibold m-3 p-3 hover:bg-slate-50 block rounded-lg">Variabel</a>
                <a href="{{ route('model.create_input') }}"
                    class="font-semibold m-3 p-3 hover:bg-slate-50 block rounded-lg">Model</a>
                <a href="{{ route('hasil.index') }}"
                    class="font-semibold m-3 p-3 hover:bg-slate-50 block rounded-lg">Kesimpulan</a>
            </div>
            <div class="h-[1px] bg-gray-500"></div>
            <span class="block text-center mt-2 text-xs">Copyright &copy; Zmijewski 2025</span>
        </div>
    </nav>
</div>
@push('script')
    <script>
        const navDialog = document.getElementById("nav-dialog");

        function handleMenu() {
            navDialog.classList.toggle("hidden");
        }
    </script>
@endpush
