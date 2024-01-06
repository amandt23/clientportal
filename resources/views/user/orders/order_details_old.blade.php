@extends('layouts.app')
@section('css')
<!-- Data Table CSS -->
<link href="{{URL::asset('plugins/datatable/datatables.min.css')}}" rel="stylesheet" />
<!-- Sweet Alert CSS -->
<link href="{{URL::asset('plugins/sweetalert/sweetalert2.min.css')}}" rel="stylesheet" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
   div.scroll {
   margin: 4px, 4px;
   padding: 4px;
   background-color: #4eb3c4;
   width: 490px;
   overflow-x: auto;
   overflow-y: hidden;
   white-space: nowrap;
   }
   .table>:not(caption)>*>* {
   padding: 0.5rem 0.5rem;
   background-color: var(--bs-table-bg);
   border-bottom-width: 1px;
   box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);
   color: white;
   font-weight: bold;
   }
   .card-body {
   flex: 1 1 auto;
   margin: 0;
   padding: 1rem 1.5rem;
   position: relative;

   }
   .btn-success {
   color: #fff;
   background-color: #3b3465 !important;
   border-color: #3b3465 !important;
   }
   label span input {
   z-index: 999;
   line-height: 0;
   font-size: 50px;
   position: absolute;
   top: -2px;
   left: -700px;
   opacity: 0;
   filter: alpha(opacity=0);
   -ms-filter: "alpha(opacity=0)";
   cursor: pointer;
   _cursor: hand;
   margin: 0;
   padding: 0;
   }
   .btnq {
   background-color: DodgerBlue;
   border: none;
   color: white;
   padding: 12px 30px;
   cursor: pointer;
   font-size: 11px;
   }
   /* Darker background on mouse-over */
   .btn:hover {
   background-color: RoyalBlue;
   }
.rate {
    float: left;
    height: 46px;
    padding: 0 10px;
}
.rate:not(:checked) > input {
    position:absolute;
    top:-9999px;
}
.rate:not(:checked) > label {
    float:right;
    width:1em;
    overflow:hidden;
    white-space:nowrap;
    cursor:pointer;
    font-size:30px;
    color:#ccc;
}
.rate:not(:checked) > label:before {
    content: '★ ';
}
.rate > input:checked ~ label {
    color: #ffc700;    
}
.rate:not(:checked) > label:hover,
.rate:not(:checked) > label:hover ~ label {
    color: #deb217;  
}
.rate > input:checked + label:hover,
.rate > input:checked + label:hover ~ label,
.rate > input:checked ~ label:hover,
.rate > input:checked ~ label:hover ~ label,
.rate > label:hover ~ input:checked ~ label {
    color: #c59b08;
}
   /* Modified from: https://github.com/mukulkant/Star-rating-using-pure-css */
    .input-box h6 {
    font-family: "Noto Sans", sans-serif;
    margin-bottom: 0.6rem;
    /* font-weight: 600; */
    font-size: 14px!important;
    font-weight: bold!important;
}
.input-box .form-control {
    font-family: "Noto Sans", sans-serif;
    font-size: 12px;
    color: #1e1e2d;
    -webkit-appearance: none;
    -moz-appearance: none;
    outline: none;
    appearance: none;
    background-color: #f2f2f2!important;
    border-color: transparent;
    border-radius: 0.5rem;
    border-width: 1px;
    font-weight: 400;
    line-height: 1rem;
    padding: 0.75rem 1rem;
    width: 100%;
}
.form-control:disabled, .form-control[readonly] {
    color: #000000!important;
    font-weight: 400!important;
}
textarea {
    display: block;
    margin-left: auto;
    margin-right: auto;
}
.text-light {
    color: #5c5e60 !important;
}
</style>
@endsection
@section('page-header')
<!-- PAGE HEADER -->

<!-- END PAGE HEADER --> 
@endsection
@section('content')
<div class="row " style="margin-top:4%!important">
<div class="col-lg-8 col-md-12 col-xm-12">
			<div class="card overflow-hidden border-0">
         <div class="page-header mt-5-7">
   <div class="page-leftheader" style="margin-left:4%!important;">
      <h4 class="page-title mb-0" style="margin-top:2%!important">{{ __('Order Details') }}</h4>
      <ol class="breadcrumb mb-2">
         <li class="breadcrumb-item"><a href="{{ route('user.dashboard') }}"><i class="fa-solid fa-id-badge mr-2 fs-12"></i>{{ __('Dashboard') }}</a></li>
         <li class="breadcrumb-item" aria-current="page"><a href="{{ route('user.my_orders') }}">{{ __('Orders') }}</a></li>
      </ol>
   </div>
