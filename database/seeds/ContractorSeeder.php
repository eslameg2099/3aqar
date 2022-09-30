<?php

namespace Database\Seeders;

use App\Models\Contractor;
use Illuminate\Database\Seeder;

class ContractorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /** @var Contractor $contractor */
        $contractor = Contractor::factory()->create();

        $contractor->addMedia(public_path('images/contractors/01.png'))
            ->preservingOriginal()
            ->toMediaCollection();

        /** @var Contractor $contractor */
        $contractor = Contractor::factory()->create();

        $contractor->addMedia(public_path('images/contractors/02.png'))
            ->preservingOriginal()
            ->toMediaCollection();

        /** @var Contractor $contractor */
        $contractor = Contractor::factory()->create();

        $contractor->addMedia(public_path('images/contractors/03.png'))
            ->preservingOriginal()
            ->toMediaCollection();

        /** @var Contractor $contractor */
        $contractor = Contractor::factory()->create();

        $contractor->addMedia(public_path('images/contractors/04.png'))
            ->preservingOriginal()
            ->toMediaCollection();

        /** @var Contractor $contractor */
        $contractor = Contractor::factory()->create();

        $contractor->addMedia(public_path('images/contractors/05.png'))
            ->preservingOriginal()
            ->toMediaCollection();

        /** @var Contractor $contractor */
        $contractor = Contractor::factory()->create();

        $contractor->addMedia(public_path('images/contractors/06.png'))
            ->preservingOriginal()
            ->toMediaCollection();
    }
}
