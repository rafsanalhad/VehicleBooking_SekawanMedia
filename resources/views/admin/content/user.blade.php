@extends('template.admin.main')
@section('page_title', 'Admin Dashboard')

@section('content')
<!-- Dashboard Content -->
<main class="p-6 space-y-6">
    <!-- History Booking -->
    <div class="bg-white p-6 rounded shadow">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-gray-700 font-bold">Karyawan / Pengguna</h2>
            <!-- Add Booking Button -->
            <button class="bg-green-600 text-white px-6 py-2 rounded-md shadow hover:bg-green-700 focus:outline-none"
                onclick="openModal(null)">
                + Tambah Karyawan
            </button>
        </div>
        <table class="w-full border-collapse">
            <thead>
                <tr class="bg-gray-100">
                    <th class="text-left p-3 font-medium">No</th>
                    <th class="text-left p-3 font-medium">Nama Karyawan</th>
                    <th class="text-left p-3 font-medium">Email</th>
                    <th class="text-left p-3 font-medium">Role</th>
                    <th class="text-left p-3 font-medium">Departement</th>
                    <th class="text-left p-3 font-medium">Lokasi</th>
                    <th class="text-left p-3 font-medium">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $index => $user)
                <tr class="border-t">
                    <td class="p-3">{{ $index + 1 }}</td>
                    <td class="p-3">{{ $user->name }}</td>
                    <td class="p-3">{{ $user->email }}</td>
                    <td class="p-3">{{ $user->role }}</td>
                    <td class="p-3">{{ $user->departments->name }}</td>
                    <td class="p-3 text-yellow-600">{{ $user->departments->location }}</td>
                    <td class="p-3">
                        <button class="bg-yellow-400 text-white px-4 py-2 rounded-md shadow hover:bg-yellow-400 mt-2"
                            onclick="openModal('{{ $user->id }}')">Edit</button>
                        <button class="bg-red-600 text-white px-4 py-2 rounded-md shadow hover:bg-red-700 mt-2"
                            onclick="deleteUser('{{ $user->id }}')">Hapus</button>
                    </td>
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
        <form id="editUserForm" class="space-y-4">
            @csrf
            <input type="hidden" name="id" id="id">
            <div>
                <label class="block text-sm font-medium text-gray-700" for="name">Nama</label>
                <input type="text" id="name" name="name"
                    class="w-full p-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700" for="email">Email</label>
                <input type="text" id="email" name="email"
                    class="w-full p-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700" for="role">Role</label>
                <select id="role" name="role"
                    class="w-full p-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="" selected disabled>Pilih Role</option>
                    <option value="admin">Admin</option>
                    <option value="approver">Approver</option>
                    <option value="user">User</option>
                </select>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700" for="department">Departement</label>
                <select id="department" name="department"
                    class="w-full p-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="" selected disabled>Pilih Departement</option>
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
    function openModal(id) {
        if(id == null){
            
        $.ajax({
        url: '{{ route('getAllDepartment') }}',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            'Content-Type': 'application/json'
        },
        method: 'GET',
        success: function (dataDepartment) {
            let departmentsOptions = '<option value="" selected disabled>Pilih Departement</option>';
                    dataDepartment.forEach(function (department) {
                        departmentsOptions += `<option value="${department.id}">${department.name}</option>`;
                    });
                    $('#department').html(departmentsOptions);
        },
        error: function (error){
            alert('Terjadi kesalahan: ' + error.responseText)
        }
        });
            $('#id').val('');
            $('#name').val('');
            $('#email').val('');
            $('#role').val('');
            $('#department').val('');
            $('#modal').removeClass('hidden');
        }else{
            $.ajax({
        url: '{{ route('getUserById', ['id' => '__ID__']) }}'.replace('__ID__', id),
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            'Content-Type': 'application/json'
        },
        method: 'GET',
        success: function (data) {
        //     let employeeOptions = '<option value="" selected disabled>Pilih Karyawan</option>';
        //             data.forEach(function (employee) {
        //                 employeeOptions += `<option value="${employee.id}">${employee.name}</option>`;
        //             });
        //             $('#user_id').html(employeeOptions);
        //             $('#driver_id').html(employeeOptions);
        // },

        console.log(data[0]);

        $.ajax({
        url: '{{ route('getAllDepartment') }}',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            'Content-Type': 'application/json'
        },
        method: 'GET',
        success: function (dataDepartment) {
            let departmentsOptions = '<option value="" selected disabled>Pilih Departement</option>';
                    dataDepartment.forEach(function (department) {
                        departmentsOptions += `<option value="${department.id}">${department.name}</option>`;
                    });
                    $('#department').html(departmentsOptions);
                    $('#department').val(data[0].department_id);
        },
        error: function (error){
            alert('Terjadi kesalahan: ' + error.responseText)
        }
        });
        $('#id').val(data[0].id);
        $('#name').val(data[0].name);
        $('#email').val(data[0].email);
        $('#role').val(data[0].role);
        console.log(data[0].department_id);
        $('#modal').removeClass('hidden');
        },
        error: function (error) {
            alert('Terjadi kesalahan: ' + error.responseText);
        }
    });
        }
}

function closeModal() {
    $('#modal').addClass('hidden');
}
$('#editUserForm').on('submit', function (e) {
        e.preventDefault();
        if($('#id').val() == ''){
            $.ajax({
                url: '{{ route('addUser') }}',
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
                url: '{{ route('editUser') }}',
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
        text: "Kamu akan menghapus karyawan",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Iya",
        cancelButtonText: "Tidak"
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: '{{ route('deleteUser') }}',
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