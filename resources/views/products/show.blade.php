@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-2xl mx-auto">
        <!-- Header -->
        <div class="mb-8">
            <h1 class="text-4xl font-bold text-gray-800">Product Details</h1>
            <p class="text-gray-600 mt-2">View detailed information about the product</p>
        </div>

        <!-- Product Card -->
        <div class="bg-white shadow-lg rounded-lg overflow-hidden">
            <!-- Product Header -->
            <div class="bg-gradient-to-r from-blue-500 to-blue-700 text-white p-8">
                <h2 class="text-3xl font-bold">{{ $product->name }}</h2>
                <p class="text-blue-100 mt-2">ID: #{{ $product->id }}</p>
            </div>

            <!-- Product Information -->
            <div class="p-8">
                <!-- Category -->
                <div class="mb-6">
                    <label class="block text-sm font-semibold text-gray-500 mb-2">CATEGORY</label>
                    <p class="text-xl text-gray-800">
                        <span class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-sm font-semibold">
                            {{ $product->category }}
                        </span>
                    </p>
                </div>

                <!-- Quantity -->
                <div class="mb-6">
                    <label class="block text-sm font-semibold text-gray-500 mb-2">QUANTITY IN STOCK</label>
                    <p class="text-2xl font-bold @if($product->quantity <= 0) text-red-600 @else text-gray-800 @endif">
                        {{ $product->quantity }} {{ $product->quantity == 1 ? 'unit' : 'units' }}
                    </p>
                    @if($product->quantity <= 0)
                    <p class="text-red-600 text-sm mt-1">🔴 Out of stock</p>
                    @elseif($product->quantity <= 5)
                    <p class="text-red-600 text-sm mt-1">⚠️ Low stock</p>
                    @endif
                </div>

                <!-- Price -->
                <div class="mb-6">
                    <label class="block text-sm font-semibold text-gray-500 mb-2">UNIT PRICE</label>
                    <p class="text-2xl font-bold text-gray-800">₱{{ number_format($product->price, 2) }}</p>
                </div>

                <!-- Total Value -->
                <div class="mb-6 p-4 bg-blue-50 border-2 border-blue-300 rounded-lg">
                    <label class="block text-sm font-semibold text-gray-600 mb-1">TOTAL INVENTORY VALUE</label>
                    <p class="text-2xl font-bold text-blue-600">₱{{ number_format($product->price * $product->quantity, 2) }}</p>
                </div>

                <!-- Date Added -->
                <div class="mb-8">
                    <label class="block text-sm font-semibold text-gray-500 mb-2">DATE ADDED</label>
                    <p class="text-gray-800">{{ $product->date_added->format('F d, Y') }} ({{ $product->date_added->diffForHumans() }})</p>
                </div>

                <!-- Timestamps -->
                <div class="grid grid-cols-2 gap-4 p-4 bg-gray-50 rounded-lg text-sm text-gray-600">
                    <div>
                        <span class="font-semibold">Created:</span> {{ $product->created_at->format('M d, Y H:i') }}
                    </div>
                    <div>
                        <span class="font-semibold">Last Updated:</span> {{ $product->updated_at->format('M d, Y H:i') }}
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="mt-8 flex gap-4">
                    <a href="{{ route('products.edit', $product->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-lg transition duration-200 flex-1 text-center">
                        Edit Product
                    </a>
                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline; flex: 1;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Are you sure you want to delete this product?')" class="w-full bg-red-500 hover:bg-red-700 text-white font-bold py-3 px-6 rounded-lg transition duration-200">
                            Delete Product
                        </button>
                    </form>
                    <a href="{{ route('products.index') }}" class="bg-gray-600 hover:bg-gray-700 text-white font-bold py-3 px-6 rounded-lg transition duration-200 flex-1 text-center">
                        Back to List
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
