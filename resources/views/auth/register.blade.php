@extends('layout.layout')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-900">
    <form class="flex flex-col bg-gray-800 p-8 rounded-lg shadow-xl w-full max-w-md space-y-6"
        action="{{ route('register') }}" method="POST">
        @csrf

        <div class="flex flex-col items-center">
            <h2 class="text-2xl font-bold text-blue-400 uppercase">Register</h2>
            <p class="text-gray-400 text-sm">Create an account</p>
        </div>

        <div>
            <label for="name" class="block text-sm font-medium text-blue-400">Name</label>
            <input type="text" id="name" name="name" required class="mt-1 w-full px-4 py-2 border bg-gray-700 text-white rounded-lg">
        </div>

        <div>
            <label for="email" class="block text-sm font-medium text-blue-400">Email</label>
            <input type="email" id="email" name="email" required class="mt-1 w-full px-4 py-2 border bg-gray-700 text-white rounded-lg">
        </div>

        <div>
            <label for="password" class="block text-sm font-medium text-blue-400">Password</label>
            <input type="password" id="password" name="password" required class="mt-1 w-full px-4 py-2 border bg-gray-700 text-white rounded-lg">
        </div>

        <div>
            <label for="password_confirmation" class="block text-sm font-medium text-blue-400">Confirm Password</label>
            <input type="password" id="password_confirmation" name="password_confirmation" required class="mt-1 w-full px-4 py-2 border bg-gray-700 text-white rounded-lg">
        </div>

        <button type="submit" class="w-full bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 rounded-lg">
            Register
        </button>
        <div class="text-center">
                <a href="{{ route('login') }}" class="text-blue-400 hover:underline">Already have an account?</a>
            </p>
        </div>

        @if (session('error'))
            <div class="bg-red-600 text-white text-center p-2 rounded-md">
                {{ session('error') }}
            </div>
        @endif
    </form>
</div>
@endsection
