@extends('layout.layout')

@section('content')
<div class="container mx-auto p-6">
    <h2 class="text-2xl font-semibold text-center text-blue-600">Edit Subscription</h2>

    <form action="{{ route('details.update', $subscription->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label class="block">Name</label>
        <input type="text" name="name" value="{{ $subscription->name }}" class="w-full p-2 border rounded">

        <label class="block mt-2">Email</label>
        <input type="email" name="email" value="{{ $subscription->email }}" class="w-full p-2 border rounded">

        <label class="block mt-2">Subscription Type</label>
        <select name="subscription_type" class="w-full p-2 border rounded">
            <option value="monthly" {{ $subscription->subscription_type == 'monthly' ? 'selected' : '' }}>Monthly</option>
            <option value="yearly" {{ $subscription->subscription_type == 'yearly' ? 'selected' : '' }}>Yearly</option>
        </select>

        <label class="block mt-2">Total Payment</label>
        <input type="number" name="total_payment" value="{{ $subscription->total_payment }}" class="w-full p-2 border rounded">

        <button type="submit" class="bg-green-500 text-white px-4 py-2 mt-3 rounded">
            Update Subscription
        </button>
    </form>
</div>
@endsection
