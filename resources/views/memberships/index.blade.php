@extends('layout.layout')

@section('content')
    <div class="container mx-auto p-6">
        <h2 class="text-blue-600 font-semibold text-2xl mb-4 text-center">Membership List</h2>

        <!-- Search Form -->
        <form method="GET" action="{{ route('memberships.index') }}" class="mb-4 max-w-lg mx-auto">
            <div class="flex border rounded-lg overflow-hidden">
                <input type="text" name="search" placeholder="Search members..."
                       value="{{ request('search') }}"
                       class="w-full p-2 outline-none border-none" />
                <button type="submit" class="bg-blue-600 text-white px-4 py-2">Search</button>
            </div>
        </form>

        <!-- Membership List -->
        <div class="max-w-lg mx-auto bg-white p-6 rounded-lg shadow">
            <ul class="list-disc pl-5">
                @forelse ($members as $member)
                    <li class="text-lg text-gray-700">
                        {{ $member->name }} ({{ $member->email }})
                    </li>
                @empty
                    <p class="text-gray-500">No members found.</p>
                @endforelse
            </ul>
        </div>
    </div>
@endsection
