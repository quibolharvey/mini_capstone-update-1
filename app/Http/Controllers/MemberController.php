<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; // Assuming 'User' model represents members

class MemberController extends Controller
{
    public function index(Request $request)
{
    $query = User::with('roles');

    if ($request->has('search')) {
        $query->where('name', 'like', '%' . $request->search . '%');
    }

    $members = $query->paginate(10);

    return view('member.index', compact('members'));
}

}
