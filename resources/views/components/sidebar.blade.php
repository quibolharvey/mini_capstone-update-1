<div class="flex flex-col h-screen w-64 bg-gradient-to-b from-sky-100 to-sky-50 shadow-xl fixed left-0 top-0 p-6 text-gray-900 transition-all duration-300 z-50">
    <!-- Brand Logo and Name -->
    <a href="{{ route('home') }}" class="flex items-center gap-3 text-2xl font-bold text-gray-700 mb-10 hover:text-sky-600 transition-colors">
        <img src="{{ asset('images/logo.png') }}" alt="BicepCurl Logo" class="h-10 w-10">
        BICEPCURL
    </a>

    <!-- Navigation Links -->
    <nav class="flex flex-col gap-2 flex-grow">
        <a href="{{ route('home') }}"
            class="flex items-center gap-3 text-lg px-4 py-3 rounded-xl transition-all 
            {{ request()->routeIs('home') ? 'bg-sky-200 text-sky-800 shadow-md' : 'hover:bg-sky-100 hover:text-sky-700 hover:shadow-sm' }}">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
            </svg>
            Home
        </a>
        
        @role('admin')
        <a href="{{ route('members.index') }}"
            class="flex items-center gap-3 text-lg px-4 py-3 rounded-xl transition-all
            {{ request()->routeIs('members.index') ? 'bg-sky-200 text-sky-800 shadow-md' : 'hover:bg-sky-100 hover:text-sky-700 hover:shadow-sm' }}">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z" />
            </svg>
            Account List
        </a>
        
        <a href="{{ route('memberships.index') }}"
            class="flex items-center gap-3 text-lg px-4 py-3 rounded-xl transition-all
            {{ request()->routeIs('memberships.index') ? 'bg-sky-200 text-sky-800 shadow-md' : 'hover:bg-sky-100 hover:text-sky-700 hover:shadow-sm' }}">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
            </svg>
            Membership List
        </a>
        @endrole
        
        <a href="{{ route('subs.index') }}"
            class="flex items-center gap-3 text-lg px-4 py-3 rounded-xl transition-all
            {{ request()->routeIs('subs.index') ? 'bg-sky-200 text-sky-800 shadow-md' : 'hover:bg-sky-100 hover:text-sky-700 hover:shadow-sm' }}">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M3 17a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm3.293-7.707a1 1 0 011.414 0L9 10.586V3a1 1 0 112 0v7.586l1.293-1.293a1 1 0 111.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" />
            </svg>
            Subscription Registration
        </a>

        <a href="{{ route('details.index') }}"
            class="flex items-center gap-3 text-lg px-4 py-3 rounded-xl transition-all
            {{ request()->routeIs('details.index') ? 'bg-sky-200 text-sky-800 shadow-md' : 'hover:bg-sky-100 hover:text-sky-700 hover:shadow-sm' }}">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2h-1V9z" clip-rule="evenodd" />
            </svg>
            Subscription Details
        </a>
    </nav>

    <!-- User Section -->
    <div class="mt-auto pt-6 border-t border-sky-200">
        @if (auth()->check())
            <div class="flex items-center gap-3 mb-4">
                <div class="h-10 w-10 rounded-full bg-sky-200 flex items-center justify-center text-sky-800 font-bold">
                    {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                </div>
                <div>
                    <p class="font-medium text-gray-800">{{ auth()->user()->name }}</p>
                    <p class="text-xs text-gray-500">{{ auth()->user()->email }}</p>
                </div>
            </div>
            
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit"
                    class="w-full flex items-center gap-2 text-lg px-4 py-3 rounded-xl transition-all hover:bg-red-100 hover:text-red-700">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M3 3a1 1 0 00-1 1v12a1 1 0 102 0V4a1 1 0 00-1-1zm10.293 9.293a1 1 0 001.414 1.414l3-3a1 1 0 000-1.414l-3-3a1 1 0 10-1.414 1.414L14.586 9H7a1 1 0 100 2h7.586l-1.293 1.293z" clip-rule="evenodd" />
                    </svg>
                    Logout
                </button>
            </form>
        @else
            <a href="{{ route('login') }}"
                class="flex items-center gap-2 text-lg px-4 py-3 rounded-xl transition-all hover:bg-sky-100 hover:text-sky-700">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                </svg>
                Login
            </a>
        @endif
    </div>
</div>

<!-- Main Content Offset -->
<div class="ml-64">
    <!-- Your page content goes here -->
</div>