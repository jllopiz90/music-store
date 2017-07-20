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
use Illuminate\Support\Facades\Response;


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
        $albums = Album::orderBy('name','asc')->get();
        $artists = Artist::orderBy('name','asc')->get();
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
        $coverName = Input::get('COVER');
        $newAlbum = new Album(); //(['name'=>$name,'artist_id'=>$arid,'genre'=>$genre,'picture'=>'img/newalbum.jpg']);
        $newAlbum->name = $name;
        $newAlbum->artist_id = $arid;
        $newAlbum->genre = $genre;
        if($coverName != '')
            $newAlbum->picture = 'img/'.$coverName;
        else
            $newAlbum->picture = 'img/newalbum.jpg';
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

    public function goToEdit($id){
        $album = Album::find($id);
        $artists = Artist::orderBy('name','asc')->get();
        return view('album/albumEdit',['album'=>$album,'artists'=>$artists]);
    }

    public function editAlbum(){
        $id = Input::get('ID');
        $name = Input::get('NAME');
        $artist_id = Input::get('ARTISTID');
        $coverName = Input::get('COVER');

        $album = Album::find($id);
        if($album == null)
            return -1;

        $album->name =$name;
        $album->artist_id = $artist_id;
        if($coverName != '')
            $album->picture = 'img/'.$coverName;
        $album->save();

        return json_encode($id);
    }

    public function uploadCover(){
        $file = Input::file('file');
        $destinationPath = 'img';
        // If the uploads fail due to file system, you can try doing public_path().'/uploads'
        //$filename = str_random(12);
        $filename = $file->getClientOriginalName();
        //$extension =$file->getClientOriginalExtension();
        $upload_success = Input::file('file')->move($destinationPath, $filename);

        if( $upload_success ) {
            return json_encode($filename);
        } else {
            return Response::json('error', 400);
        }
    }
}