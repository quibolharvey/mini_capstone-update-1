<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use Illuminate\Http\Request;

class MembershipController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        // Query subscriptions where membership is applied and filter by name or email
        $members = Subscription::where('membership', true)
            ->where(function ($query) use ($search) {
                if ($search) {
                    $query->where('name', 'like', "%$search%")
                          ->orWhere('email', 'like', "%$search%");
                }
            })
            ->get();

        return view('memberships.index', compact('members'));
    }
}
