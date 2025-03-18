@extends('layout.layout')

@section('content')
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="card shadow-lg w-100 border-0">
            <div class="card-header bg-green-500 text-white text-center">
                <h2>Create New Project</h2>
            </div>

            <div class="card-body p-4 bg-gray-100">
                <form action="{{ route('projects.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="name" class="form-label fw-bold text-green-700">Name</label>
                        <input type="text" class="form-control rounded-3 bg-white border-green-500 text-gray-900 shadow-sm focus:ring-green-500 focus:border-green-600 p-2" 
                            id="name" name="name" required placeholder="Enter name">
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label fw-bold text-green-700">Subscription</label>
                        <select class="form-select rounded-3 bg-white border-green-500 text-gray-900 shadow-sm focus:ring-green-500 focus:border-green-600 p-2" 
                            id="description" name="description" required>
                            <option value="Session">Session</option>
                            <option value="Monthly">Monthly</option>
                            <option value="Yearly">Yearly</option>
                            <option value="Walk-In">Walk-In</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="start_date" class="form-label fw-bold text-green-700">Start Date</label>
                        <input type="datetime-local" class="form-control rounded-3 bg-white border-green-500 text-gray-900 shadow-sm focus:ring-green-500 focus:border-green-600 p-2" 
                            id="start_date" name="start_date" required>
                    </div>

                    <div class="mb-3">
                        <label for="status" class="form-label fw-bold text-green-700">Status</label>
                        <select class="form-select rounded-3 bg-white border-green-500 text-gray-900 shadow-sm focus:ring-green-500 focus:border-green-600 p-2" 
                            id="status" name="status" required>
                            <option value="Active">Active</option>
                            <option value="Expired">Expired</option>
                            <option value="None">None</option>
                        </select>
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('index') }}" class="btn btn-outline-green-500 rounded-pill px-4 py-2 border-2 fw-bold text-green-500 hover:bg-green-500 hover:text-white transition">Cancel</a>
                        <button type="submit" class="btn bg-green-500 text-white rounded-pill px-4 py-2 fw-bold shadow-sm hover:bg-green-600 transition">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
