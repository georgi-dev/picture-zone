@extends('layouts.master')
@section('content')
    @include('includes.slider')
    <link rel="stylesheet" href="{{ URL::asset('css/dashboard.css') }}">
    <div>
        <div class="col-md-4 table-bordered well well-sm " style="text-align:center;">
            <h3 style="color:#444;" class="border-image"><em>Random photo</em></h3>
            <li style="float:left;">

                <div  class="links" style="color:red;height:250px">
                    @if($random_photo)
                    <a href="{{$random_photo->photo_path}}" data-gallery title="{{$random_photo->name}}"><img src="{{$random_photo->photo_path}}" style="width:100%;height:100%;"/></a>
                    @else
                    prazno
                    @endif
                </div><br>
                <h4 class="text-danger">{{$random_photo->name}}</h4>
                <em>{{$random_photo->username}}</em>
                <div class="text-danger category-movie"><i></i></div>

            </li>
        </div>

        <div class="col-md-8 table-bordered well well-sm text-center">
            <h3 class="border-image text-muted"><em><span class="text-danger">Most viewed</span> photos</em></h3>
            <ul style="display: flex;justify-content: space-between;flex-wrap: wrap;padding:0">

                @foreach($all_photos as $photo)

                    <li>
                        <h5 class="col-md-3 text-danger"></h5>
                        <div class="links" style="position:relative;overflow:hidden;color:red;width:250px;height:170px;margin-bottom: 20px;">
                            <a href="{{$photo->photo_path}}" data-gallery title="{{$photo->name}}">
                                <img id="photo" class="photo img-thumbnail"src="{{$photo->photo_path}}" style="width:100%;height:100%;"/>
                                <div >
                                    <input type="hidden" name="_token" value="{{ csrf_token()}}">
                                </div>
                            </a>
                                <div  class="show-info container">
                                    <div class="handler" style="position:relative;">
                                        <h4 style="color:#fff;" class= "text-center">{{$photo->name}}</h4>
                                        <hr>
                                        <div class="row" style="margin-bottom:5px;">
                                            <div  class="col-md-5 col-md-offset-1">
                                                <span style="color:#fff;">Author :</span>
                                            </div>
                                            <div class="col-md-6">
                                                <a><em>{{$photo->username}}</em></a>
                                            </div>
                                        </div>
                                        <div class="row " style="margin-bottom:5px;">
                                            <div  class="col-md-5 col-md-offset-1">
                                                <span style="color:#fff;">Category :</span>
                                            </div>
                                            <div class="col-md-6">
                                                <a href="" class="col-md-4"></a>
                                            </div>
                                        </div>
                                        <div class="row ">
                                            <div  class="col-md-5 col-md-offset-1">
                                                <span style="color:#fff;">Description :</span>
                                            </div>
                                            <div class="col-md-6">

                                                <a href="#" class="click ">See me</a>
                                                    <div id="desc" class="modal fade" style="width:500px;height:300px;display:none;">
                                                        <div class="modal-header text-center">
                                                          <h4 class="modal-title">Description</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                          <p>{{$photo->description}}</p>
                                                        </div>
                                                    </div>
                                            </div>
                                        </div>
                                            <div class="view-edit-delete" style="position:absolute;top:-5px;right:0;">
                                                <a href="{{$photo->photo_path}}" data-gallery class="text-center glyphicon glyphicon-eye-open" title="{{$photo->name}}"></a></br>
                                                 <input type="hidden" name="_token" value="{{ csrf_token()}}">
                                            </div>
                                    </div>
                                </div>
                        </div>
                    </li>


                @endforeach

            </ul>
        </div>
    </div>
        <script type="text/javascript" src="/js/jquery.js"></script>

        <script type="text/javascript">
                $(document).ready(function(){
                    // $('body').mouseleave(function(){
                    //     alert("Good bye! See you soon :)");
                    // });
                    $( ".links" ).hover(
                      function() {

                         $('.photo',this).animate({opacity:0.5},500);
                         $('.show-info',this).animate({opacity:1,left:'0px'},500);


                      }, function() {


                            $('.photo',this).css({opacity:1},500);
                            $('.show-info',this).animate({opacity:0,left:'260px'},500);
                      }
                    );

                    $('.click').on('click',function(event) {
                    event.preventDefault();
                        $('#desc').animate({opacity:1},1000);
                        $('#desc').modal();

                    });


                });

        </script>
@stop
