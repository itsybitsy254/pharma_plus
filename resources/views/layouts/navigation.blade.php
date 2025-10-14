<nav class="bg-white dark:bg-gray-800 shadow p-4 flex justify-between items-center">
    <!-- Logo / Title -->
    <h1 class="text-lg md:text-xl font-bold text-gray-800 dark:text-gray-100">
        Pharma<span class="text-blue-600">Plus</span> Dashboard
    </h1>

    <!-- Right Section -->
    <div class="flex items-center gap-4">
        <!-- Role Display -->
        <span class="text-sm text-gray-600 dark:text-gray-300">
            Role: <strong>{{ ucfirst(Auth::user()->role ?? 'Guest') }}</strong>
        </span>

        <!-- Dark Mode Toggle -->
        <button id="darkToggle" 
            class="p-2 rounded-lg bg-gray-200 dark:bg-gray-700 hover:bg-gray-300 dark:hover:bg-gray-600 transition"
            title="Toggle dark mode">
            <svg xmlns="http://www.w3.org/2000/svg" 
                 fill="none" viewBox="0 0 24 24" stroke-width="1.5" 
                 stroke="currentColor" 
                 class="w-5 h-5 text-gray-800 dark:text-gray-100">
                <path stroke-linecap="round" stroke-linejoin="round" 
                      d="M12 3v1.5m0 15V21m9-9h-1.5M4.5 12H3m15.364-7.364l-1.06 1.06M6.696 17.304l-1.06 1.06m0-12.728l1.06 1.06m11.608 11.608l1.06 1.06M12 6a6 6 0 100 12 6 6 0 000-12z" />
            </svg>
        </button>

        <!-- Logout -->
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button 
                type="submit"
                class="text-red-600 dark:text-red-400 hover:text-red-800 dark:hover:text-red-300 font-medium">
                Logout
            </button>
        </form>
    </div>
</nav>
