<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Zmijewski App</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
    <link rel="icon" href="{{ asset('favicon.png') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        ::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 10px;
        }

        ::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            /* slate-300 */
            border-radius: 10px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #94a3b8;
            /* slate-500 */
        }

        body {
            font-family: 'Figtree', sans-serif;
        }
    </style>
</head>

<body class="font-sans antialiased bg-slate-100 text-slate-800">
    <div class="min-h-screen flex flex-col">
        <nav
            class="p-3 flex bg-white justify-between items-center border-b border-slate-200 shadow-sm sticky top-0 z-50 h-16">
            <a href="{{ route('bank.index') }}" id="brand"
                class="flex gap-2 items-center text-xl font-semibold text-gray-700 hover:text-gray-800 ml-2">
                <span class="text-lg font-sans font-semibold">Zmijewski</span>
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
                        <span class="text-lg font-sans font-semibold">Zmijewski</span>
                    </a>
                    <button class="p-2 md:hidden" onclick="handleMenu()">
                        <i class="fa-solid fa-xmark text-gray-600"></i>
                    </button>
                </div>
                <div class="mt-6">
                    <a href="{{ route('bank.index') }}"
                        class="font-semibold m-3 p-3 hover:bg-slate-50 block rounded-lg">Bank</a>
                    <a href="{{ route('variabel.create_step1') }}"
                        class="font-semibold m-3 p-3 hover:bg-slate-50 block rounded-lg">Model</a>
                    <a href="{{ route('model.create_input') }}"
                        class="font-semibold m-3 p-3 hover:bg-slate-50 block rounded-lg">Model</a>
                    <a href="{{ route('hasil.index') }}"
                        class="font-semibold m-3 p-3 hover:bg-slate-50 block rounded-lg">Kesimpulan</a>
                </div>
                <div class="h-[1px] bg-gray-500"></div>
                <span class="block text-center mt-2 text-xs">Copyright &copy; Zmijewski 2025</span>
            </div>
        </nav>
        @if (isset($header))
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif

        <main class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                    @if (session('success'))
                        <div class="mb-4 p-4 bg-green-100 text-green-700 border border-green-300 rounded">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if (session('error'))
                        <div class="mb-4 p-4 bg-red-100 text-red-700 border border-red-300 rounded">
                            {{ session('error') }}
                        </div>
                    @endif
                    @if ($errors->any())
                        <div class="mb-4 p-4 bg-red-100 text-red-700 border border-red-300 rounded">
                            <ul class="list-disc pl-5">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    {{ $slot }}
                </div>
            </div>
        </main>
    </div>
</body>
<script>
    const navDialog = document.getElementById("nav-dialog");

    function handleMenu() {
        navDialog.classList.toggle("hidden");
    }
</script>

</html>
