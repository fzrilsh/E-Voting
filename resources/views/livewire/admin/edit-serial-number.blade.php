<main class="flex flex-col items-center justify-center mx-auto max-w-xl mb-5 py-4 pr-4 sm:ml-64 pl-4 sm:pl-0">
    <section class="flex flex-col justify-center items-center w-full">
        <form wire:submit="submit" class="bg-gray-50 rounded-lg p-5 flex flex-col w-full">
            <div class="flex flex-col justify-center items-center mb-5">
                <h1 class="text-center text-3xl font-semibold text-grey-700 mb-2">Tambah Nomor Urut</h1>
                <p class="flex items-center gap-2 font-bold text-lg text-gray-500"><span class="block h-1 w-8 bg-red-telkom"></span> E-Voting <span class="block h-1 w-8 bg-red-telkom"></span></p>
            </div>

            <div class="flex flex-col text-gray-500 mb-4">
                <label for="serial_number" class="block mb-2 text-sm font-medium text-gray-500">Nomor Urut @error('serial_number') <span class="text-red-500 text-sm">*{{ $message }}</span> @enderror</label>
                <input type="number" name="serial_number" id="serial_number" wire:model="serial_number" class="bg-transparent border border-gray-400 text-gray-900 text-sm rounded-lg block w-full p-2.5 focus:outline-none focus:ring-1 focus:ring-carmine-500" />
            </div>

            <div class="flex flex-col text-gray-500 mb-4">
                <label for="photo" class="block mb-2 text-sm font-medium text-gray-500">Foto Pasangan Kandidat @error('photo') <span class="text-red-500 text-sm">*{{ $message }}</span> @enderror</label>
                @if ($number?->photo)
                    <div class="flex items-center space-x-4 mb-2">
                        <img src="{{ asset('storage/' . $number->photo) }}"
                            class="object-contain w-16 h-16 rounded">
                        <span class="text-gray-500">Gambar sudah ada</span>
                    </div>
                @endif
                <input type="file" accept=".png,.jpg,.jpeg,.webp" name="photo" id="photo" wire:model="photo" class="bg-transparent border border-gray-400 text-gray-900 text-sm rounded-lg block w-full p-2.5 focus:outline-none focus:ring-1 focus:ring-carmine-500" />
            </div>

            <div class="flex flex-col text-gray-500 mb-4">
                <label for="text" class="block mb-2 text-sm font-medium text-gray-500">Nama Pasangan Kandidat @error('text') <span class="text-red-500 text-sm">*{{ $message }}</span> @enderror</label>
                <input type="text" name="text" id="text" wire:model="text" class="bg-transparent border border-gray-400 text-gray-900 text-sm rounded-lg block w-full p-2.5 focus:outline-none focus:ring-1 focus:ring-carmine-500" />
            </div>

            <div class="flex flex-col text-gray-500 mb-4">
                <label for="vision" class="block mb-2 text-sm font-medium text-gray-500">Visi Kandidat @error('vision') <span class="text-red-500 text-sm">*{{ $message }}</span> @enderror</label>
                <textarea name="vision" id="vision" wire:model="vision" rows="2" class="bg-transparent border border-gray-400 text-gray-900 text-sm rounded-lg block w-full p-2.5 focus:outline-none focus:ring-1 focus:ring-carmine-500"></textarea>
            </div>

            <div class="flex flex-col text-gray-500 mb-4">
                <label for="mission" class="block mb-2 text-sm font-medium text-gray-500">Misi Kandidat @error('mission') <span class="text-red-500 text-sm">*{{ $message }}</span> @enderror</label>
                <textarea name="mission" id="mission" wire:model="mission" rows="2" class="bg-transparent border border-gray-400 text-gray-900 text-sm rounded-lg block w-full p-2.5 focus:outline-none focus:ring-1 focus:ring-carmine-500"></textarea>
                <span class="text-xs">Catatan: pisahkan setiap poin dengan enter</span>
            </div>

            <button type="submit" class="mx-auto text-white bg-carmine-700 hover:bg-carmine-800 focus:ring-4 focus:ring-carmine-300 font-medium rounded-lg text-sm px-10 py-2.5 text-center">Simpan</button>
        </form>
    </section>
</main>