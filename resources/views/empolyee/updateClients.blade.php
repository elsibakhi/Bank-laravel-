@extends('layouts.app')

@section('content')
@php
$state=$state ?? '';
$user=$user ?? '';  
$user_selected=$user_selected ?? '';  //to ensure that he select an client to update it -- true or false
@endphp
<section  style="background-color: #eee; padding-bottom:130px;">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-lg-12 col-xl-11">
          <div class="card text-black" style="border-radius: 25px;">
            <div class="card-body p-md-5">
              <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Update an Account</p>
              <div class="row justify-content-center">
                <form method="get" action="{{ route('empolyee.search') }}">
                  @csrf
                  <div class="input-group mb-3 ">
                    <span class="input-group-text" id="basic-addon1">200-</span>
                    <input type="search" class="form-control " name="search" 
                    @if($user!='') 
                    value="{{  ltrim($user["personal_id"],"200-")   }}"
                    @endif

                   
                    placeholder="Look for clients by their personal id" aria-label="Look for clients" required aria-describedby="button-addon2">
                    <button class="btn btn-info btn-md" type="submit"  id="button-addon2">Search</button>
                  </div>
                </form>
                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
               
                    @if ($state==1)
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>The client has been Updated successfuly</strong> 
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>
                      @elseif($state==2)
                      <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>The client is not found</strong> 
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>
                    @endif


                    @error('error')
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{$message}}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>
                      @enderror
                  
  
                  <form method="post" action="{{route("empolyee.update.client",['id'=>$user["personal_id"]??null])}}" style="
                    @if (!$user_selected)
                        display:none;
                    @endif
                    "
                    >
                    @csrf

                 


                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <label class="form-label" for="name">The Name</label>
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" 
                        @if($user!='') 
                        value="{{ $user["name"] }}"
                        @endif
                       
                        
                          autocomplete="name" autofocus />
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                        
                      </div>
                    </div>
                 


                         
              
                           
                           


                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <label class="form-label" for="personal_id">The personal number</label>
                        <div class="input-group mb-3">
                          <span class="input-group-text" id="basic-addon1">200-</span>
                          <input id="personal_id" type="text" class="form-control @error('personal_id') is-invalid @enderror" name="personal_id" 
                          @if($user!='') 
                          
                          value="{{ ltrim($user["personal_id"],"200-!") }}" 
                          @endif
                        
                          
                           autocomplete="personal_id"  aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                     
                        
                        @error('personal_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                        
                      </div>
                    </div>
  
                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <label class="form-label" for="password">New Password</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"  autocomplete="new-password">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                        
                      </div>
                    </div>
  
                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <label class="form-label" for="password-confirm">Repeat the new password</label>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation"  autocomplete="new-password">
                        
                      </div>
                    </div>
  
                 
      
                    <div class="d-flex flex-row align-items-center mb-4">
                             
                      <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        Account Type:  
                        <input type="radio" class="btn-check" name="account_type" id="option1" value="Current account" autocomplete="off" 
                      
                          @if($user=='') 
                          checked
                          @else
                            @if($user["account_type"]=='Current account')
                              checked
                             @endif
                          
                            
                        @endif
                        
                        >
                        <label class="btn btn-dark btn-sm m-1" for="option1">Current account   </label>
                       
                        <input type="radio" class="btn-check" name="account_type" id="option2" value="Savings account" autocomplete="off"  
                        
                        @if($user=='') 
                        
                        @else
                          @if($user["account_type"]=='Savings account')
                            checked
                           @endif
                        
                          
                      @endif >
                        <label class="btn btn-dark btn-sm m-1" for="option2"> Savings account </label>

                        <input type="radio" class="btn-check" name="account_type" id="option3" value="Salary account" autocomplete="off"
                        
                          @if($user=='') 
                        
                          @else
                            @if($user["account_type"]=="Salary account")
                              checked
                             @endif
                          
                            
                        @endif >
                        <label class="btn btn-dark btn-sm m-1" for="option3">Salary account</label>

                        <input type="radio" class="btn-check" name="account_type" id="option4" value="Fixed deposit account" autocomplete="off" 
                        
                          @if($user=='') 
                         
                          @else
                            @if($user["account_type"]=='Fixed deposit account')
                              checked
                             @endif
                          
                            
                        @endif>
                        <label class="btn btn-dark btn-sm m-1" for="option4">Fixed deposit account</label>

                        <input type="radio" class="btn-check" name="account_type" id="option5" value="Recurring deposit account" autocomplete="off"
                        
                          @if($user=='') 
                   
                          @else
                            @if($user["account_type"]=='Recurring deposit account')
                              checked
                             @endif
                          
                            
                        @endif >
                        <label class="btn btn-dark btn-sm m-1" for="option5">Recurring deposit account</label>

                        <input type="radio" class="btn-check" name="account_type" id="option6" value="NRI accounts" autocomplete="off"
                        
                          @if($user=='') 
                        
                          @else
                            @if($user["account_type"]=="NRI accounts" )
                              checked
                             @endif
                          
                            
                        @endif >
                        <label class="btn btn-dark btn-sm m-1" for="option6">NRI accounts</label>
                      </div>
                    </div>



                    


  
                    <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                      <button type="submit" class="btn btn-success btn-lg"> Update </button>
                    </div>
  
                  </form>
  
                </div>
                <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">
  
                  <img src="/assets/img/client.jpg"
                    class="img-fluid" alt="Sample image">
  
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>


  <script src="../assets/js/register.js"></script>
@endsection


