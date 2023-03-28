<?php

namespace App\Http\Controllers;



use App\Models\empolyee;
use App\Models\User;
use App\Models\client;
use App\Models\Complaint;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class EmpolyeeController extends Controller
{


    public function __construct()
    {
        $this->middleware(['auth',"empolyee",'verified']);
    }

    /**
     * Display home page for empolyee
     */
    public function index()
    {
        $user=Auth::user();
       return view("empolyee.index");
    }

    /**
     * Show the form for creating a new client.
     */
    public function create($state=0)
    {
       
        return view("empolyee.createClients",['state'=>$state]);
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {



$this->validate($request,[
'name'=>'required'  ,
'personal_id'=> 'required' , 
'email'=> 'required' , 
'password'=>  'required',
'gender'=>  'required',
'password_confirmation'=>  'required',
'account_type'=>  'required',
'balance'=>  'required',
]);


// to test that gender is male or female
if(
    $request->gender!="Male" &&
    $request->gender!="Female" 
){
    return redirect()->back()->withErrors(["error"=>"Dont change in gender values!"]);
}
// to test that account type is in this 6 values 
if(
    $request->account_type!="Current account" &&
    $request->account_type!="Savings account" &&
    $request->account_type!="Salary account" &&
    $request->account_type!="Fixed deposit account" &&
    $request->account_type!="Recurring deposit account" &&
    $request->account_type!="NRI accounts" 
){
    return redirect()->back()->withErrors(["error"=>"Dont change in account type values!"]);
}
// to test that balance is not a non numreic value 
if(
    !is_numeric($request->balance)
){
    return redirect()->back()->withErrors(["error"=>"You must enter numeric value "]);
}

$test_personal_id_is_not_exist=User::where("personal_id","200-".$request->personal_id)->first();

if($test_personal_id_is_not_exist!=null){
    return redirect()->back()->withErrors(["error"=>"This personal id is already owned by another user"]);
}
if($request->password!=$request->password_confirmation){
    return redirect()->back()->withErrors(["error"=>"You incorrectly repeated the password "]);
}
$user=User::create([
    'name'=>$request->name  ,
'personal_id'=>"200-" .$request->personal_id , 
'email'=>"200-" .$request->personal_id , 
'password'=> Hash::make($request->password) 
]);


$user->profile()->create([
    "gender"=>$request->gender,
    "photo"=>$request->gender == "Male" ?  "/photo/default/man.png" : "/photo/default/weman.png"
]);
$user->client()->create([
    "account_type"=>$request->account_type,
    "balance"=>abs($request->balance),
]);


 return $this->create(1);

    }

    /**
     * Display the specified resource.
     */
    public function sendComplaints(Request $request)
    {
        $this->validate($request,[
            'message'=>'required'
           
            ]);

      Auth::user()->complaints()->create([
        "massage" => $request->message
      ]);

      return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        return view("empolyee.updateClients",['state'=>0 , "user_selected"=>false]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateClient(Request $request ,$id)
    {

if($request==null){
    return redirect()->back()->withErrors(["error" => "mistake in request" ]);
}

$user_before_update=User::firstWhere("personal_id",$id);
// $client_before_update=$user_before_update->client;
// to test that account type is in this 6 values 
if($request->account_type!=null){
    if(
        ( $request->account_type!="Current account" &&
          $request->account_type!="Savings account" &&
          $request->account_type!="Salary account" &&
          $request->account_type!="Fixed deposit account" &&
          $request->account_type!="Recurring deposit account" &&
          $request->account_type!="NRI accounts" ) 
      ){
          return redirect()->back()->withErrors(["error"=>"Dont change in account type values!"]);
      }

}



$test_personal_id_is_not_exist=User::where("personal_id","200-".$request->personal_id)->first();
// dd($request->personal_id);
if($request->personal_id !=null && "200-".$request->personal_id != $user_before_update->personal_id){
if($test_personal_id_is_not_exist!=null){
    return redirect()->back()->withErrors(["error"=>"This personal id is already owned by another user"]);
}

}
if($request->password!=null){

    if($request->password!=$request->password_confirmation){
        return redirect()->back()->withErrors(["error"=>"You incorrectly repeated the password "]);
    }

}


$user_before_update->name= $request->name ?? $user_before_update->name ;
$user_before_update->personal_id="200-" .$request->personal_id ?? $user_before_update->personal_id;
$user_before_update->password=$request->password==null? $user_before_update->password : Hash::make($request->password);



$user_before_update->client->account_type=$request->account_type ?? $user_before_update->client->account_type;

// $client_before_update->save(); 
$user_before_update->client->save();
$user_before_update->save();








$request2 = new \Illuminate\Http\Request();

$request2->replace(['search' =>ltrim($user_before_update->personal_id,"200-")]);


return $this->searchClients($request2,1);




    }

    /**
     * Remove the specified resource from storage.
     */
    public function searchClients(Request $request , $state=null)
    {
        $this->validate($request,[
            'search'=>'required'
           
            ]);


   $user= User::firstWhere("personal_id","200-".$request->search);
if($user!=null){
    $user["account_type"]=$user->client->account_type;

    return view("empolyee.updateClients",["user"=>$user,'state'=>$state ?? 0 , "user_selected"=>true]);
}else{
    return view("empolyee.updateClients",['state'=>2 , "user_selected"=>false]);
}

   

         
   


    }   
    public function searchClientsTransactions(Request $request ,$personal_id ,$page=null )
    {
        $state=null;
       
if ($page == "trash"){

    $user= User::onlyTrashed()->get()->firstWhere("personal_id","200-".$personal_id);
    
    if($user!=null){
        $user["account_type"]=$user->client()->onlyTrashed()->get()->first()->account_type;
    
        return json_encode(["user"=>$user,'state'=>$state ?? 0 , "user_selected"=>true]);
    }else{
        return   json_encode(['state'=>2 , "user_selected"=>false]);
    }
}else{

    $user= User::firstWhere("personal_id","200-".$personal_id);
    if($user!=null){
        $user["account_type"]=$user->client->account_type;
    
        return json_encode(["user"=>$user,'state'=>$state ?? 0 , "user_selected"=>true]);
    }else{
        return   json_encode(['state'=>2 , "user_selected"=>false]);
    }

}


   

         
   

      
    }   
     

     public function showDelete()
     {
       $users=User::all();

$clients=array();
foreach ($users as $user) {
 
 
    if($user->client != null){
  
        $data=$user->client()->get()->first();
          
   
    $data['personal_id']=$user->personal_id;
    $data['name']=$user->name;
   array_push($clients,$data);
    }
    
  
}
$clients = $this->paginate($clients);


       
       return view("empolyee.deleteClients",compact("clients"));
     }
     public function paginate($items, $perPage = 15, $page = null, $options = [])
     {
        // this for make pagination redirect the page to the same place not home page
        $options['path'] = Paginator::resolveCurrentPath();
        //--
         $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
         $items = $items instanceof Collection ? $items : Collection::make($items);
         return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);

     }

    public function profilePage()
    {
       $user=Auth::user();

       return view("empolyee.profile",compact("user"));


    }

    public function updateProfile(Request $req)
    {

   
   
       $user= Auth::user();
      $profile=$user->profile;
  
$user->name=$req->name ?? $user->name;

// $user->password=Hash::make($req->password)?? $user->password;

if($profile == null){
$user->profile()->create([
"email" =>  $req->email,
"phone" => $req->phone ,
"country" => $req->country ,
"bio" => $req->bio ,
"address" => $req->address ,

]);
}else{
    $profile->email=$req->email ?? $profile->email;
    $profile->phone=$req->phone ??$profile->phone;
    $profile->country=$req->country ??$profile->country;
    $profile->bio=$req->bio ??$profile->bio;
    $profile->address=$req->address ?? $profile->address;

    $profile->save();
}


$user->save();

     return redirect()->back();
    }



    public function updatePassword(Request $req)
    {
    
        $this->validate($req,[
       
            'password'=>  'required',
            'newpassword'=>  'required',
            'renewpassword'=>  'required'
            ]);
   
       $user= Auth::user();
    if(Hash::check($req->password, $user->password)){
        if($req->newpassword != $req->renewpassword){
            return redirect()->back()->withErrors(["reEnterPassword" => "You must re enter password successfuly"]);
        } else{
        
            $user->password=Hash::make($req->newpassword);
           $user->save();

return redirect()->back()->withinput(["success"=> "Your password has been updated successfuly"]);
        }

    } else{
        return redirect()->back()->withErrors(["currentPassword" => "You must enter the correct current password"]);
    }







    }


    public function complaintsPage()
    {
       
        $complaints=Auth::user()->complaints()->get();

        return view("empolyee.complaints",compact("complaints"));

    }
    public function deleteComplaint($id)
    {
       
        $complaints=Complaint::find($id)->delete();

      return redirect()->back()->withInput(["success"=>"You delete the complaint successfuly"]);

    }


    public function destroy($selectedID)
    {
       
 $user=   User::firstWhere("personal_id",$selectedID);
$user->client->delete();
$user->delete();

    
   
     return redirect()->back();
    }




public function showTrash()
{

    $users=User::onlyTrashed()->get();

    $clients=array();
    foreach ($users as $user) {
  if($user->client()->onlyTrashed()->get()->count() > 0){
            $data=$user->client()->onlyTrashed()->get()->first();
    
       
        $data['personal_id']=$user->personal_id;
        $data['name']=$user->name;
       array_push($clients,$data);
        }
        
      
    }
        $clients = $this->paginate($clients);

           
           return view("empolyee.trash",compact("clients"));
}
public function restore($selectedID)
{

    $user= User::onlyTrashed()->firstWhere("personal_id",$selectedID);
    
    $user->restore();
    $user->client()->onlyTrashed()->restore();
        
       
         return redirect()->back();
}



public function transactionsPage()
{
    $users=User::all();
$clients=array();
foreach ($users as  $user) {

if($user->client!=null){
$u=$user;
$u["account_type"]=$user->client->account_type;
array_push($clients,$u);

}


}

$clients = $this->paginate($clients);
    return view("client.transactions",compact("clients"));
}


public function convert_to_dolor($from,$amount){
    // convert currency with api
    if(is_numeric($amount)){
    
        $amount=abs($amount);
        $req_url = "https://v6.exchangerate-api.com/v6/6f66cf39a58430876e7f6a38/pair/$from/USD/$amount";
   
        $response_json = file_get_contents($req_url);
        
        if(false !== $response_json) {
        
        
            try {
        
                $response = json_decode($response_json);
        
              
                if('success' === $response->result) {
                    // get the amount when convert it to dolor (USD)
                   return $response->conversion_result;
        
                }
        
        
             
            }
            catch(Exception $e) {
                // Handle JSON parse error...
            }
        
        }
    
    }else{
        return false;
    }
    
        }



public function withdrawPage($id)
{
    $user = User::firstWhere("personal_id",$id);
   
       $user["balance"]= $user->client->balance;
       $user["account_type"]= $user->client->account_type;
    


    return view("empolyee.opreations.withdraw",["user"=>$user]);
}






public function withdraw(Request $req)
{
    $this->validate($req,[
        'personal_id'=>'required'  ,
       
        'amount'=>'required'  
 
        ]);
    $amount_after_convert  = $this->convert_to_dolor($req->currency,$req->amount);

if($amount_after_convert==false){
return redirect()->back()->withErrors(["error"=>"You must enter numeric value"]);
}

// end api
    $user = User::firstWhere("personal_id",$req->personal_id);
   $client= $user->client;
   if ($client->balance >= $amount_after_convert){
    $client->balance=$client->balance-$amount_after_convert;
    $client->save();
     $client->transactions()->create([
        "type"=>"withdraw",
        "amount"=>$amount_after_convert,
        "from"=>$req->personal_id,
        "to"=>null,
     ]);
  

     if(Auth::user()->personal_id==$req->personal_id){
      
        
        return redirect()->back()->withInput(["success"=>"The withdrawal process has been completed successfully "]);
     }


         return redirect()->route('client.trnsactions.page.next', ['id' => $req->personal_id]);
   }else{
    return redirect()->back()->withErrors(["error"=>"The amount is largest than your balance"]);
   }


   
}


public function depositPage($id)
{
    $user = User::firstWhere("personal_id",$id);
   
       $user["balance"]= $user->client->balance;
       $user["account_type"]= $user->client->account_type;
    


    return view("empolyee.opreations.deposit",["user"=>$user]);
}





public function deposit(Request $req)
{
    $this->validate($req,[
        'personal_id'=>'required'  ,
       
        'amount'=>'required'  
 
        ]);
    $amount_after_convert  = $this->convert_to_dolor($req->currency,$req->amount);

    if($amount_after_convert==false){
        return redirect()->back()->withErrors(["error"=>"You must enter numeric value"]);
        }
    $user = User::firstWhere("personal_id",$req->personal_id);
   $client= $user->client;
   
    $client->balance=$client->balance+$amount_after_convert;
    $client->save();
     $client->transactions()->create([
        "type"=>"deposit",
        "amount"=>$amount_after_convert,
        "from"=>null,
        "to"=>$req->personal_id,
     ]);
  
     if(Auth::user()->personal_id==$req->personal_id){
 
         return redirect()->back()->withInput(["success"=>"The deposit process has been completed successfully "]);
     }

     return redirect()->route('client.trnsactions.page.next', ['id' => $req->personal_id]);
 


   
}





public function transferPage($id)
{
    $user = User::firstWhere("personal_id",$id);
   
       $user["balance"]= $user->client->balance;
       $user["account_type"]= $user->client->account_type;
    


    return view("empolyee.opreations.transfer",["user"=>$user]);
}






public function transfer(Request $req)
{
    $this->validate($req,[
        'personal_id1'=>'required'  ,
        'personal_id2'=>'required'  ,
        'amount'=>'required'  
 
        ]);
    $user2 = User::firstWhere("personal_id",$req->personal_id2);
  
    if($user2==null){
        return redirect()->back()->withErrors(["error"=>"This user is not exist"]);
    }
    $amount_after_convert  = $this->convert_to_dolor($req->currency,$req->amount);

    if($amount_after_convert==false){
        return redirect()->back()->withErrors(["error"=>"You must enter numeric value"]);
        }
    $user1 = User::firstWhere("personal_id",$req->personal_id1);


   $client1= $user1->client;
   $client2= $user2->client;
   if ($client1->balance >= $amount_after_convert){
    $client1->balance=$client1->balance-$amount_after_convert;
    $client2->balance=$client2->balance+$amount_after_convert;
    $client1->save();
    $client2->save();


     $client1->transactions()->create([
        "type"=>"transfer",
        "amount"=>$amount_after_convert,
        "from"=>$req->personal_id1,
        "to"=>$req->personal_id2,
     ]);
     if(Auth::user()->personal_id==$req->personal_id1){

        return redirect()->back()->withInput(["success"=>"The transfer process has been completed successfully "]);
     }
 
     return redirect()->route('client.trnsactions.page.next', ['id' => $req->personal_id1]);
   }else{
    return redirect()->back()->withErrors(["error"=>"The amount is largest than your balance"]);
   }


   
}

public function nextTransactionsPage( Request $req , $id=null)
{
  
if($id==null){
$user = User::firstWhere("personal_id",$req->personal_id);
if($user==null  ){

    return redirect()->back()->withErrors(["error"=> "this personal id is not exist"]);
    }
    
    else if($user->client==null){
        return redirect()->back()->withErrors(["error"=> "this personal id is not exist"]);
    }
if( Hash::check($req->password, $user->password)){
   $user["balance"]= $user->client->balance;
   $user["account_type"]= $user->client->account_type;
   return view("client.nextTransactions",['user'=>$user]);

}else{
  
   return redirect()->back()->withErrors(["error"=> "Uncorrect password"]);;
   
}
}else{
$user = User::firstWhere("personal_id",$id);

   $user["balance"]= $user->client->balance;
   $user["account_type"]= $user->client->account_type;
   return view("client.nextTransactions",['user'=>$user]);


}


   
}

public function  trnsactionsReports()
{
  

   return view("client.transactionsReports");




   
}


public function  clientReports(Request $req)
{
    $this->validate($req,[
        'personal_id'=>'required'   
      
 
        ]);
    $user = User::firstWhere("personal_id",$req->personal_id);

if($user==null  ){

return redirect()->back()->withErrors(["error"=> "this personal id is not exist"]);
}

else if($user->client==null){
    return redirect()->back()->withErrors(["error"=> "this personal id is not exist"]);
}
      $transactions=$user->client->transactions()->get();


   return view("client.transactionsReports",['transactions'=> $transactions ,'id'=>$req->personal_id ]);




   
}

















}
