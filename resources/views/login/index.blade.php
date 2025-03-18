@extends('layout.layout')

@section('content')
    <div class="min-h-screen flex items-center justify-center bg-gray-900">
        <form class="flex flex-col bg-gray-800 p-8 rounded-lg shadow-xl w-full max-w-md space-y-6"
            action="{{ route('signin') }}" method="POST">
            @csrf

            <!-- Title -->
            <div class="flex flex-col items-center">
                <h2 class="text-2xl font-bold text-blue-400 uppercase">Log in to BicepCurlFit</h2>
                <p class="text-gray-400 text-sm">Enter your credentials to continue</p>
            </div>

            <!-- Email Field -->
            <div>
                <label for="email" class="block text-sm font-medium text-blue-400">Email</label>
                <input type="email" id="email" name="email" required
                    class="mt-1 w-full px-4 py-2 caret-blue-400 border border-blue-400 bg-gray-700 text-white rounded-lg focus:ring focus:border-blue-300 outline-none">
            </div>

            <!-- Password Field -->
            <div>
                <label for="password" class="block text-sm font-medium text-blue-400">Password</label>
                <input type="password" id="password" name="password" required
                    class="mt-1 w-full px-4 py-2 caret-blue-400 border border-blue-400 bg-gray-700 text-white rounded-lg focus:ring focus:border-blue-300 outline-none">
            </div>

            <!-- Submit Button -->
            <button type="submit"
                class="w-full bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 rounded-lg transition-all duration-300 uppercase">
                Log in
            </button>

            <!-- Error Message -->
            @if (session('error'))
                <div class="bg-red-600 text-white text-center p-2 rounded-md">
                    {{ session('error') }}
                </div>
            @endif

            <!-- Register Link -->
            <div class="text-center">
                <p class="text-gray-400 text-sm">Don't have an account? 
                    <a href="{{ route('register') }}" class="text-blue-400 hover:underline">Register here</a>
                </p>
            </div>
        </form>
    </div>
@endsection
