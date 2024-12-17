<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ReturnsModel;
use Illuminate\Support\Str;
use App\Models\VehiclesModel;

class ReturnsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $returns = ReturnsModel::with('user', 'vehicle')->get();
        return view('admin/content/returns', compact('returns'));
    }

    public function returnsByPerson(){
        $returns = ReturnsModel::with('user', 'vehicle')->where('user_id', auth()->user()->id)->get();
        return view('user/content/returns', compact('returns'));
    }

    public function addReturns(Request $request)
    {
        $validate=$request->validate([
            'vehicle' => 'required',
            'return_date' => 'required',
            'condition' => 'required',
            'remarks' => 'required',
        ]);

        ReturnsModel::create([
            'id' => Str::uuid(),
            'user_id' => auth()->user()->id,
            'vehicle_id' => $validate['vehicle'],
            'return_date' => $validate['return_date'],
            'condition' => $validate['condition'],
            'remarks' => $validate['remarks'],
        ]);

        $vehicle = VehiclesModel::find($validate['vehicle']);
        $vehicle->update([
            'status' => 'available',
        ]);

        return response()->json(['message' => 'Departement telah berhasil ditambah'], 201);
    }

}