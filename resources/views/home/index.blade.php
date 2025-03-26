@extends('layout.layout')

@section('content')
<div class="min-h-screen flex flex-col items-center justify-center p-8 bg-gradient-to-br from-sky-100 via-blue-50 to-cyan-100 relative overflow-hidden">
    <!-- Animated Background Elements -->
    <div class="absolute inset-0 overflow-hidden">
        <div class="absolute top-20 left-20 w-64 h-64 bg-cyan-300 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob"></div>
        <div class="absolute top-1/3 right-20 w-72 h-72 bg-sky-300 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob animation-delay-2000"></div>
        <div class="absolute bottom-20 left-1/3 w-80 h-80 bg-blue-300 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob animation-delay-4000"></div>
    </div>

    <!-- Main Content -->
    <div class="relative z-10 w-full max-w-6xl text-center">
        <!-- Hero Section -->
        <div class="backdrop-blur-lg bg-white/30 p-12 rounded-3xl shadow-2xl border border-white/20 transform transition-all hover:scale-[1.01] duration-500 animate-fade-in">
            <h1 class="text-7xl md:text-8xl font-extrabold tracking-tight bg-clip-text text-transparent bg-gradient-to-r from-cyan-600 to-blue-800">
                BicepCurl Fit
                <span class="inline-block animate-bounce">💪</span>
            </h1>
            <h2 class="text-2xl md:text-3xl font-medium text-gray-700 mt-6">
                Located in <span class="font-bold text-gray-900 underline decoration-cyan-500">Calape, Bohol</span>
            </h2>
            <div class="mt-8 flex justify-center gap-4">
                <a href="{{ route('register') }}" class="px-8 py-3 bg-gradient-to-r from-cyan-500 to-blue-600 text-white font-semibold rounded-full shadow-lg hover:shadow-xl transition-all duration-300 hover:scale-105">
                    Join Now
                </a>
                <a href="#about" class="px-8 py-3 bg-white/90 text-gray-800 font-semibold rounded-full shadow-lg hover:shadow-xl transition-all duration-300 hover:scale-105 border border-gray-200">
                    Learn More
                </a>
            </div>
        </div>

        <!-- Motivational Section -->
        <div class="mt-16 backdrop-blur-md bg-white/30 p-8 rounded-3xl shadow-xl border border-white/20 animate-slide-up max-w-4xl mx-auto">
            <div class="relative">
                <svg class="absolute -top-8 -left-8 w-16 h-16 text-cyan-400 opacity-30" fill="currentColor" viewBox="0 0 100 100">
                    <path d="M30 15 L15 30 L30 45 L45 30 Z" />
                </svg>
                <svg class="absolute -bottom-8 -right-8 w-16 h-16 text-blue-400 opacity-30" fill="currentColor" viewBox="0 0 100 100">
                    <path d="M70 15 L85 30 L70 45 L55 30 Z" />
                </svg>
                <h3 class="text-3xl md:text-4xl font-bold text-gray-800 leading-tight">
                    "Every rep counts.<br>Every drop of sweat is progress.<br>Keep pushing!"  
                </h3>
                <p class="text-xl text-gray-700 mt-6 italic font-medium">
                    No excuses. No limits. Only results. 
                    <span class="inline-block ml-2 animate-pulse">🏋️‍♂️🔥</span>
                </p>
            </div>
        </div>
    </div>

    <style>
        @keyframes fade-in {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        @keyframes slide-up {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        @keyframes blob {
            0% { transform: translate(0px, 0px) scale(1); }
            33% { transform: translate(30px, -50px) scale(1.1); }
            66% { transform: translate(-20px, 20px) scale(0.9); }
            100% { transform: translate(0px, 0px) scale(1); }
        }
        
        @keyframes bounce {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-15px); }
        }
        
        @keyframes pulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.1); }
        }
        
        .animate-fade-in {
            animation: fade-in 1s ease-out;
        }
        
        .animate-slide-up {
            animation: slide-up 1.2s ease-out;
        }
        
        .animate-blob {
            animation: blob 10s infinite;
        }
        
        .animation-delay-2000 {
            animation-delay: 2s;
        }
        
        .animation-delay-4000 {
            animation-delay: 4s;
        }
        
        .animate-bounce {
            animation: bounce 2s infinite;
        }
        
        .animate-pulse {
            animation: pulse 1.5s infinite;
        }
    </style>
</div>
@endsection