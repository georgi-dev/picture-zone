@if(!Auth::check())

@extends('layouts.master')
@include('includes.restricted')

@else
@section('content')
<div style="min-height:600px;background:url('/images/backgrounder.png');">
<link rel="stylesheet" href="{{ URL::asset('css/photo.css') }}">
<div style="text-align:center"><h2><em>PORTFOLIO</em></h2></div>

<div class="col-md-3" style="margin-left: 4%;    float: right;">
    <h3>Add image</h3>
    <form  method="post" id="upload_form"action="{{route('add.image')}}" file="true" style="line-height: 239%;" enctype="multipart/form-data">
    
        

        <div class="for-group">
            <label for="image"></label>
            <input class="form-control" type="file" name="image" id="image">

        </div>
        <input type="hidden" name="id" value="{{Auth::user()->id}}">

        <br>
        <button  type="submit" id="addbtn" name="submit" class="btn btn-danger" data-ajax="show">Add</button>
        <input type="hidden" name="_token" value="{{ csrf_token()}}">
    </form>

</div>  

    @foreach($photos as $photo)

        <li>
            <h5 class="col-md-3 text-danger"></h5>
            <div style="color:red;width:200px;height:150px;margin-bottom: 20px;">
                <a title="{{$photo['attributes']['name']}}">
                    <img id="photo" class="photo img-thumbnail"src="{{$photo['attributes']['photo_path']}}" style="width:100%;height:100%;"/>
                    <div >
                        <a href="#" class="col-md-4 btn btn-default view">view</a>
                        <a href="" class="col-md-4 btn btn-primary">Edit</a>
                        <a href="delete-image/{{$photo['attributes']['name']}}" class="col-md-4 btn btn-danger">delete</a>
                        <input type="hidden" name="_token" value="{{ csrf_token()}}">
                    </div>
                </a>
                
            </div>
        </li>

    @endforeach
              @if(Storage::disk('public')->has(Auth::user()->last_name . '-' . Auth::user()->id . '.jpg'))
        <li>
            <h5 class="col-md-3 text-danger"></h5>
            <div style="color:red;width:200px;height:150px;margin-bottom: 20px;">
                <a title="{{$photo['attributes']['name']}}">
                    <img class="img-thumbnail" src="{{ route ('show.photo',['filename' => Auth::user()->last_name . '-'  . Auth::user()->id . '.jpg'])}}" style="width:100%;height:100%;">

                </a>
            </div>
        </li>
              @endif  
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>

        <script type="text/javascript">
        $(document).ready(function() {

             $(".view").click(function(){

                $('(this).photo').css({'width':'700','height':'400'});
             });
            // $("#addbtn").click(function(){
            
            //          console.log('Ready!!!');

            //         $.ajax({
            //               url:'add-image',
            //               data:new FormData($("#upload_form")[0]),
            //               dataType:'json',
            //               async:false,
            //               type:'post',
            //               processData: false,
            //               contentType: false,
            //               success:function(response){
            //                 console.log(response);
            //                 $('#photo').attr('src',response.file_path);
            //               },
            //         });
                      
            // });

        });

            
        </script>
</div>
@stop
@endif
