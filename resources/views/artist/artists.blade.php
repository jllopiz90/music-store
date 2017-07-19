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
                        <div class="col-lg-4 col-sm-6 wow fadeInLeft delay-05s artists-container">
                            <div id="artistCont">
                                @foreach($artists as $artist)
                                    <div class="service-list" id="artist_{{$artist->id}}">
                                        <div class="service-list-col1">
                                            <i class="fa-microphone"></i>
                                        </div>
                                        <div class="service-list-col2">
                                            <h3><a href="{{route('artistDetail',$artist->id)}}" class="artistLink">{{$artist->name}}</a></h3>
                                        </div>
                                        <div class="service-list-col3">
                                            <h3><a href="javascript:void(0);" class="btn btn-danger deleteArtist" data-arid="{{$artist->id}}" >Delete</a></h3>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <ul class="Portfolio-nav wow fadeIn delay-02s fl-lt">
                                <li class="homeList">
                                    <a href="javascript:void(0);" id="newArtist">Create New Artist</a>
                                </li>
                            </ul>
                        </div>
                        <figure class="col-lg-8 col-sm-6  text-right wow fadeInUp delay-02s">
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

