@extends('layouts.app')

@section('head')
        <!-- Icons font CSS-->
        <link href="/../assets/opreations/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
        <link href="/../assets/opreations/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
        <!-- Font special for pages-->
        <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    
        <!-- Vendor CSS-->
        <link href="/../assets/opreations/vendor/select2/select2.min.css" rel="stylesheet" media="all">
        <link href="/../assets/opreations/vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <!-- Main CSS-->
        <link href="/../assets/opreations/css/main.css" rel="stylesheet" media="all">
@endsection
@section('content')

<div class="wrapper wrapper--w680  p-t-100">
    @if (old('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong></strong>{{old("success")}}.
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>  
    @endif

    @error('error')
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong></strong>{{ $message }}.
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>  
    @enderror
    <div class="card card-4 p-5">
        <div class="card-body">
            <h2 class="title">deposit</h2>
            <form method="post" action='{{route('empolyee.deposit')}}'>
                   @csrf

                <div class="row row-space">
                
                    <div class="col-12">
                        <div class="input-group">
                            <label class="label">Your Balance</label>
                            <input class="input--style-4" type="text" readonly value={{$user['balance']}}>
                        </div>
                    </div>
                
                 
                </div>

             
    
                <div class="row row-space">
                  
                    <div class="col-12 " style=" width:100%">
                        <div class="input-group">
                            <label class="label">How much do you want to deposit?</label>
                            <input class="input--style-4" type="number" name="amount" required>
                        </div>
                    </div>
                </div>
                <div class="input-group">
                    <label class="label mx-3">Currency: </label>
                    <div class="rs-select2 js-select-simple select--no-search" >
                        <select name="currency" >
                            <option  value="USD" selected >USD</option>
                            <option value="EUR">EUR</option>
                            <option value="ILS">ILS</option>
                        </select>
                        <div class="select-dropdown"></div>
                    </div>
                </div>
                <input type="hidden" name="personal_id" value="{{$user['personal_id']}}">
                <div class="p-t-15 justify-content-around w-100 d-flex">
       
                    <button class="btn btn--radius-2 btn-primary" type="submit">Deposit Now</button>
                </div>
               
            </form>

        
        </div>
    </div>
</div>
@endsection

@section('foot')
    

         <!-- Vendor JS-->
         <script src="/../assets/opreations/vendor/select2/select2.min.js"></script>
         <script src="/../assets/opreations/vendor/datepicker/moment.min.js"></script>
         <script src="/../assets/opreations/vendor/datepicker/daterangepicker.js"></script>
     
         <!-- Main JS-->
         <script src="/../assets/opreations/js/global.js"></script>
@endsection