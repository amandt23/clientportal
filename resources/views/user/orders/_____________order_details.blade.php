@extends('layouts.app')

@section('css')
<!-- Data Table CSS -->
<link href="{{URL::asset('plugins/datatable/datatables.min.css')}}" rel="stylesheet" />
<!-- Sweet Alert CSS -->
<link href="{{URL::asset('plugins/sweetalert/sweetalert2.min.css')}}" rel="stylesheet" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<style>
	.flag{
	   margin-top: 17%!important;}
	.page-title {
    margin: 0;
    font-size: 21px;
    font-weight: 700;
    line-height: 2.5rem;
    position: relative;
}
	.float-right {
    float: right !important;
    color: white!important;
    font-weight: 100;
}
	td{
		font-size:15px!important;
		font-weight:bold!important;
	}
.float-right {
    float: left !important;
    color: white!important;
}
	.page-leftheader .breadcrumb-item a, .page-rightheader .breadcrumb-item a {
    color: #1e1e2d;
    font-size: 12px;
}
tbody, td, tfoot, th, thead, tr {
    border-color: inherit;
    border-style: solid;
    border-width: 0;
    font-size:20px!imporant;
    font-weight: bold!important;
}
	.table > :not(:last-child) > :last-child > * {
    border-bottom-color: inherit !important;
    font-size: 18px!important;
    font-weight: bold!important;
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
	p {
    margin-top: 0;
    margin-bottom: 1rem;
    font-weight: bold!important;
    color: white!important;
}
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
    <div class="card border-0" style="background-color: #44afc3;">
      <div class="card-body pt-2">
        <div class="box-content" style="color: #ffffff;">
          <div class="  ">

          <table class="table">
    <thead>
      <tr>
        
        <th style="
 
    width: 40%;
">   <p>
       Order ID
       
     </p></th>
		  <P>
			  <th>  <span class="float-right" id="btitle"> {{$order->number}} </span></th></P>
     
      </tr>
    </thead>
    <tbody>
     <tr>
		 <tr>
        <td style="
    
    width: 40%;
">
            <p>
                Order Placement Date
              
              </p>

        </td>
		 <td>  <span class="float-right" id="bposted">{{date('Y-m-d',strtotime($order->created_at))}} </span></td>
     </tr>

      <tr>
  
        <td style="

    width: 40%;
"> <p>
       Order Price
       
     </p></td>
		  <td><span class="float-right"><i class="fa {{format_amount(1)['icon']}}"></i><span id="btotal">{{$order->total}}</span> </span></td>
      </tr>
		 <tr>
        <td style="
   
    width: 40%;
">

            <p>
                Order Deadline 
              
              </p>
        </td>
		  <td>  <span class="float-right" id="bdeadline_date"> {{$order->dead_line}}</span></td>
     </tr>
		 <tr>

        <td style="
  
    width: 40%;
"><p>
       Number of pages
       
     </p></td>
			 <td>  <span class="float-right"> <span id="bqty"></span>{{$order->quantity}} Pages</span></td>
      </tr>
		 <tr>

        <td style="

    width: 40%;
">
     <p>
      Educational Level
     <?php $wl = Illuminate\Support\Facades\DB::table('work_levels')->where('id', $order->work_level_id)->first(); ?>
		  </p></td>
			 <td>
       <span class="float-right" id="bwork_level"> {{$wl->name}}</span>
    
			 </td>
      </tr>
		
    
		
		
		
		
		
		
		
		 <tr>

        <td style="
    
    width: 40%;
"> <p>
      Writer’s Level
      
     </p></td>
			 <td> <span class="float-right" id="bplan_type">{{$order->package}} </span></td>
      </tr>
		
		  <tr>
       
        <td style="
    
    width: 40%;
"><p>
       Service Type
     <?php $s = Illuminate\Support\Facades\DB::table('services')->where('id', $order->service_id)->first(); ?>
                             
      
     </p></td>
		  <td> <span class="float-right" id="bservice"> {{$s->name}}</span></td>
      </tr>
		
		
		 <tr>

        <td style="
   
    width: 40%;
"><p>
       Subject
      
     </p> </td>
			 <td> <span class="float-right" id="bcourse"> {{$order->course}}</span></td>
      </tr>
		
		 <tr>
        <td style="
   
    width: 40%;
"> <p>
       Title
       
     </p></td>
    <td> <span class="float-right" id="btitle"> {{$order->title}} </span></td>
      </tr>
		
		 <tr>

        <td style="
  
    width: 40%;
"><p>
       Citation Style
       
     </p></td>
			 <td><span class="float-right" id="bformatting">{{$order->formatting}} </span></td>
      </tr>
		
		
		 <tr>

        <td style="
   
    width: 40%;
"> <p>
       Order Deatails
      
     </p></td>
			 <td> <span class="float-right" id="binstruction"> {{$order->instruction}}</span></td>
      </tr>
		
		
		
		
		
		
		
		 
     
     
     
     
    
     <tr>
        <td style="
  
    width: 40%;
">
            <p>
                Status</p>
              
        </td>
		 <td>  <?php $status= Illuminate\Support\Facades\DB::table('order_statuses')->where('id', $order->order_status_id)->first();  ?>
                      @if($status->id == 2 || $status->id == 3)
                      <span class="float-right">In Process</span>
                      @else 
                      <span class="float-right">{{$status->name}}</span>
                      @endif
           
                    
                   @if($order->order_status_id == 5)<p> Writer's File
           
                
           
                <?php $sw= Illuminate\Support\Facades\DB::table('attachments')->where('order_id', $order->id)->get();  ?>
                  @foreach($sw as $f)
           
                    
           
                      <a class="float-right "  href="{{$f->file_path}}" download>{{$f->file}} <i class="fa fa-download"></i></a>
           @endforeach
                      
           
                
           
                    
           
                  </p>@endif
           
            </td>
     </tr>
     
     
  
		
    </tbody>
  </table>
			  
          </div>
        </div>
      </div>
    </div>
  </div>
	
	
   <div class="col-lg-4 col-md-4 col-sm-4">
					    <div class="card border-0" style="background-color: #44afc3!important;">
      <div class="card-body pt-2">
        <div class="box-content" style="color: #ffffff;">
          <div class=" ">
	<div id="acceptForm" style="
    margin-top: 2%;
">
		       <h4 class="page-title mb-0">Order Inquiry</h4>
		<p style="font-size:12px;font-weight: 100;font-weight: 100!important;color: #a19696;color: white!important;margin-top: 0%;">*Please use the provided chat box to inquire about your order status.</p>
			  
			  
       								
		   			        	</div>
		<div id="revision" style="display:none">	  
			<h4 class="page-title mb-0">Request For Revision</h4>  	
			<form action="https://quirky-turing.82-165-205-78.plesk.page/user/comment" method="post" enctype="multipart/form-data">
				<input type="hidden" name="_token" value="q3jbySKQ1xu6cqjObIhF6Fp1XoxqklWfL1cYgxiy">				<input type="hidden" name="o_id" value="309">
				<div class="form-group">
					<label for="">Message</label>
					<textarea name="message" class="form-control" placeholder="Your Message"></textarea>
				</div>
				<div class="form-group">
					<label for="">File</label>
					<input type="file" name="file" class="form-control">
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-primary my-3">Submit</button>
				</div>
			</form>
		</div>
		<div id="rateOrder" style="display:none">	  
			<h4 class="page-title mb-0">Rate the Order</h4>  	
			<form action="https://quirky-turing.82-165-205-78.plesk.page/user/rate_order/309" method="post">
				<input type="hidden" name="_token" value="q3jbySKQ1xu6cqjObIhF6Fp1XoxqklWfL1cYgxiy">
				<div class="form-group">
					<label for="">Rate 0/5</label>
					<input type="number" name="rating" min="0" max="5" class="form-control">
				</div>
				
				<div class="form-group">
					<button type="submit" class="btn btn-primary my-3">Submit</button>
				</div>
			</form>
		</div>

	
    </div>
</div>
    </div>
</div>
  
			
			
   
      <div class="card border-0" style="background-color: #44afc3;height: 81%;">
     		@if( $order->payment_status == 1)

	
	 <div class="card border-0" style="background-color: #3C3465;">
      <div class="card-body pt-2">
        <div class="box-content" style="color: #ffffff;">
          <div class=" text-white ">
	


				
					<div class="row" >	
						<div class="p-4" id="support-messages-box" style="height:60vh; overflow:scroll; overflow-x:hidden">
                        @foreach($conversations as $conv)
							<?php $w = Illuminate\Support\Facades\DB::table('users')->where('username', $conv->sender)->first(); ?>
							@if($conv->sender != 'admin')
						<div class="background-white support-message mb-5">
					<p class="font-weight-bold text-primary fs-11"><i class="fa-sharp fa-solid fa-calendar-clock mr-2"></i>{{ date('Y-m-d h:i:A', strtotime($conv->created_at)) }} MPW</p>
						<p class="fs-14 text-dark mb-1">{{ $conv->message }}</p>@if ($conv->attachment != null)

											<p class="font-weight-bold fs-11 text-primary mb-1">{{ __('Attachment') }}</p>

											<a class="font-weight-bold fs-11 text-primary" download href="{{ $conv->attachment_path }}">{{ $conv->attachment }}</a>

										@endif

					
																		
						</div>
						@else
								<div class="background-white support-message support-response mb-5">
										<p class="font-weight-bold text-primary fs-11"><i class="fa-sharp fa-solid fa-calendar-clock mr-2"></i>{{ date('Y-m-d h:i:A', strtotime($conv->created_at)) }} <span>{{ __('Your Message') }}</span></p>
										
										<p class="fs-14 text-dark mb-1">{{ $conv->message }}</p>

										

											

		
										@if ($conv->attachment != null)
											<p class="font-weight-bold fs-11 text-primary mb-1">{{ __('Attachment') }}</p>
											<a class="font-weight-bold fs-11 text-primary" download href="{{ $conv->attachment_path }}">{{ $conv->attachment }}</a>
										@endif
									</div>
							@endif
							@endforeach
									
							
								
						
									
								
												
						</div>
					<form action="{{ route('admin.admin_send_message') }}" method="post" enctype="multipart/form-data">	
						@csrf
					<div class="input-box d-flex">
						<input type="hidden" name="o_id" value="{{$order->id}}">
						<input type="hidden" name="receiver_id" value="{{$order->staff_id}}">
					
					 
						
        
          	<textarea class="form-control"  style="border-radius:10px 0 0 10px !important; " name="message" placeholder="Enter your reply message here..."></textarea>
								  <label class="filebutton">
              <i class="fas fa-paperclip color-dark" style="margin-left:-26px; margin-top:20px; color:black"></i>
									  	<span><input type="file" id="myfile" name="myfile"></span>
								  </label>
         
              <button class="btn btn-primary" style="border-radius:0 10px 10px 0 !important; "><i class="fas fa-paper-plane"></i></button>
         
					</div>
					</form>
	
		</div>


	
    </div>
</div>
    </div>
				
</div>
			</div>
	@endif


		</div>



<!-- Button trigger modal 
 <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Conversations
</button>
		
    </div>
-->

	

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Conversations</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div class="card border-0" style="background-color: #3C3465;">
      <div class="card-body pt-2">
        <div class="box-content" style="color: #ffffff;">
          <div class="  ">
	


				
					<div class="row" >	
						<div class="p-4" id="support-messages-box" style="height:60vh; overflow:scroll; overflow-x:hidden">
@foreach($conversations as $conv)
							<?php $w = Illuminate\Support\Facades\DB::table('writers')->where('username', $conv->sender)->first(); ?>
							@if($conv->sender == 'admin')
						<div class="background-white support-message mb-5">
					<p class="font-weight-bold text-primary fs-11"><i class="fa-sharp fa-solid fa-calendar-clock mr-2"></i>{{ date('Y-m-d h:i:A', strtotime($conv->created_at)) }} <span>MPW</span></p>
						<p class="fs-14 text-dark mb-1">{{ $conv->message }}</p>
																		
						</div>
						@else
								<div class="background-white support-message support-response mb-5">
										<p class="font-weight-bold text-primary fs-11"><i class="fa-sharp fa-solid fa-calendar-clock mr-2"></i>{{ date('Y-m-d h:i:A', strtotime($conv->created_at)) }} <span>{{ __('Your Message') }}</span></p>
										
										<p class="fs-14 text-dark mb-1">{{ $conv->message }}</p>
										@if ($conv->attachment != null)
											<p class="font-weight-bold fs-11 text-primary mb-1">{{ __('Attachment') }}</p>
											<a class="font-weight-bold fs-11 text-primary" download href="{{ $conv->attachment_path }}">{{ $conv->attachment }}</a>
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
					
					 
						
						
        
          	<textarea class="form-control"  style="border-radius:10px 0 0 10px !important; " name="message" placeholder="Enter your reply message here..."></textarea>
								  <label class="filebutton">
              <i class="fas fa-paperclip color-dark" style="margin-left:-26px; margin-top:20px; color:black"></i>
									  	<span><input type="file" id="myfile" name="myfile"></span>
								  </label>
         
              <button class="btn btn-primary" style="border-radius:0 10px 10px 0 !important; "><i class="fas fa-paper-plane"></i></button>
         
					</div>
					</form>
	
		</div>


	
    </div>
</div>
    </div>
				
</div>
      </div>

    </div>
  </div>
</div>

<div id="publishable_key" data-publishablekey="{{ env('STRIPE_KEY') }}"></div>
<div id="process_url" data-processurl="{{ route('stripe_process') }}"></div>

@endsection

@section('js')

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

<script src="https://js.stripe.com/v3/"></script>
<script>
   
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