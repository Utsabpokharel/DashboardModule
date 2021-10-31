<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\PasswordChange;
use App\Models\User;
use App\Rules\MatchOldPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Spatie\Permission\Models\Role;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        if ($request->isMethod('post')) {
            $credential = $request->only('email', 'password');
            // dd($credential);
            if (Auth::attempt($credential)) {
                // return 'done';
                return redirect()->route('dashboard');
            } else {
                return redirect()->back()->withErrors('Invalid Credentials !!!');
            }
        }
        return view('auth.login');
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'Logged Out !!!');
    }
    public function dashboard()
    {
        $user = User::count();
        $role = Role::count();
        return view('Admin.dashboard.dashboard', compact('role', 'user'));
    }
    public function changepassword()
    {
        return view('Admin.Password.changePassword');
    }
    public function password_update(Request $request)
    {
        $request->validate([
            'old_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);
        User::find(Auth::user()->id)->update(['password' => Hash::make($request->new_password)]);
        Mail::to(Auth::user()->email)->send(new PasswordChange);
        Auth::logout();

        return redirect()->route('login')->with('success', 'Your Password has been changed,Please Login again.');
        Auth::logoutOtherDevices(request('password'));
    }
    public function notifications()
    {
        $notify = DB::table('notifications')->get();
        return view('Admin.layouts.master', compact('notify'));
    }
}
