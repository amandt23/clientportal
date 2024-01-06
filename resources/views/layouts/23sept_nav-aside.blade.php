<!-- SIDE MENU BAR -->
<style>
  #flip {
  transition: transform 0.3s ease-in-out; /* Add a smooth transition effect */
}
#panel {
            display: none;
        }
#flip:hover {
  transform: translateX(10px); /* Adjust the value to control the amount of slide */
}
#flip_dpt {
  transition: transform 0.3s ease-in-out; /* Add a smooth transition effect */
}
#panel_dpt {
            display: none;
        }
#flip_dpt:hover {
  transform: translateX(10px); /* Adjust the value to control the amount of slide */
}
.superadmin:hover{
  color: black!important;
  
}
.client:hover{
  color: black!important;

}
.fas fa-caret-down{
    margin-left: 2%;;
  }
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script> 
$(document).ready(function(){
            $("#flip").click(function(){
                $("#panel").slideToggle("slow");
            });
        });

        $(document).ready(function(){
            $("#flip_dpt").click(function(){
                $("#panel_dpt").slideToggle("slow");
            });
        });
        
        const link = document.querySelector('.side-menu__item_inactive');

// Add a click event listener to the link
link.addEventListener('click', function(event) {
    // Prevent the default link behavior (e.g., navigating to a new page)
    event.preventDefault();

    // Add a class to indicate that the link is active
    link.classList.add('active');
});

</script>
<aside class="app-sidebar"> 
	@role('user')
    <div class="app-sidebar__logo">
        <a class="header-brand" href="{{url('/user/dashboard')}}">
            <img src="{{URL::asset('img/brand/logo.png')}}" class="header-brand-img desktop-lgo" alt="Admintro logo">
            <img src="{{URL::asset('img/brand/favicon.png')}}" class="header-brand-img mobile-logo" alt="Admintro logo">
        </a>
    </div>
	@endrole

    @role('blogger')
    <div class="app-sidebar__logo">
        <a class="header-brand" href="{{ route('blogger.blogs') }}">
            <img src="{{URL::asset('img/brand/logo.png')}}" class="header-brand-img desktop-lgo" alt="Admintro logo">
            <img src="{{URL::asset('img/brand/favicon.png')}}" class="header-brand-img mobile-logo" alt="Admintro logo">
        </a>
    </div>
	@endrole

	@role('admin')
    <div class="app-sidebar__logo">
        <a class="header-brand" href="{{url('/admin/dashboard')}}">
            <img src="{{URL::asset('img/brand/logo.png')}}" class="header-brand-img desktop-lgo" alt="Admintro logo">
            <img src="{{URL::asset('img/brand/favicon.png')}}" class="header-brand-img mobile-logo" alt="Admintro logo">
        </a>
    </div>
	@endrole
	

    <ul class="side-menu app-sidebar3">
		@role('user')
		<br>
    <div style="text-align: center;">
        <a href="{{ route('user.services') }}" class="btn btn-primary mt-1 pulsating-btn" style="font-size: 15px; margin-bottom: 30px;">{{ __('Place new Order') }}</a>
    </div>
@endrole
@role('blogger')
        <li class="side-item side-item-category mt-4 mb-3">{{ __('Menu') }}</li>

		<li class="slide">
			<a class="side-menu__item"  href="{{ route('blogger.blogs') }}">
					<span class="side-menu__icon lead-3 fa-solid fa-chart-tree-map"></span>
				  <span class="side-menu__label">{{ __('Blogs') }}</span></a>
		
		</li>
        @endrole

		@role('user')
		
		   <!-- <li class="side-item side-item-category mt-4 mb-3">{{ __('Menu') }}</li> -->
       <li class="slide">
    <a class="side-menu__item" href="{{ route('user.dashboard') }}">
        <span class="side-menu__icon lead-3 fa-solid fa-chart-tree-map"></span>
        <span class="side-menu__label">{{ __('Dashboard') }}</span>
    </a>
</li> 
		


<li class="slide">
    <a class="side-menu__item" href="{{ route('user.my_orders') }}">
        <span class="side-menu__icon lead-3 fa-solid fa-file-invoice"></span>
        <span class="side-menu__label">{{ __('My Orders') }}</span>
    </a>
</li>

<li class="slide">
    <a class="side-menu__item" href="{{ route('user.unpaid_orders') }}">
        <span class="side-menu__icon lead-3 fa-solid fa-file-invoice-dollar"></span>
        <span class="side-menu__label">{{ __('My Unpaid Orders') }}</span>
    </a>
