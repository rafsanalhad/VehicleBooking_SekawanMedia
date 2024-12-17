@extends('template.admin.main')
@section('page_title', 'Admin Dashboard')

@section('content')
<!-- Dashboard Content -->
<main class="p-6 space-y-6">
    <!-- History Booking -->
    <div class="bg-white p-6 rounded shadow">
        <h2 class="text-gray-700 font-bold mb-4">History Booking</h2>
        <table class="w-full border-collapse" id="menyetujuiTable">
            <thead>
                <tr class="bg-gray-100">
                    <th class="text-left p-3 font-medium">No</th>
                    <th class="text-left p-3 font-medium">Yang Mengajukan</th>
                    <th class="text-left p-3 font-medium">Kendaraan</th>
                    <th class="text-left p-3 font-medium">Yang Menyetujui</th>
                    <th class="text-left p-3 font-medium">Mulai Mengajukan</th>
                    <th class="text-left p-3 font-medium">Mulai Mengembalikan</th>
                    <th class="text-left p-3 font-medium">Status</th>
                    {{-- <th class="text-left p-3 font-medium">Action</th> --}}
                </tr>
            </thead>
            <tbody>
                @foreach($approvals as $index => $approval)
                <tr class="border-t">
                    <td class="p-3">{{ $index + 1 }}</td>
                    <td class="p-3">{{ $approval->userFromBooking->name }}</td>
                    <td class="p-3">{{ $approval->vehicleFromBooking->model }}</td>
                    <td class="p-3">{{ $approval->approver->name }}</td>
                    <td class="p-3">{{ $approval->booking->start_datetime }}</td>
                    <td class="p-3">{{ $approval->booking->end_datetime }}</td>
                    <td class="p-3 text-yellow-600">{{ $approval->status }}</td>
                    {{-- <td class="p-3">
                        <button class="bg-blue-600 text-white px-4 py-2 rounded-md shadow hover:bg-blue-700">Details</button>
                        <button class="bg-green-600 text-white px-4 py-2 rounded-md shadow hover:bg-green-700 mt-2">Approve</button>
                        <button class="bg-red-600 text-white px-4 py-2 rounded-md shadow hover:bg-red-700 mt-2">Reject</button>
                    </td> --}}
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</main>
<script>
        $('#menyetujuiNav').addClass("active");
</script>
<script>
    $(document).ready(function () {
        $('#menyetujuiTable').DataTable({
            responsive: true,
            language: {
                search: "Cari:",
                lengthMenu: "Tampilkan _MENU_ data per halaman",
                zeroRecords: "Data tidak ditemukan",
                info: "Menampilkan _START_ hingga _END_ dari _TOTAL_ data",
                infoEmpty: "Tidak ada data",
                infoFiltered: "(Disaring dari _MAX_ total data)",
                paginate: {
                    first: "Pertama",
                    last: "Terakhir",
                    next: "Selanjutnya",
                    previous: "Sebelumnya",
                },
            },
        });
    });
</script>

@endsection
