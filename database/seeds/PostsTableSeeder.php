<?php

use Illuminate\Database\Seeder;
use App\Post;
use App\Room;
use App\User;
use App\PostOwner;


class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = Faker\Factory::create();

        $owners = PostOwner::all();

        $users = User::all();

        $rooms = Room::all();

        foreach($users as $user){
            $owner = $user->postOwner;
            $limit = $faker->numberBetween(5,12);
            for ($i = 0; $i < $limit; $i++) {
                $post = $owner->posts()->create([
                    "content"=>$faker->paragraph(5,true)
                ]);                    
                // randomly add post image
                if($faker->numberBetween(1,10)>10){
                    $post->image_url = "/storage/img/".$faker->image('public/storage/img',400,300, null, false);
                } else {
                    $post->image_url = "   ";
                }
                $post->rooms()->attach($owner->room->id);
                $post->save();
                // randomly add room tags and add owner tag;
                // for($i=0; $i<1;$i++){
                //     $room = $rooms[floor(rand()*count($rooms))];
                //     $post->rooms()->attach($room->id);
                // }
        }
    }
}
}
