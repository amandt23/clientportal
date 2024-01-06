@extends('layouts.app')
@section('css')
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
@endsection
@section('content')
    <div class="homeContainer">
        <div class="topNav">
        <h1>My Profile</h1>
                <button id="nav_toggle">
                <i class="fa-solid fa-bars"></i>
                </button>
        </div>
        <div class="myProfileCard">
            <div class="profileLeft">
                <div class="profileTop">
                    <div class="img_profile">
                    <img src="" id="profile_image_perview" alt="">
                    <svg xmlns="http://www.w3.org/2000/svg" id="placeholder_img" width="70" height="70" viewBox="0 0 70 70" fill="none">
                        <path d="M35 0C15.7012 0 0 15.7012 0 35C0 54.2988 15.7012 70 35 70C54.2988 70 70 54.2988 70 35C70 15.7012 54.2988 0 35 0ZM26.5495 19.6572C28.6815 17.3974 31.6817 16.1538 35 16.1538C38.3183 16.1538 41.2916 17.4058 43.432 19.6774C45.601 21.9793 46.656 25.0721 46.407 28.3971C45.9089 35 40.7935 40.3846 35 40.3846C29.2065 40.3846 24.081 35 23.593 28.3954C23.3457 25.0435 24.399 21.9406 26.5495 19.6572ZM35 64.6154C31.0465 64.618 27.1326 63.8267 23.4907 62.2884C19.8487 60.7501 16.5526 58.4961 13.7981 55.6601C15.3757 53.4103 17.3858 51.4974 19.7111 50.0332C24.0002 47.2837 29.4286 45.7692 35 45.7692C40.5714 45.7692 45.9998 47.2837 50.2839 50.0332C52.611 51.4967 54.623 53.4097 56.2019 55.6601C53.4476 58.4964 50.1516 60.7506 46.5096 62.2889C42.8675 63.8272 38.9536 64.6184 35 64.6154Z"
                            fill="white" />
                    </svg>
                    
                    </div>

                    <h2>{{ auth()->user()->name }}</h2>
                </div>


                <div class="profileBottom">
						<a href="{{ route('user.profile') }}"><h2>My Profile</h2></a>
						<a href="{{ route('user.profile.edit') }}"><h2>Settings</h2></a>
						<a href="{{ route('logout') }}"><h2>Log out</h2></a>
                    </div>
            </div>

            <div class="profileRight" style="row-gap: 4px;margin-top: 20px;">
                <h2>Personal Details</h2>


                <div class="profileOne">
                    <ul>
                        <li>{{ __('Full Name') }}</li>
                        <li>{{ auth()->user()->name }}</li>
                    </ul>
                </div>
                <hr>
				
				<div class="profileOne">
                    <ul>
                        <li>{{ __('Dummy Name') }}</li>
                        <li>{{ auth()->user()->username }}</li>
                    </ul>
                </div>
                <hr>

                <div class="profileOne">
                    <ul>
                        <li>{{ __('Email') }}</li>
                        <li>{{ auth()->user()->email }}</li>
                    </ul>
                </div>
                <hr>

                <div class="profileOne">
                    <ul>
                        <li>{{ __('Phone') }}</li>
                        <li>{{ auth()->user()->phone_number }}</li>
                    </ul>
                </div>
                <hr>

                <div class="profileOne">
                    <ul>
                        <li>{{ __('Country') }}</li>
                        <li>{{ auth()->user()->country }}</li>
                    </ul>
                </div>
                <hr>

            </div>
        </div>
		<div id="info_card">
			<h3>NOTICE</h3>
			<p>We use nickname, not real name,for company communication to protect your privacy and confidentiality.</p>
		</div>
    </div>

    <script>
            $("#nav_toggle").on("click", function (e) {
       $(".sidebar").toggleClass('shown');
       $(this).find('i').toggleClass('fa-bars fa-times');
    });
    </script>


@endsection
