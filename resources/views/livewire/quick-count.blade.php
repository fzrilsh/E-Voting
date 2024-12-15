@if (!$schedule)
    oiewjfojowefj
@else
    <main class="mt-20 max-sm:mt-10 w-full">
        <section class="bg-gray-100 flex px-2 py-10 flex-col items-center w-full">
            <div class="flex flex-col items-center">
                <p class="text-base font-bold text-red-telkom tracking-wider">E-Voting</p>
                <h1 class="text-3xl font-bold font-inria-sans text-gray-900 leading-tight">Quick Count</h1>
            </div>
        </section>

        <section class="px-5 sm:px-6 lg:px-8 mx-auto max-w-7xl flex flex-col w-full mt-10">
            <h1 class="mb-5 font-bold text-xl">Grafik Perolehan suara</h1>
            <div class="flex flex-col gap-5 items-center justify-between h-full">
                <canvas id="myChart" class="max-w-[100%] max-h-[500px] flex-1"
                    style="max-height: 500px; width: 100%"></canvas>

                <div class="bg-gray-100 p-4 w-full rounded-md flex flex-col items-center shadow-md">
                    <p class="text-base font-bold text-red-telkom tracking-wider">E-Voting</p>
                    <h1 class="text-2xl font-bold font-inria-sans text-gray-800 leading-tight">Data Masuk</h1>

                    <p class="text-4xl mt-4 mb-2 font-bold text-gray-800">{{ $schedule->votings['vote_in_percent'] }}%</p>

                    <p class="text-base text-gray-800 tracking-wider">{{ $schedule->votings['vote_in'] }} Suara</p>
                </div>
            </div>
        </section>

        <section class="px-5 sm:px-6 lg:px-8 mx-auto max-w-7xl flex flex-col w-full mt-10 mb-10">
            <div class="grid grid-cols-3 max-sm:grid-cols-1 gap-5 w-full">
                @foreach ($schedule->participants as $participant)    
                    <div class="bg-gray-100 rounded-md flex flex-col items-center justify-center overflow-hidden shadow-md">
                        <img src="{{ asset('storage/' . $participant['serial_number']['photo']) }}" alt="Photo Kandidat" class="rounded-t-md w-full h-52 object-cover mb-0" />

                        <div class="p-5 flex flex-col items-start justify-center w-full">
                            <p class="mr-auto mb-2 font-bold bg-[#ff6384] rounded-md text-white text-sm py-1 px-3 flex items-center gap-2">
                                <svg class="text-white w-5 h-5" viewBox="0 0 50 50" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M7.49167 17.2614C7.49167 11.0419 12.5336 6 18.7531 6C24.9726 6 30.0144 11.0419 30.0144 17.2614C30.0144 23.4809 24.9726 28.5228 18.7531 28.5228C12.5336 28.5228 7.49167 23.4809 7.49167 17.2614Z"
                                        fill="currentColor" />
                                    <path
                                        d="M30.9341 23.6763C30.8203 23.892 30.8686 24.161 31.0645 24.3062C32.52 25.3835 34.3211 26.0206 36.2708 26.0206C41.1082 26.0206 45.0296 22.0992 45.0296 17.2618C45.0296 12.4244 41.1082 8.50293 36.2708 8.50293C34.3211 8.50293 32.52 9.14007 31.0645 10.2175C30.8686 10.3626 30.8203 10.6315 30.9341 10.8473C31.9449 12.7627 32.517 14.9454 32.517 17.2618C32.517 19.5781 31.9449 21.7608 30.9341 23.6763Z"
                                        fill="currentColor" />
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M6.59368 32.7754C9.67769 31.4368 13.7241 31.0254 18.753 31.0254C23.7862 31.0254 27.8355 31.4376 30.9206 32.7792C34.2813 34.2404 36.3239 36.7294 37.3944 40.2437C37.8962 41.8909 36.659 43.538 34.954 43.538H2.55674C0.849717 43.538 -0.390137 41.8884 0.113172 40.2382C1.18518 36.7234 3.23085 34.2351 6.59368 32.7754Z"
                                        fill="currentColor" />
                                    <path
                                        d="M32.0628 28.6139C31.0267 28.6783 30.9659 30.0702 31.9179 30.4841C34.5265 31.6185 36.4908 33.2884 37.8994 35.4198C39.0553 37.1689 40.8504 38.533 42.9468 38.533H47.4028C49.1726 38.533 50.4639 36.7744 49.8413 35.0565C49.8055 34.9576 49.7682 34.8595 49.7296 34.7622C48.8728 32.5985 47.404 31.0056 45.2293 29.9903C43.1875 29.0371 40.6314 28.6437 37.6201 28.5249L37.5706 28.5229H37.5213C35.7475 28.5229 33.8949 28.5001 32.0628 28.6139Z"
                                        fill="currentColor" />
                                </svg>

                                Calon {{ str_pad($participant['serial_number']['serial_number'], 2, '0', STR_PAD_LEFT) }}
                            </p>
                            <p class="text-base text-gray-900"><b>{{ $participant['serial_number']['text'] }}</b> ({{ $participant['serial_number']['candidates']->map(fn($v) => $v['name'])->join(' & ') }})</p>
                            <p class="text-2xl text-gray-900 font-bold mt-5">{{ isset($schedule->votings[$participant['serial_number']['text']]) ? $schedule->votings[$participant['serial_number']['text']]['percent'] : '00.0' }}%</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    </main>
