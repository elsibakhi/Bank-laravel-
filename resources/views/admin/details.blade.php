
@extends('admin.layout.master')

@section('head')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<!-- Font-->
 <link rel="stylesheet" type="text/css" href="assets/admin/details/css/opensans-font.css">
<link rel="stylesheet" type="text/css" href="assets/admin/details/fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">
<!-- datepicker -->
<link rel="stylesheet" type="text/css" href="assets/admin/details/css/jquery-ui.min.css">
<!-- Main Style Css -->
<link rel="stylesheet" href="assets/admin/details/css/style.css"/>
<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
<link href="https://netdna.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" rel="stylesheet">
<script src="https://netdna.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>

	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

@endsection



@section('content')

<div class="page-wrapper ">
<div class="d-flex justify-content-center  ">
	
		<div class="wizard-v6-content m-5 p-3 ">
			<div class="wizard-form  ">
		        <form class="form-register" id="form-register" action="{{route('admin.replay',$comment->id)}}" method="post">
					@csrf
		        	<div id="form-total">
		        		<!-- SECTION 1 -->
			            
			           
						<div class="col-md-12">
							<div class="media g-mb-30 media-comment">
							<img class="d-flex g-width-50 g-height-50 rounded-circle g-mt-3 g-mr-15 bg-light" src="{{$comment->user->profile->photo}}" alt="Image Description">
							<div class="media-body u-shadow-v18 g-bg-secondary g-pa-30">
							<div class="g-mb-15">
							<h5 class="h5 g-color-gray-dark-v1 mb-0">{{$comment->user->name}}</h5>
							<span class="g-color-gray-dark-v4 g-font-size-12">{{$comment->created_at->diffForHumans()}}</span>
							</div>
							<p >{{$comment->massage}}.</p>
							<ul class="list-inline d-sm-flex my-0">
							<li class="list-inline-item g-mr-20">
								<input type="radio" class="btn-check" value="Pending" name="state" id="option1" 
								@if ($comment->state=="Pending")
									checked
								@endif
								>
								<label class="btn btn-primary " for="option1" >Pending 	</label>
						
						
							</li>
							<li class="list-inline-item g-mr-20">
								<input type="radio" class="btn-check" value="Approved" name="state" id="option2" 
								@if ($comment->state=="Approved")
								checked
							   @endif>
								<label class="btn btn-success mx-2" for="option2" >Approved <i class="fa fa-thumbs-up g-pos-rel g-top-1 g-mr-3"></i> </label>
							
							
							
							</li>
							<li class="list-inline-item g-mr-20">
								<input type="radio" class="btn-check" value="Rejected" name="state" id="option3" 
								@if ($comment->state=="Rejected")
								checked
							@endif> 
								<label class="btn btn-danger" for="option3" >Rejected <i class="fa fa-thumbs-down g-pos-rel g-top-1 g-mr-3"></i></label>
							
							
							
							</li>
							<li class="list-inline-item ml-auto">
							<a class="u-link-v5 g-color-gray-dark-v4 g-color-primary--hover" href="#replay">
							<i class="fa fa-reply g-pos-rel g-top-1 g-mr-3"></i>
							Reply
							</a>
							</li>
							</ul>
							</div>
							</div>
							</div>
						



							{{-- ---------------------------- --}}


 @foreach ($replays as $item)
 <div class=" ml-15  col-md-10">
	<div class="media g-mb-30 media-comment">
	<img class="d-flex g-width-50 g-height-50 rounded-circle g-mt-3 g-mr-15 bg-light" src="{{Auth::user()->profile->photo}}" alt="Image Description">
	<div class="media-body u-shadow-v18 g-bg-secondary g-pa-30">
	<div class="g-mb-15">
	<h5 class="h5 g-color-gray-dark-v1 mb-0">You</h5>
	<span class="g-color-gray-dark-v4 g-font-size-12">{{$item->created_at->diffForHumans()}}</span>
	</div>
	<p >{{$item->replay}}.</p>
	<ul class="list-inline d-sm-flex my-0">
		<li class="list-inline-item ml-auto">
			<a class="u-link-v5 g-color-danger-dark-v4 g-color-primary--hover" href="{{route("delete.replay",$item->id)}}">
			<i class="fa fa-trash g-pos-rel g-top-1 g-mr-3"></i>
			Delete
			</a>
			</li>
	</ul>
	</div>
	</div>
	</div>
 @endforeach












							{{-- -------------------------------------------------------/ --}}
			            <section class="p-2">
			                <div class="inner">
			                	<div class="form-heading">
			                	
			                	
			                	</div>
								<div class="form-row">
									<div class="form-holder">
										<label class="form-row-inner">
											<textarea  type="text" id="replay" name="replay" style="paddding:5px; margin:20px; background-color: rgba(255, 255, 255, 0.5);resize: none; color:rgb(63, 63, 63)  "  cols="80" rows="10"  >   </textarea>
											
										</label>
									</div>
							
								</div>


								<hr>
								<div class="d-flex justify-content-between">
								
									<button type="submit" class="btn btn-info d-block mx-auto my-3 px-5	">Send</button>

								</div>
						
							</div>
			            </section>

		        	</div>
		        </form>
			</div>

		</div>

		<!-- ============================================================== -->
		<!-- End footer -->
		<!-- ============================================================== -->
	</div>

	<footer class="footer text-center "> 2023 © Baraa Bank <a
		href="/">BaraaBank.com</a>
</footer>
	</div>

@endsection






@section('foot')
{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> --}}
<style type="text/css">
a{
	text-decoration: none !important; 
	font-size: 14px
}
	@media (min-width: 0) {
		.g-mr-15 {
			margin-right: 1.07143rem !important;
		}
	}
	@media (min-width: 0){
		.g-mt-3 {
			margin-top: 0.21429rem !important;
		}
	}
	
	.g-height-50 {
		height: 50px;
	}
	
	.g-width-50 {
		width: 50px !important;
	}
	
	@media (min-width: 0){
		.g-pa-30 {
			padding: 2.14286rem !important;
		}
	}
	
	.g-bg-secondary {
		background-color: #fafafa !important;
	}
	
	.u-shadow-v18 {
		box-shadow: 0 5px 10px -6px rgba(0, 0, 0, 0.15);
	}
	
	.g-color-gray-dark-v4 {
		color: #777 !important;
	}
	.g-color-danger-dark-v4 {
		color: #721c1c !important;
	}
	.g-font-size-12 {
		font-size: 0.85714rem !important;
	}
	
	.media-comment {
		margin-top:20px
	}

	.ml-15{
margin-left:15px 
	}
	
	</style>
	<script type="text/javascript">
	
	</script>
@endsection