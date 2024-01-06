@extends('layouts.app')

@section('css')
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<style>


</style>
@endsection

@section('content')
<!-- mid section  -->
        <div class="home-navbar">
            <div class="navStaticTop">
                <div class="navbar_top_wrapper">

                <div class="navTop">
                    <p>My Orders</p>
                    <div class="orderBtn ">
                        <svg xmlns="http://www.w3.org/2000/svg" width="21" height="19" viewBox="0 0 21 19" fill="none">
                            <path
                                d="M10.5 18.375C16.2338 18.375 21 14.2136 21 9.1875C21 4.17041 16.2235 0 10.4897 0C4.74554 0 0 4.17041 0 9.1875C0 14.2136 4.75586 18.375 10.5 18.375ZM10.5 16.8437C5.64114 16.8437 1.76024 13.439 1.76024 9.1875C1.76024 4.94503 5.63086 1.53126 10.4897 1.53126C15.3382 1.53126 19.2396 4.94503 19.25 9.1875C19.2603 13.439 15.3485 16.8437 10.5 16.8437ZM10.4691 13.466C11.0249 13.466 11.3544 13.1327 11.3544 12.6103V9.94413H14.5764C15.1529 9.94413 15.5544 9.68288 15.5544 9.20552C15.5544 8.7191 15.1735 8.4399 14.5764 8.4399H11.3544V5.61158C11.3544 5.08016 11.0249 4.75591 10.4691 4.75591C9.92349 4.75591 9.62495 5.09818 9.62495 5.61158V8.4399H6.41319C5.80585 8.4399 5.42496 8.7191 5.42496 9.20552C5.42496 9.68288 5.83672 9.94413 6.41319 9.94413H9.62495V12.6103C9.62495 13.1147 9.92349 13.466 10.4691 13.466Z"
                                fill="white" />
                        </svg>
						<a href="{{ route('user.services') }}"><button>Place Order</button></a>
                    </div>
                </div>

                <button id="nav_toggle">
                <i class="fa-solid fa-bars"></i>
                </button>
                </div>

                <div class="menu">
                    <div class="menuLeft">
                        <ul>
                            <li onclick="showSection('home')" id="homeLink" class="active">Active <span>
								<?php
          $comps = Illuminate\Support\Facades\DB::table('orders')->whereIn('order_status_id',[1,2,3,7])->where('customer_id',auth()->user()->id)->where('payment_status',1)->count();
      echo $comps;
        ?>
								</span></li>
                            <li onclick="showSection('active')" id="activeLink">Completed<span>
								<?php
          $comps = Illuminate\Support\Facades\DB::table('orders')->whereIn('order_status_id',[5])->where('customer_id',auth()->user()->id)->where('payment_status',1)->count();
      echo $comps;
        ?>
								</span>
							</li>
							<li onclick="showSection('drafts')" id="draftsLink">Drafts<span>
								<?php
          $comps = Illuminate\Support\Facades\DB::table('orders')->whereIn('order_status_id',[1])->where('customer_id',auth()->user()->id)->where('payment_status',0)->count();
      echo $comps;
        ?>
								</span>
							</li>
                        </ul>
                    </div>
                  
                </div>
                <hr />
                <div class="notice">
                    <p>We use nickname, not real name, for company communication to protect your privacy and
                        confidentiality.</p>
                </div>
            </div>

            <div id="home" class="PlaceOrder">
   

                <!-- data table  -->
                <table id='listUsersTable' class="display table" style="width:100%">
                    <thead>
         
                        <tr>
                            <th>Order Id</th>
                            <th>Service Type</th>
                            <th>Date</th>
                            <th>Deadline</th>
                            <th>Status</th>
                            <th>Writer</th>
                        </tr>
                 
                    </thead>
                    <tbody>

                    </tbody>

                </table>

                <!-- </div> -->
            </div>

            <section id="active" class="hidden midSect">
				
				<?php
          $comps = Illuminate\Support\Facades\DB::table('orders')->whereIn('order_status_id',[5])->where('customer_id',auth()->user()->id)->where('payment_status',1)->count();
     if($comps=="0"){
        ?>
				
                <div class="placeOrderBtns">
                    <svg xmlns="http://www.w3.org/2000/svg" width="93" height="93" viewBox="0 0 93 93" fill="none">
                        <path
                            d="M24.4105 39.0568C24.4092 38.4151 24.5353 37.7795 24.7817 37.187C25.0282 36.5944 25.3899 36.0567 25.8459 35.6052L40.4873 20.9589C40.9377 20.4926 41.4764 20.1207 42.072 19.8648C42.6676 19.6089 43.3083 19.4742 43.9565 19.4686C44.6048 19.463 45.2476 19.5865 45.8476 19.832C46.4476 20.0775 46.9927 20.44 47.4511 20.8984C47.9095 21.3568 48.272 21.9019 48.5175 22.5018C48.763 23.1018 48.8865 23.7447 48.8809 24.393C48.8752 25.0412 48.7406 25.6818 48.4847 26.2775C48.2288 26.8731 47.8569 27.4118 47.3906 27.8622L41.078 34.1747H70.7905C74.0276 34.1747 77.132 32.8888 79.421 30.5999C81.7099 28.311 82.9958 25.2065 82.9958 21.9695C82.9958 18.7324 81.7099 15.628 79.421 13.339C77.132 11.0501 74.0276 9.76421 70.7905 9.76421C69.4957 9.76421 68.2539 9.24985 67.3384 8.33428C66.4228 7.4187 65.9084 6.17692 65.9084 4.88211C65.9084 3.58729 66.4228 2.34551 67.3384 1.42994C68.2539 0.514363 69.4957 0 70.7905 0C82.903 0 92.76 9.85209 92.76 21.9695C92.76 34.082 82.903 43.9389 70.7905 43.9389H41.078L47.3906 50.2515C48.0789 50.9328 48.5488 51.8037 48.7404 52.753C48.932 53.7024 48.8366 54.6873 48.4664 55.5823C48.0962 56.4772 47.4678 57.2417 46.6615 57.7782C45.8552 58.3148 44.9074 58.5991 43.9389 58.595C43.2982 58.5944 42.6639 58.4673 42.0725 58.221C41.481 57.9747 40.944 57.614 40.4922 57.1597L25.8459 42.5134C25.3903 42.0587 25.0301 41.5176 24.7864 40.9218C24.5391 40.3311 24.4113 39.6972 24.4105 39.0568ZM9.76421 14.6463V68.3495H26.8516C30.6352 68.3495 33.6279 71.5814 36.2545 74.4228L36.7915 75.0087C38.5784 76.9176 41.1171 78.1137 43.9389 78.1137C46.7608 78.1137 49.2995 76.9176 51.0815 75.0038L51.6185 74.4228H51.6234C54.25 71.5814 57.2427 68.3495 61.0263 68.3495H78.1137V58.5853C78.1137 57.2905 78.628 56.0487 79.5436 55.1331C80.4592 54.2175 81.701 53.7032 82.9958 53.7032C84.2906 53.7032 85.5324 54.2175 86.448 55.1331C87.3635 56.0487 87.8779 57.2905 87.8779 58.5853V85.4368C87.8779 87.3791 87.1063 89.2417 85.733 90.6151C84.3596 91.9885 82.497 92.76 80.5547 92.76H7.32316C5.38094 92.76 3.51826 91.9885 2.1449 90.6151C0.771545 89.2417 0 87.3791 0 85.4368V12.2053C0 10.263 0.771545 8.40037 2.1449 7.02701C3.51826 5.65365 5.38094 4.88211 7.32316 4.88211H29.2926C30.5874 4.88211 31.8292 5.39647 32.7448 6.31204C33.6604 7.22761 34.1747 8.4694 34.1747 9.76421C34.1747 11.059 33.6604 12.3008 32.7448 13.2164C31.8292 14.132 30.5874 14.6463 29.2926 14.6463H9.76421Z"
                            fill="#EFEFEF" />
                    </svg>
                    <p>You have no completed order</p>
                    <div class="new-orderBtn">
                        <svg xmlns="http://www.w3.org/2000/svg" width="21" height="19" viewBox="0 0 21 19" fill="none">
                            <path
                                d="M10.5 18.375C16.2338 18.375 21 14.2136 21 9.1875C21 4.17041 16.2235 0 10.4897 0C4.74554 0 0 4.17041 0 9.1875C0 14.2136 4.75586 18.375 10.5 18.375ZM10.5 16.8437C5.64114 16.8437 1.76024 13.439 1.76024 9.1875C1.76024 4.94503 5.63086 1.53126 10.4897 1.53126C15.3382 1.53126 19.2396 4.94503 19.25 9.1875C19.2603 13.439 15.3485 16.8437 10.5 16.8437ZM10.4691 13.466C11.0249 13.466 11.3544 13.1327 11.3544 12.6103V9.94413H14.5764C15.1529 9.94413 15.5544 9.68288 15.5544 9.20552C15.5544 8.7191 15.1735 8.4399 14.5764 8.4399H11.3544V5.61158C11.3544 5.08016 11.0249 4.75591 10.4691 4.75591C9.92349 4.75591 9.62495 5.09818 9.62495 5.61158V8.4399H6.41319C5.80585 8.4399 5.42496 8.7191 5.42496 9.20552C5.42496 9.68288 5.83672 9.94413 6.41319 9.94413H9.62495V12.6103C9.62495 13.1147 9.92349 13.466 10.4691 13.466Z"
                                fill="white" />
                        </svg>
                        <button>Place Order</button>
                    </div>
                </div>
				
				<?php } else { ?>
				
				<div class="PlaceOrder" style="margin-bottom: -29px;">
				
				 <!-- data table  -->
                <table id='completedTable' class="display table" style="width:100%">
                    <thead>
         
                        <tr>
                            <th>Order Id</th>
                            <th>Service Type</th>
                            <th>Date</th>
                            <th>Deadline</th>
                            <th>Status</th>
                            <th>Writer</th>
                        </tr>
                 
                    </thead>
                    <tbody>

                    </tbody>

                </table>
					
				</div>
				
				<?php } ?>
				
            </section>

            <section id="drafts" class="hidden midSect">
				<?php
          $comps = Illuminate\Support\Facades\DB::table('orders')->whereIn('order_status_id',[1])->where('customer_id',auth()->user()->id)->where('payment_status',0)->count();
      if($comps=="0"){
        ?>
                <div class="placeOrderBtns">
                    <svg xmlns="http://www.w3.org/2000/svg" width="93" height="93" viewBox="0 0 93 93" fill="none">
                        <path
                            d="M24.4105 39.0568C24.4092 38.4151 24.5353 37.7795 24.7817 37.187C25.0282 36.5944 25.3899 36.0567 25.8459 35.6052L40.4873 20.9589C40.9377 20.4926 41.4764 20.1207 42.072 19.8648C42.6676 19.6089 43.3083 19.4742 43.9565 19.4686C44.6048 19.463 45.2476 19.5865 45.8476 19.832C46.4476 20.0775 46.9927 20.44 47.4511 20.8984C47.9095 21.3568 48.272 21.9019 48.5175 22.5018C48.763 23.1018 48.8865 23.7447 48.8809 24.393C48.8752 25.0412 48.7406 25.6818 48.4847 26.2775C48.2288 26.8731 47.8569 27.4118 47.3906 27.8622L41.078 34.1747H70.7905C74.0276 34.1747 77.132 32.8888 79.421 30.5999C81.7099 28.311 82.9958 25.2065 82.9958 21.9695C82.9958 18.7324 81.7099 15.628 79.421 13.339C77.132 11.0501 74.0276 9.76421 70.7905 9.76421C69.4957 9.76421 68.2539 9.24985 67.3384 8.33428C66.4228 7.4187 65.9084 6.17692 65.9084 4.88211C65.9084 3.58729 66.4228 2.34551 67.3384 1.42994C68.2539 0.514363 69.4957 0 70.7905 0C82.903 0 92.76 9.85209 92.76 21.9695C92.76 34.082 82.903 43.9389 70.7905 43.9389H41.078L47.3906 50.2515C48.0789 50.9328 48.5488 51.8037 48.7404 52.753C48.932 53.7024 48.8366 54.6873 48.4664 55.5823C48.0962 56.4772 47.4678 57.2417 46.6615 57.7782C45.8552 58.3148 44.9074 58.5991 43.9389 58.595C43.2982 58.5944 42.6639 58.4673 42.0725 58.221C41.481 57.9747 40.944 57.614 40.4922 57.1597L25.8459 42.5134C25.3903 42.0587 25.0301 41.5176 24.7864 40.9218C24.5391 40.3311 24.4113 39.6972 24.4105 39.0568ZM9.76421 14.6463V68.3495H26.8516C30.6352 68.3495 33.6279 71.5814 36.2545 74.4228L36.7915 75.0087C38.5784 76.9176 41.1171 78.1137 43.9389 78.1137C46.7608 78.1137 49.2995 76.9176 51.0815 75.0038L51.6185 74.4228H51.6234C54.25 71.5814 57.2427 68.3495 61.0263 68.3495H78.1137V58.5853C78.1137 57.2905 78.628 56.0487 79.5436 55.1331C80.4592 54.2175 81.701 53.7032 82.9958 53.7032C84.2906 53.7032 85.5324 54.2175 86.448 55.1331C87.3635 56.0487 87.8779 57.2905 87.8779 58.5853V85.4368C87.8779 87.3791 87.1063 89.2417 85.733 90.6151C84.3596 91.9885 82.497 92.76 80.5547 92.76H7.32316C5.38094 92.76 3.51826 91.9885 2.1449 90.6151C0.771545 89.2417 0 87.3791 0 85.4368V12.2053C0 10.263 0.771545 8.40037 2.1449 7.02701C3.51826 5.65365 5.38094 4.88211 7.32316 4.88211H29.2926C30.5874 4.88211 31.8292 5.39647 32.7448 6.31204C33.6604 7.22761 34.1747 8.4694 34.1747 9.76421C34.1747 11.059 33.6604 12.3008 32.7448 13.2164C31.8292 14.132 30.5874 14.6463 29.2926 14.6463H9.76421Z"
                            fill="#EFEFEF" />
                    </svg>
                    <p>You have no drafts</p>
                    <div class="new-orderBtn">
                        <svg xmlns="http://www.w3.org/2000/svg" width="21" height="19" viewBox="0 0 21 19" fill="none">
                            <path
                                d="M10.5 18.375C16.2338 18.375 21 14.2136 21 9.1875C21 4.17041 16.2235 0 10.4897 0C4.74554 0 0 4.17041 0 9.1875C0 14.2136 4.75586 18.375 10.5 18.375ZM10.5 16.8437C5.64114 16.8437 1.76024 13.439 1.76024 9.1875C1.76024 4.94503 5.63086 1.53126 10.4897 1.53126C15.3382 1.53126 19.2396 4.94503 19.25 9.1875C19.2603 13.439 15.3485 16.8437 10.5 16.8437ZM10.4691 13.466C11.0249 13.466 11.3544 13.1327 11.3544 12.6103V9.94413H14.5764C15.1529 9.94413 15.5544 9.68288 15.5544 9.20552C15.5544 8.7191 15.1735 8.4399 14.5764 8.4399H11.3544V5.61158C11.3544 5.08016 11.0249 4.75591 10.4691 4.75591C9.92349 4.75591 9.62495 5.09818 9.62495 5.61158V8.4399H6.41319C5.80585 8.4399 5.42496 8.7191 5.42496 9.20552C5.42496 9.68288 5.83672 9.94413 6.41319 9.94413H9.62495V12.6103C9.62495 13.1147 9.92349 13.466 10.4691 13.466Z"
                                fill="white" />
                        </svg>
                        <button>Place Order</button>
                    </div>
                </div>
				<?php } else { ?>
				
				<div class="PlaceOrder" style="margin-bottom: -29px;">
				
				 <!-- data table  -->
                <table id='draftsTable' class="display table" style="width:100%">
                    <thead>
         
                        <tr>
                            <th>Order Id</th>
                            <th>Service Type</th>
							<th>Date</th>
                            <th>Deadline</th>
                            <th>Status</th>
                            
                        </tr>
                 
                    </thead>
                    <tbody>

                    </tbody>

                </table>
					
				</div>
				
				<?php } ?>
            </section>
        </div>



 
   <script>


    // toggle navbar

    $("#nav_toggle").on("click", function (e) {
       $(".sidebar").toggleClass('shown');
       $(this).find('i').toggleClass('fa-bars fa-times');
    });

	   
	var url = "";
	   
    function showProfileDropDown() {
        var profileDropDown = document.querySelector('.profileDropDown');
        profileDropDown.style.display = 'block';
    }

    function hideProfileDropDown() {
        var profileDropDown = document.querySelector('.profileDropDown');
        profileDropDown.style.display = 'none';
    }


    function showSection(sectionId) {
        // Hide all sections
        const sections = document.querySelectorAll('section');
        sections.forEach(section => {
            section.classList.add('hidden');
        });

        // Show the selected section
        const selectedSection = document.getElementById(sectionId);
        if (selectedSection) {
            selectedSection.classList.remove('hidden');

            // Hide other sections based on the selected one
            if (sectionId === 'active') {
                const homeSection = document.getElementById('home');
                if (homeSection) {
                    homeSection.classList.add('hidden');
                }
                const draftsSection = document.getElementById('drafts');
                if (draftsSection) {
                    draftsSection.classList.add('hidden');
                }

                // Add the 'active' class to the active menu item
                document.getElementById('activeLink').classList.add('active');
                // Remove 'active' class from other menu items
                document.getElementById('homeLink').classList.remove('active');
                document.getElementById('draftsLink').classList.remove('active');
					completedOrders();
				
            } else if (sectionId === 'drafts') {
                const homeSection = document.getElementById('home');
                if (homeSection) {
                    homeSection.classList.add('hidden');
                }
                const activeSection = document.getElementById('active');
                if (activeSection) {
                    activeSection.classList.add('hidden');
                }

                // Add the 'active' class to the drafts menu item
                document.getElementById('draftsLink').classList.add('active');
                // Remove 'active' class from other menu items
                document.getElementById('homeLink').classList.remove('active');
                document.getElementById('activeLink').classList.remove('active');
				
				draftsOrders();
				
            } else {
                // Add the 'active' class to the home menu item
                document.getElementById('homeLink').classList.add('active');
                // Remove 'active' class from other menu items
                document.getElementById('activeLink').classList.remove('active');
                document.getElementById('draftsLink').classList.remove('active');
				activeOrders();
			
            }
            // Add more conditions for additional sections
        }
    }
	   $('#listUsersTable').DataTable().destroy();
	  var table = $('#listUsersTable').DataTable({
    "lengthMenu": [[10, 50, 100, -1], [25, 50, 100, "All"]],
	"lengthChange": false,
    responsive: true,
    colReorder: true,
    "scrollY": "300px",
    "iDisplayLength": 5,
    "order": [[ 0, "desc" ]],
    language: {
        search: "<i class='fa fa-search search-icon'></i>",
        lengthMenu: '_MENU_ ',
        paginate : {
            first    : '<i class="fa fa-angle-double-left"></i>',
            last     : '<i class="fa fa-angle-double-right"></i>',
            previous : '<i class="fa fa-angle-left"></i>',
            next     : '<i class="fa fa-angle-right"></i>'
        }
    },
    pagingType : 'full_numbers',
    processing: true,
    serverSide: true,
    ajax: "{{ route('user.my_inProcess_orders') }}",
    columns: [
        {
            data: 'order_id',
            name: 'order_id',
            orderable: true,
            searchable: true
        },
        {
            data: 'service',
            name: 'service',
            orderable: true,
            searchable: true
        },
        {
            data: 'posted',
            name: 'posted',
            orderable: true,
            searchable: true
        },
        {
            data: 'deadline',
            name: 'deadline',
            orderable: true,
            searchable: true
        },
        {
            data: 'status',
            name: 'status',
            orderable: true,
            searchable: true
        },
        {
            data: 'assigned',
            name: 'assigned',
            orderable: true,
            searchable: true
        },
    ],
    createdRow: function (row, data, dataIndex) {
	
        // Customize the HTML structure for each row
        $('td:eq(0)', row).html('<div id="orderId"><button>' + data.order_id + '</button></div>');
		if(data.order_status_id=="1"){

			$('td:eq(4)', row).html('<div id="statusBtnDiv"><button id="statusBTNNew" >' + data.status + '</button></div>');
		}
		if(data.order_status_id=="5"){
			$('td:eq(4)', row).html('<div id="statusBtnDiv"><button id="statusBTN" >' + data.status + '</button></div>');
		}
		if(data.order_status_id=="3"){
			$('td:eq(4)', row).html('<div id="statusBtnDiv"><button id="statusBTNProof" >' + data.status + '</button></div>');
		}
		if(data.order_status_id=="7"){
			$('td:eq(4)', row).html('<div id="statusBtnDiv"><button id="statusBTNProof" >' + data.status + '</button></div>');
		}
		if(data.order_status_id=="2"){
			$('td:eq(4)', row).html('<div id="statusBtnDiv"><button id="statusBTNInProgress" >' + data.status + '</button></div>');
		}
		if(data.order_status_id=="4"){
			$('td:eq(4)', row).html('<div id="statusBtnDiv"><button id="statusBTNRevision" >' + data.status + '</button></div>');
		}
		if(data.order_status_id=="9"){
			$('td:eq(4)', row).html('<div id="statusBtnDiv"><button id="statusBTNUnpaid" >' + data.status + '</button></div>');
		}
        
    }
});

	   
	   function draftsOrders(){
		   
		   $('#draftsTable').DataTable().destroy();
		   
		   var table = $('#draftsTable').DataTable({
    "lengthMenu": [[10, 50, 100, -1], [25, 50, 100, "All"]],
	"lengthChange": false,
    responsive: true,
    colReorder: true,
	"scrollY": "300px",
    "iDisplayLength": 5,
    "order": [[ 0, "desc" ]],
    language: {
        search: "<i class='fa fa-search search-icon'></i>",
        lengthMenu: '_MENU_ ',
        paginate : {
            first    : '<i class="fa fa-angle-double-left"></i>',
            last     : '<i class="fa fa-angle-double-right"></i>',
            previous : '<i class="fa fa-angle-left"></i>',
            next     : '<i class="fa fa-angle-right"></i>'
        }
    },
    pagingType : 'full_numbers',
    processing: true,
    serverSide: true,
    ajax: "{{ route('user.my_unpaid_orders') }}",
    columns: [
        {
            data: 'order_id',
            name: 'order_id',
            orderable: true,
            searchable: true
        },
        {
            data: 'service',
            name: 'service',
            orderable: true,
            searchable: true
        },
        {
            data: 'posted',
            name: 'posted',
            orderable: true,
            searchable: true
        },
        {
            data: 'deadline',
            name: 'deadline',
            orderable: true,
            searchable: true
        },
        {
            data: 'status',
            name: 'status',
            orderable: true,
            searchable: true
        },
       
    ],
    createdRow: function (row, data, dataIndex) {
		
        // Customize the HTML structure for each row
        $('td:eq(0)', row).html('<div id="orderId"><button>' + data.order_id + '</button></div>');
		if(data.order_status_id=="1"){

			$('td:eq(4)', row).html('<div id="statusBtnDiv"><button id="statusBTNNew">Unpaid</button></div>');
		}
		if(data.order_status_id=="5"){
			$('td:eq(4)', row).html('<div id="statusBtnDiv"><button id="statusBTN">' + data.status + '</button></div>');
		}
		if(data.order_status_id=="3"){
			$('td:eq(4)', row).html('<div id="statusBtnDiv"><button id="statusBTNProof">' + data.status + '</button></div>');
		}
		if(data.order_status_id=="2"){
			$('td:eq(4)', row).html('<div id="statusBtnDiv"><button id="statusBTNInProgress">' + data.status + '</button></div>');
		}
		if(data.order_status_id=="4"){
			$('td:eq(4)', row).html('<div id="statusBtnDiv"><button id="statusBTNRevision">' + data.status + '</button></div>');
		}
		if(data.order_status_id=="9"){
			$('td:eq(4)', row).html('<div id="statusBtnDiv"><button id="statusBTNUnpaid">Unpaid</button></div>');
		}
        
    }
});
		   
	   }
	   
	   function completedOrders(){
		   
		   $('#completedTable').DataTable().destroy();
		   
		   var table = $('#completedTable').DataTable({
    "lengthMenu": [[10, 50, 100, -1], [25, 50, 100, "All"]],
	"lengthChange": false,
    responsive: true,
    colReorder: true,
	"iDisplayLength": 5,
    "scrollY": "300px",
    "order": [[ 0, "desc" ]],
    language: {
        search: "<i class='fa fa-search search-icon'></i>",
        lengthMenu: '_MENU_ ',
        paginate : {
            first    : '<i class="fa fa-angle-double-left"></i>',
            last     : '<i class="fa fa-angle-double-right"></i>',
            previous : '<i class="fa fa-angle-left"></i>',
            next     : '<i class="fa fa-angle-right"></i>'
        }
    },
    pagingType : 'full_numbers',
    processing: true,
    serverSide: true,
    ajax: "{{ route('user.my_completed_orders') }}",
    columns: [
        {
            data: 'order_id',
            name: 'order_id',
            orderable: true,
            searchable: true
        },
        {
            data: 'service',
            name: 'service',
            orderable: true,
            searchable: true
        },
        {
            data: 'posted',
            name: 'posted',
            orderable: true,
            searchable: true
        },
        {
            data: 'deadline',
            name: 'deadline',
            orderable: true,
            searchable: true
        },
        {
            data: 'status',
            name: 'status',
            orderable: true,
            searchable: true
        },
        {
            data: 'assigned',
            name: 'assigned',
            orderable: true,
            searchable: true
        },
    ],
    createdRow: function (row, data, dataIndex) {
	
        // Customize the HTML structure for each row
        $('td:eq(0)', row).html('<div id="orderId"><button>' + data.order_id + '</button></div>');
		if(data.order_status_id=="1"){

			$('td:eq(4)', row).html('<div id="statusBtnDiv"><button id="statusBTNNew">' + data.status + '</button></div>');
		}
		if(data.order_status_id=="5"){
			$('td:eq(4)', row).html('<div id="statusBtnDiv"><button id="statusBTN">' + data.status + '</button></div>');
		}
		if(data.order_status_id=="3"){
			$('td:eq(4)', row).html('<div id="statusBtnDiv"><button id="statusBTNProof">' + data.status + '</button></div>');
		}
		if(data.order_status_id=="2"){
			$('td:eq(4)', row).html('<div id="statusBtnDiv"><button id="statusBTNInProgress">' + data.status + '</button></div>');
		}
		if(data.order_status_id=="4"){
			$('td:eq(4)', row).html('<div id="statusBtnDiv"><button id="statusBTNRevision">' + data.status + '</button></div>');
		}
		if(data.order_status_id=="9"){
			$('td:eq(4)', row).html('<div id="statusBtnDiv"><button id="statusBTNUnpaid">' + data.status + '</button></div>');
		}
		
		if(data.is_opened=="0"){
			$(row).css('background-color', 'rgb(197, 235, 197)');
		}
        
    }
});
		   
	   }
	   


</script>


@endsection
