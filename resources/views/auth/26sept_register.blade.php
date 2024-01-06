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
}.current_value{

        color: #9999b3!important;

    }

    .awselect .back_face ul li a {

    background: #f5f9fc;

    color: #3b3465!important;

}

    .span{

        color:black!important;

    }

	carousel-inner {

    position: cover;

    width: 100%;

    overflow: hidden;

    height: 614px!important;

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
    margin-top: 0px!important;
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
        <div class="col-md-6 col-sm-12 text-center background-special  align-middle p-0 imge" id="login-background" style="background-color:#ff000000!important;" >


    <div class="w3-content w3-section" style="max-width:100%!important;float: !important;">
 
  <img class="mySlides w3-animate-fading" src="{{asset('img/users/bus.jpg')}}" style="width:100%;height:648px !important">
  <img class="mySlides w3-animate-fading" src="{{asset('img/users/skl.jpg')}}" style="width:100%;height:648px !important">
  <img class="mySlides w3-animate-fading" src="{{asset('img/users/uni.jpg')}}" style="width:100%;height:648px !important">

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
  setTimeout(carousel, 9000);    
}
</script>
        </div>
                    
        <div class="col-md-6 col-sm-12 h-100" id="login-responsive" style="background-color:white!important;background-color:white!important;background-image: url('https://wallpapercave.com/wp/wp9764105.jpg');">                
            <div class="card-body pr-10 pl-10">
                <form method="POST" action="{{route('register')}}">
					@csrf
                    <input type="hidden" name="_toooken" value="wCWso1kaUJaPGwTa8yBucenGtNbKisMrK2VYBjTy">                                
                  
<div style="text-align: center;margin-top: -2%;">
<a class="header-brand" href="https://www.myperfectwriting.co.uk" target="_blank">
<img src="{{asset('img/brand/logo.png')}}" style="max-width: 230px;">
</a>
</div>
<h3 class="text-center font-weight-bold mb-8">Sign Up to <span class="text-info" style="color:black!important;">My Perfect Writing</span><p class="text-center"><br><strong>"Do not trust us, Test Us"</strong></p>
</h3>


                    
                                                    <div class="input-box">                            
<div class="input-box" style="
/* margin-top: 22px!important; */
">
<label class="fs-12 font-weight-bold d-flex align-items-center justify-content-between">
<span style="
/* margin-top: -2px; */
">Username<a id="info-icon"><i class="fas fa-info-circle"></i></a></span>
<p class="fs-10 text-muted mt-2">
Already have an account? Just <a class="text-info" href="{{route('login')}}">Login</a>
</p>

