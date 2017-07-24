@extends('layouts.app')
@section('favicon')
    <link rel="icon" href="favicon.png" type="image/png">
    <link rel="shortcut icon" href="favicon.ico" type="img/x-icon">
@endsection
@section('logo')
    <figure class="logo animated fadeInDown delay-07s">
        <a href="#"><img src="img/logo.png" alt=""></a>
    </figure>
@endsection
@section('content')
    <div class="flex-center position-ref full-height">
        <nav class="main-nav-outer" id="test"><!--main-nav-start-->
            <div class="container">
                <ul class="main-nav">
                    <li><a href="{{url('home')}}">Home</a></li>
                    <li><a href="#ArtistsSection">Artists</a></li>
                    <li><a href="#AlbumsSection">Albums</a></li>
                </ul>
                <a class="res-nav_click" href="#"><i class="fa-bars"></i></a>
            </div>
        </nav><!--main-nav-end-->

        <div class="content">
            <section class="main-section" id="ArtistsSection"><!--main-section-start-->
                <div class="container">
                    <h2>Artists</h2>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 wow fadeInLeft delay-05s artists-container" id="artistContHome" data-totalpages="{{$totalPag}}" data-page="{{$page}}">
                            <div id="artistContainer">
                            @foreach($artists as $artist)
                                <div class="service-list">
                                    <div class="service-list-col1">
                                        <i class="fa-music"></i>
                                    </div>
                                    <div class="service-list-col2">
                                        <h3><a href="{{route('artistDetail',$artist->id)}}" class="artistLink" data-aid="{{$artist->id}}">{{$artist->name}}</a></h3>
                                    </div>
                                </div>
                            @endforeach
                            </div>
                            @if($totalPag>1)
                                <div class="col-lg-12 col-md-12 col-sm-12 artistNav">
                                    <a href="javascript:void(0);" id="prevArtistHome" class="fl-lt"> <i class="fa fa-chevron-left" aria-hidden="true"></i>PREV</a>
                                    <span class="col-lg-offset-3 col-md-offset-3"><i class="fa fa-file-o" aria-hidden="true"></i> <span id="currentArtistHomePage">{{$page+1}}</span>/<span id="totalArtistHomePAg">{{$totalPag}}</span></span>
                                    <a href="javascript:void(0);" id="nextArtistHome" class="col-lg-offset-4 col-md-offset-4"> <i class="fa fa-chevron-right" aria-hidden="true"></i>NEXT</a>
                                </div>
                            @endif
                        </div>
                        <figure class="col-lg-6 col-md-6 col-sm-6  text-right wow fadeInUp delay-02s">
                            <img src="img/music.jpg" alt="">
                        </figure>
                    </div>
                </div>
            </section><!--main-section-end-->


            <section class="main-section paddind" id="AlbumsSection"><!--main-section-start-->
                <div class="container">
                    <h2>Albums</h2>
                    <div class="portfolioFilter">
                        <ul class="Portfolio-nav wow fadeIn delay-02s">
                            <li><a href="#" data-filter="*" class="current" >All</a></li>
                            @foreach($genres as $genre)
                                <li><a href="#" data-filter=".{{$genre}}" >{{$genre}}</a></li>
                            @endforeach
                        </ul>
                    </div>

                </div>
                <div class="portfolioContainer wow fadeInUp delay-04s" id="albumsContainer">
                    @foreach($albums as $album)
                        <div class=" Portfolio-box {{$album->genre}} albumCont">
                            <a href="{{route('albumDetail',$album->id)}}"><img src="{{$album->picture}}" alt=""></a>
                            <h3>{{$album->name}}</h3>
                            @if(($aux_artist = $album->artist) != '')
                                <p>{{$aux_artist->name}}</p>
                            @endif
                        </div>
                    @endforeach
                </div>
            </section><!--main-section-end-->

        </div>
    </div>
@endsection
@section('logofooter')
    <div class="footer-logo"><a href="#"><img src="img/footer-logo.png" alt=""></a></div>
@endsection
