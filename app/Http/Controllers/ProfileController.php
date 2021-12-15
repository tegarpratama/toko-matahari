<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ProfileController extends Controller
{
    public function index()
    {
        $profile = User::findOrFail(auth()->guard('admin')->user()->id);

        return view('pages.profile.index', [
            'profile' => $profile
        ]);
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        $profile = User::findOrFail($id);
        $profile->update($data);

        return redirect()->route('admin.profile.index')->with('status', 'Profil anda berhasil diperbarui.');
    }
}
