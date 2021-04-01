@extends('backend.layouts.app')
@section('content')
@section('title', '|  Dashboard')
@section('header-title', 'Dashboard')
@section('breadcrumb', ' Dashboard')
    <div class="row">
        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-3">
            <div class="panel panel-bd cardbox">
                <div class="panel-body">
                    <div class="statistic-box">
                        <h2><span class="num" id="doctors">0</span>
                        </h2>
                    </div>
                    <div class="items pull-left">
                        <i class="fa fa-users fa-2x"></i>
                        <h4>Doctors </h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-3">
            <div class="panel panel-bd cardbox">
                <div class="panel-body">
                    <div class="statistic-box">
                        <h2><span class="num" id="patients">0</span>
                        </h2>
                    </div>
                    <div class="items pull-left">
                        <i class="fa fa-users fa-2x"></i>
                        <h4>Patients</h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-3">
            <div class="panel panel-bd cardbox">
                <div class="panel-body">
                    <div class="statistic-box">
                        <h2><span class="null" id="admins">0</span>
                        </h2>
                    </div>
                    <div class="items pull-left">
                        <i class="fa fa-user-circle fa-2x"></i>
                        <h4>Admin</h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-3">
            <div class="panel panel-bd cardbox">
                <div class="panel-body">
                    <div class="statistic-box">
                        <h2><span class="null" id="accountants">0</span>
                        </h2>
                    </div>
                    <div class="items pull-left">
                        <i class="fa fa-users fa-2x"></i>
                        <h4>accountants</h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-3">
            <div class="panel panel-bd cardbox">
                <div class="panel-body">
                    <div class="statistic-box">
                        <h2><span class="null" id="nurses">0</span>
                        </h2>
                    </div>
                    <div class="items pull-left">
                        <i class="fa fa-user-circle fa-2x"></i>
                        <h4> nurses</h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-3">
            <div class="panel panel-bd cardbox">
                <div class="panel-body">
                    <div class="statistic-box">
                        <h2><span class="null" id="laboratorian">0</span>
                        </h2>
                    </div>
                    <div class="items pull-left">
                    <i class="fa fa-users fa-2x"></i>
                    <h4>Laboratories</h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-3">
            <div class="panel panel-bd cardbox">
                <div class="panel-body">
                    <div class="statistic-box">
                        <h2><span class="null" id="pharmacists">0</span>
                        </h2>
                    </div>
                    <div class="items pull-left">
                    <i class="fa fa-users fa-2x"></i>
                    <h4>pharmacists</h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-3">
            <div class="panel panel-bd cardbox">
                <div class="panel-body">
                    <div class="statistic-box">
                        <h2><span class="null" id="receptionists">0</span>
                        </h2>
                    </div>
                    <div class="items pull-left">
                    <i class="fa fa-users fa-2x"></i>
                    <h4>Receptionist</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>




