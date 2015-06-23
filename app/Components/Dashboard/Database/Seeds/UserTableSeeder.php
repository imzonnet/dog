<?php namespace App\Components\Dashboard\Database\Seeds;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder {

    public function run()
    {

        $faker = Faker::create();
        
        DB::table('users')->insert(
                ['firstname' => 'John',
                'lastname' => 'Nguyen',
                'avatar' => $faker->imageUrl(375, 235, 'people'),
                'email' => 'admin@admin.com',
                'password' => bcrypt('123456'),
                'activated' => 1,
                'role_id' => '1',
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString()]
                );
        DB::table('users')->insert(
                ['firstname' => 'knight',
                'lastname' => 'dev',
                'avatar' => $faker->imageUrl(375, 235, 'people'),
                'email' => 'knightdev86@gmail.com',
                'password' => bcrypt('123456'),
                'activated' => 1,
                'role_id' => '1',
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString()]
                );
        DB::table('users')->insert(
                ['firstname' => 'Danial',
                'lastname' => 'Nguyen',
                'avatar' => '/demo/users/agent37.jpg',
                'email' => 'dainal@gmail.com',
                'password' => bcrypt('123456'),
                'activated' => 1,
                'role_id' => '2',
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString()]
                );
        DB::table('users')->insert(
                ['firstname' => 'lucy',
                'lastname' => 'Ana',
                'avatar' => '/demo/users/agent37.jpg',
                'email' => 'lucy@gmail.com',
                'password' => bcrypt('123456'),
                'activated' => 1,
                'role_id' => '2',
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString()]
                );
        foreach(range(5,13) as $index) {
            DB::table('users')->insert(
                ['firstname' => $faker->firstName,
                'lastname' => $faker->lastName,
                'avatar' => '/demo/users/agent37.jpg',
                'email' => $faker->email,
                'password' => bcrypt('123456'),
                'activated' => 1,
                'role_id' => '2',
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString()]
            );
        }

    }

}
