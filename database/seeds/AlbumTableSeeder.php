<?php
/**
 * Created by PhpStorm.
 * User: chuch
 * Date: 7/17/2017
 * Time: 10:43 PM
 */
use App\Album;
use Illuminate\Database\Seeder;

class AlbumTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('albums')->delete();
        Album::create(array(
            'artist_id'=> 1,
            'name'     => 'The Dark Side of the Moon',
            'genre' => 'Rock',
            'picture'=> 'img/darkside.jpg',

        ));
        Album::create(array(
            'artist_id'=> 1,
            'name'     => 'The Wall',
            'genre' => 'Rock',
            'picture'=> 'img/thewall.jpg',

        ));
        Album::create(array(
            'artist_id'=> 2,
            'name'     => 'Let It Bleed',
            'genre' => 'Rock',
            'picture'=> 'img/letitbleed.jpg',

        ));
        Album::create(array(
        'artist_id'=> 3,
        'name'     => 'Miles Davis',
        'genre' => 'Jazz',
        'picture'=> 'img/kindofblue.jpg',

        ));
        Album::create(array(
            'artist_id'=> 4,
            'name'     => 'John Coltrane',
            'genre' => 'Jazz',
            'picture'=> 'img/bluetrain.jpg',

        ));
        Album::create(array(
            'artist_id'=> 5,
            'name'     => 'Electric Mud',
            'genre' => 'Blues',
            'picture'=> 'img/electricmud.jpg',

        ));
        Album::create(array(
            'artist_id'=> 6,
            'name'     => 'The Best of Litle Walter',
            'genre' => 'Blues',
            'picture'=> 'img/bestofthewalter.jpg',

        ));
    }
}