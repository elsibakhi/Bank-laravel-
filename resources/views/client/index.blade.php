@extends('layouts.app')
{{-- --------------------------------------------------   emolyee ----------------------------------------------  --}}
@section('content')


  
    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex flex-column justify-content-end align-items-center">
      <div id="heroCarousel" data-bs-interval="5000" class="container carousel carousel-fade" data-bs-ride="carousel">
  
        <!-- Slide 1 -->
        <div class="carousel-item active">
          <div class="carousel-container">
            <h2 class="animate__animated animate__fadeInDown">Welcome to <span>Client</span></h2>
            <p class="animate__animated fanimate__adeInUp">You can browse the site to enjoy the services that have been provided for you.</p>
            <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Read More</a>
          </div>
        </div>
  
        <!-- Slide 2 -->
        <div class="carousel-item">
          <div class="carousel-container">
            <h2 class="animate__animated animate__fadeInDown">We are all glad to have you visit us</h2>
            <p class="animate__animated animate__fadeInUp">You can browse the site to enjoy the services that have been provided for you.</p>
            <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Read More</a>
          </div>
        </div>

         
        <!-- Slide 2 -->
        <div class="carousel-item">
          <div class="carousel-container">
            <h2 class="animate__animated animate__fadeInDown">We are all glad to have you visit us</h2>
            <p class="animate__animated animate__fadeInUp">You can browse the site to enjoy the services that have been provided for you.</p>
            <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Read More</a>
          </div>
        </div>
  
        
  
        <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
          <span class="carousel-control-prev-icon bx bx-chevron-left" aria-hidden="true"></span>
        </a>
  
        <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
          <span class="carousel-control-next-icon bx bx-chevron-right" aria-hidden="true"></span>
        </a>
  
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
  
  
  
 
  
      <!-- ======= Services Section ======= -->
      <section id="services" class="services">
        <div class="container">
  
          <div class="section-title" data-aos="zoom-out">
            <h2>Services</h2>
            <p>What we do offer</p>
          </div>
  
          <div class="row">
            <div class="col-lg-4 col-md-6">
              <a href="">
                <div class="icon-box" data-aos="zoom-in-left">
                  <div class="icon"><i class="bi bi-briefcase" style="color: #ff689b;"></i></div>
                  <h4 class="title"><a href="">Create an account </a></h4>
                  
                </div>

              </a>
            </div>


            <div class="col-lg-4 col-md-6 mt-5 mt-md-0">
              <a href="">
                <div class="icon-box" data-aos="zoom-in-left" data-aos-delay="100">
                  <div class="icon"><i class="bi bi-book" style="color: #e9bf06;"></i></div>
                  <h4 class="title"><a href="">Delete an account</a></h4>
                
                </div>
                
              </a>
              
            </div>
  
            <div class="col-lg-4 col-md-6 mt-5 mt-lg-0 ">
              <a href="">
                <div class="icon-box" data-aos="zoom-in-left" data-aos-delay="200">
                  <div class="icon"><i class="bi bi-card-checklist" style="color: #3fcdc7;"></i></div>
                  <h4 class="title"><a href="">Update an account</a></h4>
                
                </div>
                
              </a>
              
            </div>
            <div class="col-lg-4 col-md-6 mt-5">
              <a href="">
                <div class="icon-box" data-aos="zoom-in-left" data-aos-delay="300">
                  <div class="icon"><i class="bi bi-binoculars" style="color:#41cf2e;"></i></div>
                  <h4 class="title"><a href="">Restore an account</a></h4>
                 
                </div>
                
              </a>
              
            </div>
  
            <div class="col-lg-4 col-md-6 mt-5">
              <a href="">
                <div class="icon-box" data-aos="zoom-in-left" data-aos-delay="400">
                  <div class="icon"><i class="bi bi-globe" style="color: #d6ff22;"></i></div>
                  <h4 class="title"><a href="">Show profile of a client</a></h4>
               
                </div>
                
              </a>
              
            </div>
            <div class="col-lg-4 col-md-6 mt-5">
              <a href="">
                <div class="icon-box" data-aos="zoom-in-left" data-aos-delay="500">
                  <div class="icon"><i class="bi bi-clock" style="color: #4680ff;"></i></div>
                  <h4 class="title"><a href="">Show trasactions for a client</a></h4>
               
                </div>
                
              </a>
              
            </div>
          </div>
  
        </div>
      </section><!-- End Services Section -->
  
      </section><!-- End Team Section -->
  
      <!-- ======= Contact Section ======= -->
      <section id="contact" class="contact">
        <div class="container">
  
          <div class="section-title" data-aos="zoom-out">
            <h2>Contact</h2>
            <p>Contact Us</p>
          </div>
  
          <div class="row mt-5">
  
            <div class="col-lg-4" data-aos="fade-right">
              <div class="info">
                <div class="address">
                  <i class="bi bi-geo-alt"></i>
                  <h4>Location:</h4>
                  <p>A108 Adam Street, New York, NY 535022</p>
                </div>
  
                <div class="email">
                  <i class="bi bi-envelope"></i>
                  <h4>Email:</h4>
                  <p>info@example.com</p>
                </div>
  
                <div class="phone">
                  <i class="bi bi-phone"></i>
                  <h4>Call:</h4>
                  <p>+1 5589 55488 55s</p>
                </div>
  
              </div>
  
            </div>
  
            <div class="col-lg-8 mt-5 mt-lg-0" data-aos="fade-left">
  
              <form action="forms/contact.php" method="post" role="form" class="php-email-form">
                <div class="row">
                  <div class="col-md-6 form-group">
                    <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                  </div>
                  <div class="col-md-6 form-group mt-3 mt-md-0">
                    <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                  </div>
                </div>
                <div class="form-group mt-3">
                  <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
                </div>
                <div class="form-group mt-3">
                  <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
                </div>
                <div class="my-3">
                  <div class="loading">Loading</div>
                  <div class="error-message"></div>
                  <div class="sent-message">Your message has been sent. Thank you!</div>
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
  


@endsection