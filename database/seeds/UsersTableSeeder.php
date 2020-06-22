<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user1 = User::where("email","muthoniwilsonk@gmail.com")->first();
        if(!$user1) {
            User::create([
                "name"=>"Wilson Kinyua",
                "email"=>"muthoniwilsonk@gmail.com",
                'password' => Hash::make('lisaerwilson'),
                "about"=>"Am a Full Stack Web developer who creates awesome websites with HTML, CSS, JAVASCRIPT, BOOTSTRAP, VANILLA PHP, LARAVEL",
                "role_id"=>1,
                "photo_id"=>1
            ]);
        }
        $user2 = User::where("email","misswilsonkinyua@gmail.com")->first();
        if(!$user2) {
            User::create([
                "name"=>"Wilson Kinyua",
                "email"=>"misswilsonkinyua@gmail.com",
                'password' => Hash::make('lisaerwilson'),
                "about"=>"Am a Full Stack Web developer who creates awesome websites with HTML, CSS, JAVASCRIPT, BOOTSTRAP, VANILLA PHP, LARAVEL",
                "role_id"=>1,
                "photo_id"=>1
            ]);
        }
    }
}
