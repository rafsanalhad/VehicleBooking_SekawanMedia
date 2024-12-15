<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ApprovalModel;
use App\Models\UserModel;

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
        return view('admin/content/dashboard');
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
        if($users->isEmpty()){
            return response()->json(['message' => 'No approver found'], 404);
        }
        return response()->json($users);
    }
}