@endif

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const candidates = [
        {{ $schedule->participants->map(function($v) use($schedule){
            $votes = isset($schedule->votings[$v['serial_number']['text']]) ? (int)$schedule->votings[$v['serial_number']['text']]['percent'] : 0;
            return '{' . "name: `{$v['serial_number']['text']}`, votes: {$votes}" . '}';
        })->join(',') }}
    ];

    const totalVotes = candidates.reduce((sum, candidate) => sum + candidate.votes, 0);

    const candidateData = candidates.map((candidate) => ({
        name: candidate.name,
        votes: candidate.votes,
        percentage: ((candidate.votes / totalVotes) * 100).toFixed(1),
    }));

    const ctx = document.getElementById("myChart");
    new Chart(ctx, {
        type: "bar",
        data: {
            labels: candidates.map((candidate) => candidate.name),
            datasets: [{
                label: "",
                data: candidates.map((candidate) => candidate.votes),
                backgroundColor: ["rgba(255, 99, 132)", "rgba(54, 162, 235)", "rgba(75, 192, 192)"],
                borderColor: ["rgb(255, 99, 132)", "rgb(54, 162, 235)", "rgb(75, 192, 192)"],
                borderWidth: 1,
                borderRadius: 10,
            }, ],
        },
        plugins: [{
            afterDraw: (chart, args, options) => {
                const {
                    ctx
                } = chart;

                let xAxis = chart.scales["x"];
                let yAxis = chart.scales["y"];

                if (xAxis && yAxis) {
                    const totalVotes = chart.data.datasets[0].data.reduce((sum, value) => sum +
                        value, 0);

                    chart.data.datasets[0].data.forEach((value, index) => {
                        const percentage = ((value / totalVotes) * 100).toFixed(1);

                        const x = xAxis.getPixelForValue(index);
                        const y = yAxis.getPixelForValue(value);

                        const initialY = y + 50;
                        const finalY = y + 20;

                        const animationProgress = chart.animationProgress / 100;
                        const animatedY = initialY + (finalY - initialY) *
                        animationProgress;

                        ctx.save();
                        ctx.textAlign = "center";
                        ctx.font = "bold 30px 'Open Sans', sans-serif";
                        ctx.fillStyle = "white";

                        ctx.fillText(`${percentage}%`, x, y + 75);

                        ctx.restore();
                    });
                } else {
                    console.warn("xAxis atau yAxis tidak ditemukan.");
                }
            },
        }, ],
        options: {
            animation: {
                duration: 1000,
                easing: "easeOutBounce",
            },
            responsive: true,
            resizeDelay: 0,
            plugins: {
                tooltip: {
                    enabled: false,
                    callbacks: {
                        label: function(tooltipItem) {
                            const votes = tooltipItem.raw;
                            const percentage = ((votes / totalVotes) * 100).toFixed(2);
                            return `${votes} votes (${percentage}%)`;
                        },
                    },
                },
                legend: {
                    display: false,
                },
            },
            scales: {
                x: {
                    grid: {
                        display: false,
                        drawBorder: false,
                    },
                    ticks: {
                        size: 16,
                        weight: "bold",
                    },
                },
                y: {
                    beginAtZero: true,
                    grid: {
                        display: false,
                    },

                    drawBorder: false,
                    ticks: {
                        display: false,
                    },
                },
            },
        },
    });
</script>
