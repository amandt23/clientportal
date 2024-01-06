@extends('layouts.app')
@section('css')
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
@endsection

@section('content')						
    <div class="techSupportContainer">
    <div class="navbar_top_wrapper">

        <div class="navTop">
            <p>Technical Support</p>
            <div class="orderBtn">
                <a href="{{ route('user.support.create') }}">
                        <button>
                            <svg xmlns="http://www.w3.org/2000/svg" width="17" height="15" viewBox="0 0 17 15" fill="none">
                                <path d="M8.49996 14.875C13.1416 14.875 17 11.5062 17 7.4375C17 3.37605 13.1333 0 8.49164 0C3.84163 0 0 3.37605 0 7.4375C0 11.5062 3.84998 14.875 8.49996 14.875ZM8.49996 13.6354C4.56664 13.6354 1.42496 10.8792 1.42496 7.4375C1.42496 4.00312 4.55832 1.23959 8.49164 1.23959C12.4166 1.23959 15.5749 4.00312 15.5833 7.4375C15.5917 10.8792 12.425 13.6354 8.49996 13.6354ZM8.47497 10.901C8.92496 10.901 9.19163 10.6312 9.19163 10.2083V8.05001H11.8C12.2666 8.05001 12.5916 7.83852 12.5916 7.45209C12.5916 7.05832 12.2833 6.8323 11.8 6.8323H9.19163V4.54271C9.19163 4.11251 8.92496 3.85002 8.47497 3.85002C8.0333 3.85002 7.79163 4.1271 7.79163 4.54271V6.8323H5.19163C4.69997 6.8323 4.39164 7.05832 4.39164 7.45209C4.39164 7.83852 4.72497 8.05001 5.19163 8.05001H7.79163V10.2083C7.79163 10.6167 8.0333 10.901 8.47497 10.901Z" fill="white"/>
                            </svg>
                            New Support Request
                        </button>
                    </a>
            </div>
        </div>

        <button id="nav_toggle">
        <i class="fa-solid fa-bars"></i>
        </button>
    </div>
    @if ($tickets && $tickets->count() > 0)
        <div class="techListContainer">
            <h2>My Support Requests</h2>
            <hr>
            <div class="techList">
                <table>
                    <tr>
                        <th>Date - Time</th>
                        <th>Ticket ID</th>
                        <th>Category</th>
                        <th>Subject</th>
                        <th>Status</th>
                    </tr>
                    @forelse ($tickets as $ticket)
                    <tr class='ticket_row' onclick="redirectPage('{!! route('user.support.show', $ticket->ticket_id) !!}')">
                        
                            <!-- <td>{{ $ticket->created_at->format('d M Y H:i A') }}</td> -->
                            <td>{{ \Carbon\Carbon::parse($ticket->created_at)->format('d M Y - h:i A') }}</td>
                            <td>{{ $ticket->ticket_id }}</td>
                            <td>{{ $ticket->category }}</td>
                            <td>{{ $ticket->subject }}</td>
                            <td>
                                <?php if($ticket->status=="Open"){ ?>
                                <button id="techListBtn3" class="techListBtn">{{ $ticket->status }}</button>
                                <?php } else if($ticket->status=="Resolved") { ?>
                                <button id="techListBtn1" class="techListBtn">{{ $ticket->status }}</button>
                                <?php } else if($ticket->status=="Replied") { ?>
                                <button id="techListBtn2" class="techListBtn">{{ $ticket->status }}</button>
                                <?php } ?>
                            </td>
                    
                    </tr>

                    @empty
                        <tr>
                            <td colspan="5">You have no support requests</td>
                        </tr>
                    @endforelse
                </table>
            </div>
            
        </div>
    @else
    <div class="techListContainer">
    <h2>My Support Requests</h2>
    <hr>
    <div class="emptyTicketList">
        <img src="/myperfectwriting\public\img\svgs\repeat_order_icon.svg" alt="">
        <p>You have no Request</p>
        <div class="orderBtn">
                <a href="{{ route('user.support.create') }}">
                        <button>
                            <svg xmlns="http://www.w3.org/2000/svg" width="17" height="15" viewBox="0 0 17 15" fill="none">
                                <path d="M8.49996 14.875C13.1416 14.875 17 11.5062 17 7.4375C17 3.37605 13.1333 0 8.49164 0C3.84163 0 0 3.37605 0 7.4375C0 11.5062 3.84998 14.875 8.49996 14.875ZM8.49996 13.6354C4.56664 13.6354 1.42496 10.8792 1.42496 7.4375C1.42496 4.00312 4.55832 1.23959 8.49164 1.23959C12.4166 1.23959 15.5749 4.00312 15.5833 7.4375C15.5917 10.8792 12.425 13.6354 8.49996 13.6354ZM8.47497 10.901C8.92496 10.901 9.19163 10.6312 9.19163 10.2083V8.05001H11.8C12.2666 8.05001 12.5916 7.83852 12.5916 7.45209C12.5916 7.05832 12.2833 6.8323 11.8 6.8323H9.19163V4.54271C9.19163 4.11251 8.92496 3.85002 8.47497 3.85002C8.0333 3.85002 7.79163 4.1271 7.79163 4.54271V6.8323H5.19163C4.69997 6.8323 4.39164 7.05832 4.39164 7.45209C4.39164 7.83852 4.72497 8.05001 5.19163 8.05001H7.79163V10.2083C7.79163 10.6167 8.0333 10.901 8.47497 10.901Z" fill="white"/>
                            </svg>
                            New Support Request
                        </button>
                    </a>
            </div>
    </div>
    </div>
    @endif

    </div>

    <script>
        $(document).ready(function () {

            $("#nav_toggle").on("click", function (e) {
            $(".sidebar").toggleClass('shown');
            $(this).find('i').toggleClass('fa-bars fa-times');
            });
        });
        function redirectPage(url){
                console.log("clicked")
                window.location.href = `${url}`;
            }
    </script>
@endsection
