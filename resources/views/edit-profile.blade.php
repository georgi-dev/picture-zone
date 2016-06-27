@extends('layouts.master')
@section('title')
@stop
@section('content')
<div style="background:#444;">
    <div class="row">
    	<div class="col-md-3" style="margin-left: 4%;">
    		<h3>Sign Up</h3>
    		<form  method="post" action="{{route('update-profile')}}" file="true" style="line-height: 239%;" enctype="multipart/form-data">
    		
                <div class="for-group">
                    <label for="username">Your Username</label>
                    <input class="form-control" type="text" name="username" id="username">
                </div>

                 <div class="for-group">
                    <label for="first_name">First name</label>
                    <input class="form-control" type="text" name="first_name" id="first_name">
                </div>

                 <div class="for-group">
                    <label for="last_name">Last name</label>
                    <input class="form-control" type="text" name="last_name" id="last_name">
                </div>

                <div class="for-group">
                    <label for="image">Your Image</label>
                    <input class="form-control" type="file" name="image" id="image">
                </div>
                <input type="hidden" name="id" value="{{Auth::user()->id}}">

    			<br>
    			<button type="submit" name="submit" class="btn btn-danger" data-ajax="show">Update</button>
    			<input type="hidden" name="_token" value="{{ csrf_token()}}">
    		</form>

             @foreach($errors->all() as $error)
            <h5 class="alert alert-danger">* {{$error}}</h5>
            @endforeach

    	</div>	
    	<div class="col-md-6 col-md-offset-2" >
    		<img src="/images/dracula.jpg" style="width:100%; height:auto;padding:30px;">

    	</div>
    </div>
</div>	
@stop