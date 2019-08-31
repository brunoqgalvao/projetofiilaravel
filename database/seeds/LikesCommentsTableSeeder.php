<?php

use Illuminate\Database\Seeder;
use App\Post;
use App\User;
use App\Comment;

class LikesCommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        $comments = Comment::all();

        $users = User::all();

        foreach($comments as $comment){
            $limit = $faker->numberBetween(0,5);
            $likeUsers = $users->random($limit);
            foreach($likeUsers as $user){
                $comment->likes()->toggle($user->id);
                $comment['likes_total'] += 1;
                $comment->save();
            }
    }
    }
}
