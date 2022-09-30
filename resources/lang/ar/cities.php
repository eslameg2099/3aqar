<?php

return [
    'singular' => 'المدينة',
    'plural' => 'المدن',
    'empty' => 'لا يوجد مدن حتى الان',
'city'=>'مدينة رئسية',
  'levels' => [
        '1' => 'المنطقة',
        '2' => 'المدينة',
        '3' => 'الحي',   
    ],
'create'=>'انشاء نوع تصميم',
    'count' => 'عدد المدن',
    'search' => 'بحث',
    'select' => 'اختر المدينة',
    'permission' => 'ادارة المدن',
    'trashed' => 'المدن المحذوفة',
    'perPage' => 'عدد النتائج بالصفحة',
    'filter' => 'ابحث عن مدينة',
    'actions' => [
        'list' => 'عرض الكل',
        'create' => 'اضافة مدينة',
        'show' => 'عرض المدينة',
        'edit' => 'تعديل المدينة',
        'delete' => 'حذف المدينة',
        'restore' => 'استعادة',
        'forceDelete' => 'حذف نهائي',
        'options' => 'خيارات',
        'save' => 'حفظ',
        'filter' => 'بحث',
    ],
    'messages' => [
        'created' => 'تم اضافة المدينة بنجاح.',
        'updated' => 'تم تعديل المدينة بنجاح.',
        'deleted' => 'تم حذف المدينة بنجاح.',
        'restored' => 'تم استعادة المدينة بنجاح.',
    ],
    'attributes' => [
        'name' => 'اسم المدينة',
        '%name%' => 'اسم المدينة',
    ],
    'dialogs' => [
        'delete' => [
            'title' => 'تحذير !',
            'info' => 'هل انت متأكد انك تريد حذف المدينة ؟',
            'confirm' => 'حذف',
            'cancel' => 'الغاء',
        ],
        'restore' => [
            'title' => 'تحذير !',
            'info' => 'هل انت متأكد انك تريد استعادة المدينة ؟',
            'confirm' => 'استعادة',
            'cancel' => 'الغاء',
        ],
        'forceDelete' => [
            'title' => 'تحذير !',
            'info' => 'هل انت متأكد انك تريد حذف المدينة نهائياً ؟',
            'confirm' => 'حذف نهائي',
            'cancel' => 'الغاء',
        ],
    ],
];
