<?php

namespace Database\Seeders;
use App\Models\CategoryArcheticture;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;

class CategoryArchetictureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $CategoryArcheticture = CategoryArcheticture::factory()->create([
            'name:ar'=>  'داخلية',
            'name:ar'=>  'enside',
        ]);
        
        $CategoryArcheticture->addMedia(public_path('images/contractors/01.png'))
            ->preservingOriginal()
            ->toMediaCollection();

        //
    }

   
}
