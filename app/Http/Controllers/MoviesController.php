<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;
use App\Http\Requests;

class MoviesController extends Controller
{	
    public function random_movie()
    {	
    	$movies = Movie::all()->random(1);
    	return $movies;
    }

    public function all_movies()
    {	
    	$movies = Movie::all();
    	
    	return $movies;
    }
}
