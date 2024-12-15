<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? config('app.name') }} | E-Voting Telkom University</title>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Inria+Sans:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&family=Inria+Serif:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet" />

    @livewireStyles
    @vite('resources/css/app.css')
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body>
    <nav class="bg-white fixed top-0 left-0 w-full m-auto" x-data="{ isOpen: false }">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 py-4">
            <div class="mx-auto flex items-center justify-between">
                <div class="flex lg:flex-1">
                    <a href="{{ route('dashboard') }}">
                        <span class="sr-only">Telkom University</span>
                        <img class=" h-14" src="{{ asset('img/logo_univ.png') }}" alt="Logo Telkom University" />
                    </a>
                </div>

                <div class="hidden md:block">
                    <div class="ml-10 flex items-baseline space-x-4">
                        <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                        <a href="{{ route('dashboard') }}"
                            class="relative px-3 py-2 text-sm font-medium text-black before:content-normal before:absolute before:bottom-0 before:left-1/2 before:transition-all before:-translate-x-1/2 before:ease-in-out before:bg-[#d0d6dd] before:h-[2px] before:w-0 hover:before:w-full"
                            aria-current="page">Dashboard</a>
                        <a href="#"
                            class="relative px-3 py-2 text-sm font-medium text-black before:content-normal before:absolute before:bottom-0 before:left-1/2 before:transition-all before:-translate-x-1/2 before:ease-in-out before:bg-[#d0d6dd] before:h-[2px] before:w-0 hover:before:w-full">Vote</a>
                        <a href="{{ route('candidates') }}"
                            class="relative px-3 py-2 text-sm font-medium text-black before:content-normal before:absolute before:bottom-0 before:left-1/2 before:transition-all before:-translate-x-1/2 before:ease-in-out before:bg-[#d0d6dd] before:h-[2px] before:w-0 hover:before:w-full">Candidates</a>
                        <a href="{{ route('quick-count') }}"
                            class="relative px-3 py-2 text-sm font-medium text-black before:content-normal before:absolute before:bottom-0 before:left-1/2 before:transition-all before:-translate-x-1/2 before:ease-in-out before:bg-[#d0d6dd] before:h-[2px] before:w-0 hover:before:w-full">Quick
                            Count</a>
                    </div>
                </div>
                <div class="hidden md:block">
                    <div class="ml-4 flex items-center md:ml-6">
                        <!-- Profile dropdown -->
                        <div class="relative ml-3">
                            <a href="{{ route('login') }}"
                                class="px-4 py-2 text-sm font-medium text-white bg-red-telkom rounded-md hover:ring-offset-2 hover:ring-offset-red-telkom hover:bg-red-telkom-hover">Login</a>
                        </div>
                        <div class="relative ml-3">
                            <div x-show="isOpen" x-transition:enter="transition ease-out duration-100 transform"
                                x-transition:enter-start="opacity-0 scale-95"
                                x-transition:enter-end="opacity-100 scale-100"
                                x-transition:leave="transition ease-in duration-75 transform"
                                x-transition:leave-start="opacity-100 scale-100"
                                x-transition:leave-end="opacity-0 scale-95"
                                class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                                role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button"
                                tabindex="-1">
                                <!-- Active: "bg-gray-100", Not Active: "" -->
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem"
                                    tabindex="-1" id="user-menu-item-0">Your Profile</a>
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem"
                                    tabindex="-1" id="user-menu-item-1">Settings</a>
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem"
                                    tabindex="-1" id="user-menu-item-2">Sign out</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="-mr-2 flex md:hidden">
                    <!-- Mobile menu button -->
                    <button type="button" @click="isOpen = !isOpen"
                        class="relative inline-flex items-center justify-center rounded-md bg-gray-200 p-2 text-gray-800 hover:bg-gray-300 hover:text-gray-800 focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-300"
                        aria-controls="mobile-menu" aria-expanded="false">
                        <span class="absolute -inset-0.5"></span>
                        <span class="sr-only">Open main menu</span>
                        <!-- Menu open: "hidden", Menu closed: "block" -->
                        <svg :class="{ 'hidden': isOpen, 'block': !isOpen }" class="block h-6 w-6" fill="none"
                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                        </svg>
                        <!-- Menu open: "block", Menu closed: "hidden" -->
                        <svg :class="{ 'block': isOpen, 'hidden': !isOpen }" class="hidden h-6 w-6" fill="none"
                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile menu, show/hide based on menu state. -->
        <div x-show="isOpen" x-transition:enter="transition ease-in-out duration-100 transform"
            x-transition:enter-start="scale-95" x-transition:enter-end="opacity-100 scale-100"
            x-transition:leave="transition ease-in duration-75 transform"
            x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95"
            class="md:hidden" id="mobile-menu">
            <div class="space-y-1 px-2 pb-3 pt-2 sm:px-3">
                <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                <a href="{{ route('dashboard') }}"
                    class="block rounded-md px-3 py-2 text-base font-medium text-gray-600 hover:bg-gray-200"
                    aria-current="page">Dashboard</a>
                <a href="#"
                    class="block rounded-md px-3 py-2 text-base font-medium text-gray-600 hover:bg-gray-200">Vote</a>
                <a href="{{ route('candidates') }}"
                    class="block rounded-md px-3 py-2 text-base font-medium text-gray-600 hover:bg-gray-200">Candidates</a>
                <a href="{{ route('quick-count') }}"
                    class="block rounded-md px-3 py-2 text-base font-medium text-gray-600 hover:bg-gray-200">Quick Count</a>
            </div>
            <div class="border-t border-gray-700 pb-3 pt-4 px-2 sm:px-3">
                <a href="{{ route('login') }}"
                    class="block w-full px-4 py-2 font-medium text-white bg-red-telkom rounded-md hover:ring-offset-2 hover:ring-offset-red-telkom hover:bg-red-telkom-hover">Login</a>
            </div>
        </div>
    </nav>

    {{ $slot }}

    <footer
        class="mt-10 grid max-sm:grid-cols-2 max-sm:grid-flow-dense w-full place-items-start gap-4 grid-flow-col bg-gray-100 text-base-content mx-auto py-10 max-w-7xl px-4 max-sm:px-10 lg:px-8">
        <aside class="grid place-items-start gap-4">
            <img src="/img/logo_univ_verti.png" alt="Logo Telkom University" width="80" height="80" />
            <nav>
                <h6 class="mb-2 font-bold uppercase text-red-telkom">Social</h6>
                <div class="grid grid-flow-col gap-4">
                    <button class="text-gray-600 hover:text-gray-800">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            class="fill-current">
                            <path
                                d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z">
                            </path>
                        </svg>
                    </button>
                    <button class="text-gray-600 hover:text-gray-800">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            class="fill-current">
                            <path
                                d="M19.615 3.184c-3.604-.246-11.631-.245-15.23 0-3.897.266-4.356 2.62-4.385 8.816.029 6.185.484 8.549 4.385 8.816 3.6.245 11.626.246 15.23 0 3.897-.266 4.356-2.62 4.385-8.816-.029-6.185-.484-8.549-4.385-8.816zm-10.615 12.816v-8l8 3.993-8 4.007z">
                            </path>
                        </svg>
                    </button>
                    <button class="text-gray-600 hover:text-gray-800">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            class="fill-current">
                            <path
                                d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z">
                            </path>
                        </svg>
                    </button>
                </div>
            </nav>
        </aside>
        <nav class="grid place-items-start gap-2 w-full">
            <h6 class="mb-2 font-bold uppercase text-red-telkom">Services</h6>
            <a class="cursor-pointer text-sm text-gray-600 hover:text-gray-800">Branding</a>
            <a class="cursor-pointer text-sm text-gray-600 hover:text-gray-800">Design</a>
            <a class="cursor-pointer text-sm text-gray-600 hover:text-gray-800">Marketing</a>
            <a class="cursor-pointer text-sm text-gray-600 hover:text-gray-800">Advertisement</a>
        </nav>
        <nav class="grid place-items-start gap-2 w-full">
            <h6 class="mb-2 font-bold uppercase text-red-telkom">Company</h6>
            <a class="cursor-pointer text-sm text-gray-600 hover:text-gray-800">About us</a>
            <a class="cursor-pointer text-sm text-gray-600 hover:text-gray-800">Contact</a>
            <a class="cursor-pointer text-sm text-gray-600 hover:text-gray-800">Jobs</a>
            <a class="cursor-pointer text-sm text-gray-600 hover:text-gray-800">Press kit</a>
        </nav>
        <nav class="grid place-items-start gap-2 w-full">
            <h6 class="mb-2 font-bold uppercase text-red-telkom">Legal</h6>
            <a class="cursor-pointer text-sm text-gray-600 hover:text-gray-800">Terms of use</a>
            <a class="cursor-pointer text-sm text-gray-600 hover:text-gray-800">Privacy policy</a>
            <a class="cursor-pointer text-sm text-gray-600 hover:text-gray-800">Cookie policy</a>
        </nav>
    </footer>

    @stack('scripts')

    @livewireScripts
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('vendor/livewire-alert/livewire-alert.js') }}"></script>
    <x-livewire-alert::flash />
</body>

</html>
