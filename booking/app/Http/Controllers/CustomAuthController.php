<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class CustomAuthController extends Controller {

    public function __construct() {
        $this->middleware('web');
        //$this->middleware('guest')->except('logout');
    }

    public function get_login() {
        return view('auth.login');
    }

    public function get_register() {
        return view('auth.register');
    }

    public function forgot_password() {
        return view('auth.passwords.forgotPassword');
    }

    public function get_account() {
        return view('auth.account');
    }

    public function get_settings() {
        return view('auth.settings');
    }

    public function process_login(Request $request) {

        $request->validate(['email' => 'required', 'password' => 'required']);
        $credentials = $request->only(['email', 'password']);

        if(Auth::attempt($credentials)) {
            $user = Auth::user();
            Session::put('user', $user);
            return redirect()->route('home');
        }

        return redirect()->back()->with('message', 'Email / Parola gresite');
    }

    public function process_register(Request $request) {
        if($request->terms == 'on') {
            $validator = Validator::make($request->all(), [
                'name' => 'required|max:50',
                'username' => 'required|max:50',
                'email' => 'required|email',
                'password' => 'required|min:6',
                'phoneNumber' => "required|numeric|digits:10"
            ]);

            if(!$validator->fails()) {

                $user = User::create([
                    'name' => trim($request->name),
                    'username' => trim($request->username),
                    'email' => strtolower($request->email),
                    'password' => bcrypt($request->password),
                    'userType' => "client",
                    'profile' => "profile.png",
                    'phoneNumber' => $request->phoneNumber
                ]);

                $credentials = $request->only(['email', 'password']);
                if(Auth::attempt($credentials)) {
                    $user = Auth::user();
                    Session::put('user', $user);
                    return redirect()->route('home');
                }
            }else {
                return redirect()->back()->withErrors($validator);
            }
        }
        return redirect()->back()->with("errmsg", "no");
    }

    public function logout(Request $request)
    {
        //Auth::logout();
        $request->session()->forget('user');
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home');
    }

    public function manual_logout() {
        Session::forget('user');
        Session::invalidate();
        Session::regenerateToken();

        return redirect()->route('home');
    }

}