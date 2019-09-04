<?php

use Illuminate\Database\Seeder;
use App\PostOwner;

class FundsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = Faker\Factory::create();
        // Read JSON file
        $funds_json = file_get_contents(realpath(__DIR__ . './funds.json'));
        
        $funds = json_decode($funds_json,false);        

        $limit = 10;
        $count = 0;

        foreach($funds as $fund){
            $count = $count+1;
            if($count < $limit){
                if(isset($fund)){
                    $name = $fund->name;
                    $owner = PostOwner::create();
                    $owner->room()->create(['name'=>$fund->ticker]);
                    DB::table('funds')->insert([
                        'name' => $fund->name,
                        'ticker'=>$fund->ticker,
                        'descricao'=>$fund->descricao,
                        'infos'=>json_encode($fund),
                        'fund_avatar' => "",
                        'post_owner_id' => $owner->id
                    ]);
                }
            }
        }
        
    }
}
