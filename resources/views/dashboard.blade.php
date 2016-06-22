@extends('layouts.master')
@section('content')
    @include('includes.slider')
    <div>
        <div class="col-md-4 table-bordered well well-sm " style="text-align:center;">
            <h2 class="text-muted ">Random movie</h2>
            <li style="float:left;margin-left:20px;">
                    
                
                <div style="color:red;height:250px">
                    
                    <a href="" title="{{$random_movie->name}}"><img src="{{$random_movie->cover}}" style="width:100%;height:100%;"/></a>
                    
                </div><br>
                <h4 class="text-danger">{{$random_movie->name}}</h4>
            </li>
        </div>
        
        <div class="col-md-8 table-bordered well well-sm">
            <h2 class="text-muted"><span class="text-danger">Most viewed</span> movies</h2>
            <ul style="display: flex;justify-content: space-between;flex-wrap: wrap;padding:0">
                @foreach($all_movies as $movie)
                
                    <li>
                        <h5 class="col-md-3 text-danger"></h5>
                        <div style="color:red;width:200px;height:150px;margin-bottom: 20px;">
                            <a href="https://www.youtube.com/watch?v={{$movie->video_id}}" target="_blank" title="{{$movie->name}}">
                                <img class="img-thumbnail"src="{{$movie->cover}}" style="width:100%;height:100%;"/>
                            </a>
                        </div>
                    </li>
                
                    
                @endforeach
                
            </ul>
        </div>
    </div>
@stop