@extends('layout.layout')

@section('content')
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="card shadow-lg w-100 border-0">
            <div class="card-header bg-green-600 text-white text-center">
                <h2>Edit Member Details</h2>
            </div>
            <div class="card-body p-4 bg-gray-100">
                <form action="{{ route('projects.update', $project->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="name" class="form-label fw-bold text-green-700">Name</label>
                        <input type="text" class="form-control rounded-3 bg-white border border-green-400 text-gray-900 shadow-sm 
                            focus:ring-green-500 focus:border-green-600 p-2" 
                            id="name" name="name" value="{{ $project->name }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label fw-bold text-green-700">Subscription</label>
                        <textarea class="form-control rounded-3 bg-white border border-green-400 text-gray-900 shadow-sm 
                            focus:ring-green-500 focus:border-green-600 p-2" 
                            id="description" name="description" rows="1" required>{{ $project->description }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="start_date" class="form-label fw-bold text-green-700">Start Date</label>
                        <input type="datetime-local" class="form-control rounded-3 bg-white border border-green-400 text-gray-900 shadow-sm 
                            focus:ring-green-500 focus:border-green-600 p-2" 
                            id="start_date" name="start_date" value="{{ $project->start_date }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="status" class="form-label fw-bold text-green-700">Status</label>
                        <select class="form-select rounded-3 bg-white border border-green-400 text-gray-900 shadow-sm 
                            focus:ring-green-500 focus:border-green-600 p-2" 
                            id="status" name="status" required>
                            <option value="Active" {{ $project->status == 'Pending' ? 'selected' : '' }}>Active</option>
                            <option value="Expired" {{ $project->status == 'In Progress' ? 'selected' : '' }}>Expired</option>
                            <option value="None" {{ $project->status == 'Completed' ? 'selected' : '' }}>None</option>
                        </select>
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('index') }}" class="btn btn-outline-secondary rounded-pill px-4 py-2 
                            border-2 fw-bold transition">Cancel</a>
                        <button type="submit" class="btn bg-green-500 hover:bg-green-600 text-white rounded-pill px-4 py-2 fw-bold 
                            shadow-sm transition duration-300 uppercase">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
