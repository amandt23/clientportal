@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>

<style>
	#deadline-time {
      appearance: none;
      -webkit-appearance: none;
      -moz-appearance: none;
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 4px;
    }
body {
overflow: hidden;
}
	.ex1{
		overflow-y: auto !important; 
	}

</style>
@endsection

@section('content')

  <!-- place order section  -->
         <div class="place-order">
            <div class="placeOrderNav">
                <div class="topNav">
                <h1>Place Your Order</h1>
                <button id="nav_toggle">
                <i class="fa-solid fa-bars"></i>
                </button>
                </div>
                <ul>
                    <li>
						<p><b>Calculate Price</b></p>
                        <i id="checkIcon" style="color: gray;" class="fa-solid fa-circle-check"></i>
                    </li>
                    <li>
                        <p><b>Order Details</b></p>
                        <i id="checkIcon2" style="color: gray;" class="fa-solid fa-circle-check"></i>

                    </li>
                    <li>
						<p><b>Review Order Details</b></p>
                        <i id="checkIcon3" style="color: gray;" class="fa-solid fa-circle-check"></i>

                    </li>
                </ul>
            </div>

		<form id="submit-order" method="post" enctype="multipart/form-data">
			@csrf
            <div id="calculateCards" class="placeOrderCards placeOrderCards-dsktp">
                <div class="cardlefr">
					
						<input type="hidden" id="fo" value="1">
						<input type="hidden" id="fo" value="1">
                           <input type="hidden" class="datetimee" name="datetimee">
						<div class="form_control">
                        <select id="selectService" name="service_id" class="selectDropdown" required>
							<option value="" selected>Select Service</option>
							@foreach($services as $service)
								<option value="{{ $service->id }}">{{ $service->name }}</option>
							@endforeach
						</select>
                        <span class="error_message service_error">Please select a service type.</span>
                        </div>

                        <div class="form_control">
						<select id="selectAcademicLevel" name="work_level_id" class="selectDropdown" required >
							<option value=""  selected>Select Academic Level</option>
							@foreach($work_levels as $wl)
								<option value="{{ $wl->id }}">{{ $wl->name }}</option>
							@endforeach
						</select>
                        <span class="error_message ac_level_error">Please select your academic level.</span>
                        </div>


                    <div class="calulation">
                        <div class="calculate-left">
                            <svg id="dec" xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 26 26"
                                fill="none">
                                <path
                                    d="M21.6667 0H4.33333C3.18406 0 2.08186 0.456546 1.2692 1.2692C0.456546 2.08186 0 3.18406 0 4.33333V21.6667C0 22.8159 0.456546 23.9181 1.2692 24.7308C2.08186 25.5435 3.18406 26 4.33333 26H21.6667C22.8159 26 23.9181 25.5435 24.7308 24.7308C25.5435 23.9181 26 22.8159 26 21.6667V4.33333C26 3.18406 25.5435 2.08186 24.7308 1.2692C23.9181 0.456546 22.8159 0 21.6667 0ZM23.1111 21.6667C23.1111 22.0498 22.9589 22.4172 22.688 22.688C22.4172 22.9589 22.0498 23.1111 21.6667 23.1111H4.33333C3.95024 23.1111 3.58284 22.9589 3.31196 22.688C3.04107 22.4172 2.88889 22.0498 2.88889 21.6667V4.33333C2.88889 3.95024 3.04107 3.58284 3.31196 3.31196C3.58284 3.04107 3.95024 2.88889 4.33333 2.88889H21.6667C22.0498 2.88889 22.4172 3.04107 22.688 3.31196C22.9589 3.58284 23.1111 3.95024 23.1111 4.33333V21.6667Z"
                                    fill="#52A81B" />
                                <path
                                    d="M17.3338 11.5555H8.6671C8.28401 11.5555 7.91661 11.7077 7.64572 11.9786C7.37484 12.2495 7.22266 12.6169 7.22266 13C7.22266 13.3831 7.37484 13.7505 7.64572 14.0214C7.91661 14.2922 8.28401 14.4444 8.6671 14.4444H17.3338C17.7169 14.4444 18.0843 14.2922 18.3551 14.0214C18.626 13.7505 18.7782 13.3831 18.7782 13C18.7782 12.6169 18.626 12.2495 18.3551 11.9786C18.0843 11.7077 17.7169 11.5555 17.3338 11.5555Z"
                                    fill="#52A81B" />
                            </svg>
							<input type="hidden" id="pp" value="{{format_amount(6.99)['amount']}}">
							<input type="hidden" id="today" name="today">
                            <input type="text" name="qty" id="counterInput" min="1"  value="1" required>
                            <svg id="inc" xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 26 26"
                                fill="none">
                                <path
                                    d="M20.4286 12.0714V13.9286C20.4286 14.3116 20.1152 14.625 19.7321 14.625H14.625V19.7321C14.625 20.1152 14.3116 20.4286 13.9286 20.4286H12.0714C11.6884 20.4286 11.375 20.1152 11.375 19.7321V14.625H6.26786C5.88482 14.625 5.57143 14.3116 5.57143 13.9286V12.0714C5.57143 11.6884 5.88482 11.375 6.26786 11.375H11.375V6.26786C11.375 5.88482 11.6884 5.57143 12.0714 5.57143H13.9286C14.3116 5.57143 14.625 5.88482 14.625 6.26786V11.375H19.7321C20.1152 11.375 20.4286 11.6884 20.4286 12.0714ZM26 2.78571V23.2143C26 24.7522 24.7522 26 23.2143 26H2.78571C1.24777 26 0 24.7522 0 23.2143V2.78571C0 1.24777 1.24777 0 2.78571 0H23.2143C24.7522 0 26 1.24777 26 2.78571ZM23.2143 22.8661V3.13393C23.2143 2.94241 23.0576 2.78571 22.8661 2.78571H3.13393C2.94241 2.78571 2.78571 2.94241 2.78571 3.13393V22.8661C2.78571 23.0576 2.94241 23.2143 3.13393 23.2143H22.8661C23.0576 23.2143 23.2143 23.0576 23.2143 22.8661Z"
                                    fill="#52A81B" />
                            </svg>
                        </div>

                        <div class="calenderMain">

                            <div class="calender-mid">
                                <!--<input type="date" id="datepicker" value="2023-01-01">-->
								<input type="date" id="deadline-date" name="deadline_date" class="form-control" value="{{ date('Y-m-d') }}" min="{{ date('Y-m-d') }}" required>
                            </div>
                            <div class="calender-right">
                                <i class="fa fa-clock-o"></i>
                            <select name="deadline_time" id="deadline-time" class="form-control" required>
                            
                                @php
                                    $currentHour = date('H');
                                    $currentMinute = (int) date('i');
                                    $currentMinute = $currentMinute - ($currentMinute % 15); // Round down to the nearest 15 minutes
                                @endphp
                                @for ($hour = 0; $hour < 24; $hour++)
                                    @for ($minute = 0; $minute < 60; $minute += 15)
                                        @php
                                            $optionValue = sprintf('%02d:%02d', $hour, $minute);
                                            $disabled = ($hour < $currentHour || ($hour === $currentHour && $minute < $currentMinute)) ? 'disabled' : '';
                                            $selected = ($hour === $currentHour && $minute === $currentMinute) ? 'selected' : '';
                                            $clockIcon = ($hour === 0 && $minute === 0) ? '<i class="fa fa-clock-o"></i>' : '';
                                        @endphp
                                        <option value="{{ $optionValue }}" {{ $disabled }} {{ $selected }}>
                                            @if ($clockIcon && $hour === 0 && $minute === 0)
                                                {!! $clockIcon !!}
                                            @endif
                                            {{ $optionValue }}
                                        </option>
                                    @endfor
                                @endfor
                            </select>
                        </div>
                            

                        </div>

                    </div>

                    <div class="card-info">
                        <p>Your order will be delivered within
                        <span id="delivery-days"> </span>
                        <span id="delivery-hours"> </span> </p>
                    </div>
                    <div class="nextBtn">
                        <button id="nextBTN">Next</button>
                    </div>
                </div>

                <div class="cardRight">
                    <div class="cardRightTop">
                        <hr>
                        <p>Order Summary</p>
                        <hr>
                    </div>

                    <div class="cardRightMid">
                         <div class="cardRightMidContent">
                            <div class="onerightCardContent">
                                <p>Order ID</p>
                                <p id="mpw_order_id"></p>
                            </div>
                            <div class="onerightCardContent">
                                <p>Service Type</p>
                                <p id="mpw_service_type"></p>
                            </div>
                            <div class="onerightCardContent">
                                <p>No Of Page</p>
                                <p id="mpw_no_page">1</p>
                            </div>
							 <div class="onerightCardContent">
                                <p>Academic Level</p>
                                <p id="mpw_academic_level"></p>
                            </div>
							<div class="onerightCardContent">
                                <p>Deadline</p>
                                <p id="mpw_deadline"></p>
                            </div>
							 <div class="onerightCardContent" style="flex-direction: row-reverse; display: flex;">
								<p id="mpw_time"></p>
                            </div>
							 <div class="onerightCardContent">
                                <p>Citation</p>
                                <p id="mpw_citation"></p>
                            </div>
                         
                        </div>
                       
                    </div>

                    <div class="cardRightBottom">
                        <hr>
                        <div class="cardRightBotFot">
                            <p>Subtotal</p>
                            <p id="sub_total">0.00</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- order detail page  -->
            <div id="orderDetail" class="orderDetails">
                <div class="cardlefr cardleftDraft ex1">
                    <div class="cardleftInner">
                    <p class="order_detail_text">Order Details</p>

                        <div class="form_control">
                        <input class="draftInput" id="f-title" type="text" name="title" placeholder="Title Of Document" required>
                        <span class="error_message document_title_error">Please enter a title.</span>
                        </div>
                        <div class="form_control">
                        <select id="f-course" class="selectDropdown" name="course" required>
                            <option value="" selected>Select Your Course Name</option>
                                @foreach($subjects as $subject)
                                <option value="{{$subject->name}}">{{$subject->name}}</option>
                                @endforeach
                        </select>
                        <span class="error_message course_error">Please select a course.</span>
                        </div>

                        <div class="form_control">
                        <select id="f-formatting" class="selectDropdown" name="formatting2" required>
                            <option value="" selected>Select Your Citation Style</option>
                                @foreach($citations as $citation)
                                <option value="{{$citation->name}}">{{$citation->name}}</option>
                                @endforeach
                        </select>
                        <span class="error_message citation_style_error">Please select a citation style.</span>    
                        </div>

                        <div class="form_control">
                        <input class="draftInput" id="f-sources" type="text" name="sources" placeholder="Number Of Sources">
                        <span class="error_message no_of_source_error">Please enter number of sources.</span>
                        </div>

                        <div class="form_control">
                        <select id="selectDropdown" class="selectDropdown" name="timezones2">
                            <option value="" disabled selected>Pacific Time</option>
                            <option value="Pacific Time">Pacific Time</option>
                                <option value="Mounain Time">Mounain Time</option>
                                <option value="Central Time">Central Time</option>
                                <option value="Eastern Time">Eastern Time</option>
                                <option value="British Summer Time">British Summer Time</option>
                                <option value="Other">Other</option>
                        </select>
                        <span class="error_message timezone_error">Please select your timezone</span>
                        </div>
                        <textarea id="f-specifications" name="specifications"
                            placeholder="Describe Your Task In Detail Or Attach File With Teacher Instruction" rows="4"
                            cols="50"></textarea>

                        <div class="form_control">
                        <input type="file" name="file[]" id="fileInput" multiple>
                        <span class="error_message files_upload_error"></span>
                        </div>
                        <div class="draftCardBottom">
                                <?php $i = 1; $o = 1; ?>
                                @foreach($packages as $package)
                            
                            <input type="hidden" class="planType" name="planType" value="normal">
                            <div class="draftCard plan{{$i++}}">
                                <h1>{{$package->name}}</h1>
                                <p>{{$package->description}}</p>
                                @if($package->cost == 0)
                                <h2>No extra cost</h2>
                                @else
                                <h2><span id="premium-amount"><i class="fa {{format_amount(1)['icon']}}" style="line-height: 1.5!important;"></i>{{format_amount($package->cost)['amount']}}</span></h2>
                                @endif
                                <button class="select{{$o++}}" type="button">
                                Select
                                </button>
                            </div>
                            
                            @endforeach
                            
                        <!-- <div class="draftCard">
                                <h1>Premium Expert</h1>
                                <p>A highly demanded expert in your field with 6 years of expertise and a 95+ satisfaction rate.</p>
                                <h2 style="font-weight: 600;">£10.00</h2>
                                <button type="button" onclick="selectpkg()">Select</button>
                            </div> -->

                        </div>



                        <div class="nextBtn nextPrevious">
                            <button id="previousBTN" type="button">Previous</button>
                            <!--<button type="submit" class="place-order-btn" id="placeOrderBtn">Place Order</button>-->
                            <button type="button" id="orderDetailNextBtn">Next</button>
                        </div>
                    </div>
                </div>

                <div class="cardRight">
                    <div class="cardRightTop">
                        <hr>
                        <p>Order Summary</p>
                        <hr>
                    </div>

                    <div class="cardRightMid">
                         <div class="cardRightMidContent">
                            <div class="onerightCardContent">
                                <p>Order ID</p>
                                <p id="mpw_order_id_2"></p>
                            </div>
                            <div class="onerightCardContent">
                                <p>Service Type</p>
                                <p id="mpw_service_type_2"></p>
                            </div>
                            <div class="onerightCardContent">
                                <p>No Of Page</p>
                                <p id="mpw_no_page_2">1</p>
                            </div>
							 <div class="onerightCardContent">
                                <p>Academic Level</p>
                                <p id="mpw_academic_level_2"></p>
                            </div>
							<div class="onerightCardContent">
                                <p>Deadline</p>
                                <p id="mpw_deadline_2"></p>

                            </div>
							 <div class="onerightCardContent" style="flex-direction: row-reverse; display: flex;">

								<p id="mpw_time_2"></p>
                            </div>
							 <div class="onerightCardContent">
                                <p>Citation</p>
                                <p id="mpw_citation_2"></p>
                            </div>
                         
                        </div>
                       
                    </div>

                    <div class="cardRightBottom">
                        <hr>
                        <div class="cardRightBotFot">
                            <p>Subtotal</p>
                            <p id="sub_total_2">0.00</p>

                        </div>
                        <hr>
                    </div>


                </div>
            </div>

			

            <div id="reviewOrderSection" class="reviewOrderSection">

                <div id="reviewOrder" class="reviewOrder">
                    <div class="reviewOrderTop">
                        <p>{{ Auth::user()->email }}</p>
                        <p><span>Date:</span> <?php echo date('m/d/Y'); ?></p>
                    </div>
                    <div class="reviewOrderTitle">
                        <p>Review Order Details</p>
                    </div>

                    <div class="reviewOrderMidDec">
					

						
						<table class="reviewOrderTable1">
						  <tr>
							<td >Title</td>
                            <td></td>
							<td id="review-title">Your Title</td>
						  </tr>
						  <tr>
							<td>Course</td>
                            <td></td>
							<td id="review-course">Your Course</td>
						  </tr>
						  <tr>
							<td>Sources</td>
                            <td></td>
							<td id="review-source">Your Source</td>
						  </tr>
						  <tr>
							<td>Writer’s Available</td>
                            <td></td>
							<td>Best Available</td>
						  </tr>
						</table>
						
						<div class="reviewOrderTitle">
                        <p>Files</p>
						</div>
				
						
						<table class="reviewOrderTable">
							<tr></tr>
					
						</table>
						
						
						
                    </div>

                    <div class="instructions">
                        <p>INSTRUCTIONS</p>
                        <textarea name="text" id="review-instructions" cols="30" rows="2" readonly></textarea>
                    </div>

                    <div class="footerBTNs">
                        <button id="previousBTN2">PREVIOUS</button>
                        <!--<button id="checkOutBTN">CHECKOUT</button>-->
                    </div>

                </div>

                <div class="cardRight">
                    <div class="cardRightTop">
                        <hr>
                        <p>Order Summary</p>
                        <hr>
                    </div>

                     <div class="cardRightMid">
                         <div class="cardRightMidContent">
                            <div class="onerightCardContent">
                                <p>Order ID</p>
                                <p id="mpw_order_id_3"></p>
                            </div>
                            <div class="onerightCardContent">
                                <p>Service Type</p>
                                <p id="mpw_service_type_3"></p>
                            </div>
                            <div class="onerightCardContent">
                                <p>No Of Page</p>
                                <p id="mpw_no_page_3">1</p>
                            </div>
							 <div class="onerightCardContent">
                                <p>Academic Level</p>
                                <p id="mpw_academic_level_3"></p>
                            </div>
							<div class="onerightCardContent">
                                <p>Deadline</p>
                                <p id="mpw_deadline_3"></p>

                            </div>
							 
							  <p id="discount" style="display:none" class="fs-12 p-family">Discount Applied: <span class="checkout-cost"><i class="fa {{format_amount(1)['icon']}}"></i><span id="discount_amount">0</span></span></p>
							 
							 <div class="onerightCardContent" style="flex-direction: row-reverse; display: flex;">

								<p id="mpw_time_3"></p>
                            </div>
							 <div class="onerightCardContent">
                                <p>Citation</p>
                                <p id="mpw_citation_3"></p>
                            </div>
                         
                        </div>
                       
                    </div>
                    <div class="cardRightBottom">
                        <hr>
                        <div class="cardRightBotFot">
                            <p>Subtotal</p>
                            <p id="sub_total_3">0.00</p>

                        </div>
                        <hr>
                    </div>

                    <div class="apply">
                        <div id="search" class="search">
                            <input type="text" name="promo_code" id="promo_code" placeholder='Enter Promo Code' />
							<span id="promocode-error" class=""></span>
                        </div>
                        <button id="apply-promo">APPLY</button>
                    </div>
					
					<span id="promocode-error" class="d-none fs-12 text-danger"></span>
					
					<div id="voucher-result" class="d-none">
                        <p class="fs-12 p-family" style="color:white!important">{{ __('Discount Applied') }} <span class="checkout-cost"> <i class="fa {{format_amount(1)['icon']}}"></i> <span id="total_discount" style="color: black !important;"></span></span></p>
                     </div>

                    <div id="totalPay" class="cardRightBotFot">
                        <p>Total Payment</p>
                        <p id="totpay">£6.99</p>
                    </div>

                  
					<div class="checkoutBTN">
						<button id="checkoutBTN" type="submit"><span id="placeorderspan">PLACE ORDER</span> <span id="checkoutspan">(CHECKOUT)</span></button>
                    </div>
                    

                    


                </div>
            </div>

			 </form>

        </div>
