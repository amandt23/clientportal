@extends('layouts.app')
@section('css')
<!-- Sweet Alert CSS -->
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<link href="{{URL::asset('plugins/sweetalert/sweetalert2.min.css')}}" rel="stylesheet" />
<style>
   .progressOrderContainer {
        flex:1;
        height: 100vh;
        overflow-y:scroll;
        padding:10px;
    }
	

/* .progressOrderContainer{
    margin-bottom: 50px;
} */
.prgressorder {
    margin-top: 40px;
    padding-bottom: 10px;
}

.progresOrderCOntents {
    margin-top: 8px;
    display: flex;
    width: 100%;
    max-width:1200px;
    gap: 30px;
    flex-wrap:wrap;
    justify-content:center;
    margin-bottom: 20px;
	height: auto;
}

.progresOrderCOntents .orderCompCard{
    flex-grow:1;
    padding:25px;
}


.orderProgressCard {
    border-radius: 8px;
    background: #FFF;
    padding: 10px 20px;
    display: flex;
    flex-direction: column;
    row-gap: 30px;
    max-width: 350px;
    min-width:280px;
	margin-top: 10px;
}

.orderProgressCard a{
    text-align:center;
}

.orderProgressCard button {
    border-radius: 8px;
    background: #52A81B;
    box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
    padding: 10px 10px;
    color: white;
    border: none;
    font-size: 16px;
}

.orderMessage {
    border-radius: 4px;
 
    padding: 8px;
    text-align: center;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    row-gap: 5px;
	font-weight: 600;

}

.orderMessage h2 {
    font-size: 16px;
}

.orderMessage .progressBtn {
    border-radius: 8px;
    background: #52A81B;
    box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
    padding: 6px 7px;
    color: white;
    border: none;
    font-size: 14px;
    max-width: 120px;
	margin-top: 8px;
}

.writerBox {
    border-radius: 4px;
    border: 1px solid #BFBFBF;
    /* padding: 9px; */
    width: 231px;
    /* display: flex;
    flex-direction: column; */
}

.oneWriterBox {
    padding: 9px;
}

#myTextarea{
    border-radius: 3px;
    border: 1px solid #000;
    background: #FFF;
    padding: 5px 7px;
    width: 100%;
    resize: none;
}

.writerBox input {
    border-radius: 3px;
    border: 1px solid #000;
    background: #FFF;
    padding: 5px 7px;
    width: 100%;
}

.writerBox hr {
    width: 231px;
    height: 1px;
}

.downloadFile p {
    color: hsl(0, 0%, 32%);
    font-size: 12px;
    font-style: normal;
    /* font-weight: 600; */
    line-height: normal;
}

.downlBox {
    display: flex;
    column-gap: 10px;
    justify-content: center;
}

.downlBox:hover {
    cursor: pointer;
}

.oneWriterBox p {
    color: hsl(0, 0%, 32%);
    font-size: 13px;
    font-style: normal;
    /* font-weight: 600; */
    line-height: normal;
    border: 1px solid gray;
    border-radius: 5px;
    padding: 3px 8px;
	width: 208px;
}

.rateBTN {
    margin-top: 20px;
}

