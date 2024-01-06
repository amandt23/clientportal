@extends('layouts.app')

@section('css')
<!-- Data Table CSS -->
<link href="{{URL::asset('plugins/datatable/datatables.min.css')}}" rel="stylesheet" />
<!-- Sweet Alert CSS -->
<link href="{{URL::asset('plugins/sweetalert/sweetalert2.min.css')}}" rel="stylesheet" />
<style>
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
</style>
@endsection

@section('page-header')
<!-- PAGE HEADER -->
<div class="page-header mt-5-7">
    <div class="page-leftheader">
        <h4 class="page-title mb-0">{{ __('Order Details') }}</h4>
        <ol class="breadcrumb mb-2">
            <li class="breadcrumb-item"><a href="{{ route('user.dashboard') }}"><i class="fa-solid fa-id-badge mr-2 fs-12"></i>{{ __('Dashboard') }}</a></li>
            <li class="breadcrumb-item" aria-current="page"><a href="{{ route('user.my_orders') }}">{{ __('Orders') }}</a></li>
        </ol>
    </div>

</div>
<!-- END PAGE HEADER -->
@endsection

@section('content')
<div class="row">
    <div class="col-lg-6">
        <div class="card p-2 ">
            <div class="card-body p-0">
                <h3> {{__($order->number)}}</h3>
                <div class="table-responsive">
                    <table class="table ">

                        <tbody>

							<?php $u = \App\Models\User::where('id', $order->customer_id)->first(); ?>
							<tr>
                                <th>@lang('Client Full Name')</th>
                                <td>
                                    {{__($u->name)}} <br>


                                </td>
                            </tr>
							<tr>
                                <th>@lang('Client Username')</th>
                                <td>
                                    {{__($u->username)}} <br>


                                </td>
                            </tr>
							<tr>
                                <th>@lang('Client Email')</th>
                                <td>
                                    {{__($u->email)}} <br>


                                </td>
                            </tr>
                            <tr>
                                <th>@lang('Title')</th>
                                <td>
                                    {{__($order->title)}} <br>


                                </td>
                            </tr>

                            <tr>
                                <th>@lang('Amount')</th>
                                <td data-label="@lang('Referral Bonus')">
                                    @if($order->currency = 'usd')
                                    <i class="fa fa-dollar"></i>{{$order->total}}
                                    @else
                                    <i class="fa fa-gbp"></i>{{$order->total}}
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>@lang('Service Type')</th>
                                <td data-label="@lang('Referral Bonus')">
                                    <?php
                                    $c = Illuminate\Support\Facades\DB::table('services')->where('id', $order->service_id)->first();
                                    if ($c) {
                                        echo $c->name;
                                    } else {
                                        echo $order->service;
                                    }
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <th>Quantity</th>
                                <td>{{$order->quantity}} Pages</td>
                            </tr>
                            <tr>
                                <th>Education Level</th>
                                <?php $wl = Illuminate\Support\Facades\DB::table('work_levels')->where('id', $order->work_level_id)->first(); ?>
                                <td>@if($wl){{$wl->name}}@else {{$order->work_level}} @endif </td>
                            </tr>
                            <tr>
                                <th>Writer Level</th>
                                <td>{{$order->package}}</td>
                            </tr>

                            <tr>
                                <th>Instruction</th>
                                <td>{{$order->instruction}}</td>
                            </tr>
                            <tr>
                                <th>Citation</th>
                                <td>{{$order->formatting}} </td>
                            </tr>
                            <tr>
                                <th> Course</th>
                                <td>{{$order->course}}</td>
                            </tr>
                            <tr>
                                <th>Sources</th>
                                <td> {{$order->sources}}</td>
                            </tr>
                            <tr>
                                <th>@lang('Time Zone')</th>
                                <td data-label="@lang('Status')">
                                    <span class="font-weight-bold">{{$order->timezone}}</span>

                                </td>
                            </tr>
                            <tr>
                            <tr>
                                <th>@lang('Posted')</th>
                                <td data-label="@lang('Status')">
                                    <span class="font-weight-bold">{{date('Y-m-d h:i:A',strtotime($order->created_at))}}</span>

                                </td>
                            </tr>
                            <tr>
                                <th>@lang('Deadline')</th>
                                <td data-label="@lang('Action')">
									
									<?php  
									
										$d = \Carbon\Carbon::parse($order->created_at);
										$c = \Carbon\Carbon::parse($order->dead_line. $order->deadline_time);
										$diff = $d->diff($c);
									?>
									
                                    <span class="font-weight-bold">{{$order->dead_line}} {{$order->deadline_time}}
									
										<br>
										{{$diff->days}} Days & {{$diff->h}} hours
									</span>

                                </td>
                            </tr>
							@if($order->staff_id != 0)
							<tr>
                                <th>@lang('Writer')</th>
                                <td data-label="@lang('Action')">
									<?php $w = Illuminate\Support\Facades\DB::table('users')
                                        ->where('id', $order->staff_id)
                                        ->where('group', 'writer')
                                        ->first(); ?>
                                    <span class="font-weight-bold">@if($w){{$w->name}}@endif</span>

                                </td>
                            </tr>
							 <tr>
                                <th>@lang('Writer Deadline')</th>
                                <td data-label="@lang('Action')">
                                    <span class="font-weight-bold">{{$order->writer_deadline}}</span>

                                </td>
                            </tr>
							
							@if($order->order_status_id == 5)
							 <tr>
                                <th>@lang('Writer Message/Files')</th>
                                <td class="text-dark" data-label="@lang('Action')">
									  <?php $wf = Illuminate\Support\Facades\DB::table('submitted_works')
               							->where('order_id', $order->id)->where('name', 'proofreader')
										->orderBy('id', 'DESC')->first(); ?>
									
									     @if(!empty($wf))
            <p class="pt-2 pl-2">{{$wf->message}}</p>
            <p style="font-weight: bold; margin-left: 2%;">
               <?php $files = Illuminate\Support\Facades\DB::table('attachments')
                  ->where('uploader_id', $wf->user_id)->where('order_id', $order->id)->where('submit_id', $wf->id)->orderBy('id', 'DESC')->get();  ?>
               @foreach($files as $file)
            <div class="p-2">
               <a class="text-dark" href="{{route('download_file', $file->id)}}" > {{$file->file}}
               <i class="text-light fa fa-download bg-dark p-1 rounded mr-2" style=""></i>
               </a> <br>
            </div>
            @endforeach
            @endif
                                    
                                </td>
                            </tr>
							@endif
							@endif
                            <tr>
                                <th>@lang('Client Files')</th>
                                <td data-label="@lang('Action')">
                                    <?php $files = Illuminate\Support\Facades\DB::table('attachments')
                                        ->where('order_id', $order->id)
                                        ->where('revision_id', 0)
                                        ->where('uploader_id', $order->customer_id)->get(); ?>
                                    @foreach($files as $file)

                                    <a href="{{$file->file_path}}" download class="text-primary"><i class="fa fa-download"></i> {{$file->file}}</a> <br>
                                    @endforeach
                                </td>
                            </tr>
                            <?php $revision = Illuminate\Support\Facades\DB::table('revisions')

                                ->where('order_id', $order->id)
                                ->where('user_id', $order->customer_id)->get(); ?>
                            @if($revision->count() > 0)
                            @foreach($revision as $r)
                            <tr>
                                <th>@lang('Client Revision Files')</th>
                                <td data-label="@lang('Action')">
                                    <?php $files = Illuminate\Support\Facades\DB::table('attachments')
                                        ->where('revision_id', 1)->where('r_no', $r->id)
                                        ->where('order_id', $order->id)
                                        ->where('uploader_id', $order->customer_id)->get(); ?>
                                    @foreach($files as $file)
                                    <a href="{{$file->file_path}}" download class="text-primary">
                                        <i class="fa fa-download"></i> {{$file->file}}</a> <br>
                                    @endforeach
                                </td>
                            </tr>
                            <tr>
                                <th>@lang('Client Revision Message')</th>
                                <td data-label="@lang('Action')">
                                    {{$r->message}}
                                </td>
                            </tr>
                            <tr>
                                <th>@lang('Client Revision Deadline')</th>
                                <td data-label="@lang('Action')">
                                    {{$r->deadline_date}} {{$r->deadline_time}}
                                </td>
                            </tr>
                            @endforeach
                            @endif
                            <tr>
                                <th>@lang('Status')</th>
                                <td data-label="@lang('Action')">
                                    <?php
                                    $c = Illuminate\Support\Facades\DB::table('order_statuses')->where('id', $order->order_status_id)->first();
                                    echo $c->name;

                                    ?>

                                </td>
                            </tr>
                            <tr>
                                <th>@lang('Revision Requested')</th>
                                <td data-label="@lang('Action')">
                                    <?php
                                    $c = Illuminate\Support\Facades\DB::table('revisions')
                                        ->where('order_id', $order->id)
                                        ->where('user_id', $order->customer_id)
                                        ->count();
                                    if ($c)
                                        echo $c;
                                    ?>
                                </td>
                            </tr>

                            <tr>
                                <th>@lang('Revision Deadline')</th>
                                <td data-label="@lang('Action')">
                                    <?php
                                    $c = Illuminate\Support\Facades\DB::table('revisions')
                                        ->where('order_id', $order->id)
                                        ->where('user_id', $order->customer_id)
                                        ->orderBy('id', 'DESC')
                                        ->first();
                                    if ($c)
                                        echo $c->deadline_date . ' ' . $c->deadline_time;
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <th>@lang('Attachments')</th>
                                <td data-label="@lang('Action')">
                                    <?php
                                    $c = Illuminate\Support\Facades\DB::table('attachments')->where('uploader_id', 1)->where('order_id', $order->id)->get();
                                    if ($c->count() > 0) {

                                        foreach ($c as $e) { ?>

                                            <a href="{{$e->file_path}}" download>{{$e->file}}</a><br>

                                    <?php  }
                                    }
                                    ?>
                                </td>
                            </tr>


                        </tbody>
                    </table>
                </div>

            </div>
        </div>

    </div>
    <div class="col-lg-6">
        @if( $order->order_status_id == 1 && $order->payment_status == 1)

        <form action="{{route('admin.decideDeadline')}}" method="post" enctype="multipart/form-data">
            <h4>Decide A Deadline</h4>
            @csrf
            <input type="hidden" name="id" value="{{ $order->id }}">

            <div class="form-group">

                <input type="datetime-local" name="date" class="form-control">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success my-3">Submit</button>
            </div>
        </form>
        @endif

        @if( $order->order_status_id == 4 && $order->payment_status == 1)

        <form action="{{route('admin.submit_work')}}" method="post" enctype="multipart/form-data">
            <h4>Submit (Revision Requested) Work</h4>
            @csrf
            <input type="hidden" name="id" value="{{ $order->id }}">
            <div class="form-group">
                <lable>File(s) </lable>
                <input type="file" name="name[]" multiple class="form-control">
            </div>
            <div class="form-group">
                <lable>Message </lable>
                <input type="text" name="message" class="form-control">
            </div>
            <input type="hidden" name="dt" class="dt">
            <div class="form-group">
                <button type="submit" class="btn btn-success my-3">Submit</button>
            </div>
        </form>
        @endif

        @if( $order->order_status_id == 2 && $order->payment_status == 1)

        <form action="{{route('admin.submit_work')}}" method="post" enctype="multipart/form-data">
            <h4>Submit Work</h4>
            @csrf
            <input type="hidden" name="id" value="{{ $order->id }}">
            <div class="form-group">
                <lable>File(s) </lable>
                <input type="file" name="name[]" multiple class="form-control">
            </div>
            <div class="form-group">
                <lable>Message </lable>
                <input type="text" name="message" class="form-control">
            </div>
            <input type="hidden" name="dt" class="dt">
            <div class="form-group">
                <button type="submit" class="btn btn-success my-3">Submit</button>
            </div>
        </form>
        @endif


        @if($order->payment_status == 1)
    <a href="{{route('admin.conversations', $order->id)}}" class="btn btn-primary">Reply to Client's concerns</a>

    @endif

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