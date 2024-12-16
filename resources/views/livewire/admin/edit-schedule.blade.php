<main class="flex flex-col items-center justify-center mx-auto max-w-xl mb-5 py-4 pr-4 sm:ml-64 pl-4 sm:pl-0">
    <section class="flex flex-col justify-center items-center w-full">
        <form wire:submit="submit" class="bg-gray-50 rounded-lg p-5 flex flex-col w-full">
            @error('error')
                <div class="space-y-6 bg-red-100 w-fit p-2 rounded-lg">
                    <span class="text-red-500 text-sm"><b>Error</b> {{ $message }}</span>
                </div>
            @enderror
            <div class="flex flex-col justify-center items-center mb-5">
                <h1 class="text-center text-3xl font-semibold text-grey-700 mb-2">Tambah Jadwal Voting</h1>
                <p class="flex items-center gap-2 font-bold text-lg text-gray-500"><span class="block h-1 w-8 bg-red-telkom"></span> E-Voting <span class="block h-1 w-8 bg-red-telkom"></span></p>
            </div>

            <div class="flex flex-col text-gray-500 mb-4">
                <label for="title" class="block mb-2 text-sm font-medium text-gray-500">Judul Voting @error('title') <span class="text-red-500 text-sm">*{{ $message }}</span> @enderror</label>
                <input type="text" name="title" id="title" wire:model="title" class="bg-transparent border border-gray-400 text-gray-900 text-sm rounded-lg block w-full p-2.5 focus:outline-none focus:ring-1 focus:ring-carmine-500" />
            </div>

            <div class="flex flex-col text-gray-500 mb-4">
                <label for="description" class="block mb-2 text-sm font-medium text-gray-500">Deskripsi @error('description') <span class="text-red-500 text-sm">*{{ $message }}</span> @enderror</label>
                <textarea name="description" id="description" rows="3" wire:model="description" class="bg-transparent w-full border-gray-400 text-gray-900 text-sm border rounded-md p-2.5 focus:outline-none focus:ring-1 focus:ring-carmine-500"></textarea>
            </div>

            <div class="flex flex-col text-gray-500 mb-4">
                <label for="candidates_ids" class="block mb-2 text-sm font-medium text-gray-500">Kandidat @error('candidates_ids') <span class="text-red-500 text-sm">*{{ $message }}</span> @enderror</label>
                <select id="candidates_ids" wire:model="candidates_ids" class="bg-transparent border border-gray-400 text-gray-900 text-sm rounded-lg block w-full p-2.5 focus:outline-none focus:ring-1 focus:ring-carmine-500" multiple="2">
                    @foreach ($candidates as $candidate)
                        <option value={{ $candidate['id'] }}>{{ $candidate['text'] }}</option>
                    @endforeach
                </select>
            </div>

            <div class="flex flex-col text-gray-500 mb-4">
                <label for="start" class="block mb-2 text-sm font-medium text-gray-500">Tanggal Mulai @error('start') <span class="text-red-500 text-sm">*{{ $message }}</span> @enderror</label>
                <input type="date" name="start" id="start" wire:model="start" class="bg-transparent border border-gray-400 text-gray-900 text-sm rounded-lg block w-full p-2.5 focus:outline-none focus:ring-1 focus:ring-carmine-500" />
            </div>

            <div class="flex flex-col text-gray-500 mb-4">
                <label for="end" class="block mb-2 text-sm font-medium text-gray-500">Tanggal Selesai @error('end') <span class="text-red-500 text-sm">*{{ $message }}</span> @enderror</label>
                <input type="date" name="end" id="end" wire:model="end" class="bg-transparent border border-gray-400 text-gray-900 text-sm rounded-lg block w-full p-2.5 focus:outline-none focus:ring-1 focus:ring-carmine-500" />
            </div>

            <button type="submit" class="mx-auto text-white bg-carmine-700 hover:bg-carmine-800 focus:ring-4 focus:ring-carmine-300 font-medium rounded-lg text-sm px-10 py-2.5 text-center">Simpan</button>
        </form>
    </section>
</main>