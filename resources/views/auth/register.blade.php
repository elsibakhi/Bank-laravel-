
@extends('admin.layout.master')

@section('head')


<link rel="dns-prefetch" href="//fonts.gstatic.com">
<link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>




<!-- Favicons -->
<link href="../assets/img/favicon.png" rel="icon">
<link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

<!-- Vendor CSS Files -->
<link href="/assets/vendor/animate.css/animate.min.css" rel="stylesheet">
<link href="/assets/vendor/aos/aos.css" rel="stylesheet">
<link href="/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
<link href="/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
<link href="/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
<link href="/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
<link href="/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

<!-- Template Main CSS File -->
<link href="/assets/css/style.css" rel="stylesheet">


<style>
a{
  text-decoration: none !important;
  font-size: 14px !important;
  font-weight: normal !important; 
}

</style>
@endsection


@section('content')
    
<div class="page-wrapper">


  <section  style="">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-lg-12 col-xl-11">
          <div class="card text-black" style="border-radius: 25px;">
            <div class="card-body p-md-5">
              <div class="row justify-content-center">
                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
  
                  <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Add users</p>
                  @error('duplicate')
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                   {{ $message }} 
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                   
                
                @enderror
                  <form  method="post" action="{{route('register')}}">
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
                             
                              <i class="fas fa-users fa-lg me-3 fa-fw"></i>
                              <div class="form-outline flex-fill mb-0">
                                The Role :  
                                <input type="radio" class="btn-check" name="options" id="option1" value="emolyee" autocomplete="off" checked>
                                <label class="btn btn-outline-secondary" for="option1">Emolyee</label>

                                <input type="radio" class="btn-check" name="options" id="option2" value="client" autocomplete="off" >
                                <label class="btn btn-outline-secondary" for="option2">Client</label>
                              </div>
                            </div>


                            <div class="d-flex flex-row align-items-center mb-4">
                              
                              <i class="fas fa-venus-mars fa-lg me-3 fa-fw"></i>
                            <div class=" d-flex form-outline flex-fill mb-0">
                            <label class="col-4" for="gender">Genger : </label>
                            <select id="gender" name="gender" class="form-select" aria-label="Default select example">
                          
                              <option value="Male" selected>Male</option>
                              <option value="Female">Female</option>
                        
                            </select>
                            </div>
                          </div>
                             

         

                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-solid fa-address-card fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <label class="form-label" for="personal_id">The personal number</label>
                        <div class="input-group mb-3">
                          <span class="input-group-text" id="basic-addon1">100-</span>
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
  
<div id="section">

  <div id="empolyeeSection">  {{--   empolyee ----------- --}}



    <div class="d-flex flex-row align-items-center mb-4">
                             
      <i class="fas fa-briefcase fa-lg me-3 fa-fw"></i>
    <div class=" d-flex form-outline flex-fill mb-0">
    <label class="col-4" for="banking_job">Banking job : </label>
    <select id="banking_job" name="banking_job" class="form-select" aria-label="Default select example">
  
      <option value="Bank teller" selected>Bank teller</option>
      <option value="Loan processor">Loan processor</option>
      <option value="Investment representative">Investment representative</option>
      <option value="Credit analyst">Credit analyst</option>
      <option value="Investment banker">Investment banker</option>
      <option value="Financial analyst">Financial analyst</option>

    </select>
    </div>
  </div>

    

  
    <div class="d-flex flex-row align-items-center mb-4">
      <i class="fas fa-dollar-sign fa-lg me-3 fa-fw"></i>
      <div class="form-outline flex-fill mb-0">
        <label class="form-label" for="salary">Salary</label>
        <div class="input-group mb-3">
       
          <input id="salary" type="number" class="form-control @error('salary') is-invalid @enderror" name="salary" value="{{ old('salary') }}"  autocomplete="salary"  aria-describedby="basic-addon1">
        </div>
     
        
        @error('personal_id')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
        
      </div>
    </div>


  </div>



  <div id="clientSection">  {{--   client ----------- --}}



    <div class="d-flex flex-row align-items-center mb-4">
                             
      <i class="fas fa-piggy-bank fa-lg me-3 fa-fw"></i>
    <div class=" d-flex form-outline flex-fill mb-0">
    <label class="col-4" for="account_type">Account type : </label>
    <select id="account_type" name="account_type" class="form-select" aria-label="Default select example">
  
      <option value="Current account" selected>Current account</option>
      <option value="Savings account">Savings account</option>
      <option value="Salary account">Salary account</option>
      <option value="Fixed deposit account">Fixed deposit account</option>
      <option value="Recurring deposit account">Recurring deposit account</option>
      <option value="NRI accounts">NRI accounts</option>

    </select>
    </div>
  </div>

   

    <div class="d-flex flex-row align-items-center mb-4">
      <i class="fas fa-dollar-sign fa-lg me-3 fa-fw"></i>
      <div class="form-outline flex-fill mb-0">
        <label class="form-label" for="balance">Balance</label>
        <div class="input-group mb-3">
       
          <input id="balance" type="number" class="form-control @error('balance') is-invalid @enderror" name="balance" value="{{ old('balance') }}"  autocomplete="balance"  aria-label="Username" aria-describedby="basic-addon1">
        </div>
     
        
        @error('personal_id')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
        
      </div>
    </div>


  </div>
</div>


  
                    <div class="d-flex justify-content-center ">
                      <button type="submit" class="btn btn-success btn-md col-6">Add</button>
     
         
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




	<footer class="footer text-center "> 2023 © Baraa Bank <a
		href="/">BaraaBank.com</a>
</footer>

</div>





@endsection


@section('foot')
<script src="../assets/js/register.js"></script>


<!-- Vendor JS Files -->
<script src="/assets/vendor/aos/aos.js"></script>
<script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="/assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="/assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="/assets/vendor/php-email-form/validate.js"></script>


<!-- jquery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>



@endsection




       
    


