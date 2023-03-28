

@extends('layouts.app')


@section('head')
<link href="/assets/empolyee/profile/assets/img/favicon.png" rel="icon">
<link href="/assets/empolyee/profile/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

<!-- Google Fonts -->
<link href="https://fonts.gstatic.com" rel="preconnect">
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

<!-- Vendor CSS Files -->
<link href="/assets/empolyee/profile/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="/assets/empolyee/profile/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
<link href="/assets/empolyee/profile/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
<link href="/assets/empolyee/profile/assets/vendor/quill/quill.snow.css" rel="stylesheet">
<link href="/assets/empolyee/profile/assets/vendor/quill/quill.bubble.css" rel="stylesheet">
<link href="/assets/empolyee/profile/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
<link href="/assets/empolyee/profile/assets/vendor/simple-datatables/style.css" rel="stylesheet">

<!-- Template Main CSS File -->
<link href="/assets/empolyee/profile/assets/css/style.css" rel="stylesheet">
    
@endsection


@section('content')
    


  <main id="" class="container pt-5">

    <div class="pagetitle">
      <h1>Profile</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/">Home</a></li>
         
          <li class="breadcrumb-item active">Profile</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
      <div class="row">
        <div class="col-xl-4">

          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

              <img  src="{{Auth::user()->profile->photo}}" alt="Profile" class="rounded-circle">
              <h2>{{$user->name}}</h2>
              <h3>{{$user->empolyee->task ?? 'Empty'}}</h3>

            </div>
          </div>

        </div>

        <div class="col-xl-8">

          <div class="card">
            @if (old('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
              {{ old('success') }}.
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
  
            @error('reEnterPassword')


            <div class="alert alert-warning alert-dismissible fade show" role="alert">
              <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
               {{ $message }}.
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
          @enderror
          
          @error('currentPassword')
          <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
            {{ $message }}.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          @enderror
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">

                <li class="nav-item">
                  <button class="nav-link active " data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link " data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
                </li>



                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change Password</button>
                </li>

              </ul>
              <div class="tab-content pt-2">

                <div class="tab-pane fade  show active  profile-overview" id="profile-overview">
                  <h5 class="card-title">About</h5>
                  <p class="small fst-italic">{{$user->profile->bio ?? 'Empty'}}.</p>

                  <h5 class="card-title">Profile Details</h5>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Full Name</div>
                    <div class="col-lg-9 col-md-8">{{$user->name}}</div>
                  </div>


                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Job</div>
                    <div class="col-lg-9 col-md-8">{{$user->empolyee->task ?? "Empty"}}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Country</div>
                    <div class="col-lg-9 col-md-8">{{$user->profile->country ?? 'Empty'}}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Address</div>
                    <div class="col-lg-9 col-md-8">{{$user->profile->address ?? 'Empty'}}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Phone</div>
                    <div class="col-lg-9 col-md-8">{{$user->profile->phone ?? 'Empty'}}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Email</div>
                    <div class="col-lg-9 col-md-8">{{$user->profile->email ?? 'Empty'}}</div>
                  </div>

                </div>

                <div class="tab-pane fade  profile-edit pt-3" id="profile-edit">

                  <!-- Profile Edit Form -->
                  <form method="post" action="{{route("empolyee.update.profile")}}">
                    @csrf
                    <div class="row mb-3">
                      <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                      <div class="col-md-8 col-lg-9">
                        <img  src="{{Auth::user()->profile->photo}}" alt="Profile">
                        <div class="pt-2">
                          <a  onclick=" 

                            document.getElementById('uploadFile').click();

                     
                            " class="btn btn-primary btn-sm" title="Upload new profile image"><i class="bi bi-upload"></i></a>
                          <a  onclick=" document.getElementById('delete').submit(); "  class="btn btn-danger btn-sm" title="Remove my profile image"><i class="bi bi-trash"></i></a>
                        </div>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Full Name</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="fullName" type="text" class="form-control" id="fullName" value="{{$user->name ?? ''}}">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="about" class="col-md-4 col-lg-3 col-form-label">About</label>
                      <div class="col-md-8 col-lg-9">
                        <textarea name="bio" class="form-control" id="about" style="height: 100px">{{$user->profile->bio ?? ''}}</textarea>
                      </div>
                    </div>



                    <div class="row mb-3">
                      <label for="Country" class="col-md-4 col-lg-3 col-form-label">Country</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="country" type="text" class="form-control" id="Country" placeholder="Enter your country" value="{{$user->profile->country ?? ''}}">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Address" class="col-md-4 col-lg-3 col-form-label">Address</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="address" type="text" class="form-control" id="Address" placeholder="Enter your address" value="{{$user->profile->address ?? ''}}">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Phone</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="phone" type="text" class="form-control" id="Phone" placeholder="Enter your phone" value="{{$user->profile->phone ?? ''}}">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email" type="email" class="form-control" id="Email" placeholder="Enter your email  " value="{{$user->profile->email ?? ''}}">
                      </div>
                    </div>



                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                  </form><!-- End Profile Edit Form -->

                </div>



                <div class="tab-pane fade pt-3" id="profile-change-password">
                  <!-- Change Password Form -->
                  <form method="post" action="{{route('empolyee.change.password')}}">
                    @csrf
      
   
                    <div class="row mb-3">
                      <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="password" type="password" class="form-control" id="currentPassword" required>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="newpassword" type="password" class="form-control" id="newPassword" required>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="renewpassword" type="password" class="form-control" id="renewPassword" required>
                      </div>
                    </div>

                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Change Password</button>
                    </div>
                  </form><!-- End Change Password Form -->

                </div>

              </div><!-- End Bordered Tabs -->

            </div>
          </div>

        </div>
      </div>
    </section>




    <form   onchange=" document.getElementById('upload').submit(); " id="upload"  action="{{route("photo.upload")}}" method="post" enctype="multipart/form-data">
      @csrf
      
      
      <input    class="d-none"  type="file" name="photo" id="uploadFile">
      
      </form>
    <form  id="delete"  action="{{route("photo.delete")}}" method="post" >
      @method("delete")
      @csrf

      
      </form>
  </main><!-- End #main -->


  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>


@endsection



@section('foot')
    
<!-- Vendor JS Files -->
<script src="/assets/empolyee/profile/assets/vendor/apexcharts/apexcharts.min.js"></script>
<script src="/assets/empolyee/profile/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="/assets/empolyee/profile/assets/vendor/chart.js/chart.umd.js"></script>
<script src="/assets/empolyee/profile/assets/vendor/echarts/echarts.min.js"></script>
<script src="/assets/empolyee/profile/assets/vendor/quill/quill.min.js"></script>
<script src="/assets/empolyee/profile/assets/vendor/simple-datatables/simple-datatables.js"></script>
<script src="/assets/empolyee/profile/assets/vendor/tinymce/tinymce.min.js"></script>
<script src="/assets/empolyee/profile/assets/vendor/php-email-form/validate.js"></script>

<!-- Template Main JS File -->
<script src="/assets/empolyee/profile/assets/js/main.js"></script>
@endsection


