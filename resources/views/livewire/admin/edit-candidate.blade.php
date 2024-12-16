<main class="flex flex-col items-center justify-center mx-auto max-w-xl mb-5 py-4 pr-4 sm:ml-64 pl-4 sm:pl-0">
    <section class="flex flex-col justify-center items-center w-full">
        <form wire:submit="submit" enctype="multipart/form-data" class="bg-gray-50 rounded-lg p-5 flex flex-col w-full">
            <div class="flex flex-col justify-center items-center mb-5">
                <h1 class="text-center text-3xl font-semibold text-grey-700 mb-2">Tambah Kandidat</h1>
                <p class="flex items-center gap-2 font-bold text-lg text-gray-500"><span class="block h-1 w-8 bg-red-telkom"></span> E-Voting <span class="block h-1 w-8 bg-red-telkom"></span></p>
            </div>

            <div class="flex flex-col text-gray-500 mb-4">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-500">Nama Kandidat @error('name') <span class="text-red-500 text-sm">*{{ $message }}</span> @enderror</label>
                <input type="text" name="name" id="name" wire:model="name" class="bg-transparent border border-gray-400 text-gray-900 text-sm rounded-lg block w-full p-2.5 focus:outline-none focus:ring-1 focus:ring-carmine-500" />
            </div>

            <div class="flex flex-col text-gray-500 mb-4">
                <label for="photo" class="block mb-2 text-sm font-medium text-gray-500">Foto Kandidat @error('photo') <span class="text-red-500 text-sm">*{{ $message }}</span> @enderror</label>
                @if ($candidate?->photo)
                    <div class="flex items-center space-x-4 mb-2">
                        <img src="{{ asset('storage/' . $candidate->photo) }}"
                            class="object-contain w-16 h-16 rounded">
                        <span class="text-gray-500">Gambar sudah ada</span>
                    </div>
                @endif
                <input type="file" name="photo" id="photo" wire:model="photo" class="bg-transparent border border-gray-400 text-gray-900 text-sm rounded-lg block w-full p-2.5 focus:outline-none focus:ring-1 focus:ring-carmine-500" />
            </div>

            <div class="flex flex-col text-gray-500 mb-4">
                <label for="serial_number" class="block mb-2 text-sm font-medium text-gray-500">Daftarkan ke nomor urut kandidat?</label>
                <select name="serial_number" id="serial_number" wire:model="serial_number_id" class="bg-transparent border border-gray-400 text-gray-900 text-sm rounded-lg block w-full p-2.5 focus:outline-none focus:ring-1 focus:ring-carmine-500">
                    <option value="">Pilih nomor urut</option>
                    @foreach ($serial_numbers as $item)
                        <option value="{{ $item->id }}">{{ str_pad($item->serial_number, 2, '0', STR_PAD_LEFT) }} {{ $item->text }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="mx-auto text-white bg-carmine-700 hover:bg-carmine-800 focus:ring-4 focus:ring-carmine-300 font-medium rounded-lg text-sm px-10 py-2.5 text-center">Simpan</button>
        </form>
    </section>
</main>