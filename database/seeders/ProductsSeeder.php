<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array = [
            [
                'name' => 'chocolatine',
                'default_price' => 655.0
            ],
            [
                'name' => 'pain au chocolat',
                'default_price' => 0.5
            ],
            [
                'name' => 'renault megane',
                'default_price' => 10862
            ],
            [
                'name' => 'xylophone',
                'default_price' => 10.9
                
            ],
            [
                'name' => 'ordinateur',
                'default_price' => 650.0
            ],

        ];

        DB::table('products')->insert(
            $array
        );
    }
}