</li>

   @endrole
		@role('user')
		 @if (config('settings.user_notification') == 'enabled')
		<li class="slide">
    <a class="side-menu__item" href="{{ route('user.notifications') }}">
        <span class="side-menu__icon lead-3 fa-solid fa-message-exclamation"></span>
        <span class="side-menu__label">{{ __('Notifications') }}</span>

                       
        @if (auth()->user()->unreadNotifications->where('type', 'App\Notifications\GeneralNotification')->count())
                                        <span class="badge badge-warning ml-3">{{ auth()->user()->unreadNotifications->where('type', 'App\Notifications\GeneralNotification')->count() }}</span>
                                    @endif   
                          
                            @endif 
		                </a>
</li>  
                      
        @if (config('settings.user_support') == 'enabled')
		<li class="slide">
    <a class="side-menu__item" href="{{ route('user.support') }}">
        <span class="side-menu__icon lead-3 fa-solid fa-messages-question"></span>
        <span class="side-menu__label">{{ __('Support Request') }}</span>
    </a>
</li>
                            @endif        
                           @if (config('payment.referral.enabled') == 'on')
	<!--	<li class="slide">
    <a class="side-menu__item" href="{{ route('user.referral') }}">
        <span class="side-menu__icon lead-3 fa-solid fa-badge-dollar"></span>
        <span class="side-menu__label">{{ __('Affiliate Program') }}</span>
    </a>
</li> -->
        @endif          
                        @endrole
        @role('admin')
            <hr class="w-90 text-center m-auto">
          <!--  <li class="side-item side-item-category mt-4 mb-3">{{ __('Admin Panel') }}</li> -->
            <li class="slide">
                <a class="side-menu__item"  href="{{ route('admin.dashboard') }}">
                    <span class="side-menu__icon fa-solid fa-chart-tree-map"></span>
                    <span class="side-menu__label">{{ __('Dashboard') }}</span>
                </a>
            </li>
	<li class="slide">
    <a class="side-menu__item" data-toggle="slide" href="{{ url('#')}}">
        <span class="side-menu__icon fas fa-users"></span>
        <span class="side-menu__label">{{ __('User Management') }}</span><i class="angle fa fa-angle-right"></i></a>
        <ul class="slide-menu">
          <li><a href="{{ route('admin.user.admin') }}" class="slide-item superadmin" style="color: white!important;">{{ __('Super Admin') }}</a></li>
          <li><a href="{{ route('admin.user.list') }}" class="slide-item client" style="color: white!important;">{{ __('Client') }}</a></li>
          
          <li>
              <span  id="flip"  class="slide-item">  {{ __('Support Dept') }} <i class="fas fa-caret-down" style="
                margin-left: 6%;
            "></i>      </span>
              <ul id="panel">
               <li> <a href="{{ route('admin.managers') }}" class="slide-item">{{ __('Managers') }}</a></li>
               <li><a href="{{ route('admin.executives') }}" class="slide-item">{{ __('Executives') }}</a></li> 
              
              </ul>
          </li>

          <li>
            <span  id="flip_dpt"  class="slide-item">{{ __('Writer Dept') }} <i class="fas fa-caret-down" style="
              margin-left: 6%;
          "></i> </span>
            <ul id="panel_dpt">
             <li> <a href="{{ route('admin.managers') }}" class="slide-item">{{ __('Managers') }}</a></li>
             <li><a href="{{ route('admin.writers') }}" class="slide-item">{{ __('Writers') }}</a></li> 
             <li> <a href="{{ route('admin.proofreaders') }}" class="slide-item">{{ __('Proofreaders') }}</a></li>
             <li><a href="{{ route('admin.supervisors') }}" class="slide-item">{{ __('Supervisors') }}</a></li> 
             <li> <a href="{{ route('admin.trainers') }}" class="slide-item">{{ __('Trainers') }}</a></li>
           
            
            </ul>
        </li>
<!--  -->
      
        </ul>
</li>
<!--  -->

<li class="slide">
    <a class="side-menu__item" data-toggle="slide" href="{{ url('#')}}">
        <span class="side-menu__icon fas fa-cogs"></span>
        <span class="side-menu__label">{{ __('Service Management') }}</span><i class="angle fa fa-angle-right"></i></a>
        <ul class="slide-menu">
            <li><a href="{{ route('admin.services') }}" class="slide-item">{{ __('Services') }}</a></li>
            <li><a href="{{ route('admin.work_levels') }}" class="slide-item">{{ __('Work Levels') }}</a></li>
			<li><a href="{{ route('admin.subjects') }}" class="slide-item">{{ __('Subjects') }}</a></li>
			<li><a href="{{ route('admin.citations') }}" class="slide-item">{{ __('Citations') }}</a></li>
			<li><a href="{{ route('admin.packages') }}" class="slide-item">{{ __('Packages') }}</a></li>
			<li><a href="{{ route('admin.additional_services') }}" class="slide-item">{{ __('Additional Services') }}</a></li>
        </ul>
