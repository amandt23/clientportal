@extends('layouts.auth')

@section('content')

<style>
	body {
    background-color: lightgrey;
    font-family: "Inknut Antiqua-Medium", Helvetica;
}

.box {
    width: 100%;
    min-height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    padding:10px;
}

.box .rectangle {
    width: 100%;
    max-width: 387px;
    height: 411px;
    background-color: #ffffff;
    box-shadow: 0px 4px 4px #00000040;
    border-radius:6px;
    padding:0 10px;
}

.rectangle form{
    padding:20px 15px;
}

.form_top{
    width: 100%;
    display: flex;
    flex-direction:column;
    align-items: center;
    padding-block:10px;
}


.image {
    width: 100%;
    max-width: 191px;
}


.label {
    font-family: "Inknut Antiqua-Medium";
    font-size:16px;
    font-weight:bold;

}



.m-01 {
    display: inline-block;
    margin-block: 5px;
}

.m-02 {
    margin-top: 5px;
    margin-bottom: 5px;
    padding:10px;
    width: 100%;
    border: 1px solid black;
    border-radius: 4px
}

.btn-01 {
    width: 53px;
    height: 38px;
    margin-top: 30px;
    margin-left: 197px;
    border: none;
    border-radius: 8px;
    font-size: 13px;
    color: white;
    background-color: #52A81B;
}

.btn-02 {
    width: 57px;
    height: 38px;
    margin-top: 30px;
    background-color: #52A81B;
    border: none;
    border-radius: 8px;
    font-size: 13px;
    color: white;
}

.form_bottom{
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px;
}

.forgot_pass{
    color:#222222;
}

.forgot_pass:hover{
    color:#52A81B;
}

.form_btns{
    display: flex;
    justify-content: end;
    gap:10px;
}

.form_btns button{
    padding:10px 25px;
    border-radius:6px;
    background:#52A81B;
    border:0;
    outline:none;
    color:#fff;
    font-size:16px;
    font-weight:600;
}

.form_btns button:hover{
    background:#356B12;
}


</style>
<body>
<div class="box">
            <div class="rectangle">
                <div class="form_top">
                <div class="image">
                    <img src="{{URL::asset('img/brand/logo.png')}}" alt="" class="myperfectwriting">
                </div>
                <div class="label">
                    <p class="text-wrapper">Welcome To My Perfect Writing</p>
                </div>
                </div>
                <hr style="color: #D9D9D9;">
                <div>
                    <form method="POST" action="{{route('login')}}" class="login_form">
						@csrf 
                        <label for="Email" class="m-01">Email</label>
                        <div>
                            <input id="email" type="email" class="m-02" name="email" value="{{ old('email') }}" autocomplete="off" placeholder="{{ __('Email Address') }}" required >
                        </div>
                        <label for="Password" class="m-01">Password</label>
                        <div>
                            <input id="password" type="password" class="m-02" name="password" autocomplete="off" placeholder="{{ __('Password') }}" required>
                            <img src="Images/carbon_view.png" alt="">
                        </div>
                        <div class="form_bottom">
                        <div>
                        <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label for="remember">Remember me</label>
                        </div>
                        <a class="forgot_pass" href="#">Forgot Your Password?</a>
                        </div>
						<div class="form_btns">
							<button type="submit">Log in</button>
							<button type="button" onclick="window.location.href='{{ route('register') }}';">Sign up</button>
						</div>
					</form>
                </div>
            </div>
        </div>
</body>
@endsection

@section('js')
 <script src="{{URL::asset('plugins/slick/slick.min.js')}}"></script>  
    <script src="{{URL::asset('plugins/aos/aos.js')}}"></script> 
    <script src="{{URL::asset('plugins/typed/typed.min.js')}}"></script>
    <script src="{{URL::asset('js/frontend.js')}}"></script>      
@endsection