<div class="row">
    <!-- calender -->
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
        <div class="panel panel-bd ">
            <div class="panel-heading">
                <div class="panel-title">
                    <h4>This Mounth Top Doctors By Appointments</h4>
                </div>
            </div>
            <div class="panel-body">
                <!-- monthly calender -->
                <div class="monthly_calender">
                    <div class="monthly" id="m_calendar"></div>
                </div>
            </div>
             {{-- <div id="doctorBar" class="hidden-xs hidden-sm hidden-md hidden-lg"></div> --}}
             <canvas id="doctorBar" height="450"></canvas>

        </div>
    </div>
        <!-- datamap -->
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 ">
            <div class="panel panel-bd ">
                <div class="panel-heading">
                    <div class="panel-title">
                        <h4>This Mounth  Percentage</h4>
                    </div>
                </div>
                <div class="panel-body">
                    <canvas id="percentage" height="450"></canvas>

                </div>
            </div>
        </div>

        <!-- Bar Chart -->
        {{-- <div class="col-xs-12 col-sm-12 col-md-6">
            <div class="panel panel-bd lobidisable">
                <div class="panel-heading">
                    <div class="panel-title">
                        <h4>Bar chart</h4>
                    </div>
                </div>
                <div class="panel-body">
                    <canvas id="barChart" height="200"></canvas>
                </div>
            </div>
        </div>
         <!-- Radar Chart -->
        <div class="col-xs-12 col-sm-12 col-md-6">
            <div class="panel panel-bd lobidisable">
                <div class="panel-heading">
                    <div class="panel-title">
                        <h4>Rader chart</h4>
                    </div>
                </div>
                <div class="panel-body">
                    <canvas id="radarChart" height="200"></canvas>
                </div>
            </div>
        </div> --}}
        <div class="col-xs-12 col-sm-12">
            <div class="panel panel-bd ">
                <div class="panel-heading">
                    <div class="panel-title">
                        <h4>Notice List of This Mounth </h4>
                    </div>
                </div>
                <div class="noticeList"></div>
            </div>
         </div>
         <!-- Basic data map -->
        {{-- <div class="col-xs-12 col-sm-6">
            <div class="panel panel-bd lobidrag">
                <div class="panel-heading">
                    <div class="panel-title">
                        <h4>Google Map</h4>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="embed-container">
                        <iframe src='https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d387144.0075834208!2d-73.97800349999999!3d40.7056308!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew+York%2C+NY!5e0!3m2!1sen!2sus!4v1394298866288' width='600' height='450' style='border:0'></iframe>
                    </div>
                </div>
            </div>
        </div> --}}

    </div>
