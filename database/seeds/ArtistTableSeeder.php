<?php
/**
 * Created by PhpStorm.
 * User: chuch
 * Date: 7/17/2017
 * Time: 10:14 PM
 */
use App\Artist;
use Illuminate\Database\Seeder;

class ArtistTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('artists')->delete();
        Artist::create(array(
            'name'     => 'Pink Floyd',
        ));
        Artist::create(array(
            'name'     => 'The Rolling Stones',
        ));
        Artist::create(array(
            'name'     => 'Miles Davis',
        ));
        Artist::create(array(
            'name'     => 'John Coltrane',
        ));
        Artist::create(array(
            'name'     => 'Muddy Waters',
        ));
        Artist::create(array(
            'name'     => 'Litle Walter',
        ));
    }
}