</label>
<div class="d-flex align-items-center">
<input type="text" class="form-control" name="username" id="username" value="Ezekiel" required="" autocomplete="off" readonly="" placeholder="Username">
<a id="get-username" href="#"><i class="fas fa-undo"></i></a>
</div>
</div>
</div>
                    





                    <div class="input-box mb-4">                             
                        <label for="name" class="fs-12 font-weight-bold text-md-right">Full Name</label>
                        <input id="name" type="name" class="form-control " name="name" value="" autocomplete="off" autofocus="" placeholder="First and Last Names">
                                                    
                    </div>

                    <div class="input-box mb-4">  
                        
                        <label for="email" class="fs-12 font-weight-bold text-md-right">Email Address</label>
                        <input id="email" type="email" class="form-control " name="email" value="" autocomplete="off" placeholder="Email Address" required="">
                                                    
                    </div>

                    <div class="input-box mb-4">                             
                        <label for="country" class="fs-12 font-weight-bold text-md-right">Country</label>
                        <select id="user-country" name="country" class="form-select" data-placeholder="Select Your Country" required="">	
                                                                        <option value="Afganistan">Afganistan</option>
                                                                        <option value="Albania">Albania</option>
                                                                        <option value="Algeria">Algeria</option>
                                                                        <option value="American Samoa">American Samoa</option>
                                                                        <option value="Andorra">Andorra</option>
                                                                        <option value="Angola">Angola</option>
                                                                        <option value="Anguilla">Anguilla</option>
                                                                        <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                                                                        <option value="Argentina">Argentina</option>
                                                                        <option value="Armenia">Armenia</option>
                                                                        <option value="Aruba">Aruba</option>
                                                                        <option value="Australia">Australia</option>
                                                                        <option value="Austria">Austria</option>
                                                                        <option value="Azerbaijan">Azerbaijan</option>
                                                                        <option value="Bahamas">Bahamas</option>
                                                                        <option value="Bahrain">Bahrain</option>
                                                                        <option value="Bangladesh">Bangladesh</option>
                                                                        <option value="Barbados">Barbados</option>
                                                                        <option value="Belarus">Belarus</option>
                                                                        <option value="Belgium">Belgium</option>
                                                                        <option value="Belize">Belize</option>
                                                                        <option value="Benin">Benin</option>
                                                                        <option value="Bermuda">Bermuda</option>
                                                                        <option value="Bhutan">Bhutan</option>
                                                                        <option value="Bolivia">Bolivia</option>
                                                                        <option value="Bonaire">Bonaire</option>
                                                                        <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                                                                        <option value="Botswana">Botswana</option>
                                                                        <option value="Brazil">Brazil</option>
                                                                        <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
                                                                        <option value="Brunei">Brunei</option>
                                                                        <option value="Bulgaria">Bulgaria</option>
                                                                        <option value="Burkina Faso">Burkina Faso</option>
                                                                        <option value="Burundi">Burundi</option>
                                                                        <option value="Cambodia">Cambodia</option>
                                                                        <option value="Cameroon">Cameroon</option>
                                                                        <option value="Canada">Canada</option>
                                                                        <option value="Canary Islands">Canary Islands</option>
                                                                        <option value="Cape Verde">Cape Verde</option>
                                                                        <option value="Cayman Islands">Cayman Islands</option>
                                                                        <option value="Central African Republic">Central African Republic</option>
                                                                        <option value="Chad">Chad</option>
                                                                        <option value="Channel Islands">Channel Islands</option>
                                                                        <option value="Chile">Chile</option>
                                                                        <option value="China">China</option>
                                                                        <option value="Christmas Island">Christmas Island</option>
                                                                        <option value="Cocos Island">Cocos Island</option>
                                                                        <option value="Colombia">Colombia</option>
                                                                        <option value="Comoros">Comoros</option>
                                                                        <option value="Congo">Congo</option>
                                                                        <option value="Cook Islands">Cook Islands</option>
                                                                        <option value="Costa Rica">Costa Rica</option>
                                                                        <option value="Cote Divoire">Cote Divoire</option>
                                                                        <option value="Croatia">Croatia</option>
                                                                        <option value="Cuba">Cuba</option>
                                                                        <option value="Curaco">Curaco</option>
                                                                        <option value="Cyprus">Cyprus</option>
                                                                        <option value="Czech Republic">Czech Republic</option>
                                                                        <option value="Denmark">Denmark</option>
                                                                        <option value="Djibouti">Djibouti</option>
                                                                        <option value="Dominica">Dominica</option>
                                                                        <option value="Dominican Republic">Dominican Republic</option>
                                                                        <option value="East Timor">East Timor</option>
                                                                        <option value="Ecuador">Ecuador</option>
                                                                        <option value="Egypt">Egypt</option>
                                                                        <option value="El Salvador">El Salvador</option>
                                                                        <option value="Equatorial Guinea">Equatorial Guinea</option>
                                                                        <option value="Eritrea">Eritrea</option>
                                                                        <option value="Estonia">Estonia</option>
                                                                        <option value="Ethiopia">Ethiopia</option>
                                                                        <option value="Falkland Islands">Falkland Islands</option>
                                                                        <option value="Faroe Islands">Faroe Islands</option>
                                                                        <option value="Fiji">Fiji</option>
                                                                        <option value="Finland">Finland</option>
                                                                        <option value="France">France</option>
                                                                        <option value="French Guiana">French Guiana</option>
                                                                        <option value="French Polynesia">French Polynesia</option>
                                                                        <option value="French Southern Territory">French Southern Territory</option>
                                                                        <option value="Gabon">Gabon</option>
                                                                        <option value="Gambia">Gambia</option>
                                                                        <option value="Georgia">Georgia</option>
                                                                        <option value="Germany">Germany</option>
                                                                        <option value="Ghana">Ghana</option>
                                                                        <option value="Gibraltar">Gibraltar</option>
                                                                        <option value="Great Britain">Great Britain</option>
                                                                        <option value="Greece">Greece</option>
                                                                        <option value="Greenland">Greenland</option>
                                                                        <option value="Grenada">Grenada</option>
                                                                        <option value="Guadeloupe">Guadeloupe</option>
                                                                        <option value="Guam">Guam</option>
                                                                        <option value="Guatemala">Guatemala</option>
                                                                        <option value="Guinea">Guinea</option>
                                                                        <option value="Guyana">Guyana</option>
                                                                        <option value="Haiti">Haiti</option>
                                                                        <option value="Hawaii">Hawaii</option>
                                                                        <option value="Honduras">Honduras</option>
                                                                        <option value="Hong Kong">Hong Kong</option>
                                                                        <option value="Hungary">Hungary</option>
                                                                        <option value="Iceland">Iceland</option>
                                                                        <option value="Indonesia">Indonesia</option>
                                                                        <option value="India">India</option>
                                                                        <option value="Iran">Iran</option>
                                                                        <option value="Iraq">Iraq</option>
                                                                        <option value="Ireland">Ireland</option>
                                                                        <option value="Isle of Man">Isle of Man</option>
                                                                        <option value="Israel">Israel</option>
                                                                        <option value="Italy">Italy</option>
                                                                        <option value="Jamaica">Jamaica</option>
                                                                        <option value="Japan">Japan</option>
                                                                        <option value="Jordan">Jordan</option>
                                                                        <option value="Kazakhstan">Kazakhstan</option>
                                                                        <option value="Kenya">Kenya</option>
                                                                        <option value="Kiribati">Kiribati</option>
                                                                        <option value="North Korea">North Korea</option>
                                                                        <option value="South Korea">South Korea</option>
                                                                        <option value="Kuwait">Kuwait</option>
                                                                        <option value="Kyrgyzstan">Kyrgyzstan</option>
                                                                        <option value="Laos">Laos</option>
                                                                        <option value="Latvia">Latvia</option>
                                                                        <option value="Lebanon">Lebanon</option>
                                                                        <option value="Lesotho">Lesotho</option>
                                                                        <option value="Liberia">Liberia</option>
                                                                        <option value="Libya">Libya</option>
                                                                        <option value="Liechtenstein">Liechtenstein</option>
                                                                        <option value="Lithuania">Lithuania</option>
                                                                        <option value="Luxembourg">Luxembourg</option>
                                                                        <option value="Macau">Macau</option>
                                                                        <option value="Macedonia">Macedonia</option>
                                                                        <option value="Madagascar">Madagascar</option>
                                                                        <option value="Malaysia">Malaysia</option>
                                                                        <option value="Malawi">Malawi</option>
                                                                        <option value="Maldives">Maldives</option>
                                                                        <option value="Mali">Mali</option>
                                                                        <option value="Malta">Malta</option>
                                                                        <option value="Marshall Islands">Marshall Islands</option>
                                                                        <option value="Martinique">Martinique</option>
                                                                        <option value="Mauritania">Mauritania</option>
                                                                        <option value="Mauritius">Mauritius</option>
                                                                        <option value="Mayotte">Mayotte</option>
                                                                        <option value="Mexico">Mexico</option>
                                                                        <option value="Midway Islands">Midway Islands</option>
                                                                        <option value="Moldova">Moldova</option>
                                                                        <option value="Monaco">Monaco</option>
                                                                        <option value="Mongolia">Mongolia</option>
                                                                        <option value="Montserrat">Montserrat</option>
                                                                        <option value="Morocco">Morocco</option>
                                                                        <option value="Mozambique">Mozambique</option>
                                                                        <option value="Myanmar">Myanmar</option>
                                                                        <option value="Nambia">Nambia</option>
                                                                        <option value="Nauru">Nauru</option>
                                                                        <option value="Nepal">Nepal</option>
                                                                        <option value="Netherland Antilles">Netherland Antilles</option>
                                                                        <option value="Netherlands">Netherlands</option>
                                                                        <option value="Nevis">Nevis</option>
                                                                        <option value="New Caledonia">New Caledonia</option>
                                                                        <option value="New Zealand">New Zealand</option>
                                                                        <option value="Nicaragua">Nicaragua</option>
                                                                        <option value="Niger">Niger</option>
                                                                        <option value="Nigeria">Nigeria</option>
                                                                        <option value="Niue">Niue</option>
                                                                        <option value="Norfolk Island">Norfolk Island</option>
                                                                        <option value="Norway">Norway</option>
                                                                        <option value="Oman">Oman</option>
                                                                        <option value="Pakistan">Pakistan</option>
                                                                        <option value="Palau Island">Palau Island</option>
                                                                        <option value="Palestine">Palestine</option>
                                                                        <option value="Panama">Panama</option>
                                                                        <option value="Papua New Guinea">Papua New Guinea</option>
                                                                        <option value="Paraguay">Paraguay</option>
                                                                        <option value="Peru">Peru</option>
                                                                        <option value="Phillipines">Phillipines</option>
                                                                        <option value="Pitcairn Island">Pitcairn Island</option>
                                                                        <option value="Poland">Poland</option>
                                                                        <option value="Portugal">Portugal</option>
                                                                        <option value="Puerto Rico">Puerto Rico</option>
                                                                        <option value="Qatar">Qatar</option>
                                                                        <option value="Republic of Montenegro">Republic of Montenegro</option>
                                                                        <option value="Republic of Serbia">Republic of Serbia</option>
                                                                        <option value="Reunion">Reunion</option>
                                                                        <option value="Romania">Romania</option>
                                                                        <option value="Russia">Russia</option>
                                                                        <option value="Rwanda">Rwanda</option>
                                                                        <option value="St Barthelemy">St Barthelemy</option>
                                                                        <option value="St Eustatius">St Eustatius</option>
                                                                        <option value="St Helena">St Helena</option>
                                                                        <option value="St Kitts-Nevis">St Kitts-Nevis</option>
                                                                        <option value="St Lucia">St Lucia</option>
                                                                        <option value="St Maarten">St Maarten</option>
                                                                        <option value="St Pierre and Miquelon">St Pierre and Miquelon</option>
                                                                        <option value="St Vincent and Grenadines">St Vincent and Grenadines</option>
                                                                        <option value="Saipan">Saipan</option>
                                                                        <option value="Samoa">Samoa</option>
                                                                        <option value="American Samoa">American Samoa</option>
                                                                        <option value="San Marino">San Marino</option>
                                                                        <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                                                                        <option value="Saudi Arabia">Saudi Arabia</option>
                                                                        <option value="Senegal">Senegal</option>
                                                                        <option value="Seychelles">Seychelles</option>
                                                                        <option value="Sierra Leone">Sierra Leone</option>
                                                                        <option value="Singapore">Singapore</option>
                                                                        <option value="Slovakia">Slovakia</option>
                                                                        <option value="Slovenia">Slovenia</option>
                                                                        <option value="Solomon Islands">Solomon Islands</option>
                                                                        <option value="Somalia">Somalia</option>
                                                                        <option value="South Africa">South Africa</option>
                                                                        <option value="Spain">Spain</option>
                                                                        <option value="Sri Lanka">Sri Lanka</option>
                                                                        <option value="Sudan">Sudan</option>
                                                                        <option value="Suriname">Suriname</option>
                                                                        <option value="Swaziland">Swaziland</option>
                                                                        <option value="Sweden">Sweden</option>
                                                                        <option value="Switzerland">Switzerland</option>
                                                                        <option value="Syria">Syria</option>
                                                                        <option value="Tahiti">Tahiti</option>
                                                                        <option value="Taiwan">Taiwan</option>
                                                                        <option value="Tajikistan">Tajikistan</option>
                                                                        <option value="Tanzania">Tanzania</option>
                                                                        <option value="Thailand">Thailand</option>
                                                                        <option value="Togo">Togo</option>
                                                                        <option value="Tokelau">Tokelau</option>
                                                                        <option value="Tonga">Tonga</option>
                                                                        <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                                                                        <option value="Tunisia">Tunisia</option>
                                                                        <option value="Turkey">Turkey</option>
                                                                        <option value="Turkmenistan">Turkmenistan</option>
                                                                        <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
                                                                        <option value="Tuvalu">Tuvalu</option>
                                                                        <option value="Uganda">Uganda</option>
                                                                        <option value="United Kingdom" selected="">United Kingdom</option>
                                                                        <option value="Ukraine">Ukraine</option>
                                                                        <option value="United Arab Erimates">United Arab Erimates</option>
                                                                        <option value="United States">United States</option>
                                                                        <option value="Uraguay">Uraguay</option>
                                                                        <option value="Uzbekistan">Uzbekistan</option>
                                                                        <option value="Vanuatu">Vanuatu</option>
                                                                        <option value="Vatican City State">Vatican City State</option>
                                                                        <option value="Venezuela">Venezuela</option>
                                                                        <option value="Vietnam">Vietnam</option>
                                                                        <option value="Virgin Islands (Britain)">Virgin Islands (Britain)</option>
                                                                        <option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
                                                                        <option value="Wake Island">Wake Island</option>
                                                                        <option value="Wallis and Futana Island">Wallis and Futana Island</option>
                                                                        <option value="Yemen">Yemen</option>
                                                                        <option value="Zaire">Zaire</option>
                                                                        <option value="Zambia">Zambia</option>
                                                                        <option value="Zimbabwe">Zimbabwe</option>
                                                                    
                        </select>
                                                    
                    </div>

                    <div class="input-box">
