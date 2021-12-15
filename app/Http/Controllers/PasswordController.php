<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\support\Facades\Hash;
use App\Models\User;


class PasswordController extends Controller
{
    public function index()
    {
        return view('pages.password.index');
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'password' => 'required|min:6',
            'password_confirm' => 'required|same:password'
        ]);

        $data = [
            'password' => Hash::make($request->password)
        ];

        $profile = User::findOrFail($id);
        $profile->update($data);

        return redirect()->route('admin.password.index')->with('status', 'Password anda berhasil diperbarui.');
    }
}
