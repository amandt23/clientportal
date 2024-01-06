@extends('layouts.auth')

@section('css')
	<!-- Data Table CSS -->
	<link href="{{URL::asset('plugins/awselect/awselect.min.css')}}" rel="stylesheet" />
<link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"
    />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
@endsection

@section('content')
<style>
	carousel-inner {
    position: cover;
    width: 100%;
    overflow: hidden;
    height: 614px!important;
}
	.carousel-control.right {
    right: 0;
    left: auto;
    /* background-image: -webkit-linear-gradient(left,rgba(0,0,0,.0001) 0,rgba(0,0,0,.5) 100%); */
    background-image: none!important;
    /* background-image: -webkit-gradient(linear,left top,right top,from(rgba(0,0,0,.0001)),to(rgba(0,0,0,.5))); */
    /* background-image: linear-gradient(to right,rgba(0,0,0,.0001) 0,rgba(0,0,0,.5) 100%); */
    filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#00000000', endColorstr='#80000000', GradientType=1);
    /* background-repeat: repeat-x; */
}
		.carousel-control.left {
    right: 0;
    left: auto;
    /* background-image: -webkit-linear-gradient(left,rgba(0,0,0,.0001) 0,rgba(0,0,0,.5) 100%); */
    background-image: none!important;
    /* background-image: -webkit-gradient(linear,left top,right top,from(rgba(0,0,0,.0001)),to(rgba(0,0,0,.5))); */
    /* background-image: linear-gradient(to right,rgba(0,0,0,.0001) 0,rgba(0,0,0,.5) 100%); */
    filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#00000000', endColorstr='#80000000', GradientType=1);
    /* background-repeat: repeat-x; */
}
		.container, .container-fluid {
    width: 78%;
    padding-right: 0.75rem;
    padding-left: 0.75rem;
    margin-right: auto;
    margin-left: auto;
}
	.input-group {
    position: relative;
}
	#password-input.form-control {
		border-top-right-radius: 0.5rem;
    border-bottom-right-radius: 0.5rem;
	}
	#password-confirm.form-control {
		border-top-right-radius: 0.5rem;
    border-bottom-right-radius: 0.5rem;
	}
.h-100vh {
    height: 94vh !important;
}
.input-icon {
    position: absolute;
    top: 50%;
    right: 10px;
    transform: translateY(-50%);
    cursor: pointer;
}

	/* Styles for the icon */
  #get-username {
    display: inline-block;
    position: relative;
    cursor: pointer;
	  
  }

  #get-username i {
    font-size: 20px;
    color: #333;
    transition: all 0.5s ease;
	  padding: 10px;
  }

  /* Shadow effect on hover */
  #get-username:hover i {
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
	  color: #f49d1d;
  }

  /* Animation while clicking */
  #get-username:active i {
    transform: scale(0.9);
  }
 #info-icon {
        margin-left: 5px;
        cursor: help;
    }
    
    #info-message {
        display: none;
        position: absolute;
        background-color: #f9f9f9;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        z-index: 9999;
    }
    
    #info-icon:hover + #info-message {
        display: block;
    }

     
	/* Set font size and color for the text inside <p> */
.fs-10 {
  font-size: 18px;
  color: black;
}

/* Define a new class to target the same element with higher specificity */
.text-info.hover-blue:hover {
  color: blue !important; /* Override the color with !important */
}

/* Initially set the color to blue */
.text-info {
  color: #0000FF !important;
}

/* Change color to black on hover */
.text-info:hover {
  color: #000000;
}

.fs-10 {
    font-size: 12px!important;
    color: black;
}

.fs-12 {
    font-size: 15px!imporrtant;
}
  
.input-box {
    margin-bottom: 1.5rem;
    margin-top: 40px!important;
}
	
.item-1, .item-2, .item-3 {
    position: absolute;
    display: block;
    top: 2em;
    width: 54%;
    font-size: 2em;
    animation-duration: 20s;
    animation-timing-function: ease-in-out;
    animation-iteration-count: infinite;
    color: white;
    margin-top: 41%;
}

.item-1{
	animation-name: anim-1;
}

.item-2{
	animation-name: anim-2;
}

.item-3{
	animation-name: anim-3;
}

@keyframes anim-1 {
	0%, 8.3% { left: -100%; opacity: 0; }
  8.3%,25% { left: 25%; opacity: 1; }
  33.33%, 100% { left: 110%; opacity: 0; }
}

