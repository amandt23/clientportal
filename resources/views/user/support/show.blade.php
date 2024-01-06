@extends('layouts.app')
@section('css')
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
@endsection
@section('page-header')
	<!-- PAGE HEADER -->
	<div class="page-header mt-5-7">
		<div class="page-leftheader">
			<h4 class="page-title mb-0">{{ __('Support Request') }}</h4>
			<ol class="breadcrumb mb-2">
				<li class="breadcrumb-item"><a href="{{route('user.dashboard')}}"><i class="fa-solid fa-messages-question mr-2 fs-12"></i>{{ __('User') }}</a></li>
				<li class="breadcrumb-item" aria-current="page"><a href="{{ route('user.support') }}"> {{ __('Support Request') }}</a></li>
				<li class="breadcrumb-item active" aria-current="page"><a href="{{url('#')}}"> {{ __('Support Request Details') }}</a></li>
			</ol>
		</div>
	</div>
	<!-- END PAGE HEADER -->
@endsection

@section('content')						
	<!-- SUPPORT REQUEST -->
	<div class="techSupportContainer">
	<div class="navbar_top_wrapper">

		<div class="navTop">
			<p>Technical Support</p>
			
		</div>

		<button id="nav_toggle">
		<i class="fa-solid fa-bars"></i>
		</button>
	</div>
	<div class="techSupportBox">
		<div class="navbar_top_wrapper">
			<div class="flex_1">

			</div>
			<div class="flex_1">
			<h2>Support Requests Details</h2>
			</div>

			<div class="flex_1">
			<?php if($ticket->status=="Open"){ ?>
                                <button id="techListBtn3" style="pointer-events:none;" class="techListBtn">{{ $ticket->status }}</button>
                                <?php } else if($ticket->status=="Resolved") { ?>
                                <button id="techListBtn1" style="pointer-events:none;" class="techListBtn">{{ $ticket->status }}</button>
                                <?php } else if($ticket->status=="Replied") { ?>
                                <button id="techListBtn2" style="pointer-events:none;" class="techListBtn">{{ $ticket->status }}</button>
                                <?php } ?>
			</div>
		</div>
		<div class="col-lg-9 col-md-9 col-xm-12">
			<div class="card overflow-hidden border-0">
				<div class="ticket_info_top">
				<p class="card-title">{{ __('Ticket') }} ID: <span class="text-info">{{ $ticket->ticket_id }}</span></p>
					<p class="card-title mb-4">{{ __('Subject') }}: <span class="text-info">{{ $ticket->subject }}</span></p>
					
					
				</div>
				<div class="card-body pt-5">	
					<div class="chatBox">	
						<div class="background-color p-4" id="support-messages-box">
							@foreach ($messages as $message)
								@if ($message->role != 'admin')
									<div class="support_message user">
										<!-- <p class="person_indicator"><span>{{ __('Support') }}</span></p> -->
										<div class="message_box">
										<p>{{ $message->message }}</p>
										</div>
										<p class="message_date"><i class="fa-sharp fa-solid fa-calendar-clock mr-2"></i>{{ date_format($message->created_at, 'd M Y H:i A') }}</p>
									<?php 
											$attachs = Illuminate\Support\Facades\DB::table('attachments')
												->where('sm_id', $message->id)->get();
										
										?>
										<!-- <div class="attachedFiles">
										@if ($attachs->count()>0)
											<p class="attachments">{{ __('Attachment') }} :</p>
										@foreach($attachs as $index => $attach)
            								<a class="attachment_files" href="{{ route('download_file', $attach->id) }}">({{ $index + 1 }})</a>
        								@endforeach
										@endif	
										</div>									 -->
									</div>
								@else
									<div class="support_message">
										<p class="person_indicator"><span class="text-primary">{{ __('Support') }}</span></p>
										<div class="message_box">
										<p class="fs-14 mb-1">{{ $message->message }}</p>
										</div>
										<p class="message_date">
										<i class="fa-sharp fa-solid fa-calendar-clock mr-2"></i>{{ date_format($message->created_at, 'd M Y H:i A') }} 
										</p>
										<?php 
											$attachs = Illuminate\Support\Facades\DB::table('attachments')
												->where('sm_id', $message->id)->get();
										
										?>
										<div class="attachedFiles">
										@if ($attachs->count()>0)
											<p class="attachments">{{ __('Attachment') }}</p>
											@foreach($attachs as $index => $attach)
            								<a class="attachment_files" href="{{ route('download_file', $attach->id) }}">({{ $index + 1 }})</a>
        								@endforeach
										@endif
										</div>
									</div>
								@endif
								
							@endforeach						
						</div>
					</div>

					<form id="" class="response_form" action="{{ route('user.support.response', ['ticket_id' => $ticket->ticket_id]) }}" method="post" enctype="multipart/form-data">
						@csrf
						<div class="row mt-5">
							<div class="col-12">								
								<div class="input-box">
									<h6 class="font-weight-bold">{{ __('Message') }}<span style="color:red;">*</span></h6>
									<textarea class="form-control" name="message" id="reply" rows="2"></textarea> 
								</div>									
								<div class="input-box">
									<h6 class="font-weight-bold">
										{{ __('Attach File') }}
										<span class="file_types">({{ __('JPG | JPEG | PNG | Max 5MB') }})</span>
									</h6>
									<div class="file_browser">
										<label for="attachment_file_input" class="attachment_file_input">
											<span class="attachment_files_text">Include Attachment File</span>
											<span class="upload_icon">
												<svg fill="currentColor" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" 
													viewBox="0 0 488.4 488.4" xml:space="preserve">
												<g>
													<g>
														<path d="M483.6,295.2l-69.5-107.4c-5.4-8.3-14.5-13.3-24.4-13.3H359c-4.5,0-7.2,5-4.7,8.7l75,116c1,1.5-0.1,3.5-1.9,3.5h-32.9
															h-26.8H342c-3.1,0-5.5,2.5-5.7,5.5c-2.9,48.4-43,86.8-92.2,86.8s-89.3-38.4-92.2-86.8c-0.2-3.1-2.6-5.5-5.7-5.5h-25.7h-23H60.9
															c-1.8,0-2.8-2-1.9-3.5l75-116c2.4-3.8-0.3-8.7-4.7-8.7H98.6c-9.9,0-19,5-24.4,13.3L4.8,295.2C1.7,300,0,305.7,0,311.5v149.6
															c0,14.6,11.9,26.5,26.5,26.5h217.7h217.7c14.6,0,26.5-11.9,26.5-26.5V311.5C488.4,305.7,486.8,300.1,483.6,295.2z"/>
														<path d="M252.2,4.7c-4.1-5.2-12-5.2-16.1,0l-65.9,83.8c-5.3,6.7-0.5,16.6,8,16.6h26v158.3c0,22.1,17.9,40,40,40l0,0
															c22.1,0,40-17.9,40-40V105h26c8.5,0,13.3-9.9,8-16.6L252.2,4.7z"/>
													</g>
												</g>
												</svg>
											</span>
										</label>								
										<input type="file" id="attachment_file_input" placeholder="Include attachment file..." multiple>
										<!-- <label class="input-group-btn">
											<span class="btn btn-primary special-btn">
												{{ __('Browse') }} <input type="file" name="attachment[]" multiple style="display: none;">
											</span>
										</label> -->
									</div>	
									<!-- <span class="text-muted fs-10">{{ __('JPG | JPEG | PNG | Max 5MB') }}</span> -->
									@error('attachment')
										<p class="text-danger">{{ $errors->first('attachment') }}</p>
									@enderror
								</div>					
							</div>

							<div class="new_request_btns">	
									<a href="{{ route('user.support') }}" class="btn btn-cancel mr-2">{{ __('Return') }}</a>
									<button type="submit" class="btn btn-primary">{{ __('Reply') }}</button>	
							</div>							
						</div>	
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
	<!-- END SUPPORT REQUEST -->
@endsection

@section('js')
	<script src="{{URL::asset('js/avatar.js')}}"></script>
	<script>
		$(document).ready(function () {

			$("#nav_toggle").on("click", function (e) {
				$(".sidebar").toggleClass('shown');
				$(this).find('i').toggleClass('fa-bars fa-times');
			});


			$("#attachment_file_input").on('change',function(e){
				var filesNames = '';
				var fileList = this.files;
				for (const file of fileList) {
					filesNames += `${file.name},`;
				}
				
				$(".attachment_files_text").text(filesNames);
				$(".attachment_files_text").css("color","#222222")
			});
		});
	</script>
@endsection

