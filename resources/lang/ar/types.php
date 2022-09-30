<?php

return [
    'singular' => 'نوع العقار',
    'plural' => 'انواع العقارات',
    'empty' => 'لا يوجد انواع عقارات حتى الان',
    'count' => 'عدد انواع العقارات',
    'search' => 'بحث',
    'select' => 'اختر نوع العقار',
    'permission' => 'ادارة انواع العقارات',
    'trashed' => 'انواع العقارات المحذوفة',
    'perPage' => 'عدد النتائج بالصفحة',
    'filter' => 'ابحث عن نوع عقار',
    'actions' => [
        'list' => 'عرض الكل',
        'create' => 'اضافة نوع عقار',
        'show' => 'عرض نوع العقار',
        'edit' => 'تعديل نوع العقار',
        'delete' => 'حذف نوع العقار',
        'restore' => 'استعادة',
        'forceDelete' => 'حذف نهائي',
        'options' => 'خيارات',
        'save' => 'حفظ',
        'filter' => 'بحث',
    ],
    'messages' => [
        'created' => 'تم اضافة نوع العقار بنجاح.',
        'updated' => 'تم تعديل نوع العقار بنجاح.',
        'deleted' => 'تم حذف نوع العقار بنجاح.',
        'restored' => 'تم استعادة نوع العقار بنجاح.',
    ],
    'attributes' => [
        'name' => 'اسم نوع العقار',
        '%name%' => 'اسم نوع العقار',
    ],
    'types' => [
        \App\Models\Type::RENT_TYPE => 'إجار',
        \App\Models\Type::SELLING_TYPE => 'بيع',
    ],
    'for' => [
        \App\Models\Type::RENT_TYPE => 'للإيجار',
        \App\Models\Type::SELLING_TYPE => 'للبيع',
    ],
    'dialogs' => [
        'delete' => [
            'title' => 'تحذير !',
            'info' => 'هل انت متأكد انك تريد حذف نوع العقار ؟',
            'confirm' => 'حذف',
            'cancel' => 'الغاء',
        ],
        'restore' => [
            'title' => 'تحذير !',
            'info' => 'هل انت متأكد انك تريد استعادة نوع العقار ؟',
            'confirm' => 'استعادة',
            'cancel' => 'الغاء',
        ],
        'forceDelete' => [
            'title' => 'تحذير !',
            'info' => 'هل انت متأكد انك تريد حذف نوع العقار نهائياً ؟',
            'confirm' => 'حذف نهائي',
            'cancel' => 'الغاء',
        ],
    ],
];
