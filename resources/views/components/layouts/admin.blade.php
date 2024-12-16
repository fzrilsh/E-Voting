<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? config('app.name') }} | Admin Page</title>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Inria+Sans:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&family=Inria+Serif:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet" />

    @livewireStyles
    @vite('resources/css/app.css')
</head>

<body>
    <div class="flex flex-row items-center mt-4 ms-4 gap-2 sm:hidden">
        <button data-drawer-target="default-sidebar" data-drawer-toggle="default-sidebar" aria-controls="default-sidebar" type="button" class="text-sm text-gray-500 hover:text-gray-600 focus:outline-none focus:ring-0">
            <span class="sr-only">Open sidebar</span>
            <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
            </svg>
        </button>

        <p class="flex items-center text-sm font-extrabold text-gray-900 gap-1">
            <img src="{{ asset('img/logo_univ.png') }}" alt="Logo Telkom University" class="w-20" />
        </p>
    </div>

    <aside id="default-sidebar" class="fixed top-0 left-0 z-40 w-64 h-full p-4 transition-transform -translate-x-full sm:translate-x-0" aria-label="Sidebar">
        <div class="h-full px-3 py-4 overflow-y-auto bg-gray-100 rounded-md">
            <div class="flex flex-col items-start mb-4">
                <span class="block text-base font-bold text-gray-900 text-left">{{ auth()->user()->name }}</span>
                <span class="block text-sm text-gray-500 text-left mb-2">{{ auth()->user()->nim }}</span>
                <p class="block text-xs font-medium uppercase bg-carmine-500 px-2 py-1 rounded-full text-white text-center">Admin</p>
            </div>
            <hr class="my-6 border-t border-gray-300" />
            <ul class="space-y-2 font-medium">
                <li>
                    <a href="{{ route('admin.dashboard') }}" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group">
                        <svg class="w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                            <path d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z" />
                            <path d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z" />
                        </svg>
                        <span class="ms-3 max-sm:text-sm">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.schedules') }}" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group">
                        <svg class="w-6 h-6 text-gray-500 flex-shrink-0 group-hover:text-gray-900 transition duration-75" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path d="M8.707 7.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l2-2a1 1 0 00-1.414-1.414L11 7.586V3a1 1 0 10-2 0v4.586l-.293-.293z"></path>
                            <path d="M3 5a2 2 0 012-2h1a1 1 0 010 2H5v7h2l1 2h4l1-2h2V5h-1a1 1 0 110-2h1a2 2 0 012 2v10a2 2 0 01-2 2H5a2 2 0 01-2-2V5z"></path>
                        </svg>
                        <span class="ml-3 flex-1 whitespace-nowrap max-sm:text-sm">Jadwal Vote</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.candidates') }}" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group">
                        <svg class="w-6 h-6 text-gray-500 flex-shrink-0 group-hover:text-gray-900 transition duration-75" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="ml-3 flex-1 whitespace-nowrap max-sm:text-sm">Kandidat</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.serial-numbers') }}" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group">
                        <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900" xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960" fill="currentColor">
                            <path
                                d="M400-400h160v-80H400v80Zm0-120h320v-80H400v80Zm0-120h320v-80H400v80Zm-80 400q-33 0-56.5-23.5T240-320v-480q0-33 23.5-56.5T320-880h480q33 0 56.5 23.5T880-800v480q0 33-23.5 56.5T800-240H320Zm0-80h480v-480H320v480ZM160-80q-33 0-56.5-23.5T80-160v-560h80v560h560v80H160Zm160-720v480-480Z"
                            />
                        </svg>
                        <span class="flex-1 ms-3 whitespace-nowrap max-sm:text-sm">Nomor Urut</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('logout') }}" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group">
                        <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 -960 960 960">
                            <path d="M200-120q-33 0-56.5-23.5T120-200v-560q0-33 23.5-56.5T200-840h280v80H200v560h280v80H200Zm440-160-55-58 102-102H360v-80h327L585-622l55-58 200 200-200 200Z" />
                        </svg>
                        <span class="flex-1 ms-3 whitespace-nowrap max-sm:text-sm">Sign Out</span>
                    </a>
                </li>
            </ul>
        </div>
    </aside>

    {{ $slot }}

    @stack('scripts')

    @livewireScripts
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('vendor/livewire-alert/livewire-alert.js') }}"></script>
    <x-livewire-alert::flash />
</body>

</html>
