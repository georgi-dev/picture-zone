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