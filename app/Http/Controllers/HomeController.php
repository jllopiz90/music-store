<?php

namespace App\Http\Controllers;

use App\Album;
use App\Artist;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//      $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function welcome()
    {
        $albums = Album::orderBy('name','asc')->get();
        $artists = Artist::orderBy('name','asc')->take(5)->get();
        $totalPag = ceil(Artist::count()/5);
        $genres=[];
        foreach ($albums as $album){
            if(!in_array($album->genre,$genres))
                $genres[]=$album->genre;
        }
        return view('welcome',['albums' => $albums, 'artists'=>$artists,'genres'=>$genres,'page'=>0,'totalPag'=>$totalPag]);
    }
}