</div>
				<div class="card-body">
							
					<form action="{{ route('admin.settings.global.store') }}" method="POST" enctype="multipart/form-data">
						@csrf

						<div class="card border-0 special-shadow">							
							<div class="card-body">

							<h4 style="text-align:center;font-weight:bold;" > Order  Detail </h4>
                            <hr>
								<div class="row" style="margin-top:2%!important">
									<div class="col-lg-6 col-md-6 col-sm-12">									
										<div class="input-box">								
											<h6 style="text-align:center">Order ID</h6>
											<div class="form-group">	
                                           						    
												<input type="text" style="text-align:center"  class="form-control @error('site-name') is-danger @enderror" id="btitle" name="site-name" value="{{$order->number}}" autocomplete="off" readonly>
												@error('site-name')
													<p class="text-danger">{{ $errors->first('site-name') }}</p>
												@enderror
											</div> 
										</div> 
									</div>	
									
									     <div class="col-lg-6 col-md-6 col-sm-12">
                              <div class="input-box">
                                 <h6 style="text-align:center;color:black!important;">Order Price</h6>
                                 <div class="form-group text-center">
                                    <div class="form-dataa" style="background-color: #ebebeb!important;align-items: center;height: 41px;border-radius: 5px;">					    
                                       <span class="" style="
                                          color: black!important;  text-align:center;font-size: 16px;" >
                                       <i class="mt-2 fa {{format_amount(1)['icon']}}" style="
                                          color: black!important;

    margin-right: 2%;
