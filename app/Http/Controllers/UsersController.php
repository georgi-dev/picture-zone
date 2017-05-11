<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use App\User;
use App\Http\Requests;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\ViewsController as ViewC;

class UsersController extends Controller
{   
    

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
    public function register(Request $request)
    {
      	$this->validate($request,[
      		'email'    => 'required|unique:users',
      		'username' => 'required|min:4',
      		'password' => 'required|min:6'
      		]);
      	$email = $request['email'];
      	$username = $request['username'];
      	$password = bcrypt($request['password']);

      	 $user = new User();

      	 $user->email    = $email;
      	 $user->username = $username;
      	 $user->password = $password;

      	 $user->save();

      	 return redirect()->route('sign-in');
    }

    public function login(Request $request)
    {
        if (Auth::attempt(['email' => $request['email'],'password' => $request['password']])) {
            
            return redirect()->route('dashboard');

        }else {return 'FALSE';}
    }

    public function logout()
    {
        Auth::logout();

         return  redirect()->route('dashboard');
    }

    public function profile()
    {
        return view('profile');
    }

    public function edit_profile()
    {
        return view('edit-profile');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_profile(Request $request)
    {   
        $this->validate($request,[
            'username'   => 'required',
            'first_name' => 'required|min:3',
            'last_name'  => 'required|min:3'
            ]);

        $data = array(
                        'username'   => $request['username'],
                        'first_name' => $request['first_name'],
                        'last_name'  => $request['last_name']

                     );
        \DB::table('users')->where('id',$request->id)->update($data);        

        $file     = $request->file('image');
        $filename = $request['first_name'] . '-' .$request->id . '.jpg';
        if ($file) {
            Storage::disk('local')->put($filename, File::get($file));
        }
       

        

        return redirect()->route('dashboard');
    }

    public function getProfileImage($filename)
    {   
        $file = Storage::disk('local')->get($filename);

        return response($file, 200);
    }

    public function getPhotoPage()
    {   
        $photos = new PhotosController();

        return view('photos',['photos' => $photos->all_photos_by_userID()]);

    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
