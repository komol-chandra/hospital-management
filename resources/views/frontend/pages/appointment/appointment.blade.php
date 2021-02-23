@extends('frontend.layouts.app')
@section('content')
@section('title', ' Appointment')
<main id="content" role="main">
  <div class="gradient-half-primary-v1">
    <div class="container text-center space-top-4 space-top-md-4 space-top-lg-3 space-bottom-1">
      <div class="w-md-80 w-lg-50 mx-auto mb-5">
        <h1 class="h1 text-white">
          <span class="font-weight-semi-bold">Appointments</span>
        </h1>
      </div>
    </div>
  </div>
  <div class="bg-light">
    <div class="container space-2 space-md-2">
        <div class="m-t-25">
                <div class="tab-pane fade active show" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                    <div class="card">
                        <div class="card-body">
                            {!! Form::open(['url' => '/frontend/appointment','method'=>'post','files'=>true,'id'=>'new']) !!}
                            <input type="hidden" name="patient_id" value="{{ Auth::guard('admin')->user()->id }}">    
                            <div class="row">
                                <div class="col-sm-6 form-group">
                                    <label> Appointment Status<span class="text-danger">*</span></label>
                                    <select name="type" class="select2 form-control custom-select " id="">
                                        <option value="1">New</option>
                                        <option value="2">In 30 Days</option>
                                        <option value="3">Report</option>
                                    </select>
                                    <span class="icon"></span>  
                                </div>
                                <div class="col-sm-6 form-group">
                                    <label>Department <span class="text-danger">*</span></label>
                                    {!! Form::select('department_id',$departments , null , ['placeholder' => 'Select Department',"class"=>"form-control","onchange"=>"getDoctor()","id"=>"department"]) !!}
                                </div>
                                <div class="col-sm-6 form-group">
                                    <label>Doctor <span class="text-danger">*</span></label>
                                    <select name="doctor_id" class="select2 form-control custom-select doctor" id="doctor_id">
                                        <option selected disabled hidden>Select</option>
                                    </select>
                                </div>
                                <div class="col-sm-6 form-group">
                                    <label>Date</label>
                                    {!! Form::date("date", null, ["class"=>"form-control date"]) !!}
                                </div>
                               
                                <div class="col-sm-12 form-group">
                                    <label>Message</label>
                                    {!! Form::text("message", null,["class"=>"form-control"]) !!}
                                </div>
                            </div>
                                <div class="col-sm-12 reset-button">
                                    <button type="submit" class="btn btn-success">Book Now</button>
                                </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
  </div>
</main>
@endsection
@section('js')
<script>
    $(document).ready(function(){
        $(".date").change(function () {
            let date = $(this).val();
            let doctor_id = $(".doctor_two").val();
            $.ajax({
                url: "/frontend/matchAppointmentQuantity",
                type: "get",
                data: { date: date ,
                        doctor_id:doctor_id},
                dataType: "json",
                success: function (response) {
                    console.log("response");
                    if (response == "Ok") {
                    $(".appointment").html("Appointment on now");
                    } else {
                        $(".appointment").html("Appointment Off for The day");
                    }
                },
            });
        });
    });
    function getDoctor(){
        let id = $(department).val();
        console.log(id);
        $.ajax({
            url:`/frontend/getDoctorId/${id}`,
            type:"get",
            dataType:"json",
            success:function(response){
                response.forEach(function(value,index){
                    $('.doctor').append(`<option class="selectDoctor"  value="${value.id}" >${value.full_name}</option>`);

                })
            }
        })
    };
</script>
{!! JsValidator::formRequest('App\Http\Requests\OldAppointmentRequest', '#old'); !!}
{!! JsValidator::formRequest('App\Http\Requests\NewAppointmentRequest', '#new'); !!}
@endsection