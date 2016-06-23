@if(Auth::check())
Admin

@else
@extends('layouts.master')
@include('includes.restricted')

@endif