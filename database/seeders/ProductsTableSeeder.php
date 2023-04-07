<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Product;

class ProductsTableSeeder extends Seeder
{
    public function run()
    {
        Product::create([
            'name' => 'Example Product',
            'description' => 'This is an example product',
            'price' => 19.99,
            'image' => 'example.jpg'
        ]);
    }
}

