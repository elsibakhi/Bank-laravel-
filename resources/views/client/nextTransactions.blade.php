@extends('layouts.app')



@section('content')


  
@include('client.transactionsProfile')
  
  
  

           <!-- ======= account Services Section ======= -->
           <section id="services" class="services">
            <div class="container">
      
              <div class="section-title" >
                <h2> Services</h2>
                <p>Transactions </p>
              </div>
      
              <div class="row">
                <div class="col-lg-4 col-md-6">
                 
                    <div class="icon-box" >
                      <div class="icon"><i class="bi bi-briefcase" style="color: #ff689b;"></i></div>
                      <h4 class="title"><a href={{route('empolyee.withdraw.page',$user["personal_id"])}}>Withdraw </a></h4>
                      
                    </div>
    
                
                </div>
    
    
                <div class="col-lg-4 col-md-6 mt-5 mt-md-0">
                  <a href="">
                    <div class="icon-box" >
                      <div class="icon"><i class="bi bi-book" style="color: #e9bf06;"></i></div>
                      <h4 class="title"><a href={{route('empolyee.deposit.page',$user["personal_id"])}}>Deposit</a></h4>
                    
                    </div>
                    
                  </a>
                  
                </div>
      
                <div class="col-lg-4 col-md-6 mt-5 mt-lg-0 ">
                  <a href="">
                    <div class="icon-box" >
                      <div class="icon"><i class="bi bi-card-checklist" style="color: #3fcdc7;"></i></div>
                      <h4 class="title"><a href={{route('empolyee.transfer.page',$user["personal_id"])}}>Transfer</a></h4>
                    
                    </div>
                    
                  </a>
                  
                </div>
         
      
    
              </div>
      
            </div>
          </section><!-- End Services Section -->

  

  




    <script src="../assets/js/main.js"></script>
@endsection