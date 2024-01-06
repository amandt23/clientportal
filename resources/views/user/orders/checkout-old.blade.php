@extends('layouts.empty')

@section('css')

<!-- Sweet Alert CSS -->
<link href="{{URL::asset('plugins/sweetalert/sweetalert2.min.css')}}" rel="stylesheet" />
<!-- SweetAlert2 CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.9/dist/sweetalert2.min.css">

<!-- SweetAlert2 JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.9/dist/sweetalert2.all.min.js"></script>
<style>
  div.scroll {
    margin: 4px, 4px;
    padding: 4px;
    background-color: #53b5c5;
    width: 360px;
    overflow-x: auto;
    overflow-y: hidden;
    white-space: nowrap;
  }

  small,
  .small {
    font-size: 87.5%;
    font-weight: 400;
    color: white;
  }

  .no-arrows::-webkit-inner-spin-button,
  .no-arrows::-webkit-outer-spin-button {
    -webkit-appearance: none;
    margin: 0;
  }

  .no-arrows {
    -moz-appearance: textfield;
  }

  body {
    font-size: 13px;
  }

  .progress {
    height: 30px;
    margin-bottom: 20px;
  }

  .progress-bar {
    background-color: #f49d1d;
    border-radius: 0.5rem;
  }

  .error-tooltip {
    color: #dc3545;
    font-size: 12px;
    margin-top: 4px;
  }

  .loading-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(255, 255, 255, 0.8);
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 9999;
  }

  .progress {
    height: 22px;
    margin-bottom: 20px;
    width: 30%;
    left: 2%;
    margin-left: 84px;
  }

  .loading-spinner {
    display: inline-block;
    width: 40px;
    height: 40px;
    border: 4px solid #f3f3f3;
    border-top: 4px solid #3498db;
    border-radius: 50%;
    animation: spin 1s linear infinite;
  }

  @keyframes spin {
    0% {
      transform: rotate(0deg);
    }

    100% {
      transform: rotate(360deg);
    }
  }

  .box-content .text-white:hover {
    color: #fff !important;
  }

  .text-white:hover,
  .text-white:focus {
    color: white !important;
  }

  footer.footer {
    font-size: 12px;
    border-top: 0;
    padding: 0 1.3rem 1rem;
    display: block;
    margin-top: auto;
    top: 2%;
    margin-top: 2% !important;
  }

  #progress-bar {
    width: 0;
    height: 30px;
    background-color: #4caf50;
    text-align: center;
    line-height: 30px;
    color: white;
  }

  label {
    display: inline-block;
    margin-bottom: 0.5rem;
    color: white !important;
  }

  .btn {
    background-color: DodgerBlue;
    border: none;
    color: white;
    padding: 12px 16px;
    font-size: 16px;
    cursor: pointer;
  }

  /* Darker background on mouse-over */
  .btn:hover {
    background-color: RoyalBlue;
  }


</style>
@endsection

@section('content')
<!-- USER PROFILE PAGE -->
<br>
<h3 style="text-align: center; padding-top: 20px; padding-bottom: 20px;"><strong>Complete The Payment Process!!!</strong></h3>




