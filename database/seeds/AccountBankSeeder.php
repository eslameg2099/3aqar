<?php

namespace Database\Seeders;
use App\Models\AccountBank;

use Illuminate\Database\Seeder;

class AccountBankSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $AccountBank = AccountBank::factory()->create();
        $AccountBank->addMedia(public_path('images/AccountBank/123.png'))
            ->preservingOriginal()
            ->toMediaCollection();
            
        //
    }
}
