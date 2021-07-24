<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use app\Models;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        factory(App\Articles::class,30)->create();
        for($i=0;$i<50;$i++){
            $articlesData[]=[
                'title' => Str::random(10),
                'body' => Str::random(500).'@gmail.com',
            ];
        }
        DB::table('Articles')->insert($articlesData);

//        for ($i=0; $i < 100000; $i++) {
//            $userData[] = [
//                'name' => Str::random(10),
//                'email' => Str::random(10).'@gmail.com',
//                'password' => Hash::make('password')
//            ];
//        }
//
//        foreach ($userData as $user) {
//            User::create($user);
//        }

    }
}
