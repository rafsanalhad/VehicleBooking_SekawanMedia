<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VehiclesModel;
use App\Models\UserModel;

class VehicleController extends Controller
{
    public function index()
    {
        return view('admin/content/dashboard');
    }
    public function getVehicles()
    {
        $vehicles = VehiclesModel::get();

        return response()->json($vehicles);
    }

}