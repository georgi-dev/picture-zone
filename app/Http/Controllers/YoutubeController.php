<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Youtube;
use Illuminate\Support\Facades\Request;
use App\Movie;
use Illuminate\Database\Query\Builder;
class YoutubeController extends Controller {

    public function getMoviesFromYoutube()
    {
        //return "bravo";
	// $test = new Youtube();	
 //       return $test->test();
         $movie_obj = Youtube::search('trailer 2016');
         //listVideos('id, snippet')
         print_r($movie_obj);
         foreach ($movie_obj as $movie) {
         	$movie_title[] = $movie->snippet->title;
         	$movie_cover[] = $movie->snippet->thumbnails->high->url;
         	$movie_id[] = $movie->id->videoId;
         }
         //print_r(count($movie_title));
         $now = new Carbon();
         $proba = new Movie();
         for ($i=0; $i < count($movie_title); $i++) { 
         	 \DB::insert('insert into movies (id, name, cover, video_id, updated_at, created_at) values (?, ?, ?, ?, ?, ? )', array(null, $movie_title[$i], $movie_cover[$i], $movie_id[$i], $now->toDateTimeString(), $now->toDateTimeString()));

         }
         	
          //return view('youtube',compact('movie_obj'));
    }
    public function all_movies()
    {	
    	$movies = Movie::take(6)->get();
    	
    	return $movies;
    }

        public function random_movie()
    {	
    	$movies = Movie::all()->random(1);
    	return $movies;
    }
}	