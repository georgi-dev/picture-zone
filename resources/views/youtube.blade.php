@extends('layouts.master')
@section('title')
@stop
@section('content')

             @foreach($movie_obj as $movie)
             {{$movie->snippet->title}}
            <h5 class="alert alert-danger">* {{$movie->snippet->title}}</h5>
            @endforeach

    	
@stop