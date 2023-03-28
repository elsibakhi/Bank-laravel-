@extends('layouts.app')

@section('content')

<section  style="background-color: #eee; padding-bottom:130px;">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-lg-12 col-xl-11">
          <div class="card text-black" style="border-radius: 25px;">
            <div class="card-body p-md-5">
              <div class="row justify-content-center">
                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                    @if ($state==1)
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                       The client has been added successfuly
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>
                    @endif

                    @error('error')
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{$message}}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>
                      @enderror
                 
                  <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Add a new Client</p>
  
                  <form method="POST" action="{{ route('empolyee.store') }}">
                    @csrf

                 


                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <label class="form-label" for="name">The Name</label>
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus />
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                        
                      </div>
                    </div>
                 

                    <div class="d-flex flex-row align-items-center mb-4">
                             
                      <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                    <div class=" d-flex form-outline flex-fill mb-0">
                    <label class="col-4" for="gender">Genger : </label>
                    <select id="gender" name="gender" class="form-select" aria-label="Default select example">
                  
                      <option value="Male" selected>Male</option>
                      <option value="Female">Female</option>
                
                    </select>
                    </div>
                  </div>
                         
              
                           
                           


                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <label class="form-label" for="personal_id">The personal number</label>
                        <div class="input-group mb-3">
                          <span class="input-group-text" id="basic-addon1">200-</span>
                          <input id="personal_id" type="text" class="form-control @error('personal_id') is-invalid @enderror" name="personal_id" value="{{ old('personal_id') }}" required autocomplete="personal_id"  aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                     
                        
                        @error('personal_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                        
                      </div>
                    </div>
  
                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-solid fa-address-card fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <label class="form-label" for="email">Email</label>
                        <div class="input-group mb-3">
                     
                          <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email"  aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                     
                        
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                        
                      </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <label class="form-label" for="password">Password</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
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
                        <label class="form-label" for="password-confirm">Repeat your password</label>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        
                      </div>
                    </div>
  
                 
      
                    <div class="d-flex flex-row align-items-center mb-4">
                             
                      <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        Account Type:  
                        <input type="radio" class="btn-check" name="account_type" id="option1" value="Current account" autocomplete="off" checked>
                        <label class="btn btn-dark m-1 btn-sm" for="option1">Current account   </label>
                       
                        <input type="radio" class="btn-check" name="account_type" id="option2" value="Savings account" autocomplete="off" >
                        <label class="btn btn-dark m-1 btn-sm" for="option2"> Savings account </label>

                        <input type="radio" class="btn-check" name="account_type" id="option3" value="Salary account" autocomplete="off" >
                        <label class="btn btn-dark m-1 btn-sm" for="option3">Salary account</label>

                        <input type="radio" class="btn-check" name="account_type" id="option4" value="Fixed deposit account" autocomplete="off" >
                        <label class="btn btn-dark m-1 btn-sm" for="option4">Fixed deposit account</label>

                        <input type="radio" class="btn-check" name="account_type" id="option5" value="Recurring deposit account" autocomplete="off" >
                        <label class="btn btn-dark m-1 btn-sm" for="option5">Recurring deposit account</label>

                        <input type="radio" class="btn-check" name="account_type" id="option6" value="NRI accounts" autocomplete="off" >
                        <label class="btn btn-dark m-1 btn-sm" for="option6">NRI accounts</label>
                      </div>
                    </div>



                    


                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <label class="form-label" for="balance">Balance</label>
                        <div class="input-group mb-3">
                       
                          <input id="balance" type="number" class="form-control @error('balance') is-invalid @enderror" name="balance" value="{{ old('balance') }}" required autocomplete="balance"  aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                     
                        
                        @error('personal_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                        
                      </div>
                    </div>
  
                    <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                      <button type="submit" class="btn btn-primary btn-md col-6">   Add </button>
                    </div>
  
                  </form>
  
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


