<?php namespace App\Components\Dashboard\Database\Seeds;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserRolesTableSeeder extends Seeder {

    public function run()
    {

        DB::table('user_roles')->insert([
                'name' => 'admin',
                'state' => '1',
                'ordering' => '1',
                ]);
        DB::table('user_roles')->insert([
                'name' => 'consultant',
                'state' => '1',
                'ordering' => '2',
                ]);
    }

}
