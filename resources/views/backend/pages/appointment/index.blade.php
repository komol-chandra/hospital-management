@extends('backend.layouts.app')
@section('content')
@section('title','| Appointment')
@section('header-title', 'Appointment')
@section('breadcrumb', ' Appointment')
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-bd lobidrag">
            <div class="panel-heading">
                <div class="btn-group">   
                </div>        
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="panel-header">
                        <div class="col-sm-12 col-xs-12">
                            {!! Form::open(['url' => '/admin/online-appointment','method'=>'get',"id"=>"form_insert"]) !!}
                            <div class="col-sm-4"><h4>Fliter By Doctor</h4></div>
                            <div class="col-sm-4 form-group">
                                {!! Form::select('doctor_id',$doctors, null ,['placeholder' => 'Select Doctor',"onchange"=>"datalist()","class"=>"form-control doctor"]) !!}
                            </div>
                            <div class="col-sm-2 reset-button">
                                <button type="submit" class="btn btn-success float-left">Serach</button>
                            </div>
                            <div class="col-sm-2"></div>
                        {!! Form::close() !!}
                        </div>
                        
                        {{-- <div class="col-sm-4 col-xs-12">
                            <div class="dataTables_length">
                                <a class="btn btn-default buttons-copy btn-sm" tabindex="0">
                                    <span>Copy</span></a>
                                    <a class="btn btn-default buttons-csv buttons-html5 btn-sm" tabindex="0"><span>CSV</span></a>
                                    <a class="btn btn-default buttons-excel buttons-html5 btn-sm" tabindex="0"><span>Excel</span></a>
                                    <a class="btn btn-default buttons-pdf buttons-html5 btn-sm" tabindex="0"><span>PDF</span></a>
                                    <a class="btn btn-default buttons-print btn-sm" tabindex="0"><span>Print</span></a>
                                    
                                </div>
                        </div>
                        <div class="col-sm-4 col-xs-12">
                            <div class="dataTables_length">
                                <div class="input-group custom-search-form">
                                    <input type="search" class="form-control" placeholder="search..">
                                    <span class="input-group-btn">
                                        <button class="btn btn-primary" type="button">
                                            <span class="glyphicon glyphicon-search"></span>
                                        </button>
                                    </span>
                                </div><!-- /input-group -->
                            </div>
                        </div> --}}
                    </div>
                </div>
                {{-- @include('backend.pages.appointment.data-list',[ 'search'=> $search]) --}}
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Type</th>
                                <th>Doctor Name</th>
                                <th>Department</th>
                                <th>Day</th>
                                <th>Patient name</th>
                                <th>serial no</th>
                                <th>Time </th>
                                <th>appointment</th>
                                <th>payment Status</th>
                                <th>action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $i = ($data->currentpage()-1)* $data->perpage() + 1;
                            @endphp
                            @forelse($data as $key => $value)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>@if($value->type==1){{ 'New' }}
                                    @elseif($value->type==2){{ 'In 30 Days' }}
                                    @else{{ 'Report' }}
                                    @endif
                                </td>
                                <td>{{ $value->doctors->full_name ?? null}}</td>
                                <td>{{ $value->departments->name ?? null}}</td>
                                <td>{{ $value->date ?? null }}</td>
                                <td>{{ $value->users->full_name ?? null}}</td>
                                <td>{{ $value->serial_no ?? null}}</td>
                                <td>{{ $value->time ?? null}}</td>
                                {{-- <td>{{ $value->parpatient }}</td> --}}
                                <td class="text-center">
                                    @if($value->status == 0)
                                    <span class="label-danger label label-default">pending</span>
                                    @else<span class="label-success label label-default">done</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    @if($value->payment_status == 0)
                                    <span class="label-danger label label-default">pending</span>
                                    @else<span class="label-success label label-default">done</span>
                                    @endif
                                </td>
                                <td>
                                    @if($value->status == 0)
                                    <a class="btn btn-info btn-xs" id="status" href="/admin/online-appointment/status/{{ $value->id }}"><i class="fa fa-refresh"></i></a>
                                    @endif
                                    <a class="btn btn-info btn-xs" href="{{url('admin/online-appointment/'.$value->id)}}"><i class="fa fa-eye"></i></a>  
                
                                    @if($value->payment_status == 0)
                                    <a class="btn btn-info btn-xs" id="status" href="/admin/online-appointment/payment-status/{{ $value->id }}"><i class="fa fa-dollar"></i></a>
                                    @endif
                                </td>
                                
                            </tr>
                            @empty
                            <tr>
                                <td>NO DATA</td>
                                <td>NO DATA</td>
                                <td>NO DATA</td>
                                <td>NO DATA</td>
                                <td>NO DATA</td>
                                <td>NO DATA</td>
                                <td>NO DATA</td>
                                <td>NO DATA</td>
                                <td>NO DATA</td>
                                <td>NO DATA</td>
                                <td>NO ACTION</td>
                                
                            </tr>
                            @endforelse
                                
                            
                        </tbody>
                    </table>
                    {{ $data->links() }}

                </div>
                {{-- <div class="data-lists"></div> --}}
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script>
    function Delete(id){
    var id=id;
    iziToast.question({
        timeout: 20000,
        close: true,
        overlay: true,
        displayMode: 'once',
        id: 'question',
        zindex: 999,
        title: 'Wait!',
        message: 'Are you sure? Once Deleted Can\'t be undone!',
        position: 'center',
        buttons: [
            ['<button><b>YES</b></button>', function () {
                var $form = $("#deleteForm").closest('form');
                $form.attr('action','/admin/schedule/'+id);
                $form.submit()
            }, true],
            ['<button>NO</button>', function (instance, toast) {
                instance.hide({ transitionOut: 'fadeOut' }, toast, 'button');
            }],
        ],
    });
}
</script>


<script>
$(document).ready(function(){
    // $(this).on("submit", "#form_insert", function (e) {
    //     e.preventDefault();
    //     let data = $(this).serializeArray();
    //     $.ajax({
    //         url: `/admin/online-appointment/search`,
    //         data: data,
    //         type: "post",
    //         dataType: "json",
    //         success: function (response) {
    //             console.log(response);
    //         },
    //         error: function (error) {
    //             alert("Field Requeued");
    //         },
    //     });
    // });
    
});


// function datalist() {
//     let doctor = $(".doctor").val();
//     console.log(doctor);
//     page_link = `/admin/appointmentList?doctor=${
//         doctor ? doctor : ""}`;

//     $.ajax({
//         url: page_link,
//         type: "get",
//         datatype: "html",
//         success: function(response) {
//             $(".data-lists").html(response);
//         }
//     });
// }
</script>
@endsection