/*.rateStarsProgress {
    display: flex;
    column-gap: 5px;
}

.rateStarsProgress i {
    color: #a1a1a1;
}

.rateStarsProgress i.selected {
    color: #4CAF50;
	background-color: transparent !important;
    /* Green 
}/*


	

 /* Styles for the modal */
	.modal {
		display: none;
		position: fixed;
		top: 0;
		left: 0;
		width: 100%;
		height: 100%;
		background-color: rgba(0, 0, 0, 0.5);
		justify-content: center;
		align-items: center;
        z-index: 9999;
        padding:10px;
	}

	.modal-content {
        width: 50%;
        margin: 0 auto;
        max-width:450px;
        min-width:300px;
        /* border:1px solid #939393; */
	}

    .modal_wrapper{
        width: 100%;
    }

    .navbar_top_wrapper{
        display: flex;
        justify-content: space-between;
    }

    .navbar_top_wrapper.modal_top{
        padding:10px;
        background-color:#E0FFE9;
        border-radius:10px 10px 0 0 ;
    }

    .modalChatBox{
        min-height: 200px;
        border-radius:0px !important;
        max-height:300px;
        overflow-y:scroll;
        padding:10px;
        margin-bottom:0 !important;
        border:1px solid #939393;
        border-bottom:0 !important;
    }

    .modalChatBox::-webkit-scrollbar{
        width: 10px;
        background-color:#C5C5C5;
        padding:0;
    }

    .modalChatBox::-webkit-scrollbar-thumb{
        background:#595A5A;
        width: 100%;
    }

    modalChatBox:hover::-webkit-scrollbar-thumb{
        background:#595A5A !important;
        border-radius:0px !important;
    }

    .support_message.admin{
        margin-bottom: 10px;
    }

    .form_box{
        width: 100%;
        border:1px solid #939393;
        background-color:#F9FFFB;
        border-radius:0 0 6px 6px;
    }

    .form_box form{
        display: flex;
        justify-content:center;
        align-items: center;
        width: 100%;
    }
    .form_box #left_box,
    .form_box #right_box{
        display: flex;
        align-items: center;
        padding:5px;
    }

    .form_box #right_box button{
        font-family:'Times New Roman';
        padding:4px 15px;
        background:#52A81B;
        color:#fff;
        font-size:18px;
        font-weight:600;
        border:0;
        outline:none;
        border-radius:4px;
    }

    #left_box{
        justify-content: space-between;
        flex-grow:1;
        border-right:1px solid #939393;
    }

    #left_box input[type="text"]{
        flex-grow:1;
        display: block;
        width: 100%;
        height: 100%;
        padding:5px 10px;
        border:0;
        outline:0;
        background:transparent;
    }

    #left_box input[type="file"]{
        display: none;
    }

    #left_box label{
        cursor: pointer;
    }

    @media only screen and (max-width:576px) {
        .navbar_top_wrapper #first_div{
            display: none;
        }
    }

	/* Styles for the close button */
	.close {
		position: absolute;
		top: 10px;
		right: 10px;
		cursor: pointer;
	}
	
	.reqRevContent {
		display: flex;
		flex-direction: column;
		align-items: flex-start;
		row-gap: 5px;
	}

	.reqRevContent label {
		font-weight: bold;
		margin-top: 5px;
	}

	.reqRevContent input {
		border-radius: 4px;
		border: 1px solid #EFEFEF;
		background: #FFF;
		padding: 9px 10px;
		width: 218px;
	}
	
.rateStarsProgress input {
        display: none;
    }

    .rateStarsProgress label {
        display: inline-block;
        cursor: pointer;
    }

    .rateStarsProgress i {
        font-size: 20px; /* Adjust the font size as needed */
        color: #ffd700; /* Adjust the color of the stars */
    }

    .rateStarsProgress .rselected i {
        color: #52A81B; /* Adjust the color of the selected stars */
		background-color: transparent !important;
    }


    


    .navTop button{
        display: inline-block;
        font-size:25px;
        border:0;
        outline:none;
    }

	

    @media only screen and (min-width:1024px) {
        .progresOrderCOntents{
            flex-wrap:nowrap;
            column-gap:40px
        }
    }
    @media only screen and (min-width:991px) {
        .navTop button{
            display: none;
        }
    }
	

	
	
</style>
@endsection