@keyframes anim-2 {
	0%, 33.33% { left: -100%; opacity: 0; }
  41.63%, 58.29% { left: 25%; opacity: 1; }
  66.66%, 100% { left: 110%; opacity: 0; }
}

@keyframes anim-3 {
	0%, 66.66% { left: -100%; opacity: 0; }
  74.96%, 91.62% { left: 25%; opacity: 1; }
  100% { left: 110%; opacity: 0; }
}
	.input-box {
    margin-bottom: 1.5rem;
    margin-top: -9px!important;
}
	body * {
    font-family: "Noto Sans", sans-serif;
    color: white!important;
}
	.text-muted {
    color: #ffffff !important;
}
	.text-info {
    color: #c2c2ff !important;
    font-weight: bold;
}
	.input-box .form-control {
    font-family: "Noto Sans", sans-serif;
    font-size: 12px;
    color: #1e1e2d;
    -webkit-appearance: none;
    -moz-appearance: none;
    outline: none;
    appearance: none;
    background-color: #ffffff;
    border-color: transparent;
    border-radius: 0.5rem;
    border-width: 1px;
    font-weight: 400;
    line-height: 1rem;
    padding: 0.75rem 1rem;
    width: 100%;
    color:black!important;
}
	option{
	color:black!important;}
	select{
	color:black!important;}
	h3, .h3 {
    font-size: 13px!important;
}
	.fs-12 {
    font-size: 10px!important;
}
	.fs-10 {
    font-size: 9px!important;
    color: black;
}
span{
	color:black!important;
	}
a{
	color:black!important;}
</style>
    @if (config('frontend.maintenance') == 'on')			
        <div class="container h-100vh">
            <div class="row text-center h-100vh align-items-center">
                <div class="col-md-12">
                    <img src="{{ URL::asset('img/files/maintenance.png') }}" alt="Maintenance Image">
                    <h2 class="mt-4 font-weight-bold">{{ __('We are just tuning up a few things') }}.</h2>
                    <h5>{{ __('We apologize for the inconvenience but') }} <span class="font-weight-bold text-info">{{ config('app.name') }}</span> {{ __('is currenlty undergoing planned maintenance') }}.</h5>
                </div>
            </div>
        </div>
    @else
        @if (config('settings.registration') == 'enabled')
            
			<div class="row  align-items-center background-white" style="width: 70%!important;/* margin-left: 15%; */background-color: #f5f9fc00!important;/* margin-top: 4%; */margin: auto;/* margin: auto auto; */top: opz;/* position: absolute; *//* margin: 0; *//* position: absolute; *//* top: 50%; */-ms-transform: translateY(-50%);/* transform: translateY(-50%); */margin: 0;position: absolute;top: 50%;left: 50%;transform: translate(-50%, -50%);">
        <div class="col-md-7 col-sm-12 text-center background-special  align-middle p-0 imge" id="login-background" style="background-color:#ff000000!important;" >


    <div class="w3-content w3-section" style="max-width:100%!important;float: !important;">
 
  <img class="mySlides w3-animate-fading" src="{{asset('img/users/bus.jpg')}}" style="width:100%;height:620px !important">
  <img class="mySlides w3-animate-fading" src="{{asset('img/users/skl.jpg')}}" style="width:100%;height:620px !important">
  <img class="mySlides w3-animate-fading" src="{{asset('img/users/uni.jpg')}}" style="width:100%;height:620px !important">

</div>

   <script>
var myIndex = 0;
carousel();

function carousel() {
  var i;
  var x = document.getElementsByClassName("mySlides");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";  
  }
  myIndex++;
  if (myIndex > x.length) {myIndex = 1}    
  x[myIndex-1].style.display = "block";  
  setTimeout(carousel, 3000);    
}
</script>
        </div>
                    
        <div class="col-md-5 col-sm-12 h-100" id="login-responsive" style="background-color:white!important;background-color:white!important;background-image: url('https://wallpapercave.com/wp/wp9764105.jpg');">                
            <div class="card-body pr-10 pl-10">
                     <form method="POST" action="{{ route('register') }}">
                                @csrf                                
                                <div style="text-align: center;">
    <a class="header-brand" href="https://www.myperfectwriting.co.uk" target="_blank">
        <img src="{{URL::asset('img/brand/logo.png')}}" style="max-width: 230px;">
    </a>
