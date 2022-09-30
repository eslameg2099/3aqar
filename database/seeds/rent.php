<?php
/** @var \App\Models\Type $type */
// Rent
use App\Models\CustomField;
use App\Models\Type;

$type = Type::factory(['name' => 'شقة', 'type' => Type::RENT_TYPE])->create();
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
$field = $type->customFields()->create(['name' => 'المستأجرين', 'type' => CustomField::BUTTONS_TYPE, 'required' => true]);
$field->options()->createMany([
    ['name' => 'عزاب'],
    ['name' => 'عوائل'],
]);
$field = $type->customFields()->create(['name' => 'مدة الايجار', 'type' => CustomField::BUTTONS_TYPE, 'required' => true]);
$field->options()->createMany([
    ['name' => 'يومي'],
    ['name' => 'شهري'],
    ['name' => 'سنوي'],
]);
$type->customFields()->create(['name' => 'عدد الصالات', 'type' => CustomField::NUMBER_TYPE, 'required' => true]);
$type->customFields()->create(['name' => 'عدد دورات  المياه', 'type' => CustomField::NUMBER_TYPE, 'required' => true]);
$type->customFields()->create(['name' => 'عدد الغرف', 'type' => CustomField::NUMBER_TYPE, 'required' => true]);
$type->customFields()->create(['name' => 'عدد الدور', 'type' => CustomField::NUMBER_TYPE, 'required' => true]);
$type->customFields()->create(['name' => 'عمر العقار', 'type' => CustomField::NUMBER_TYPE, 'required' => true]);
$type->customFields()->create(['name' => 'مؤثثة', 'type' => CustomField::SWITCH_TYPE, 'required' => false]);
$type->customFields()->create(['name' => 'مطبخ', 'type' => CustomField::SWITCH_TYPE, 'required' => false]);
$type->customFields()->create(['name' => 'مدخل سيارة', 'type' => CustomField::SWITCH_TYPE, 'required' => false]);
$type->customFields()->create(['name' => 'مصعد', 'type' => CustomField::SWITCH_TYPE, 'required' => false]);

$type = Type::factory(['name' => 'دور', 'type' => Type::RENT_TYPE])->create();
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
$type->customFields()->create(['name' => 'رقم الدور', 'type' => CustomField::NUMBER_TYPE, 'required' => true]);
$type->customFields()->create(['name' => 'عمر العقار', 'type' => CustomField::NUMBER_TYPE, 'required' => true]);
$type->customFields()->create(['name' => 'مؤثثة', 'type' => CustomField::SWITCH_TYPE, 'required' => false]);
$type->customFields()->create(['name' => 'مدخل سيارة', 'type' => CustomField::SWITCH_TYPE, 'required' => false]);
$type->customFields()->create(['name' => 'مكيف', 'type' => CustomField::SWITCH_TYPE, 'required' => false]);

$type = Type::factory(['name' => 'فيلا', 'type' => Type::RENT_TYPE])->create();
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

$type = Type::factory(['name' => 'استراحة', 'type' => Type::RENT_TYPE])->create();
$field = $type->customFields()->create(['name' => 'مدة الايجار', 'type' => CustomField::BUTTONS_TYPE, 'required' => true]);
$field->options()->createMany([
    ['name' => 'يومي'],
    ['name' => 'شهري'],
    ['name' => 'سنوي'],
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

$type = Type::factory(['name' => 'محل', 'type' => Type::RENT_TYPE])->create();
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
$type->customFields()->create(['name' => 'الطول على الشارع', 'type' => CustomField::NUMBER_TYPE, 'required' => true]);


$type = Type::factory(['name' => 'عمارة', 'type' => Type::RENT_TYPE])->create();
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


$type = Type::factory(['name' => 'ارض', 'type' => Type::RENT_TYPE])->create();
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


$type = Type::factory(['name' => 'غرفة', 'type' => Type::RENT_TYPE])->create();
$field = $type->customFields()->create(['name' => 'مدة الايجار', 'type' => CustomField::BUTTONS_TYPE, 'required' => true]);
$field->options()->createMany([
    ['name' => 'يومي'],
    ['name' => 'شهري'],
    ['name' => 'سنوي'],
]);
$type->customFields()->create(['name' => 'عمر العقار', 'type' => CustomField::NUMBER_TYPE, 'required' => true]);
$type->customFields()->create(['name' => 'مؤثثة', 'type' => CustomField::SWITCH_TYPE, 'required' => false]);
$type->customFields()->create(['name' => 'مطبخ', 'type' => CustomField::SWITCH_TYPE, 'required' => false]);

$type = Type::factory(['name' => 'مكتب', 'type' => Type::RENT_TYPE])->create();
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
$type->customFields()->create(['name' => 'رقم الدور', 'type' => CustomField::NUMBER_TYPE, 'required' => true]);
$type->customFields()->create(['name' => 'عرض الشارع', 'type' => CustomField::NUMBER_TYPE, 'required' => true]);
$type->customFields()->create(['name' => 'مؤثث', 'type' => CustomField::SWITCH_TYPE, 'required' => false]);
$type->customFields()->create(['name' => 'مصعد', 'type' => CustomField::SWITCH_TYPE, 'required' => false]);
$type->customFields()->create(['name' => 'بوفيه', 'type' => CustomField::SWITCH_TYPE, 'required' => false]);
$type->customFields()->create(['name' => 'دورة مياه', 'type' => CustomField::SWITCH_TYPE, 'required' => false]);

$type = Type::factory(['name' => 'مخيم', 'type' => Type::RENT_TYPE])->create();
$field = $type->customFields()->create(['name' => 'مدة الايجار', 'type' => CustomField::BUTTONS_TYPE, 'required' => true]);
$field->options()->createMany([
    ['name' => 'يومي'],
    ['name' => 'شهري'],
    ['name' => 'سنوي'],
]);
$type->customFields()->create(['name' => 'عدد الخيام', 'type' => CustomField::NUMBER_TYPE, 'required' => true]);
$type->customFields()->create(['name' => 'قسم العوائل', 'type' => CustomField::SWITCH_TYPE, 'required' => false]);
$type->customFields()->create(['name' => 'مطبخ مؤثث', 'type' => CustomField::SWITCH_TYPE, 'required' => false]);
$type->customFields()->create(['name' => 'دكة', 'type' => CustomField::SWITCH_TYPE, 'required' => false]);
$type->customFields()->create(['name' => 'برميل مندي', 'type' => CustomField::SWITCH_TYPE, 'required' => false]);
$type->customFields()->create(['name' => 'ألعاب اطفال', 'type' => CustomField::SWITCH_TYPE, 'required' => false]);
$type->customFields()->create(['name' => 'ملعب طائرة', 'type' => CustomField::SWITCH_TYPE, 'required' => false]);

$type = Type::factory(['name' => 'مستودع', 'type' => Type::RENT_TYPE])->create();
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
$type->customFields()->create(['name' => 'عدد الغرف', 'type' => CustomField::NUMBER_TYPE, 'required' => true]);
$type->customFields()->create(['name' => 'ثلاجات', 'type' => CustomField::SWITCH_TYPE, 'required' => false]);
$type->customFields()->create(['name' => 'مكيف', 'type' => CustomField::SWITCH_TYPE, 'required' => false]);
$type->customFields()->create(['name' => 'إشتراطات السلامة', 'type' => CustomField::SWITCH_TYPE, 'required' => false]);
$type->customFields()->create(['name' => 'مطبخ', 'type' => CustomField::SWITCH_TYPE, 'required' => false]);


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