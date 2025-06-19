<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Get Started - G-20</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body
    class="bg-gradient-to-br from-blue-50 via-white to-blue-100 min-h-screen flex items-center justify-center font-sans">

    <div class="max-w-4xl mx-auto text-center p-10 bg-white shadow-xl rounded-3xl border border-blue-200">

        <!-- G-20 Logo Text -->
        <h1
            class="text-6xl md:text-7xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-indigo-600 mb-4">
            G-20
        </h1>

        <!-- Subheading -->
        <h2 class="text-2xl md:text-3xl font-semibold text-gray-800 mb-4">
            Welcome to the Future
        </h2>

        <p class="text-gray-600 text-lg mb-8">
            Start your journey with us. Explore powerfully designed T-shirt styles designed to elevate your wardrobe.
            Our collection is crafted with the finest materials, ensuring comfort and style for every occasion.
            Whether you're looking for casual wear or something more sophisticated, we have the perfect T-shirt for you
        </p>

        <!-- CTA Button -->
        <a href="{{route('/home')}}"
            class="inline-block px-8 py-3 bg-blue-600 text-white text-lg font-medium rounded-full shadow-md hover:bg-blue-700 transition">
            Get Started
        </a>
    </div>

</body>

</html>