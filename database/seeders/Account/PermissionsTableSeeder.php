<?php

namespace Database\Seeders\Account;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Account\AccountPermission;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {

        AccountPermission::create([
            'name' => 'become_tenant',
            'label' => 'يكون مستأجر',
        ]);
        AccountPermission::create([
            'name' => 'manage_tenants',
            'label' => 'يدير المستأجرين',
        ]);
        AccountPermission::create([
            'name' => 'manage_own_tenant',
            'label' => 'يدير إستئجاره فقط',
        ]);
        // =========================================
        // account__
        AccountPermission::create([
            'name' => 'account__manage_accounts',
            'label' => 'يدير الحسابات',
        ]);
        //
        AccountPermission::create([
            'name' => 'account__manage_users',
            'label' => 'يدير المستخدمون',
        ]);
        AccountPermission::create([
            'name' => 'account__list_users',
            'label' => 'يستعرض المستخدمون',
        ]);
        AccountPermission::create([
            'name' => 'account__add_user',
            'label' => 'يضيف مستخدم',
        ]);
        AccountPermission::create([
            'name' => 'account__edit_user',
            'label' => 'يعدل مستخدم',
        ]);
        AccountPermission::create([
            'name' => 'account__show_user',
            'label' => 'يعرض مستخدم',
        ]);
        AccountPermission::create([
            'name' => 'account__delete_user',
            'label' => 'يحذف مستخدم',
        ]);
        //
        AccountPermission::create([
            'name' => 'account__manage_roles',
            'label' => 'يدير الأدوار',
        ]);
        AccountPermission::create([
            'name' => 'account__list_roles',
            'label' => 'يستعرض الأدوار',
        ]);
        AccountPermission::create([
            'name' => 'account__add_role',
            'label' => 'يضيف دور',
        ]);
        AccountPermission::create([
            'name' => 'account__edit_role',
            'label' => 'يعدل دور',
        ]);
        AccountPermission::create([
            'name' => 'account__show_role',
            'label' => 'يعرض دور',
        ]);
        AccountPermission::create([
            'name' => 'account__delete_role',
            'label' => 'يحذف دور',
        ]);
        // ========================================
        AccountPermission::create([
            'name' => 'manage_any_content',
            'label' => 'يدير أي محتوى',
        ]);
        AccountPermission::create([
            'name' => 'manage_own_content',
            'label' => 'يدير محتواه فقط',
        ]);
        AccountPermission::create([
            'name' => 'add_content',
            'label' => 'يضيف محتوى',
        ]);
        AccountPermission::create([
            'name' => 'show_any_content',
            'label' => 'يعرض أي محتوى',
        ]);
        AccountPermission::create([
            'name' => 'show_own_content',
            'label' => 'يعرض محتواه فقط',
        ]);
        AccountPermission::create([
            'name' => 'edit_any_content',
            'label' => 'يعدل أي محتوى',
        ]);
        AccountPermission::create([
            'name' => 'edit_own_content',
            'label' => 'يعدل محتواه فقط',
        ]);
        AccountPermission::create([
            'name' => 'delete_any_content',
            'label' => 'يحذف أي محتوى',
        ]);
        AccountPermission::create([
            'name' => 'delete_own_content',
            'label' => 'يحذف محتواه فقط',
        ]);

        // Create additional permissions as needed
        // ...
    }
}
