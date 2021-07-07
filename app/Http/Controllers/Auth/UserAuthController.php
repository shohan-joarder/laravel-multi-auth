<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;

class UserAuthController extends Controller
{

    public function index()
    {
        return view('welcome');
    }

    public function login()
    {
        return view('user.login');
    }

    public function register()
    {
        return view('user.register');
    }

    public function saveUser(Request $request)
    {
        // return $request;
        $this->validate($request, [
            'name' => 'required|unique:users,name',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'password' => 'required',
            'confirm_password' => 'required',
            'phone' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
        ]);

        if ($request->password == $request->confirm_password) {
            $user = new User();
            $user->email = $request->email;
            $user->name = $request->name;
            $user->phone = $request->phone;
            $user->gendar = $request->gender;
            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->password = bcrypt($request->password);
            if ($user->save()) {
                return redirect()->route("login")->with("success", "Register successfully please login now.");
            } else {
                return redirect()->back()->with("error", "password doesn't match.");
            }
        }
    }
    public function authicticate(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
            'confirm_password' => 'required',
        ]);

        if ($request->password == $request->confirm_password) {
            if (Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->password])) {
                return redirect()->intended(route('home'));
            } else {
                return redirect()->back()->with("error", "Oops you have entired a invalid credintials.");
            }
        } else {
            return redirect()->back()->with("error", "password doesn't match.");
        }
    }

    public function logout()
    {
        Auth::guard('web')->logout();
        return redirect()->route('login');
    }
}
