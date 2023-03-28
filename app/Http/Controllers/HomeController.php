<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {


            
   
        if (Auth::user()->personal_id[0]=="1") {
             return redirect()->route('empolyee.index');
        }else if (Auth::user()->personal_id[0]=="3"){
            return redirect()->route('admin.dashboard');
        }else{
            return redirect()->route('client.index');
        }
        
      
     
        
    }
}
