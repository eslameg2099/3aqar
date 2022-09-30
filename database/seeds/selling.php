<?php
// Selling
/** @var \App\Models\Type $type */

use App\Models\CustomField;
use App\Models\Type;

$type = Type::factory(['name' => 'شقة', 'type' => Type::SELLING_TYPE])->create();
/** @var \App\Models\CustomField $field */
$field = $type->customFields()->create(['name' => 'الوجهة', 'type' => CustomField::BUTTONS_TYPE, 'required' => true]);
$field->options()->createMany([
    ['name' => 'شمال'],
    ['name' => 'شرق'],
    ['name' => 'غرب'],
    ['name' => 'جنوب'],
    ['name' => 'شمال شرقي'],
    ['name' => 'جنوب شرقي'],
    ['name' => 'شمال غربي'],
    ['name' => 'جنوب غربي'],
]);
$type->customFields()->create(['name' => 'عرض الشارع', 'type' => CustomField::NUMBER_TYPE, 'required' => true]);
$type->customFields()->create(['name' => 'عدد الصالات', 'type' => CustomField::NUMBER_TYPE, 'required' => true]);
$type->customFields()->create(['name' => 'عدد دورات  المياه', 'type' => CustomField::NUMBER_TYPE, 'required' => true]);
$type->customFields()->create(['name' => 'عدد الغرف', 'type' => CustomField::NUMBER_TYPE, 'required' => true]);
$type->customFields()->create(['name' => 'عدد الدور', 'type' => CustomField::NUMBER_TYPE, 'required' => true]);
$type->customFields()->create(['name' => 'عمر العقار', 'type' => CustomField::NUMBER_TYPE, 'required' => true]);
$type->customFields()->create(['name' => 'مؤثثة', 'type' => CustomField::SWITCH_TYPE, 'required' => false]);
$type->customFields()->create(['name' => 'مطبخ', 'type' => CustomField::SWITCH_TYPE, 'required' => false]);
$type->customFields()->create(['name' => 'مدخل سيارة', 'type' => CustomField::SWITCH_TYPE, 'required' => false]);
$type->customFields()->create(['name' => 'مصعد', 'type' => CustomField::SWITCH_TYPE, 'required' => false]);

$type = Type::factory(['name' => 'فيلا', 'type' => Type::SELLING_TYPE])->create();
$field = $type->customFields()->create(['name' => 'الوجهة', 'type' => CustomField::BUTTONS_TYPE, 'required' => true]);
$field->options()->createMany([
    ['name' => 'شمال'],
    ['name' => 'شرق'],
    ['name' => 'غرب'],
    ['name' => 'جنوب'],
    ['name' => 'شمال شرقي'],
    ['name' => 'جنوب شرقي'],
    ['name' => 'شمال غربي'],
    ['name' => 'جنوب غربي'],
]);
$type->customFields()->create(['name' => 'عدد الصالات', 'type' => CustomField::NUMBER_TYPE, 'required' => true]);
$type->customFields()->create(['name' => 'عدد دورات  المياه', 'type' => CustomField::NUMBER_TYPE, 'required' => true]);
$type->customFields()->create(['name' => 'عدد الغرف', 'type' => CustomField::NUMBER_TYPE, 'required' => true]);
$type->customFields()->create(['name' => 'عدد الشقق', 'type' => CustomField::NUMBER_TYPE, 'required' => true]);
$type->customFields()->create(['name' => 'عمر العقار', 'type' => CustomField::NUMBER_TYPE, 'required' => true]);
$type->customFields()->create(['name' => 'عرض الشارع', 'type' => CustomField::NUMBER_TYPE, 'required' => true]);
$type->customFields()->create(['name' => 'مؤثثة', 'type' => CustomField::SWITCH_TYPE, 'required' => false]);
$type->customFields()->create(['name' => 'مطبخ', 'type' => CustomField::SWITCH_TYPE, 'required' => false]);
$type->customFields()->create(['name' => 'ملحق', 'type' => CustomField::SWITCH_TYPE, 'required' => false]);
$type->customFields()->create(['name' => 'مدخل سيارة', 'type' => CustomField::SWITCH_TYPE, 'required' => false]);
$type->customFields()->create(['name' => 'مصعد', 'type' => CustomField::SWITCH_TYPE, 'required' => false]);
$type->customFields()->create(['name' => 'غرفة السائق', 'type' => CustomField::SWITCH_TYPE, 'required' => false]);
$type->customFields()->create(['name' => 'غرفة خدم', 'type' => CustomField::SWITCH_TYPE, 'required' => false]);
$type->customFields()->create(['name' => 'مسبح', 'type' => CustomField::SWITCH_TYPE, 'required' => false]);
$type->customFields()->create(['name' => 'بيت شعر', 'type' => CustomField::SWITCH_TYPE, 'required' => false]);
$type->customFields()->create(['name' => 'حوش', 'type' => CustomField::SWITCH_TYPE, 'required' => false]);
$type->customFields()->create(['name' => 'قبو', 'type' => CustomField::SWITCH_TYPE, 'required' => false]);
$type->customFields()->create(['name' => 'درج صالة', 'type' => CustomField::SWITCH_TYPE, 'required' => false]);

