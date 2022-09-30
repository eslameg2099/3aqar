<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\CustomField;
use App\Models\Estate;
use App\Models\Type;
use Illuminate\Database\Seeder;

class EstateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $type = Type::where('type', Type::RENT_TYPE)->first();

        $fields = [];

        foreach ($type->customFields as $customField) {
            if (in_array($customField->type,  CustomField::OPTIONS_TYPES)) {
                $fields[$customField->id] = $customField->options->random()->id;
            } else {
                $fields[$customField->id] = rand(1, 5);
            }
        }

        foreach (City::doesntHave('children')->get() as $city) {
            /** @var Estate $estate */
            $estate = Estate::factory()->create([
                'name' => 'شقة مميزة بمساحة كبيرة',
                'description' => 'شقة مميزة بمساحة كبيرة',
                'type' => Type::RENT_TYPE,
                'type_id' => $type->id,
                'city_id' => $city->id,
            ]);

            $estate->addCustomFields($fields);

            $estate->addMedia(public_path('/images/estates/01.png'))->preservingOriginal()->toMediaCollection();
            $estate->addMedia(public_path('/images/estates/02.png'))->preservingOriginal()->toMediaCollection();
            $estate->addMedia(public_path('/images/estates/03.png'))->preservingOriginal()->toMediaCollection();
            $estate->addMedia(public_path('/images/estates/04.png'))->preservingOriginal()->toMediaCollection();
            $estate->addMedia(public_path('/images/estates/05.png'))->preservingOriginal()->toMediaCollection();
            $estate->addMedia(public_path('/images/estates/06.png'))->preservingOriginal()->toMediaCollection();
            $estate->addMedia(public_path('/images/estates/07.png'))->preservingOriginal()->toMediaCollection();
            $estate->addMedia(public_path('/images/estates/08.png'))->preservingOriginal()->toMediaCollection();
        }
    }
}
