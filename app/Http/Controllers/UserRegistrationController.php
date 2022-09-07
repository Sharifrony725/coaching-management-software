<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;

class UserRegistrationController extends Controller
{
    // public function index(){
    //     return view('users.login_form');
    // }
    public function dashboard(){
        return view('admin.home.home');
    }
    public function UserRegistration(){
        //create method
        if(Auth::user()->role == 'Admin'){
           return view('users.register_form');
        }else{
            return redirect()->back();
        }
    }

    public function UserSave(Request $request){
        //save method
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed'],
            'mobile' => ['required', 'string', 'min:11', 'max:13'],
            'role' => ['required'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'role' => $request->role,
            'avatar' =>$request->avatar,
            'password' => Hash::make($request->password),
        ]);
        $users = User::all();
        return view('users.user_list',compact('users'));
    }
    public function userList()
    {
        //show method
        if(Auth::user()->role == 'Admin'){
            $users = User::all();
            return view('users.user_list', compact('users'));
        }else{
            return redirect()->back();
        }

    }
}
