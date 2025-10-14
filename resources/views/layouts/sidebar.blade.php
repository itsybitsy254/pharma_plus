<aside x-data="{ open: false }"
       class="bg-white dark:bg-gray-800 w-64 border-r border-gray-200 dark:border-gray-700 fixed top-0 left-0 h-screen flex flex-col justify-center transition-transform duration-300 z-50"
       :class="{'-translate-x-64 md:translate-x-0': !open}">

    <!-- Sidebar Links -->
    <nav class="space-y-4 text-center">
        <a href="{{ route('dashboard') }}" class="block px-4 py-2 rounded hover:bg-blue-100 dark:hover:bg-gray-700 text-gray-700 dark:text-gray-200">
           🏠 Dashboard
        </a>

        <a href="{{ route('medicines.index') }}" class="block px-4 py-2 rounded hover:bg-blue-100 dark:hover:bg-gray-700 text-gray-700 dark:text-gray-200">
           💊 Medicines
        </a>

        <a href="{{ route('categories.index') }}" class="block px-4 py-2 rounded hover:bg-blue-100 dark:hover:bg-gray-700 text-gray-700 dark:text-gray-200">
           📦 Categories
        </a>

        <a href="{{ route('suppliers.index') }}" class="block px-4 py-2 rounded hover:bg-blue-100 dark:hover:bg-gray-700 text-gray-700 dark:text-gray-200">
           🏭 Suppliers
        </a>

        <a href="{{ route('sales.index') }}" class="block px-4 py-2 rounded hover:bg-blue-100 dark:hover:bg-gray-700 text-gray-700 dark:text-gray-200">
           💰 Sales
        </a>

        <a href="{{ route('stock_alerts.index') }}" class="block px-4 py-2 rounded hover:bg-red-100 dark:hover:bg-gray-700 text-red-700 dark:text-red-300">
           ⚠️ Stock Alerts
        </a>

        <a href="{{ route('audit_logs.index') }}" class="block px-4 py-2 rounded hover:bg-gray-100 dark:hover:bg-gray-700 text-gray-700 dark:text-gray-200">
           🧾 Audit Logs
        </a>

        @if(Auth::user() && Auth::user()->role === 'admin')
            <a href="{{ route('users.index') }}" class="block px-4 py-2 rounded hover:bg-blue-100 dark:hover:bg-gray-700 text-gray-700 dark:text-gray-200">
               👥 Manage Users
            </a>
        @endif
    </nav>
</aside>
