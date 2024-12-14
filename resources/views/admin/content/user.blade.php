@extends('template.admin.main')
@section('page_title', 'Admin Dashboard')

@section('content')

<!-- Dashboard Content -->
<main class="p-6 space-y-6">
    <!-- Statistics Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        <div class="bg-white p-6 rounded shadow">
            <h2 class="text-gray-700 font-bold">Total Users</h2>
            <p class="text-2xl font-semibold">1,234</p>
        </div>
        <div class="bg-white p-6 rounded shadow">
            <h2 class="text-gray-700 font-bold">Revenue</h2>
            <p class="text-2xl font-semibold">$12,345</p>
        </div>
        <div class="bg-white p-6 rounded shadow">
            <h2 class="text-gray-700 font-bold">New Orders</h2>
            <p class="text-2xl font-semibold">567</p>
        </div>
        <div class="bg-white p-6 rounded shadow">
            <h2 class="text-gray-700 font-bold">Pending Tickets</h2>
            <p class="text-2xl font-semibold">34</p>
        </div>
    </div>

    <!-- Pengajuan Form -->
    <div class="bg-white p-6 rounded shadow">
        <h2 class="text-gray-700 font-bold mb-4">Pengajuan Kendaraan</h2>
        <form action="" method="POST">
            @csrf
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <div>
                    <label for="vehicle_type" class="block text-sm font-medium text-gray-700">Jenis Kendaraan</label>
                    <select id="vehicle_type" name="vehicle_type" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                        <option value="car">Mobil</option>
                        <option value="motorbike">Motor</option>
                        <option value="bus">Bus</option>
                    </select>
                </div>

                <div>
                    <label for="pickup_date" class="block text-sm font-medium text-gray-700">Tanggal Pengambilan</label>
                    <input type="date" id="pickup_date" name="pickup_date" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
                </div>

                <div>
                    <label for="return_date" class="block text-sm font-medium text-gray-700">Tanggal Pengembalian</label>
                    <input type="date" id="return_date" name="return_date" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
                </div>

                <div>
                    <label for="pickup_location" class="block text-sm font-medium text-gray-700">Lokasi Pengambilan</label>
                    <input type="text" id="pickup_location" name="pickup_location" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
                </div>

                <div>
                    <label for="return_location" class="block text-sm font-medium text-gray-700">Lokasi Pengembalian</label>
                    <input type="text" id="return_location" name="return_location" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
                </div>
            </div>

            <div class="mt-4 flex justify-end">
                <button type="submit" class="bg-indigo-600 text-white px-6 py-2 rounded-md shadow hover:bg-indigo-700">
                    Ajukan
                </button>
            </div>
        </form>
    </div>

    <!-- Graph Placeholder -->
    <div class="bg-white p-6 rounded shadow">
        <h2 class="text-gray-700 font-bold mb-4">Sales Overview</h2>
        <div class="h-48 bg-gray-100 flex items-center justify-center">
            <span class="text-gray-500">Graph Placeholder</span>
        </div>
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
@endsection
