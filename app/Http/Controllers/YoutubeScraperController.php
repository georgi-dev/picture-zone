<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
include_once('C:\xampp\htdocs\video-site\config\pq.php');
use App\Http\Requests;

class YoutubeScraperController extends Controller
{
    public function proba()
    {	
    	$url = 'http://www.imdb.com';
    	$pr = select_elements('#navbar > span#home_img_holder',file_get_contents($url));
    	print_r($pr);
    	return $pr;	
    }
}
