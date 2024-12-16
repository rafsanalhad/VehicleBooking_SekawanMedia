@extends('template.user.main')
@section('page_title', 'Pengajuan')

@section('content')
<!-- Dashboard Content -->
<main class="p-6 y-6">
    <!-- List Booking -->
    <div class="bg-white p-6 rounded shadow">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-gray-700 font-bold">Pengajuan</h2>
            <!-- Add Booking Button -->
            {{-- <button class="bg-green-600 text-white px-6 py-2 rounded-md shadow hover:bg-green-700 focus:outline-none"
                onclick="openModal()">
                + Add Booking
            </button> --}}
            <p class="text-yellow-500">Note: anda harus menghubungi admin untuk pengajuan kendaraan</p>
        </div>

        <table class="w-full border-collapse">
            <thead>
                <tr class="bg-gray-100">
                    <th class="text-left p-3 font-medium">No</th>
                    <th class="text-left p-3 font-medium">Yang Mengajukan</th>
                    <th class="text-left p-3 font-medium">Kendaraan</th>
                    <th class="text-left p-3 font-medium">Tanggal Mengajukan</th>
                    <th class="text-left p-3 font-medium">Tanggal Mengembalikan</th>
                    <th class="text-left p-3 font-medium">Yang Menyetujui 1</th>
                    <th class="text-left p-3 font-medium">Yang Menyetujui 2</th>
                    <th class="text-left p-3 font-medium">Status</th>
                    {{-- <th class="text-left p-3 font-medium">Actions</th> --}}
                </tr>
            </thead>
            <tbody>
                @foreach($bookings as $index => $booking)
                <tr class="border-t">
                    <td class="p-3">{{ $index + 1 }}</td>
                    <td class="p-3">{{ $booking->user->name }}</td>
                    <td class="p-3">{{ $booking->vehicles->model }}</td>
                    <td class="p-3">{{ $booking->start_datetime }}</td>
                    <td class="p-3">{{ $booking->end_datetime }}</td>
                    @foreach($booking->approvals as $approval)
                    <td class="p-3">{{ $approval->approver->name ?? 'Unknown' }}</td>
                    @endforeach
                    <td class="p-3 text-yellow-600">{{ $booking->status }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Tambahkan jQuery CDN -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
@endsection