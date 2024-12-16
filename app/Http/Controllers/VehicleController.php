<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VehiclesModel;
use App\Models\UserModel;

class VehicleController extends Controller
{
    public function index()
    {
        $vehicles = VehiclesModel::get();
        return view('admin/content/vehicle', compact('vehicles'));
    }
    public function getVehicles()
    {
        $vehicles = VehiclesModel::where('status', 'available')->get();

        return response()->json($vehicles);
    }

}