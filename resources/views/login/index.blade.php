@extends('layout.layout')

@section('content')
    <div class="min-h-screen w-full items-center mx-auto p-10 flex flex-col bg-gradient-to-br bg-sky-100">
        <form class="flex flex-col bg-white/10 backdrop-blur-lg p-8 rounded-2xl shadow-2xl w-full max-w-md space-y-6 border border-white/20"
            action="{{ route('signin') }}" method="POST">
            @csrf

            <!-- Title -->
            <div class="flex flex-col items-center">
                <h2 class="text-3xl font-extrabold text-gray-700 uppercase">BicepCurlFit Login</h2>
                <p class="text-gray-600 text-sm">Enter your credentials to continue</p>
            </div>

            <!-- Email Field -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-900">Email</label>
                <input type="email" id="email" name="email" required
                    class="mt-1 w-full px-4 py-3 border border-sky-300 bg-white/20 text-gray-900 rounded-lg focus:ring-2 focus:ring-cyan-400 focus:border-cyan-400 transition duration-300">
            </div>

            <!-- Password Field -->
            <div>
                <label for="password" class="block text-sm font-medium text-gray-900">Password</label>
                <input type="password" id="password" name="password" required
                    class="mt-1 w-full px-4 py-3 border border-sky-300 bg-white/20 text-gray-900 rounded-lg focus:ring-2 focus:ring-cyan-400 focus:border-cyan-400 transition duration-300">
            </div>

            <!-- Submit Button -->
            <button type="submit"
                class="w-full bg-cyan-500 hover:bg-cyan-600 text-white font-semibold py-3 rounded-lg transition duration-300 uppercase">
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
                <p class="text-gray-700 text-sm">Don't have an account? 
                    <a href="{{ route('register') }}" class="text-cyan-300 hover:underline">Register here</a>
                </p>
            </div>
        </form>
    </div>
@endsection
