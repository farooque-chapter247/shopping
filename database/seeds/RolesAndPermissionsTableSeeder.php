<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        // Permission::create(['name' => 'add user']);
        // Permission::create(['name' => 'edit user']);
        // Permission::create(['name' => 'view user']);
        // Permission::create(['name' => 'delete user']);
        
        // create roles and assign created permissions

        $role = Role::create(['name' => 'customer']);
        $role = Role::create(['name' => 'super-admin']);
  
      //  $role->givePermissionTo(Permission::all());
    }
}
