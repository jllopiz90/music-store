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

            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">{{$artist->name}}</div>

                        <div class="panel-body">
                            <ul class="Portfolio-nav wow fadeIn delay-02s">
                                <li class="homeList">
                                    <div class="portfolioContainer wow fadeInUp delay-04s" id="albumsContainer">
                                        @foreach($artist->albums as $album)
                                            <div class=" Portfolio-box albumCont">
                                                <a href="{{route('albumDetail',$album->id)}}"><img src="../{{$album->picture}}" alt=""></a>
                                                <h3>{{$album->name}}</h3>
                                                @if(($aux_artist = $album->artist) != '')
                                                    <p>{{$aux_artist->name}}</p>
                                                @endif
                                            </div>
                                        @endforeach
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

    </div>

@endsection
@section('logofooter')
    <div class="footer-logo"><a href="#"><img src="../img/footer-logo.png" alt=""></a></div>
@endsection
