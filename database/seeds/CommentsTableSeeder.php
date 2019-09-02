<?php

use Illuminate\Database\Seeder;
use App\Post;
use App\User;
use App\Comment;

class CommentsTableSeeder extends Seeder
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
            $limit = $faker->numberBetween(0,12);
            for ($i = 0; $i < $limit; $i++) {
                $comment = new Comment();
                $comment->body = $faker->paragraph(2,true);
                $comment->user_id = $users->random(1)[0]->id;
                $post['comments_total'] += 1;
                $post->save();
                $post->comments()->save($comment);
            }
    }
}
}
