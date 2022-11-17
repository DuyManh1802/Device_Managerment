<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Foundation\Auth\User as AuthUser;

class loginController extends Controller
{
    public function login(){
        return view('admin.login.index');
    }

    public function checkLogin(Request $request){
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('admin.home.index');
        }
        else
            return redirect()->route('admin.login.index')->with('error', 'Email or Password is not correct');
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('admin.login.index');
    }

    public function profile(){
        return view('admin.auth.profile');
    }

    public function updateProfile(Request $request){
        $this->validate($request,
            [
                'name' =>'required',
                'is_admin' => 'required'
            ]);
        $users = Auth::users();
        $data = [
            'name' => $request->name,
            'phone' => $request->phone,
            'address' => $request->address,
        ];

        $users->update($data);
        return redirect()->route('admin.profile.index')->with('success', 'Updated successfully!');
    }
}