$type = Type::factory(['name' => 'عمارة', 'type' => Type::SELLING_TYPE])->create();
$field = $type->customFields()->create(['name' => 'الوجهة', 'type' => CustomField::BUTTONS_TYPE, 'required' => true]);
$field->options()->createMany([
    ['name' => 'شمال'],
    ['name' => 'شرق'],
    ['name' => 'غرب'],
    ['name' => 'جنوب'],
    ['name' => 'شمال شرقي'],
    ['name' => 'جنوب شرقي'],
    ['name' => 'شمال غربي'],
    ['name' => 'جنوب غربي'],
]);
$field = $type->customFields()->create(['name' => 'نوع العمارة', 'type' => CustomField::BUTTONS_TYPE, 'required' => true]);
$field->options()->createMany([
    ['name' => 'سكني'],
    ['name' => 'تجاري'],
    ['name' => 'سكني / تجاري'],
]);
$type->customFields()->create(['name' => 'عرض الشارع', 'type' => CustomField::NUMBER_TYPE, 'required' => true]);
$type->customFields()->create(['name' => 'عدد الشقق', 'type' => CustomField::NUMBER_TYPE, 'required' => true]);
$type->customFields()->create(['name' => 'عدد المحلات', 'type' => CustomField::NUMBER_TYPE, 'required' => true]);
$type->customFields()->create(['name' => 'عدد الغرف', 'type' => CustomField::NUMBER_TYPE, 'required' => true]);
$type->customFields()->create(['name' => 'عمر العقار', 'type' => CustomField::NUMBER_TYPE, 'required' => true]);
$type->customFields()->create(['name' => 'مؤثثة', 'type' => CustomField::SWITCH_TYPE, 'required' => false]);

$type = Type::factory(['name' => 'ارض', 'type' => Type::SELLING_TYPE])->create();
$field = $type->customFields()->create(['name' => 'الوجهة', 'type' => CustomField::BUTTONS_TYPE, 'required' => true]);
$field->options()->createMany([
    ['name' => 'شمال'],
    ['name' => 'شرق'],
    ['name' => 'غرب'],
    ['name' => 'جنوب'],
    ['name' => 'شمال شرقي'],
    ['name' => 'جنوب شرقي'],
    ['name' => 'شمال غربي'],
    ['name' => 'جنوب غربي'],
]);
$field = $type->customFields()->create(['name' => 'نوع الارض', 'type' => CustomField::BUTTONS_TYPE, 'required' => true]);
$field->options()->createMany([
    ['name' => 'سكني'],
    ['name' => 'تجاري'],
    ['name' => 'سكني / تجاري'],
]);
$type->customFields()->create(['name' => 'عرض الشارع', 'type' => CustomField::NUMBER_TYPE, 'required' => true]);
$type->customFields()->create(['name' => 'الطول على الشارع', 'type' => CustomField::NUMBER_TYPE, 'required' => true]);


$type = Type::factory(['name' => 'استراحة', 'type' => Type::SELLING_TYPE])->create();
$field = $type->customFields()->create(['name' => 'الوجهة', 'type' => CustomField::BUTTONS_TYPE, 'required' => true]);
$field->options()->createMany([
    ['name' => 'شمال'],
    ['name' => 'شرق'],
    ['name' => 'غرب'],
    ['name' => 'جنوب'],
    ['name' => 'شمال شرقي'],
    ['name' => 'جنوب شرقي'],
    ['name' => 'شمال غربي'],
    ['name' => 'جنوب غربي'],
]);

