@extends('layout.layout')

@section('content')
<div class="h-screen text-center flex flex-col w-100% gap- bg-gradient-to-br bg-sky-100 container mx-auto p-1">
    <h1 class="text-3xl font-bold text-gray-700 mb-4">Subscription Details</h1>

    @if(session('success'))
        <div class="bg-sky-200 text-blue-900 p-3 rounded-lg mb-4 text-center">
            {{ session('success') }}
        </div>
    @endif

    <!-- Search Form -->
    <form method="GET" action="{{ route('details.index') }}" class="max-w-md justify-center mx-auto">
        <div class="flex items-center border rounded-lg overflow-hidden">
            <input type="text" name="search" placeholder="Search subscriptions..."
                   value="{{ request('search') }}"
                   class="w-full p-2 outline-none border-none bg-sky-100"
                   style="border: 1px solid #CBD5E0;" />
            <button type="submit" class="bg-sky-200 hover:bg-sky-300 hover:text-blue-900 text-gray px-4 py-2">Search</button>
        </div>
    </form>

    <table class="min-w-full bg-sky-100 shadow-md rounded-lg overflow-hidden mt-4">
        <thead>
            <tr class="bg-sky-200 text-gray-700">
                <th class="px-4 py-2">Name</th>
                <th class="px-4 py-2">Email</th>
                <th class="px-4 py-2">Subscription</th>
                <th class="px-4 py-2">Start Date</th>
                <th class="px-4 py-2">End Date</th>
                <th class="px-4 py-2">Total Payment</th>
                <th class="px-4 py-2">Membership</th>
                <th class="px-4 py-2">Status</th>
                @can('admin')
                <th class="px-4 py-2">Action</th>
                @endcan
            </tr>
        </thead>
        <tbody>
            @foreach($subscriptions as $sub)
            <tr class="border-t text-gray-600">
                <td class="px-4 py-2">{{ $sub->name }}</td>
                <td class="px-4 py-2">{{ $sub->email }}</td>
                <td class="px-4 py-2">{{ ucfirst($sub->subscription_type) }}</td>
                <td class="px-4 py-2">{{ \Carbon\Carbon::parse($sub->start_date)->format('Y-m-d') }}</td>
                <td class="px-4 py-2">{{ \Carbon\Carbon::parse($sub->end_date)->format('Y-m-d') }}</td>
                <td class="px-4 py-2">₱{{ number_format($sub->total_payment, 2) }}</td>
                <td class="px-4 py-2">
                    <span class="px-2 py-1 text-xs font-semibold rounded
                        {{ $sub->membership ? 'bg-green-200 text-green-700' : 'bg-sky-100 text-gray-700' }}">
                        {{ $sub->membership ? 'Applied' : 'None' }}
                    </span>
                </td>
                <td class="px-4 py-2">
                    @role('admin')
                        <form action="{{ route('details.updateStatus', $sub->id) }}" method="POST" class="inline-block">
                            @csrf
                            @method('PATCH')
                            <select name="status" class="px-2 py-1 border rounded" onchange="this.form.submit()">
                                <option value="pending" {{ $sub->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="paid" {{ $sub->status == 'paid' ? 'selected' : '' }}>Paid</option>
                                <option value="expired" {{ $sub->status == 'expired' ? 'selected' : '' }}>Expired</option>
                            </select>
                        </form>

                        <!-- Delete Button -->
                        <form action="{{ route('details.destroy', $sub->id) }}" method="POST" class="inline-block"
                              onsubmit="return confirm('Are you sure you want to delete this subscription?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="ml-2 bg-red-500 hover:bg-red-700 text-white px-3 py-1 rounded">
                                Delete
                            </button>
                        </form>
                    @else
                        <span class="px-2 py-1 text-xs font-semibold rounded
                            {{ $sub->status == 'pending' ? 'bg-yellow-200 text-yellow-700' : ($sub->status == 'paid' ? 'bg-green-200 text-green-700' : 'bg-red-200 text-red-700') }}">
                            {{ ucfirst($sub->status) }}
                        </span>
                    @endrole
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
