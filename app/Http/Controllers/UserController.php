<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\DepartmentModel;
use Illuminate\Support\Facades\Validator;
use Ramsey\Uuid\Guid\Guid;

class UserController extends Controller
{
    // Menampilkan semua user
    public function index()
    {
        $users = UserModel::with(['departments'])->get();
        return view('admin/content/user', compact('users'));
    }

    public function getUserModal()
    {
        $users = UserModel::where('role', 'user')->get();
        return response()->json($users);
    }

    public function getUserById($id)
    {
        $users = UserModel::with('departments')->where('id', $id)->get();
        return response()->json($users);
    }

    public function getAllDepartment(){
        $departments = DepartmentModel::all();
        return response()->json($departments);
    }

    // Menambahkan user baru
    public function addUser(Request $request)
    {
        $validate=$request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,',
            'role' => 'required',
            'department' => 'required',
        ]);

        $user = UserModel::create([
            'id' => Guid::uuid4()->toString(),
            'name' => $validate['name'],
            'email' => $validate['email'],
            'password' => Hash::make('12345678'),
            'role' => $validate['role'],
            'department_id' => $validate['department'],
        ]);

        return response()->json(['message' => 'User telah berhasil ditambah', 'user' => $user], 201);
    }

    public function editUser(Request $request)
    {
        $validate=$request->validate([
            'id' => 'required',
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $request->id,
            'role' => 'required',
            'department' => 'required',
        ]);
        $user = UserModel::find($validate['id']);
        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }
        $user->update([
            'name' => $validate['name'],
            'email' => $validate['email'],
            'role' => $validate['role'],
            'department_id' => $validate['department'],
        ]);

        return response()->json(['message' => 'User telah berhasil diedit', 'user' => $user]);
    }

    // Menghapus user
    public function deleteUserById(Request $request)
    {
        $id = $request->id;
        $user = UserModel::find($id);

        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        $user->delete();

        return response()->json(['message' => 'User berhasil dihapus']);
    }
}
