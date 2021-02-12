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
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="true">new patient </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="false">old patient</a>
                </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">
                {{-- Profile View --}}
                <div class="tab-pane fade active show" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                    <div class="card">
                        <div class="card-body">
                            {!! Form::open(['url' => '/frontend/new_appointments','method'=>'post','files'=>true,'id'=>'new']) !!}
                                @include('frontend.pages.appointment.new_patient')
                                <div class="col-sm-12 reset-button">
                                    <button type="submit" class="btn btn-success">Book Now</button>
                                </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
                {{-- Update Profile --}}
                <div class="tab-pane fade" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                    <div class="card">
                        <div class="card-body">
                            {!! Form::open(['url' => '/frontend/old_appointments','method'=>'post','files'=>true,'id'=>'old']) !!}
                                @include('frontend.pages.appointment.old_patient')
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


        $(".patientId").keyup(function () {
            let patientId = $(this).val();
            console.log(patientId);
            $.ajax({
                url: "/frontend/matchPatientMobile",
                type: "get",
                data: { patientId: patientId },
                dataType: "json",
                success: function (response) {
                    if (response.name) {
                    $(".icon").html("your Mobile Number Matched");
                    $(".fullName").val(response.name);
                    $(".email").val(response.email);
                    $(".address").val(response.address);
                    } else {
                        $(".icon").html("your Mobile Number Did not Match");
                    }
                },
            });
        });

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
        $.ajax({
            url:`/frontend/doctorId/${id}`,
            type:"get",
            dataType:"json",
            success:function(response){
                response.forEach(function(value,index){
                    $('.doctor').append(`<option class="selectDoctor"  value="${value.id}" >${value.name}</option>`);

                })
            }
        })
    };
    function getDoctorTwo(){
        let id = $(department_two).val();
        $.ajax({
            url:`/frontend/doctorId2/${id}`,
            type:'get',
            dataType:'json',
            success:function(response){
                response.forEach(function(value,index){
                    $('.doctor_two').append(`<option class="selectDoctor2" value="${value.id}">${value.name}</option>`)
                })
            }
        })
    }
</script>
{!! JsValidator::formRequest('App\Http\Requests\OldAppointmentRequest', '#old'); !!}
{!! JsValidator::formRequest('App\Http\Requests\NewAppointmentRequest', '#new'); !!}
@endsection