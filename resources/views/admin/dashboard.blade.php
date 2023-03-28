

@extends('admin.layout.master')

@section('head')

@endsection

@section('content')
            <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb bg-white">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Dashboard</h4>
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
                <!-- Three charts -->
                <!-- ============================================================== -->
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-md-12">
                        <div class="white-box analytics-info">
                            <h3 class="box-title">Total Transactions last week</h3>
                            <ul class="list-inline two-part d-flex align-items-center mb-0">
                                <li>
                                    <div id="sparklinedash"><canvas width="67" height="30"
                                            style="display: inline-block; width: 67px; height: 30px; vertical-align: top;"></canvas>
                                    </div>
                                </li>
                                <li class="ms-auto"><span id="number_of_transactions_last_7_days" class="counter text-success">{{ $number_of_transactions_last_7_days}}</span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div class="white-box analytics-info">
                            <h3 class="box-title">Number of active users </h3>
                            <ul class="list-inline two-part d-flex align-items-center mb-0">
                                <li>
                                    <div id="sparklinedash2"><canvas width="67" height="30"
                                            style="display: inline-block; width: 67px; height: 30px; vertical-align: top;"></canvas>
                                    </div>
                                </li>
                                <li class="ms-auto"><span id="number_users_active" class="counter text-purple">{{$number_users_active}}</span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div class="white-box analytics-info">
                            <h3 class="box-title">Number of complaints</h3>
                            <ul class="list-inline two-part d-flex align-items-center mb-0">
                                <li>
                                    <div id="sparklinedash3"><canvas width="67" height="30"
                                            style="display: inline-block; width: 67px; height: 30px; vertical-align: top;"></canvas>
                                    </div>
                                </li>
                                <li class="ms-auto"><span id="number_of_complaints" class="counter text-info">{{$number_of_complaints}}</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
               
                <!-- ============================================================== -->
                <!-- RECENT SALES -->
                <!-- ============================================================== -->

           
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12">
                        <div class="white-box">
                            <div class="d-md-flex mb-3">
                                <h3 class="box-title mb-0">Recent transactions</h3>
                                <div class="col-md-3 col-sm-4 col-xs-6 ms-auto">
                                    <form id="transactions_options"  onchange="filter_transactions()" action="{{route('admin.filter.transactions')}}" method="get">
                                        <select name="filter_month" class="form-select shadow-none row border-top">
                                            <option value="all" @if ($item_selected=="all")
                                            selected
                                        @endif >All</option>
                                            @foreach ($last_5_months as $item)
                                            <option value="{{$item}}" @if ($item==$item_selected)
                                                selected
                                            @endif>{{$item}}</option>
    
                                            @endforeach
                                           
                                        </select>
                                    
                                    </form>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table no-wrap">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0">#</th>
                                            <th class="border-top-0">Name</th>
                                            <th class="border-top-0">Type</th>
                                            <th class="border-top-0">Date</th>
                                            <th class="border-top-0">Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                  
                       @foreach ($last_transactions as $item)
                       <tr>
                        <td>{{$item->id}}</td>
                        <td class="txt-oflo">{{ $item->client->user->name}}</td>
                        <td>{{$item->type}}</td>
                        <td class="txt-oflo">{{$item->created_at}}</td>
                        <td><span 
                            @if ($item->type=="withdraw")
                            class=  " text-danger"
                            
                            @elseif ($item->type=="deposit")
                            class=  " text-success"
                            @else
                            class=  " text-primary"
                            @endif
                           >
                           @if ($item->type=="withdraw")
                           -
                           
                           @elseif ($item->type=="deposit")
                          +
                           @else
                        &nbsp;
                           @endif
                           {{$item->amount}}</span></td>
                    </tr>
                       @endforeach


                                     
                                    </tbody>

                      
                                </table>
                                {{$last_transactions->appends(['page_b' => $complaints->currentPage()])->links("component.paginator")}}
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- Recent Comments -->
                <!-- ============================================================== -->
                <div class="row">
                    <!-- .col -->
                    <div class="col-12 ">
                        <div class="card white-box p-0">
                            <div class="card-body">
                                <h3 class="box-title mb-0">Recent Complaints</h3>
                            </div>
                            <div class="comment-widgets">
                                @foreach ($complaints as $item)
    
                                
                                
                                <!-- Comment Row -->
                                <div class=" container border   border-3 rounded-3  p-4    mx-auto d-flex flex-row comment-row p-3 mt-0">
                                    <div class="p-2"><img  src="{{$item->user->profile->photo}}"  alt="user" width="50" class="rounded-circle"></div>
                                    <div class="comment-text ps-2 ps-md-3 w-100">
                                        <h5 class="font-medium">{{$item->user->name}}</h5>
                                        <span class="mb-3 d-block">{{$item->massage}}. </span>
                                        <div class="  comment-footer d-md-flex align-items-center" style="position: relative;">
                                             <span 
                                             @if ($item->state=="Approved")
                                             class= "badge bg-success rounded px-2 font-monospace"
                                             @elseif ($item->state=="Rejected")
                                             class= "badge bg-danger rounded px-2 font-monospace"
                                             @else
                                             class= "badge bg-primary rounded px-2 font-monospace"
                                             @endif
                                           
                                             
                                             >{{$item->state}}</span>
                                             <a href="{{route('delete.complaint',$item->id)}}" class="fa fa-times text-secondary  " aria-hidden="true" style="position:absolute; right:4px; top:-50px;cursor:pointer;" ></a>
                                            <div class="text-muted fs-2 ms-auto mt-2 mt-md-0">
                                                <div class="my-2">
                                                    <a href="{{route('admin.details',['id'=>$item->id])}}" type="button  " class="btn btn-info px-5">Detials</a></div>  
                                                {{$item->created_at}}
                                            
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                @endforeach

                            </div>

                            {{$complaints->appends(['page_a' => $last_transactions->currentPage()])->links("component.paginator")}}
                        </div>
                    </div>

                    <!-- /.col -->
                </div>
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
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->

@endsection


@section('foot')

<script>
function filter_transactions(){
document.querySelector("form#transactions_options").submit();


}

</script>
<script src="/assets/admin/load/js/script.js"></script>
@endsection




