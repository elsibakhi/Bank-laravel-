<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Session;
class PageController extends Controller
{

    public function index(){ 
        return view('index');
     }
  
     public function store(Request $request){
  
        $validator = Validator::make($request->all(), [
           'name' => 'required',
           'email' => 'required|email',
           'message' => 'required',
           'g-recaptcha-response' => 'recaptcha',//recaptcha validation
        ]);
  
        if ($validator->fails()) {
           return redirect()->Back()->withInput()->withErrors($validator);
  
        }else{
           Session::flash('message','Form submit Successfully.');
        }
        return redirect('/');
     }


}