@section('content')
<div class="progressOrderContainer">
        <div class="navbar_top_wrapper">
            <h1>Order Details</h1>
            <button id="nav_toggle">
                <i class="fa-solid fa-bars"></i>
            </button>
        </div>
            <div class="progresOrderCOntents">

                <div class="orderCompCard">
					
					@if(($order->order_status_id == 4)||($order->order_status_id == 5 && $order->order_check == 3))
					
					
					<?php
					
							$revcount = Illuminate\Support\Facades\DB::table('revisions')->where('order_id', $order->id)->count();
							
							$revision = Illuminate\Support\Facades\DB::table('revisions')->where('order_id', $order->id)->orderBy('id', 'desc')->get();
					
							
							?>
							@foreach($revision as $item)
					<?php $count = Illuminate\Support\Facades\DB::table('attachments')->where('r_no', $item->id)->count(); ?>
					<h1 style="">Revision <?php echo $revcount; $revcount--;?></h1>
                	<hr>
                <div class="orderCompCardDetail" >

                    <div class="orderOne">
                        <ul>
                            <li>Deadline</li>
                            <li>File</li>
                            <li>Your Message</li>
                        </ul>
                    </div>
                    <div class="orderOne">
                        <ul>

							
							<li>{{ $item->deadline_date }} {{ $item->deadline_time }}</li>

							<li><?php echo $count; ?></li>
							<li style="margin:5px 0px;">
								<p>{{ $item->message }}</p>
							</li>
							

                        </ul>
                    </div>
                </div>
					
					@endforeach
					
					@endif
					
                <h1>Order Details</h1>
                <hr>
                <div class="orderCompCardDetail">
                    <div class="orderOne">
                        <ul>
                            <li>Email</li>
                            <li>Order ID</li>
                            <li>Date</li>
                            <li>Title</li>
                            <li>Education Level</li>
                            <li>Document Type</li>
                            <li>No Of Pages</li>
                            <li>Course</li>
                            <li>Source</li>
                            <li>Citation</li>
                        </ul>
                    </div>
                    <div class="orderOne">
                        <ul>
						
							
                            <li>Wick@gmail.com</li>
                            <li>{{$order->number}}</li>
                            <li>{{date('Y-m-d',strtotime($order->created_at))}}</li>
                            <li>{{$order->title}}</li>
							 <?php $wl = Illuminate\Support\Facades\DB::table('work_levels')->where('id', $order->work_level_id)->first(); ?>
                            <li>{{$wl->name}}</li>
							 <?php $s = Illuminate\Support\Facades\DB::table('services')->where('id', $order->service_id)->first(); ?>	
                            <li>{{$s->name}}</li>
							<?php $s = Illuminate\Support\Facades\DB::table('services')->where('id', $order->service_id)->first(); ?>
                            <li>{{$order->quantity}}</li>
                            <li>{{$order->course}}</li>
                            <li>{{$order->sources}}</li>
                            <li>{{$order->formatting}}</li>

                        </ul>
                    </div>
                </div>
				<h1>Deadline</h1>
                <hr>
                
                <div class="orderMid">
                    <ul>
                        <li>Date & Time</li>
                        <li>Timezone</li>
                    </ul>
                    <ul>
                        <li>{{$order->dead_line}} {{$order->deadline_time}}</li>
                        <li>{{$order->timezone}}</li>
                    </ul>
                </div>
      
                <div class="fileStatus">
                    <h1>Files</h1>
                    <div class="file">
						<?php $files = Illuminate\Support\Facades\DB::table('attachments')->where('order_id', $order->id)
                              ->where('uploader_id', $order->customer_id)->get(); ?>
						
						<table class="reviewOrderTable">
							@php $fileCount = 0 @endphp
							<tr>
								@foreach($files as $file)
									<td class="fileDetail">
										<a href="{{$file->file_path}}" style="color: #5d5a5a!important;" download class="text-primary">
											<i class="fa fa-download"></i>
											<?php 
											$filename = substr($file->file, 0, 5);
											echo $filename;
											?>
											
										</a>
									</td>

									@php
										$fileCount++;
										if ($fileCount % 3 == 0) {
											echo '</tr><tr>';
										}
									@endphp
								@endforeach
							</tr>
						</table>

                    </div>
                </div>
	
						

                <div class="orderInstruction">
                    <h1>INSTRUCTIONS</h1>
                    <textarea name="text" id="" cols="30" rows="2" readonly>{{$order->instruction}}</textarea>
                </div>

                
            </div>

                <div  class="progressORderRight">

                    <div style=" top: 91px; height: auto;" class="orderProgressCard">
						
						@if($order->order_status_id == 1 || $order->order_status_id == 3 || $order->order_status_id == 2 || $order->order_status_id == 6 || $order->order_status_id == 7)
                        <a href="#"><button onclick="openModal()">Discuss Any Concerns</button></a>

                        <div id="orderproSect" class="changingContent" style="margin-bottom: 10px;">
                            <div class="orderMessage" style="background-color:#D2D2D2;">
                                <p>Your Order is in Progress</p>
                            </div>
                        </div>
						
						@endif
						
						@if($order->order_status_id == 4)
						
						 <a href="#"><button onclick="openModal()">Discuss Any Concerns</button></a>
						
						<div id="orderproSect" class="changingContent" style="margin-bottom: 10px;">
                            <div class="orderMessage" style="background-color:#D2D2D2;">
                                <p>Your revision is in Progress</p>
                            </div>
                        </div>
						@endif
						
						@if($order->order_status_id == 5 && $order->order_check == 2)

                        <div id="congratSect" class="changingContent">
                            <div class="orderMessage">
								<div style="background-color: #DEFFE5;width: 265px;height: 70px;">
									<h2 style="margin-top: 10px;">Congratulations!</h2>
                                <p style="margin-top: 15px;">Your Order Has Been Completed</p>
								</div>
                                <button id="AcceptOrderBtn" class="progressBtn">Accept Order</button>
                            </div>
                        </div>

                        <div id="writerSect" class="changingContent">
							
							<div id="congratSect" class="changingContent">
                            <div class="orderMessage">
								<div style="background-color: #DEFFE5;width: 265px;height: 70px;">
									<h2 style="margin-top: 10px;">Congratulations!</h2>
                                <p style="margin-top: 15px;">Your Order Has Been Completed</p>
								</div>
                            
                            </div>
                        </div>
							
                            <div class="orderMessage" style="background-color: #EFEFEF !important;">
                                <h2>Completed Files:</h2>
								
                                    <div class="writerBox">
                                       
										<?php $files = Illuminate\Support\Facades\DB::table('attachments')->where('order_id', $order->id)
                              ->where('uploader_id', $order->customer_id)->get(); ?>
										
										@foreach($files as $file)
										
                                       <a href="{{route('download_file', $file->id)}}" download style="color:green;"> <div class="oneWriterBox downlBox">
                                            
										   <p>{{ substr($file->file, 0, 5) }}</p>
                                            <!--<i class="fa-solid fa-download"></i>-->
								</div></a>
                                       
										
										@endforeach
										
										 <hr>
										
										<form style="margin: 5px;" action="{{ route('download_all_files', ['orderId' => $order->id, 'customer_id' => $order->customer_id]) }}" method="post">
											@csrf
											<button type="submit" class="progressBtn">Download All <i class="fa-solid fa-download"></i></button>
										</form>

										
                                        <!--<div class="oneWriterBox">
                                            <button id="writerMarkRevBtn" class="progressBtn">Mark Revision </button>
                                        </div>-->
                                    </div>
								
								<?php if($order->rating==""){?>
								
								 <div id="rateusSectt" class="changingContent">
									<div class="orderMessage">
										<h2>Your opinion matters to us!</h2>
										
										<form action="{{route('user.rate_order', $order->id)}}" method="post">
            							@csrf
										<input type="hidden" name="dt" class="dt">	

										<div class="rateStarsProgress">
											<input type="radio" name="rate" value="1" id="star1">
											<label for="star1"><i class="fa-solid fa-star"></i></label>

											<input type="radio" name="rate" value="2" id="star2">
											<label for="star2"><i class="fa-solid fa-star"></i></label>

											<input type="radio" name="rate" value="3" id="star3">
											<label for="star3"><i class="fa-solid fa-star"></i></label>

											<input type="radio" name="rate" value="4" id="star4">
											<label for="star4"><i class="fa-solid fa-star"></i></label>

											<input type="radio" name="rate" value="5" id="star5">
											<label for="star5"><i class="fa-solid fa-star"></i></label>
										</div>
											
											
										<button id="submitrevBtnn" class="progressBtn">Submit</button>
										</form>
										
									</div>
								</div>
								
								<?php } else{ ?>
								
								<p style="margin-top:3px;"> You rated <b> {{$order->rating}} </b> out of 5</p>
								
								<div class="rateStarsProgress">
    <input type="radio" name="rate" value="1" id="star1" {{ $order->rating >= 1 ? 'checked' : '' }} disabled>
    <label for="star1" class="{{ $order->rating >= 1 ? 'rselected' : '' }}"><i class="fa-solid fa-star"></i></label>

    <input type="radio" name="rate" value="2" id="star2" {{ $order->rating >= 2 ? 'checked' : '' }} disabled>
    <label for="star2" class="{{ $order->rating >= 2 ? 'rselected' : '' }}"><i class="fa-solid fa-star"></i></label>

    <input type="radio" name="rate" value="3" id="star3" {{ $order->rating >= 3 ? 'checked' : '' }} disabled>
    <label for="star3" class="{{ $order->rating >= 3 ? 'rselected' : '' }}"><i class="fa-solid fa-star"></i></label>

    <input type="radio" name="rate" value="4" id="star4" {{ $order->rating >= 4 ? 'checked' : '' }} disabled>
    <label for="star4" class="{{ $order->rating >= 4 ? 'rselected' : '' }}"><i class="fa-solid fa-star"></i></label>

    <input type="radio" name="rate" value="5" id="star5" {{ $order->rating >= 5 ? 'checked' : '' }} disabled>
    <label for="star5" class="{{ $order->rating >= 5 ? 'rselected' : '' }}"><i class="fa-solid fa-star"></i></label>
</div>




								
								<?php } ?>
								
                                     

                            </div>
							
							<div class="oneWriterBox">
                                            <button id="writerMarkRevBtn" type="button" class="progressBtn" style="padding: 4px 14px; background: #FF0000; margin-top: 5px; margin-left: 60px; margin-bottom: 5px;">Mark Revision </button>
                                        </div>
							
                        </div>
					
						@endif
						
			
						<div id="reqRevSect" class="changingContent">
                            <div class="orderMessage" style="background-color: #EFEFEF; margin-top: 25px; row-gap: 15px;margin-bottom: 10px;">
                                <h2 style="margin-bottom: 10px;">Mark Revision</h2>
								<form action="{{route('user.revision')}}" method="post" enctype="multipart/form-data">
               					@csrf
                                <div class="reqRevContent">
										<input type="hidden" name="o_id" value="{{$order->id}}">
              						 	<input type="hidden" name="dt" class="dt">
                                        <label for="message">Message</label>
                                       
									    <textarea name="message" id="" cols="30" rows="2" placeholder="Your Message"></textarea>
                                        <label for="file">File</label>
                                        <input  type="file" name="name[]" multiple>
										<h2 style="margin-bottom: 10px; margin-left: 80px;margin-top: 5px;">Deadline</h2>
                     					<div style="width: 100%; display: inline-flex; column-gap:5px;">	                   
											<input type="date" id="datePicker" style="width: 50%;display: inline-block;" name="date">
											<input type="time" style="width: 50%;display: inline-block;" name="time">
										</div>
                                </div>
                                <button id="reqRevSubmitBtn" type="submit" class="progressBtn" style="margin-top:20px; margin-bottom:5px;">Submit</button><br/>
									<img id="revloader" style="margin-top:2px;" src="{{URL::asset('img/brand/loader.gif')}}" width="30" height="30" alt="" />
								</form>
                            </div>
                        </div>
					
						
						@if($order->order_status_id == 5 && $order->order_check == 3)
						
						<div id="congratrevSect" class="changingContent">
                            <div class="orderMessage">
								<div style="background-color: #DEFFE5;width: 265px;height: 70px;">
									<h2 style="margin-top: 10px;">Congratulations!</h2>
                                <p style="margin-top: 15px;">Your Revision Has Been Completed</p>
								</div>
                                <button id="AcceptRevisionBtn" class="progressBtn">Accept Revisions</button>
                            </div>
                        </div>

                        <div id="writerrevSect" class="changingContent">
							
							<div id="congratrevSect" class="changingContent">
                            <div class="orderMessage">
								<div style="background-color: #DEFFE5;width: 265px;height: 70px;">
									<h2 style="margin-top: 10px;">Congratulations!</h2>
                                <p style="margin-top: 15px;">Your Revision Has Been Completed</p>
								</div>
                            
                            </div>
                        </div>
							
                            <div class="orderMessage" style="background-color: #EFEFEF !important;">
                                <h2>Revised Files:</h2>
								
                                    <div class="writerBox">
										
										<?php $wf = Illuminate\Support\Facades\DB::table('submitted_works')
               ->where('order_id', $order->id)->orderBy('id', 'DESC')->first();  
										$files = Illuminate\Support\Facades\DB::table('attachments')
                  ->where('uploader_id', $wf->user_id)->where('order_id', $order->id)->where('submit_id', $wf->id)->orderBy('id', 'DESC')->get();  ?>
                                       
										
										@foreach($files as $file)
										
                                       <a href="{{route('download_file', $file->id)}}" download style="color:green;"> <div class="oneWriterBox downlBox">
                                            
										   <p>{{ substr($file->file, 0, 5) }}</p>
                                            <!--<i class="fa-solid fa-download"></i>-->
								</div></a>
                                       
										
										@endforeach
										
										 <hr>
										
										<form style="margin: 5px;" action="{{ route('download_all_files', ['orderId' => $order->id, 'customer_id' => $order->customer_id]) }}" method="post">
											@csrf
											<button type="submit" class="progressBtn">Download All <i class="fa-solid fa-download"></i></button>
										</form>

										
                                        <!--<div class="oneWriterBox">
                                            <button id="writerMarkRevBtn" class="progressBtn">Mark Revision </button>
                                        </div>-->
                                    </div>
								
								<?php if($order->rating==""){?>
								
								<!-- <div id="rateusSectt" class="changingContent">
									<div class="orderMessage">
										<h2>Your opinion matters to us!</h2>
										
										<form action="{{route('user.rate_order', $order->id)}}" method="post">
            							@csrf
										<input type="hidden" name="dt" class="dt">	

										<div class="rateStarsProgress">
											<input type="radio" name="rate" value="1" id="star1">
											<label for="star1"><i class="fa-solid fa-star"></i></label>

											<input type="radio" name="rate" value="2" id="star2">
											<label for="star2"><i class="fa-solid fa-star"></i></label>

											<input type="radio" name="rate" value="3" id="star3">
											<label for="star3"><i class="fa-solid fa-star"></i></label>

											<input type="radio" name="rate" value="4" id="star4">
											<label for="star4"><i class="fa-solid fa-star"></i></label>

											<input type="radio" name="rate" value="5" id="star5">
											<label for="star5"><i class="fa-solid fa-star"></i></label>
										</div>
											
											
										<button id="submitrevBtnn" class="progressBtn">Submit</button>
										</form>
										
									</div>
								</div> -->
								
								<?php } else{ ?>
								
								<!--<p style="margin-top:3px;"> You rated <b> {{$order->rating}} </b> out of 5</p>
								
								<div class="rateStarsProgress">
    <input type="radio" name="rate" value="1" id="star1" {{ $order->rating >= 1 ? 'checked' : '' }} disabled>
    <label for="star1" class="{{ $order->rating >= 1 ? 'rselected' : '' }}"><i class="fa-solid fa-star"></i></label>

    <input type="radio" name="rate" value="2" id="star2" {{ $order->rating >= 2 ? 'checked' : '' }} disabled>
    <label for="star2" class="{{ $order->rating >= 2 ? 'rselected' : '' }}"><i class="fa-solid fa-star"></i></label>

    <input type="radio" name="rate" value="3" id="star3" {{ $order->rating >= 3 ? 'checked' : '' }} disabled>
    <label for="star3" class="{{ $order->rating >= 3 ? 'rselected' : '' }}"><i class="fa-solid fa-star"></i></label>

    <input type="radio" name="rate" value="4" id="star4" {{ $order->rating >= 4 ? 'checked' : '' }} disabled>
    <label for="star4" class="{{ $order->rating >= 4 ? 'rselected' : '' }}"><i class="fa-solid fa-star"></i></label>

    <input type="radio" name="rate" value="5" id="star5" {{ $order->rating >= 5 ? 'checked' : '' }} disabled>
    <label for="star5" class="{{ $order->rating >= 5 ? 'rselected' : '' }}"><i class="fa-solid fa-star"></i></label>
</div> -->


								
								<?php } ?>
								
                                     

                            </div>
							
							<div class="oneWriterBox">
                                            <button id="writerMarkRevBtn" type="button" class="progressBtn" style="padding: 4px 14px; background: #FF0000; margin-top: 5px; margin-left: 60px; margin-bottom: 5px;">Mark Revision </button>
                                        </div>
							
                        </div>
						
						@endif
						
						

                    </div>


                </div>

            </div>

	<!-- The Modal -->
	<div id="myModal" class="modal">
		<!-- Modal content -->
		<div class="modal-content">
			<span class="close" onclick="closeModal()">&times;</span>
			<div class="modal_wrapper">
                <div class="navbar_top_wrapper modal_top">
                    <div id="first_div"></div>
                    <h3>Discuss Any Concern</h3>
                    <span onclick="closeModal()"><svg width="20px" height="20px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M5 5L19 19M5 19L19 5" stroke="#00A12D" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg></span>
                </div>
                <div class="chatBox modalChatBox">
                                <div class="support_message user">
										<!-- <p class="person_indicator"><span>{{ __('Support') }}</span></p> -->
										<div class="message_box">
										<p>hello this is me</p>
										</div>
										<p class="message_date"><i class="fa-sharp fa-solid fa-calendar-clock mr-2"></i>2 Mar 2024 - 9:00AM</p>
								</div>
                                
                                <div class="support_message admin">
										<p class="person_indicator"><span>Support</span></p>
										<div class="message_box">
										<p>hello this admin</p>
										</div>
										<p class="message_date"><i class="fa-sharp fa-solid fa-calendar-clock mr-2"></i>2 Mar 2024 - 9:00AM</p>
								</div>
                                <div class="support_message user">
										<!-- <p class="person_indicator"><span>{{ __('Support') }}</span></p> -->
										<div class="message_box">
										<p>hello this is me</p>
										</div>
										<p class="message_date"><i class="fa-sharp fa-solid fa-calendar-clock mr-2"></i>2 Mar 2024 - 9:00AM</p>
								</div>
                                
                                <div class="support_message admin">
										<p class="person_indicator"><span>Support</span></p>
										<div class="message_box">
										<p>hello this admin</p>
										</div>
										<p class="message_date"><i class="fa-sharp fa-solid fa-calendar-clock mr-2"></i>2 Mar 2024 - 9:00AM</p>
								</div>
                </div>
                <div class="form_box">
                    <form action="#" method="post">
                        <div id="left_box">
                            <div class="text_box">
                                    <input type="text" placeholder="Enter your message here...">
                                    </div>
                                    <div class="file_box">
                                        <label for="attachment"><svg width="22" height="23" viewBox="0 0 22 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M20.4383 10.6622L11.2483 19.8522C10.1225 20.9781 8.59552 21.6106 7.00334 21.6106C5.41115 21.6106 3.88418 20.9781 2.75834 19.8522C1.63249 18.7264 1 17.1994 1 15.6072C1 14.015 1.63249 12.4881 2.75834 11.3622L11.9483 2.17222C12.6989 1.42166 13.7169 1 14.7783 1C15.8398 1 16.8578 1.42166 17.6083 2.17222C18.3589 2.92279 18.7806 3.94077 18.7806 5.00222C18.7806 6.06368 18.3589 7.08166 17.6083 7.83222L8.40834 17.0222C8.03306 17.3975 7.52406 17.6083 6.99334 17.6083C6.46261 17.6083 5.95362 17.3975 5.57834 17.0222C5.20306 16.6469 4.99222 16.138 4.99222 15.6072C4.99222 15.0765 5.20306 14.5675 5.57834 14.1922L14.0683 5.71222" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                        </label>
                                        <input type="file" name="attachment" id="attachment" multiple>
                                    </div>
                        </div>
                        <div id="right_box">
                            <button>Send</button>
                        </div>
                    </form>
                </div>

            </div>
		</div>
	</div>
	

        </div>
