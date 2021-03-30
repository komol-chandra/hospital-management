@extends('backend.layouts.app')
@section('content')
@section('title', '|  patient')
@section('header-title', 'Patient')
@section('breadcrumb', ' Patient')
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-bd ">
            <div class="panel-heading">
                <div class="row">
                    <div class="btn-group col-sm-12"> 
                        <div class="col-sm-6">
                            <a class="btn btn-success" href="{{ url('/admin/patient/create') }}"> <i class="fa fa-plus"></i> Add Patient
                            </a>
                        </div>
                        <div class="col-sm-2"></div>
                        <div class="col-sm-4 float-left">    
                            <input type="search" class="form-control search float-left" placeholder="search name, code, email, mobile ,blood">
                        </div>
                    </div>
                </div>        
            </div>
            <div class="panel-body">
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