" ></i>
                                       <span style="color: black!important;font-size: 15px; ">
										   <?php $p = Illuminate\Support\Facades\DB::table('payments')
												->where('order_id', $order->id)->first(); ?>	
												@if($p && $order->payment_status == 1)
										   {{$p->price}}
										   @else
										   {{$order->total}}
										   @endif
									   </span>
                                       </span>
                                    </div>
                                 </div>
                              </div>
                           </div>
									<!--
                           <div class="col-lg-6 col-md-6 col-sm-12">									
										<div class="input-box">								
											<h6 style="text-align:center">Order Price</h6>
											<div class="form-group">	
					    					<?php $p = Illuminate\Support\Facades\DB::table('payments')
												->where('order_id', $order->id)->first(); ?>	
												@if($p && $order->payment_status == 1)
												<input type="text" style="text-align:center" class="form-control @error('site-name') is-danger @enderror" id="btotal" name="site-name" value="${{$p->price}}" autocomplete="off" readonly>
												@else
												<input type="text" style="text-align:center" class="form-control @error('site-name') is-danger @enderror" id="btotal" name="site-name" value="${{$order->total}}" autocomplete="off" readonly>
												@endif
												@error('site-name')
													<p class="text-danger">{{ $errors->first('site-name') }}</p>
												@enderror
											</div> 
										</div> 
									</div>
								
	-->

								</div>
                               
								
								
								
							
								
                                <div class="row">
									<div class="col-lg-4 col-md-4 col-sm-12">									
										<div class="input-box">								
											<h6 style="text-align:center">Title</h6>
											<div class="form-group">							    
												<input type="text" style="text-align:center" class="form-control @error('site-website') is-danger @enderror" id="btitle" name="site-website" value="{{$order->title}}" autocomplete="off"readonly>
												@error('site-website')
													<p class="text-danger">{{ $errors->first('site-website') }}</p>
												@enderror
											</div> 
										</div> 
									</div>
									<div class="col-lg-4 col-md-4 col-sm-12">									
										<div class="input-box">								
											<h6 style="text-align:center">Service Type</h6>
											<div class="form-group">	
                                            <?php $s = Illuminate\Support\Facades\DB::table('services')->where('id', $order->service_id)->first(); ?>							    
												<input type="text" style="text-align:center" class="form-control @error('site-name') is-danger @enderror" name="site-name" value="{{$s->name}}" autocomplete="off" readonly>
												@error('site-name')
													<p class="text-danger">{{ $errors->first('site-name') }}</p>
												@enderror
											</div> 
										</div> 
									</div>	
									
									<div class="col-lg-4 col-md-4 col-sm-12">									
										<div class="input-box">								
											<h6 style="text-align:center">Pages</h6>
											<div class="form-group">
                                            <?php $s = Illuminate\Support\Facades\DB::table('services')->where('id', $order->service_id)->first(); ?>							    
												<input type="text" style="text-align:center" class="form-control @error('site-name') is-danger @enderror" id="bqty" name="site-name" value="{{$order->quantity}}" autocomplete="off" readonly>
												@error('site-name')
													<p class="text-danger">{{ $errors->first('site-name') }}</p>
												@enderror
											</div> 
										</div> 
									</div>	


								</div>
                               
                                <div class="row">
									<div class="col-lg-4 col-md-4 col-sm-12">									
										<div class="input-box">								
											<h6 style="text-align:center">Sources</h6>
											<div class="form-group">							    
												<input type="text" style="text-align:center" class="form-control @error('site-name') is-danger @enderror" id="bsources" name="site-name" value="{{$order->sources}}" autocomplete="off" readonly>
												@error('site-name')
													<p class="text-danger">{{ $errors->first('site-name') }}</p>
												@enderror
											</div> 
										</div> 
									</div>	
									
									
                           <div class="col-lg-4 col-md-4 col-sm-12">									
										<div class="input-box">								
											<h6 style="text-align:center">Course</h6>
											<div class="form-group">							    
												<input type="text" style="text-align:center" class="form-control @error('site-name') is-danger @enderror" id="bcourse" name="site-name" value="{{$order->course}}" autocomplete="off" readonly>
												@error('site-name')
													<p class="text-danger">{{ $errors->first('site-name') }}</p>
												@enderror
											</div> 
										</div> 
									</div>
								<div class="col-lg-4 col-md-4 col-sm-12">									
										<div class="input-box">								
											<h6 style="text-align:center">Citation</h6>
											<div class="form-group">							    
												<input type="text" style="text-align:center" class="form-control @error('site-website') is-danger @enderror" id="bformatting" name="site-website" value="{{$order->formatting}}" autocomplete="off" readonly>
												@error('site-website')
													<p class="text-danger">{{ $errors->first('site-website') }}</p>
												@enderror
											</div> 
										</div> 
									</div>


								</div>
								 <div class="row">
									<div class="col-lg-6 col-md-6 col-sm-12">									
										<div class="input-box">								
											<h6 style="text-align:center">Educational Level</h6>
											<div class="form-group">	
                                            <?php $wl = Illuminate\Support\Facades\DB::table('work_levels')->where('id', $order->work_level_id)->first(); ?>						    
												<input type="text" style="text-align:center" class="form-control @error('site-website') is-danger @enderror" id="site-website" name="site-website" value="{{$wl->name}}" autocomplete="off" readonly>
												@error('site-website')
													<p class="text-danger">{{ $errors->first('site-website') }}</p>
												@enderror
											</div> 
										</div> 
									</div>
                           <div class="col-lg-6 col-md-6 col-sm-12">									
										<div class="input-box">								
											<h6 style="text-align:center">Writer’s Level</h6>
											<div class="form-group">							    
												<input type="text" style="text-align:center" class="form-control @error('site-name') is-danger @enderror" id="bplan_type" name="site-name" value="{{$order->package}}" autocomplete="off" readonly readonly>
												@error('site-name')
													<p class="text-danger">{{ $errors->first('site-name') }}</p>
												@enderror
											</div> 
										</div> 
									</div>
								

								</div>
                                <h4 style="text-align:center;font-weight:bold;" > Deadlines/TimeZone </h4>
                                <hr>
                                <div class="row">
									
									
									<div class="col-lg-4 col-md-4 col-sm-12">									
										<div class="input-box">								
											<h6 style="text-align:center">Posted On</h6>
											<div class="form-group">							    
												<input type="text" style="text-align:center" class="form-control @error('site-website') is-danger @enderror" id="bposted" name="site-website" value="{{date('Y-m-d',strtotime($order->created_at))}}" autocomplete="off" readonly>
												@error('site-website')
													<p class="text-danger">{{ $errors->first('site-website') }}</p>
												@enderror
											</div> 
										</div> 
									</div>
                           <div class="col-lg-4 col-md-4 col-sm-12">									
										<div class="input-box">								
											<h6 style="text-align:center;font-weight:bold;">Deadline Date & Time</h6>
											<div class="form-group">							    
												<input type="text" style="text-align:center" class="form-control @error('site-name') is-danger @enderror" id="bdeadline_date"name="site-name" value=" {{$order->dead_line}} {{$order->deadline_time}}" autocomplete="off" readonly>
												@error('site-name')
													<p class="text-danger">{{ $errors->first('site-name') }}</p>
												@enderror
											</div> 
										</div> 
									</div>
								<div class="col-lg-4 col-md-4 col-sm-12">									
										<div class="input-box">								
											<h6 style="text-align:center">Timezone</h6>
											<div class="form-group">							    
												<input type="text" style="text-align:center" class="form-control @error('site-website') is-danger @enderror" id="bposted" name="site-website" value="{{$order->timezone}}" autocomplete="off" readonly>
												@error('site-website')
													<p class="text-danger">{{ $errors->first('site-website') }}</p>
												@enderror
											</div> 
										</div> 
									</div>


								</div>
                                <h4 style="text-align:center;font-weight:bold;" > Files </h4>
                                <hr>
                                <div class="row">
									<div class="col-lg-12 col-md-12 col-sm-12">									
										<div class="input-box">								
											
											<div class="form-group" style="text-align:center;">
                                            <span><?php $files = Illuminate\Support\Facades\DB::table('attachments')->where('order_id', $order->id)
                              ->where('uploader_id', $order->customer_id)->get(); ?>
                              @foreach($files as $file)
                              <a class="flloat-rightt text-light" href="{{route('download_file', $file->id)}}" style=" color: #5d5a5a!important;" class="text-primary"><i class="fa fa-download"></i> {{$file->file}}</a> <br>
                              @endforeach
							  </span>
											</div> 
										</div> 
									</div>	
								 
									</div>
								


								</div>
                               
                                <div class="row">
									<div class="col-lg-12 col-md-12 col-sm-12">
    <div class="input-box" style="text-align:center;">
        <h4 style="font-weight: bold;">Instructions</h4>
        <div class="form-group">
            <textarea id="binstruction" name="w3review" rows="4" cols="50" readonly style="background-color: #f2f2f2;width:100%;">{{$order->instruction}}
            </textarea>
            @error('site-name')
            <p class="text-danger">{{ $errors->first('site-name') }}</p>
            @enderror
        </div>
    </div>
