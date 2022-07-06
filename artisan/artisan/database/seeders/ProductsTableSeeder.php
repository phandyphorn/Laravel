<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = [
            ['name'=>'Banana', 'price'=>2000],
            ['name'=>'Mango', 'price'=>2000],
            ['name'=>'Coconut', 'price'=>2000],
            ['name'=>'Beer', 'price'=>2000],
            ['name'=>'Rice', 'price'=>2000],
            ['name'=>'Food', 'price'=>2000]
        ];
        foreach ($products as $product){
            Product::create($product);
        }
    }
}
