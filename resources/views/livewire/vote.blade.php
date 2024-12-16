<main class="mt-20 max-sm:mt-10 w-full">
    <section class="bg-gray-100 flex px-2 py-10 flex-col items-center w-full">
        <div class="flex flex-col items-center">
            <p class="text-base font-bold text-red-telkom tracking-wider">E-Voting</p>
            <h1 class="text-3xl font-bold font-inria-sans text-gray-900 leading-tight">{{ $schedule?->title ?? 'Pemilihan Kandidat' }}</h1>
            <p class="text-sm text-gray-500 tracking-wider">Pilih Kandidat yang Anda Dukung</p>
        </div>
    </section>

    <section class="mt-10 px-5 sm:px-6 lg:px-8 mx-auto max-w-7xl flex flex-col w-full h-auto">
        <form wire:submit="vote" method="POST" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5 w-full mb-5 h-auto">
            @foreach ($schedule->participants as $participant)
                <label class="relative bg-gray-50 rounded-lg shadow hover:bg-blue-50 transition duration-200 cursor-pointer">
                    <span class="absolute top-[-10px] left-[-5px] w-10 h-10 rounded-full bg-black text-white font-bold flex items-center justify-center">
                        {{ str_pad($participant['serial_number']['serial_number'], 2, '0', STR_PAD_LEFT) }}
                    </span>
                    <img src="{{ asset('storage/' . $participant['serial_number']['photo']) }}" alt="Photo Kandidat" class="rounded-t-md w-full h-52 object-cover mb-0" />

                    <div class="flex p-4 flex-col justify-between items-center gap-4 h-52">
                        <div class="flex-1">
                            <h3 class="text-lg font-bold text-gray-900 text-center">{{ $participant['serial_number']['text'] }}</h3>
                            <p class="text-gray-900 text-center mb-5">{{ $participant['candidates']->map(fn($v) => $v->name)->join(' & ') }}</p>
                            <p class="text-lg text-gray-600 text-center">"{{ $participant['vision'] }}"</p>
                        </div>
                        <input type="radio" name="choice" wire:model="choice" value="{{ $participant['serial_number']['id'] }}" class="w-6 h-6 text-blue-600 border-gray-300 focus:ring-blue-500" />
                    </div>
                </label>
            @endforeach

            <div class="mt-8 col-span-3 w-full flex items-center justify-center">
                <button type="submit" class="px-4 py-2 bg-carmine-600 text-white font-semibold rounded-lg hover:bg-carmine-700 transition duration-200" @disabled($hasVote)>Konfirmasi Pilihan</button>
            </div>
        </form>
    </section>
</main>