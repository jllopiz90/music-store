@extends('layouts.app')
@section('favicon')
    <link rel="icon" href="../favicon.png" type="image/png">
    <link rel="shortcut icon" href="../favicon.ico" type="img/x-icon">
@endsection
@section('logo')
    <figure class="logo animated fadeInDown delay-07s">
        <a href="#"><img src="../img/logo.png" alt=""></a>
    </figure>
@endsection
@section('content')
    <div class="flex-center position-ref full-height">
        <nav class="main-nav-outer" id="test"><!--main-nav-start-->
            <div class="container">
                <ul class="main-nav">
                    <li><a href="{{url('home')}}">Home</a></li>
                    <li><a href="{{url('/')}}">WELCOME</a></li>
                </ul>
                <a class="res-nav_click" href="#"><i class="fa-bars"></i></a>
            </div>
        </nav>

        <div class="content">
            <section class="main-section" id="ArtistsSection"><!--main-section-start-->
                <div class="container">
                    <h2>Artists</h2>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 wow fadeInLeft delay-05s artists-container">
                            <div id="artistCont" data-totalpages="{{$totalPag}}" data-page="{{$page}}">
                                <div id="artistContainer">
                                @foreach($artists as $artist)
                                    <div class="service-list" id="artist_{{$artist->id}}">
                                        <div class="service-list-col1">
                                            <i class="fa-microphone"></i>
                                        </div>
                                        <div class="service-list-col2">
                                            <h3>
                                                <div class="col-md-7">
                                                    <a href="{{route('artistDetail',$artist->id)}}" id="artistName_{{$artist->id}}" class="artistLink">{{$artist->name}}</a>
                                                </div>
                                                @if(Auth::user()->authorizeRoles(['admin']))
                                                    <div class="col-md-5">
                                                        <i class="fa fa-pencil artistEdit" data-arid="{{$artist->id}}" aria-hidden="true"></i>
                                                        <i class="fa fa-trash-o deleteArtist" data-arid="{{$artist->id}}" aria-hidden="true"></i>
                                                    </div>
                                                @endif
                                            </h3>
                                            <div id="editArtistName_{{$artist->id}}" class="editArtistName">
                                                <div class="col-md-7">
                                                    <input type="text" id="newArtistName_{{$artist->id}}" value="{{$artist->name}}">
                                                </div>
                                                <div class="col-md-5">
                                                    <i class="fa fa-check acceptEdit" data-arid="{{$artist->id}}" aria-hidden="true"></i>
                                                    <i class="fa fa-times cancelEdit" data-arid="{{$artist->id}}" aria-hidden="true"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                </div>
                                @if($totalPag>1)
                                    <div class="col-lg-12 col-md-12 col-sm-12 artistNav">
                                        <a href="javascript:void(0);" id="prevArtistPag" class="fl-lt"> <i class="fa fa-chevron-left" aria-hidden="true"></i>PREV</a>
                                        <span class="col-lg-offset-3 col-md-offset-3"><i class="fa fa-file-o" aria-hidden="true"></i> <span id="currentArtistPage">{{$page+1}}</span>/<span id="totalArtistPAg">{{$totalPag}}</span></span>
                                        <a href="javascript:void(0);" id="nextArtistPag" class="col-lg-offset-4 col-md-offset-4"> <i class="fa fa-chevron-right" aria-hidden="true"></i>NEXT</a>
                                    </div>
                                @endif
                            </div>
                            @if(Auth::user()->authorizeRoles(['admin']))
                                <ul class="Portfolio-nav wow fadeIn delay-02s fl-lt">
                                    <li class="homeList">
                                        <a href="javascript:void(0);" id="newArtist">Create New Artist</a>
                                    </li>
                                </ul>
                            @endif
                        </div>
                        <figure class="col-lg-6 col-md-6 col-sm-6  text-right wow fadeInUp delay-02s">
                            <img src="img/music.jpg" alt="">
                        </figure>
                    </div>
                    <div class="row" id="createArtist">
                        <div class="col-md-1">
                            <label>Name</label>
                        </div>
                        <div class="col-md-4">
                            <input type="text" name="artistName" id="artistName">
                        </div>
                        <div class="col-md-2">
                            <button id="createArtistBtn" class="btn btn-primary">Create</button>
                        </div>
                    </div>
                </div>
            </section><!--main-section-end-->
        </div>
    </div>

@endsection
@section('logofooter')
    <div class="footer-logo"><a href="#"><img src="../img/footer-logo.png" alt=""></a></div>
@endsection

