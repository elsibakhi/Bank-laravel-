<?php

namespace App\Http\Controllers;

use App\Models\client;
use App\Models\User;
use App\Models\Transaction;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Auth;
class ClientController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth',"client",'verified']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {




        return view("client.layout.master");
    }


    public function  dashboardPage()
    {
        $user=Auth::user();
$client=$user->client;

$transactions=Transaction::where("from",$user->personal_id)->orWhere("to",$user->personal_id)->latest()->paginate(7, ['*'], 'page_a');

$complaints=$user->complaints()->paginate(7, ['*'], 'page_b');
$number_of_transactions=$user->client->transactions()->count();


        return view("client.dashboard",['client'=>$client ,
         'transactions'=>$transactions ,
         'complaints'=>$complaints ,
         "number_of_transactions"=>$number_of_transactions,
        
        ]);

    }

    public function  getCurrentPageRoute()
    {

        return  session('page');

    }

    public function  get_nav_active_session()
    {

        return  session('nav_active');

    }







    public function withdrawPage($id)
    {

    



        $user = User::firstWhere("personal_id",$id);
       
           $user["balance"]= $user->client->balance;
           $user["account_type"]= $user->client->account_type;
        
   

        return view("client.opreations.withdraw",["user"=>$user]);
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
        
   

        return view("client.opreations.deposit",["user"=>$user]);
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
        
   

        return view("client.opreations.transfer",["user"=>$user]);
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



    
    public function  profilePage()
    {
$user=Auth::user();

       return view("client.clientProfile",["user"=>$user ]);

    }


    public function  updateProfile(Request $req )
    {


$user=Auth::user();
$profile=Auth::user()->profile;

$user->name=$req->name ?? $user->name;

if($profile){
    $profile->email=$req->email ;
    $profile->address=$req->address ;
    $profile->country=$req->country ;
    $profile->phone=$req->phone ;
    $profile->bio=$req->bio;

    $profile->save();
}else{
    $user->profile()->create([
        "email"=>$req->email,
        "address"=>$req->address,
        "country"=>$req->country,
        "phone"=>$req->phone,
        "bio"=>$req->bio,
    ]);
}

$user->save();


     return redirect()->back()->withInput(["success"=>"Your profile has been updated successfuly"]);

    }


    public function  complaintPage()
    {

       return view("client.complaint");

    }
    public function  complaint(Request $req)
    {
        $this->validate($req,[
            'complaint'=>'required'  
     
            ]);
Auth::user()->complaints()->create([
    'massage' =>$req->complaint
]);


return redirect()->back()->withInput(["success"=>"Your complaint has been submited successfuly "]);

    }

    
   
    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        //
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
    public function show(client $client): Response
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(client $client): Response
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, client $client): RedirectResponse
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(client $client): RedirectResponse
    {
        //
    }
}
