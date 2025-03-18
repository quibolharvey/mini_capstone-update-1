<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subscription;
use Illuminate\Support\Facades\Log;

class DetailController extends Controller
{
    // Display subscription details
    public function index(Request $request)
{
    $query = Subscription::query();

    if ($request->has('search')) {
        $search = $request->input('search');
        $query->where('name', 'like', "%$search%")
              ->orWhere('email', 'like', "%$search%")
              ->orWhere('subscription_type', 'like', "%$search%");
    }

    $subscriptions = $query->get();

    return view('details.index', compact('subscriptions'));
}


    // Update subscription status to "paid"
    public function updateStatus(Request $request, $id)
{
    Log::info("Update request received for ID: $id with status: " . $request->status);

    $subscription = Subscription::findOrFail($id);

    // Validate the status input
    $request->validate([
        'status' => 'required|in:pending,paid,expired',
    ]);

    // Update the status
    $subscription->update(['status' => $request->status]);

    return redirect()->route('details.index')->with('success', 'Subscription status updated successfully!');
}
public function destroy($id)
{
    $subscription = Subscription::findOrFail($id);
    $subscription->delete();

    return redirect()->route('details.index')->with('success', 'Subscription deleted successfully!');
}








}