@endsection
@section('js')
<script>
    $(document).ready(function(){
        topDoctors();
        counters();
        percentage();
        noticeList();
    })
    function noticeList(page_link = "/admin/notices") {
    $.ajax({
        url: page_link,
        type: "get",
        datatype: "html",
        success: function (response) {
            $(".noticeList").html(response);
        },
    });
}
    function counters(){
        $.ajax({
            url:"/admin/counters",
            type:"get",
            dataType:"json",
            success:function(data){
                console.log(data.doctors);
                $("#doctors").text(data.doctors);
                $("#patients").text(data.patients);
                $("#admins").text(data.admins);
                $("#accountants").text(data.accountants);
                $("#nurses").text(data.nurses);
                $("#laboratorian").text(data.laboratorian);
                $("#pharmacists").text(data.pharmacists);
                $("#receptionists").text(data.receptionists);
                $("#representatives").text(data.representatives);
                $("#caseManager").text(data.caseManager);

                $('.num').counterUp({
                    delay: 5,
                    time: 500
                });
            }
        });
    }
    function percentage(){
        $.ajax({
            url:"/admin/percentage",
            type:"get",
            dataType:"json",
            success:function(data){
                console.log(data.value);
                let getData = $('#percentage');
                let myDoughnutChart = new Chart(getData, {
                    type: 'pie',
                    data: {
                            labels: data.label,
                            datasets: [{
                                label: 'Students',
                                data: data.value,
                                backgroundColor: [
                                    'rgba(255, 97, 131, 0.35)',
                                    'rgba(240, 246, 44, 0.42)',
                                    'rgba(79, 255, 31, 0.38)',
                                    'rgba(0, 0, 0, 0.33)',
                                    'rgba(49, 82, 201, 0.27)',
                                ],
                                borderColor: [
                                    'rgba(255, 97, 131, 1)',
                                    'rgba(240, 246, 44, 1)',
                                    'rgba(79, 255, 31, 1)',
                                    'rgba(0, 0, 0, 1)',
                                    'rgba(49, 82, 201, 1)',
                                ],
                                borderWidth: 1
                            }]
                        },
                        options: {}
                });
            }
        });
    }
    function topDoctors(){
        $.ajax({
            url:"/admin/top-doctor",
            type:"get",
            dataType:"json",
            success:function(data){
                console.log('hi');
                console.log(data);
                console.log(data.appointments_count);
                console.log(data.name);
                // data.forEach(element => {
                //     console.log(element.full_name);
                //     // console.log(element.appointments_count);
                // });
                // console.log(data.full_name);
                let doctor = $('#doctorBar');
                let myBarChart = new Chart(doctor, {
                    type: 'bar',
                    data: {
                            labels: data.name,
                            datasets: [{
                                label: 'Doctors',
                                data: data.appointments_count,
                                backgroundColor: [
                                    'rgba(255, 97, 131, 0.35)',
                                    'rgba(240, 246, 44, 0.42)',
                                    'rgba(79, 255, 31, 0.38)',
                                    'rgba(0, 0, 0, 0.33)',
                                    'rgba(49, 82, 201, 0.27)',
                                    'rgba(201, 79, 49, 0.33)',
                                    'rgba(39, 211, 203, 0.33)',
                                    'rgba(200, 39, 211, 0.26)'
                                ],
                                borderColor: [
                                    'rgba(255, 97, 131, 1)',
                                    'rgba(240, 246, 44, 1)',
                                    'rgba(79, 255, 31, 1)',
                                    'rgba(0, 0, 0, 1)',
                                    'rgba(49, 82, 201, 1)',
                                    'rgba(201, 79, 49, 1)',
                                    'rgba(39, 211, 203, 1)',
                                    'rgba(200, 39, 211, 1)'
                                ],
                                borderWidth: 1
                            }]
                        },
                        options: {
                            scales: {
                                yAxes: [{
                                    ticks: {
                                        beginAtZero: true
                                    }
                                }]
                            }
                        }
                });
            }
        });
    }
    function universityLine(){
        $.ajax({
            url:"/university_line",
            type:"get",
            dataType:"json",
            success:function(data){
                let university = $('#universityLine');
                let myLineChart = new Chart(university, {
                    type: 'line',
                    data: {
                            labels: data.label,
                            datasets: [{
                                label: 'Students',
                                data: data.value,
                                backgroundColor: [
                                    'rgba(49, 82, 201, 0.27)',
                                ],
                                fill:false,
                                borderColor: [
                                    'rgba(49, 82, 201, 1)',
                                ],
                                borderWidth: 1
                            }]
                        },
                        options: {
                            scales: {
                                yAxes: [{
                                    ticks: {
                                        beginAtZero: true
                                    }
                                }]
                            }
                        }
                });
            }
        });
    }
    // function councilorPolarArea(){
    //     $.ajax({
    //         url:"/councilor_polar_area",
    //         type:"get",
    //         dataType:"json",
    //         success:function(data){
    //             let councilor = $('#councilorPolarArea');
    //             let myPolarChart = new Chart(councilor, {
    //                 type: 'polarArea',
    //                 data: {
    //                         labels: data.label,
    //                         datasets: [{
    //                             label: 'Students',
    //                             data: data.value,
    //                             backgroundColor: [
    //                                 'rgba(255, 97, 131, 0.35)',
    //                                 'rgba(240, 246, 44, 0.42)',
    //                                 'rgba(79, 255, 31, 0.38)',
    //                                 'rgba(0, 0, 0, 0.33)',
    //                                 'rgba(49, 82, 201, 0.27)',
    //                                 'rgba(201, 79, 49, 0.33)'
    //                             ],
    //                             borderColor: [
    //                                 'rgba(255, 97, 131, 1)',
    //                                 'rgba(240, 246, 44, 1)',
    //                                 'rgba(79, 255, 31, 1)',
    //                                 'rgba(0, 0, 0, 1)',
    //                                 'rgba(49, 82, 201, 1)',
    //                                 'rgba(201, 79, 49, 1)'
    //                             ],
    //                             borderWidth: 1
    //                         }]
    //                     },
    //                     options: {}
    //             });
    //         }
    //     });
    // }
    </script>
@endsection
