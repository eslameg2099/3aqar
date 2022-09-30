<?php

return [
    'singular' => 'العقار',
    'plural' => 'العقارات',
    'empty' => 'لا يوجد عقارات حتى الان',
    'count' => 'عدد العقارات',
    'search' => 'بحث',
    'select' => 'اختر العقار',
    'permission' => 'ادارة العقارات',
    'trashed' => 'العقارات المحذوفة',
    'perPage' => 'عدد النتائج بالصفحة',
    'filter' => 'ابحث عن عقار',
    'km' => 'كم',
    'actions' => [
        'list' => 'عرض الكل',
        'create' => 'اضافة عقار',
        'show' => 'عرض العقار',
        'edit' => 'تعديل العقار',
        'delete' => 'حذف العقار',
        'restore' => 'استعادة',
        'forceDelete' => 'حذف نهائي',
        'options' => 'خيارات',
        'save' => 'حفظ',
        'filter' => 'بحث',
'sponser'=>'اعلان',
    ],
    'messages' => [
        'created' => 'تم اضافة العقار بنجاح.',
        'updated' => 'تم تعديل العقار بنجاح.',
        'deleted' => 'تم حذف العقار بنجاح.',
        'restored' => 'تم استعادة العقار بنجاح.',
    ],
    'attributes' => [
        'name' => 'اسم العقار',
'number'=>'رقم العقار',
        'description' => 'وصف العقار',
        'type' => 'نوع الاعلان',
        'type_id' => 'نوع العقار',
        'space' => 'المساحة',
        'price' => 'السعر',
        'video' => 'رابط الفيديو',
        'user_type' => 'علاقة المعلن',
        'images' => 'صور العقار',
        'address' => 'عنوان العقار',
        'latitude' => 'خط العرض',
        'longitude' => 'خط الطول',
'date'=>'التاريخ',
 'image' => 'صورة',
'estate_id'=>'العقار',
'city_id'=>'المدينة',
'user_id'=>'العميل',
    ],
    'user_types' => [
        \App\Models\Estate::OWNER_USER_TYPE => 'مالك',
        \App\Models\Estate::MARKETER_USER_TYPE => 'مسوق',
        \App\Models\Estate::AGENT_USER_TYPE => 'وسيط',
    ],
    'dialogs' => [
        'delete' => [
            'title' => 'تحذير !',
            'info' => 'هل انت متأكد انك تريد حذف العقار ؟',
            'confirm' => 'حذف',
            'cancel' => 'الغاء',
        ],
        'restore' => [
            'title' => 'تحذير !',
            'info' => 'هل انت متأكد انك تريد استعادة العقار ؟',
            'confirm' => 'استعادة',
            'cancel' => 'الغاء',
        ],
        'forceDelete' => [
            'title' => 'تحذير !',
            'info' => 'هل انت متأكد انك تريد حذف العقار نهائياً ؟',
            'confirm' => 'حذف نهائي',
            'cancel' => 'الغاء',
        ],
    ],
];
