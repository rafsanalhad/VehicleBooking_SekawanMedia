@extends('template.approval.main')
@section('page_title', 'Admin Dashboard')

@section('content')
<!-- Dashboard Content -->
<main class="p-6 space-y-6">
    <!-- History Booking -->
    <div class="bg-white p-6 rounded shadow">
        <h2 class="text-gray-700 font-bold mb-4">Pengajuan Kendaraan</h2>
        <table class="w-full border-collapse">
            <thead>
                <tr class="bg-gray-100">
                    <th class="text-left p-3 font-medium">No</th>
                    <th class="text-left p-3 font-medium">Yang Mengajukan</th>
                    <th class="text-left p-3 font-medium">Kendaraan</th>
                    <th class="text-left p-3 font-medium">Tanggal Mengajukan</th>
                    <th class="text-left p-3 font-medium">Tanggal Mengembalikan</th>
                    <th class="text-left p-3 font-medium">Status</th>
                    <th class="text-left p-3 font-medium">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($approvals as $index => $approval)
                <tr class="border-t">
                    <td class="p-3">{{ $index + 1 }}</td>
                    <td class="p-3">{{ $approval->userFromBooking->name }}</td>
                    <td class="p-3">{{ $approval->vehicleFromBooking->model }}</td>
                    <td class="p-3">{{ $approval->booking->start_datetime }}</td>
                    <td class="p-3">{{ $approval->booking->end_datetime }}</td>
                    <td class="p-3 text-yellow-600">{{ $approval->status }}</td>
                    @if($approval->status == 'pending')
                        <td class="p-3">
                            <button class="bg-green-600 text-white px-4 py-2 rounded-md shadow hover:bg-green-700 mt-2"
                                onclick="confirmTerima('{{ $approval->id }}', '{{ $approval->booking_id }}')">
                                Terima
                            </button>
                            <button
                                class="bg-red-600 text-white px-4 py-2 rounded-md shadow hover:bg-red-700 mt-2" onclick="confirmTolak('{{ $approval->id }}', '{{ $approval->booking_id }}')">Tolak</button>
                        </td>
                    @else
                        <td class="p-3">
                            <img src="{{ asset('centang.png') }}" alt="Centang" class="w-16 h-16">
                        </td>
                    @endif
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</main>

<script>
    function confirmTerima(id, booking_id) {
    Swal.fire({
        title: "Apa kamu yakin?",
        text: "Kamu akan menerima pengajuan",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Iya",
        cancelButtonText: "Tidak"
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: 'http://127.0.0.1:8000/approval/update-approval',
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: JSON.stringify({ status: 'approved', id: id, booking_id: booking_id }),
                contentType: 'application/json',
                success: function(data) {
                    if (data.message == 'success') {
                        Swal.fire({
                            title: "Berhasil!",
                            text: data.message,
                            icon: "success"
                        }).then(() => {
                            location.reload();
                        });
                    } else {
                        Swal.fire({
                            title: "Gagal!",
                            text: data.message,
                            icon: "error"
                        });
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error:', error);
                    Swal.fire({
                        title: "Error!",
                        text: xhr.responseText,
                        icon: "error"
                    });
                }
            });
        }
    });
}
    function confirmTolak(id, booking_id) {
    Swal.fire({
        title: "Apa kamu yakin?",
        text: "Kamu akan menolak pengajuan",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Iya",
        cancelButtonText: "Tidak"
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: 'http://127.0.0.1:8000/approval/update-approval',
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: JSON.stringify({ status: 'rejected', id: id, booking_id: booking_id }),
                contentType: 'application/json',
                success: function(data) {
                    if (data.message == 'success') {
                        Swal.fire({
                            title: "Berhasil!",
                            text: "Pengajuan berhasil ditolak.",
                            icon: "success"
                        }).then(() => {
                            location.reload();
                        });
                    } else {
                        Swal.fire({
                            title: "Gagal!",
                            text: data.message || "Gagal menolak pengajuan.",
                            icon: "error"
                        });
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error:', error);
                    Swal.fire({
                        title: "Error!",
                        text: xhr.responseText,
                        icon: "error"
                    });
                }
            });
        }
    });
}

</script>

@endsection