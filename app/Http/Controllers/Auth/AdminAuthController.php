<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller
{
    public function login() {
        if(Auth::guard('admin')->check()) {
            return redirect()->route('admin.dashboard');
        }
        return view('auth.admin-login');
    }

    public function login_check(Request $request) {
        $inputs = $request->all();

        $request->validate([
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required'],
        ]);

        if(Auth::guard('admin')->attempt(['email' => $inputs['email'], 'password' => $inputs['password']])) {
            return redirect()->route('admin.dashboard');
        } else {
            return redirect()->back()->with('wrong-credentials', 'You have entered wrong credentials.');
        }
    }

    public function logout(Request $request) {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.auth.login');
    }
}
