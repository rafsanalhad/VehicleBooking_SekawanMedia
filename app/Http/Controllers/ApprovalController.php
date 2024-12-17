<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ApprovalModel;
use App\Models\UserModel;
use App\Models\BookingModel;
use App\Models\VehiclesModel;

class ApprovalController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            $user = auth()->user();
            if ($user->role !== 'approver') {
                return redirect('/login')->withErrors(['login' => 'Access denied.']);
            }

            // dd($user->role);

            return $next($request);
        });
    }
    public function index()
    {
        $usageData = BookingModel::selectRaw('DATE_FORMAT(created_at, "%Y-%m") as month, COUNT(*) as total')
            ->groupBy('month')
            ->orderBy('month')
            ->get();
        $months = $usageData->pluck('month');
        $totals = $usageData->pluck('total');

        $userTotal = UserModel::all()->count();
        $kendaraanTotal = VehiclesModel::all()->count();
        $kendaraanTersedia = VehiclesModel::where('status', 'available')->count();
        $jumlahPengajuan = BookingModel::all()->count();
        return view('approval/content/dashboard', compact('userTotal', 'kendaraanTotal', 'kendaraanTersedia', 'jumlahPengajuan', 'months', 'totals'));
    }
    public function approval()
    {
        $user = auth()->user();
        $approvals = ApprovalModel::with(['booking', 'approver'])
            ->where('approver_id', $user->id)
            ->get();

        return view('approval/content/approval', compact('approvals'));
    }
    public function getApproverModal()
    {
        $users = UserModel::where('role', 'approver')->get();
        if ($users->isEmpty()) {
            return response()->json(['message' => 'No approver found'], 404);
        }
        return response()->json($users);
    }
    public function updateApproval(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'id' => 'required',
            'status' => 'required',
            'booking_id' => 'required'
        ]);

        // Cari data approval berdasarkan ID
        $approval = ApprovalModel::find($validated['id']);

        $vehicle = VehiclesModel::find($approval->booking->vehicle_id);

        // Jika approval tidak ditemukan
        if (!$approval) {
            return response()->json(['message' => 'Approval not found'], 404);
        }

        $booking = BookingModel::find($validated['booking_id']);
        if (!$booking) {
            return response()->json(['message' => 'Booking not found'], 404);
        }
        $approval->update([
            'status' => $validated['status']
        ]);
        if ($validated['status'] == 'approved') {
            if ($booking->status == 'pending') {
                $booking->update([
                    'status' => 'approved_pending_1'
                ]);
                return response()->json(['message' => 'success']);
            } else if ($booking->status == 'approved_pending_1') {
                $booking->update([
                    'status' => 'approved'
                ]);
                $vehicle->update([
                    'status' => 'in_use'
                ]);
                return response()->json(['message' => 'success']);
            }
        } else {
            $booking->update([
                'status' => 'rejected'
            ]);
            return response()->json(['message' => 'success']);
        }
    }
}
