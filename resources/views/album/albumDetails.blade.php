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
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">ALBUM</div>

                    <div class="panel-body">
                        <ul class="Portfolio-nav wow fadeIn delay-02s">
                            <li class="homeList">
                                @if(($aux_artist = $album->artist) != '')
                                    <a href="{{route('artistDetail',$aux_artist->id)}}">{{$aux_artist->name}}</a>
                                @endif
                                <h2>{{$album->name}}</h2>
                                <img src="../{{$album->picture}}" alt="" />
                                <br><br>
                                @if(Auth::user()->authorizeRoles(['admin']))
                                    <a class="btn btn-danger" href="javascript:void(0);" id="albumDelete" data-alid="{{$album->id}}">DELETE</a>
                                    <a class="btn btn-warning" href="{{route('albumGoEdit',$album->id)}}" id="albumEdit">EDIT</a>
                                @endif
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
