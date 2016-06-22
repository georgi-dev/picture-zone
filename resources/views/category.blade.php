@if(Auth::check())
Admin

@else

@include('includes.restricted');

@endif