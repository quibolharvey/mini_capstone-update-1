@extends('layout.layout')

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-bold text-indigo-800 mb-4">Membership List</h1>

        <!-- Search Form -->
        <form method="GET" action="{{ route('memberships.index') }}" class="mb-4 w-full max-w-md">
            <div class="flex items-center border rounded-lg overflow-hidden">
                <input type="text" name="search" placeholder="Search members..."
                       value="{{ request('search') }}"
                       class="w-full p-2 outline-none border-none rounded-l-lg bg-gray-100"
                       style="border: 1px solid #CBD5E0;" />
                <button type="submit"class="bg-indigo-600 text-white px-4 py-2 rounded-r-lg">Search</button>
            </div>
        </form>

        <!-- Membership List -->
        <div class="w-full max-w-md bg-white rounded-lg shadow-lg overflow-hidden">
            <ul class="divide-y divide-gray-200">
                @forelse ($members as $member)
                    <li class="px-4 py-3">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <span class="font-semibold">{{ $member->name }}</span>
                                <span class="text-gray-600 ml-2">({{ $member->email }})</span>
                            </div>
                        </div>
                    </li>
                @empty
                    <li class="px-4 py-3 text-gray-500">No members found.</li>
                @endforelse
            </ul>
        </div>
    </div>
@endsection
