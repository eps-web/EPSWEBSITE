<?php

namespace Database\Seeders;

use App\Models\User;
use DB;
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
        DB::table('users')->insert([
          [
            'name' => 'SHIMUN',
            'email' => 'rlinfobd@gmail.com',
            'phone' => '01912586164',
            'user_role' =>'admin',
            'password' => bcrypt(12345678),
            'status' =>'active',

          ],
          [
            'name' => 'SHI',
            'email' => 'bd@gmail.com',
            'phone' => '01912586198',
            'user_role' =>'admin',
            'password' => bcrypt(12345678),
            'status' =>'active',

          ],

            [
              'name' => 'Afifa',
              'email' => 'superadmin@gmail.com.com',
              'phone' => '01771567123',
              'user_role' =>'superadmin',
              'password' => bcrypt(12345678),
              'status' =>'active',
            ],
            [
              'name' => 'editor',
              'email' => 'editor@gmail.com.com',
              'phone' => '01771567124',
              'user_role' =>'editor',
              'password' => bcrypt(12345678),
              'status' =>'active',
            ],
            [
              'name' => 'hr',
              'email' => 'hr@gmail.com.com',
              'phone' => '01771567126',
              'user_role' =>'hr',
              'password' => bcrypt(12345678),
              'status' =>'active',
            ],
            [
              'name' => 'viewer',
              'email' => 'viewer@gmail.com.com',
              'phone' => '01771567127',
              'user_role' =>'viewer',
              'password' => bcrypt(12345678),
              'status' =>'active',
            ],

        ]);

        category::create([
            'name' => 'UnCategorized',
            'slug' =>Str::slug('UnCategorized')
        ]);
    }
}
