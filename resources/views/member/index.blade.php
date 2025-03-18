@extends('layout.layout')

@section('content')
    <div class="container mx-auto p-8">
        <h1 class="text-3xl font-bold text-indigo-800 mb-4">Member List</h1>

        <!-- Search Bar -->
        <form method="GET" action="{{ route('members.index') }}" class="mb-4">
            <input 
                type="text" 
                name="search" 
                placeholder="Search by name..."
                value="{{ request('search') }}"
                class="border border-indigo-500 px-4 py-2 rounded-md focus:ring focus:ring-indigo-300"
            />
            <button type="submit" class="ml-2 px-4 py-2 bg-indigo-500 text-white rounded-md hover:bg-indigo-600">
                Search
            </button>
        </form>

        <table class="w-full border-collapse border border-indigo-500">
            <thead>
                <tr class="bg-indigo-200">
                    <th class="border border-indigo-500 px-4 py-2">ID</th>
                    <th class="border border-indigo-500 px-4 py-2">Name</th>
                    <th class="border border-indigo-500 px-4 py-2">Email</th>
                    <th class="border border-indigo-500 px-4 py-2">Role</th>
                    <th class="border border-indigo-500 px-4 py-2">Joined At</th>
                </tr>
            </thead>
            <tbody>
                @forelse($members as $member)
                    <tr class="text-center">
                        <td class="border border-indigo-500 px-4 py-2">{{ $member->id }}</td>
                        <td class="border border-indigo-500 px-4 py-2">{{ $member->name }}</td>
                        <td class="border border-indigo-500 px-4 py-2">{{ $member->email }}</td>
                        <td class="border border-indigo-500 px-4 py-2">
                            {{ $member->roles->pluck('name')->implode(', ') }}
                        </td>
                        <td class="border border-indigo-500 px-4 py-2">{{ $member->created_at->format('M d, Y') }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center text-gray-500 py-4">No members found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <!-- Pagination -->
        <div class="mt-4 flex justify-center">
            {{ $members->appends(['search' => request('search')])->links() }}
        </div>
    </div>
@endsection