</li>
<li class="slide">
    <a class="side-menu__item" data-toggle="slide" href="{{ url('#')}}">
        <span class="side-menu__icon fas fa-shopping-cart"></span>
        <span class="side-menu__label">{{ __('Order Management') }}</span><i class="angle fa fa-angle-right"></i></a>
        <ul class="slide-menu">
			<li><a href="{{ route('admin.createManualOrder') }}" class="slide-item">{{ __('Place Manual Order') }}</a></li>
		<li><a href="{{ route('admin.completedManualOrders') }}" class="slide-item">{{ __('Completed Manual Orders') }}</a></li>
			<li><a href="{{ route('admin.orders') }}" class="slide-item">{{ __('New Orders') }}</a></li>
			<li><a href="{{ route('admin.assign') }}" class="slide-item">{{ __('Published Orders') }}</a></li>
			<li><a href="{{ route('admin.inProgress') }}" class="slide-item">{{ __('In Progress ') }}</a></li>
			<li><a href="{{ route('admin.completed') }}" class="slide-item">{{ __('Completed ') }}</a></li>
			<li><a href="{{ route('admin.revisions') }}" class="slide-item">{{ __('Revisions') }}</a></li>
			<li><a href="{{ route('admin.unpaid') }}" class="slide-item">{{ __('Unpaid') }}</a></li>
			<li><a href="{{ route('admin.queryMarked') }}" class="slide-item">{{ __('Query Marked') }}</a></li>
			<li><a href="{{ route('admin.createLiveOrder') }}" class="slide-item">{{ __('Create Live Order') }}</a></li>
			<li><a href="{{ route('admin.liveCompletedOrders') }}" class="slide-item">{{ __('Live Completed Orders') }}</a></li>
        </ul>
