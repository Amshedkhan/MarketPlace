<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Auth;
use Illuminate\Support\Facades\Gate;

class AuthController extends Controller
{
    public function index(){
        return view('pages.login.index');
    }


    public function showRegister(){
        return view('pages.register.index');
    }
    public function store(Request $request){
        $validateData = $request->validate([
            'name' => 'required|max:255',
            'email' =>  "email|required|unique:users",
            'password' => 'required|min:6|confirmed',
           ]);
        $obj = $request->all();
        $obj['password'] = Hash::make($request->password);
        $user = User::create($obj);
        Auth::login($user);
        if (Gate::allows('isSeller')) {
           return redirect()->intended('product')->with('loginSuccess', 'You have successfully logged in');
        }else{
            return redirect()->intended('buy-product')->with('loginSuccess', 'You have successfully logged in');
        };
    }


    public function login(Request $request){
        $credentials = $request->only('email', 'password');
        $user = User::where('email', $request->email)->first();

        if (Auth::attempt($credentials)) {
            if (Gate::allows('isSeller')) {
                return redirect()->intended('product')->with('loginSuccess', 'You have successfully logged in');
             }else{
                 return redirect()->intended('buy-product')->with('loginSuccess', 'You have successfully logged in');
             };
            // return redirect()->intended('product')->with('loginSuccess', 'You have successfully logged in');
        }
        return back()->with([
            'Loginerror' => 'Invalid credentials',
        ]);
    }


    public function logout(Request $request) {
        Auth::logout();
        return redirect('/')->with(['logoutSuccess' => 'logged out Successfully']);
    }
}
