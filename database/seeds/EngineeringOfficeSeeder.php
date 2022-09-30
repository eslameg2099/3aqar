<?php

namespace Database\Seeders;

use App\Models\EngineeringOffice;
use Illuminate\Database\Seeder;

class EngineeringOfficeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $EngineeringOffice = EngineeringOffice::factory()->create();

        $EngineeringOffice->addMedia(public_path('images/contractors/01.png'))
            ->preservingOriginal()
            ->toMediaCollection();

        $EngineeringOffice = EngineeringOffice::factory()->create();

        $EngineeringOffice->addMedia(public_path('images/contractors/02.png'))
            ->preservingOriginal()
            ->toMediaCollection();
        //EngineeringOffice::factory()->count(3)->create();
    }
}
