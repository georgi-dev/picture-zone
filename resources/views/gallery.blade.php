@if(!Auth::check())

@extends('layouts.master')
@include('includes.restricted')

@else
@section('content')
<?php /*var_dump($all_photos);*/?>
<link rel="stylesheet" href="{{ URL::asset('css/gallery.css') }}">
<div style="min-height:600px;background:#fff;">

		<h1>Isotope - filtering</h1>

	<div class="button-group filters-button-group">
	  <button class="button is-checked" data-filter="*">show all</button>
	  <button class="button" data-filter=".panorama">Panorama</button>
	  <button class="button" data-filter=".animals">Animals</button>
	  <button class="button" data-filter=".whatever">Whatever</button>
	  <button class="button" data-filter=":not(.transition)">not transition</button>
	  <button class="button" data-filter=".metal:not(.transition)">metal but not transition</button>
	  <button class="button" data-filter="numberGreaterThan50">number > 50</button>
	  <button class="button" data-filter="ium">name ends with &ndash;ium</button>
	</div>
<div class="grid">
	@foreach($all_photos as $photo)
		<li class="element-item ">
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
</div>
	<!-- <div class="grid">
	  <div class="element-item transition metal " data-category="transition">
	    <h3 class="name">Mercury</h3>
	    <p class="symbol">Hg</p>
	    <p class="number">80</p>
	    <p class="weight">200.59</p>
	  </div>
	  <div class="element-item metalloid " data-category="metalloid">
	    <h3 class="name">Tellurium</h3>
	    <p class="symbol">Te</p>
	    <p class="number">52</p>
	    <p class="weight">127.6</p>
	  </div>
	  <div class="element-item post-transition metal " data-category="post-transition">
	    <h3 class="name">Bismuth</h3>
	    <p class="symbol">Bi</p>
	    <p class="number">83</p>
	    <p class="weight">208.980</p>
	  </div>
	  <div class="element-item post-transition metal " data-category="post-transition">
	    <h3 class="name">Lead</h3>
	    <p class="symbol">Pb</p>
	    <p class="number">82</p>
	    <p class="weight">207.2</p>
	  </div>
	  <div class="element-item transition  gaz" data-category="transition">
	    <h3 class="name">Gold</h3>
	    <p class="symbol">Au</p>
	    <p class="number">79</p>
	    <p class="weight">196.967</p>
	  </div>
	  <div class="element-item alkali gaz " data-category="alkali">
	    <h3 class="name">Potassium</h3>
	    <p class="symbol">K</p>
	    <p class="number">19</p>
	    <p class="weight">39.0983</p>
	  </div>
	  <div class="element-item alkali  " data-category="alkali">
	    <h3 class="name">Sodium</h3>
	    <p class="symbol">Na</p>
	    <p class="number">11</p>
	    <p class="weight">22.99</p>
	  </div>
	  <div class="element-item transition metal gaz" data-category="transition">
	    <h3 class="name">Cadmium</h3>
	    <p class="symbol">Cd</p>
	    <p class="number">48</p>
	    <p class="weight">112.411</p>
	  </div>
	  <div class="element-item alkaline-earth metal " data-category="alkaline-earth">
	    <h3 class="name">Calcium</h3>
	    <p class="symbol">Ca</p>
	    <p class="number">20</p>
	    <p class="weight">40.078</p>
	  </div>
	  <div class="element-item transition metal gaz" data-category="transition">
	    <h3 class="name">Rhenium</h3>
	    <p class="symbol">Re</p>
	    <p class="number">75</p>
	    <p class="weight">186.207</p>
	  </div>
	  <div class="element-item post-transition metal " data-category="post-transition">
	    <h3 class="name">Thallium</h3>
	    <p class="symbol">Tl</p>
	    <p class="number">81</p>
	    <p class="weight">204.383</p>
	  </div>
	  <div class="element-item metalloid " data-category="metalloid">
	    <h3 class="name">Antimony</h3>
	    <p class="symbol">Sb</p>
	    <p class="number">51</p>
	    <p class="weight">121.76</p>
	  </div>
	  <div class="element-item transition metal " data-category="transition">
	    <h3 class="name">Cobalt</h3>
	    <p class="symbol">Co</p>
	    <p class="number">27</p>
	    <p class="weight">58.933</p>
	  </div>
	  <div class="element-item lanthanoid metal inner-transition " data-category="lanthanoid">
	    <h3 class="name">Ytterbium</h3>
	    <p class="symbol">Yb</p>
	    <p class="number">70</p>
	    <p class="weight">173.054</p>
	  </div>
	  <div class="element-item noble-gas nonmetal " data-category="noble-gas">
	    <h3 class="name">Argon</h3>
	    <p class="symbol">Ar</p>
	    <p class="number">18</p>
	    <p class="weight">39.948</p>
	  </div>
	  <div class="element-item diatomic nonmetal " data-category="diatomic">
	    <h3 class="name">Nitrogen</h3>
	    <p class="symbol">N</p>
	    <p class="number">7</p>
	    <p class="weight">14.007</p>
	  </div>
	  <div class="element-item actinoid metal inner-transition " data-category="actinoid">
	    <h3 class="name">Uranium</h3>
	    <p class="symbol">U</p>
	    <p class="number">92</p>
	    <p class="weight">238.029</p>
	  </div>
	  <div class="element-item actinoid metal inner-transition " data-category="actinoid">
	    <h3 class="name">Plutonium</h3>
	    <p class="symbol">Pu</p>
	    <p class="number">94</p>
	    <p class="weight">(244)</p>
	  </div>
	</div> -->




</div>
<script type="text/javascript" src="/js/jquery.js"></script>
<script src="https://npmcdn.com/isotope-layout@3.0/dist/isotope.pkgd.min.js"></script>
<script type="text/javascript">

	 $(document).ready(function() {

		var $grid = $('.grid').isotope({
		  itemSelector: '.element-item',
		  layoutMode: 'fitRows'
		});
		// filter functions
		var filterFns = {
		  // show if number is greater than 50
		  numberGreaterThan50: function() {
		    var number = $(this).find('.number').text();
		    return parseInt( number, 10 ) > 50;
		  },
		  // show if name ends with -ium
		  ium: function() {
		    var name = $(this).find('.name').text();
		    return name.match( /ium$/ );
		  }
		};
		// bind filter button click
		$('.filters-button-group').on( 'click', 'button', function() {
		  var filterValue = $( this ).attr('data-filter');
		  // use filterFn if matches value
		  filterValue = filterFns[ filterValue ] || filterValue;
		  $grid.isotope({ filter: filterValue });
		});
		// change is-checked class on buttons
		$('.button-group').each( function( i, buttonGroup ) {
		  var $buttonGroup = $( buttonGroup );
		  $buttonGroup.on( 'click', 'button', function() {
		    $buttonGroup.find('.is-checked').removeClass('is-checked');
		    $( this ).addClass('is-checked');
		  });
		});
	 });

</script>
@stop
@endif
