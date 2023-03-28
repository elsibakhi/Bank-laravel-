<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Transaction;
use App\Models\User;
use App\Models\Complaint;
use App\Models\replay;
use Auth;

use Illuminate\Support\Facades\Hash;
$GLOBALS['last_transactions']=Transaction::latest()->paginate(7, ['*'], 'page_a');
$GLOBALS['item_selected']=null;
class AdminController extends Controller
{
   
    public function __construct(){
        $this->middleware(["auth","manger",'verified']);
    }
    /**
     * Display a listing of the resource.
     */
    public function pre_index()
    {
        $date=date_create();
        $date2=date_create();
         $date_before_7_days=date_sub($date,date_interval_create_from_date_string("7 days"));
   
         $last_5_months=array();
        for($i=0;$i<5;$i++){
    if($i==0){
        $GLOBALS['item_selected']= $GLOBALS['item_selected'] ?? "all";
    }
            array_push( $last_5_months,$date2->format('M')." ". $date2->format('Y'));
            $date2=date_sub($date2,date_interval_create_from_date_string("1 month"));
        }
        
    
         $number_of_transactions_last_7_days=Transaction::where('created_at' ,">",$date_before_7_days )->count();
      
 $number_users_active=User::where("active",true)->count();
        
 $number_of_complaints=Complaint::all()->count();
$last_transactions=$GLOBALS['last_transactions'];

$complaints=Complaint::latest()->paginate(4, ['*'], 'page_b');

    return view ("admin.dashboard",
    [
        'number_of_transactions_last_7_days'=>  $number_of_transactions_last_7_days,
        'number_users_active'=>  $number_users_active,
        'number_of_complaints'=>  $number_of_complaints,
        'last_transactions'=>  $last_transactions,
        'complaints'=>  $complaints,
        'last_5_months'=>  $last_5_months,
        'item_selected'=>  $GLOBALS['item_selected'],
]);
    }
    public function index(Request $request)
    {
        return  $this->pre_index();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function filterTransactions(Request $req)
    {
if($req->filter_month=="all"){

    $GLOBALS['last_transactions']= Transaction::latest()->paginate(7, ['*'], 'page_a');
    $GLOBALS['item_selected']=$req->filter_month;
}else{

    $GLOBALS['last_transactions']= $last_transactions=Transaction::where('created_at', 'LIKE', '%'.date_create($req->filter_month)->format("Y")."-".date_create($req->filter_month)->format("m").'%')->latest()->paginate(7, ['*'], 'page_a');  
    $GLOBALS['item_selected']=$req->filter_month;
}

 return $this->pre_index();
 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function detailsPage( $id)
    {
       $comment= Complaint::find($id);
       $replays=  $comment->replays()->get();
       return view("admin.details",['comment'=>$comment,'replays'=>$replays]);
    }


    public function refreshDashboard( )
    {
        $date=date_create();
        $date2=date_create();
         $date_before_7_days=date_sub($date,date_interval_create_from_date_string("7 days"));


        
    
    $number_of_transactions_last_7_days=Transaction::where('created_at' ,">",$date_before_7_days )->count();
      
 $number_users_active=User::where("active",true)->count();
        
 $number_of_complaints=Complaint::all()->count();




    return json_encode([
        'number_of_transactions_last_7_days'=>  $number_of_transactions_last_7_days,
        'number_users_active'=>  $number_users_active,
        'number_of_complaints'=>  $number_of_complaints
 
]);
      
      
    }



    public function profilePage( )
    {
       $user= Auth::user();
      
       return view("admin.profile",compact('user'));
    }

    public function updateProfile(Request $req)
    {
    

       $user= Auth::user();
      $profile=$user->profile;
  
$user->name=$req->name ?? $user->name;

$user->password=$req->password==null? $user->password : Hash::make($req->password);

if($profile == null){
$user->profile()->create([
"email" =>  $req->email,
"phone" => $req->phone ,
"country" => $req->country ,
"bio" => $req->bio ,

]);
}else{
    $profile->email=$req->email ?? $profile->email;
    $profile->phone=$req->phone ??$profile->phone;
    $profile->country=$req->country ??$profile->country;
    $profile->bio=$req->bio ??$profile->bio;

    $profile->save();
}


$user->save();

     return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function replay( Request $req, $id)
    {
    $complaint=Complaint::find($id);
      $complaint->state=$req->state;
      $complaint->save();
if($req->replay != null){
    $complaint->replays()->create([
        "replay"=>$req->replay
            ]);

}





      return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function deleteReplay( $id)
    {
        replay::find($id)->delete();


        return redirect()->back();
    }
    public function deleteComplaint( $id)
    {
        Complaint::find($id)->delete();


        return redirect()->back();
    }
}