</div>					
									
                          
								


								</div>
                        
							</div>
						</div>

										

					</form>
					
				</div>
			</div>
	
   <?php $check = Illuminate\Support\Facades\DB::table('revisions')->where('order_id', $order->id)
      ->where('user_id', $order->customer_id)->count();  ?>
   <div class="col-lg-4 col-md-4 col-sm-4">
      <div id="mark">
         <?php
            use \Carbon\Carbon;
            
            $add_14 = Carbon::parse($order->updated_at)->addDays(14);
            ?>
         @if($order->order_check == 1 && $order->order_status_id == 5 && $order->rating != null && now() < $add_14) 
         <div  class="text-white p-2" style="background:#4eb3c4;border-radius: 9px;/* margin-top:2%; */">
            <p style="margin-left:4%;">You can mark Revision Requested for 14 days</p>
            <button type="button" id="flip" class="btn btn-success" style="margin-bottom: 13px;margin-left: 21%;" onclick="RevisionFunction()">Mark Revision</button>
         </div>
         @endif
         @if($order->order_status_id == 5 && $order->order_check == 2)
         <div class="order p-2" style="background:#4eb3c4;border-radius: 9px;color: white;/* font-weight: bold; */margin-">
            <h2 style="
               font-weight: bold;
               font-size: 19px;
               margin-left: 2%;
               "> Congratulations!</h2>
            @if($check > 0)
            <p style="margin-left:4%"> Your (Revision Requested) has been Completed.</p>
            @else
            <p style="margin-left:4%"> Your Order has been Completed.</p>
            @endif
            <button type="button" id="aceptbtn" class="btn btn-success" style="
               margin-left: 28%;
               /* padding-bottom: 4px; */
               margin-bottom: 13px;
               " onclick="dataFunction()">Accept Order</button>
         </div>
         @elseif($order->order_status_id == 4)
         <p class="text-white p-2" style="background:#4eb3c4; border-radius: 9px;margin-top:3%!important">Revision is in Progress</p>
         @elseif($order->rating == null)
         <p class="text-white p-2" style="background:#4eb3c4;border-radius: 9px;margin-top:3%!important">Your Order is in Progress</p>
         @endif
      </div>
      <div class="order" id="section" style="background-color:#4eb3c4!important;border-radius: 9px;color: white;/* font-weight: bold; */margin-top:2%!important;display:none;">
         <div id="revision" style="display: none;background-color: rgb(78, 179, 196) !important;width: 80%;margin-left: 10%;">
            <h4 class="page-title mb-0" style="color:white!important">{{ __('Request For Revision') }}</h4>
            <form action="{{route('user.revision')}}" method="post" enctype="multipart/form-data">
               @csrf
               <input type="hidden" name="o_id" value="{{$order->id}}">
               <input type="hidden" name="dt" class="dt">
               <div class="form-group">
                  <label for="" style="color:white!important">Message</label>
                  <textarea name="message" class="form-control" placeholder="Your Message" style="color:black!important"></textarea>
               </div>
               <div class="form-group">
                  <label for="" style="color:white!important">File</label>
                  <input type="file" name="name[]" class="form-control" multiple style="color:black!important">
               </div>
               <div class="form-group">
                  <label for="" style="color:white!important">Deadline Date</label>
                  <input type="date" name="date" class="form-control" style="color:black!important">
               </div>
               <div class="form-group">
                  <label for="" color="white!important" style="color:white!important">Deadline Time</label>
                  <input type="time" name="time" class="form-control" style="color:black!important">
               </div>
               <div class="form-group">
                  <button type="submit" class="btn btn-primary my-3" style="color:white!important">Submit</button>
               </div>
            </form>
         </div>
         <div id="files">
            <h5 class="pt-2 pl-2">Writer's Message:</h5>
            <?php $wf = Illuminate\Support\Facades\DB::table('submitted_works')
               ->where('order_id', $order->id)->orderBy('id', 'DESC')->first(); ?>
            @if(!empty($wf))
            <p class="pt-2 pl-2">{{$wf->message}}</p>
            <p style="font-weight: bold; margin-left: 2%;">
               <?php $files = Illuminate\Support\Facades\DB::table('attachments')
                  ->where('uploader_id', $wf->user_id)->where('order_id', $order->id)->where('submit_id', $wf->id)->orderBy('id', 'DESC')->get();  ?>
               @foreach($files as $file)
            <div class="p-2">
               <a class="text-light" href="{{route('download_file', $file->id)}}" > {{$file->file}}
               <i class="fa fa-download bg-dark p-1 rounded mr-2" style=""></i>
               </a> <br>
            </div>
            @endforeach
            @endif
            </p>
         </div>
         <br>
         <form action="{{route('user.rate_order', $order->id)}}" method="post">
            @csrf
            <input type="hidden" name="dt" class="dt">
			 
			   
               
               
               
   
               
			
         
         <div class="rateus" style="
            margin-top: 5%;
            /* margin-left: 33px; */
            ">
            <div class="row">
               <div id="rateus" col-md-12 col-sm-12 col-lg-12>
                  <button type="button" id="flip" class="btn btn-success" style="margin-bottom: 13px;margin-left: 5%;" onclick="rateusFunction()">Rate Us</button>
                  <button type="button" id="markbtn" class="btn btn-success" style="margin-bottom: 13px;float: right;margin-right: 4%;" onclick="RevisionFunction()">Mark Revision</button>
               </div>
            </div>
         </div>
    
            <div class="rate" id="rateusss" style="display:none;margin-left:6%!important">
    <input type="radio" id="star5" name="rate" value="5" />
    <label for="star5" title="text">5 stars</label>
    <input type="radio" id="star4" name="rate" value="4" />
    <label for="star4" title="text">4 stars</label>
    <input type="radio" id="star3" name="rate" value="3" />
    <label for="star3" title="text">3 stars</label>
    <input type="radio" id="star2" name="rate" value="2" />
    <label for="star2" title="text">2 stars</label>
    <input type="radio" id="star1" name="rate" value="1" />
    <label for="star1" title="text">1 star</label>
				<button type="submit" id="flip" class="btn btn-success" style="/* margin-bottom: 14px; */margin-left: 44%;" onclick="rateusFunction()">Submit</button>
          
  </div>
			 
			 </form>
      </div>
      @if($order->payment_status == 1)
      <a href="{{route('user.conversations', $order->id)}}" class="btn btn-primary" style="
         margin-top: 9%;
         margin-left: 24%!important;
         ">Discuss any concerns</a>
      @endif
   </div>
