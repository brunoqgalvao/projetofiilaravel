<?php

use Illuminate\Database\Seeder;
use App\PostOwner;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = Faker\Factory::create();

        $limit = 10;
        $owner = PostOwner::create();
        $owner->room()->create(['name'=>"Bruno"]);
        DB::table('users')->insert([
            'name' => "Bruno",
            'email' => "brunoqgalvao@hotmail.com",
            'password' => bcrypt('admin'),
            'user_avatar' => $faker->image('public/storage/img',400,300, 'people', false),
            'user_level' => 1,
            'post_owner_id' => $owner->id
        ]);
 

        for ($i = 0; $i < $limit; $i++) {

            $name = $faker->name;
            $owner = PostOwner::create();
            $owner->room()->create(['name'=>$name]);

            DB::table('users')->insert([
                'name' => $faker->name,
                'email' => $faker->email,
                'password' => "faker",
                'user_avatar' => "/storage/img/". $faker->image('public/storage/img',300,300,'people', false),
                'user_level' => 0,
                'post_owner_id' => $owner->id
            ]);
        }
    }
}
