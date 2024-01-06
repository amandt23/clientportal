@extends('layouts.app')
@section('css')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
@endsection
@section('content')
    <div class="mainHomeContainer">
        <div class="topNav">
        		<h1>Notification</h1>
                <button id="nav_toggle">
                <i class="fa-solid fa-bars"></i>
                </button>
        	</div>
        <div class="notificationContainer">
            <h2>Unread Notifications</h2>
            <div class="notBox">
                <div class="notTop">
                    <h1>Date/Time</h1>
                    <h1>Order ID</h1>
                    <h1>Subject</h1>
					<button id="markAllReadBtn">Mark All Read</button>
                </div>
                <hr>

                <div class="notBoxMessageContainer">
                    @foreach($data as $notification)
                        @if(is_null($notification['read-on']))
                            <div class="oneNot">
                                <center><p>{{ $notification['created-on'] }}</p></center>
                                <center><h1>{{ $notification['order_id'] }}</h1></center>
                                <center><p>{{ $notification['message'] }}</p></center>
                                <button class="markAsReadBtn" data-id="{{ $notification['id'] }}">Mark As Read</button>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>

        <!-- read notification -->
        <div class="notificationContainer readNotBox">
            <h2>Read Notifications</h2>
            <div id="readOneNotBox" class="notBox">

                <div class="notTop">
                    <h3 class="table_cell">Date/Time</h3>
                    <h3 class="table_cell">Order ID</h3>
                    <h3 class="table_cell">Subject</h3>
                </div>
                <div class="notBoxMessageContainer">
                    @foreach($data as $notification)
                        @if(!is_null($notification['read-on']))
                            <div class="oneNot" style="background: #d1d1d1 !important">
                                <div class="table_cell">{{ $notification['created-on'] }}</div>
                                <div class="table_cell">{{ $notification['order_id'] }}</div>
                                <div class="table_cell">{{ $notification['message'] }}</div>
                            </div>
                        @endif
                    @endforeach
                </div>
                <!-- <table>
                    <thead>
                        <tr class="notTop">
                            <th>Date/Time</th>
                            <th>Order ID</th>
                            <th>Subject</th>
                        </tr>
                    </thead>
                    <div>
                        <tbody class="table_body">
                        @foreach($data as $notification)
                            @if(!is_null($notification['read-on']))
                                <tr style="background: #d1d1d1 !important">
                                    <td>{{ $notification['created-on'] }}</td>
                                    <td><h1>{{ $notification['order_id'] }}</h1></td>
                                    <td>{{ $notification['message'] }}</td>
                                </tr>
                            @endif
                        @endforeach
                        </tbody>
                    </div>
                </table> -->
                <!-- <div class="notTop">
                    <h1>Date/Time</h1>
                    <h1>Order ID</h1>
                    <h1>Subject</h1>
                </div>
                <hr>

                <div class="notBoxMessageContainer">
                    @foreach($data as $notification)
                        @if(!is_null($notification['read-on']))
                            <div class="oneNot" style="background: #d1d1d1 !important">
                                <p>{{ $notification['created-on'] }}</p>
                                <h1>{{ $notification['order_id'] }}</h1>
                                <p>{{ $notification['message'] }}</p>
                            </div>
                        @endif
                    @endforeach
                </div> -->
            </div>
        </div>
    </div>

    <script>
    $(document).ready(function () {

        $("#nav_toggle").on("click", function (e) {
       $(".sidebar").toggleClass('shown');
       $(this).find('i').toggleClass('fa-bars fa-times');
    });
        // Mark All Read Button Click Event
        $('#markAllReadBtn').on('click', function () {
            // Send AJAX request to mark all notifications as read
            $.ajax({
                url: '{{ route('user.notifications.markAllRead') }}',
                type: 'GET',
                success: function () {
                    // Reload the page after marking all as read
                    location.reload();
                }
            });
        });

			// Mark As Read Button Click Event
			$('.markAsReadBtn').on('click', function () {
            var notificationId = $(this).data('id');
            
            // Include CSRF token
            var csrfToken = '{{ csrf_token() }}';

            // Send AJAX request to mark a specific notification as read
            $.ajax({
                url: '{{ route('user.notifications.mark') }}',
                type: 'POST',
                data: { id: notificationId },
                headers: {
                    'X-CSRF-TOKEN': csrfToken // Include CSRF token in the headers
                },
                success: function () {
                    // Reload the page after marking as read
                    location.reload();
                }
            });
        });
		});
	 </script>


@endsection
