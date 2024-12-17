@extends('template.admin.main')
@section('page_title', 'Admin Dashboard')

@section('content')

<!-- Dashboard Content -->
<main class="p-6 space-y-6">
    <!-- Statistics Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        <div class="bg-white p-6 rounded shadow">
            <h2 class="text-gray-700 font-bold">Total Karyawan</h2>
            <p class="text-2xl font-semibold">{{ $userTotal }}</p>
        </div>
        <div class="bg-white p-6 rounded shadow">
            <h2 class="text-gray-700 font-bold">Jumlah Kendaraan</h2>
            <p class="text-2xl font-semibold">{{ $kendaraanTotal }}</p>
        </div>
        <div class="bg-white p-6 rounded shadow">
            <h2 class="text-gray-700 font-bold">Kendaraan Yang Tersedia</h2>
            <p class="text-2xl font-semibold">{{ $kendaraanTersedia }}</p>
        </div>
        <div class="bg-white p-6 rounded shadow">
            <h2 class="text-gray-700 font-bold">Jumlah Pengajuan</h2>
            <p class="text-2xl font-semibold">{{ $jumlahPengajuan }}</p>
        </div>
    </div>

    <!-- Graph Placeholder -->
    <div class="bg-white p-6 rounded shadow">
        <h2 class="text-gray-700 font-bold mb-4">Grafik Pemakaian Kendaraan</h2>
        <div class="relative" style="height: 400px; width: 100%;">
            <canvas id="vehicleUsageChart" class="h-auto w-full"></canvas>
        </div>
    </div>
</main>
</div>
</div>
<script>
    $('#dashboardNav').addClass("active");
    let months = @json($months);
    let totals = @json($totals);
    
    const ctx = document.getElementById('vehicleUsageChart').getContext('2d');
    const vehicleUsageChart = new Chart(ctx, {
        type: 'line', // Bisa diubah ke 'bar', 'pie', dll
        data: {
            labels: @json($months), // Data bulan
            datasets: [{
                label: 'Jumlah Pemakaian Kendaraan',
                data: @json($totals), // Data jumlah
                borderColor: 'rgba(75, 192, 192, 1)',
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderWidth: 2
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                }
            },
            scales: {
                x: {
                    title: {
                        display: true,
                        text: 'Bulan'
                    }
                },
                y: {
                    title: {
                        display: true,
                        text: 'Jumlah Pemakaian'
                    },
                    beginAtZero: true
                }
            }
        }
    });
</script>
@endsection