<main class="flex flex-col items-center justify-center mx-auto max-w-xl mb-5">
    <section class="flex flex-col justify-center items-center w-full">
        <div class="flex flex-col justify-center items-center mb-5">
            <h1 class="text-center text-3xl font-semibold text-grey-700 mb-2">Buat Akun</h1>
            <p class="flex items-center gap-2 font-bold text-lg text-gray-500"><span
                    class="block h-1 w-8 bg-red-telkom"></span> E-Voting <span class="block h-1 w-8 bg-red-telkom"></span>
            </p>
        </div>

        <form class="bg-gray-50 rounded-lg p-5 flex flex-col" wire:submit="submit">
            <p class="text-gray-500 text-sm mb-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                ullamco laboris nisi ut.</p>
            <p class="text-sm mb-10">*Semua bidang wajib diisi.</p>
            <div class="flex flex-col text-gray-500 mb-4">
                <label for="nim" class="block mb-2 text-sm font-medium text-gray-500">NIM @error('nim') <span class="text-red-500 text-sm">*{{ $message }}</span> @enderror</label>
                <input type="text" name="nim" id="nim" value="{{ old('nim', $nim) }}" wire:model="nim"
                    class="bg-transparent border @if ($errors->has('nim')) border-red-500 @else border-gray-400 @endif text-gray-900 text-sm rounded-lg block w-full p-2.5 focus:outline-none focus:ring-1 focus:ring-carmine-500" />
            </div>
            <div class="flex flex-col text-gray-500 mb-4">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-500">Name @error('name') <span class="text-red-500 text-sm">*{{ $message }}</span> @enderror</label>
                <input type="text" name="name" id="name" value="{{ old('name', $name) }}" wire:model="name"
                    class="bg-transparent border @if ($errors->has('name')) border-red-500 @else border-gray-400 @endif text-gray-900 text-sm rounded-lg block w-full p-2.5 focus:outline-none focus:ring-1 focus:ring-carmine-500" />
            </div>
            <div class="flex flex-col text-gray-500 mb-4">
                <label for="nickname" class="block mb-2 text-sm font-medium text-gray-500">Nickname @error('nickname') <span class="text-red-500 text-sm">*{{ $message }}</span> @enderror</label>
                <input type="text" name="nickname" id="nickname" value="{{ old('nickname', $nickname) }}" wire:model="nickname"
                    class="bg-transparent border @if ($errors->has('nickname')) border-red-500 @else border-gray-400 @endif text-gray-900 text-sm rounded-lg block w-full p-2.5 mb-1 focus:outline-none focus:ring-1 focus:ring-carmine-500" />
                <p class="text-xs">masukkan nama yang unik berbeda dengan yang lainnya.</p>
            </div>
            <div class="flex flex-col text-gray-500 w-full mb-4">
                <div class="flex w-full justify-between items-center">
                    <label for="password" class="block mb-2 text-sm font-medium text-gray-500">Password @error('password') <span class="text-red-500 text-sm">*{{ $message }}</span> @enderror</label>
                    <div class="flex text-gray-400 gap-1 cursor-pointer items-center"
                        wire:click="togglePasswordVisibility">
                        @if ($isPasswordVisible)
                            <i class="fas fa-eye-slash"></i>
                            <p class="text-sm select-none">Hide</p>
                        @else
                            <i class="fas fa-eye"></i>
                            <p class="text-sm select-none">Show</p>
                        @endif
                    </div>
                </div>
                <input type="{{ $isPasswordVisible ? 'text' : 'password' }}" name="password" id="password" value="{{ old('password', $password) }}" wire:model="password"
                    class="bg-transparent border @if ($errors->has('password')) border-red-500 @else border-gray-400 @endif text-gray-900 text-sm rounded-lg block w-full p-2.5 mb-2 focus:outline-none focus:ring-1 focus:ring-carmine-500" />

                <ul class="grid grid-cols-2 list-disc list-inside text-xs">
                    <li>Gunakan 8 karakter atau lebih</li>
                    <li>Gunakan nomor (contoh, 1234)</li>
                    <li>Gunakan huruf besar dan kecil</li>
                    <li>Gunakan simbol (contoh, !@#$)</li>
                </ul>
            </div>

            <div class="mb-4">
                <label class="block mb-2 text-sm font-medium text-gray-500">Apa jenis kelamin Kamu? @error('gender') <span class="text-red-500 text-sm">*{{ $message }}</span> @enderror</label>
                <div class="flex space-x-4">
                    <label class="flex items-center">
                        <input type="radio" name="gender" wire:model="gender" value="F" class="form-radio h-3 w-3 text-gray-600" />
                        <span class="ml-2 text-sm font-medium text-gray-500">Perempuan</span>
                    </label>
                    <label class="flex items-center">
                        <input type="radio" name="gender" wire:model="gender" value="M" class="form-radio h-3 w-3 text-gray-600" />
                        <span class="ml-2 text-sm font-medium text-gray-500">Laki-laki</span>
                    </label>
                </div>
            </div>

            <div class="mb-4">
                <label class="block mb-2 text-sm font-medium text-gray-500">What's your date of birth? @error('date') <span class="text-red-500 text-sm">*{{ $message }}</span> @enderror @error('month') <span class="text-red-500 text-sm">*{{ $message }}</span> @enderror @error('year') <span class="text-red-500 text-sm">*{{ $message }}</span> @enderror</label>
                <div class="flex space-x-4">
                    <div class="flex-1">
                        <input type="text" name="date" id="date" value="{{ old('date', $date) }}" wire:model.live="date" placeholder="Date"
                            class="bg-transparent border border-gray-400 text-gray-900 text-sm rounded-lg block w-full p-2.5 mb-1 focus:outline-none focus:ring-1 focus:ring-carmine-500" />
                    </div>

                    <div class="flex-1">
                        <input type="text" name="month" id="month" value="{{ old('month', $month) }}" wire:model.live="month" placeholder="Month"
                            class="bg-transparent border border-gray-400 text-gray-900 text-sm rounded-lg block w-full p-2.5 mb-1 focus:outline-none focus:ring-1 focus:ring-carmine-500" />
                    </div>

                    <div class="flex-1">
                        <input type="text" name="year" id="year"  value="{{ old('year', $year) }}" wire:model.live="year" placeholder="Year"
                            class="bg-transparent border border-gray-400 text-gray-900 text-sm rounded-lg block w-full p-2.5 mb-1 focus:outline-none focus:ring-1 focus:ring-carmine-500" />
                    </div>
                </div>
            </div>

            <button type="submit"
                class="mx-auto text-white bg-carmine-700 hover:bg-carmine-800 focus:ring-4 focus:ring-carmine-300 font-medium rounded-lg text-sm px-10 py-2.5 text-center">Kirim</button>
        </form>
    </section>
</main>
