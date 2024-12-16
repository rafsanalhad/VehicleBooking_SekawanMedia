@extends('template.user.main')
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
            <h2 class="text-gray-700 font-bold">Jumlah Kendaraan</h2>
            <p class="text-2xl font-semibold">$12,345</p>
        </div>
        <div class="bg-white p-6 rounded shadow">
            <h2 class="text-gray-700 font-bold">Kendaraan Yang Tersedia</h2>
            <p class="text-2xl font-semibold">567</p>
        </div>
        <div class="bg-white p-6 rounded shadow">
            <h2 class="text-gray-700 font-bold">Kendaraan yang Dipinjam</h2>
            <p class="text-2xl font-semibold">34</p>
        </div>
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
</div>
</div>
</body>

</html>
@endsection