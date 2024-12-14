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
                    <th class="text-left p-3 font-medium">Booking ID</th>
                    <th class="text-left p-3 font-medium">Employee Name</th>
                    <th class="text-left p-3 font-medium">Email</th>
                    <th class="text-left p-3 font-medium">Role</th>
                    <th class="text-left p-3 font-medium">Departement</th>
                    <th class="text-left p-3 font-medium">Location</th>
                    <th class="text-left p-3 font-medium">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr class="border-t">
                    <td class="p-3">{{ $user->id }}</td>
                    <td class="p-3">{{ $user->name }}</td>
                    <td class="p-3">{{ $user->email }}</td>
                    <td class="p-3">{{ $user->role }}</td>
                    <td class="p-3">{{ $user->departments->name }}</td>
                    <td class="p-3 text-yellow-600">{{ $user->departments->location }}</td>
                    <td class="p-3">
                        <button class="bg-blue-600 text-white px-4 py-2 rounded-md shadow hover:bg-blue-700">Details</button>
                        <button class="bg-green-600 text-white px-4 py-2 rounded-md shadow hover:bg-green-700 mt-2">Approve</button>
                        <button class="bg-red-600 text-white px-4 py-2 rounded-md shadow hover:bg-red-700 mt-2">Reject</button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</main>

@endsection