</div>

<div id="publishable_key" data-publishablekey="{{ env('STRIPE_KEY') }}"></div>
<div id="process_url" data-processurl="{{ route('stripe_process') }}"></div>
@endsection
@section('js')
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="https://js.stripe.com/v3/"></script>
<script>
   const now = new Date();
   const year = now.getFullYear();
   const month = String(now.getMonth() + 1).padStart(2, '0');
   const day = String(now.getDate()).padStart(2, '0');
   const hours = String(now.getHours()).padStart(2, '0');
   const minutes = String(now.getMinutes()).padStart(2, '0');
   const seconds = String(now.getSeconds()).padStart(2, '0');
   
   const formattedDateTime = `${year}-${month}-${day} ${hours}:${minutes}:${seconds}`;
   $('.dt').val(formattedDateTime);
   
   
   function dataFunction() {
   
       document.getElementById("section").style.display = "block";
       document.getElementById("aceptbtn").style.display = "none";
	    
   }
   
   function rateusFunction() {
       document.getElementById("files").style.display = "none";
       document.getElementById("rateusss").style.display = "block";
       document.getElementById("mark").style.display = "none";
       document.getElementById("rateus").style.display = "none";
	     document.getElementById("section").style.height = "151px";
	  
   }
   
   function RevisionFunction() {
       document.getElementById("section").style.display = "block";
       document.getElementById("files").style.display = "none";
 document.getElementById("flip").style.display = "none";
       document.getElementById("rateusss").style.display = "none";
       document.getElementById("markbtn").style.display = "none";
   
   
       document.getElementById("revision").style.display = "block";
   }
   
   
   $(document).ready(function() {
       $("#flip").click(function() {
           $("#panel").slideDown("slow");
       });
   });
   var o = 0;
   
   $('document').ready(function() {
       $('#accept').click(function() {
           $('#downloadFile').show()
           $('#selectOption').show()
           $('#accept').hide()
       })
   
       $('#select').change(function() {
           var option = $('#select').val();
           if (option == 'mark a revision') {
               $('#acceptForm').hide()
               $('#revision').show()
           } else if (option == 'rate order') {
               $('#acceptForm').hide()
               $('#rateOrder').show()
           }
   
       })
   });
   document.addEventListener("DOMContentLoaded", function(event) {
   
       var publishableKey = document.getElementById('publishable_key').dataset.publishablekey;
       var process_url = document.getElementById('process_url').dataset.processurl;
   
       document.getElementById('loading').style.display = "none";
   
       var stripe = Stripe(publishableKey);
   
       var elements = stripe.elements();
   
       // Set up Stripe.js and Elements to use in checkout form
       var style = {
           base: {
               color: "#32325d",
               fontFamily: '"Nunito", Helvetica, sans-serif',
               fontSmoothing: "antialiased",
               fontSize: "16px",
               "::placeholder": {
                   color: "#aab7c4"
               }
           },
           invalid: {
               color: "#fa755a",
               iconColor: "#fa755a"
           },
       };
   
       var cardElement = elements.create('card', {
           hidePostalCode: true,
           style: style
       });
       cardElement.mount('#card-element');
   
       disableConfirmButton();
   
       displayError = document.getElementById('card-errors');
   
       // Handle real-time validation errors from the card Element.
       cardElement.on('change', function(event) {
   
           if (event.complete) {
               // enable payment button
               enableConfirmButton();
           } else if (event.error) {
               // show validation to customer
               displayError.textContent = event.error.message;
               disableConfirmButton();
           } else {
               displayError.textContent = '';
               enableConfirmButton();
           }
   
       });
   
       // Step: 1 Handle the Button Click
       var form = document.getElementById('payment-form');
       form.addEventListener('submit', function(event) {
           event.preventDefault();
           // Disable the confirm button    
           disableConfirmButton();
   
           stripe.createPaymentMethod({
               type: 'card',
               card: cardElement,
           }).then(stripePaymentMethodHandler);
       });
   
       // Step: 1 attempt to send paymentMethod.id to server
       function stripePaymentMethodHandler(result) {
   
           if (result.error) {
               if (result.error.hasOwnProperty('message')) {
                   showError(result.error.message);
               } else {
                   showError(result.error);
               }
   
               enableConfirmButton();
           } else {
               // Otherwise send paymentMethod.id to your server
               $("#loading").show();
               axios.post(process_url, {
                       payment_method_id: result.paymentMethod.id,
                   })
                   .then(function(response) {
                       $("#loading").hide();
                       handleServerResponse(response.data);
                   })
                   .catch(function(error) {
                       $("#loading").hide();
                       enableConfirmButton();
                   });
   
   
           }
       }
   
   
       function handleServerResponse(response) {
           if (response.error) {
               console.log(response.error);
               // Show error from server on payment form
               showError(response.error);
               enableConfirmButton();
   
           } else if (response.requires_action) {
               // Use Stripe.js to handle required card action
               disableConfirmButton();
               stripe.handleCardAction(
                   response.payment_intent_client_secret
               ).then(handleStripeJsResult);
           } else {
               // Show success message
               if (response.success) {
                   console.log(response)
                   //alert(1000);
                   window.location.href = response.redirect_url;
               }
           }
       }
   
       function handleStripeJsResult(result) {
           if (result.error) {
               // Show error in payment form
               showError(result.error.message);
               enableConfirmButton();
           } else {
               // The card action has been handled
               // The PaymentIntent can be confirmed again on the server
               disableConfirmButton();
               axios.post(process_url, {
                       payment_intent_id: result.paymentIntent.id
                   })
                   .then(function(response) {
                       handleServerResponse(response.data);
                   })
                   .catch(function(error) {
                       showError('Could not process your payment. Please try again.');
                       enableConfirmButton();
                   });
   
   
   
           }
       }
   
       function disableConfirmButton() {
           document.getElementsByClassName('confirm-button')[0].disabled = true;
       }
   
       function enableConfirmButton() {
           document.getElementsByClassName('confirm-button')[0].disabled = false;
       }
   
       function showError(message) {
           const swalWithBootstrapButtons = Swal.mixin({
               customClass: {
                   confirmButton: 'btn btn-success',
                   cancelButton: 'btn btn-danger'
               },
               buttonsStyling: false
           });
   
           swalWithBootstrapButtons.fire({
               text: message
           });
       }
   
   
   }); // End of script
