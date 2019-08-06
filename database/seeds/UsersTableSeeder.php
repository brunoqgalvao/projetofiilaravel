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
        DB::table('users')->insert([
            'name' => "Admin",
            'email' => "admin@admin.com",
            'password' => bcrypt('admin'),
            'user_avatar' => "",
            'user_level' => 0,
            'post_owner_id' => PostOwner::create()->id
        ]);
    }
}
