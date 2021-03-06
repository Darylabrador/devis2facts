<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        $this->call([
            MycompanySeeder::class,
            ProductsSeeder::class,
            UsersSeeder::class
        ]);

        \App\Models\Client::factory(5)->create();

        $now = now()->toDateString();

        for ($i = 1; $i < 6; $i++) {
            DB::table('clientaddresses')->insert([
                'address' => $faker->address,
                'postcode' => 97427,
                'city' => $faker->city,
                'client_id' => $i,
            ]);
        }

        for ($i = 1; $i < 5; $i++) {
            $year = date('Y');
            $month = $faker->month;
            DB::table('devis')->insert([
                'client_id' => $faker->numberBetween(1, 5),
                'filename' => "DE-{$year}-{$month}-{$i}.pdf",
                'tva' => 8.5,
                'date_expiration' => "{$year}-{$month}-" . rand(10, 20),
                'is_accepted' => true,
                'created_at' => "{$year}-{$month}-" . rand(1, 10),
                'tht' => rand(20, 200),
                'ttc' => rand(20, 500),
                'montantTva' => rand(80, 150),
                'is_acompte' => false,
                'remise' => rand(0, 40),
            ]);
        }

        for ($i = 1; $i < 5; $i++) {
            $year = date('Y');
            $month = $faker->month;
            DB::table('facturations')->insert([
                'is_paid' => true,
                'filename' => "FA-{$year}-{$month}-{$i}.pdf",
                'tht' => rand(20, 200),
                'ttc' => rand(20, 500),
                'montantTva' => rand(80, 150),
            ]);
        }

        for ($i = 1; $i < 5; $i++) {
            $year = date('Y');
            $month = $faker->month;
            DB::table('facturations')->insert([
                'is_paid' => false,
                'filename' => "FA-{$year}-{$month}-{$i}.pdf",
                'tht' => rand(20, 200),
                'ttc' => rand(20, 500),
                'montantTva' => rand(80, 150),
            ]);
        }

        for ($i = 1; $i < 5; $i++) {
            DB::table('lignedevis')->insert([
                'devis_id' => $i,
                'product_id' => $faker->numberBetween(1, 5),
                'facturation_id' => $i,
                'description' => "",
                'quantity' => $i,
                'price' => $faker->numberBetween(1, 10),
            ]);
        }

        for ($i = 1; $i < 5; $i++) {
            DB::table('lignedevis')->insert([
                'devis_id' => $i,
                'product_id' => $faker->numberBetween(1, 5),
                'facturation_id' => $i,
                'description' => "Description de test",
                'quantity' => $i,
                'price' => $faker->numberBetween(1, 10),
            ]);
        }

    }
}