</li>

            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="{{ url('#')}}">
                    <span class="side-menu__icon fa-solid fa-sack-dollar"></span>
                    <span class="side-menu__label">{{ __('Finance Management') }}</span>
                    @if (auth()->user()->unreadNotifications->where('type', 'App\Notifications\PayoutRequestNotification')->count())
                        <span class="badge badge-warning">{{ auth()->user()->unreadNotifications->where('type', 'App\Notifications\PayoutRequestNotification')->count() }}</span>
                    @else
                        <i class="angle fa fa-angle-right"></i>
                    @endif
                </a>
                    <ul class="slide-menu">
                        <li><a href="{{ route('admin.finance.dashboard') }}" class="slide-item">{{ __('Finance Dashboard') }}</a></li>
                        <li><a href="{{ route('admin.finance.transactions') }}" class="slide-item">{{ __('Transactions') }}</a></li>
                        <li><a href="{{ route('admin.finance.plans') }}" class="slide-item">{{ __('Subscription Plans') }}</a></li>
                        <li><a href="{{ route('admin.finance.prepaid') }}" class="slide-item">{{ __('Prepaid Plans') }}</a></li>
                        <li><a href="{{ route('admin.finance.subscriptions') }}" class="slide-item">{{ __('Subscribers') }}</a></li>
                        <li><a href="{{ route('admin.finance.promocodes') }}" class="slide-item">{{ __('Promocodes') }}</a></li>
                        <li><a href="{{ route('admin.referral.settings') }}" class="slide-item">{{ __('Referral System') }}</a></li>
                        <li><a href="{{ route('admin.referral.payouts') }}" class="slide-item">{{ __('Referral Payouts') }}
                                @if ((auth()->user()->unreadNotifications->where('type', 'App\Notifications\PayoutRequestNotification')->count()))
                                    <span class="badge badge-warning ml-5">{{ auth()->user()->unreadNotifications->where('type', 'App\Notifications\PayoutRequestNotification')->count() }}</span>
                                @endif
                            </a>
                        </li>
                        <li><a href="{{ route('admin.settings.invoice') }}" class="slide-item">{{ __('Invoice Settings') }}</a></li>
                        <li><a href="{{ route('admin.finance.settings') }}" class="slide-item">{{ __('Payment Settings') }}</a></li>
                    </ul>
            </li>
            <li class="slide">
                <a class="side-menu__item"  href="{{ route('admin.currency_rates') }}">
                    <span class="side-menu__icon fa-solid fa-money-bill"></span>
                    <span class="side-menu__label">{{ __('Currency Rates') }}</span>
                </a>
            </li>
	
            <li class="slide">
                <a class="side-menu__item"  href="{{ route('admin.support') }}">
                    <span class="side-menu__icon fa-solid fa-message-question"></span>
                    <span class="side-menu__label">{{ __('Support Requests') }}</span>
                    @if (App\Models\SupportTicket::where('status', 'Open')->count())
                        <span class="badge badge-warning">{{ App\Models\SupportTicket::where('status', 'Open')->count() }}</span>
                    @endif 
                </a>
            </li>
            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="{{ url('#')}}">
                    <span class="side-menu__icon fa-solid fa-message-exclamation"></span>
                    <span class="side-menu__label">{{ __('Notifications') }}</span>
                        @if (auth()->user()->unreadNotifications->where('type', '<>', 'App\Notifications\GeneralNotification')->count())
                            <span class="badge badge-warning" id="total-notifications-a"></span>
                        @else
                            <i class="angle fa fa-angle-right"></i>
                        @endif
                    </a>                     
                    <ul class="slide-menu">
                        <li><a href="{{ route('admin.notifications') }}" class="slide-item">{{ __('Mass Notifications') }}</a></li>
						<li><a href="{{ route('admin.emails') }}" class="slide-item">{{ __('Emails Data') }}</a></li>
                        <li><a href="{{ route('admin.notifications.system') }}" class="slide-item">{{ __('System Notifications') }} 
                                @if ((auth()->user()->unreadNotifications->where('type', '<>', 'App\Notifications\GeneralNotification')->count()))
                                    <span class="badge badge-warning ml-5" id="total-notifications-b"></span>
                                @endif
                            </a>
                        </li>
                    </ul>
            </li>
		
		 
            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="{{ url('#')}}">
                    <span class="side-menu__icon fa-solid fa-earth-americas"></span>
                    <span class="side-menu__label">{{ __('Frontend Management') }}</span><i class="angle fa fa-angle-right"></i></a>
                    <ul class="slide-menu">
                        <li><a href="{{ route('admin.settings.frontend') }}" class="slide-item">{{ __('Frontend Settings') }}</a></li>
                        <li><a href="{{ route('admin.settings.appearance') }}" class="slide-item">{{ __('SEO & Logos') }}</a></li>                        
                        <li><a href="{{ route('admin.settings.blog') }}" class="slide-item">{{ __('Blogs Manager') }}</a></li>
						<li><a href="{{ route('blogger.blogs') }}" class="slide-item">{{ __('Blog Writers') }}</a></li> 
						
                        <li><a href="{{ route('admin.settings.faq') }}" class="slide-item">{{ __('FAQs Manager') }}</a></li>
                        <li><a href="{{ route('admin.settings.review') }}" class="slide-item">{{ __('Reviews Manager') }}</a></li>
                        <li><a href="{{ route('admin.settings.terms') }}" class="slide-item">{{ __('T&C Pages Manager') }}</a></li>                                  
                        <li><a href="{{ route('admin.settings.adsense') }}" class="slide-item">{{ __('Google Adsense') }}</a></li>                         <li><a href="{{ route('admin.settings.service') }}" class="slide-item">{{ __('Services Manager') }}</a></li> 
                    </ul>
            </li>
            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="{{ url('#')}}">
                    <span class="side-menu__icon fa fa-sliders"></span>
                    <span class="side-menu__label">{{ __('General Settings') }}</span><i class="angle fa fa-angle-right"></i></a>
                    <ul class="slide-menu">
                        <li><a href="{{ route('admin.settings.global') }}" class="slide-item">{{ __('Global Settings') }}</a></li>
                        <li><a href="{{ route('admin.settings.oauth') }}" class="slide-item">{{ __('Auth Settings') }}</a></li>
                        <li><a href="{{ route('admin.settings.registration') }}" class="slide-item">{{ __('Registration Settings') }}</a></li>
                        <li><a href="{{ route('admin.settings.smtp') }}" class="slide-item">{{ __('SMTP Settings') }}</a></li>
                      <!--  <li><a href="{{ route('admin.settings.backup') }}" class="slide-item">{{ __('Database Backup') }}</a></li>
                        <li><a href="{{ route('admin.settings.activation') }}" class="slide-item">{{ __('Activation') }}</a></li>     
                        <li><a href="{{ route('admin.settings.upgrade') }}" class="slide-item">{{ __('Upgrade Software') }}</a></li>   -->              
                        <li><a href="{{ route('admin.settings.clear') }}" class="slide-item">{{ __('Clear Cache') }}</a></li>                 
                    </ul>
            </li>
        @endrole
    </ul>
</aside>
<!-- END SIDE MENU BAR -->