@extends('template.admin.main')
@section('page_title', 'Admin Dashboard')

@section('content')
<!-- Dashboard Content -->
<main class="p-6 y-6">
    <!-- List Booking -->
    <div class="bg-white p-6 rounded shadow">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-gray-700 font-bold">Pengajuan</h2>
            <!-- Add Booking Button -->
            <button class="bg-green-600 text-white px-6 py-2 rounded-md shadow hover:bg-green-700 focus:outline-none"
                onclick="openModal()">
                + Add Booking
            </button>
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

    <!-- Modal -->
    <div id="modal"
        class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-50 w-full h-full">
        <div class="bg-white rounded-lg w-96 p-6 space-y-4 shadow-lg">
            <div class="flex justify-between items-center">
                <h3 class="text-lg font-bold">Add New Booking</h3>
                <button class="text-gray-500 hover:text-red-600" onclick="closeModal()">&times;</button>
            </div>
            <form id="bookingForm" class="space-y-4">
                @csrf
                <div>
                    <label class="block text-sm font-medium text-gray-700" for="customer_id">Yang Mengajukan</label>
                    <select id="user_id" name="user_id"
                        class="w-full p-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="" selected disabled>Pilih Karyawan</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700" for="driver_id">Yang Mengemudi</label>
                    <select id="driver_id" name="driver_id"
                        class="w-full p-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="" selected disabled>Pilih Karyawan</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700" for="approver_1">Yang Menyetujui 1</label>
                    <select id="approver_1" name="approver_1"
                        class="w-full p-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="" selected disabled>Pilih Yang Menyetujui</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700" for="approver_2">Yang Menyetujui 2</label>
                    <select id="approver_2" name="approver_2"
                        class="w-full p-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="" selected disabled>Pilih Yang Menyetujui</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700" for="vehicle_type">Jenis Kendaraan</label>
                    <select id="vehicle_type" name="vehicle_id"
                        class="w-full p-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="" selected disabled>Pilih Kendaraan</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700" for="start_date">Tanggal Pengajuan</label>
                    <input type="date" id="start_date" name="start_date"
                        class="w-full p-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700" for="end_date">Tanggal Pengembalian</label>
                    <input type="date" id="end_date" name="end_date"
                        class="w-full p-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700" for="purpose">Alasan Pengajuan</label>
                    <input type="text" id="purpose" name="purpose"
                        class="w-full p-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div class="flex justify-end space-x-4">
                    <button type="button" class="bg-gray-300 text-gray-700 px-4 py-2 rounded-md"
                        onclick="closeModal()">Cancel</button>
                    <button type="submit"
                        class="bg-green-600 text-white px-4 py-2 rounded-md hover:bg-green-700">Save</button>
                </div>
            </form>
        </div>
    </div>
</main>
</div>

<script>
    function openModal() {
    $.ajax({
        url: '{{ route('getUser') }}',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            'Content-Type': 'application/json'
        },
        method: 'GET',
        success: function (data) {
            let employeeOptions = '<option value="" selected disabled>Pilih Karyawan</option>';
                    data.forEach(function (employee) {
                        employeeOptions += `<option value="${employee.id}">${employee.name}</option>`;
                    });
                    $('#user_id').html(employeeOptions);
                    $('#driver_id').html(employeeOptions);
        },
        error: function (error) {
            alert('Terjadi kesalahan: ' + error.responseText);
        }
    });

    $.ajax({
        url: '{{ route('getApprovalAdmin') }}',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            'Content-Type': 'application/json'
        },
        method: 'GET',
        success: function (data) {
            // Tampilkan data (contoh)
            let approverOptions = '<option value="" selected disabled>Pilih Karyawan</option>';
                    data.forEach(function (approver) {
                        approverOptions += `<option value="${approver.id}">${approver.name}</option>`;
                    });
                    $('#approver_1').html(approverOptions);
                    $('#approver_2').html(approverOptions);
        },
        error: function (error) {
            // Tampilkan error
            alert('Terjadi kesalahan: ' + error.responseText);
        }
    });
    $.ajax({
        url: '{{ route('getVehicles') }}',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            'Content-Type': 'application/json'
        },
        method: 'GET',
        success: function (data) {
            let vehicleOptions = '<option value="" selected disabled>Pilih Kendaraan</option>';
                    data.forEach(function (vehicle) {
                        vehicleOptions += `<option value="${vehicle.id}">${vehicle.model}</option>`;
                    });
                    $('#vehicle_type').html(vehicleOptions);
        },
        error: function (error) {
            // Tampilkan error
            alert('Terjadi kesalahan: ' + error.responseText);
        }
    });
    document.getElementById('modal').classList.remove('hidden');
}

    function closeModal() {
        document.getElementById('modal').classList.add('hidden');
    }


    $('#bookingForm').on('submit', function (e) {
        e.preventDefault();
        $.ajax({
            url: '{{ route('createBooking') }}',
            method: 'POST',
            data: $(this).serialize(),
            success: function (response) {
                Swal.fire({
                    title: "Berhasil!",
                    text: response.message,
                    icon: "success"
                    }).then(() => {
                        location.reload();
                    });
                closeModal();
            },
            error: function (e) {
                alert(e.responseText);
                console.log(e.responseText)
            }
        });
    });
</script>
@endsection