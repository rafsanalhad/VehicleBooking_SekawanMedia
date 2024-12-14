<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Approval;
use App\Models\User;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function create(Request $request)
    {
        $validated = $request->validate([
            'vehicle_id' => 'required|exists:vehicles,id',
            'driver_id' => 'required|exists:drivers,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'purpose' => 'required|string',
            'approver_ids' => 'required|array|min:2',
            'approver_ids.*' => 'exists:users,id',
        ]);

        $booking = Booking::create([
            'vehicle_id' => $validated['vehicle_id'],
            'driver_id' => $validated['driver_id'],
            'created_by' => auth()->id(),
            'approval_status' => 'pending',
            'start_date' => $validated['start_date'],
            'end_date' => $validated['end_date'],
            'purpose' => $validated['purpose'],
        ]);

        foreach ($validated['approver_ids'] as $level => $approver_id) {
            Approval::create([
                'booking_id' => $booking->id,
                'approver_id' => $approver_id,
                'level' => $level + 1,
                'status' => 'pending',
            ]);
        }

        return response()->json([
            'message' => 'Booking created successfully!',
            'booking' => $booking,
        ]);
    }

    public function getPendingApprovals()
    {
        $approvals = Approval::where('approver_id', auth()->id())
            ->where('status', 'pending')
            ->with('booking')
            ->get();

        return response()->json($approvals);
    }

    public function approve(Request $request, Approval $approval)
    {
        if ($approval->approver_id !== auth()->id()) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        $approval->update([
            'status' => 'approved',
            'approval_date' => now(),
        ]);

        $remainingApprovals = Approval::where('booking_id', $approval->booking_id)
            ->where('status', 'pending')
            ->count();

        if ($remainingApprovals === 0) {
            $approval->booking->update(['approval_status' => 'approved']);
        }

        return response()->json(['message' => 'Approval recorded successfully']);
    }

    public function reject(Request $request, Approval $approval)
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