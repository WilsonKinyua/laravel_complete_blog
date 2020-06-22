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
        $user = User::where("email","wilsonkinyuam@gmail.com")->first();
        if(!$user) {
            User::create([
                "name"=>"Wilson Kinyua",
                "email"=>"wilsonkinyuam@gmail.com",
                'password' => Hash::make('lisaerwilson'),
                "about"=>"Am a Full Stack Web developer who creates awesome websites with HTML, CSS, JAVASCRIPT, BOOTSTRAP, VANILLA PHP, LARAVEL",
                "role_id"=>1,
                "photo_id"=>1
            ]);
        }
    }
}
