@extends('template.admin.main')
@section('page_title', 'Admin Dashboard')

@section('content')
<!-- Dashboard Content -->
<main class="p-6 space-y-6">
    <!-- History Booking -->
    <div class="bg-white p-6 rounded shadow">
        <h2 class="text-gray-700 font-bold mb-4">History Booking</h2>
        <table class="w-full border-collapse">
            <thead>
                <tr class="bg-gray-100">
                    <th class="text-left p-3 font-medium">Booking ID</th>
                    <th class="text-left p-3 font-medium">Customer Name</th>
                    <th class="text-left p-3 font-medium">Type</th>
                    <th class="text-left p-3 font-medium">Booking Date</th>
                    <th class="text-left p-3 font-medium">Status</th>
                    <th class="text-left p-3 font-medium">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($approvals as $approval)
                <tr class="border-t">
                    <td class="p-3">{{ $approval->id }}</td>
                    <td class="p-3">{{ $approval->userFromBooking->name }}</td>
                    <td class="p-3">{{ $approval->approver->type }}</td>
                    <td class="p-3">{{ $approval->approval_level }}</td>
                    <td class="p-3 text-yellow-600">{{ $approval->status }}</td>
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
