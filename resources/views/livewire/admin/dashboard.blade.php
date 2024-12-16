<main class="py-4 pr-4 sm:ml-64 pl-4 sm:pl-0">
    <section class="grid grid-cols-4 gap-4 max-sm:grid-cols-2">
        <div class="bg-gray-100 w-full rounded-lg col-span-2 flex flex-col justify-center items-center p-4 text-center">
            <h3 class="mb-2 text-xl text-gray-900 font-semibold">Registered User</h3>
            <p class="mb-2 text-4xl font-extrabold md:text-5xl text-gray-900">{{ $registeredUsers }}</p>
            <p class="font-light text-gray-500">Dari Keseluruhan</p>
        </div>
        <div class="bg-gray-100 w-full rounded-lg col-span-2 flex flex-col justify-center items-center p-4 text-center">
            <h3 class="mb-2 text-xl text-gray-900 font-semibold">Participant (Voter)</h3>
            <p class="mb-2 text-4xl font-extrabold md:text-5xl text-gray-900">{{ $voters }} / {{ $registeredUsers }}</p>
            <p class="font-light text-gray-500">Dari Keseluruhan</p>
        </div>
    </section>

    <section class="grid grid-cols-4 gap-4 mt-4">
        <div class="col-span-4 flex gap-2 items-center mr-auto">
            <svg class="w-5 h-5 text-carmine-500" viewBox="0 0 24 27" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path
                    fill-rule="evenodd"
                    clip-rule="evenodd"
                    d="M10.4655 13.1943C11.2242 12.4218 10.8425 10.7804 8.92758 8.83129C7.0124 6.88198 3.78929 5.86934 3.52924 6.13404C3.27739 6.39031 4.26406 9.67932 6.17917 11.6286C6.80139 12.2621 7.39172 12.7305 7.93126 13.0481C7.32643 12.8818 6.57832 12.7866 5.69073 12.7866C2.98249 12.7866 0 14.3903 0 14.7647C0 15.1272 2.98249 16.7428 5.69073 16.7428C6.57072 16.7428 7.3136 16.6492 7.91562 16.4855C7.37259 16.8032 6.77748 17.2743 6.15001 17.913C4.23491 19.8623 3.24004 23.1429 3.50009 23.4077C3.75201 23.664 6.98331 22.6597 8.89834 20.7103C9.52072 20.0769 9.98099 19.476 10.2929 18.9269C10.1295 19.5424 10.036 20.304 10.036 21.2075C10.036 23.9641 11.6115 27 11.9794 27C12.3356 27 13.9227 23.9641 13.9227 21.2075C13.9227 20.3116 13.8308 19.5555 13.6698 18.9427C13.982 19.4955 14.4448 20.1012 15.0724 20.74C16.9875 22.6894 20.2106 23.7019 20.4708 23.4372C20.7227 23.1809 19.7359 19.892 17.8207 17.9427C17.1984 17.3092 16.6081 16.8407 16.0685 16.5231C16.6733 16.6895 17.4215 16.7846 18.3091 16.7846C21.0173 16.7846 24 15.1809 24 14.8065C24 14.444 21.0173 12.8285 18.3091 12.8285C17.4291 12.8285 16.6861 12.922 16.0841 13.0859C16.6272 12.7682 17.2223 12.2971 17.8498 11.6583C19.765 9.70892 20.7598 6.42841 20.4998 6.16371C20.2479 5.90713 17.0165 6.91166 15.1014 8.86089C13.1866 10.8102 12.8047 12.4516 13.5635 13.2238C13.8969 13.5632 14.3952 13.6783 15.0115 13.5354C14.4677 13.8793 14.1905 14.3226 14.1905 14.8065C14.1905 15.2865 14.463 15.7266 14.9983 16.0693C14.3746 15.9207 13.8706 16.0348 13.5344 16.3771C13.201 16.7165 13.088 17.2237 13.2282 17.851C12.8904 17.2973 12.4548 17.0153 11.9794 17.0153C11.5078 17.0153 11.0754 17.2926 10.7388 17.8373C10.8847 17.2027 10.7725 16.6897 10.4362 16.3475C10.103 16.0081 9.60484 15.893 8.98854 16.0357C9.53249 15.6919 9.80954 15.2486 9.80954 14.7647C9.80954 14.2848 9.53712 13.8446 9.00191 13.5021C9.62543 13.6505 10.1294 13.5364 10.4655 13.1943ZM12 9.98466C13.073 9.98466 13.9435 8.54936 13.9435 5.79252C13.9435 3.03583 12.3678 0 12 0C11.6438 0 10.0566 3.03583 10.0566 5.79252C10.0566 8.54936 10.927 9.98466 12 9.98466Z"
                />
            </svg>
            <span class="text-gray-700 uppercase font-bold tracking-wider mr-auto">E-Voting</span>
        </div>
        <div class="col-span-4 w-full">
            <div class="grid grid-cols-4 justify-items-center items-center gap-4 mx-auto">
                <a href="{{ route('admin.candidates') }}" class="col-span-1 flex flex-col items-center p-2 text-center gap-2 w-full bg-gray-100 py-4 rounded-lg">
                    <div class="flex items-center justify-center p-2 rounded-md h-14 w-14 hover:p-3">
                        <i class="fas fa-user-plus text-carmine-500 fill-carmine-500 text-[30px]"></i>
                    </div>
                    <p class="font-bold uppercase text-gray-700 text-sm md:text-lg">Tambah kandidat</p>
                </a>
                <a href="{{ route('admin.serial-numbers') }}" class="col-span-1 flex flex-col items-center p-2 text-center gap-2 w-full bg-gray-100 py-4 rounded-lg">
                    <div class="flex items-center justify-center p-2 rounded-md h-14 w-14 hover:p-3">
                        <i class="fas fa-list-ol text-carmine-500 fill-carmine-500 text-[30px]"></i>
                    </div>
                    <p class="font-bold uppercase text-gray-700 text-sm md:text-lg">Nomor Urut kandidat</p>
                </a>
                <a href="{{ route('admin.schedules') }}" class="col-span-2 flex flex-col items-center p-2 text-center gap-2 w-full bg-gray-100 py-4 rounded-lg">
                    <div class="flex items-center justify-center p-2 rounded-md h-14 w-14 hover:p-3">
                        <i class="fas fa-calendar-alt text-carmine-500 fill-carmine-500 text-[30px]"></i>
                    </div>
                    <p class="font-bold uppercase text-gray-700 text-sm md:text-lg">Jadwal Vote</p>
                </a>
            </div>
        </div>
    </section>

    <section class="bg-gray-100 p-6 rounded-lg mt-6">
        <div class="col-span-4 flex gap-2 items-center mr-auto mb-6">
            <svg class="w-5 h-5 text-carmine-500" viewBox="0 0 24 27" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path
                    fill-rule="evenodd"
                    clip-rule="evenodd"
                    d="M10.4655 13.1943C11.2242 12.4218 10.8425 10.7804 8.92758 8.83129C7.0124 6.88198 3.78929 5.86934 3.52924 6.13404C3.27739 6.39031 4.26406 9.67932 6.17917 11.6286C6.80139 12.2621 7.39172 12.7305 7.93126 13.0481C7.32643 12.8818 6.57832 12.7866 5.69073 12.7866C2.98249 12.7866 0 14.3903 0 14.7647C0 15.1272 2.98249 16.7428 5.69073 16.7428C6.57072 16.7428 7.3136 16.6492 7.91562 16.4855C7.37259 16.8032 6.77748 17.2743 6.15001 17.913C4.23491 19.8623 3.24004 23.1429 3.50009 23.4077C3.75201 23.664 6.98331 22.6597 8.89834 20.7103C9.52072 20.0769 9.98099 19.476 10.2929 18.9269C10.1295 19.5424 10.036 20.304 10.036 21.2075C10.036 23.9641 11.6115 27 11.9794 27C12.3356 27 13.9227 23.9641 13.9227 21.2075C13.9227 20.3116 13.8308 19.5555 13.6698 18.9427C13.982 19.4955 14.4448 20.1012 15.0724 20.74C16.9875 22.6894 20.2106 23.7019 20.4708 23.4372C20.7227 23.1809 19.7359 19.892 17.8207 17.9427C17.1984 17.3092 16.6081 16.8407 16.0685 16.5231C16.6733 16.6895 17.4215 16.7846 18.3091 16.7846C21.0173 16.7846 24 15.1809 24 14.8065C24 14.444 21.0173 12.8285 18.3091 12.8285C17.4291 12.8285 16.6861 12.922 16.0841 13.0859C16.6272 12.7682 17.2223 12.2971 17.8498 11.6583C19.765 9.70892 20.7598 6.42841 20.4998 6.16371C20.2479 5.90713 17.0165 6.91166 15.1014 8.86089C13.1866 10.8102 12.8047 12.4516 13.5635 13.2238C13.8969 13.5632 14.3952 13.6783 15.0115 13.5354C14.4677 13.8793 14.1905 14.3226 14.1905 14.8065C14.1905 15.2865 14.463 15.7266 14.9983 16.0693C14.3746 15.9207 13.8706 16.0348 13.5344 16.3771C13.201 16.7165 13.088 17.2237 13.2282 17.851C12.8904 17.2973 12.4548 17.0153 11.9794 17.0153C11.5078 17.0153 11.0754 17.2926 10.7388 17.8373C10.8847 17.2027 10.7725 16.6897 10.4362 16.3475C10.103 16.0081 9.60484 15.893 8.98854 16.0357C9.53249 15.6919 9.80954 15.2486 9.80954 14.7647C9.80954 14.2848 9.53712 13.8446 9.00191 13.5021C9.62543 13.6505 10.1294 13.5364 10.4655 13.1943ZM12 9.98466C13.073 9.98466 13.9435 8.54936 13.9435 5.79252C13.9435 3.03583 12.3678 0 12 0C11.6438 0 10.0566 3.03583 10.0566 5.79252C10.0566 8.54936 10.927 9.98466 12 9.98466Z"
                />
            </svg>
            <span class="text-gray-700 uppercase font-bold tracking-wider mr-auto">Hasil Voting</span>
        </div>

        <div class="mb-6">
            <label for="schedule" class="block text-sm font-medium text-gray-700 mb-2">Pilih Jadwal Voting</label>
            <select id="schedule" name="schedule" wire:model.live="selectedSchedule"
                class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-carmine-500">
                <option value="" selected>Pilih Jadwal</option>
                @foreach ($schedules as $schedule)
                    <option value="{{ $schedule->id }}">{{ $schedule->title }} ({{ $schedule->start->format('d-m-Y') }}
                        - {{ $schedule->end->format('d-m-Y') }})</option>
                @endforeach
            </select>
        </div>

        <div>
            <button id="download-chart" class="px-3 py-1 bg-blue-200 rounded-lg text-black shadow-lg mb-2">Download</button>
            <canvas id="voteChart" class="w-[100%] h-[500px]" style="height: 500px; width: 100%"></canvas>
        </div>
    </section>
</main>

<!-- Include Script untuk Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('livewire:init', function() {
        let ctx = document.getElementById('voteChart').getContext('2d');
        let voteChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: @json($voteLabels),
                datasets: [{
                    label: '',
                    data: @json($voteData),
                    backgroundColor: [
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(231, 76, 60, 0.2)'
                    ],
                    borderColor: [
                        'rgba(75, 192, 192, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(231, 76, 60, 1)'
                    ],
                    borderWidth: 1,
                    borderRadius: 10,
                }]
            },
            options: {
                animation: {
                    duration: 1000,
                    easing: "easeOutBounce",
                },
                responsive: true,
                plugins: {
                    legend: {
                        position: false,
                    },
                    tooltip: {
                        enabled: true,
                    },
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        Livewire.on('updateChart', (raw) => {
            const [labels, data] = raw

            voteChart.data.labels = labels;
            voteChart.data.datasets[0].data = data;
            voteChart.update();
            voteChart.resize();
        });

        const downloadButton = document.getElementById('download-chart');
        downloadButton.addEventListener('click', () => {
            const imageURL = voteChart.toBase64Image();
            const link = document.createElement('a');
            link.href = imageURL;
            link.download = 'chart.png';
            link.click();
        });
    });
</script>
