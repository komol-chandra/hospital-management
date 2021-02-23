<div class="row">
    <div class="col-sm-4 form-group">
        <label>Name <span class="text-danger">*</span></label>
        {!! Form::text("name", null, ["class"=>"form-control"]) !!}
    </div>
    <div class="col-sm-4 form-group ">
        <label>Email <span class="text-danger">*</span></label>
        {!! Form::email("email", null, ["class"=>"form-control"]) !!}
    </div>
    <div class="col-sm-4 form-group">
        <label>Mobile <span class="text-danger">*</span></label>
        {!! Form::number("mobile", null,["class"=>"form-control"]) !!}
    </div>
    <div class="col-sm-4 form-group">
        <label>Date</label>
        {!! Form::date("date", null, ["class"=>"form-control"]) !!}
    </div>
    <div class="col-sm-4 form-group">
        <label>Department <span class="text-danger">*</span></label>
        {!! Form::select('department_id',$departments , null , ['placeholder' => 'Select Department',"class"=>"form-control","onchange"=>"getDoctor()","id"=>"department"]) !!}
    </div>
    <div class="col-sm-4 form-group">
        <label>Doctor <span class="text-danger">*</span></label>
        <select name="doctor_id" id="doctor" class="select2 form-control custom-select doctor">
            <option selected disabled hidden>Select</option>
            
        </select>
        {{-- {!! Form::select('doctor',$doctors,  null , ['placeholder' => 'Select Doctor',"class"=>"form-control","id"=>"doctor"]) !!} --}}
    </div>
    <div class="col-sm-12 form-group">
        <label>Message</label>
        {!! Form::text("message", null,["class"=>"form-control"]) !!}
    </div>
</div>
{{-- <div class="col-sm-12 form-group">
    <label>Want to Register</label>
    {!! Form::checkbox("checkbox",null,["class"=>"form-control"]) !!}

</div> --}}









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
            {{-- Profile View
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
            Update Profile
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
            </div> --}}
        </div>
    </div>
</div>
