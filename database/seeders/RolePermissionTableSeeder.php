<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolePermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminrole= Role::where("name","Admin")->first();
        $adminrole->syncPermissions([
            'dashoboard',
            'category_listing',
            'category_create',
            'category_edit',
            'category_delete',
            'product_listing',
            'product_create',
            'product_edit',
            'product_delete',
        ]);

        $editorrole= Role::where('name','Editor')->first();
        $editorrole->syncPermissions([
            'product_listing',
            'product_create',
            'product_edit',
            'product_delete',
        ]);

       
    }
}
