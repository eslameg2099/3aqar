<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->seed($this->cities());
    }

    /**
     * Seed the cities and areas.
     *
     * @param array $cities
     * @param mixed $parent
     * @return void
     */
    public function seed($cities = [], $parent = null)
    {
        foreach ($cities as $city) {
            $data = array_merge(
                Arr::except($city, 'children'),
                [
                    'parent_id' => $parent,
                ]
            );

            $model = City::factory()->create($data);

            if (isset($city['children'])) {
                $this->seed($city['children'], $model);
            }
        }
    }

    /**
     * @return \string[][]
     */
    public function cities(): array
    {
        return [
            [
                'name:ar' => 'الرياض',
                'name:en' => 'Ar Riyad',
                'children' => [
                    [
                        'name:ar' => 'الفلاح',
                        'name:en' => 'alfalah',
                        'children' => [
                            [
                                'name:ar' => 'شارع المذنب',
                                'name:en' => 'almudhanab street',
                            ],
                            [
                                'name:ar' => 'شارع البركة',
                                'name:en' => 'albaraka street',
                            ],
                            [
                                'name:ar' => 'شارع الشيخ عبد الله المخضوب',
                                'name:en' => 'alshaykh eabd allah almakhdub street',
                            ],
                            [
                                'name:ar' => 'شارع الميزان',
                                'name:en' => 'almizan street',
                            ],
                            [
                                'name:ar' => 'شارع الخطابة',
                                'name:en' => 'alkhataba street',
                            ],
                            [
                                'name:ar' => 'شارع عجمان',
                                'name:en' => 'eajman street',
                            ],
                            [
                                'name:ar' => 'شارع محمد بن أحمد الربعي',
                                'name:en' => 'muhamad bin \'ahmad alrabei street',
                            ],
                            [
                                'name:ar' => 'شارع طنجة',
                                'name:en' => 'tanja street',
                            ],
                            [
                                'name:ar' => 'شارع محمد النباهي',
                                'name:en' => 'muhamad alnabahi street',
                            ],
                            [
                                'name:ar' => 'شارع محمد بن المحدث',
                                'name:en' => 'muhamad bin almuhdith street',
                            ],
                        ],
                    ],
                    [
                        'name:ar' => 'الروضة',
                        'name:en' => 'alrawda',
                    ],
                    [
                        'name:ar' => 'النسيم',
                        'name:en' => 'alnasim',
                    ],
                    [
                        'name:ar' => 'النظيم',
                        'name:en' => 'alnazim',
                    ],
                    [
                        'name:ar' => 'السلي',
                        'name:en' => 'alsuli',
                    ],
                    [
                        'name:ar' => 'القدس',
                        'name:en' => 'alquds',
                    ],
                    [
                        'name:ar' => 'الحمراء',
                        'name:en' => 'alhamraa',
                    ],
                    [
                        'name:ar' => 'غرناطة',
                        'name:en' => 'gharnata',
                    ],
                    [
                        'name:ar' => 'النهضة',
                        'name:en' => 'alnahda',
                    ],
                    [
                        'name:ar' => 'الخليج',
                        'name:en' => 'alkhalij',
                    ],
                    [
                        'name:ar' => 'المغرزات',
                        'name:en' => 'almaghrizat',
                    ],
                    [
                        'name:ar' => 'الجزيرة',
                        'name:en' => 'aljazira',
                    ],
                    [
                        'name:ar' => 'الرواد',
                        'name:en' => 'alruwaad',
                    ],
                    [
                        'name:ar' => 'الربوة',
                        'name:en' => 'alrabwa',
                    ],
                    [
                        'name:ar' => 'إشبيليا',
                        'name:en' => 'iishbilya',
                    ],
                    [
                        'name:ar' => 'اليرموك',
                        'name:en' => 'alyarmuk',
                    ],
                    [
                        'name:ar' => 'قرطبة',
                        'name:en' => 'qurtuba',
                    ],
                    [
                        'name:ar' => 'الريان',
                        'name:en' => 'alrayaan',
                    ],
                    [
                        'name:ar' => 'أشبيليه',
                        'name:en' => 'ashbilih',
                    ],
                    [
                        'name:ar' => 'الشهداء',
                        'name:en' => 'alshuhada',
                    ],
                ],
            ],
            [
                'name:ar' => 'عسير',
                'name:en' => 'Asir',
            ],
            [
                'name:ar' => 'وايل',
                'name:en' => 'Hai\'l',
            ],
            [
                'name:ar' => 'الحدود الشمالية',
                'name:en' => 'Northern Borders',
            ],
            [
                'name:ar' => 'نجران',
                'name:en' => 'Najran',
            ],
            [
                'name:ar' => 'جازان',
                'name:en' => 'Jizan',
            ],
            [
                'name:ar' => 'تبوك',
                'name:en' => 'Tabuk',
            ],
            [
                'name:ar' => 'الباحة',
                'name:en' => 'Al Bahah',
            ],
            [
                'name:ar' => 'الجوف',
                'name:en' => 'Al Jawf',
            ],
            [
                'name:ar' => 'المدينة المنورة',
                'name:en' => 'Al Madinah al Munawwarah',
            ],
            [
                'name:ar' => 'المنطقة الشرقية',
                'name:en' => 'Eastern Province',
            ],
            [
                'name:ar' => 'القصيم',
                'name:en' => 'Al-Qassim',
            ],
        ];
    }
}

