<?php

namespace Database\Seeders;

use App\Models\User;

use App\Models\category;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class MakeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


      $superadmin=  User::create([
            'name' => 'Super Admin',
            'email' => 'superadmin@gmail.com',
            'phone' => '01912586165',
            'image'=>('/admin/assets/img/profiles/avatar-03.jpg'),
            'user_role' =>"superadmin",
            'user_id' =>'1',

            'password' => bcrypt(12345678),

        ]);




        $superadmin_role = Role::create([
          'name' => 'superadmin',
          'slug' =>Str::slug('superadmin')
      ]);




        $permission = Permission::create(['name' => 'Role access']);

        $permission = Permission::create(['name' => 'Role edit']);
        $permission = Permission::create(['name' => 'Role create']);
        $permission = Permission::create(['name' => 'Role delete']);

        $permission = Permission::create(['name' => 'User access']);
        $permission = Permission::create(['name' => 'User edit']);
        $permission = Permission::create(['name' => 'User create']);
        $permission = Permission::create(['name' => 'User delete']);

        $permission = Permission::create(['name' => 'Permission access']);
        $permission = Permission::create(['name' => 'Permission edit']);
        $permission = Permission::create(['name' => 'Permission create']);
        $permission = Permission::create(['name' => 'Permission delete']);

        $superadmin->assignRole($superadmin_role);


        $superadmin_role->givePermissionTo(Permission::all());



        category::create([
            'name' => 'UnCategorized',
            'slug' =>Str::slug('UnCategorized')
        ]);

    }
}