</div>

                                <h3 class="text-center font-weight-bold ">{{__('Sign Up to')}} <span class="text-info"><a href="{{ url('/') }}">{{ config('app.name') }}</a></span><p class="text-center"><br><strong>"Do not trust us, Test Us"</strong></p>
</h3>

                               
								
								<?php 
									$faker = Faker\Factory::create();
									$username = $faker->firstname;
								 	$check = DB::table('users')->where('username', $username)->first();
									if(!empty($check)){
										$faker = Faker\Factory::create();
										$username = $faker->firstname;
									}
								?>
								<div class="input-box">  
									<p class="already" style="
    font-size: 10px;
    float: right;
    /* margin-bottom: 2px; */
    margin-top: 2%;
">If you  already have account then <a class="text-info" href="https://quirky-turing.82-165-205-78.plesk.page/login">Login</a></p>
    <label for="password-input" class="fs-12 font-weight-bold text-md-right">{{ __('Username') }}<a id="info-icon"><i class="fas fa-info-circle"style="
    margin-top: 3%;
"></i></a> </label>
    <div class="d-flex align-items-center"style="
    margin-top: 3%;
">
        <input type="text" class="form-control" name="username" id="username" value="{{$username}}" required autocomplete="off" readonly placeholder="{{ __('Username') }}"><a id="get-username" href="#"><i class="fas fa-undo"></i></a>

    </div>
</div>




                                <div class="input-box mb-4">                             
                                    <label for="name" class="fs-12 font-weight-bold text-md-right">{{ __('Full Name') }}</label>
                                    <input id="name" type="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="off" autofocus placeholder="{{ __('First and Last Name') }}">
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            {{ $message }}
                                        </span>
                                    @enderror                            
                                </div>

                                <div class="input-box mb-4">  
									
                                    <label for="email" class="fs-12 font-weight-bold text-md-right">{{ __('Email Address') }}</label>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="off"  placeholder="{{ __('Email Address') }}" required>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            {{ $message }}
                                        </span>
                                    @enderror                            
                                </div>

                                <div class="input-box mb-4">                             
                                    <label for="country" class="fs-12 font-weight-bold text-md-right" style="color:black!important">{{ __('Country') }}</label>
                                    <select  style="color:red!important;" id="user-country" name="country" class ="form-select"data-placeholder="{{ __('Select Your Country') }}" required  style="color:black!important">	
                                        @foreach(config('countries') as $value)
											<option value="{{ $value }}" style="color:black!important;" @if(config('settings.default_country') == $value) selected @endif>{{ $value }}</option>
										@endforeach										
                                    </select>
                                    @error('country')
                                        <span class="invalid-feedback" role="alert">
                                            {{ $message }}
                                        </span>
                                    @enderror                            
                                </div>

                                <div class="input-box">
    <label for="password-input" class="fs-12 font-weight-bold text-md-right">{{ __('Password') }}</label>
    <div class="input-group">
        <input id="password-input" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="off" placeholder="{{ __('Password') }}">
        <span class="input-icon password-toggle" onclick="togglePasswordVisibility('password-input')">
            <i class="fas fa-eye"></i>
        </span>
    </div>
    @error('password')
        <span class="invalid-feedback" role="alert">
            {{ $message }}
        </span>
    @enderror
</div>

<div class="input-box">
    <label for="password-confirm" class="fs-12 font-weight-bold text-md-right">{{ __('Confirm Password') }}</label>
    <div class="input-group">
        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="off" placeholder="{{ __('Confirm Password') }}">
        <span class="input-icon password-toggle" onclick="togglePasswordVisibility('password-confirm')">
            <i class="fas fa-eye"></i>
        </span>
    </div>
