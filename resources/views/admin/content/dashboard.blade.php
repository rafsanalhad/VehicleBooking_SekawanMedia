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
        <canvas id="vehicleUsageChart" class="h-48 w-full"></canvas>
    </div>

    <!-- Table -->
    <div class="bg-white p-6 rounded shadow">
        <h2 class="text-gray-700 font-bold mb-4">Recent Transactions</h2>
        <table class="w-full border-collapse">
            <thead>
                <tr class="bg-gray-100">
                    <th class="text-left p-3 font-medium">ID</th>
                    <th class="text-left p-3 font-medium">Name</th>
                    <th class="text-left p-3 font-medium">Amount</th>
                    <th class="text-left p-3 font-medium">Status</th>
                </tr>
            </thead>
            <tbody>
                <tr class="border-t">
                    <td class="p-3">#001</td>
                    <td class="p-3">John Doe</td>
                    <td class="p-3">$120</td>
                    <td class="p-3 text-green-600">Completed</td>
                </tr>
                <tr class="border-t">
                    <td class="p-3">#002</td>
                    <td class="p-3">Jane Smith</td>
                    <td class="p-3">$340</td>
                    <td class="p-3 text-yellow-600">Pending</td>
                </tr>
                <tr class="border-t">
                    <td class="p-3">#003</td>
                    <td class="p-3">Alice Brown</td>
                    <td class="p-3">$560</td>
                    <td class="p-3 text-red-600">Failed</td>
                </tr>
            </tbody>
        </table>
    </div>
</main>
</div>
</div>
<script>
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