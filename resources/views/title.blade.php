@if(!Auth::check())
@include('includes.restricted')
@endif

@if(Auth::check())
@section('content')
@extends('layouts.master')
        <div class="col-md-12 table-bordered " style="background:#444;">
            <div class="row" style="text-align:center;">
                <img src="{{$movie->cover}}" style="width:70%;height:60%;box-shadow: 2px 2px 10px #FFFFFF inset,-2px -2px 10px #FFF inset;">
           
                <h3 style="font-weight: bold;color: darkred; text-shadow: 1px 0px #F10808,0px 0px #ED0707;"class="text-muted ">{{$movie->name}}</h3>
               <!-- <img class="img-thumbnail"src="{{$movie->cover}}"> -->
               <div class="category-movie"><i>Science Fiction, Adventure, Action</i></div>
            </div>
           <div class="row">
                <div class="col-md-5" style="border:1px solid red;">
                    <ul>
                        <li>Director : </li>
                        <li>Scenarist : </li>
                        <li>Starring : </li>
                        
                    </ul>

                </div>
                <div class="col-md-7" style="float:right;">
                     <iframe width="100%" height="50%" src="https://www.youtube.com/embed/{{$movie->video_id}}">
                    </iframe>
                </div>

            </div>
        </div>
@stop





      








@endif