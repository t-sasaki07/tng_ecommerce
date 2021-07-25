<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('items')->insert([
            'name'=>'Nintendo DS',
            'price'=>'5000',
            'comment'=>'原点にして頂点',
            'stock'=>'50',
            'img_1'=>'ex10.png',
        ]);

        DB::table('items')->insert([
            'name'=>'Nintendo DS Lite',
            'price'=>'6000',
            'comment'=>'軽いやつ',
            'stock'=>'45',
            'img_1'=>'ex1.png',
        ]);

        DB::table('items')->insert([
            'name'=>'Nintendo 3DS',
            'price'=>'7000',
            'comment'=>'飛び出すやつ',
            'stock'=>'96',
            'img_1'=>'ex2.png',
        ]);

        DB::table('items')->insert([
            'name'=>'Nintendo 3DSLL',
            'price'=>'8000',
            'comment'=>'飛び出すやつがでっかくなったやつ',
            'stock'=>'66',
            'img_1'=>'ex3.png',
        ]);

        DB::table('items')->insert([
            'name'=>'Nintendo Wii',
            'price'=>'9000',
            'comment'=>'今は昔、竹取翁というものありけり。野山に混じりて竹を取りつつ、よろづのことに使いけり。以下略。',
            'stock'=>'43',
            'img_1'=>'ex4.png',
        ]);

        DB::table('items')->insert([
            'name'=>'Nintendo Switch',
            'price'=>'32978',
            'comment'=>'ｶｯ！（SwitchのCMが始まる時に流れるあの音）',
            'stock'=>'12',
            'img_1'=>'ex5.png',
        ]);

        DB::table('items')->insert([
            'name'=>'壊れかけのレディオ',
            'price'=>'5000000',
            'comment'=>'思春期に少年てのは、大人に変わっていくもんだよな。ほんとの幸せ教えてくれよな、壊れかけのレディオ。',
            'stock'=>'78',
            'img_1'=>'ex6.png',
            'img_2'=>'ex7.png',
        ]);

        DB::table('items')->insert([
            'name'=>'ピエール瀧',
            'price'=>'2',
            'comment'=>'nameのところ、コカイン瀧と迷いましたが流石にやめました＾＾；',
            'stock'=>'2',
            'img_1'=>'ex8.png',
            'img_2'=>'ex9.png',
        ]);
    }
}
