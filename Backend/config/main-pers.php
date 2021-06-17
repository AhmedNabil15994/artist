<?php


return [


    'mainIndexes' => [
        'DashboardControllers@Dashboard' => [
            'title'=>'list-dashboard',
            'viewTitle'=>'الرئيسية',
            'modulePermissions' => '',
        ],
        'PageControllers@index' => [
            'title'=>'list-pages',
            'viewTitle'=>'الصفحات',
            'modulePermissions' => 'edit-page,add-page,delete-page,sort-page,charts-page,uploadImage-page,deleteImage-page',
        ],
        'CityControllers@index' => [
            'title'=>'list-cities',
            'viewTitle'=>'المدن',
            'modulePermissions' => 'edit-city,add-city,delete-city,sort-city,charts-city',
        ],
        'ContactUsControllers@index' => [
            'title'=>'list-contactUs',
            'viewTitle'=>'الاتصال بنا',
            'modulePermissions' => 'edit-contactUs,delete-contactUs,reply-contactUs,charts-contactUs',
        ],
        'GroupsControllers@index' => [
            'title'=>'list-groups',
            'viewTitle'=>'مجموعات المشرفين',
            'modulePermissions' => 'edit-group,add-group,delete-group,sort-group,charts-group',
        ],
        'UsersControllers@index' => [
            'title'=>'list-users',
            'viewTitle'=>'المشرفين والاداريين',
            'modulePermissions' => 'edit-user,add-user,delete-user,sort-user,charts-user,uploadImage-user,deleteImage-user',
        ],
        'LogControllers@index' => [
            'title'=>'list-logs',
            'viewTitle'=>'سجلات الدخول للنظام',
            'modulePermissions' => 'edit-log,delete-log,sort-log,charts-log',
        ],
        'VariablesControllers@index' => [
            'title'=>'list-variables',
            'viewTitle'=>'اعدادات عامة',
            'modulePermissions' => 'edit-variable',
        ],
        'VariablesControllers@panel' => [
            'title'=>'list-variables2',
            'viewTitle'=>'اعدادات لوحة التحكم',
            'modulePermissions' => 'edit-variable2',
        ],
        'BlockedUsersControllers@index' => [
            'title'=>'list-blockedUsers',
            'viewTitle'=>'الاعضاء المحظورة',
            'modulePermissions' => 'edit-blockedUser,delete-blockedUser,sort-blockedUser,charts-blockedUser',
        ],  
        'MembershipControllers@index' => [
            'title'=>'list-memberships',
            'viewTitle'=>'البطاقات',
            'modulePermissions' => 'edit-membership,add-membership,delete-membership,sort-membership,charts-membership',
        ],
        'FeatureControllers@index' => [
            'title'=>'list-features',
            'viewTitle'=>'مميزات العضويات',
            'modulePermissions' => 'edit-feature,add-feature,delete-feature,sort-feature,charts-feature',
        ],
        'ConditionControllers@index' => [
            'title'=>'list-conditions',
            'viewTitle'=>'شروط العضويات',
            'modulePermissions' => 'edit-condition,add-condition,delete-condition,sort-condition,charts-condition',
        ],
        'FieldControllers@index' => [
            'title'=>'list-fields',
            'viewTitle'=>'المجالات الفنية',
            'modulePermissions' => 'edit-field,add-field,delete-field,sort-field,charts-field',
        ],  
        'BlogCategoryControllers@index' => [
            'title'=>'list-categories',
            'viewTitle'=>'التصنيفات',
            'modulePermissions' => 'edit-category,add-category,delete-category,sort-category,charts-category',
        ],  
        'SliderControllers@index' => [
            'title'=>'list-sliders',
            'viewTitle'=>'الاسلايدر',
            'modulePermissions' => 'edit-slider,add-slider,delete-slider,sort-slider,charts-slider,uploadImage-slider,deleteImage-slider',
        ],
        'OrderControllers@index' => [
            'title'=>'list-orders',
            'viewTitle'=>'طلبات الاعضاء',
            'modulePermissions' => 'edit-order,delete-order,charts-order',
        ],  
        'UserCardControllers@index' => [
            'title'=>'list-user-cards',
            'viewTitle'=>'العضويات',
            'modulePermissions' => 'edit-user-card,delete-user-card,charts-user-card',
        ],
        'EventControllers@index' => [
            'title'=>'list-events',
            'viewTitle'=>'الفعاليات',
            'modulePermissions' => 'edit-event,add-event,delete-event,sort-event,charts-event,uploadImage-event,deleteImage-event',
        ],
        'CouponControllers@index' => [
            'title'=>'list-coupons',
            'viewTitle'=>'كوبونات الخصم',
            'modulePermissions' => 'edit-coupon,add-coupon,delete-coupon,sort-coupon,charts-coupon',
        ],
    ],

    


];
