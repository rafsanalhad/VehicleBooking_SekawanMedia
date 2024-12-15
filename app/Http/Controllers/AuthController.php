<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\UserModel;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function loginView()
    {
        return view('auth/login');
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors(['login' => 'Email dan password tidak boleh kosong']);
        }
        $data=[
            'email' => $request->email,
            'password' => $request->password
        ];
        if(Auth::attempt($data)){
            $user = Auth::user();
            if ($user->role == 'admin') {
                return redirect()->route('adminDashboard');
            } else if ($user->role == 'approver') {
                return redirect()->route('approvalDashboard');
            }
        }else{
            return redirect()
                ->back()
                ->withErrors(['login' => 'Invalid email or password']);
        }

    }

    public function signUpView()
    {
        return view('auth/signUp');
    }

    public function signUp(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $user = UserModel::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('loginView')->with('success', 'Account created successfully. Please log in.');
    }
}
