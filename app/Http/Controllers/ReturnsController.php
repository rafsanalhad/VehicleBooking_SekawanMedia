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

    public function getDepartmentById(Request $request){
        $id = $request->id;
        $department = DepartmentModel::find($id);
        if (!$department) {
            return response()->json(['message' => 'Department not found'], 404);
        }
        return response()->json($department);
    }

    public function addDepartment(Request $request)
    {
        $validate=$request->validate([
            'name' => 'required',
            'location' => 'required',
        ]);

        DepartmentModel::create([
            'name' => $validate['name'],
            'location' => $validate['location'],
        ]);

        return response()->json(['message' => 'Departement telah berhasil ditambah'], 201);
    }

    public function editDepartment(Request $request)
    {
        $validate=$request->validate([
            'id' => 'required',
            'name' => 'required',
            'location' => 'required',
        ]);
        $department = DepartmentModel::find($validate['id']);
        if (!$department) {
            return response()->json(['message' => 'Department not found'], 404);
        }
        $department->update([
            'name' => $validate['name'],
            'location' => $validate['location'],
        ]);

        return response()->json(['message' => 'Departement telah berhasil diedit']);
    }

    public function deleteDepartmentById(Request $request)
    {
        $id = $request->id;
        $Department = DepartmentModel::find($id);

        if (!$Department) {
            return response()->json(['message' => 'Department not found'], 404);
        }

        $Department->delete();

        return response()->json(['message' => 'Department berhasil dihapus']);
    }

}