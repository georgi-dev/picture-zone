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

    	                    <li>
                        <h5 class="col-md-3 text-danger"></h5>
                        <div style="color:red;width:200px;height:150px;margin-bottom: 20px;">
                            <a href="./title/<?=preg_replace("/\-\#{1,}/", "-",htmlspecialchars(($movie->name_slug)))?>" title="{{$movie->name}}">
                                <img class="img-thumbnail"src="{{$movie->cover}}" style="width:100%;height:100%;"/>
                            </a>
                        </div>
                    </li>
    }
}
