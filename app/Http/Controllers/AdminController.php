<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin/content/dashboard');
    }
    public function booking()
    {
        return view('admin/content/booking');
    }
}
