@extends('layout.layout')

@section('content')
    <div class="container mx-auto p-6">
        <h2 class="text-blue-600 font-semibold text-2xl mb-4 text-center">Subscription Details</h2>

        @can('create-record')
            <div class="flex justify-end mb-3">
                <a href="{{ route('projects.create') }}"
                    class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg transition-all">
                    + Add New Member
                </a>
            </div>
        @endcan

        <div class="overflow-x-auto shadow-lg rounded-lg">
            <table class="table-auto w-full border-collapse bg-white rounded-lg shadow">
                <thead class="bg-blue-500 text-white">
                    <tr class="text-left">
                        <th class="px-4 py-3">ID</th>
                        <th class="px-4 py-3">Name</th>
                        <th class="px-4 py-3">Subscription</th>
                        <th class="px-4 py-3">Start Date</th>
                        <th class="px-4 py-3">Membership Status</th>
                        @role('admin')
                            <th class="px-4 py-3 text-center">Actions</th>
                        @endrole
                    </tr>
                </thead>
                <tbody>
                    @foreach ($projects as $project)
                        <tr class="border-b hover:bg-gray-100 transition">
                            <td class="px-4 py-3">{{ $project->id }}</td>
                            <td class="px-4 py-3">{{ $project->name }}</td>
                            <td class="px-4 py-3">{{ $project->description }}</td>
                            <td class="px-4 py-3">{{ $project->start_date }}</td>
                            <td class="px-4 py-3">{{ $project->status }}</td>
                            @role('admin')
                                <td class="px-4 py-3 text-center space-x-2">
                                    <a href="{{ route('projects.edit', $project->id) }}"
                                        class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded transition-all">
                                        Edit
                                    </a>

                                    <form action="{{ route('projects.destroy', $project->id) }}" method="POST"
                                        class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded transition-all"
                                            onclick="return confirm('Are you sure?')">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            @endrole
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
