@extends('layouts.app')
@section('css')
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
@endsection
@section('content')						
    <div class="techSupportContainer">
        <div class="tech_top">
            <h1>Technical Support</h1>
            <button id="nav_toggle">
            <i class="fa-solid fa-bars"></i>
            </button>
        </div>

        <div class="techSupportBox">
            <h2>New Support Request</h2>
            <hr color="#AEAEAE" />

            <form id="supportForm" action="{{ route('user.support.store') }}" method="post" enctype="multipart/form-data">
                @csrf

				<div class="techInputOne">
					<label for="techSupport">Support Category</label>
					<select id="techSupport" name="category" required>
						<option value="" disabled selected>Select your issue </option>
							
										<option value="Order Related Issue">{{ __('Order Related Issue') }}</option>
										<option value="Technical Issue">{{ __('Technical Issue') }}</option>
										<option value="Billing Issue">{{ __('Billing Issue') }}</option>
										<option value="Feedback">{{ __('Feedback') }}</option>
									</select>
					
					@error('category')
						<p class="text-danger">{{ $errors->first('category') }}</p>
					@enderror
				</div>


                <div class="techInputOne">
                    <label for="subject">Subject</label>
                    <input type="text" name="subject" id="subject" required>
                    @error('subject')
                        <p class="text-danger">{{ $errors->first('subject') }}</p>
                    @enderror
                </div>

                <div class="techInputOne">
                    <label for="message">Your Message</label>
                    <textarea name="message" id="techsuppMess" cols="30" rows="2" required></textarea>
                    @error('message')
                        <p class="text-danger">{{ $errors->first('message') }}</p>
                    @enderror
                </div>

                <div class="techInputOne">
                    <label for="attachment">Attach Files <span>(JPG|JPEG|PNG)</span></label>
                    <input type="file" name="attachment[]" multiple accept=".jpg, .jpeg, .png">
                    @error('attachment')
                        <p class="text-danger">{{ $errors->first('attachment') }}</p>
                    @enderror
                </div>

                <div class="supportBtns">
                    <button type="submit" id="sendButton">Send</button>
                    <a href="{{ route('user.support') }}" class="btn btn-cancel">Cancel</a>
                </div>
            </form>

            <script>
                document.getElementById('sendButton').addEventListener('click', function (event) {
                    event.preventDefault();
                    document.getElementById('supportForm').submit();
                });

                $(document).ready(function () {

                        $("#nav_toggle").on("click", function (e) {
                            $(".sidebar").toggleClass('shown');
                            $(this).find('i').toggleClass('fa-bars fa-times');
                        });
                    });
            </script>
        </div>
    </div>
@endsection
