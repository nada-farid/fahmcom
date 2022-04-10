<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'slider_create',
            ],
            [
                'id'    => 18,
                'title' => 'slider_edit',
            ],
            [
                'id'    => 19,
                'title' => 'slider_show',
            ],
            [
                'id'    => 20,
                'title' => 'slider_delete',
            ],
            [
                'id'    => 21,
                'title' => 'slider_access',
            ],
            [
                'id'    => 22,
                'title' => 'setting_create',
            ],
            [
                'id'    => 23,
                'title' => 'setting_edit',
            ],
            [
                'id'    => 24,
                'title' => 'setting_show',
            ],
            [
                'id'    => 25,
                'title' => 'setting_delete',
            ],
            [
                'id'    => 26,
                'title' => 'setting_access',
            ],
            [
                'id'    => 27,
                'title' => 'serviece_type_create',
            ],
            [
                'id'    => 28,
                'title' => 'serviece_type_edit',
            ],
            [
                'id'    => 29,
                'title' => 'serviece_type_show',
            ],
            [
                'id'    => 30,
                'title' => 'serviece_type_delete',
            ],
            [
                'id'    => 31,
                'title' => 'serviece_type_access',
            ],
            [
                'id'    => 32,
                'title' => 'service_access',
            ],
            [
                'id'    => 33,
                'title' => 'our_service_create',
            ],
            [
                'id'    => 34,
                'title' => 'our_service_edit',
            ],
            [
                'id'    => 35,
                'title' => 'our_service_show',
            ],
            [
                'id'    => 36,
                'title' => 'our_service_delete',
            ],
            [
                'id'    => 37,
                'title' => 'our_service_access',
            ],
            [
                'id'    => 38,
                'title' => 'product_management_access',
            ],
            [
                'id'    => 39,
                'title' => 'product_category_create',
            ],
            [
                'id'    => 40,
                'title' => 'product_category_edit',
            ],
            [
                'id'    => 41,
                'title' => 'product_category_show',
            ],
            [
                'id'    => 42,
                'title' => 'product_category_delete',
            ],
            [
                'id'    => 43,
                'title' => 'product_category_access',
            ],
            [
                'id'    => 44,
                'title' => 'product_tag_create',
            ],
            [
                'id'    => 45,
                'title' => 'product_tag_edit',
            ],
            [
                'id'    => 46,
                'title' => 'product_tag_show',
            ],
            [
                'id'    => 47,
                'title' => 'product_tag_delete',
            ],
            [
                'id'    => 48,
                'title' => 'product_tag_access',
            ],
            [
                'id'    => 49,
                'title' => 'product_create',
            ],
            [
                'id'    => 50,
                'title' => 'product_edit',
            ],
            [
                'id'    => 51,
                'title' => 'product_show',
            ],
            [
                'id'    => 52,
                'title' => 'product_delete',
            ],
            [
                'id'    => 53,
                'title' => 'product_access',
            ],
            [
                'id'    => 54,
                'title' => 'user_alert_create',
            ],
            [
                'id'    => 55,
                'title' => 'user_alert_show',
            ],
            [
                'id'    => 56,
                'title' => 'user_alert_delete',
            ],
            [
                'id'    => 57,
                'title' => 'user_alert_access',
            ],
            [
                'id'    => 58,
                'title' => 'generalsetting_access',
            ],
            [
                'id'    => 59,
                'title' => 'city_create',
            ],
            [
                'id'    => 60,
                'title' => 'city_edit',
            ],
            [
                'id'    => 61,
                'title' => 'city_show',
            ],
            [
                'id'    => 62,
                'title' => 'city_delete',
            ],
            [
                'id'    => 63,
                'title' => 'city_access',
            ],
            [
                'id'    => 64,
                'title' => 'service_request_create',
            ],
            [
                'id'    => 65,
                'title' => 'service_request_edit',
            ],
            [
                'id'    => 66,
                'title' => 'service_request_show',
            ],
            [
                'id'    => 67,
                'title' => 'service_request_delete',
            ],
            [
                'id'    => 68,
                'title' => 'service_request_access',
            ],
            [
                'id'    => 69,
                'title' => 'contactu_create',
            ],
            [
                'id'    => 70,
                'title' => 'contactu_edit',
            ],
            [
                'id'    => 71,
                'title' => 'contactu_show',
            ],
            [
                'id'    => 72,
                'title' => 'contactu_delete',
            ],
            [
                'id'    => 73,
                'title' => 'contactu_access',
            ],
            [
                'id'    => 74,
                'title' => 'product_cart_create',
            ],
            [
                'id'    => 75,
                'title' => 'product_cart_edit',
            ],
            [
                'id'    => 76,
                'title' => 'product_cart_show',
            ],
            [
                'id'    => 77,
                'title' => 'product_cart_delete',
            ],
            [
                'id'    => 78,
                'title' => 'product_cart_access',
            ],
            [
                'id'    => 79,
                'title' => 'order_create',
            ],
            [
                'id'    => 80,
                'title' => 'order_edit',
            ],
            [
                'id'    => 81,
                'title' => 'order_show',
            ],
            [
                'id'    => 82,
                'title' => 'order_delete',
            ],
            [
                'id'    => 83,
                'title' => 'order_access',
            ],
            [
                'id'    => 84,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
