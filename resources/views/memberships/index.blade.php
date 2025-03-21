@extends('layout.layout')

@section('content')
    <div class="container mx-auto p-1 flex flex-col items-center">
        <h1 class="text-3xl font-bold text-gray-700 mb-4 text-center">Membership List</h1>

        <!-- Search Form -->
        <form method="GET" action="{{ route('memberships.index') }}" class="max-w-md justify-center mx-auto">
            <div class="flex items-center border rounded-lg overflow-hidden mb-5">
                <input type="text" name="search" placeholder="Search members..."
                       value="{{ request('search') }}"
                       class="w-full p-2 outline-none border-none rounded-l-lg bg-sky-100"
                       style="border: 1px solid #CBD5E0;" />
                <button type="submit"class="bg-sky-200 hover:bg-sky-300 hover:text-blue-900 text-gray px-4 py-2 rounded-r-lg">Search</button>
            </div>
        </form>

        <!-- Membership List -->
        <div class="w-full max-w-md bg-sky-100 rounded-lg shadow-lg overflow-hidden">
            <ul class="divide-y divide-gray-200">
                @forelse ($members as $member)
                    <li class="px-4 py-3">
                        <div class="flex items-center justify-between">
                            <table>
                            <div class="flex items-center">
                                <tr>
                                <span class="font-semibold">{{ $member->name }}</span>
                            </tr>
                            <tr>
                                <span class="text-gray-600 ml-2">({{ $member->email }})</span>
                            </tr>
                            </div>
                        </table>
                        </div>
                    </li>
                @empty
                    <li class="px-4 py-3 text-gray-500">No members found.</li>
                @endforelse
            </ul>
        </div>
    </div>
@endsection
