<?php

namespace Database\Seeders;

use App\Models\CustomField;
use App\Models\Type;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        require __DIR__.'/rent.php';

        require __DIR__.'/selling.php';
    }
}
