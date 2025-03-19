@extends('layout.layout')

@section('content')
    <div class="container mx-auto p-8">
        <h1 class="text-3xl font-bold text-gray-700 mb-4">Account List</h1>

        <!-- Search Bar -->
        <form method="GET" action="{{ route('members.index') }}" class="mb-4">
            <input 
                type="text" 
                name="search" 
                placeholder="Search by name..."
                value="{{ request('search') }}"
                class="border border-sky-200 px-4 py-2 rounded-md focus:ring focus:ring-sky-200"
            />
            <button type="submit" class="ml-2 px-4 py-2 bg-sky-200 text-gray-900 rounded-md hover:bg-sky-300 hover:text-blue-900">
                Search Account
            </button>
        </form>

        <table class="w-full border-collapse border border-sky-200">
            <thead>
                <tr class="bg-sky-200">
                    <th class="border border-sky-200 px-4 py-2">ID</th>
                    <th class="border border-sky-200 px-4 py-2">Name</th>
                    <th class="border border-sky-200 px-4 py-2">Email</th>
                    <th class="border border-sky-200 px-4 py-2">Role</th>
                    <th class="border border-sky-200 px-4 py-2">Joined At</th>
                </tr>
            </thead>
            <tbody>
                @forelse($members as $member)
                    <tr class="text-center">
                        <td class="border border-sky-200 px-4 py-2">{{ $member->id }}</td>
                        <td class="border border-sky-200 px-4 py-2">{{ $member->name }}</td>
                        <td class="border border-sky-200 px-4 py-2">{{ $member->email }}</td>
                        <td class="border border-sky-200 px-4 py-2">
                            {{ $member->roles->pluck('name')->implode(', ') }}
                        </td>
                        <td class="border border-sky-200 px-4 py-2">{{ $member->created_at->format('M d, Y') }}</td>
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
