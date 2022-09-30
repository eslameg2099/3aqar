<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Archeticture;
use Illuminate\Support\Arr;

class ArchetictureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Archeticture = Archeticture::factory()->create();

        $Archeticture->addMedia(public_path('images/contractors/01.png'))
            ->preservingOriginal()
            ->toMediaCollection();
            $Archeticture->addMedia(public_path('images/contractors/01.png'))
            ->preservingOriginal()
            ->toMediaCollection();
            $Archeticture->addMedia(public_path('images/contractors/01.png'))
            ->preservingOriginal()
            ->toMediaCollection();

            $Archeticture = Archeticture::factory()->create();

            $Archeticture->addMedia(public_path('images/contractors/01.png'))
                ->preservingOriginal()
                ->toMediaCollection();
                $Archeticture->addMedia(public_path('images/contractors/01.png'))
                ->preservingOriginal()
                ->toMediaCollection();
                $Archeticture->addMedia(public_path('images/contractors/01.png'))
                ->preservingOriginal()
                ->toMediaCollection();


                $Archeticture = Archeticture::factory()->create();

                $Archeticture->addMedia(public_path('images/contractors/01.png'))
                    ->preservingOriginal()
                    ->toMediaCollection();
                    $Archeticture->addMedia(public_path('images/contractors/01.png'))
                    ->preservingOriginal()
                    ->toMediaCollection();
                    $Archeticture->addMedia(public_path('images/contractors/01.png'))
                    ->preservingOriginal()
                    ->toMediaCollection();
        //
    }
}