<label for="password-input" class="fs-12 font-weight-bold text-md-right">Password</label>
<div class="input-group">
<input id="password-input" type="password" class="form-control " name="password" required="" autocomplete="off" placeholder="Password">
<span class="input-icon password-toggle" onclick="togglePasswordVisibility('password-input')">
<i class="fas fa-eye"></i>
</span>
</div>
</div>

<div class="input-box">
<label for="password-confirm" class="fs-12 font-weight-bold text-md-right">Confirm Password</label>
<div class="input-group">
<input id="password-confirm" type="password" class="form-control" name="password_confirmation" required="" autocomplete="off" placeholder="Confirm Password">
<span class="input-icon password-toggle" onclick="togglePasswordVisibility('password-confirm')">
<i class="fas fa-eye"></i>
</span>
</div>
</div>


                    <div class="form-group mb-3">  
                        <div class="d-flex">                        
                            <label class="custom-switch">
                                <input type="checkbox" class="custom-switch-input" name="agreement" id="agreement" required="">
                                <span class="custom-switch-indicator"></span>
                               <span class="custom-switch-description fs-10 text-muted" style="font-size: 18px;">
By continuing, I agree with your
<a href="https://quirky-turing.82-165-205-78.plesk.page/terms-and-conditions" class="text-info">Terms and Conditions</a>
and
<a href="https://quirky-turing.82-165-205-78.plesk.page/privacy-policy" class="text-info">Privacy Policies</a>
</span>

                            </label>   
                        </div>
                    </div>

                    <input type="hidden" name="recaptcha" id="recaptcha">

                    <div class="form-group mb-0">                        
                        <button type="submit" class="btn btn-primary mr-2">Sign Up</button> 
                      <!--         

<p class="fs-10 text-muted mt-2">
or <a class="text-info" href="https://quirky-turing.82-165-205-78.plesk.page/login">Login</a>
</p> -->


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