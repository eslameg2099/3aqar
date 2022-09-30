<?php

namespace Database\Factories;

use App\Models\AccountBank;
use Illuminate\Database\Eloquent\Factories\Factory;

class AccountBankFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = AccountBank::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [

            'titele'=> "حساب عمولة التطبيق يكون واحد من المئة من اجمالي المبيعات",
            'description' => "برجاء ارسال قيمة عمولة التطبيق علي الحساب البنك التالي وارفاق صورة التحويل ",
            'name_account' => "حساب تطبيق خبير",
            'num_account' => "12356595",
            'num_iban' =>"84784695952695956",

            //
        ];
    }
}
