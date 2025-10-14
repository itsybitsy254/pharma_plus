<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PharmaPlus</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-50 text-gray-800 font-sans">

    <!-- Navbar -->
    <nav class="bg-white shadow-md fixed w-full top-0 left-0 z-50">
        <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
            <h1 class="text-2xl font-bold text-blue-600">Pharma<span class="text-green-600">Plus</span></h1>
            <div class="space-x-6 hidden md:flex">
                <a href="#about" class="hover:text-blue-600 transition">About</a>
                <a href="#services" class="hover:text-blue-600 transition">Services</a>
                <a href="#contact" class="hover:text-blue-600 transition">Contact</a>
                <a href="{{ route('login') }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">Login</a>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="pt-32 pb-20 bg-gradient-to-r from-blue-50 via-white to-green-50">
        <div class="max-w-7xl mx-auto px-6 flex flex-col md:flex-row items-center">
            <div class="md:w-1/2">
                <h2 class="text-4xl md:text-5xl font-extrabold mb-6 leading-tight">
                    Your Trusted Partner in <span class="text-blue-600">Health & Wellness</span>
                </h2>
                <p class="text-lg mb-8 text-gray-600">
                    Welcome to PharmaPlus — the smarter way to manage your pharmacy, track medicine sales, and ensure better patient care.
                </p>
                <a href="{{ route('register') }}" class="bg-green-600 text-white px-6 py-3 rounded-lg hover:bg-green-700 transition">
                    Get Started
                </a>
            </div>
            <div class="md:w-1/2 mt-10 md:mt-0">
                <img src="https://cdn-icons-png.flaticon.com/512/2966/2966484.png" alt="Pharmacy Illustration" class="w-full max-w-md mx-auto">
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="py-20 bg-white">
        <div class="max-w-6xl mx-auto px-6 text-center">
            <h3 class="text-3xl font-bold mb-6">About PharmaPlus</h3>
            <p class="text-gray-600 max-w-3xl mx-auto">
                PharmaPlus is a digital pharmacy solution designed to streamline inventory, monitor sales, and improve accessibility to essential medicines.  
                Manage your entire pharmacy operation from one intuitive dashboard.
            </p>
        </div>
    </section>

    <!-- Services Section -->
    <section id="services" class="py-20 bg-gray-100">
        <div class="max-w-6xl mx-auto px-6 text-center">
            <h3 class="text-3xl font-bold mb-12">Our Services</h3>
            <div class="grid md:grid-cols-3 gap-10">
                <div class="bg-white p-8 rounded-2xl shadow hover:shadow-lg transition">
                    <img src="https://cdn-icons-png.flaticon.com/512/2877/2877144.png" class="w-16 mx-auto mb-4">
                    <h4 class="text-xl font-semibold mb-2">Medicine Management</h4>
                    <p class="text-gray-600">Easily track medicine stock, expiry dates, and suppliers in one place.</p>
                </div>
                <div class="bg-white p-8 rounded-2xl shadow hover:shadow-lg transition">
                    <img src="https://cdn-icons-png.flaticon.com/512/4359/4359782.png" class="w-16 mx-auto mb-4">
                    <h4 class="text-xl font-semibold mb-2">Sales Monitoring</h4>
                    <p class="text-gray-600">Get real-time insights into your pharmacy’s sales and performance metrics.</p>
                </div>
                <div class="bg-white p-8 rounded-2xl shadow hover:shadow-lg transition">
                    <img src="https://cdn-icons-png.flaticon.com/512/3183/3183463.png" class="w-16 mx-auto mb-4">
                    <h4 class="text-xl font-semibold mb-2">Customer Support</h4>
                    <p class="text-gray-600">Provide reliable service and personalized care for your customers.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer id="contact" class="bg-blue-600 text-white py-8 text-center">
        <h4 class="text-xl font-bold mb-2">PharmaPlus</h4>
        <p class="text-gray-200 mb-4">Empowering Pharmacies. Enhancing Healthcare.</p>
        <p class="text-sm text-gray-300">&copy; {{ date('Y') }} PharmaPlus. All Rights Reserved.</p>
    </footer>

</body>
</html>
