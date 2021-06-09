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
        //
        DB::table('users')->insert([
            'name'              => 'user',
            'postal_code'       => '1600000',
            'prefecture'              => '東京都',
            'city'              => '品川区',
            'block'            => '1-1-1',
            'building'          => 'TNGビル',
            'phone'              => '00000000000',
            'email'             => 'user@example.com',
            'password'          => Hash::make('12345678'),
            'remember_token'    => Str::random(10),
        ]);
    }
}
