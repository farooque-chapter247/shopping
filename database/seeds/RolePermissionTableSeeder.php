<?php

use Spatie\Permission\Models\Role;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Eloquent\Model;


class RolePermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        $permissions = [
      
            'view_product','add_product','edit_product','delete_product',
            'view_categort','add_category','edit_category','delete_category',
            'view_subcategoy','add_subcategory','edit_subcategory','delete_subcategoy',
            'view_order','add_order','edit_order','delete_order','manager_order',
   
        ];

        foreach($permissions as $permission)
            Permission::create(['name'=>$permission]);
        
    }
}
