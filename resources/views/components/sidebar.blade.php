<div class="flex flex-col h-full w-1/4 bg-indigo-600 justify-between items-start p-6 text-gray-100">
    <div class="flex flex-col gap-4 w-full">
        <!-- Brand Name -->
        <a href="{{ route('home') }}" class="text-3xl font-bold mb-3 text-white">BICEPCURL</a>

        <!-- Navigation Links -->
        <a href="{{ route('home') }}"
            class="text-lg transition px-2 py-1 rounded-md {{ request()->routeIs('home') ? 'bg-indigo-800 text-white' : 'hover:text-gray-300' }}">
            Home
        </a>
        @role('admin')
        <a href="{{ route('members.index') }}"
            class="text-lg transition px-2 py-1 rounded-md {{ request()->routeIs('members.index') ? 'bg-indigo-800 text-white' : 'hover:text-gray-300' }}">
            Account List
        </a>
        @endrole

        <a href="{{ route('memberships.index') }}"
        class="text-lg px-3 py-2 rounded-md transition
                {{ request()->routeIs('memberships.index') ? 'bg-indigo-800 text-white' : 'hover:bg-indigo-700 hover:text-white' }}">
            Membership List
        </a>



        <a href="{{ route('subs.index') }}"
            class="text-lg transition px-2 py-1 rounded-md {{ request()->routeIs('subs.index') ? 'bg-indigo-800 text-white' : 'hover:text-gray-300' }}">
            Subscription Registration
        </a>

        <a href="{{ route('details.index') }}"
            class="text-lg transition px-2 py-1 rounded-md {{ request()->routeIs('details.index') ? 'bg-indigo-800 text-white' : 'hover:text-gray-300' }}">
            Subscription Details
        </a>

        @if (auth()->check())
            <!-- Logout Button -->
            <form action="{{ route('logout') }}" method="POST" class="w-full">
                @csrf
                <button type="submit"
                    class="w-full text-left text-lg px-2 py-1 rounded-md transition {{ request()->routeIs('logout') ? 'bg-indigo-800 text-white' : 'hover:text-gray-300' }}">
                    Logout
                </button>
            </form>
        @else
            <a href="{{ route('login') }}"
                class="text-lg transition px-2 py-1 rounded-md {{ request()->routeIs('login') ? 'bg-indigo-800 text-white' : 'hover:text-gray-300' }}">
                Login
            </a>
        @endif
    </div>

    <!-- User Display -->
    <div class="w-full flex justify-center border-t border-gray-300 pt-4">
        <p class="text-lg text-gray-200">{{ auth()->check() ? auth()->user()->name : 'Guest' }}</p>
    </div>
</div>
