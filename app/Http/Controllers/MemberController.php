<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;

class MemberController extends Controller
{
    public function index(Request $request)
    {
        if ($request->member) {
            $search = '%' . $request->member . '%';
            $user = Member::where('nama', 'like', $search)
                        ->orWhere('email', 'like', $search)
                        ->orWhere('no_telp', 'like', $search)
                        ->paginate(10)
                        ->appends(request()->query());
        } else {
            $user = Member::paginate(10);
        }

        return view('pages.member.index', [
            'user' => $user
        ]);
    }
}
