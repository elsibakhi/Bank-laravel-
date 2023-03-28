@extends('layouts.app')


@section('content')


  

    </section><!-- End Hero -->
  
    <main id="main">
 
  
      <div class="container pt-5">
        <div class="section-title" >
          <h2> Transactions</h2>
          <p>Look for a Client</p>
        </div>
        @php
        $counter=1;
        $transactions=$transactions??"";
    @endphp
       
       @error('error')
       <div class="alert alert-danger alert-dismissible fade show" role="alert">
           {{$message}}
           <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
         </div>
         @enderror
        <form action=" {{route('client.trnsactions.report')}}" method="get">
         


          <div class="input-group mb-3">
            <input name="personal_id" type="search" class=" form-control" placeholder="Type personal id for the client" aria-label="Recipient's username" aria-describedby="button-addon2" value="{{$id ?? ''}}" required>
            <button class="btn btn-primary" type="submit" id="button-addon2">Search</button>
          </div>
      
<!-- Button trigger modal -->
<button type="button" class="btn btn-secondary m-2 px-4  "  onclick="printTable() " style="float:right;" >
    Print
   </button>
   

        


        <table id="table" class="table table-hover  table-bordered results my-5">
           
        <thead>
           @if ( $transactions != "")
           <tr class="table-dark">
            <th class="text-center text-light" colspan="2">All transactions for :</th>
      
            <td class="text-left text-light px-4" colspan="4">{{$id}}</td>
          
          </tr>
           @endif
       
          <tr>
            <th class="text-center">#</th>
      
            <th class="text-center" >Type</th>
            <th class="text-center" >Amount</th>
            <th class="text-center" >From</th>
            <th class="text-center" >To</th>
            <th class="text-center" >Date</th>
          </tr>
 
        </thead>
        <tbody>
  
      
      @if ($transactions != "")
      @foreach ($transactions as $item)
      <tr >
        <th class="text-center" scope="row" >{{$counter++}}</th>
        <td class="text-center">{{$item->type}}</td>
        <td class="text-center">{{$item->amount}}</td>
        <td class="text-center">{{$item->from ?? "No One"}}</td>
        <td class="text-center">{{$item->to ??"No One"}}</td>
        <td class="text-center">{{$item->created_at }}</td>
        
       
        
      </tr> 
      @endforeach
     

@else
<tr>
    <td colspan="6" class="text-center">No results</td>

</tr>


      @endif

      
      
        </tbody>
        </table>
        

      </div>
 

    </form>

  



    <script src="/assets/js/deleteClients.js"></script>
@endsection