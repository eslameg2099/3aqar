<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\City;
use App\Models\Customer;
use App\Models\OfficeOwner;
use App\Models\Supervisor;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->command->call('media-library:clean');

        City::factory([
            'name:ar' => 'مكه',
            'name:en' => 'Makkah',
        ])->create();

        $this->call(RolesAndPermissionsSeeder::class);

        $admin = Admin::factory()->createOne([
            'name' => 'Admin',
            'email' => 'admin@demo.com',
            'phone' => '111111111',
        ]);

        /** @var Supervisor $supervisor */
        $supervisor = Supervisor::factory()->createOne([
            'name' => 'Supervisor',
            'email' => 'supervisor@demo.com',
            'phone' => '222222222',
        ]);
        $supervisor->givePermissionTo([
            'manage.customers',
            'manage.feedback',
        ]);

        $customer = Customer::factory()->createOne([
            'name' => 'Customer',
            'email' => 'customer@demo.com',
            'phone' => '333333333',
        ]);

        $officeOwner = OfficeOwner::factory()->createOne([
            'name' => 'Office Owner',
            'email' => 'office-owner@demo.com',
            'phone' => '444444444',
        ]);

        $this->call([
            DummyDataSeeder::class,
        ]);

        $this->command->table(['ID', 'Name', 'Email', 'Phone', 'Password', 'Type', 'Type Code'], [
            [$admin->id, $admin->name, $admin->email, $admin->phone, 'password', 'Admin', $admin->type],
            [
                $supervisor->id,
                $supervisor->name,
                $supervisor->email,
                $supervisor->phone,
                'password',
                'Supervisor',
                $supervisor->type,
            ],
            [
                $customer->id,
                $customer->name,
                $customer->email,
                $customer->phone,
                'password',
                'Customer',
                $customer->type,
            ],
            [
                $officeOwner->id,
                $officeOwner->name,
                $officeOwner->email,
                $officeOwner->phone,
                'password',
                'Office Owner',
                $officeOwner->type,
            ],
        ]);
    }
}
