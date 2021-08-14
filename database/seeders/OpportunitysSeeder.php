<?php

namespace Database\Seeders;

use App\Models\OpportunityDetail;
use Illuminate\Database\Seeder;

class OpportunitysSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

//    use HasFactory;

    public function run()
    {
        OpportunitysSeeder::factory()
            ->count(100)
            //            ->hasPosts(1)
            ->create()->each(function ($opportunity){
                $opportunity->detail()->save(factory(OpportunityDetail::class)->make());
            });
//        factory(Opportunity::class, count(100))->create()->each(function ($opportunity){
//            $opportunity->detail()->save(factory(OpportunityDetail::class)->make());
//        });


    }
}
