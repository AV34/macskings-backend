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
//         UserSeeder:factory(10)->create();
//         OpportunitySeeder::factory(100)->create();
//        $this->call(UserSeeder::class);

        $this->call([
            UserSeeder::class,
//            OpportunitySeeder::class,
        ]);
        $this->call([
            OpportunitysSeeder::class,
//            OpportunitySeeder::class,
        ]);
//        $this->call( OpportunitySeeder::class );
////        $this->call( NamedTableSeeder::class );
    }
}
