<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;

class MemberProfileController extends Controller
{
    public function index()
    {
        $profile = Member::findOrFail(auth()->guard('member')->user()->id);

        return view('pages.member-profile.index', [
            'profile' => $profile,
        ]);
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        $profile = Member::findOrFail($id);
        $profile->update($data);

        return redirect()->route('member.profile.index')->with('status', 'Profil anda berhasil diperbarui.');
    }
}
