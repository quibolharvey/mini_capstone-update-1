@extends('layout.layout')

@section('content')
    <div class="container mx-auto p-6">
        <h2 class="text-blue-600 font-semibold text-2xl mb-4 text-center">Subscription Registration</h2>

        <!-- Subscription Form -->
        <div class="max-w-lg mx-auto bg-white p-6 rounded-lg shadow">
            <form action="{{ route('subscriptions.store') }}" method="POST">
                @csrf

                <!-- Name -->
                <div class="mb-4">
                    <label for="name" class="block text-gray-700 font-semibold">Full Name</label>
                    <input type="text" id="name" name="name" required
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <!-- Email -->
                <div class="mb-4">
                    <label for="email" class="block text-gray-700 font-semibold">Email Address</label>
                    <input type="email" id="email" name="email" required
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <!-- Subscription Type -->
                <div class="mb-4">
                    <label for="subscription_type" class="block text-gray-700 font-semibold">Subscription Type</label>
                    <select id="subscription_type" name="subscription_type" required
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        onchange="updateEndDate()">
                        <option value="daily">1-Day Session(₱100)</option>
                        <option value="monthly">Monthly(₱900)</option>
                        <option value="yearly">Yearly(₱9,000)</option>
                    </select>
                </div>

                <!-- Start Date -->
                <div class="mb-4">
                    <label for="start_date" class="block text-gray-700 font-semibold">Start Date</label>
                    <input type="date" id="start_date" name="start_date" required readonly
                        class="w-full px-4 py-2 border rounded-lg bg-gray-100 cursor-not-allowed">
                </div>

                <!-- End Date -->
                <div class="mb-4">
                    <label for="end_date" class="block text-gray-700 font-semibold">End Date</label>
                    <input type="date" id="end_date" name="end_date" required readonly
                        class="w-full px-4 py-2 border rounded-lg bg-gray-100 cursor-not-allowed">
                </div>

                <!-- Apply for Membership Checkbox -->
                <div class="mb-4 flex items-center">
                        <input type="hidden" name="apply_membership" value="0">
                    <input type="checkbox" id="apply_membership" name="apply_membership" value="1" class="mr-2">
                    <label for="apply_membership" class="text-gray-700 font-semibold">
                        Apply Membership (₱400)
                        <span class="tooltip">?
                            <span class="tooltip-text">A lifetime membership gives you unlimited session, monthly etc. discount of 15%.</span>
                        </span>
                    </label>
                </div>

                <!-- Submit Button -->
                <div class="mt-4">
                    <button type="submit"
                        class="w-full bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg transition-all">
                        Register Subscription
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- JavaScript to Auto-Calculate End Date -->
    <script>
        function updateEndDate() {
            let startDateInput = document.getElementById("start_date");
            let endDateInput = document.getElementById("end_date");
            let subscriptionType = document.getElementById("subscription_type").value;

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
        document.addEventListener("DOMContentLoaded", updateEndDate);
    </script>
    <style>
        .tooltip {
            position: relative;
            display: inline-block;
            cursor: pointer;
            font-weight: bold;
            font-size: 14px;
            border-radius: 50%;
            width: 18px;
            height: 18px;
            text-align: center;
            background-color: #007bff;
            color: white;
            line-height: 18px;
            margin-left: 5px;
        }

        .tooltip .tooltip-text {
            visibility: hidden;
            width: 1000px;
            background-color: #333;
            color: #fff;
            text-align: center;
            border-radius: 5px;
            padding: 6px;
            position: absolute;
            z-index: 1;
            bottom: 125%; /* Position above */
            left: 50%;
            transform: translateX(-50%);
            opacity: 0;
            transition: opacity 0.3s;
            white-space: nowrap;
        }

        .tooltip:hover .tooltip-text {
            visibility: visible;
            opacity: 1;
        }
    </style>
@endsection
