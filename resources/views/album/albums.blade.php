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
<div class="container">
    <nav class="main-nav-outer" id="test"><!--main-nav-start-->
        <div class="container">
            <ul class="main-nav">
                <li><a href="{{url('home')}}">Home</a></li>
                <li><a href="{{url('/')}}">WELCOME</a></li>
            </ul>
            <a class="res-nav_click" href="#"><i class="fa-bars"></i></a>
        </div>
    </nav>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <section class="main-section paddind" id="AlbumsSection"><!--main-section-start-->
                    <div class="container">
                        <h2>Albums</h2>
                        <div class="portfolioFilter">
                            <ul class="Portfolio-nav wow fadeIn delay-02s">
                                <li><a href="#" data-filter="*" class="current" >All</a></li>
                                @foreach($genres as $genre)
                                    <li><a href="#" data-filter=".{{$genre}}" >{{$genre}}</a></li>
                                @endforeach
                                <li><a href="javascript:void(0);" id="newAlbum">Create New Album</a></li>
                            </ul>
                        </div>
                        <div id="createAlbum">
                            <div class="col-md-1">
                                <label>Name</label>
                            </div>
                            <div class="col-md-2">
                                <input type="text" name="albumName" id="albumName">
                            </div>
                            <div class="col-md-1">
                                <label>Genre</label>
                            </div>
                            <div class="col-md-2">
                                <input type="text" name="albumGenre" id="albumGenre">
                            </div>
                            <div class="col-md-1">
                                <label>Artist</label>
                            </div>
                            <div class="col-md-3">
                                <select id="artistAlbum">
                                    <option value="0">Select Artist</option>
                                    @foreach($artists as $artist)
                                        <option value="{{$artist->id}}">{{$artist->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-2">
                                <button id="createAlbumtBtn" class="btn btn-primary">Create</button>
                            </div>
                        </div>
                    </div>
                    <div class="portfolioContainer wow fadeInUp delay-04s" id="albumsContainer">
                        @foreach($albums as $album)
                            <div class=" Portfolio-box {{$album->genre}} albumCont">
                                <a href="{{route('albumDetail',$album->id)}}"><img src="../{{$album->picture}}" alt=""></a>
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
    </div>
</div>
@endsection
@section('logofooter')
    <div class="footer-logo"><a href="#"><img src="../img/footer-logo.png" alt=""></a></div>
@endsection