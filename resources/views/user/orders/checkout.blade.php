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

	
	
.customloader {
  width: 80px;
  height: 50px;
  position: relative;
}

	.body-loader{
  display:flex;
  justify-content:center;
  align-items:center;
  height:100vh;
  background:#212121;
	}	

.loader-text {
  position: absolute;
  top: 0;
  padding: 0;
  margin: 0;
  color: #52A81B;
  animation: text_713 3.5s ease both infinite;
  font-size: .8rem;
  letter-spacing: 1px;
}

.load {
  background-color: #52A81B;
  border-radius: 50px;
  display: block;
  height: 16px;
  width: 16px;
  bottom: 0;
  position: absolute;
  transform: translateX(64px);
  animation: loading_713 3.5s ease both infinite;
}

.load::before {
  position: absolute;
  content: "";
  width: 100%;
  height: 100%;
  background-color: #ffffff;
  border-radius: inherit;
  animation: loading2_713 3.5s ease both infinite;
}

@keyframes text_713 {
  0% {
    letter-spacing: 1px;
    transform: translateX(0px);
  }

  40% {
    letter-spacing: 2px;
    transform: translateX(26px);
  }

  80% {
    letter-spacing: 1px;
    transform: translateX(32px);
  }

  90% {
    letter-spacing: 2px;
    transform: translateX(0px);
  }

  100% {
    letter-spacing: 1px;
    transform: translateX(0px);
  }
}

@keyframes loading_713 {
  0% {
    width: 16px;
    transform: translateX(0px);
  }

  40% {
    width: 100%;
    transform: translateX(0px);
  }

  80% {
    width: 16px;
    transform: translateX(64px);
  }

  90% {
    width: 100%;
    transform: translateX(0px);
  }

  100% {
    width: 16px;
    transform: translateX(0px);
  }
}

@keyframes loading2_713 {
  0% {
    transform: translateX(0px);
    width: 16px;
  }

  40% {
    transform: translateX(0%);
    width: 80%;
  }

  80% {
    width: 100%;
    transform: translateX(0px);
  }

  90% {
    width: 80%;
    transform: translateX(15px);
  }

  100% {
    transform: translateX(0px);
    width: 16px;
  }
}
 
 	
	

</style>

@endsection
@section('content')
<div class="completeOrder">

            <p>Complete The Payment Process!</p>

            <div class="completedOrderContents">

            <div class="orderCompCard">
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
                            <li>
								{{$order->number}}
								<?php 
								session(['OID' => $order->id]);
								?>
							</li>
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
											<i class="fa fa-download"></i> {{ substr($file->file, 0, 10) }}
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

            <div class="paymentOption" style="background-color: #ffffff">
                <form id="paypal-form">
                    <div class="row" style="width: 100%;">
					
                      <div id="paypal-button-container"></div>
						
                    </div>
                  </form>
            </div>

        </div>

        </div>

	 <div class="customloader">
		<span class="loader-text">loading</span>
		  <span class="load"></span>
	  </div>

<form id="payment-form" method="POST" action="{{ route('paypal_checkout_process') }}">
    @csrf
    <input id="order_id" name="order_id" type="hidden" />
	<input type="hidden" name="dnt" class="dnt">
  </form>

<div id="publishable_key" data-publishablekey="{{ env('STRIPE_KEY')}}"></div>
  <div id="process_url" data-processurl="{{ route('stripe_process') }}"></div>
	

@endsection
@section('js')
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

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="https://www.paypal.com/sdk/js?currency={{currency()}}&client-id={{ env('PAYPAL_CLIENT_ID') }}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script>
	
	// A $( document ).ready() block.
$(document).ready(function() {
    $('.customloader').hide();
});

document.addEventListener("DOMContentLoaded", function(event) {

    if (window.hasOwnProperty("paypal")) {
      paypal.Buttons({

        createOrder: function(data, actions) {
          return axios.post("{{ route('paypal_checkout_generate_token') }}")
            .then(function(response) {
			  console.log(response);
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
			$('.completeOrder').hide();
			$('body').addClass('body-loader');  
			$('.customloader').show();
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