$type->customFields()->create(['name' => 'عدد الصالات', 'type' => CustomField::NUMBER_TYPE, 'required' => true]);
$type->customFields()->create(['name' => 'عدد دورات المياه', 'type' => CustomField::NUMBER_TYPE, 'required' => true]);
$type->customFields()->create(['name' => 'عدد الغرف', 'type' => CustomField::NUMBER_TYPE, 'required' => true]);
$type->customFields()->create(['name' => 'عرض الشارع', 'type' => CustomField::NUMBER_TYPE, 'required' => true]);
$type->customFields()->create(['name' => 'مسبح', 'type' => CustomField::SWITCH_TYPE, 'required' => false]);
$type->customFields()->create(['name' => 'ملعب كرة قدم', 'type' => CustomField::SWITCH_TYPE, 'required' => false]);
$type->customFields()->create(['name' => 'ملعب كرة طائرة', 'type' => CustomField::SWITCH_TYPE, 'required' => false]);
$type->customFields()->create(['name' => 'بيت شعر', 'type' => CustomField::SWITCH_TYPE, 'required' => false]);
$type->customFields()->create(['name' => 'العاب الاطفال', 'type' => CustomField::SWITCH_TYPE, 'required' => false]);
$type->customFields()->create(['name' => 'قسم العوائل', 'type' => CustomField::SWITCH_TYPE, 'required' => false]);


$type = Type::factory(['name' => 'مزرعة', 'type' => Type::SELLING_TYPE])->create();
$type->customFields()->create(['name' => 'عدد الابار', 'type' => CustomField::NUMBER_TYPE, 'required' => true]);
$type->customFields()->create(['name' => 'عدد الاشجار', 'type' => CustomField::NUMBER_TYPE, 'required' => true]);
$type->customFields()->create(['name' => 'عدد النخيل', 'type' => CustomField::NUMBER_TYPE, 'required' => true]);
$type->customFields()->create(['name' => 'بيت شعر', 'type' => CustomField::SWITCH_TYPE, 'required' => false]);
$type->customFields()->create(['name' => 'فيلا', 'type' => CustomField::SWITCH_TYPE, 'required' => false]);
$type->customFields()->create(['name' => 'دور', 'type' => CustomField::SWITCH_TYPE, 'required' => false]);
$type->customFields()->create(['name' => 'حضائر', 'type' => CustomField::SWITCH_TYPE, 'required' => false]);
$type->customFields()->create(['name' => 'عمالة', 'type' => CustomField::SWITCH_TYPE, 'required' => false]);
$type->customFields()->create(['name' => 'معدات زراعية', 'type' => CustomField::SWITCH_TYPE, 'required' => false]);
$type->customFields()->create(['name' => 'بيوت محمية', 'type' => CustomField::SWITCH_TYPE, 'required' => false]);
$type->customFields()->create(['name' => 'رشاش محوري', 'type' => CustomField::SWITCH_TYPE, 'required' => false]);
$type->customFields()->create(['name' => 'مستودع', 'type' => CustomField::SWITCH_TYPE, 'required' => false]);


$type = Type::factory(['name' => 'محل للتقبيل', 'type' => Type::RENT_TYPE])->create();
$field = $type->customFields()->create(['name' => 'الوجهة', 'type' => CustomField::BUTTONS_TYPE, 'required' => true]);
$field->options()->createMany([
    ['name' => 'شمال'],
    ['name' => 'شرق'],
    ['name' => 'غرب'],
    ['name' => 'جنوب'],
    ['name' => 'شمال شرقي'],
    ['name' => 'جنوب شرقي'],
    ['name' => 'شمال غربي'],
    ['name' => 'جنوب غربي'],
]);
$type->customFields()->create(['name' => 'عمر العقار', 'type' => CustomField::NUMBER_TYPE, 'required' => true]);
$type->customFields()->create(['name' => 'عرض الشارع', 'type' => CustomField::NUMBER_TYPE, 'required' => true]);
