@extends('layouts.app')
@section('css')
<!-- Data Table CSS -->
<link href="{{URL::asset('plugins/datatable/datatables.min.css')}}" rel="stylesheet" />
<!-- Sweet Alert CSS -->
<link href="{{URL::asset('plugins/sweetalert/sweetalert2.min.css')}}" rel="stylesheet" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
    div.scroll {
        margin: 4px, 4px;
        padding: 4px;
        background-color: #4eb3c4;
        width: 580px;
        overflow-x: auto;
        overflow-y: hidden;
        white-space: nowrap;
    }

    .table>:not(caption)>*>* {
        padding: 0.5rem 0.5rem;
        background-color: var(--bs-table-bg);
        border-bottom-width: 1px;
        box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);
        color: white;
        font-weight: bold;
    }

    .card-body {
        flex: 1 1 auto;
        margin: 0;
        padding: 1rem 1.5rem;
        position: relative;
        height: 672px !important;
    }

    .btn-success {
        color: #fff;
        background-color: #3b3465 !important;
        border-color: #3b3465 !important;
    }

    label span input {
        z-index: 999;
        line-height: 0;
        font-size: 50px;
        position: absolute;
        top: -2px;
        left: -700px;
        opacity: 0;
        filter: alpha(opacity=0);
        -ms-filter: "alpha(opacity=0)";
        cursor: pointer;
        _cursor: hand;
        margin: 0;
        padding: 0;
    }

    .btnq {
        background-color: DodgerBlue;
        border: none;
        color: white;
        padding: 12px 30px;
        cursor: pointer;
        font-size: 11px;
    }

    /* Darker background on mouse-over */
    .btn:hover {
        background-color: RoyalBlue;
    }

    * {
        margin: 0;
        padding: 0;
    }

    .rate {

        height: 78px;
        padding: 0 10px;
    }

    .rate:not(:checked)>input {
        position: absolute;
        top: -9999px;
    }

    .rate:not(:checked)>label {
        ;
        width: 1em;
        overflow: hidden;
        white-space: nowrap;
        cursor: pointer;
        font-size: 30px;
        color: #ccc;
    }

    .rate:not(:checked)>label:before {
        content: '★ ';
    }

    .rate>input:checked~label {
        color: #ffc700;
    }

    .rate:not(:checked)>label:hover,
    .rate:not(:checked)>label:hover~label {
        color: #deb217;
    }

    .rate>input:checked+label:hover,
    .rate>input:checked+label:hover~label,
    .rate>input:checked~label:hover,
    .rate>input:checked~label:hover~label,
    .rate>label:hover~input:checked~label {
        color: #c59b08;
    }

    /* Modified from: https://github.com/mukulkant/Star-rating-using-pure-css */
</style>
@endsection

@section('page-header')
<!-- PAGE HEADER -->
<div class="page-header mt-5-7">
    <div class="page-leftheader">
		
        <h4 class="page-title mb-0" style="margin-top:2%">
			
			{{ __('Order ID: ') }} {{$order->number}}</h4>
        <h4 class="page-title mb-0">{{ __('Deadline: ') }} {{$order->dead_line}} {{$order->deadline_time}}</h4>
       
	
    </div>

</div>
<!-- END PAGE HEADER -->
@endsection

@section('content')

	<a href="{{route('user.order_details')}}?id={{$order->id}}">Back</a>
<div class="card border-0" style="background-color: #4eb3c4; margin-top:2%!important ;">
    <div class=" card-body pt-2">
        <div class="box-content" style="color: #ffffff;">
            <div class=" text-white ">




                <div class="row">
                    <div class="p-4" id="support-messages-box" style="height:50% !mportant;overflow:scroll;overflow-x:hidden;height: 500px!importnat;/* height: 291px!important; */height: 200px!important;">
                        @foreach($conversations as $conv)
                        <?php $w = Illuminate\Support\Facades\DB::table('writers')->where('username', $conv->sender)->first(); ?>
                        @if($conv->sender == 'admin')
                        <div class="background-white support-message mb-5">
                            <p class="font-weight-bold text-primary fs-11"><i class="fa-sharp fa-solid fa-calendar-clock mr-2"></i>{{ date('Y-m-d h:i:A', strtotime($conv->created_at)) }}
                                <span>MPW</span>
                            </p>
                            <p class="fs-14 text-dark mb-1">{{ $conv->message }}</p>@if ($conv->attachment !=
                            null)

                            <p class="font-weight-bold fs-11 text-primary mb-1">{{ __('Attachment') }}</p>

                            <a class="font-weight-bold fs-11 text-primary" download href="{{ $conv->attachment_path }}">{{ $conv->attachment }}</a>

                            @endif



                        </div>
                        @else
                        <div class="background-white support-message support-response mb-5">
                            <p class="font-weight-bold text-primary fs-11"><i class="fa-sharp fa-solid fa-calendar-clock mr-2"></i>{{ date('Y-m-d h:i:A', strtotime($conv->created_at)) }}
                                <span>{{ __('Your Message') }}</span>
                            </p>

                            <p class="fs-14 text-dark mb-1">{{ $conv->message }}</p>
                            @if ($conv->attachment != null)
                            <p class="font-weight-bold fs-11 text-primary mb-1">{{ __('Attachment') }}</p>
                            <a class="font-weight-bold fs-11 text-primary" download href="{{ $conv->attachment_path }}">{{ $conv->attachment }}</a>
                            @endif
                        </div>
                        @endif
                        @endforeach







                    </div>
                    <form action="{{ route('user.send_message') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="input-box d-flex">
                            <input type="hidden" name="o_id" value="{{$order->id}}">
                            <input type="hidden" name="receiver_id" value="{{$order->staff_id}}">

                            <input type="hidden" name="dt" class="dt">



                            <textarea class="form-control" style="border-radius:10px 0 0 10px !important; " name="message" placeholder="Enter your reply message here..."></textarea>
                            <label style="width:50px" class="filebutton">
                                        <i class="fas fa-paperclip color-dark"
                                            style="margin-left:-26px; margin-top:20px; color:black"></i>
                                        <span><input type="file" id="myfile" name="myfile"></span>
                                    </label>

                            <button class="btn btn-primary" style="border-radius:0 10px 10px 0 !important; "><i class="fas fa-paper-plane"></i></button>

                        </div>
                    </form>

                </div>



            </div>
        </div>
    </div>

</div>


@endsection

@section('js')


    <script>
        const now = new Date();
        const year = now.getFullYear();
        const month = String(now.getMonth() + 1).padStart(2, '0');
        const day = String(now.getDate()).padStart(2, '0');
        const hours = String(now.getHours()).padStart(2, '0');
        const minutes = String(now.getMinutes()).padStart(2, '0');
        const seconds = String(now.getSeconds()).padStart(2, '0');

        const formattedDateTime = `${year}-${month}-${day} ${hours}:${minutes}:${seconds}`;
        $('.dt').val(formattedDateTime);
    </script>
    @endsection