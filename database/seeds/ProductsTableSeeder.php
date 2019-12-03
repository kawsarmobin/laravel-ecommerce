<?php

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $p1 = [
            'name' => 'Learn to build websites in HTML5',
            'image' => 'uploads/products/books.png',
            'price' => '5000',
            'description' => 'Some seeding operations may cause you to alter or lose data. In order to protect you from running seeding commands against your production database, you will be prompted for confirmation before the seeders are executed. To force the seeders to run without a prompt, use the --force flag:',
        ];

        $p2 = [
            'name' => 'Learn to build websites in Laravel',
            'image' => 'uploads/products/books.png',
            'price' => '2400',
            'description' => 'Some seeding operations may cause you to alter or lose data. In order to protect you from running seeding commands against your production database, you will be prompted for confirmation before the seeders are executed. To force the seeders to run without a prompt, use the --force flag:',
        ];

        Product::create($p1);
        Product::create($p2);
    }
}