@endsection
@section('js')
<!-- script  -->

        <script>
			var amount = "";
		  // showing files names 
            // Add an event listener to the file input using jQuery
            $(document).ready(function() {
      $('#fileInput').on('change', function() {
        var files = $(this).prop('files');

        if (files.length > 0) {
          var fileNames = [];

          $.each(files, function(index, file) {
            fileNames.push(file.name);
          });

          //$('#fileNames').text('Selected Files: ' + fileNames.join(', '));
        } else {
          $('#fileNames').text('No files selected');
        }
      });
				

				
				
   
   const now = new Date();
   const year = now.getFullYear();
   const month = String(now.getMonth() + 1).padStart(2, '0');
   const day = String(now.getDate()).padStart(2, '0');
   const hours = String(now.getHours()).padStart(2, '0');
   const minutes = String(now.getMinutes()).padStart(2, '0');
   const seconds = String(now.getSeconds()).padStart(2, '0');
				
	const formattedDateTime = `${year}-${month}-${day} ${hours}:${minutes}:${seconds}`;
   $('.datetimee').val(formattedDateTime);
				
	$('.select1').css("background", "#33720b");
				
    });


            $(document).ready(function () {
                $('#fileInput').on('change', function () {
                    var files = $(this).prop('files');
                    var maxFiles = 5;

                    // Check if the number of files exceeds the limit
                    if (files.length > maxFiles) {
                        $(".files_upload_error").show().text(`Please select up to ${maxFiles} files.`)
                        // Clear the file input
                        $(this).val('');
                        return;
                    }

                    $('#fileNames').text('Selected Files: ');

                    $.each(files, function (index, file) {
						let _file = file.name;
						var file_name = _file.substring(0, 10);
						addTDToTable(file_name);
						
                    });
                });
				
				
            });
			
			function addTDToTable(value) {
		  var table = $('.reviewOrderTable');
		  var lastRow = table.find('tr:last');

		  // Check if the last row has reached the maximum number of cells (3 in this case)
		  if (lastRow.find('td').length >= 3) {
			// If yes, create a new row
			lastRow = $('<tr>').appendTo(table);
		  }

		  // Append the new TD to the last row
		  $('<td>', {
			class: 'fileDetail',
			text: value
		  }).appendTo(lastRow);
		}


            $(document).ready(function () {
                $('#nextBTN').click(function () {
                    $('#checkIcon').css('color', 'green');

                });
				

				
                $('#orderDetailNextBtn').click(function (e) {
					e.preventDefault();
                    $('#checkIcon2').css('color', 'green');
					let title = $('#f-title').val();
					let course = $('#f-course').val();
					let citation = $('#f-formatting').val();
					let sources = $('#f-sources').val();
					let timezone = $('#selectDropdown').val();
					let instructions = $('#f-specifications').val();
					
					
					if(title!=""){
						$('#review-title').empty();
						$('#review-title').append("<span>"+title+"</span>");
					}
					if(course!=""){
						$('#review-course').empty();
						$('#review-course').append("<span>"+course+"</span>");
					}
					if(sources!=""){
						$('#review-source').empty();
						$('#review-source').append("<span>"+sources+"</span>");
					}
					if(instructions!=""){
						$('#review-instructions').val('');
						$("#review-instructions").val(instructions);
					}
					
					if(title==""){
                        $(".document_title_error").show();
                        $(".cardleftDraft").scrollTop(0);
					}
					
					if(course==""){
                        $(".course_error").show();
                        $(".cardleftDraft").scrollTop(0);
					}
					
					if(citation==""){
                        $(".citation_style_error").show();
                        $(".cardleftDraft").scrollTop(0);
					}
					
					if(timezone==""){
                        $(".timezone_error").show();
						alert('please select timezone');
                        $(".cardleftDraft").scrollTop(0);
					}
					
					if(title!=""&&course!=""&&citation!=""&&timezone!=""){
						$("#orderDetail").hide();
                    $("#calculateCards").hide();
                    $("#reviewOrderSection").show();
					}
						
					

                });
                $('#checkOutBTN').click(function () {
                    $('#checkIcon3').css('color', 'green');

                });

            });

            // place order page
            $(document).ready(function () {
                $("#orderDetail").hide();
                $("#reviewOrderSection").hide();
				//$('#orderDetailNextBtn').hide();

                // Show component on button click
                $("#nextBTN").click(function (e) {
					e.preventDefault();
                    
                    
					
					let service = $('#selectService').val();
					let academic = $('#selectAcademicLevel').val();
					
					if(service==""){
						$(".service_error").show();
					}
					
					if(academic==""){
						$(".ac_level_error").show();
					}
					
					if(service!=""&&academic!=""){
						$("#calculateCards").hide();
						$("#orderDetail").show();
					}
					
                });

                // Hide component on button click
                $("#previousBTN").click(function (e) {
					 e.preventDefault();
                    $("#calculateCards").show();
                    $("#orderDetail").hide();

                });

                $("#previousBTN2").click(function (e) {
					 e.preventDefault();
                    $("#calculateCards").hide();
                    $("#orderDetail").show();
                    $("#reviewOrderSection").hide();

                });
	
				get_last_orderID();
				
            });


		function get_last_orderID(){
				$('#mpw_order_id').empty();
				$('#mpw_order_id_2').empty();
				$('#mpw_order_id_3').empty();
				$.ajax({
				   url: "{{ route('user.get_last_orderID') }}",
				   type: "GET",
				   processData: false,
				   contentType: false,
				   success: function(response) {
					$('#mpw_order_id').append("<span>MPW-"+response+"</span>");
					$('#mpw_order_id_2').append("<span>MPW-"+response+"</span>");
					$('#mpw_order_id_3').append("<span>MPW-"+response+"</span>");
				   },
				});
			}
			
			$("#selectService").change(function(){
			  let service = $(this).find("option:selected").text();
			  $('#mpw_service_type').empty();
			  $('#mpw_service_type').append("<span>"+service+"</span>");
				
				$('#mpw_service_type_2').empty();
			  $('#mpw_service_type_2').append("<span>"+service+"</span>");
				
				$('#mpw_service_type_3').empty();
			  $('#mpw_service_type_3').append("<span>"+service+"</span>");
			});
			
			$("#f-formatting").change(function(){
			  let citation = $(this).find("option:selected").text();
			  $('#mpw_citation').empty();
			  $('#mpw_citation').append("<span>"+citation+"</span>");
				
				$('#mpw_citation_2').empty();
			  $('#mpw_citation_2').append("<span>"+citation+"</span>");
				
				$('#mpw_citation_3').empty();
			  $('#mpw_citation_3').append("<span>"+citation+"</span>");
			});
			
			$("#selectAcademicLevel").change(function(){
			  let academic = $(this).find("option:selected").text();
			  $('#mpw_academic_level').empty();
			  $('#mpw_academic_level').append("<span>"+academic+"</span>");
				
				$('#mpw_academic_level_2').empty();
			  $('#mpw_academic_level_2').append("<span>"+academic+"</span>");
				
				$('#mpw_academic_level_3').empty();
			  $('#mpw_academic_level_3').append("<span>"+academic+"</span>");
			});
			
			var fo = $('#fo').val();
			var sign = "";
			var pp = $('#pp').val();
				if(pp=="6.99"){
					sign = "£";
					
					$('#sub_total').empty()
					$('#sub_total').append(sign+""+pp)
				   
				   	$('#sub_total_2').empty()
					$('#sub_total_2').append(sign+""+pp)
				   
				   	$('#sub_total_3').empty()
					$('#sub_total_3').append(sign+""+pp)
					
					$('#totpay').empty();
					$('#totpay').append(sign+""+pp)
					
				}
				else{
					sign="$";
					
					$('#sub_total').empty()
					$('#sub_total').append(sign+""+pp)
				   
				   	$('#sub_total_2').empty()
					$('#sub_total_2').append(sign+""+pp)
				   
				   	$('#sub_total_3').empty()
					$('#sub_total_3').append(sign+""+pp)
					
					$('#totpay').empty();
					$('#totpay').append(sign+""+pp)
				}
			
			$('#counterInput').on('input',function(e){
				
			var quantity = $('#counterInput').val();
				if(quantity!=""){
					amount = pp * parseInt(quantity);
			   amount = parseFloat(amount).toFixed(2)
				
				$('#sub_total').empty()
			   $('#sub_total').append(sign+""+amount)
				   
			   $('#sub_total_2').empty()
			   $('#sub_total_2').append(sign+""+amount)

			   $('#sub_total_3').empty()
			   $('#sub_total_3').append(sign+""+amount)
					
			   $('#totpay').empty();
			   $('#totpay').append(sign+""+amount)
				}
				
		  });
			
			$('#inc').click(function() {
				var quantity = $('#counterInput').val();
				quantity++;
				$('#counterInput').val(quantity);
				$('#mpw_no_page').empty();
				$('#mpw_no_page').append('<span>'+quantity+'</span>');
				
				$('#mpw_no_page_2').empty();
				$('#mpw_no_page_2').append('<span>'+quantity+'</span>');
				
				$('#mpw_no_page_3').empty();
				$('#mpw_no_page_3').append('<span>'+quantity+'</span>');
				
				
		 		parseInt(fo)
			   if(fo == 0) {
			   //alert(5)
			   var q = $('#counterInput').val();
			   if(q >= 4) {
			   n++;
						 amount = pp * (n);
			   $('#qty').text(quantity)
			   amount = parseFloat(amount).toFixed(2)
				   		$('#sub_total').empty()
						$('#sub_total').append(sign+""+amount)
				   
				   		$('#sub_total_2').empty()
						$('#sub_total_2').append(sign+""+amount)
				   
				   		$('#sub_total_3').empty()
						$('#sub_total_3').append(sign+""+amount)
				   
				   		$('#totpay').empty();
						$('#totpay').append(sign+""+amount)

			   }
			   } else {
			    amount = pp * parseInt(quantity);
			   amount = parseFloat(amount).toFixed(2)
			   $('#qty').text(quantity)
			   $('#sub_total').empty()
			   $('#sub_total').append(sign+""+amount)
				   
			   $('#sub_total_2').empty()
			   $('#sub_total_2').append(sign+""+amount)

			   $('#sub_total_3').empty()
			   $('#sub_total_3').append(sign+""+amount)
				   
			   $('#totpay').empty();
			   $('#totpay').append(sign+""+amount)
				   
			   }
     	});
			
			$('#dec').click(function() {
       var quantity = $('#counterInput').val();
       quantity--;
       if (quantity >= 1) {
		   $('#counterInput').val(quantity);
		   $('#mpw_no_page').empty();
		   $('#mpw_no_page').append('<span>'+quantity+'</span>');

		   $('#mpw_no_page_2').empty();
		   $('#mpw_no_page_2').append('<span>'+quantity+'</span>');

		   $('#mpw_no_page_3').empty();
		   $('#mpw_no_page_3').append('<span>'+quantity+'</span>');
           var pp = $('#pp').val();
		   if(fo == 0) {
		   if(quantity >= 4) {
		   n--;
					 amount = pp * (n);
		   $('#qty').text(quantity)
		   amount = parseFloat(amount).toFixed(2)
					$('#sub_total').empty()
					$('#sub_total').append(sign+""+amount)
			   
				   $('#sub_total_2').empty()
				   $('#sub_total_2').append(sign+""+amount)

				   $('#sub_total_3').empty()
				   $('#sub_total_3').append(sign+""+amount)
			   
			   	   $('#totpay').empty();
				   $('#totpay').append(sign+""+amount)
			   

		   }
		   else {
			   $('#sub_total').empty()
			   $('#sub_total').append(sign+""+0)
		   
		   	   $('#sub_total_2').empty()
			   $('#sub_total_2').append(sign+""+0)

			   $('#sub_total_3').empty()
			   $('#sub_total_3').append(sign+""+0)
			   
			   $('#totpay').empty();
			   $('#totpay').append(sign+""+0)
			   
		   n = 0;
		   }
		   }
		   else {
		    amount = pp * parseInt(quantity);
				 amount = parseFloat(amount).toFixed(2)
				 $('#qty').text(quantity)
				 $('#sub_total').empty()
				 $('#sub_total').append(sign+""+amount)
			   
			   	   $('#sub_total_2').empty()
				   $('#sub_total_2').append(sign+""+amount)

				   $('#sub_total_3').empty()
				   $('#sub_total_3').append(sign+""+amount)
			   
			   	   $('#totpay').empty();
				   $('#totpay').append(sign+""+amount)
		   }
     }

     });

    //  light 52A81B
    // dark 
			
			 $('.plan1').click(function() {
       var quantity = $('#counterInput').val();
       var pp = $('#pp').val();
        amount = pp * parseInt(quantity);
   
       amount = parseFloat(amount).toFixed(2)
       
	   $('#sub_total').empty()
	   $('#sub_total').append(sign+""+amount)

	   $('#sub_total_2').empty()
	   $('#sub_total_2').append(sign+""+amount)

	   $('#sub_total_3').empty()
	   $('#sub_total_3').append(sign+""+amount)
				 
	   $('#totpay').empty();
	   $('#totpay').append(sign+""+amount)
				 
       $('.planType').val('normal');
       $('.plan1').css("border", "1px solid #0b5ed7");
       $('.plan2').css("border", "1px solid white");
       $(".plan2").css("pointer-events", "");
       $(".plan1").css("pointer-events", "none");
   $('.select2').css("background", "rgb(82, 168, 27)");
   $('.select1').css("background-color", "rgb(51, 114, 11)");
   $('.select1').text("Selected");
   $('.select2').text("Select");
   
     });
     $('.plan2').click(function() {
       //var amo = $('#sub_total').text();
       var quantity = $('#counterInput').val();
       var p_amo = $('#premium-amount').text();
   
       var total = parseFloat(quantity) * parseFloat(p_amo);
   
       total = parseFloat(total).toFixed(2);
		 amount = total;
       
	   $('#sub_total').empty()
	   $('#sub_total').append(sign+""+total)

	   $('#sub_total_2').empty()
	   $('#sub_total_2').append(sign+""+total)

	   $('#sub_total_3').empty()
	   $('#sub_total_3').append(sign+""+total)
		 
	   $('#totpay').empty();
	   $('#totpay').append(sign+""+total)
		 
       $('.planType').val('premium');
       $('.plan2').css("border", "1px solid #0b5ed7");
       $('.plan1').css("border", "1px solid white");
       $(".plan2").css("pointer-events", "none");
       $(".plan1").css("pointer-events", "");

   $('.select2').css("background-color", "rgb(51, 114, 11)");
   $('.select2').text("Selected");
   $('.select1').text("Select");
   $('.select1').css("background-color","rgb(82, 168, 27)");
     });
			
		// Get current date
	   const currentDate = new Date().toISOString().split('T')[0];
	   const dateInput = document.getElementById('deadline-date');
	   dateInput.value = currentDate;

	   // Get current time
	   const currentTime = new Date();
	   const currentHour = currentTime.getHours();
	   const currentMinute = Math.floor(currentTime.getMinutes() / 15) * 15;

	   // Select the current time option and disable past times
	   const timeSelect = document.getElementById('deadline-time');
	   for (let hour = 0; hour < 24; hour++) {
		 for (let minute = 0; minute < 60; minute += 15) {
		   if (hour === currentHour && minute === currentMinute) {
			 const optionValue = `${hour.toString().padStart(2, '0')}:${minute.toString().padStart(2, '0')}`;
			 const option = document.createElement('option');
			 option.value = optionValue;
			 option.textContent = optionValue;
			 option.selected = true;
			 timeSelect.appendChild(option);
		   } else {
			 const currentTime = new Date();
			 const compareTime = new Date(currentTime.getFullYear(), currentTime.getMonth(), currentTime.getDate(), hour, minute);
			 if (compareTime >= currentTime) {
			   const optionValue = `${hour.toString().padStart(2, '0')}:${minute.toString().padStart(2, '0')}`;
			   const option = document.createElement('option');
			   option.value = optionValue;
			   option.textContent = optionValue;
			   if (compareTime < currentTime) {
				 option.disabled = true;
			   }
			   timeSelect.appendChild(option);
			 }
		   }
		 }
	   }
    
			
	 // Function to calculate and update delivery time message
   function updateDeliveryTime()
   {
     const selectedDate = new Date(dateInput.value);
     const selectedTime = timeSelect.value.split(':');
     const deliveryDate = new Date(
       selectedDate.getFullYear(),
       selectedDate.getMonth(),
       selectedDate.getDate(),
       parseInt(selectedTime[0]),
       parseInt(selectedTime[1])
     );
     const currentTime = new Date();
	   
	   $('#mpw_deadline').empty();
	   $('#mpw_deadline').append("<span>"+dateInput.value+"</span>");
	   
	   $('#mpw_deadline_2').empty();
	   $('#mpw_deadline_2').append("<span>"+dateInput.value+"</span>");
	   
	   $('#mpw_deadline_3').empty();
	   $('#mpw_deadline_3').append("<span>"+dateInput.value+"</span>");
	   
	   $('#mpw_time').empty();
	   $('#mpw_time').append("<span>"+timeSelect.value+"</span>");
	   
	   $('#mpw_time_2').empty();
	   $('#mpw_time_2').append("<span>"+timeSelect.value+"</span>");
	   
	   $('#mpw_time_3').empty();
	   $('#mpw_time_3').append("<span>"+timeSelect.value+"</span>");

     if (deliveryDate > currentTime) {
       const timeDifference = Math.abs(deliveryDate - currentTime);
       const days = Math.floor(timeDifference / (1000 * 60 * 60 * 24));
       const hours = Math.floor((timeDifference % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));

      // const deliveryDaysElement = document.getElementById('delivery-days');
      // const deliveryHoursElement = document.getElementById('delivery-hours');
		 
		$('#delivery-days').empty();
		$('#delivery-days').append('<b>'+days+' day</b>');
		$('#delivery-hours').empty();
		$('#delivery-hours').append(' and <b>'+hours+'</b> hours');

       //deliveryDaysElement.textContent = days;
     //  deliveryHoursElement.textContent = hours;

       document.getElementById('delivery-time').style.display = 'block';

       // Set minimum time selection to 0 days 3 hours (3 hours = 3 * 60 * 60 * 1000 milliseconds)
       const minTimeDifference = 3 * 60 * 60 * 1000;
       const minTime = new Date(currentTime.getTime() + minTimeDifference);
       const minTimeHour = minTime.getHours();
       const minTimeMinute = Math.floor(minTime.getMinutes() / 15) * 15;

       for (let i = 0; i < timeSelect.options.length; i++) {
         const option = timeSelect.options[i];
         const optionTime = option.value.split(':');
         const optionDate = new Date(
           selectedDate.getFullYear(),
           selectedDate.getMonth(),
           selectedDate.getDate(),
           parseInt(optionTime[0]),
           parseInt(optionTime[1])
         );

         if (optionDate >= minTime && option.disabled)
         {
           option.disabled = false;
         } else if (optionDate < minTime && !option.disabled)
         {
           option.disabled = true;
         }
       }
     } else {
       document.getElementById('delivery-time').style.display = 'none';
     }
   }

			// Event listeners for date input change and time select change
   dateInput.addEventListener('change', updateDeliveryTime);
   timeSelect.addEventListener('change', updateDeliveryTime);
					
			
 	$('#apply-promo').click(function() {
     var promo_code = $('#promo_code').val();
     $.ajax({
       type: 'POST',
       url: "{{ route('user.apply_promo') }}",
       data: {
         "_token": "{{ csrf_token() }}",
         "promo_code": promo_code
       },
       success: function(data) {
         if (data.error != null) {
           $('#promocode-error').removeClass('d-none');
           $('#promocode-error').text(data.error)
         } else {
    $('#promocode-error').addClass('d-none');
           $('#voucher-result').removeClass('d-none');
           $('#total_discount').text(data.discount)
         //  $('#gtotal').text(data.total)
           $('#totpay').text(data.total)
   			o = data.total
			amount = data.total;
         }
   
       }
     });
   
   });
			



    // Handle button clicks
 $('#submit-order').submit(function (e) {
        if ($(document.activeElement).is('#checkoutBTN')) {
            e.preventDefault(); // Prevent the default form submission

            var formData = new FormData(this); // Get form data
            var url = "{{ route('user.place_order') }}"; // Replace with the actual URL for submitting the order
			$('#checkIcon3').css('color', 'green');
	
            $.ajax({
                url: url,
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    if (response.status == 200) {
                     //   alert('Order Placed Successfully!');
						 window.location.href = "{{route('user.checkout')}}?order_id="+response.o_id;
                      //  $('#orderDetailNextBtn').show();
                      //  $('#placeOrderBtn').hide();

                        if (response.total !== "0.00") {
                            // Handle logic for non-zero total
                             //$('#checkouts').show();
                             $('.checkoutBTN').attr("href", "{{route('user.checkout')}}?order_id="+response.o_id)
                        } else {
                            // Handle logic for zero total
                            // $('#exModal').modal('show');
                            // $('#subs').hide();
                            // $('#congoMsg').show();
                        }

                        // Update or show other elements based on the response
                    }
                   // console.log(response);
                    // You can show a success message or redirect to a success page
                },
            });
        }
    });	


    
    // toggle navbar

    $("#nav_toggle").on("click", function (e) {
       $(".sidebar").toggleClass('shown');
       $(this).find('i').toggleClass('fa-bars fa-times');
    });
			
        </script>

@endsection
