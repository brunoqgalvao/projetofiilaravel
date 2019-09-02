<?php

use Illuminate\Database\Seeder;
use App\Post;
use App\User;
use App\Comment;

class LikesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        $posts = Post::all();

        $users = User::all();

        foreach($posts as $post){
            $limit = $faker->numberBetween(0,3);
            $likeUsers = $users->random($limit);
            foreach($likeUsers as $user){
                $post->likes()->toggle($user->id);
                $post['likes_total'] += 1;
                $post->save();
            }
    }
    }
}
