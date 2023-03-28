<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
class photoController extends Controller
{
    

public function __construct(){
    $this->middleware("auth");
}


public function upload(Request $req){



$profile = Auth::user()->profile;
$photo=$req->photo;
$photo_name=time().Auth::user()->personal_id.$photo->getClientOriginalName();



if(public_path($profile->photo) != public_path("/photo/default/man.png") && public_path($profile->photo) != public_path("/photo/default/weman.png") ){
    unlink(public_path($profile->photo));

}

$photo->move(public_path("/photo/uploads/"),$photo_name);


$profile->photo="/photo/uploads/".$photo_name;



$profile->save();
return redirect()->back();

}
public function delete(){



$profile = Auth::user()->profile;


$prvPhoto=$profile->photo;

$profile->photo= $profile->gender =="Male" ? "/photo/default/man.png":"/photo/default/weman.png";
if(public_path($prvPhoto) != public_path("/photo/default/man.png") && public_path($prvPhoto) != public_path("/photo/default/weman.png") ){
    unlink(public_path($prvPhoto));

}
$profile->save();
return redirect()->back();

}


}
