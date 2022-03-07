<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\category;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class MakeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Super Admin',
            'email' => 'superadmin@gmail.com',
            'phone' => '01912586165',
                'image'=>('/admin/assets/img/profiles/avatar-03.jpg'),
            'user_role' =>"superadmin",

            'password' => bcrypt(12345678),

        ]);
        User::create([
            'name' => 'SHIMUN',
            'email' => 'rlinfobd@gmail.com',
            'phone' => '01912586164',
            'image'=>('/admin/assets/img/profiles/avatar-01.jpg'),
            'user_role' =>"admin",
            'password' => bcrypt(12345678),

        ]);

        category::create([
            'name' => 'UnCategorized',
            'slug' =>Str::slug('UnCategorized')
        ]);
    }
}
