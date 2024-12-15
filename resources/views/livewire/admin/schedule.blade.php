<main class="py-4 pr-4 sm:ml-64 pl-4 sm:pl-0">
    <div class="flex gap-4 w-full justify-end mb-4">
        <a href="{{ route('admin.schedules.add') }}" class="px-4 p-2 bg-carmine-500 rounded-lg text-white flex focus:ring-1 focus:ring-slate-700 items-center gap-2 hover:bg-carmine-700 text-center"> Tambah Jadwal </a>
    </div>

    <table class="shadow-md rounded-lg w-full text-sm text-left rtl:text-right text-gray-500">
        <thead class="text-xs text-gray-700 uppercase bg-gray-100 rounded-s-lg">
            <tr>
                <th scope="col" class="px-4 py-3">No</th>
                <th scope="col" class="px-4 py-3">Judul Voting</th>
                <th scope="col" class="w-52 px-4 py-3">Deskripsi</th>
                <th scope="col" class="px-4 py-3">
                    Kandidat
                    <!-- (Pisahkan dengan koma) -->
                </th>
                <th scope="col" class="px-4 py-3">Tanggal Mulai</th>
                <th scope="col" class="px-4 py-3">Tanggal Selesai</th>
                <th scope="col" class="px-4 py-3">
                    <span class="sr-only">Edit & Remove</span>
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($schedules as $index => $schedule)
                <tr class="bg-white border-b hover:bg-gray-50">
                    <th scope="row" class="px-4 py-4 font-bold text-gray-900 whitespace-nowrap">{{ $index+1 }}</th>
                    <td class="px-4 py-4">{{ $schedule->title }}</td>
                    <td class="px-4 py-4">{{ $schedule->description }}</td>
                    <td class="px-4 py-4">{{ $schedule->participants->map(fn($v) => $v['serial_number']['text'])->join(', ') }}</td>
                    <td class="px-4 py-4">{{ $schedule->start }}</td>
                    <td class="px-4 py-4">{{ $schedule->end }}</td>
                    <td class="px-4 py-4 text-right flex flex-col">
                        <a href="" class="cursor-pointer font-medium text-blue-600 hover:text-blue-800">Edit</a>
                        <a wire:click="destroy({{ $schedule->id }})" class="cursor-pointer font-medium text-red-600 hover:text-red-800">Remove</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</main>