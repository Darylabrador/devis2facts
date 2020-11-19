<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            ClientsSeeder::class,
            ClientaddressesSeeder::class,
            MycompanySeeder::class,
            ProductsSeeder::class,
            DevisSeeder::class

        ]);
    }
}
