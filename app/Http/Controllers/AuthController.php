<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//
use App\Models\User;
use App\Models\student;

class AuthController extends Controller
{
    public function index(){
        return view('auth.login');
    }

    public function register_view(){
        return view('auth.register');
    }
    public function register(Request $request){
        //validation
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'password'=>'required|confirmed',//password and confirm_password must match
        ]);
        //save the user into the User database table.
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => \Hash::make($request->password),
        ]);
        return redirect(route('login'));
    }


    public function login(Request $request){
        //dd($request->all());
        //validation
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
        // login code 
        
        if(\Auth::attempt($request->only('email','password'))){
            $request->session()->regenerate();
            return redirect('dashboard');
        }

        return redirect('login')->withError('Login details are not valid');
    }

    public function dashboard(){
        $student = student::all();
        return view('dashboard',['students'=>$student]);
    }

    public function logout(Request $request){
        \Session::flush();
        \Auth::logout();
        $request->session()->invalidate();
 
        $request->session()->regenerateToken();
        return redirect('');
    }
}
