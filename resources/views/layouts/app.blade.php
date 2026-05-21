<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Inventory Management System</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50">
    <!-- Navigation Bar -->
    <nav class="bg-white shadow-md">
        <div class="container mx-auto px-4 py-4">
            <div class="flex justify-between items-center">
                <div class="flex items-center">
                    <a href="{{ route('products.index') }}" class="text-2xl font-bold text-blue-600">
                        📦 Inventory Pro
                    </a>
                    <span class="text-gray-600 text-sm ml-2">Product Management System</span>
                </div>
                <div class="flex gap-6">
                    <a href="{{ route('products.index') }}" class="text-gray-700 hover:text-blue-600 font-semibold transition duration-200">
                        Dashboard
                    </a>
                    <a href="{{ route('products.create') }}" class="text-gray-700 hover:text-blue-600 font-semibold transition duration-200">
                        Add Product
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 text-gray-300 mt-12">
        <div class="container mx-auto px-4 py-8">
            <div class="grid grid-cols-3 gap-8 mb-8">
                <div>
                    <h3 class="text-white font-bold mb-4">About System</h3>
                    <p class="text-sm">A simple yet powerful Product Inventory Management System built with Laravel Framework.</p>
                </div>
                <div>
                    <h3 class="text-white font-bold mb-4">Features</h3>
                    <ul class="text-sm space-y-2">
                        <li>✓ Create Products</li>
                        <li>✓ Read Product Details</li>
                        <li>✓ Update Information</li>
                        <li>✓ Delete Records</li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-white font-bold mb-4">Database</h3>
                    <ul class="text-sm space-y-2">
                        <li>✓ Proper Migrations</li>
                        <li>✓ Normalized Tables</li>
                        <li>✓ Data Validation</li>
                        <li>✓ Error Handling</li>
                    </ul>
                </div>
            </div>
            <hr class="border-gray-700 mb-4">
            <div class="text-center text-sm">
                <p>&copy; 2026 Product Inventory Management System. All rights reserved.</p>
            </div>
        </div>
    </footer>
</body>
</html>
