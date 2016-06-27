<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Auth;
use Illuminate\Http\Request;
use App\User;
use App\Http\Requests;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\ViewsController as ViewC;
use App\Photo;
class PhotosController extends Controller
{   

        public function all_photos_by_userID()
    {   

        $photo = new Photo();
        return $photo->where('user_id',Auth::user()->id)->get();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function add_photo(Request $request)
    {   
        //return "bravo";
        $now = new Carbon();

        $file     = $request->file('image');
        $name = Auth::user()->last_name . '-' . Auth::user()->id . $now->toDateTimeString();
        $filename = Auth::user()->last_name . '-' . Auth::user()->id . str_random(5) . '.jpg';
        $desc = 'Lorem ipsum sit dolor amet';
        
        if ($file) {
            $data = array(
                            'user_id'    => Auth::user()->id,
                           'photo_path'  => '/photo_folder'.'/'.$filename,
                           'name'        => $filename,
                           'description' => $desc,
                           'updated_at'   => $now->toDateTimeString(),
                           'created_at'  => $now->toDateTimeString()

                         );
            Photo::insert($data);
           $pr = count(Photo::all());
          print_r($pr);
            Storage::disk('uploads')->put($filename, File::get($file));
        }
        $id_photo = Photo::where('photo_path','/photo_folder'.'/'.$filename)->get();
        return redirect()->route('users.photos');

        // return response()->json(array(  
        //                                 'all_info' => Photo::where('id',$id_photo[0]['attributes']['id'])->first(),
        //                                 'file_path'=> '/photo_folder'.'/'.$filename,
        //                                 'count' => $pr
        //                                 ), 200);
    }

        public function showPhoto($filename)
    {   
        $file = Storage::disk('public')->get($filename);

        return response($file, 200);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete_image($name)
    {
        Photo::where('name',$name)->delete();
        Storage::disk('uploads')->delete($name);

        return redirect()->route('users.photos')->with('bravo');
    }
}
