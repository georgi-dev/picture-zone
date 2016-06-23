@extends('layouts.master')
@section('content')
    @include('includes.slider')
    <div>
        <div class="col-md-4 table-bordered well well-sm " style="text-align:center;">
            <h3 style="color:#444;float:left;">Random movie</h3>
            <li style="float:left;">
                    
                
                <div style="color:red;height:250px">
                    
                    <a href="title/{{$random_movie->name_slug}}" title="{{$random_movie->name}}"><img src="{{$random_movie->cover}}" style="width:100%;height:100%;"/></a>
                    
                </div><br>
                <h4 class="text-danger">{{$random_movie->name}}</h4>
                <div class="text-danger category-movie"><i>Science Fiction, Adventure, Action</i></div>
            </li>
        </div>
        
        <div class="col-md-8 table-bordered well well-sm">
            <h3 class="text-muted"><span class="text-danger">Most viewed</span> movies</h3>
            <ul style="display: flex;justify-content: space-between;flex-wrap: wrap;padding:0">
                @foreach($all_movies as $movie)
                
                    <li>
                        <h5 class="col-md-3 text-danger"></h5>
                        <div style="color:red;width:200px;height:150px;margin-bottom: 20px;">
                            <a href="./title/<?=preg_replace("/\-\#{1,}/", "-",htmlspecialchars(($movie->name_slug)))?>" title="{{$movie->name}}">
                                <img class="img-thumbnail"src="{{$movie->cover}}" style="width:100%;height:100%;"/>
                            </a>
                        </div>
                    </li>
                
                    
                @endforeach
                
            </ul>
        </div>
    </div>
@stop