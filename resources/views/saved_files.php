                                  @if(Storage::disk('public')->has(Auth::user()->last_name . '-' . Auth::user()->id . '.jpg'))
        <li>
            <h5 class="col-md-3 text-danger"></h5>
            <div style="color:red;width:200px;height:150px;margin-bottom: 20px;">
                <a title="{{$photo['attributes']['name']}}">
                    <img class="img-thumbnail" src="{{ route ('show.photo',['filename' => Auth::user()->last_name . '-'  . Auth::user()->id . '.jpg'])}}" style="width:100%;height:100%;">

                </a>
            </div>
        </li>
              @endif  
////////////////////////////////////////////
                    <li>
                        <h5 class="col-md-3 text-danger"></h5>
                        <div style="color:red;width:200px;height:150px;margin-bottom: 20px;">
                            <a href="./title/<?=preg_replace("/\-\#{1,}/", "-",htmlspecialchars(($movie->name_slug)))?>" title="{{$movie->name}}">
                                <img class="img-thumbnail"src="{{$movie->cover}}" style="width:100%;height:100%;"/>
                            </a>
                        </div>
                    </li>

                    return response()->json(array(Photo::where('id',$id_photo[0]['attributes']['id'])->first()));

                    $id_photo = Photo::where('photo_path','/photo_folder'.'/'.$filename)->get();
        //dd($id_photo[0]['attributes']['id']);
        //return redirect()->route('users.photos');

        return redirect()->response()->json((Photo::where('id',$id_photo[0]['attributes']['id'])->first()));

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
         //print_r($movie_obj);
         foreach ($movie_obj as $movie) {
            $movie_title[] = $movie->snippet->title;
            $movie_cover[] = $movie->snippet->thumbnails->high->url;
            $movie_id[]    = $movie->id->videoId;
         }
         //print_r(count($movie_title));
         $now = new Carbon();
         $proba = new Movie();
         for ($i=0; $i < count($movie_title); $i++) { 
             \DB::insert('insert into movies (id, name, name_slug, cover, video_id, updated_at, created_at) values (?, ?, ?, ?, ?, ?, ? )', array(null, $movie_title[$i], preg_replace("/[-#]{1,}/", "-", str_replace(' ','-',htmlspecialchars($movie_title[$i]))), $movie_cover[$i], $movie_id[$i], $now->toDateTimeString(), $now->toDateTimeString()));

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

      public function show($name_slug)
    {
        $movie = \DB::table('movies')->where('name_slug',$name_slug)->first();
       // dd($title);
        return view('title',['movie' => $movie]);
    }
}   