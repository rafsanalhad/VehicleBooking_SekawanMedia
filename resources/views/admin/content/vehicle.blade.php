@extends('template.admin.main')
@section('page_title', 'Admin Dashboard')

@section('content')
<!-- Dashboard Content -->
<main class="p-6 space-y-6">
    <!-- History Booking -->
    <div class="bg-white p-6 rounded shadow">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-gray-700 font-bold">Kendaraan</h2>
            <!-- Add Booking Button -->
            <button class="bg-green-600 text-white px-6 py-2 rounded-md shadow hover:bg-green-700 focus:outline-none"
                onclick="openModal()">
                + Tambah Kendaraan
            </button>
        </div>
        <table class="w-full border-collapse" id="kendaraanTable">
            <thead>
                <tr class="bg-gray-100">
                    <th class="text-left p-3 font-medium">No</th>
                    <th class="text-left p-3 font-medium">Tipe</th>
                    <th class="text-left p-3 font-medium">Nomor Plat</th>
                    <th class="text-left p-3 font-medium">Model</th>
                    <th class="text-left p-3 font-medium">Tahun</th>
                    <th class="text-left p-3 font-medium">Tipe Kepemilikan</th>
                    <th class="text-left p-3 font-medium">Status</th>
                    <th class="text-left p-3 font-medium">Action</th>
                    
                    {{-- <th class="text-left p-3 font-medium">Action</th> --}}
                </tr>
            </thead>
            <tbody>
                @foreach($vehicles as $index => $vehicle)
                <tr class="border-t">
                    <td class="p-3">{{ $index + 1 }}</td>
                    <td class="p-3">{{ $vehicle->type }}</td>
                    <td class="p-3">{{ $vehicle->plate_number }}</td>
                    <td class="p-3">{{ $vehicle->model}}</td>
                    <td class="p-3">{{ $vehicle->year }}</td>
                    <td class="p-3">{{ $vehicle->ownership_type }}</td>
                    <td class="p-3 text-yellow-600">{{ $vehicle->status }}</td>
                    <td class="p-3">
                        <button class="bg-yellow-400 text-white px-4 py-2 rounded-md shadow hover:bg-yellow-400 mt-2"
                            onclick="openModal('{{ $vehicle->id }}')">Edit</button>
                        <button class="bg-red-600 text-white px-4 py-2 rounded-md shadow hover:bg-red-700 mt-2"
                            onclick="deleteUser('{{ $vehicle->id }}')">Hapus</button>
                    </td>
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Modal -->
<div id="modal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-50 w-full h-full">
    <div class="bg-white rounded-lg w-96 p-6 space-y-4 shadow-lg">
        <div class="flex justify-between items-center">
            <h3 class="text-lg font-bold">Tambah Pengguna Baru</h3>
            <button class="text-gray-500 hover:text-red-600" onclick="closeModal()">&times;</button>
        </div>
        <form id="vehicleForm" class="space-y-4">
            @csrf
            <input type="hidden" name="id" id="id">
            <div>
                <label class="block text-sm font-medium text-gray-700" for="type">Tipe Kepemilikan</label>
                <select id="type" name="type"
                    class="w-full p-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="" selected disabled>Pilih Tipe</option>
                    <option value="passenger">passenger</option>
                    <option value="cargo">cargo</option>
                </select>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700" for="email">No Plat</label>
                <input type="text" id="no_plat" name="no_plat"
                    class="w-full p-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700" for="email">Model</label>
                <input type="text" id="model" name="model"
                    class="w-full p-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700" for="email">Tahun</label>
                <input type="number" id="year" name="year"
                    class="w-full p-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700" for="role">Tipe Kepemilikan</label>
                <select id="ownership_type" name="ownership_type"
                    class="w-full p-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="" selected disabled>Pilih Tipe</option>
                    <option value="company">company</option>
                    <option value="rental">rental</option>
                </select>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700" for="role">Status</label>
                <select id="status" name="status"
                    class="w-full p-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="" selected disabled>Pilih Status</option>
                    <option value="available">available</option>
                    <option value="in_use">in_use</option>
                </select>
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
    $(document).ready(function () {
        $('#kendaraanTable').DataTable({
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
    $('#kendaraanNav').addClass("active");
    function openModal(id) {
        if(id == null){ 
        $('#type').val('');
        $('#no_plat').val('');
        $('#model').val('');
        $('#ownership_type').val('');
        $('#year').val('');
        $('#status').val('');
        $('#modal').removeClass('hidden');
        }else{
            $.ajax({
                url: '{{ route('getVehicleById') }}',
                method: 'POST',
                data: JSON.stringify({ id: id }),
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    'Content-Type': 'application/json'
                },
                success: function (response) {
                    $('#id').val(response.id);
                    $('#type').val(response.type);
                    $('#no_plat').val(response.plate_number);
                    $('#model').val(response.model);
                    $('#year').val(response.year);
                    $('#ownership_type').val(response.ownership_type);
                    $('#status').val(response.status);
                    $('#modal').removeClass('hidden');
                },
                error: function (e) {
                    alert(e.responseText);
                    console.log(e.responseText)
                }
            });
        }
}

function closeModal() {
    $('#modal').addClass('hidden');
}
$('#vehicleForm').on('submit', function (e) {
        e.preventDefault();
        if($('#id').val() == ''){
            $.ajax({
                url: '{{ route('addVehicle') }}',
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
