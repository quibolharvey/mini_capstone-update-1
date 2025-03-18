@extends('layout.layout')

@section('content')
    <div class="h-screen flex flex-col justify-center items-center gap-6 bg-gradient-to-br from-indigo-900 via-indigo-700 to-indigo-500 text-white">
        <div class="text-center backdrop-blur-md bg-white/10 p-6 rounded-2xl shadow-lg">
            <h1 class="text-8xl font-extrabold tracking-wide animate-fade-in">
                BicepCurl Fit 💪
            </h1>
            <h2 class="text-2xl font-medium text-gray-200 mt-2">
                Located in <span class="font-semibold text-white">Calape, Bohol</span>
            </h2>
        </div>

        {{-- Motivational Section --}}
        <div class="text-center max-w-2xl mt-4 px-6 py-4 bg-white/10 rounded-xl shadow-md animate-slide-up">
            <h3 class="text-3xl font-semibold text-white">
                "Every rep counts. Every drop of sweat is progress. Keep pushing!"  
            </h3>
            <p class="text-lg text-gray-200 mt-2 italic">
                No excuses. No limits. Only results. 🏋️‍♂️🔥
            </p>
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

        .animate-fade-in {
            animation: fade-in 1s ease-out;
        }

        .animate-slide-up {
            animation: slide-up 1.2s ease-out;
        }
    </style>
@endsection
