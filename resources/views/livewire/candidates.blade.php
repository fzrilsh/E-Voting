<main class="mt-20 w-full">

    <section class="bg-gray-100 flex px-2 py-10 flex-col items-center w-full">
        <div class="flex flex-col items-center">
            <p class="text-base font-bold text-red-telkom tracking-wider">E-Voting</p>
            <h1 class="text-3xl font-bold font-inria-sans text-gray-900 leading-tight">Calon Kandidat</h1>
        </div>
    </section>

    @if (!$candidates)
        <section class="px-5 sm:px-6 lg:px-8 mx-auto max-w-7xl flex flex-col w-full h-60 justify-center items-center mt-10 mb-10">
            <h1 class="text-[20px] shadow-lg px-10 py-5">Belum ada kandidat yang didaftarkan</h1>
        </section>
    @else
        <section class="mt-10 px-5 sm:px-6 lg:px-8 mx-auto max-w-7xl flex flex-col w-full">
            <div class="grid grid-cols-4 max-md:grid-cols-3 max-sm:grid-cols-1 gap-5 w-full mb-5">
                @foreach ($candidates->participants as $participant)
                    <div class="bg-gray-100 rounded-md flex flex-col items-center justify-center overflow-hidden shadow-md">
                        <img src="{{ asset('storage/' . $participant['serial_number']['photo']) }}" alt="Photo Kandidat" class="rounded-t-md w-full h-52 object-cover mb-0" />

                        <div class="p-5 flex flex-col items-center justify-center">
                            <p class="text-lg font-bold">{{ $participant['serial_number']['text'] }}</p>
                            <span class="text-sm">{{ $participant['serial_number']['candidates']->map(fn($v) => $v['name'])->join(' & ') }}</span>
                            <p class="text-sm text-gray-500">"{{ $candidates->title }}"</p>
                        </div>

                        <button onclick="showModal('{{ $participant['serial_number']['serial_number'] }}')" class="w-full px-4 py-2 z-30 text-sm text-center cursor-pointer bg-red-telkom hover:bg-red-telkom-hover text-white">Lihat Visi Misi</button>

                        <div id="{{ $participant['serial_number']['serial_number'] }}" class="absolute collapse opacity-100 scale-100 z-40 bg-white p-4 rounded-md w-11/12 origin-center top-[50%] left-1/2 -translate-x-1/2 -translate-y-1/2 overflow-y-auto max-h-[90%]" style="box-shadow: 0px 0px 0px 99999px black">
                            <button onclick="hideModal('{{ $participant['serial_number']['serial_number'] }}')" class="relative z-50 p-1 flex max-w-xs items-center rounded bg-gray-100 text-sm focus:outline-none hover:bg-gray-200">
                                <svg class="h-6 w-6 text-gray-800" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>

                            <div class="flex flex-col gap-4 mt-5 rounded-md bg-gray-100 p-8 shadow-lg">
                                <h1 class="text-2xl font-bold font-inria-sans text-red-telkom leading-tight mb-4">Online Voting System</h1>
                                <p class="text-gray-800 text-base">
                                    <span class="text-red-telkom font-bold text-xl mb-2">Nama Pasangan :</span>
                                    <b>{{ $participant['serial_number']['text'] }}</b> ({{ $participant['serial_number']['candidates']->map(fn($v) => $v['name'])->join(' & ') }})
                                </p>
                            </div>

                            <div class="flex flex-col gap-4 mt-5 rounded-md bg-red-telkom p-8 shadow-lg">
                                <h1 class="block text-white font-bold text-xl uppercase mb-2 border-b pb-2">Visi</h1>
                                <p class="text-gray-200 text-base">"{{ $participant['vision'] }}"</p>
                            </div>

                            <div class="flex flex-col gap-4 mt-5 rounded-md bg-red-telkom-hover p-8 shadow-lg">
                                <div class="mt-4 text-gray-200">
                                    <h1 class="block text-white font-bold text-xl uppercase mb-2 border-b pb-2">Misi</h1>
                                    <ol class="list-disc list-inside space-y-2">
                                        @foreach (explode("\n", $participant['mission']) as $mission)
                                            <li>{{ $mission }}</li>
                                        @endforeach
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    @endif

</main>

@push('scripts')
    <script>

        function showModal(id){
            console.log(id)
            let modal = document.getElementById(id);
            if(!modal) return false

            modal.classList.remove('collapse')
        }

        function hideModal(id){
            let modal = document.getElementById(id);
            if(!modal) return false;

            modal.classList.add('collapse')
        }

    </script>
@endpush