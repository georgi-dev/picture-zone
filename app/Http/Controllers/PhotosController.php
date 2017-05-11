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
use Input;
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
    public function all_photos()
    {
         $all_photos = \DB::table('photos')
            ->join('users', 'users.id', '=', 'photos.user_id')
            ->select('users.username','photos.name','photos.description','photos.photo_path')

            ->get();

        return $all_photos;
    }

        public function random_photo()
    {

        $photos = Photo::all()->random(1);

        $author_photo = \DB::table('photos')
            ->where('photos.name','=', $photos->name)
            ->join('users', 'users.id', '=', 'photos.user_id')
            ->select('users.username','photos.name','photos.photo_path')
            ->get();
            //print_r($author_photo[0]);
            return $author_photo[0];

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
        //print_r($request->all());
        //return "bravo";
        $now = new Carbon();

        $this->validate($request,[
                                   'image' => 'required|image'

                                    ]);


        $file     = $request->file('image');
        $name =  Input::file('image')->getClientOriginalName();
        $filename = Auth::user()->last_name . '-' . Auth::user()->id . str_random(5) . '.jpg';
        $desc = $request['body'];

        if ($file) {
            $data = array(
                            'user_id'    => Auth::user()->id,
                           'photo_path'  => '/photo_folder'.'/'.$name,
                           'name'        => $name,
                           'description' => $desc,
                           
                           'updated_at'   => $now->toDateTimeString(),
                           'created_at'  => $now->toDateTimeString()

                         );
            Photo::insert($data);
           $pr = count(Photo::all());
          //print_r($pr);
            Storage::disk('uploads')->put($name, File::get($file));
        }
        $id_photo = Photo::where('photo_path','/photo_folder'.'/'.$name)->get();
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
    public function getAuthorPhoto()
    {
        $author_photo = \DB::table('photos')
            ->join('users', 'users.id', '=', 'photos.user_id')
            ->select('users.username')

            ->get();

            return $author_photo;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit_image(Request $request,$name)
    {
        // dd($request->all());
        $data=[
                'description' => $request['edit-image-description'],
                'category'    => $request['edit-image-category']
                ];

        Photo::where('name',$name)->update($data);

        return redirect()->route('users.photos');
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
        $message = "Crap";
        return redirect()->route('users.photos')->with(['message'=> $message]);
    }
}
