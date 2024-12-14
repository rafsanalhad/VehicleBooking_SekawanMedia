<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ApprovalModel;
use App\Models\UserModel;

class ApprovalController extends Controller
{
    public function index()
    {
        return view('admin/content/dashboard');
    }
    public function getAllApproval()
    {
        $approvals = ApprovalModel::with(['booking', 'approver'])->get();

        return view('admin/content/approval', compact('approvals'));
    }
    public function getApproverModal()
    {
        $users = UserModel::where('role', 'approver')->get();
        return response()->json($users);
    }

}
