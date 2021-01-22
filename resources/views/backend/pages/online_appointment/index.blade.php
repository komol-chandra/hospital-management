@extends('backend.layouts.app')
@section('content')
@section('title', '|  New Appointments')
@section('header-title', 'New Appointments')
@section('breadcrumb', ' New Appointments')
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-bd lobidrag">
            <div class="panel-heading">
                      
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="panel-header">
                        <div class="col-sm-4 col-xs-12">
                            <div class="dataTables_length">
                                <label>Display 
                                    <select name="example_length">
                                        <option value="10">10</option>
                                        <option value="25">25</option>
                                        <option value="50">50</option>
                                        <option value="100">100</option>
                                    </select> records per page</label>
                            </div>
                        </div>
                        <div class="col-sm-4 col-xs-12">
                            <div class="dataTables_length">
                                <a class="btn btn-default buttons-copy btn-sm" tabindex="0">
                                    <span>Copy</span></a>
                                    <a class="btn btn-default buttons-csv buttons-html5 btn-sm" tabindex="0"><span>CSV</span></a>
                                    <a class="btn btn-default buttons-excel buttons-html5 btn-sm" tabindex="0"><span>Excel</span></a>
                                    <a class="btn btn-default buttons-pdf buttons-html5 btn-sm" tabindex="0"><span>PDF</span></a>
                                    <a class="btn btn-default buttons-print btn-sm" onclick="printDiv('printableArea')" tabindex="0"><span>Print</span></a>
                                    
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
                        </div>
                    </div>
                </div>
                
                <div class="table-responsive" id="printableArea">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Mobile</th>
                                <th>Date</th>
                                <th>Department</th>
                                <th>Doctor</th>
                                <th>message</th>
                                <th>action</th>
                            </tr>
                        </thead>
                        <tbody>
                    
                            @forelse($data as $key => $value)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $value->name ?? null}}</td>
                                <td>{{ $value->email ?? null}}</td>
                                <td>{{ $value->mobile ?? null}}</td>
                                <td>{{ $value->date ?? null}}</td>
                                <td>{{ $value->departments->name ?? null}}</td>
                                <td>{{ $value->doctors->name ?? null}}</td>
                                <td>{{ $value->message ?? null}}</td>
                                <td>
                                    <a class="btn btn-info btn-xs" href="{{url('admin/new_appointments/'.$value->id)}}"><i class="fa fa-eye"></i></a>   
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
                                <td>NO Action</td>
                                
                            </tr>
                            @endforelse
                                
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
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
                $form.attr('action','/admin/doctor/'+id);
                $form.submit()
            }, true],
            ['<button>NO</button>', function (instance, toast) {
                instance.hide({ transitionOut: 'fadeOut' }, toast, 'button');
            }],
        ],
    });
}
</script>
@endsection