<main class="flex flex-col items-center justify-center mx-auto max-w-xl mb-5">
    <section class="flex flex-col justify-center items-center w-full">
        <div class="flex flex-col justify-center items-center mb-5">
            <h1 class="text-center text-3xl font-semibold text-grey-700 mb-2">Login Akun</h1>
            <p class="flex items-center gap-2 font-bold text-lg text-gray-500"><span class="block h-1 w-8 bg-red-telkom"></span> E-Voting <span class="block h-1 w-8 bg-red-telkom"></span></p>
        </div>

        <form class="bg-gray-50 rounded-lg p-5 flex flex-col w-full" wire:submit="submit">
            @error('error')
                <div class="space-y-6 bg-red-100 w-fit p-2 rounded-lg">
                    <span class="text-red-500 text-sm"><b>Error</b> {{ $message }}</span>
                </div>
            @enderror
            <div class="flex flex-col text-gray-500 mb-4">
                <label for="nim" class="block mb-2 text-sm font-medium text-gray-500">NIM @error('nim') <span class="text-red-500 text-sm">*{{ $message }}</span> @enderror</label>
                <input type="text" name="nim" id="nim" wire:model="nim" class="bg-transparent border @if ($errors->has('nim')) border-red-500 @else border-gray-400 @endif text-gray-900 text-sm rounded-lg block w-full p-2.5 focus:outline-none focus:ring-1 focus:ring-carmine-500" />
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
                <input type="{{ $isPasswordVisible ? 'text' : 'password' }}" name="password" id="password" wire:model="password" class="bg-transparent border @if ($errors->has('nim')) border-red-500 @else border-gray-400 @endif text-gray-900 text-sm rounded-lg block w-full p-2.5 mb-2 focus:outline-none focus:ring-1 focus:ring-carmine-500" />
            </div>

            <div class="w-full flex flex-col">
                <a href="{{ route('register') }}" class="flex-1 ml-auto underline text-sm cursor-pointer hover:text-red-telkom">Dont have an account?</a>
                <div class="flex items-center mb-4">
                    <input id="default-checkbox" type="checkbox" value="" class="w-4 h-4 text-carmine-600 bg-gray-100 border-gray-300 rounded focus:ring-carmine-500" />
                    <label for="default-checkbox" class="ms-2 text-sm font-medium text-gray-500">Remember me</label>
                </div>
            </div>

            <button type="submit" class="mx-auto text-white bg-carmine-700 hover:bg-carmine-800 focus:ring-4 focus:ring-carmine-300 font-medium rounded-lg text-sm px-10 py-2.5 text-center">Kirim</button>
        </form>
    </section>
</main>