@endsection
@section('js')
<script>

    
    // toggle navbar

    $("#nav_toggle").on("click", function (e) {
       $(".sidebar").toggleClass('shown');
       $(this).find('i').toggleClass('fa-bars fa-times');
    });


	$(document).ready(function() {
        $('.rateStarsProgress label').on('click', function() {
            $(this).addClass('rselected').prevAll().addClass('rselected');
            $(this).nextAll().removeClass('rselected');
        });
		
		    // Get the current date in the format "YYYY-MM-DD"
    var currentDate = new Date().toISOString().split('T')[0];

    // Set the min attribute of the date input to the current date
    $('#datePicker').attr('min', currentDate);
	
	$('#revloader').hide();	
		
    });
	
    $(document).ready(function () {
        $("#orderproSect").show();
        $("#congratSect").show();
        $("#writerSect").show();
        // $("#writerSect").hide();
        $("#rateusSect").hide();
      //  $("#markrevSect").hide();
        $("#reqRevSect").hide();
		$("#writerSect").hide();
		$("#writerrevSect").hide();
		
		

        $("#AcceptOrderBtn").click(function () {
            $("#congratSect").hide();
            $("#writerSect").show();
        });
		
		$("#AcceptRevisionBtn").click(function () {
            $("#congratrevSect").hide();
            $("#writerrevSect").show();
        });

        $("#rateusBtn").click(function () {
            $("#writerSect").hide();
            $("#rateusSect").show();
        });

        $("#writerMarkRevBtn").click(function () {
	
            $("#writerSect").hide();
            $("#reqRevSect").show();
			$("#writerrevSect").hide();
			$('#congratrevSect').hide();
			
        });
        $("#submitrevBtn").click(function () {
            $("#rateusSect").hide();
            $("#markrevSect").show();
        });
        $("#markrevBtn").click(function () {
            $("#markrevSect").hide();
            $("#reqRevSect").show();
        });
        $("#reqRevSubmitBtn").click(function () {
           // $("#reqRevSect").hide();
            // $("#markrevSect").show();
			$("#revloader").show();
        });
    });

    // for rating stars selecting 
    $(document).ready(function(){
    $(".rateStarsProgress i").click(function(){
        // Remove 'selected' class from all stars
        $(".rateStarsProgress i").removeClass("selected");
        
        // Add 'selected' class to the clicked star and all previous stars
        $(this).addClass("selected");
        $(this).prevAll().addClass("selected");
    });
});
	
	// JavaScript to control the modal
    function openModal() {
        document.getElementById('myModal').style.display = 'flex';
    }

    function closeModal() {
        document.getElementById('myModal').style.display = 'none';
    }

    // Close the modal if the overlay (outside the modal) is clicked
    window.onclick = function(event) {
        var modal = document.getElementById('myModal');
        if (event.target == modal) {
            modal.style.display = 'none';
        }
    }
	
</script>
@endsection