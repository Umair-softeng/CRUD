<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = [
            ['productID' => 1,'categoryID' => 1, 'name' => 'Face Wash', 'price' => 100],
            ['productID' => 2,'categoryID' => 2, 'name' => 'Samsung LED', 'price' => 200],
            ['productID' => 3,'categoryID' => 3, 'name' => 'Shirts', 'price' => 300],
            ['productID' => 4,'categoryID' => 4, 'name' => 'Cupboard', 'price' => 400],
            ['productID' => 5,'categoryID' => 5, 'name' => 'Doll', 'price' => 500],
            ['productID' => 6,'categoryID' => 6, 'name' => 'MicroWave', 'price' => 600],
            ['productID' => 7,'categoryID' => 7, 'name' => 'Speakers', 'price' => 700],
            ['productID' => 8,'categoryID' => 8, 'name' => 'Burger', 'price' => 800],
            ['productID' => 9,'categoryID' => 9, 'name' => 'Mirrors', 'price' => 900],
            ['productID' => 10,'categoryID' => 10, 'name' => 'Milk', 'price' => 1000],
        ];
        foreach ($products as $product) {
            DB::table('product')->insert(['productID' => $product['productID'],'categoryID' => $product['categoryID'], 'name' => $product['name'], 'price' => $product['price']]);
        }
    }
}
