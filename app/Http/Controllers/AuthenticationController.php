<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\support\Facades\Hash;
use App\Models\Member;

class AuthenticationController extends Controller
{
    public function indexAdmin()
    {
        return view('pages.auth.login-admin');
    }

    public function postAdmin(Request $request)
    {
        $credentials = $request->only('username', 'password');

        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect()->route('admin.dashboard');
        }

        return back()->with('status', 'Username atau password salah');
    }

    public function logoutAdmin()
    {
        Auth::logout();
        return redirect('/admin/login');
    }

    public function indexUser()
    {
        return view('pages.auth.login-member');
    }

    public function registerUser()
    {
        return view('pages.auth.register-member');
    }

    public function registerPostUser(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required',
            'username' => 'required|min:4',
            'password' => 'required|min:6',
            'no_telp' => 'required',
        ]);

        $data = $request->all();
        $data['password'] = Hash::make($request->password);
        $data['dibuat'] = now();

        Member::create($data);

        return redirect()->route('member.index.login')->with('status', 'Register berhasil');
    }

    public function postUser(Request $request)
    {
        $credentials = $request->only('username', 'password');

        if (Auth::guard('member')->attempt($credentials)) {
            return redirect()->route('home');
        }

        return back()->with('status', 'Username atau password salah');
    }

    public function logoutUser()
    {
        Auth::logout();
        return redirect()->route('home');
    }
}
