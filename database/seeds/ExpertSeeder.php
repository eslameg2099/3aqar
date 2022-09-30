<?php

namespace Database\Seeders;
use App\Models\Expert;

use Illuminate\Database\Seeder;

class ExpertSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $Expert = Expert::factory()->create();

         $Expert->addMedia(public_path('images/contractors/01.png'))
             ->preservingOriginal()
             ->toMediaCollection();
 
         $Expert = Expert::factory()->create();
 
         $Expert->addMedia(public_path('images/contractors/02.png'))
             ->preservingOriginal()
             ->toMediaCollection();
 
         $Expert= Expert::factory()->create();
 
         $Expert->addMedia(public_path('images/contractors/03.png'))
             ->preservingOriginal()
             ->toMediaCollection();
 
         $Expert = Expert::factory()->create();
 
         $Expert->addMedia(public_path('images/contractors/04.png'))
             ->preservingOriginal()
             ->toMediaCollection();
 
         $Expert = Expert::factory()->create();
 
         $Expert->addMedia(public_path('images/contractors/05.png'))
             ->preservingOriginal()
             ->toMediaCollection();
 
         $Expert = Expert::factory()->create();
 
         $Expert->addMedia(public_path('images/contractors/06.png'))
             ->preservingOriginal()
             ->toMediaCollection();
        //
    }
}
