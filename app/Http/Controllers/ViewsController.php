<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;
use App\Movie;
class ViewsController extends Controller

{	public function toHomePage()
    {
    	return view('welcome');
    }

    public function toRegisterPage()
    {
    	return view('sign-up');
    }

    public function toLoginPage()
    {
    	return view('sign-in');
    }

    public function toDashboard()
    {	
    	$user = Auth::user();
        $movies = new YoutubeController();

    	return view('dashboard',[
            'user'         => $user,
            'random_movie' => $movies->random_movie(),
            'all_movies'   => $movies->all_movies()
            ]);
           
       // return view('movies', ['movies' => $movies]);
    }



    public function toMoviePage()
    {
                $user = Auth::user();
        $movies = new YoutubeController();

        return view('title/{$name_slug}',[
            'user'      => $user,
            'name_slug' => str_replace(' ','-',$movies->show())

            ]);
    }
}
