@extends('backend.layouts.app')
@section('content')
@section('title', '| Create Prescription')
@section('header-title', 'Create Prescription')
@section('breadcrumb', 'Create Prescription')
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-bd lobidrag">
            <div class="panel-heading">
                <div class="btn-group"> 
                    <a class="btn btn-primary" href="{{ url('/admin/prescription') }}"> <i class="fa fa-list"></i>Prescription List</a>  
                </div>
            </div>
            <div class="panel-body">
                <div class="col-sm-12">
                    {!! Form::open(['url' => '/admin/prescription','method'=>'post']) !!}
                    @include('backend.pages.prescription.form')
                        <div class="col-sm-12 reset-button">
                            
                            <button type="submit" class="btn btn-success">Save</button>
                        </div>
                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script type="text/javascript">
    $(document).ready(function() {
      var max_field = 10;
      var wrapper = $(".input_field"); 
      var add_field = $(".add_field");
      var i = 1;
    
      $(add_field).click(function(e) {
      e.preventDefault();
      if(i < max_field) {
        i++;
        $("#row_no").val(i);
        $(wrapper).append("<div>\
      <table>\
            <tr>\
                <td>\
                <input type='text' name='medicine[]' class='form-control' style=' width:170px;' placeholder='name'>\
                </td>\
                <td>\
                <input type='text' name='duration[]' class='form-control' style='margin-left: 9px; width:170px;' placeholder='100mg'>\
                </td>\
                <td>\
                <input type='text' name='sequence[]' class='form-control' style='margin-left: 9px; width:170px;' placeholder='1+0+1'>\
                </td>\
                <td>\
                <input type='text' name='day[]' class='form-control' style='margin-left: 9px; width: 170px;' placeholder='7days'>\
                </td>\
                <td>\
                <input type='text' name='instruction[]' class='form-control' style='margin-left: 9px; width: 170px;' placeholder='After Food'>\
                </td>\
                <td>\
                <button class='btn btn-danger btn-sm remove_field' style='margin-left: 8px;'><i class='fa fa-trash'></i></button>\
                </td>\
            </tr>\
        </table>\</div>");
      }
    });
    $(wrapper).on("click", ".remove_field", function(e) {
      e.preventDefault();
      $(this).closest('div').remove(); i--;
    });
    });
    </script>
<script src="{{asset('backend/script/prescription.js')}}"></script>
@endsection
