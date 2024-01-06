@extends('layouts.app')

@section('css')
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
@endsection

@section('content')
 <div class="profile_container">
 <div class="homeContainer">
			<div class="topNav">
        		<h1>Settings</h1>
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
                    <input type="file" id="img_input">
                    <label for="img_input"><i class="fa-solid fa-arrow-up"></i></label>
                    </div>

                    <h2>{{ auth()->user()->name }}</h2>
                </div>


                    <div class="profileBottom">
						<a href="{{ route('user.profile') }}"><h2>My Profile</h2></a>
						<a href="{{ route('user.profile.edit') }}"><h2>Settings</h2></a>
						<a  href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();"><h2>Log out</h2></a> 
						
						<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form> 
						
                    </div>
                </div>

                <div  class="profileRight">
                    <h2>Edit Profile</h2>
					<form method="POST" class="profile_form" action="{{ route('user.profile.update', [auth()->user()->id]) }}">
						@csrf
					   <div class="profileInputs">
							<label for="name">Full Name</label>
							<input type="text" name="name" value="{{ auth()->user()->name }}">
							<label for="name">Email</label>
							<input type="text" name="email" value="{{ auth()->user()->email }}">
							<label for="name">Phone</label>
							<input type="text" name="phone_number" value="{{ auth()->user()->phone_number }}">
							<label for="name">Country</label>
							<input type="text" name="country" value="{{ auth()->user()->country }}">
							<label for="name">Change Password</label>
							<input type="text" name="new_password">
							<label for="name">Password Confirm</label>
							<input type="text" name="new_confirm_password">

							<div class="supportBtns">
								<button type="submit">Save</button>
								<button class="btn btn-cancel">Cancel</button>
							</div>
					   </div>
						
					</form>
					
                </div>
            </div>
</div>
 </div>

		
<script>

var inputTag = document.querySelector("#img_input")
inputTag.addEventListener("change",(e)=>{
	var file = e.target.files[0];
	if(file){
		var reader = new FileReader();

		reader.onload = function (e) {
	// Display the image in the preview div
	document.getElementById('profile_image_perview').src =  e.target.result;
  };

  reader.readAsDataURL(file);
  document.getElementById('profile_image_perview').style.display = 'inline-block'
  document.getElementById("placeholder_img").style.display = 'none'
	}

	else{
		document.getElementById('profile_image_perview').style.display = 'none'
		document.getElementById("placeholder_img").style.display = 'inline-block'
	}
})



// nav toggler


$("#nav_toggle").on("click", function (e) {
       $(".sidebar").toggleClass('shown');
       $(this).find('i').toggleClass('fa-bars fa-times');
    });

</script>
@endsection

