@if(!Auth::check())

@extends('layouts.master')
@include('includes.restricted')

@else
@section('content')
<div style="min-height:600px;">



</div>
@stop
@endif