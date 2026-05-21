<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'name' => 'Wireless Headphones',
            'category' => 'Electronics',
            'quantity' => 25,
            'price' => 2499.99,
            'date_added' => now()->subDays(30),
        ]);

        Product::create([
            'name' => 'USB-C Cable',
            'category' => 'Electronics',
            'quantity' => 150,
            'price' => 299.99,
            'date_added' => now()->subDays(15),
        ]);

        Product::create([
            'name' => 'Smartphone Screen Protector',
            'category' => 'Accessories',
            'quantity' => 80,
            'price' => 199.99,
            'date_added' => now()->subDays(20),
        ]);

        Product::create([
            'name' => 'Laptop Stand',
            'category' => 'Office Supplies',
            'quantity' => 45,
            'price' => 1299.99,
            'date_added' => now()->subDays(10),
        ]);

        Product::create([
            'name' => 'Mechanical Keyboard',
            'category' => 'Electronics',
            'quantity' => 12,
            'price' => 3999.99,
            'date_added' => now()->subDays(5),
        ]);

        Product::create([
            'name' => 'Ergonomic Mouse',
            'category' => 'Electronics',
            'quantity' => 60,
            'price' => 1899.99,
            'date_added' => now()->subDays(25),
        ]);

        Product::create([
            'name' => 'Monitor Arm Mount',
            'category' => 'Office Supplies',
            'quantity' => 30,
            'price' => 2299.99,
            'date_added' => now()->subDays(12),
        ]);

        Product::create([
            'name' => 'USB Hub (4-Port)',
            'category' => 'Electronics',
            'quantity' => 2,
            'price' => 899.99,
            'date_added' => now()->subDays(8),
        ]);
    }
}
