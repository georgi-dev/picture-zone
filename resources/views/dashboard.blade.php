@extends('layouts.master')
@section('content')
    @include('includes.slider')
    <div>
        <div class="col-md-4 table-bordered well well-sm " style="text-align:center;">
            <h3 style="color:#444;" class="border-image"><em>Random photo</em></h3>
            <li style="float:left;">
                
                <div  class="links" style="color:red;height:250px">
                    @if($random_photo)
                    <a href="{{$random_photo['attributes']['photo_path']}}" data-gallery title="{{$random_photo->name}}"><img src="{{$random_photo['attributes']['photo_path']}}" style="width:100%;height:100%;"/></a>
                    @else
                    prazno
                    @endif
                </div><br>
                <h4 class="text-danger">{{$random_photo->name}}</h4>
                <div class="text-danger category-movie"><i>Science Fiction, Adventure, Action</i></div>
            </li>
        </div>
        
        <div class="col-md-8 table-bordered well well-sm text-center">
            <h3 class="border-image text-muted"><em><span class="text-danger">Most viewed</span> photos</em></h3>
            <ul style="display: flex;justify-content: space-between;flex-wrap: wrap;padding:0">
                @foreach($all_photos as $photo)
                
                    <li>
                        <h5 class="col-md-3 text-danger"></h5>
                        <div class="links" style="color:red;width:200px;height:150px;margin-bottom: 20px;">
                            <a href="{{$photo['attributes']['photo_path']}}" data-gallery title="{{$photo['attributes']['name']}}">
                                <img id="photo" class="photo img-thumbnail"src="{{$photo['attributes']['photo_path']}}" style="width:100%;height:100%;"/>
                                <div >
                                    <input type="hidden" name="_token" value="{{ csrf_token()}}">
                                </div>

                            </a>
                            
                        </div>
                    </li>
                
                    
                @endforeach
                
            </ul>
        </div>
    </div>
@stop