</script>
<script src="https://www.paypal.com/sdk/js?client-id={{ env('PAYPAL_CLIENT_ID') }}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script>
   paypal.Buttons({
       createOrder: function(data, actions) {
           $('#paypalmsg').html('<b>' + 'WAITING ON AUTHORIZATION TO RETURN...' + '</b>');
           $('#chkoutmsg').hide()
           return actions.order.create({
               purchase_units: [{
                   description: 'GnG Order',
                   amount: {
                       value: "{{$order->total}}"
                   },
   
               }],
               application_context: {
                   shipping_preference: 'NO_SHIPPING',
   
               }
   
           });
       },
       onApprove: function(data, actions) {
           // Replace 'YOUR_SERVER_ENDPOINT' with the Laravel route that executes the payment
           return fetch("{{route('paypal_process')}}", {
                   method: 'POST',
                   headers: {
                       'Content-Type': 'application/json',
                       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
   
                   },
                   body: JSON.stringify({
                       orderID: data.orderID
                   }),
               })
               .then(function(response) {
                   return response.json();
               })
               .then(function(data) {
                   window.location.href = data.redirect_url;
               });
       }
   
   }).render('#paypal-button-container');
</script>
<script>
   $('#apply-promo').click(function() {
       var promo_code = $('#promo_code').val();
       $.ajax({
           type: 'POST',
           url: "{{ route('user.apply_promo') }}",
           data: {
               "_token": "{{ csrf_token() }}",
               "promo_code": promo_code,
               "id": "{{$order->id}}"
           },
           success: function(data) {
               if (data.error != null) {
                   $('#promocode-error').removeClass('d-none');
                   $('#promocode-error').text(data.error)
               } else {
                   $('#voucher-result').removeClass('d-none');
                   $('#total_discount').text(data.discount)
                   $('#gtotal').text('$' + data.total)
               }
   
           }
       });
   
   });
</script>
@endsection