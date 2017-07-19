<?php
/**
 * Created by PhpStorm.
 * User: chuch
 * Date: 7/17/2017
 * Time: 10:08 PM
 */
use App\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('users')->delete();
        User::create(array(
            'name'     => 'jesus',
            'email'    => 'chuchilenin@gmail.com',
            'password' => Hash::make('chuchi90'),
        ));
    }
}