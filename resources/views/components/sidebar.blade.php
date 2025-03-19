<div class="flex flex-row h-35 w-full bg-sky-100 justify-between items-center px-6 text-gray-900">
    <!-- Brand Logo and Name -->
    <a href="{{ route('home') }}" class="flex items-center gap-2 text-3xl font-bold text-gray-700">
        <img src="{{ asset('images/logo.png') }}" alt="BicepCurl Logo" class="h-10 w-10"> 
        BICEPCURL
    </a>

    <!-- Navigation Links -->
    <div class="hidden md:flex gap-6">
        <a href="{{ route('home') }}"
            class="text-lg transition px-3 py-2 rounded-md {{ request()->routeIs('home') ? 'bg-sky-200 text-gray-900' : 'hover:bg-sky-200 hover:text-blue-900' }}">
            Home
        </a>
        @role('admin')
        <a href="{{ route('members.index') }}"
            class="text-lg transition px-3 py-2 rounded-md {{ request()->routeIs('members.index') ? 'bg-sky-200 text-gray-900' : 'hover:bg-sky-200 hover:text-blue-900'  }}">
            Account List
        </a>
        @endrole

        <a href="{{ route('memberships.index') }}"
            class="text-lg px-3 py-2 rounded-md transition {{ request()->routeIs('memberships.index') ? 'bg-sky-200 text-gray-900' : 'hover:bg-sky-200 hover:text-blue-900'  }}">
            Membership List
        </a>

        <a href="{{ route('subs.index') }}"
            class="text-lg transition px-3 py-2 rounded-md {{ request()->routeIs('subs.index') ? 'bg-sky-200 text-gray-900' : 'hover:bg-sky-200 hover:text-blue-900'  }}">
            Subscription Registration
        </a>

        <a href="{{ route('details.index') }}"
            class="text-lg transition px-3 py-2 rounded-md {{ request()->routeIs('details.index') ? 'bg-sky-200 text-gray-900' : 'hover:bg-sky-200 hover:text-blue-900'  }}">
            Subscription Details
        </a>
    </div>

    <!-- Authentication Links -->
    <div class="flex items-center gap-4">
        @if (auth()->check())
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit"
                    class="text-lg px-3 py-2 rounded-md transition {{ request()->routeIs('logout') ? 'bg-sky-200 text-gray-900' : 'hover:bg-sky-200 hover:text-blue-900'  }}">
                    Logout
                </button>
            </form>
        @else
            <a href="{{ route('login') }}"
                class="text-lg transition px-3 py-2 rounded-md {{ request()->routeIs('login') ? 'bg-sky-200 text-gray-900' : 'hover:bg-sky-200 hover:text-blue-900'  }}">
                Login
            </a>
        @endif

        <!-- User Display -->
        <p class="text-lg text-gray-900 hidden sm:block">{{ auth()->check() ? auth()->user()->name : 'Guest' }}</p>
    </div>
</div>
