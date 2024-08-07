<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            ['categoryID' => 1, 'name' => 'Beauty and Personal Care'],
            ['categoryID' => 2, 'name' => 'Electronics'],
            ['categoryID' => 3, 'name' => 'Fashion'],
            ['categoryID' => 4, 'name' => 'Furniture'],
            ['categoryID' => 5, 'name' => 'Toys'],
            ['categoryID' => 6, 'name' => 'Household Essentials'],
            ['categoryID' => 7, 'name' => 'Media'],
            ['categoryID' => 8, 'name' => 'Food'],
            ['categoryID' => 9, 'name' => 'Auto And parts'],
            ['categoryID' => 10, 'name' => 'Grocery'],
        ];
        foreach ($categories as $category) {
            DB::table('category')->insert(['categoryID' => $category['categoryID'],'name' => $category['name']]);
        }
    }
}
