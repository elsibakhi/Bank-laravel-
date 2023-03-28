@php
    session(['page' => route('client.complaint.page')]);
    session(['nav_active' =>"complaint"]);
@endphp
        <div class="wrapper wrapper--w680  p-t-100">
            @if (old('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              <strong></strong>{{old("success")}}.
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>  
            @endif
            <div class="card card-4 p-5">
                <div class="card-body">
                    <h2 class="title">complaint</h2>
                    <form method="post" action='{{route("client.complaint")}}'>
                           @csrf

                        <div class="row row-space">
                        
                            <div class="col-12">
                                <div class="input-group">
                                    <label class="label ">Your complaint: </label>
                                    <textarea class="col-12 p-3" name="complaint" id="com" cols="30" rows="10" required></textarea>
                                  
                                </div>
                            </div>
                        
                         
                        </div>

                     

            
            
                        <div class="p-t-15 justify-content-around w-100 d-flex">
                           
                     
                            <button class="btn btn--radius-2 btn--blue"  type="submit">Submit now</button>
                        </div>
                       
                    </form>

                
                </div>
            </div>
        </div>


     
