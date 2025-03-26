@extends('layout.layout')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-sky-100 p-4">
    <div class="w-full max-w-2xl">
        <!-- Form Header -->
        <div class="text-center mb-8">
            <h1 class="text-4xl font-bold text-gray-800 mb-2">Join BicepCurl Fit</h1>
            <p class="text-lg text-gray-600">Start your fitness journey today</p>
        </div>

        <!-- Subscription Form -->
        <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-100">
            <div class="bg-gradient-to-r from-sky-500 to-blue-600 p-6 text-white">
                <h2 class="text-2xl font-semibold">Subscription Registration</h2>
                <p class="opacity-90">Choose your preferred membership plan</p>
            </div>

            <form action="{{ route('subscriptions.store') }}" method="POST" class="p-6">
                @csrf

                <!-- Name -->
                <div class="mb-6">
                    <label for="name" class="block text-gray-700 font-medium mb-2">Full Name</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </div>
                        <input type="text" id="name" name="name" required
                            class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                            placeholder="Enter Full Name">
                    </div>
                </div>

                <!-- Email -->
                <div class="mb-6">
                    <label for="email" class="block text-gray-700 font-medium mb-2">Email Address</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <input type="email" id="email" name="email" required
                            class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                            placeholder="your@email.com">
                    </div>
                </div>

                <!-- Subscription Type -->
                <div class="mb-6">
                    <label for="subscription_type" class="block text-gray-700 font-medium mb-2">Subscription Plan</label>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 subscription-options">
                        <label class="subscription-option">
                            <input type="radio" name="subscription_type" value="daily" class="hidden peer" onchange="updateEndDate()">
                            <div class="p-4 border-2 border-gray-200 rounded-lg peer-checked:border-blue-500 peer-checked:bg-blue-50 transition-all">
                                <h3 class="font-bold text-lg">1-Day Session</h3>
                                <p class="text-blue-600 font-semibold">₱100</p>
                            </div>
                        </label>
                        <label class="subscription-option">
                            <input type="radio" name="subscription_type" value="monthly" class="hidden peer" onchange="updateEndDate()" checked>
                            <div class="p-4 border-2 border-gray-200 rounded-lg peer-checked:border-blue-500 peer-checked:bg-blue-50 transition-all">
                                <h3 class="font-bold text-lg">Monthly</h3>
                                <p class="text-blue-600 font-semibold">₱900</p>
                            </div>
                        </label>
                        <label class="subscription-option">
                            <input type="radio" name="subscription_type" value="yearly" class="hidden peer" onchange="updateEndDate()">
                            <div class="p-4 border-2 border-gray-200 rounded-lg peer-checked:border-blue-500 peer-checked:bg-blue-50 transition-all">
                                <h3 class="font-bold text-lg">Yearly</h3>
                                <p class="text-blue-600 font-semibold">₱9,000</p>
                                <p class="text-xs text-gray-500 mt-1">Save ₱1,800</p>
                            </div>
                        </label>
                    </div>
                </div>

                <!-- Date Fields -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <!-- Start Date -->
                    <div>
                        <label for="start_date" class="block text-gray-700 font-medium mb-2">Start Date</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <input type="date" id="start_date" name="start_date" required readonly
                                class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg bg-gray-50 cursor-not-allowed">
                        </div>
                    </div>

                    <!-- End Date -->
                    <div>
                        <label for="end_date" class="block text-gray-700 font-medium mb-2">End Date</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <input type="date" id="end_date" name="end_date" required readonly
                                class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg bg-gray-50 cursor-not-allowed">
                        </div>
                    </div>
                </div>

                <!-- Membership Checkbox -->
                <div class="mb-8">
                    <div class="flex items-start">
                        <div class="flex items-center h-5">
                            <input type="hidden" name="apply_membership" value="0">
                            <input id="apply_membership" name="apply_membership" type="checkbox" value="1" 
                                class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded">
                        </div>
                        <div class="ml-3">
                            <label for="apply_membership" class="flex items-center text-gray-700">
                                <span class="font-medium">Lifetime Membership (₱400)</span>
                                <div class="tooltip ml-2">
                                    <span class="tooltip-icon">i</span>
                                    <span class="tooltip-text">A lifetime membership gives you unlimited session access with a 15% discount on all future subscriptions.</span>
                                </div>
                            </label>
                            <p class="text-sm text-gray-500 mt-1">Get unlimited access with 15% discount on all future subscriptions</p>
                        </div>
                    </div>
                </div>

                <!-- Submit Button -->
                <button type="submit"
                    class="w-full bg-gradient-to-r from-blue-500 to-sky-600 hover:from-blue-600 hover:to-sky-700 text-white font-semibold py-3 px-4 rounded-lg shadow-md hover:shadow-lg transition-all duration-300">
                    Complete Registration
                </button>
            </form>
        </div>
    </div>
</div>

<!-- JavaScript to Auto-Calculate End Date -->
<script>
    function updateEndDate() {
        let startDateInput = document.getElementById("start_date");
        let endDateInput = document.getElementById("end_date");
        let subscriptionType = document.querySelector('input[name="subscription_type"]:checked').value;

        let today = new Date();
        let startDate = today.toISOString().split('T')[0]; // Format YYYY-MM-DD
        let endDate = new Date(today);

        if (subscriptionType === "daily") {
            endDate.setDate(today.getDate() + 1); // 1-day session
        } else if (subscriptionType === "monthly") {
            endDate.setDate(today.getDate() + 30); // 30 days
        } else if (subscriptionType === "yearly") {
            endDate.setFullYear(today.getFullYear() + 1); // 1 year
        }

        let formattedEndDate = endDate.toISOString().split('T')[0];

        startDateInput.value = startDate;
        endDateInput.value = formattedEndDate;
    }

    // Initialize on page load
    document.addEventListener("DOMContentLoaded", function() {
        // Set monthly as default selected
        document.querySelector('input[value="monthly"]').checked = true;
        updateEndDate();
    });
</script>

<style>
    .tooltip {
        position: relative;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
    }

    .tooltip-icon {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 18px;
        height: 18px;
        border-radius: 50%;
        background-color: #3b82f6;
        color: white;
        font-size: 12px;
        font-weight: bold;
    }

    .tooltip .tooltip-text {
        visibility: hidden;
        width: 240px;
        background-color: #1e293b;
        color: #fff;
        text-align: center;
        border-radius: 6px;
        padding: 8px 12px;
        position: absolute;
        z-index: 10;
        bottom: 125%;
        left: 50%;
        transform: translateX(-50%);
        opacity: 0;
        transition: opacity 0.3s;
        font-size: 14px;
        font-weight: normal;
        line-height: 1.4;
    }

    .tooltip:hover .tooltip-text {
        visibility: visible;
        opacity: 1;
    }

    .subscription-option {
        cursor: pointer;
        transition: transform 0.2s;
    }

    .subscription-option:hover {
        transform: translateY(-2px);
    }

    .subscription-option input:checked + div {
        border-color: #3b82f6;
        background-color: #f0f9ff;
    }
</style>
@endsection