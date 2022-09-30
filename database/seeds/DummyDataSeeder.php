<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DummyDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(SettingSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(FeedbackSeeder::class);
        $this->call(CitySeeder::class);
        $this->call(TypeSeeder::class);
        $this->call(EstateSeeder::class);
        $this->call(ContractorSeeder::class);
        $this->call(OrderSeeder::class);
        $this->call(EngineeringOfficeSeeder::class);
       // $this->call(CategoryArchetictureSeeder::class);
        $this->call(ExpertSeeder::class);

        

        
        /*  The seeders of generated crud will set here: Don't remove this line  */
    }
}
