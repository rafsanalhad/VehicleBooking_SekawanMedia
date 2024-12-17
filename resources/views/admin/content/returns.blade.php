@extends('template.admin.main')
@section('page_title', 'Admin Dashboard')

@section('content')
<!-- Dashboard Content -->
<main class="p-6 space-y-6">
    <!-- History Booking -->
    <div class="bg-white p-6 rounded shadow">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-gray-700 font-bold">Pengembalian Kendaraan</h2>
            <!-- Add Booking Button -->
        </div>
        <table class="w-full border-collapse" id="pengembalianTable">
            <thead>
                <tr class="bg-gray-100">
                    <th class="text-left p-3 font-medium">No</th>
                    <th class="text-left p-3 font-medium">Nama Yang Mengembalikan</th>
                    <th class="text-left p-3 font-medium">Kendaraan</th>
                    <th class="text-left p-3 font-medium">Tanggal Mengembalikan</th>
                    <th class="text-left p-3 font-medium">Kondisi</th>
                    <th class="text-left p-3 font-medium">Catatan</th>
                    
                    {{-- <th class="text-left p-3 font-medium">Action</th> --}}
                </tr>
            </thead>
            <tbody>
                @foreach($returns as $index => $return)
                <tr class="border-t">
                    <td class="p-3">{{ $index + 1 }}</td>
                    <td class="p-3">{{ $return->user->name }}</td>
                    <td class="p-3">{{ $return->vehicle->model }}</td>
                    <td class="p-3">{{ $return->return_date}}</td>
                    <td class="p-3">{{ $return->condition }}</td>
                    <td class="p-3">{{ $return->remarks }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</main>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $('#pengembalianTable').DataTable({
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
<script>
    $('#pengembalianNav').addClass("active");
</script>

@endsection
