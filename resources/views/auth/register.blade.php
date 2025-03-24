@extends('layout.layout')

@section('content')
<div class="min-h-screen w-full mx-auto p-10 flex flex-col items-center bg-gradient-to-br bg-sky-100">
    <form class="flex flex-col bg-white/10 backdrop-blur-lg p-8 rounded-2xl shadow-2xl w-full max-w-md space-y-6 border border-white/20"
        action="{{ route('register') }}" method="POST">
        @csrf

        <div class="flex flex-col items-center">
            <h2 class="text-3xl font-extrabold text-gray-700 uppercase">Register</h2>
            <p class="text-gray-600 text-sm">Create an account to start your fitness journey</p>
        </div>

        <div>
            <label for="name" class="block text-sm font-medium text-gray-900">Name</label>
            <input type="text" id="name" name="name" required 
                class="mt-1 w-full px-4 py-3 border border-sky-300 bg-white/20 text-gray-900 rounded-lg focus:ring-2 focus:ring-cyan-400 focus:border-cyan-400">
        </div>

        <div>
            <label for="email" class="block text-sm font-medium text-gray-900">Email</label>
            <input type="email" id="email" name="email" required 
                class="mt-1 w-full px-4 py-3 border border-sky-300 bg-white/20 text-gray-900 rounded-lg focus:ring-2 focus:ring-cyan-400 focus:border-cyan-400">
        </div>

        <div>
            <label for="password" class="block text-sm font-medium text-gray-900">Password</label>
            <input type="password" id="password" name="password" required 
                class="mt-1 w-full px-4 py-3 border border-sky-300 bg-white/20 text-gray-900 rounded-lg focus:ring-2 focus:ring-cyan-400 focus:border-cyan-400">
        </div>

        <div>
            <label for="password_confirmation" class="block text-sm font-medium text-gray-900">Confirm Password</label>
            <input type="password" id="password_confirmation" name="password_confirmation" required 
                class="mt-1 w-full px-4 py-3 border border-sky-300 bg-white/20 text-gray-900 rounded-lg focus:ring-2 focus:ring-cyan-400 focus:border-cyan-400">
        </div>

        <button type="submit" 
            class="w-full bg-cyan-500 hover:bg-cyan-600 text-white font-semibold py-3 rounded-lg transition duration-300">
            Register
        </button>

        <div class="text-center">
            <a class="text-gray-600">Already have an account?</a>
            <a href="{{ route('login') }}" class="text-cyan-300 hover:underline">Login here</a>
        </div>

        @if (session('error'))
            <div class="bg-red-600 text-gray-900 text-center p-2 rounded-md">
                {{ session('error') }}
            </div>
        @endif
    </form>
</div>
@endsection
