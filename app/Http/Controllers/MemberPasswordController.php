<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\support\Facades\Hash;
use App\Models\Member;

class MemberPasswordController extends Controller
{
    public function index()
    {
        return view('pages.member-profile.password');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'password' => 'required|min:6',
            'password_confirm' => 'required|same:password'
        ]);

        $data = [
            'password' => Hash::make($request->password)
        ];

        $profile = Member::findOrFail($id);
        $profile->update($data);

        return redirect()->route('member.password.index')->with('status', 'Password anda berhasil diperbarui.');
    }
}
