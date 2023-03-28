

@extends('admin.layout.master')

@section('head')
<link rel="canonical" href="https://www.wrappixel.com/templates/ample-admin-lite/" />
<!-- Favicon icon -->
<link rel="icon" type="image/png" sizes="16x16" href="assets/admin/plugins/images/favicon.png">
<!-- Custom CSS -->
<link href="assets/admin/css/style.min.css" rel="stylesheet">
@endsection
















@section('content')
            <!-- ============================================================== -->
            <div class="page-wrapper">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="page-breadcrumb bg-white">
                    <div class="row align-items-center">
                        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                            <h4 class="page-title">Profile page</h4>
                        </div>
    
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Container fluid  -->
                <!-- ============================================================== -->
                <div class="container-fluid">
                    <!-- ============================================================== -->
                    <!-- Start Page Content -->
                    <!-- ============================================================== -->
                    <!-- Row -->
                    <div class="row">
                        <!-- Column -->
                        <div class="col-lg-4 col-xlg-3 col-md-12">
                            <div class="white-box">
                                <div class="user-bg"> 
                                    <div class="overlay-box">
                                        <div class="user-content">
                                            <a  style="cursor: pointer"  onclick=" 
                                        
                                            document.getElementById('uploadFile').click();
                      
                                            "><img src="{{Auth::user()->profile->photo}}"
                                                    class="thumb-lg img-circle" alt="img"></a>
                                                    
                                                    <div class="pt-2">
                                                     
                                                        <a  onclick=" document.getElementById('delete').submit(); "  class="btn btn-danger btn-sm text-light" title="Remove my profile image">Delete Your photo</a>
                                                      </div>
                                            <h4 class="text-white mt-2">{{$user->personal_id}}</h4>
                                            <h5 class="text-white mt-2"> {{$user->profile->email ??  'Three is no email' }}</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="user-btm-box mt-5 d-md-flex">
                               <h3>{{$user->profile->phone ?? 'Three is no phone number '}}</h3 >
                                </div>
                            </div>
                        </div>
                        <!-- Column -->
                        <!-- Column -->
                        <div class="col-lg-8 col-xlg-9 col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <form  action="{{route('admin.profile.update')}}" method="post" class="form-horizontal form-material">
                                        @csrf
                                        <div class="form-group mb-4">
                                            <label class="col-md-12 p-0">Full Name</label>
                                            <div class="col-md-12 border-bottom p-0">
                                                <input type="text" placeholder="Johnathan Doe" name="name"
                                                    class="form-control p-0 border-0"  value="{{$user->name}}"> </div>
                                        </div>
                                        <div class="form-group mb-4">
                                            <label for="example-email" class="col-md-12 p-0">Email</label>
                                            <div class="col-md-12 border-bottom p-0">
                                                <input type="email" placeholder="johnathan@admin.com" name="email"
                                                    class="form-control p-0 border-0" name="example-email"
                                                    id="example-email" value="{{$user->profile->email ?? ''}}">
                                            </div>
                                        </div>
                                        <div class="form-group mb-4">
                                            <label class="col-md-12 p-0">Password</label>
                                            <div class="col-md-12 border-bottom p-0">
                                                <input name="password" type="password"  class="form-control p-0 border-0"  placeholder="Enter a new password">
                                            </div>
                                        </div>
                                        <div class="form-group mb-4">
                                            <label class="col-md-12 p-0">Phone No</label>
                                            <div class="col-md-12 border-bottom p-0">
                                                <input name="phone" type="text" placeholder="123 456 7890"
                                                    class="form-control p-0 border-0" value="{{$user->profile->phone ?? ''}}">
                                            </div>
                                        </div>
                                        <div class="form-group mb-4">
                                            <label class="col-md-12 p-0">Bio</label>
                                            <div class="col-md-12 border-bottom p-0">
                                                <textarea name="bio" rows="5" class="form-control p-0 border-0" >{{$user->profile->bio ?? ''}}</textarea>
                                            </div>
                                        </div>
                                        <div class="form-group mb-4">
                                            <label class="col-sm-12">Country</label>
    
                                            <div class="col-md-12 border-bottom p-0">
                                                <input type="text"  name="country"
                                                    class="form-control p-0 border-0" placeholder="Enter your country" value="{{$user->profile->country ?? ''}}">
                                            </div>
                                        </div>
                                        <div class="form-group mb-4">
                                            <div class="col-sm-12">
                                                <button type="submit" class="btn btn-success">Update Profile</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                                        
    <form   onchange=" document.getElementById('upload').submit(); " id="upload"  action="{{route("photo.upload")}}" method="post" enctype="multipart/form-data">
        @csrf
        
        
        <input    class="d-none"  type="file" name="photo" id="uploadFile">
        
        </form>
      <form  id="delete"  action="{{route("photo.delete")}}" method="post" >
        @method("delete")
        @csrf
  
        
        </form>
                        </div>
                        <!-- Column -->
                    </div>
                    <!-- Row -->
                    <!-- ============================================================== -->
                    <!-- End PAge Content -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Right sidebar -->
                    <!-- ============================================================== -->
                    <!-- .right-sidebar -->
                    <!-- ============================================================== -->
                    <!-- End Right sidebar -->
                    <!-- ============================================================== -->
                </div>
                <!-- ============================================================== -->
                <!-- End Container fluid  -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- footer -->
                <!-- ============================================================== -->
                <footer class="footer text-center"> 2023 © Baraa Bank <a
                        href="/">BaraaBank.com</a>
                </footer>
                <!-- ============================================================== -->
                <!-- End footer -->
                <!-- ============================================================== -->
            </div>
@endsection
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->

        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
@section('foot')
<script src="assets/admin/plugins/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap tether Core JavaScript -->
<script src="assets/admin/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="assets/admin/js/app-style-switcher.js"></script>
<!--Wave Effects -->
<script src="assets/admin/js/waves.js"></script>
<!--Menu sidebar -->
<script src="assets/admin/js/sidebarmenu.js"></script>
<!--Custom JavaScript -->
<script src="assets/admin/js/custom.js"></script>
@endsection
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->

