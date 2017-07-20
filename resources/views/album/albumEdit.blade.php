@extends('layouts.app')
@section('favicon')
    <link rel="icon" href="../../favicon.png" type="image/png">
    <link rel="shortcut icon" href="../../favicon.ico" type="img/x-icon">
@endsection
@section('logo')
    <figure class="logo animated fadeInDown delay-07s">
        <a href="#"><img src="../../img/logo.png" alt=""></a>
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
                    <div class="panel-heading">EDIT ALBUM</div>

                    <div class="panel-body">
                        <div class="editAlbumPanel row">
                            <div class="col-md-8 editAlbumElement">
                                <span class="col-md-4">Album Name</span>
                                <input class="col-md-5" type="text" name="albumEditName" id="albumEditName" value="{{$album->name}}">
                            </div>
                            <div>
                                <!-- here will be the image-->
                            </div>
                            <div class="col-md-8 editAlbumElement">
                                <span class="col-md-4">Album Artist</span>
                                <select id="artistAlbumSelect" class="col-md-5" name="artistAlbumSelect">
                                    @foreach($artists as $artist)
                                        <option value="{{$artist->id}}" @if($artist->id == $album->artist_id) selected @endif>
                                            {{$artist->name}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-8 editAlbumElement">
                                <span class="col-md-4"><i class="fa fa-cloud-upload" aria-hidden="true" style="color: deepskyblue;"></i>&nbsp; Select Imagen </span>
                                <form action="/album/uploadCover" class="dropzone col-md-5 mydropzone">
                                    {!! csrf_field() !!}
                                    {{--<div class="fallback">--}}
                                    {{--</div>--}}
                                    {{--<input name="fileName" id="fileName" value="{{ csrf_token() }}" type="text" hidden>--}}
                                </form>
                            </div>
                            <div class="editAlbumChoice col-md-12">
                                <a id="acceptAlbumEdit" class="btn btn-success fl-rt" data-alid="{{$album->id}}"><i class="fa fa-check-square fa-2x" aria-hidden="true"></i></a>
                                <a id="canceltAlbumEdit" href="{{route('albumDetail',$album->id)}}" class="btn btn-danger col-md-3" data-alid="{{$album->id}}"><i class="fa fa-arrow-circle-left fa-2x" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;Go Back</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
@section('logofooter')
    <div class="footer-logo"><a href="#"><img src="../../img/footer-logo.png" alt=""></a></div>
@endsection
