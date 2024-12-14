<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ApprovalModel;

class ApprovalController extends Controller
{
    public function index()
    {
        return view('admin/content/dashboard');
    }
    public function getAllApproval()
    {
        // Mengambil semua data booking tanpa filter user_id
        $approvals = ApprovalModel::with(['booking', 'approver'])->get();

        // Mengembalikan view 'admin/content/list_booking' dengan data bookings
        return view('admin/content/approval', compact('approvals'));
    }
}
