@extends('layouts.master')
@section('title')
@stop
@section('content')
<div style="background:#444;">
    <div class="row">
    	<div class="col-md-3" style="margin-left: 4%;">
    		<h3>Sign In</h3>
    		<form  method="post" action="{{route('login')}}" style="line-height: 239%;">
    			<div class="for-group">
	    			<label for="email">Your E-mail</label>
	    			<input class="form-control" type="text" name="email" id="email">
    			</div>
    			<div class="for-group">
	    			<label for="password">Your Password</label>
	    			<input class="form-control" type="password" name="password" id="password">
    			</div></br>
    			<button type="submit" name="submit" class="btn btn-danger" data-ajax="show">Sign in</button></br> Not a member? <a class="btn btn-link " style="color:#999;" href="login">Create an account</a>
    			<input type="hidden" name="_token" value="{{ csrf_token()}}">
    		</form>
            
             @foreach($errors->all() as $error)
            <h4 style="color:red;">{{$error}}</h4>
            @endforeach

    	</div>	
    	<div class="col-md-6 col-md-offset-2" >
    		<img src="/images/dracula.jpg" style="width:100%; height:auto;padding:30px;">

    	</div>
    </div>
</div>	
<script src="/js/jquery.js"></script>
<script>
    
    $(function(){
        // console.log("sign in");
        // $('button').click(function(event){
        //     event.preventDefault();
        //     $('input#password').attr('type','text');
        //     console.log($('#id').val());
        // });
    });

</script>
@stop