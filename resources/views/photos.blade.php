@if(!Auth::check())

@extends('layouts.master')
@include('includes.restricted')

@else
@section('content')
<div style="min-height:600px;background:url('/images/backgrounder.png');">
<link rel="stylesheet" href="{{ URL::asset('css/photo.css') }}">
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<div style="text-align:center;color:#fff;"><h2 class="border-image"><em>PORTFOLIO</em></h2></div>
@if(count($errors) > 0)
    @foreach($errors as $error)
    <li>{{$error}}</li>
    @endforeach
@endif
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
<?php /*var_dump($photo);*/?>
        <li class="parent">
            <h5 class="col-md-3 text-danger"></h5>
            <div id="links leaf" class="links" style="position:relative;overflow:hidden;color:red;width:250px;height:170px;margin-bottom: 20px;">
                <a title="{{$photo['attributes']['name']}}"></a>
                    <img id="photo" class="photo img-thumbnail"src="{{$photo['attributes']['photo_path']}}" style="width:100%;height:100%;"/>

                    <div class="show-info container">
                        <div class="handler" style="position:relative;">
                            <div class="row"><h4 style="color:#fff;border-bottom:2px solid #fff;border-width:2px;" class=" text-center">{{$photo['attributes']['name']}}</h4></div>


                            <hr>

                            <div class="row">
                                <div  class="col-md-5 col-md-offset-1">
                                    <span style="color:#fff;">Description :</span>
                                </div>
                                <div class="col-md-6">
                                    <a  class="see-me">See me</a>
                                        <div id="desc" class="modal fade" style="width:500px;height:300px;display:none;">

                                            <div class="modal-header text-center">

                                              <h4 class="modal-title">Description</h4>
                                            </div>
                                            <div class="modal-body">

                                              <p data-id="{{$photo['attributes']['description']}}">{{$photo['attributes']['description']}}</p>
                                            </div>
                                        </div>

                                </div>
                            </div>

                                <div class="view-edit-delete" style="position:absolute;top:-5px;right:0;">
                                    <a href="{{$photo['attributes']['photo_path']}}" data-gallery class="text-center glyphicon glyphicon-eye-open" title="{{$photo['attributes']['name']}}"></a></br>
                                    <a href="#" class="edit glyphicon glyphicon-wrench" title="edit"></a></br>
                                    <a href="delete-image/{{$photo['attributes']['name']}}" class="glyphicon glyphicon-trash" title="delete"></a>
                                     <input type="hidden" name="_token" value="{{ csrf_token()}}">
                                </div>
                        </div>
                    </div>



                </a>

            </div>
                  <!--       <div  style="border:1px solid red;">
                            <a href="{{$photo['attributes']['photo_path']}}" data-gallery class="col-md-4 btn btn-default">view</a>
                            <a href="#" class="edit col-md-4 btn btn-primary">Edit</a>
                            <a href="delete-image/{{$photo['attributes']['name']}}" class="col-md-4 btn btn-danger">delete</a>

                        </div> -->
        </li>

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
                          <textarea class="test" name="edit-image-description"></textarea>
                        </div>
                        </div>

                            <button  type="submit"  name="edit-image" class="btn btn-danger">Update</button>
                            <input type="hidden" name="_token" value="{{ csrf_token()}}">

                    </form>

 @endforeach


        @foreach($errors as $error)
        <li>$error</li>
        @endforeach
        <script type="text/javascript" src="/js/jquery.js"></script>
        <script type="text/javascript" src="/js/jquery-ui.js"></script>

        <script type="text/javascript">

            $(document).ready(function() {
                var desc_body_id =  $('.modal-body').find('p').data("id");
                var desc_body =  $('.modal-body').find('p').val();
                //console.log(desc_body_id);
                $( ".links" ).hover(
                      function() {
                            $('.show-info').show();
                         $('.photo',this).animate({opacity:0.5},500);
                         $('.show-info',this).animate({opacity:1,left:'0px'},500);


                      }, function() {


                            $('.photo',this).css({opacity:1},500);
                            $('.show-info',this).animate({opacity:0,left:'260px'},500);
                      }
                    );

               $(".edit").on('click',function() {

                            $('.photo').css({opacity:1},500);
                            $('.show-info').animate({opacity:0,left:'260px'},1000);

                            var categ = $(this).find(".show-info").find("a").data("categ");
                            //console.log(desc_body_id);
                            $("#edit-category option:contains("+ categ +")").attr("selected","selected");
                            $('.test').text(desc_body);
                            $('#edit-image').modal();
                   });




                $('.see-me').on('click',function(e) {
                    e.preventDefault();
                    // var categ = $()

                    $(this).parent().find("#desc").find('.modal-body').find('p').dialog({modal:true});
                     var text =  $(this).parent().find('p').text();
                       console.log(text);

                         $("#desc").animate({opacity:1},1000);
                         var pr = $(this).parent().find("#desc").find('.modal-body p').text();
                         console.log(pr);
                       $(this).parent().find("#desc").find('.modal-body').find('p').modal(text);



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
