<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subscription;

class SubscriptionController extends Controller
{
    public function index()
    {
        $subscriptions = Subscription::all();
        return view('subscriptions.index', compact('subscriptions')); // Ensure this view exists
    }

    public function store(Request $request)
    {
        // Subscription Prices
        $prices = [
            'daily' => 100,
            'monthly' => 900,
            'yearly' => 9000,
        ];

        $subscriptionType = $request->subscription_type;
        $startDate = now();
        $endDate = match ($subscriptionType) {
            'daily' => now()->addDay(),
            'monthly' => now()->addMonth(),
            'yearly' => now()->addYear(),
        };

        // Calculate total payment
        $totalPayment = $prices[$subscriptionType];

        // Check if membership is applied
        $applyMembership = $request->has('apply_membership') ? 1 : 0;

        if ($applyMembership) {
            $totalPayment += 400; // Add membership fee
        }

        // Save to database
        Subscription::create([
            'name' => $request->name,
            'email' => $request->email,
            'subscription_type' => $subscriptionType,
            'start_date' => $startDate,
            'end_date' => $endDate,
            'total_payment' => $totalPayment,
            'membership' => $applyMembership, // ✅ Ensure membership is saved
            'status' => 'pending',
        ]);

        return redirect()->route('details.index')->with('success', 'Subscription registration done!');
    }

    // ✅ Membership List Function
    public function membershipList()
{
    $members1 = Subscription::where('membership', 1)->get();
    return view('memberships.index', compact('members1')); // ✅ Ensure this matches your folder
}


}
