@extends('backend.layouts.app')
@section('content')
@section('title', '|  patient')
@section('header-title', 'Patient')
@section('breadcrumb', ' Patient')
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-bd lobidrag">
            <div class="panel-heading">
                <div class="btn-group"> 
                    <a class="btn btn-success" href="{{ url('/admin/patient/create') }}"> <i class="fa fa-plus"></i> Add Patient
                    </a>
                    {{-- <form action="/admin/patientImport" method="post" enctype="multipart/form-data">@csrf
                        <input type="file" name="file">
                        <button class=" btn btn-info" type="submit"> Import</button>
                    </form> --}}
                </div>        
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="panel-header">
                        <div class="col-sm-4 col-xs-12">
                            {{-- <div class="dataTables_length">
                                <label>Display 
                                    <select name="example_length">
                                        <option value="10">10</option>
                                        <option value="25">25</option>
                                        <option value="50">50</option>
                                        <option value="100">100</option>
                                    </select> records per page</label>
                            </div> --}}
                        </div>
                        <div class="col-sm-4 col-xs-12">
                            <div class="dataTables_length">
                                {{-- <a class="btn btn-default buttons-copy btn-sm" tabindex="0">
                                    <span>Copy</span></a>
                                    <a class="btn btn-default buttons-csv buttons-html5 btn-sm" tabindex="0" href="{{ url('/admin/patientCsv') }}"><span>CSV</span></a>
                                    <a class="btn btn-default buttons-excel buttons-html5 btn-sm"  href="{{ url('/admin/patientExcel') }}"><span>Excel</span></a>
                                    <a class="btn btn-default buttons-pdf buttons-html5 btn-sm" tabindex="0" href="{{ url('/admin/patientPdf') }}"><span>PDF</span></a>
                                    <a class="btn btn-default buttons-print btn-sm" tabindex="0"><span>Print</span></a> --}}
                                    
                                </div>
                        </div>
                        <div class="col-sm-4 col-xs-12">
                            <div class="dataTables_length">
                                <div class="input-group custom-search-form">
                                    <input type="search" class="form-control search" placeholder="search..">
                                    {{-- <span class="input-group-btn">
                                        <button class="btn btn-primary" type="button">
                                            <span class="glyphicon glyphicon-search"></span>
                                        </button>
                                    </span> --}}
                                </div><!-- /input-group -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="dataList"></div>
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
                $form.attr('action','/admin/patient/'+id);
                $form.submit()
            }, true],
            ['<button>NO</button>', function (instance, toast) {
                instance.hide({ transitionOut: 'fadeOut' }, toast, 'button');
            }],
        ],
    });
}
</script>
<script src="{{asset('backend/script/patient.js')}}"></script>
@endsection