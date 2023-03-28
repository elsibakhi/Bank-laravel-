<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
// i add this
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth','manger']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
 




    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'personal_id' => ['required', 'string', 'max:255', 'unique:users'],
            'email' => ['required', 'string', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {

   if(User::firstWhere("personal_id","200-".$data["personal_id"])==null && User::firstWhere("personal_id","100-".$data["personal_id"])==null)
       {

           if($data['options']=="emolyee"){
  
           $user=User::create([
              'name' => $data['name'],
              'personal_id' => "100-".$data['personal_id'],
              'email' => $data['email'],
              'password' => Hash::make($data['password']),
          ]);
          $user->profile()->create([
             
              "gender"=>$data["gender"],
              "photo"=> $data["gender"] == "Male" ?  "/photo/default/man.png" : "/photo/default/weman.png"
          ]);
          $user->empolyee()->create([
              "task"=>$data["banking_job"],
              "salary"=>$data["salary"],
          ]);
  
              return $user;
           }else{
              
            $user= User::create([
                  'name' => $data['name'],
                  'personal_id' => "200-".$data['personal_id'],
                  'email' => $data['email'],
                  'password' => Hash::make($data['password']),
              ]);
  
              $user->profile()->create([
                  "gender"=>$data["gender"],
                  "photo"=> $data["gender"] == "Male" ?  "/photo/default/man.png" : "/photo/default/weman.png"
              ]);
              $user->client()->create([
                  "account_type"=>$data["account_type"],
                  "balance"=>$data["balance"],
              ]);
                  return $user;
           }

       }else{
        return redirect()->back()->withErrors(["duplicate"=>"You can't use the same personal id owned by  another user"]);
       }
    
    }


    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

       

        return $this->registered($request, $user)
                        ?: redirect()->back();
    }

}