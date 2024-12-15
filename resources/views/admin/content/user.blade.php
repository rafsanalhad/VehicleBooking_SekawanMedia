@extends('template.admin.main')
@section('page_title', 'Admin Dashboard')

@section('content')
<!-- Dashboard Content -->
<main class="p-6 space-y-6">
    <!-- History Booking -->
    <div class="bg-white p-6 rounded shadow">
        <h2 class="text-gray-700 font-bold mb-4">List User</h2>
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
                        <button class="bg-yellow-600 text-white px-4 py-2 rounded-md shadow hover:bg-green-700 mt-2">Edit</button>
                        <button class="bg-red-600 text-white px-4 py-2 rounded-md shadow hover:bg-red-700 mt-2">Hapus</button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</main>

@endsection
