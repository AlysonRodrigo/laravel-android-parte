<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\Cookiesoft\Models\User::class,20)->create();

        factory(\Cookiesoft\Models\User::class,1)->create([
           'email' => 'g.dasilva@hotmail.com'
        ]);
    }
}
