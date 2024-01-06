@extends('layouts.app')

@section('css')
<!-- Data Table CSS -->
<link href="{{URL::asset('plugins/datatable/datatables.min.css')}}" rel="stylesheet" />
<!-- Sweet Alert CSS -->
<link href="{{URL::asset('plugins/sweetalert/sweetalert2.min.css')}}" rel="stylesheet" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
.card-body {
    flex: 1 1 auto;
    margin: 0;
    padding: 1rem 1.5rem;
    position: relative;
    height: 672px!important;
}
.btn-success {
    color: #fff;
    background-color: #3b3465!important;
    border-color: #3b3465!important;
}
label span input {
    z-index: 999;
    line-height: 0;
    font-size: 50px;
    position: absolute;
    top: -2px;
    left: -700px;
    opacity: 0;
    filter: alpha(opacity = 0);
    -ms-filter: "alpha(opacity=0)";
    cursor: pointer;
    _cursor: hand;
    margin: 0;
    padding:0;
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
	*{
    margin: 0;
    padding: 0;
}
	
.rate {
   
    height: 78px;
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
</style>
@endsection

@section('page-header')
<!-- PAGE HEADER -->
<div class="page-header mt-5-7">
    <div class="page-leftheader">
        <h4 class="page-title mb-0">{{ __('Order Details') }}</h4>
        <ol class="breadcrumb mb-2">
            <li class="breadcrumb-item"><a href="{{ route('user.dashboard') }}"><i class="fa-solid fa-id-badge mr-2 fs-12"></i>{{ __('Dashboard') }}</a></li>
            <li class="breadcrumb-item" aria-current="page"><a href="{{ route('user.my_orders') }}">{{ __('Orders') }}</a></li>
        </ol>
    </div>

</div>
<!-- END PAGE HEADER -->
@endsection

@section('content')
<div class="row ">
	
	<div class="col-lg-8 col-md-8 col-sm-8">
		<div class="card border-0" style="background-color: #4eb3c4;height: 97%;">
  
      <div class="card-body pt-2">
        <div class="box-content" style="color: #ffffff;">
          <div class=" text-white ">

           <p>
              Order ID
              <span class="float-right" id="btitle" style="
    float: right;"> {{$order->number}} </span>
            </p>
            <p>
              Title
              <span class="float-right" id="btitle" style="
    float: right;"> {{$order->title}} </span>
            </p>

            <p>
              Amount
              <span class="float-right"><i class="fa {{format_amount(1)['icon']}}"></i><span id="btotal" style="
    float: right;">{{$order->total}}</span> </span>
            </p>
            <p>
              Service Type
			<?php $s = Illuminate\Support\Facades\DB::table('services')->where('id', $order->service_id)->first(); ?>
                                    
              <span class="float-right" id="bservice" style="
    float: right;"> {{$s->name}}</span>
            </p>
            <p>
              Education Level
			<?php $wl = Illuminate\Support\Facades\DB::table('work_levels')->where('id', $order->work_level_id)->first(); ?>
              <span class="float-right"  style="
    float: right;" id="bwork_level"> {{$wl->name}}</span>
            </p>
            <p>
              Writer Level
              <span class="float-right" id="bplan_type" style="
    float: right;">{{$order->package}} </span>
            </p> 
            <p>
              Quantity
              <span class="float-right"  style="
    float: right;"> <span id="bqty" style="
    float: right;"></span>{{$order->quantity}} Pages</span>
            </p>
            <p>
              Instruction
              <span class="float-right" id="binstruction" style="
    float: right;"> {{$order->instruction}}</span>
            </p>
            <p>
              Citation
              <span class="float-right" id="bformatting" style="
    float: right;">{{$order->formatting}} </span>
            </p>
            <p>
              Course
              <span class="float-right" id="bcourse" style="
    float: right;"> {{$order->course}}</span>
            </p>
            <p>
              Sources
              <span class="float-right" id="bsources" style="
    float: right;"> {{$order->sources}}</span>
            </p>
            <p>
              Posted On
              <span class="float-right" id="bposted" style="
    float: right;">{{date('Y-m-d',strtotime($order->created_at))}} </span>
            </p>
            <p>
              Deadline Date
              <span class="float-right" id="bdeadline_date" style="
    float: right;"> {{$order->dead_line}}</span>
            </p>
            <p>
              Deadline Time
              <span class="float-right" id="bdeadline_time" style="
    float: right;">{{$order->deadline_time}} </span>
            </p>
            <p>
              My File

             
              	<?php $files = Illuminate\Support\Facades\DB::table('attachments')->where('order_id', $order->id)
					->where('uploader_id', $order->customer_id)->get(); ?>
				@foreach($files as $file)
                      <a  style="
    float: right;" class="float-right text-light" href="{{$file->file_path}}" download class="text-primary"><i class="fa fa-download"></i> {{$file->file}}</a> <br>
				@endforeach
            
            </p>

			  <p>
			Status
			<?php $status= Illuminate\Support\Facades\DB::table('order_statuses')->where('id', $order->order_status_id)->first();  ?>
				  @if($status->id == 2 || $status->id == 3)
				  <span   style="
    float: right;"class="float-right">In Process</span>
				  @else 
				  <span  style="
    float: right;" class="float-right">{{$status->name}}</span>
				  @endif

				
              </p> @if($order->order_status_id == 5)<p> Writer's File

			

			<?php $sw= Illuminate\Support\Facades\DB::table('attachments')->where('uploader_id', 1)->where('order_id', $order->id)->get();  ?>
			  @foreach($sw as $f)

				

				  <a class="float-right text-white"  href="{{$f->file_path}}" download>{{$f->file}} <i class="fa fa-download"></i></a>
@endforeach
				  

			

				

              </p>@endif

    

          </div>
        </div>
      </div>
    </div>
  </div>
				<?php $check = Illuminate\Support\Facades\DB::table('revisions')->where('order_id', $order->id)
						->where('user_id', $order->customer_id)->count();  ?>
	
    <div class="col-lg-4 col-md-4 col-sm-4">
		<div >
			@if($order->rating != null)
				<div id="mark" class="text-white p-2" style="background:#4eb3c4; border-radius: 9px;">
					<p style="margin-left:4%"> You can mark Revision Requested for 14 days</p>
					<button type="button" id="flip" class="btn btn-success" style="margin-bottom: 13px;margin-left: 21%;" onclick="RevisionFunction()">Mark Revision</button>
				</div>
			@endif
				@if($order->order_status_id == 5 && $order->rating == null)
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
				
				
				<button type="button" id="flip" class="btn btn-success" style="
				margin-left: 21%;
				/* padding-bottom: 4px; */
				margin-bottom: 13px;
				" onclick="dataFunction()">Accept Order</button>
			
				
				</div>
				@elseif($order->order_status_id == 4)
				<p  class="text-white p-2" style="background:#4eb3c4; border-radius: 9px;">Revision is in Progress</p>
				@elseif($order->rating == null)
				<p  class="text-white p-2" style="background:#4eb3c4;border-radius: 9px;">Your Order is in Progress</p>
				@endif 
		
			</div>
		<div class="order" id="section"style="background-color:#4eb3c4!important;border-radius: 9px;color: white;/* font-weight: bold; */margin-top:2%!important;display:none">
			
			
			<div id="revision" style="display: none;background-color: rgb(78, 179, 196) !important;width: 80%;margin-left: 10%;">	  
			<h4 class="page-title mb-0"  style="color:white!important">{{ __('Request For Revision') }}</h4>  	
			<form action="{{route('user.revision')}}" method="post" enctype="multipart/form-data" >
				@csrf
				<input type="hidden" name="o_id" value="{{$order->id}}">
				<div class="form-group">
					<label for=""style="color:white!important">Message</label>
					<textarea name="message" class="form-control" placeholder="Your Message"style="color:white!important"></textarea>
				</div>
				<div class="form-group">
					<label for=""style="color:white!important">File</label>
					<input type="file" name="name[]" class="form-control"style="color:white!important">
				</div>
				<div class="form-group">
					<label for=""style="color:white!important">Deadline Date</label>
					<input type="date" name="date" class="form-control"style="color:white!important">
				</div>
				<div class="form-group">
					<label for=""color="white!important"style="color:white!important">Deadline Time</label>
					<input type="time" name="time" class="form-control"style="color:white!important">
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-primary my-3"style="color:white!important">Submit</button>
				</div>
			</form>
		</div>
			
			
			
			<div id ="files"><h5 class="pt-2 pl-2">Writer's Message:</h5>
				<?php $wf = Illuminate\Support\Facades\DB::table('submitted_works')
						->where('order_id', $order->id)->orderBy('id','DESC')->first(); ?>
				@if($wf)
					<p class="pt-2 pl-2">{{$wf->message}}</p>
				@endif
				<p style="font-weight: bold; margin-left: 2%;">

					@if($check > 0)
					<?php $files= Illuminate\Support\Facades\DB::table('attachments')
						->where('uploader_id',1)->where('order_id', $order->id)->orderBy('id','DESC')->get();  ?>

					@endif


					@foreach($files as $file)
					<div class="p-2">
						<a class="text-light" href="{{$file->file_path}}" download> {{$file->file}}
							<i class="fa fa-download bg-dark p-1 rounded mr-2" style="float:right"></i>
						</a> <br>
					</div>
					@endforeach
				</p>
			</div>
			
<br>
						<form action="{{route('user.rate_order', $order->id)}}" method="post">
				@csrf
			 <div class="rate" id="rate" style="display:none;margin-right: 24%;">
    <input type="radio" id="star5" name="rate" value="5">
    <label for="star5" title="text">5 stars</label>
    <input type="radio" id="star4" name="rate" value="4">
    <label for="star4" title="text">4 stars</label>
    <input type="radio" id="star3" name="rate" value="3">
    <label for="star3" title="text">3 stars</label>
    <input type="radio" id="star2" name="rate" value="2">
    <label for="star2" title="text">2 stars</label>
    <input type="radio" id="star1" name="rate" value="1">
    <label for="star1" title="text">1 star</label>
				  <br>
				    <br>  
				  <button type="submit" id="flip" class="btn btn-success" style="/* margin-bottom: 14px; */margin-left: 44%;" onclick="rateusFunction()">Submit</button>
  </div>
			</form>
			
<div class="rateus" style="
    margin-top: 5%;
    /* margin-left: 33px; */
"> 
	<div class="row">
	<div id="rateus" col-md-6="" col-sm-12="" col-lg-6="">
			<button type="button" id="flip" class="btn btn-success" style="margin-bottom: 13px;margin-left: 5%;" onclick="rateusFunction()">Rate Us</button>
	</div>
	<div id="mark" col-md-4="" col-sm-12="" col-lg-6="">
			<button type="button" id="flip" class="btn btn-success" style="margin-bottom: 13px;float: right;margin-top: -17%;margin-right: 4%;"onclick="RevisionFunction()">Mark Revision</button>
		</div>
	</div>
			</div>
	</div >


				
		
		@if($order->payment_status == 1)
	 <div class="card border-0" style="background-color: #4eb3c4; margin-top:2%!important ;">
            <div class=" card-body pt-2">
                <div class="box-content" style="color: #ffffff;">
                    <div class=" text-white ">




                        <div class="row">
                            <div class="p-4" id="support-messages-box"
                                style="height:50% !mportant;overflow:scroll;overflow-x:hidden;height: 500px!importnat;/* height: 291px!important; */height: 200px!important;">
                                @foreach($conversations as $conv)
                                <?php $w = Illuminate\Support\Facades\DB::table('writers')->where('username', $conv->sender)->first(); ?>
                                @if($conv->sender == 'admin')
                                <div class="background-white support-message mb-5">
                                    <p class="font-weight-bold text-primary fs-11"><i
                                            class="fa-sharp fa-solid fa-calendar-clock mr-2"></i>{{ date('Y-m-d h:i:A', strtotime($conv->created_at)) }}
                                        <span>MPW</span></p>
                                    <p class="fs-14 text-dark mb-1">{{ $conv->message }}</p>@if ($conv->attachment !=
                                    null)

                                    <p class="font-weight-bold fs-11 text-primary mb-1">{{ __('Attachment') }}</p>

                                    <a class="font-weight-bold fs-11 text-primary" download
                                        href="{{ $conv->attachment_path }}">{{ $conv->attachment }}</a>

                                    @endif



                                </div>
                                @else
                                <div class="background-white support-message support-response mb-5">
                                    <p class="font-weight-bold text-primary fs-11"><i
                                            class="fa-sharp fa-solid fa-calendar-clock mr-2"></i>{{ date('Y-m-d h:i:A', strtotime($conv->created_at)) }}
                                        <span>{{ __('Your Message') }}</span></p>

                                    <p class="fs-14 text-dark mb-1">{{ $conv->message }}</p>
                                    @if ($conv->attachment != null)
                                    <p class="font-weight-bold fs-11 text-primary mb-1">{{ __('Attachment') }}</p>
                                    <a class="font-weight-bold fs-11 text-primary" download
                                        href="{{ $conv->attachment_path }}">{{ $conv->attachment }}</a>
                                    @endif
                                </div>
                                @endif
                                @endforeach







                            </div>
                            <form action="{{ route('user.send_message') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="input-box d-flex">
                                    <input type="hidden" name="o_id" value="{{$order->id}}">
                                    <input type="hidden" name="receiver_id" value="{{$order->staff_id}}">





                                    <textarea class="form-control" style="border-radius:10px 0 0 10px !important; "
                                        name="message" placeholder="Enter your reply message here..."></textarea>
                                    <label style="width:50px" class="filebutton">
                                        <i class="fas fa-paperclip color-dark"
                                            style="margin-left:-26px; margin-top:20px; color:black"></i>
                                        <span><input type="file" id="myfile" name="myfile"></span>
                                    </label>

                                    <button class="btn btn-primary" style="border-radius:0 10px 10px 0 !important; "><i
                                            class="fas fa-paper-plane"></i></button>

                                </div>
                            </form>

                        </div>



                    </div>
                </div>
            </div>

        </div>

		@endif
</div>









<div id="publishable_key" data-publishablekey="{{ env('STRIPE_KEY') }}"></div>
<div id="process_url" data-processurl="{{ route('stripe_process') }}"></div>

@endsection

@section('js')

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

<script src="https://js.stripe.com/v3/"></script>
<script>
	
	function dataFunction() {
 document.getElementById("section").style.display = "block";
}
	function rateusFunction() {
 document.getElementById("files").style.display = "none";
		 document.getElementById("rate").style.display = "block";
		 document.getElementById("mark").style.display = "none";
		document.getElementById("rateus").style.display = "none";
}
	function RevisionFunction() {
 document.getElementById("files").style.display = "none";
		 document.getElementById("rate").style.display = "none";
		 document.getElementById("mark").style.display = "none";
		document.getElementById("rateus").style.display = "none";
		document.getElementById("revision").style.display = "block";
}
	
	
   $(document).ready(function(){
  $("#flip").click(function(){
    $("#panel").slideDown("slow");
  });
});
 var o = 0;

	$('document').ready(function(){
		$('#accept').click(function(){
			$('#downloadFile').show()
			$('#selectOption').show()
			$('#accept').hide()
		})
		
		$('#select').change(function(){
			var option = $('#select').val();
			if(option == 'mark a revision'){
				$('#acceptForm').hide()
				$('#revision').show()
			} else if(option == 'rate order') {
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
$('#apply-promo').click(function(){
	var promo_code = $('#promo_code').val();
	$.ajax({
		type:'POST',
		url:"{{ route('user.apply_promo') }}",
		data:{
			"_token":"{{ csrf_token() }}",
			"promo_code":promo_code,
			"id":"{{$order->id}}"
		},
		success:function(data){
			if(data.error != null) {
				$('#promocode-error').removeClass('d-none');
				$('#promocode-error').text(data.error)
			} else {
				$('#voucher-result').removeClass('d-none');
				$('#total_discount').text(data.discount)
				$('#gtotal').text('$'+data.total)
			}
			
		}
	});

});
</script>
@endsection