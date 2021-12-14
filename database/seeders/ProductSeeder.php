<?php

namespace Database\Seeders;

use App\Models\Product;
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

        Product::factory()
            ->count(10)
            ->create();

//        for ($i = 0; $i < 100; $i++) {
//            DB::table('products')->insert(
//                [
//                    'name' => 'Product name'.$i,
//                    'price' => $i * 100,
//                ]
//            );
//        }
    }
}
