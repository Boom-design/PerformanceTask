@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <!-- Header -->
    <div class="flex justify-between items-center mb-8">
        <div>
            <h1 class="text-4xl font-bold text-gray-800">Product Inventory</h1>
            <p class="text-gray-600 mt-2">Manage and organize product records efficiently</p>
        </div>
        <a href="{{ route('products.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-lg transition duration-200">
            + Add New Product
        </a>
    </div>

    <!-- Success Message -->
    @if(session('success'))
    <div class="bg-blue-100 border border-blue-400 text-blue-700 px-4 py-3 rounded-lg mb-4" role="alert">
        {{ session('success') }}
    </div>
    @endif

    <!-- Products Table -->
    @if($products->count() > 0)
    <div class="overflow-x-auto shadow-md rounded-lg">
        <table class="min-w-full bg-white">
            <thead class="bg-gray-100 border-b-2 border-gray-200">
                <tr>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Product Name</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Category</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Quantity</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Price</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Date Added</th>
                    <th class="px-6 py-3 text-center text-sm font-semibold text-gray-700">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                <tr class="border-b border-gray-200 hover:bg-gray-50 transition duration-150">
                    <td class="px-6 py-4 text-sm font-medium text-gray-800">{{ $product->name }}</td>
                    <td class="px-6 py-4 text-sm text-gray-600">
                        <span class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-xs font-semibold">
                            {{ $product->category }}
                        </span>
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-600">
                        <span class="font-semibold @if($product->quantity <= 0) text-red-600 @else text-gray-800 @endif">
                            {{ $product->quantity }} {{ $product->quantity == 1 ? 'unit' : 'units' }}
                        </span>
                    </td>
                    <td class="px-6 py-4 text-sm font-semibold text-gray-800">₱{{ number_format($product->price, 2) }}</td>
                    <td class="px-6 py-4 text-sm text-gray-600">{{ $product->date_added->format('M d, Y') }}</td>
                    <td class="px-6 py-4 text-center text-sm">
                        <div class="flex justify-center gap-2">
                            <a href="{{ route('products.show', $product->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded transition duration-200">
                                View
                            </a>
                            <a href="{{ route('products.edit', $product->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded transition duration-200">
                                Edit
                            </a>
                            <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Are you sure?')" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded transition duration-200">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="mt-6">
        {{ $products->links() }}
    </div>
    @else
    <div class="bg-gray-100 border border-gray-300 rounded-lg p-8 text-center">
        <p class="text-gray-700 text-lg mb-4">No products found. Start by adding a new product!</p>
        <a href="{{ route('products.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Add First Product
        </a>
    </div>
    @endif
</div>
@endsection
