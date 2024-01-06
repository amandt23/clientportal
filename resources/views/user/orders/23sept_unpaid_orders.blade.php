@extends('layouts.app')

@section('css')
<!-- Data Table CSS -->
<link href="{{URL::asset('plugins/datatable/datatables.min.css')}}" rel="stylesheet" />
<!-- Sweet Alert CSS -->
<link href="{{URL::asset('plugins/sweetalert/sweetalert2.min.css')}}" rel="stylesheet" />
@endsection

@section('page-header')
<!-- PAGE HEADER -->
<div class="page-header mt-5-7">
  <div class="page-leftheader">
    <h4 class="page-title mb-0">{{ __('All Unpaid Orders') }}</h4>
    <ol class="breadcrumb mb-2">
      <li class="breadcrumb-item"><a href="{{ route('user.dashboard') }}"><i class="fa-solid fa-id-badge mr-2 fs-12"></i>{{ __('Dashboard') }}</a></li>
      <li class="breadcrumb-item" aria-current="page">{{ __('Orders List') }}</li>
    </ol>
  </div>

</div>
<!-- END PAGE HEADER -->
@endsection

@section('content')
<!-- USERS LIST DATA TABEL -->
<div class="row">
  <div class="col-lg-12 col-md-12 col-xm-12">
    <div class="card border-0">

      <div class="card-body pt-2">
        <!-- BOX CONTENT -->
        <div class="box-content">

          <!-- DATATABLE -->
          <table id='listUsersTable' class='table listUsersTable' width='100%'>
            <thead>
              <tr>
                <th width="25%">Order ID</th>
                <th width="25%">Posted</th>
                <th width="25%">Education Level</th>
                <th width="25%">Payment Status</th>
                <th width="25%">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($orders as $order)
              <tr class="clickable-row" data-order-id="{{$order->id}}">
                <td>
                  {{__($order->number)}}
                </td>
                <td>
                  {{date('Y-m-d',strtotime($order->created_at))}}
                </td>
                <td>
                  <?php $service = Illuminate\Support\Facades\DB::table('work_levels')->where('id', $order->work_level_id)->first(); ?>
                  {{$service->name}}
                </td>

                <td>
                  Unpaid
                </td>
                <td>
                  <a href="{{route('user.edit_unpaid_order',$order->id)}}"><i class="fa fa-edit text-info"></i></a>
                </td>
              </tr>
              <tr class="details-row" id="extra-details{{$order->id}}" style="display: none;">
                <td colspan="2" class="p-3">
                  <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card border-0" style="background-color: #3C3465;">
                      <div class="card-body pt-2">
                        <div class="box-content" style="color: #ffffff;">
                          <div class=" text-white ">

                            <h3 class="page-title">Personal Information</h3>
                            <p>Name<span class="float-right">

                                {{__(auth()->user()->name)}}
                              </span>
                            </p>
                            <p>
                              Email
                              <span class="float-right">
                                {{__(auth()->user()->email)}}
                              </span>
                            </p>
                            <p>
                              Username
                              <span class="float-right">
                                {{__(auth()->user()->username)}}
                              </span>
                            </p>

                            <br><br><br><br>
                            <a href="{{route('user.pay_now')}}?id={{$order->id}}" class="btn btn-primary"> Pay Now </a>






                          </div>
                        </div>
                      </div>
                    </div>
                  </div>


                </td>
                <td colspan="3">
                  <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card border-0" style="background-color: #3C3465;">
                      <div class="card-body pt-2">
                        <div class="box-content" style="color: #ffffff;">
                          <div class=" text-white ">

                            <h3 class="page-title">Order Details</h3>
                            <p>
                              Title
                              <span class="float-right" id="btitle"> {{$order->title}} </span>
                            </p>

                            <p>
                              Amount
                              <span class="float-right"><i class="fa {{format_amount(1)['icon']}}"></i><span id="btotal">{{$order->total}}</span> </span>
                            </p>
                            <p>
                              Service Type
                              <?php $service = Illuminate\Support\Facades\DB::table('services')->where('id', $order->service_id)->first(); ?>
                              <span class="float-right" id="bservice"> {{$service->name}}</span>
                            </p>


                            <p>
                              Posted On
                              <span class="float-right" id="bposted">{{date('Y-m-d',strtotime($order->created_at))}} </span>
                            </p>
                            <p>
                              Deadline Date
                              <span class="float-right" id="bdeadline_date"> {{$order->dead_line}}</span>
                            </p>
                            <p>
                              Deadline Time
                              <span class="float-right" id="bdeadline_time">{{$order->deadline_time}} </span>
                            </p>




                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </td>
              </tr>
              @endforeach
			
            </tbody>
          </table>
          <!-- END DATATABLE -->
			<div class="float-right">{{ $orders->onEachSide(5)->links()  }}</div>
        </div> <!-- END BOX CONTENT -->
      </div>
    </div>
  </div>
</div>
<!-- END USERS LIST DATA TABEL -->
@endsection

@section('js')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $(document).ready(function() {
    $(".clickable-row").click(function() {
      var orderId = $(this).data('order-id');
      $("#extra-details" + orderId).toggle();
    });
  });
</script>




@endsection