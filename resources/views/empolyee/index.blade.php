@extends('layouts.app')
{{-- --------------------------------------------------   emolyee ----------------------------------------------  --}}
@section('nav-elements')
<li><a class="nav-link " href="#services">Services</a></li>


<li><a class="nav-link " href="#contact">Contact</a></li>

@endsection

@section('content')


  
    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex flex-column justify-content-end align-items-center">
      <div id="heroCarousel"  class="container " >
  
        <!-- Slide 1 -->
        <div class=" active">
          <div class="carousel-container">
            <h2 class="animate__animated animate__fadeInDown">Welcome {{Auth::user()->name}}</h2>
            <p class="animate__animated fanimate__adeInUp">You can browse the site to enjoy with the services that have been provided for you.</p>
     
          </div>
        </div>
  

  
      </div>
  
      <svg class="hero-waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 28 " preserveAspectRatio="none">
        <defs>
          <path id="wave-path" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z">
        </defs>
        <g class="wave1">
          <use xlink:href="#wave-path" x="50" y="3" fill="rgba(255,255,255, .1)">
        </g>
        <g class="wave2">
          <use xlink:href="#wave-path" x="50" y="0" fill="rgba(255,255,255, .2)">
        </g>
        <g class="wave3">
          <use xlink:href="#wave-path" x="50" y="9" fill="#fff">
        </g>
      </svg>
  
    </section><!-- End Hero -->
  
    <main id="main">
  
  
  
 
  
      <!-- ======= account Services Section ======= -->
      <section id="services" class="services">
        <div class="container">
  
          <div class="section-title" >
            <h2> Services</h2>
            <p>Accounts </p>
          </div>
  
          <div class="row">
            <div class="col-lg-4 col-md-6">
        
                <div class="icon-box" >
                  <div class="icon"><i class="bi bi-person-plus" style="color: #ff689b;"></i></div>
                  <h4 class="title"><a href={{route('empolyee.create')}}>Create a client account </a></h4>
                  
                </div>

            
            </div>


            <div class="col-lg-4 col-md-6 mt-5 mt-md-0">
            
                <div class="icon-box">
                  <div class="icon"><i class="bi bi-person-dash" style="color: #e9bf06;"></i></div>
                  <h4 class="title"><a href={{route('empolyee.delete.page')}}>Delete an account</a></h4>
                
                </div>
                
            
              
            </div>
  
            <div class="col-lg-4 col-md-6 mt-5 mt-lg-0 ">
            
                <div class="icon-box" >
                  <div class="icon"><i class="bi bi-pencil-square" style="color: #3fcdc7;"></i></div>
                  <h4 class="title"><a href={{route('empolyee.edit')}}>Update an account</a></h4>
                
                </div>
                
          
              
            </div>
            <div class="col-lg-4 col-md-6 mt-5">
           
                <div class="icon-box " >
                  <div class="icon"><i class="bi bi-arrow-counterclockwise" style="color:#41cf2e;"></i></div>
                  <h4 class="title"><a href={{route('empolyee.restore.page')}}>Restore an account</a></h4>
                 
                </div>
                
           
              
            </div>
  

          </div>
  
        </div>
      </section><!-- End Services Section -->
  

          <!-- ======= transaction Services Section ======= -->
          <section id="services" class="services">
            <div class="container">
      
              <div class="section-title" >
                <h2> Services</h2>
                <p>Transactions</p>
              </div>
      
              <div class="row">
              
                <div class="col-lg-4 col-md-6 mt-5">
          
                    <div class="icon-box" >
                      <div class="icon"><i class="bi bi-bar-chart-steps" style="color: #4680ff;"></i></div>
                      <h4 class="title"><a href="{{route('client.trnsactions.page')}}">Trasactions page</a></h4>
                   
                    </div>
                    
               
                  
                </div>


                <div class="col-lg-4 col-md-6 mt-5">
               
                    <div class="icon-box" >
                      <div class="icon"><i class="bi bi-currency-dollar" style="color: #4680ff;"></i></div>
                      <h4 class="title"><a href="{{route('client.trnsactionsReports.page')}}">Show trasactions for a client</a></h4>
                   
                    </div>
                    
            
                  
                </div>
              </div>
      
            </div>
          </section><!-- End  transaction Services Section -->
     
  
      <!-- ======= Contact Section ======= -->
      <section id="contact" class="contact">
        <div class="container">
  
          <div class="section-title" >
            <h2>Contact</h2>
            <p>Contact Us</p>
          </div>
  
          <div class=" justify-content-center row mt-5">
  

  
            <div class="col-lg-8 mt-5 mt-lg-0 " >
  
              <form action="{{route('complaints')}}" method="post" role="form" class="php-email-form">
                @csrf
       
                <div class="form-group mt-3">
               
                </div>
                <div class="form-group mt-3">
                   
                  <textarea class="form-control my-4" name="message" rows="10" placeholder="Type what is the problem ..." required></textarea>
                </div>

                <div class="text-center"><button type="submit">Send Message</button></div>
              </form>
  
            </div>
  
          </div>
  
        </div>
      </section><!-- End Contact Section -->
  
    </main><!-- End #main -->
  
    <!-- ======= Footer ======= -->
    <footer id="footer">
      <div class="container">
        <h3>Baraa Bank</h3>
        <p>This bank exists to facilitate transactions for our dear customers.</p>
        <div class="social-links">
          <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
          <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
          <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
          <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
          <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
        </div>
        <div class="copyright">
          &copy; Copyright <strong><span>Selecao</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
          <!-- All the links in the footer should remain intact. -->
          <!-- You can delete the links only if you purchased the pro version. -->
          <!-- Licensing information: https://bootstrapmade.com/license/ -->
          <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/selecao-bootstrap-template/ -->
          Developed by <a href="https://bootstrapmade.com/"> Baraa Elsibakhi</a>
        </div>
      </div>
    </footer><!-- End Footer -->
  
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  



    <script src="../assets/js/main.js"></script>
@endsection