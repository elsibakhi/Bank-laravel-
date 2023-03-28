@php


    session(['page' => route('client.dashboard.page')]);
    session(['nav_active' =>"dashboard"]);
@endphp

  <div class="row">

    <div class="col-12">
      <div class="card card-chart">
        <div class="card-header ">
          <div class="row py-5">
            <div class="col-sm-12 text-left">
          
          
              <h5 class="card-category">Services</h5>
              <h2 class="card-title">Transactions</h2>
            </div>
            <div class="col-sm-12 justify-content-around py-5 row">

              <div class="card bg-dark  col-lg-5">
                <div class="card-header">
                  Withdraw
                </div>
                <div class="card-body">
                  <h5 class="card-title">Withdraw money</h5>
                  <p class="card-text">You can now withdraw whatever you want from your account.</p>
                  <a onclick="  loadDoc('{{route('client.withdraw.page',[Auth::user()->personal_id])}}')" class="btn btn-primary text-white">Go Now</a>
                </div>
              </div>
              <div class="card bg-dark col-lg-5">
                <div class="card-header">
                  Deposit
                </div>
                <div class="card-body">
                  <h5 class="card-title">Deposit money</h5>
                  <p class="card-text">You can now deposit whatever you want to your account.</p>
                  <a onclick="loadDoc('{{route('client.deposit.page',[Auth::user()->personal_id])}}')"  class="btn btn-primary text-white">Go Now</a>
                </div>
              </div>
              <div class="card bg-dark   col-lg-5">
                <div class="card-header">
                  Transfer
                </div>
                <div class="card-body">
                  <h5 class="card-title">Transfer money</h5>
                  <p class="card-text">You can now transfer whatever you want from your account to another.</p>
                  <a onclick="loadDoc('{{route('client.transfer.page',[Auth::user()->personal_id])}}')"  class="btn btn-primary text-white">Go Now</a>
                </div>
              </div>
             


            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-4">
      <div class="card card-chart">
        <div class="card-header">
          <h5 class="card-category">Number of transactions</h5>
          <h3 class="card-title"><i class="tim-icons icon-bell-55 text-primary"></i>{{$number_of_transactions}}</h3>
        </div>

      </div>
    </div>
    <div class="col-lg-4">
      <div class="card card-chart">
        <div class="card-header">
          <h5 class="card-category">Your balance</h5>
          <h3 class="card-title"><i class="tim-icons icon-delivery-fast text-info"></i>{{$client->balance}}</h3>
        </div>

      </div>
    </div>
    <div class="col-lg-4">
      <div class="card card-chart">
        <div class="card-header">
          <h5 class="card-category">Your account Type</h5>
          <h3 class="card-title"><i class="tim-icons icon-send text-success"></i>{{$client->account_type}}</h3>
        </div>

      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-6 col-md-12">
      <div class="card card-tasks">
        <div class="card-header d-flex justify-content-between ">
          <h6 class="title d-inline">Complaints form</h6>
          
          <div class="d-inline">
     
              <a class="btn btn-success text-white" onclick="loadDoc('{{route('client.complaint.page')}}')">Make a complaint</a>
        
            </div>
          </div>
    
     
     
  
      
        <div class="card-body ">
          <div class="table-full-width table-responsive" style="overflow: auto">
            <table class="table tablesorter "  id="">
              <thead class=" text-primary">
                <tr>
                  <th class="text-center">
                    #
                  </th >
                  <th class="text-center">
                    complaint
                  </th>
                  <th class="text-center">
                    state
                  </th>
                  <th class="text-center">
                    replays
                  </th>

                </tr>
              </thead>
              <tbody>
                @php
                $counter=1;
              
            @endphp
            
            
            @foreach ($complaints as $item)
            <tr >
              <th class="text-center" scope="row" >{{$counter++}}</th>
              <td class="text-center">{{$item->massage}}</td>
              <td class="text-center">
                <span 
                @if ($item->state=="Approved")
                class= "badge bg-success rounded px-2 font-monospace"
                @elseif ($item->state=="Rejected")
                class= "badge bg-danger rounded px-2 font-monospace"
                @else
                class= "badge bg-primary rounded px-2 font-monospace"
                @endif
              
                
                >{{$item->state}}</span>
                
               </td>
              <td class="">
                <ol class="list-group list-group-numbered  ">
                @foreach ($item->replays as $replay)
               
                @if ($replay->replay !='')
                <li class="list-group-item text-light border-0 p-2 bg-transparent" > {{$replay->replay}}</li>
                @endif
                 
            
              
                @endforeach
              </ol>
              </td>

              
            </tr> 
            @endforeach


              </tbody>
            </table>
           
            {{$complaints->appends(['page_a' => $transactions->currentPage()])->links("component.paginator")}}







          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-6 col-md-12">
      <div class="card ">
        <div class="card-header">
          <h4 class="card-title">Last transactions</h4>
        </div>
        <div class="card-body">
          <div class="table-responsive" style="overflow: auto">
            <table class="table tablesorter " id="">
              <thead class=" text-primary">
                <tr>
                  <th class="text-center">
                    type
                  </th>
                  <th class="text-center">
                    amount
                  </th>
                  <th class="text-center">
                    from
                  </th>
                  <th class="text-center">
                    to
                  </th>
                  <th class="text-center">
                    date
                  </th>
                </tr>
              </thead>
              <tbody>
                @foreach ($transactions as $item)
                   
                <tr>
                  <td class="text-center">
                   {{$item->type}}
                  </td>
                  <td class="text-center">
                    {{$item->amount}}
                  </td>
                  <td class="text-center">
                    {{($item->from==Auth::user()->personal_id) ? "Your account" : $item->from ?? "No one"}}
                  </td>
                  <td class="text-center">
                    {{($item->to==Auth::user()->personal_id) ? "Your account" : $item->to ?? "No one" }}
                  </td>
                  <td class="text-center">
                    {{$item->created_at}}
                  </td>
                </tr>
                @endforeach


              </tbody>
            </table>
           
            {{$transactions->appends(['page_b' => $complaints->currentPage()])->links("component.paginator")}}
          </div>
        </div>
      </div>
    </div>
  </div>



      