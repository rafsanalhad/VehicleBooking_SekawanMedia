<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VehiclesModel;
use App\Models\UserModel;

class VehicleController extends Controller
{
    public function index()
    {
        $vehicles = VehiclesModel::orderBy('id', 'desc')->get();
        return view('admin/content/vehicle', compact('vehicles'));
    }
    public function getVehicles()
    {
        $vehicles = VehiclesModel::where('status', 'available')->get();

        return response()->json($vehicles);
    }

    public function getVehicleById(Request $request){
        $id = $request->id;
        $vehicles = VehiclesModel::where('id', $id)->first();
        return response()->json($vehicles);
    }

    public function addVehicle(Request $request)
    {
        $validate=$request->validate([
            'type' => 'required ',
            'no_plat' => 'required',
            'model' => 'required',
            'year' => 'required',
            'ownership_type' => 'required',
            'status' => 'required',

        ]);

        $vehicles = VehiclesModel::create([
            'type' => $validate['type'],
            'plate_number' => $validate['no_plat'],
            'model' => $validate['model'],
            'year' => $validate['year'],
            'ownership_type' => $validate['ownership_type'],
            'status' => $validate['status'],
        ]);

        return response()->json(['message' => 'Kendaraan telah berhasil ditambah', 'user' => $vehicles], 201);
    }

    public function editVehicle(Request $request)
    {
        $validate=$request->validate([
            'id' => 'required',
            'type' => 'required ',
            'no_plat' => 'required',
            'model' => 'required',
            'year' => 'required',
            'ownership_type' => 'required',
            'status' => 'required',

        ]);
        $vehicles = VehiclesModel::find($validate['id']);
        if (!$vehicles) {
            return response()->json(['message' => 'Vehicles not found'], 404);
        }
        $vehicles->update([
            'type' => $validate['type'],
            'plate_number' => $validate['no_plat'],
            'model' => $validate['model'],
            'year' => $validate['year'],
            'ownership_type' => $validate['ownership_type'],
            'status' => $validate['status'],
        ]);

        return response()->json(['message' => 'Kendaraan telah berhasil diedit']);
    }
    public function deleteVehiclesById(Request $request)
    {
        $id = $request->id;
        $user = VehiclesModel::find($id);

        if (!$user) {
            return response()->json(['message' => 'Kendaran not found'], 404);
        }

        $user->delete();

        return response()->json(['message' => 'Kendaraan berhasil dihapus']);
    }


}