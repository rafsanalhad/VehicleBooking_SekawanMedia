<?php

namespace App\Http\Controllers;

use App\Models\BookingModel;
use App\Models\ApprovalModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BookingController extends Controller
{
    public function createBooking(Request $request)
    {
        $validated = $request->validate([
            'vehicle_id' => 'required|exists:vehicles,id',
            'driver_id' => 'required',
            'user_id' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'purpose' => 'required|string',
            'approver_1' => 'required',
            'approver_2' => 'required',
        ]);

        $booking_id = Str::uuid(); // Generate UUID for booking

        // Simpan data booking
            BookingModel::create([
            'id' => $booking_id,
            'vehicle_id' => $validated['vehicle_id'],
            'driver_id' => $validated['driver_id'],
            'user_id' => $validated['user_id'],
            'status' => 'pending',
            'start_datetime' => $validated['start_date'],
            'end_datetime' => $validated['end_date'],
            'purpose' => $validated['purpose'],
        ]);

        // Simpan approval pertama
        ApprovalModel::create([
            'id' => Str::uuid(),
            'booking_id' => $booking_id,
            'approver_id' => $validated['approver_1'],
            'approval_level' => 1,
            'status' => 'pending',
        ]);

        // Simpan approval kedua
        ApprovalModel::create([
            'id' => Str::uuid(),
            'booking_id' => $booking_id,
            'approver_id' => $validated['approver_2'],
            'approval_level' => 2,
            'status' => 'pending',
        ]);

        return response()->json([
            'message' => 'Booking created successfully!',
            'booking_id' => $booking_id,
        ]);
    }

    public function getPendingApprovals()
    {
        $approvals = ApprovalModel::where('approver_id', auth()->id())
            ->where('status', 'pending')
            ->with('booking')
            ->get();
    }

    public function getListBooking()
    {
        // Mengambil semua data booking tanpa filter user_id
        $bookings = BookingModel::with(['approvals', 'vehicles'])->get();

        // Mengembalikan view 'admin/content/list_booking' dengan data bookings
        return view('admin/content/booking', compact('bookings'));
    }


    public function approve(Request $request, ApprovalModel $approval)
    {
        if ($approval->approver_id !== auth()->id()) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        $approval->update([
            'status' => 'approved',
            'approval_date' => now(),
        ]);

        $remainingApprovals = ApprovalModel::where('booking_id', $approval->booking_id)
            ->where('status', 'pending')
            ->count();

        if ($remainingApprovals === 0) {
            $approval->booking->update(['approval_status' => 'approved']);
        }

        return response()->json(['message' => 'Approval recorded successfully']);
    }

    public function reject(Request $request, ApprovalModel $approval)
    {
        if ($approval->approver_id !== auth()->id()) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        $approval->update([
            'status' => 'rejected',
            'approval_date' => now(),
        ]);

        $approval->booking->update(['approval_status' => 'rejected']);

        return response()->json(['message' => 'Booking rejected']);
    }
}
