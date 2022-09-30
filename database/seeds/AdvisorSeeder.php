<?php

namespace Database\Seeders;
use App\Models\Advisor;

use Illuminate\Database\Seeder;

class AdvisorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Advisor = Advisor::factory()->create();
     

        //
    }
}
