<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ApprovalModel;
use App\Models\UserModel;
use App\Models\BookingModel;
use App\Models\VehiclesModel;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            if (auth()->user()->role !== 'admin') {
                return redirect('/login');
            }
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
        return view('admin/content/dashboard', compact('userTotal', 'kendaraanTotal', 'kendaraanTersedia', 'jumlahPengajuan', 'months', 'totals'));
    }
    public function booking()
    {
        return view('admin/content/booking');
    }

    public function getAllApproval()
    {
        $approvals = ApprovalModel::with(['booking', 'approver'])->get();
  
        return view('admin/content/approval', compact('approvals'));
    }
    public function getApproverModal()
    {
        $users = UserModel::where('role', 'approver')->get();
        if ($users->isEmpty()) {
            return response()->json(['message' => 'No approver found'], 404);
        }
        return response()->json($users);
    }
    public function getListBooking()
    {
        $bookings = BookingModel::with(['approvals', 'vehicles'])->get();
        return view('admin/content/booking', compact('bookings'));
    }
}
