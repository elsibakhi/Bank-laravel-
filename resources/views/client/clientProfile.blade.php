@php
    session(['page' => route('client.profile.page')]);
    session(['nav_active' =>"profile"]);
@endphp
<div class="content">

  <div class="row">
    <div class="col-md-8">
      @if (old('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong></strong>{{old("success")}}.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>  
      @endif
      <div class="card">
        <div class="card-header">
          <h5 class="title">Edit Profile</h5>
        </div>
        <div class="card-body p-5">
          <form method="post" action="{{route("client.update.profile")}}" >
            @csrf
            <div class="row">

              <div class="col-md-3 px-md-1">
                <div class="form-group">
                  <label>Personal Id</label>
                  <input  name="personal_id" type="text" class="form-control" placeholder="personal id" value="{{$user->personal_id ?? ''}}">
                </div>
              </div>
              <div class="col-md-4 pl-md-1">
                <div class="form-group">
                  <label for="exampleInputEmail1">Email address</label>
                  <input name="email" type="email" class="form-control" placeholder="mike@email.com" value="{{$user->profile->email ?? ''}}">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6 pr-md-1">
                <div class="form-group">
                  <label>Full Name</label>
                  <input name="name" type="text" class="form-control" placeholder="Company"  value="{{$user->name ?? ''}}">
                </div>
              </div>

            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label>Address</label>
                  <input name="address" type="text" class="form-control" placeholder="Home Address" value="{{$user->profile->address ?? ''}}">
                </div>
              </div>
            </div>
            <div class="row">

              <div class="col-md-4 px-md-1">
                <div class="form-group">
                  <label>Country</label>
                  <input name="country" type="text" class="form-control" placeholder="Country" value="{{$user->profile->country ?? ''}}">
                </div>
              </div>
              <div class="col-md-4 pl-md-1">
                <div class="form-group">
                  <label>Phone number</label>
                  <input name="phone" type="number" class="form-control" placeholder="123 456 789" value="{{$user->profile->phone ?? ''}}">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-8">
                <div class="form-group">
                  <label>About Me</label>
                  <textarea name="bio" rows="4" cols="80" class="form-control" placeholder="Here can be your description" >{{$user->profile->bio ?? ''}}</textarea>
                </div>
              </div>
            </div>

            <div class="card-footer">
              <button type="submit" class="btn btn-fill btn-primary">Save</button>
            </div>
          </form>
        </div>
    
      </div>
    </div>
    <div class="col-md-4">
      <div class="card card-user">
        <div class="card-body">
          <p class="card-text">
            <div class="author">
              <div class="block block-one"></div>
              <div class="block block-two"></div>
              <div class="block block-three"></div>
              <div class="block block-four"></div>
              <a href="javascript:void(0)">
                <img class="avatar"  src="{{Auth::user()->profile->photo}}" alt="...">
                <h5 class="title"> {{$user->name}}</h5>
              </a>
              <div class="pt-2">
                <a  onclick=" 

                  document.getElementById('uploadFile').click();

           
                  " class="btn btn-primary btn-sm" title="Upload new profile image"><i class="fa-solid fa-cloud-arrow-up text-light"></i></a>
                <a  onclick=" document.getElementById('delete').submit(); "  class="btn btn-danger btn-sm" title="Remove my profile image"><i class="fa-solid fa-trash text-light"></i></a>
              </div>
              <p class="description">
               {{$user->client->account_type}}
              </p>
            </div>
          </p>
          <div class="card-description">
            {{$user->profile->bio ?? 'Three is no bio'}}
          </div>
        </div>
        <div class="card-footer">
          <div class="button-container">



            
    <form   onchange=" document.getElementById('upload').submit(); " id="upload"  action="{{route("photo.upload")}}" method="post" enctype="multipart/form-data">
      @csrf
      
      
      <input    class="d-none"  type="file" name="photo" id="uploadFile">
      
      </form>
    <form  id="delete"  action="{{route("photo.delete")}}" method="post" >
      @method("delete")
      @csrf

      
      </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


