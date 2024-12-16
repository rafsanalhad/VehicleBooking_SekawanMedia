<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DepartmentModel;
use App\Models\UserModel;

class DepartmentController extends Controller
{
    public function index()
    {
        $departments = DepartmentModel::get();
        return view('admin/content/department', compact('departments'));
    }

}