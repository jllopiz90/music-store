<?php
/**
 * Created by PhpStorm.
 * User: chuch
 * Date: 7/17/2017
 * Time: 11:34 PM
 */
namespace App\Http\Controllers;

use App\Artist;
use App\Album;
use Illuminate\Support\Facades\Input;
use Illuminate\Validation\Rules\In;


class ArtistController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $artist = Artist::orderBy('name','asc')->get();
        return view('artist/artists',['artists'=> $artist]);
    }

    public function artist($id)
    {
//        $aid = Input::get('ID');
        $artist = Artist::find($id);
        return view('artist/artistDetails',['artist'=> $artist]);

    }

    public function create(){
        $name = Input::get('NAME');
        $newArtist = new Artist(['name'=>$name]);
        $newArtist->save();
        if($newArtist == null)
            return -1;
        return json_encode($newArtist);
    }

    public function edit(){
        $id =Input::get('ARID');
        $name = Input::get('NAME');

        $artist = Artist::where('id',$id)->first();
        if($artist == null)
            return -1;

        $artist->name = $name;
        $artist->save();
        return json_encode($artist);
    }

    public function delete(){
        $aid =Input::get('ARID');
        $artist = Artist::find($aid);
        if($artist !=null) {
            foreach ($artist->albums as $album)
                $album->delete();
            $artist->delete();
            return $aid;
        }
        return -1;

    }
}