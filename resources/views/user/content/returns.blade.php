@extends('template.user.main')
@section('page_title', 'Admin Dashboard')

@section('content')
<!-- Dashboard Content -->
<main class="p-6 space-y-6">
    <!-- History Booking -->
    <div class="bg-white p-6 rounded shadow">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-gray-700 font-bold">Menu Pengembalian</h2>
            <!-- Add Booking Button -->
            <button class="bg-green-600 text-white px-6 py-2 rounded-md shadow hover:bg-green-700 focus:outline-none"
                onclick="openModal(null)">
                Lakukan Pengembalian Kendaraan
            </button>
        </div>
        <table class="w-full border-collapse">
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

<!-- Modal -->
<div id="modal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-50 w-full h-full">
    <div class="bg-white rounded-lg w-96 p-6 space-y-4 shadow-lg">
        <div class="flex justify-between items-center">
            <h3 class="text-lg font-bold">Lakukan Pengembalian</h3>
            <button class="text-gray-500 hover:text-red-600" onclick="closeModal()">&times;</button>
        </div>
        <form id="returnsForm" class="space-y-4">
            @csrf
            <input type="hidden" name="id" id="id">
            <div>
                <label class="block text-sm font-medium text-gray-700" for="vehicle">Pilih Kendaraan Yang Sedang Dipakai</label>
                <select id="vehicle" name="vehicle"
                    class="w-full p-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="" selected disabled>Pilih Kendaraan</option>
                </select>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700" for="return_date">Tanggal Pengembalian</label>
                <input type="date" id="return_date" name="return_date"
                    class="w-full p-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700" for="condition">Kondisi</label>
                <select id="condition" name="condition"
                    class="w-full p-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="" selected disabled>Pilih Kondisi</option>
                    <option value="good">Bagus</option>
                    <option value="damaged">Rusak</option>
                    <option value="lost">Hilang</option>
                </select>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700" for="remarks">Keterangan</label>
                <input type="text" id="remarks" name="remarks"
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
    function openModal(id) {
        $.ajax({
        url: '{{ route('getVehicleInUse') }}',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            'Content-Type': 'application/json'
        },
        method: 'GET',
        success: function (dataVehicle) {
            let vehicleOptions = '<option value="" selected disabled>Pilih Kendaraan</option>';
                    dataVehicle.forEach(function (vehicle) {
                        vehicleOptions += `<option value="${vehicle.id}">${vehicle.model}</option>`;
                    });
                    $('#vehicle').html(vehicleOptions);
                    $('#modal').removeClass('hidden');
        },
        error: function (error){
            alert('Terjadi kesalahan: ' + error.responseText)
        }
        });
}

function closeModal() {
    $('#modal').addClass('hidden');
}
$('#returnsForm').on('submit', function (e) {
        e.preventDefault();
        if($('#id').val() == ''){
            $.ajax({
                url: '{{ route('addReturns') }}',
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
        }else{
            $.ajax({
                url: '{{ route('editVehicle') }}',
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
        }
    });

    function deleteUser(id) {
        Swal.fire({
        title: "Apa kamu yakin?",
        text: "Kamu akan menghapus kendaraan",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Iya",
        cancelButtonText: "Tidak"
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: '{{ route('deleteVehicle') }}',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    'Content-Type': 'application/json'
                },
                method: 'POST',
                data: JSON.stringify({ id: id }),
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
        }
    });
        }
</script>

@endsection
