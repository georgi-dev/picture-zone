@if(!Auth::check())

@extends('layouts.master')
@include('includes.restricted')

@else
@section('content')
<div style="min-height:600px;background:url('/images/backgrounder.png');">
<link rel="stylesheet" href="{{ URL::asset('css/photo.css') }}">
<div style="text-align:center"><h2 class="border-image"><em>PORTFOLIO</em></h2></div>

<div class="col-md-3" style="margin-left: 4%;    float: right;">
    <h3 >Add image</h3>
    <form  method="post" id="upload_form"action="{{route('add.image')}}" file="true" style="line-height: 239%;" enctype="multipart/form-data">
    
        

        <div class="for-group">
            <label for="image"></label>
            <input class="form-control" type="file" name="image" id="image">

        </div>

        <div class="for-group">
            <label for="body"></label>
            <textarea class="form-control" name="body" id="body"></textarea>

        </div>

        <div class="for-group">
            <label for="category"></label>
            <select class="form-control" name="category" id="category">

                <option>panorama</option>
                <option>animals</option>
                <option>whatever</option>

            </select>

        </div>

        <input type="hidden" name="id" value="{{Auth::user()->id}}">

        <br>
        <button  type="submit" id="addbtn" name="submit" class="btn btn-danger" data-ajax="show">Add</button>
        <input type="hidden" name="_token" value="{{ csrf_token()}}">
    </form>

</div>  
  <script>
  
    
  </script>
</head>
<body> 

    @foreach($photos as $photo)

        <li class="parent">
            <h5 class="col-md-3 text-danger"></h5>
            <div id="links leaf" class="links" style="color:red;width:200px;height:150px;margin-bottom: 20px;">
                <a title="{{$photo['attributes']['name']}}"></a>
                    <img id="photo" class="photo img-thumbnail"src="{{$photo['attributes']['photo_path']}}" style="width:100%;height:100%;"/>
                   
                    <div  class="show-info container" style="display:none;">
                        <h4 style="color:#fff;" class="text-center">{{$photo['attributes']['name']}}</h4>
                        <hr>
                        <div class="row">
                            <div  class="col-md-5 col-md-offset-1">
                                <span style="color:#fff;">Category :</span>
                            </div>
                            <div class="col-md-6">
                                <a href="" class="col-md-4">{{$photo['attributes']['category']}}</a>
                            </div>
                        </div>
                        <hr>

                        <div class="row">
                            <div  class="col-md-5 col-md-offset-1">
                                <span style="color:#fff;">Description :</span>
                            </div>
                            <div class="col-md-6">
                                <a  href="" class="col-md-6">{{$photo['attributes']['description']}}</a>
                            </div>
                        </div>
                        <hr>
                       
                    </div>

                                <form id="edit-image" method="post" action="edit-image/{{$photo['attributes']['name']}}" style="display:none;">
                                    <input type="hidden" name="image-name" value="{{$photo['attributes']['name']}}">
                                    <div class="row">
                                        <div  class="col-md-5 col-md-offset-1">
                                            <span >Category :</span>
                                        </div>
                                        <div class="col-md-6">
                                            <select class="form-control" name="edit-image-category" id="edit-category">

                                                <option>panorama</option>
                                                <option>animals</option>
                                                <option>whatever</option>

                                            </select>
                                        </div>
                                    </div>
                                    <hr>

                                    <div class="row">
                                    <div  class="col-md-5 col-md-offset-1">
                                        <span>Description :</span>
                                    </div>
                                    <div class="col-md-6">
                                      <textarea name="edit-image-description"value="{{$photo['attributes']['description']}}"></textarea>
                                    </div>
                                    </div>

                                        <button  type="submit" id="edit-image" name="edit-image" class="btn btn-danger">Update</button>
                                        <input type="hidden" name="_token" value="{{ csrf_token()}}">

                                </form>

                </a>
                
            </div>
                        <div  style="border:1px solid red;">
                            <a href="{{$photo['attributes']['photo_path']}}" data-gallery class="col-md-4 btn btn-default">view</a>
                            <a href="#" class="edit col-md-4 btn btn-primary">Edit</a>
                            <a href="delete-image/{{$photo['attributes']['name']}}" class="col-md-4 btn btn-danger">delete</a>
                            <input type="hidden" name="_token" value="{{ csrf_token()}}">
                        </div>
        </li>

    @endforeach
        @foreach($errors as $error)
        <li>$error->message</li>
        @endforeach
        <script type="text/javascript" src="/js/jquery.js"></script>

        <script type="text/javascript">
        $(document).ready(function() {


            $( ".links" ).hover(
                  function() {
                    
                    $('.show-info',this).show();
                  
          
                  }, function() {
                    $('.show-info',this).hide();
                  }
                );

           $('.edit').click(function() {

                    $('.edit-image',this).modal('.edit');

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