</div>


                                <div class="form-group mb-3">  
                                    <div class="d-flex">                        
                                        <label class="custom-switch">
                                            <input type="checkbox" class="custom-switch-input" name="agreement" id="agreement" {{ old('remember') ? 'checked' : '' }} required>
                                            <span class="custom-switch-indicator"></span>
                                            <span class="custom-switch-description fs-10 text-muted">{{__('By continuing, I agree with your')}} <a href="https://www.myperfectwriting.co.uk/terms-and-conditions/" class="text-info">{{__('Terms and Conditions')}}</a> {{__('and')}} <a href="https://www.myperfectwriting.co.uk/our-privacy-policy/" class="text-info">{{__('Privacy Policies')}}</a></span>
                                        </label>   
                                    </div>
                                </div>

                                <input type="hidden" name="recaptcha" id="recaptcha">

                                <div class="form-group mb-0">                        
                                    <button type="submit" class="btn btn-primary mr-2">{{ __('Sign Up') }}</button> 
                                    <p class="fs-10 text-muted mt-2">or <a class="text-info" href="{{ route('login') }}">{{ __('Login') }}</a></p>                               
                                </div>
                            </form>
            </div>       
        </div>
                </div>
            </div>
        @else
            <h5 class="text-center pt-9">{{__('New user registration is disabled currently')}}</h5>
        @endif
    @endif
@endsection

@section('js')
 <script src="{{URL::asset('plugins/slick/slick.min.js')}}"></script>  
    <script src="{{URL::asset('plugins/aos/aos.js')}}"></script> 
    <script src="{{URL::asset('plugins/typed/typed.min.js')}}"></script>
    <script src="{{URL::asset('js/frontend.js')}}"></script>  
    <script type="text/javascript">
		$(function () {

            var typed = new Typed('#typed', {
                strings: ['<h1><span>{{ __('Fixed Pricing System') }}</span></h1>', 
                            '<h1><span>{{ __('Per Page Writing Services') }}</span></h1>',
                            '<h1><span>{{ __('Analytical Essay') }}</span></h1>',
                            '<h1><span>{{ __('Contrast Essay') }}</span></h1>',
                            '<h1><span>{{ __('Expository Essay') }}</span></h1>',
                            '<h1><span>{{ __('Narrative Essay') }}</span></h1>',
                            '<h1><span>{{ __('And Many More!') }}</span></h1>'],
                typeSpeed: 40,
                backSpeed: 40,
                backDelay: 2000,
                loop: true,
                showCursor: false,
            });

            AOS.init();

		});    
    </script>

<script>
    document.getElementById("info-icon").addEventListener("mouseover", function() {
        var message = "We prioritize your privacy and guarantee that your original name will remain completely confidential and never be disclosed or shown to anyone. From this point forward, your username will be used for all communications.";
        
        var infoMessage = document.createElement("div");
        infoMessage.id = "info-message";
        infoMessage.innerHTML = message;
        
        this.parentNode.appendChild(infoMessage);
    });
    
    document.getElementById("info-icon").addEventListener("mouseout", function() {
        var infoMessage = document.getElementById("info-message");
        if (infoMessage) {
            infoMessage.parentNode.removeChild(infoMessage);
        }
    });
</script>
<script>
  // JavaScript to handle click animation
  var getUserName = document.getElementById('get-username');

  getUserName.addEventListener('mousedown', function() {
    this.classList.add('clicked');
  });

  getUserName.addEventListener('mouseup', function() {
    this.classList.remove('clicked');
  });
</script>
<script>
function togglePasswordVisibility(inputId) {
    var passwordInput = document.getElementById(inputId);
    var passwordToggle = $(passwordInput).closest('.input-group').find('.password-toggle');

    if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        passwordToggle.html('<i class="fas fa-eye-slash"></i>');
    } else {
        passwordInput.type = 'password';
        passwordToggle.html('<i class="fas fa-eye"></i>');
    }
}
</script>

	<!-- Awselect JS -->
	<script src="{{URL::asset('plugins/awselect/awselect.min.js')}}"></script>
	<script src="{{URL::asset('js/awselect.js')}}"></script>

    @if (config('services.google.recaptcha.enable') == 'on')
         <!-- Google reCaptcha JS -->
        <script src="https://www.google.com/recaptcha/api.js?render={{ config('services.google.recaptcha.site_key') }}"></script>
        <script>
            grecaptcha.ready(function() {
                grecaptcha.execute('{{ config('services.google.recaptcha.site_key') }}', {action: 'contact'}).then(function(token) {
                    if (token) {
                    document.getElementById('recaptcha').value = token;
                    }
                });
            });
        </script>
    @endif

<script>
$(document).ready(function() {
    // Handle click event
    $('#get-username').click(function() {
        // Make changes when clicked
        var i = '';

        $.ajax({
            url: '/get-username',
            method: 'GET',
            success: function(response) {
                i = response; 
				$('#username').val(response)
                
            }
        });
    });
});
	
</script>
   
@endsection