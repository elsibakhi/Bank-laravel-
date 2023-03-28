<section style="background-color: #eee;">
    <div class="container pt-5">

  
      <div class="row">
        <div class="col-lg-4">
          <div class="card mb-4">
            <div class="card-body text-center">
              <img src="{{$user->profile->photo}}" alt="avatar"
                class="rounded-circle img-fluid" style="width: 150px;">
              <h5 class="my-3">{{$user['name']}}</h5>
              <p class="text-muted mb-1">@ {{$user['personal_id']}}</p>
        
            </div>
          </div>

        </div>
        <div class="col-lg-8">
          <div class="card mb-4">
            <div class="card-body">
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Full Name</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">{{$user['name']}}</p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Personal ID</p>
                </div>
                <div class="col-sm-9">{{$user['personal_id']}}
                  <p class="text-muted mb-0"></p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Account Type</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">{{$user['account_type']}}</p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Balance</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">{{$user['balance']}}</p>
                </div>
              </div>
              <hr>
           
            </div>
          </div>

        </div>
      </div>





    </div>
  </section>