<div class="row" >
  <div class="col-lg-8 card border-0" style="background-color: #ffffff;height:100%;">

  <h4 style="text-align:center;font-weight:bold;margin-top:4%!important;" > Order  Detaill </h4>
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
											<h6 style="text-align:center">Order Price</h6>
											<div class="form-group text-center mt-2 rounded pt-2 pb-3" style="background:#f5f9fc">	
												
												@if($order->currency == 'USD')
												<i class="fa fa-dollar"></i>
												@elseif($order->currency == 'GBP')
												<i class="fa fa-gbp"></i>
												@else
												<i class="fa {{format_amount(1)['icon']}}"></i>
												@endif
												<span>{{session('total_amount')}}</span>
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
                                <h4 style="text-align:center;font-weight:bold;" > Deadlines Details </h4>
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
											<h6 style="text-align:center;font-weight:bold;">Deadline Date/Time</h6>
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
											<h6 style="text-align:center;font-weight:bold;">Timezone</h6>
											<div class="form-group">							    
												<input type="text" style="text-align:center" class="form-control @error('site-name') is-danger @enderror" id="bdeadline_date"name="site-name" value=" {{$order->timezone}}" autocomplete="off" readonly>
												@error('site-name')
													<p class="text-danger">{{ $errors->first('site-name') }}</p>
												@enderror
											</div> 
										</div> 
									</div>
								


								</div>
                                <h4 style="text-align:center;font-weight:bold;" > Files & Status </h4>
                                <hr>
                                <div class="row">
									<div class="col-lg-6 col-md-6 col-sm-12">									
										<div class="input-box">								
											<h6 style="text-align:center" style="text-align:center">My File</h6>
											<div class="form-group">
												<div style="width:20%!important;margin: auto;">
                                            <span><?php $files = Illuminate\Support\Facades\DB::table('attachments')->where('order_id', $order->id)
                              ->where('uploader_id', $order->customer_id)->get(); ?>
                              @foreach($files as $file)
                              <a class="flloat-rightt text-light" href="{{$file->file_path}}" style=" color: #5d5a5a!important;" download class="text-primary"><i class="fa fa-download"></i> {{$file->file}}</a> <br>
                              @endforeach
													</span></div>
											</div> 
										</div> 
									</div>	
									
									<div class="col-lg-6 col-md-6 col-sm-12">									
										<div class="input-box">								
											<h6 style="text-align:center">Status</h6>
											<div class="form-group">							    
                                            <?php $status = Illuminate\Support\Facades\DB::table('order_statuses')->where('id', $order->order_status_id)->first();  ?>
                              @if($status->id == 2 || $status->id == 3)
                              <p style="text-align:center" class="flloat-rightt">In Process</p>
                              @else
                              <p style="text-align:center"  class="flloat-rightt">{{$status->name}}</p>
                              @endif	@error('site-website')
													<p class="text-danger">{{ $errors->first('site-website') }}</p>
												@enderror
											</div> 
										</div> 
									</div>
                           
									</div>
								


							
                               
                                <div class="row">
									<div class="col-lg-12 col-md-12 col-sm-12">
    <div class="input-box" style="text-align:center;">
        <h4 style="font-weight: bold;">Instructions</h4>
        <div class="form-group">
            <textarea id="binstruction" name="w3review" rows="2" cols="50" readonly style="background-color: #f2f2f2;width:80%">{{$order->instruction}}
            </textarea>
            @error('site-name')
            <p class="text-danger">{{ $errors->first('site-name') }}</p>
            @enderror
        </div>
    </div>
</div>

									
                  </div>	
                  </div>      
  <div class="col-lg-4 col-sm-4 col-md-4">
    <div class="card border-0" style="background-color: #ffffff">
      <div class="card-body pt-2">
      <form id="paypal-form">
                    <div class="row" style="width: 100%;">
					
                      <div id="paypal-button-container"></div>
						
                    </div>
                  </form>
      </div>
    </div>
  </div>

</div>
<form id="payment-form" method="POST" action="{{ route('paypal_checkout_process') }}">
    @csrf
    <input id="order_id" name="order_id" type="hidden" />
	<input type="hidden" name="dnt" class="dnt">
  </form>



<div id="publishable_key" data-publishablekey="{{ env('STRIPE_KEY')}}"></div>
  <div id="process_url" data-processurl="{{ route('stripe_process') }}"></div>
	</div>

@endsection
@section('js')
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

<script src="https://js.stripe.com/v3/"></script>
<script>

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
        var form = document.getElementById('stripe-form');
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

<script>

   const now = new Date();
   const year = now.getFullYear();
   const month = String(now.getMonth() + 1).padStart(2, '0');
   const day = String(now.getDate()).padStart(2, '0');
   const hours = String(now.getHours()).padStart(2, '0');
   const minutes = String(now.getMinutes()).padStart(2, '0');
   const seconds = String(now.getSeconds()).padStart(2, '0');
   
   const formattedDateTime = `${year}-${month}-${day} ${hours}:${minutes}:${seconds}`;
   $('.dnt').val(formattedDateTime);
	
var o = "{{session('total_amount')}}";

</script>
<script src="https://www.paypal.com/sdk/js?currency={{currency()}}&client-id={{ env('PAYPAL_CLIENT_ID') }}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script>

  document.addEventListener("DOMContentLoaded", function(event) {

    if (window.hasOwnProperty("paypal")) {
      paypal.Buttons({

        createOrder: function(data, actions) {
          return axios.post("{{ route('paypal_checkout_generate_token') }}")
            .then(function(response) {
              if (response.data.status == 'success') {

                return actions.order.create({
                  purchase_units: [{
                    description: 'GnG Order',
                    amount: {
                      value: o
                    },

                  }],
                  application_context: {
                    shipping_preference: 'NO_SHIPPING',

                  }

                });
              }
              return null;
            });
        },
        onApprove: function(data, actions) {
          if (data.orderID) {

            $('#paypal-button-container').hide();
            $('#loading').show();
            fundingSource: paypal.FUNDING.PAYPAL;
            var form = document.querySelector('#payment-form');
            document.querySelector('#order_id').value = data.orderID;
			var dnt = document.querySelector('.dnt').value;
            form.submit();

          }

        },
        onDisplay: function() {
          $("#loading").hide();
        },
        onError: function(err) {
          $('#paypal-button-container').show();
          $('#loading').hide();
          showError("Something went wrong, please try again later, or use a different payment method");
        }
      }).render('#paypal-button-container');

    } else {

      showError("Something went wrong, please try again later, or use a different payment method");
      $('#loading').hide();
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


@endsection