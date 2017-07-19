<?php
/**
 * Created by PhpStorm.
 * User: chuch
 * Date: 7/17/2017
 * Time: 11:33 PM
 */
namespace App\Http\Controllers;

use App\Album;
use App\Artist;
use Illuminate\Support\Facades\Input;

class AlbumController extends Controller
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
        $albums = Album::all();
        $artists = Artist::all();
        $genres=[];
        foreach ($albums as $album){
            if(!in_array($album->genre,$genres))
                $genres[]=$album->genre;
        }
        return view('album/albums',['albums'=> $albums,'genres'=>$genres, 'artists'=>$artists]);
    }

    public function album($id)
    {
//        $aid = Input::get('ID');
        $album = Album::find($id);
        return view('album/albumDetails',['album'=> $album]);

    }

    public function create(){
        $name = Input::get('NAME');
        $arid = Input::get('ARID');
        $genre =Input::get('GENRE');
        $newAlbum = new Album(['name'=>$name,'artist_id'=>$arid,'genre'=>$genre,'picture'=>'img/newalbum.jpg']);
        $newAlbum->save();
        if($newAlbum == null)
            return -1;

        $auxArtist = $newAlbum->artist;
        return json_encode($auxArtist->id);


    }

    public function delete(){
        $alid = Input::get('ALID');
        $album = Album::find($alid);
        if($album == null)
            return -1;

        $artis_id = $album->artist_id;
        $album->delete();
        return json_encode($artis_id);



    }
}