@php
    session(['page' => route('client.withdraw.page',[Auth::user()->personal_id])]);
    session(['nav_active' =>"withdraw"]);
 
   
@endphp



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
            <h2 class="title">withdraw</h2>
            <form method="post" action='{{route('client.withdraw')}}'>
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
                            <label class="label">How much do you want to withdraw?</label>
                            <input class="input--style-4" type="number" name="amount" required>
                        </div>
                    </div>
                </div>
                <div class="input-group">
                    <label class="label mx-3">Currency: </label>
                    <div class="rs-select2 js-select-simple select--no-search " >
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
                   
  
                    <button class="btn btn--radius-2 btn--blue"  type="submit">Withdraw Now</button>
                </div>
               
            </form>

        
        </div>
    </div>
</div>



