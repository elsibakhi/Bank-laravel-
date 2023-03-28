<div class="wrapper">
    <div class="sidebar">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red"
    -->
    @php
        $nav_active=session("nav_active");
    @endphp
      <div class="sidebar-wrapper">
        <div class="logo">
          <a style="cursor: pointer" onclick="loadDoc('{{route('client.dashboard.page')}}')" class="simple-text logo-mini">
            BB
          </a>
          <a style="cursor: pointer" onclick="loadDoc('{{route('client.dashboard.page')}}')" class="simple-text logo-normal">
            Baraa Bank
          </a>
        </div>
        <ul class="nav head_nav">
          <li id="dashboardNav">
            <a  onclick="loadDoc('{{route('client.dashboard.page')}}')" >
              <i class="tim-icons icon-chart-pie-36"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li>

          <li id="profileNav">
            <a  onclick="loadDoc('{{route('client.profile.page')}}')">
              <i class="tim-icons icon-single-02"></i>
              <p> Profile</p>
            </a>
          </li>
          <li id="withdrawNav">
            <a   onclick="loadDoc('{{route('client.withdraw.page',[Auth::user()->personal_id])}}')" >
              <i class="fa-solid fa-right-from-bracket"></i>
              <p> Withdraw</p>
            </a>
          </li>
          <li id="depositNav">
            <a  onclick="loadDoc('{{route('client.deposit.page',[Auth::user()->personal_id])}}')" >
              <i class="fa-solid fa-right-to-bracket"></i>
              <p> Deposit</p>
            </a>
          </li>
          <li id="transferNav">
            <a  onclick="loadDoc('{{route('client.transfer.page',[Auth::user()->personal_id])}}')">
              <i class="fa-solid fa-right-left"></i>
              <p> Tranfer</p>
            </a>
          </li>
          <li id="complaintNav">
            <a  onclick="loadDoc('{{route('client.complaint.page')}}')" >
              <i class="fa-solid fa-message"></i>
              <p> Complaint</p>
            </a>
          </li>


        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-absolute navbar-transparent" id="offset">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle d-inline">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand" style="cursor: pointer" onclick="loadDoc('{{route('client.dashboard.page')}}')">Dashboard</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse" id="navigation">
            <ul class="navbar-nav ml-auto">

              <li class="dropdown nav-item">
                <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                  <div class="photo">
                    <img class="bg-light" src="{{Auth::user()->profile->photo}}" alt="Profile Photo">
                  </div>
                  <b class="caret d-none d-lg-block d-xl-block"></b>
                  <p class="d-lg-none">
                    Log out
                  </p>
                </a>
                <ul class="dropdown-menu dropdown-navbar">
                  <li class="nav-link"><a onclick="loadDoc('{{route('client.profile.page')}}')" style="cursor: pointer" class="nav-item dropdown-item">Profile</a></li>
             
                  <li class="dropdown-divider"></li>
                  <li class="nav-link"><a href="" onclick=" event.preventDefault();
                     document.getElementById('logout').submit();
                  " class="nav-item dropdown-item">Log out </a></li>
                </ul>
                <form id="logout" action="{{route("logout")}}" method="post">
                  @csrf
                </form> 
              </li>
              <li class="separator d-lg-none"></li>
            </ul>
          </div>
        </div>
      </nav>
      <div class="modal modal-search fade" id="searchModal" tabindex="-1" role="dialog" aria-labelledby="searchModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="SEARCH">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <i class="tim-icons icon-simple-remove"></i>
              </button>
            </div>
          </div>
        </div>
      </div>
      <!-- End Navbar -->