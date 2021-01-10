@extends('backend.layouts.app')
@section('content')
@section('title', '| Change Password')
@section('header-title', 'Change Password')
@section('breadcrumb', 'Change Password')
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-bd lobidrag">
            <div class="panel-body row">
                <div class="col-sm-12">
                    <form method="POST" action="/admin/changePassword">@csrf
                    <div class="form-group ">
                        <label class="col-sm-3 ">Current Password:</label>
                        <div class="col-sm-8">
                            <input  type="password" class="form-control currentPassword" name="password" required autocomplete="new-password" placeholder="Current Password"> 
                        </div>
                        <span class="col-sm-1 icon"></span>
                    </div>
                    <div class="form-group ">
                        <label class="col-sm-3" style="margin-top: 20px;">New Password:</label>
                        <div class="col-sm-8 " style="margin-top: 20px;">
                            <input id="new_password" type="password" class="form-control newPassword" name="new_password" required autocomplete="new-password" placeholder="New Password" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 " style="margin-top: 20px;">Retype Password:</label>
                        <div class="col-sm-8" style="margin-top: 20px;">
                            <input id="retype_password" type="password" class="form-control retypePassword" name="retype_password" required autocomplete="new-password" placeholder="Confirm Password" disabled>
                        </div>
                        <span class="col-sm-1 re_icon" style="margin-top: 20px;"></span>
                    </div>
                        <div class="col-sm-12 reset-button" style="margin-top: 20px;">
                            <button type="submit" class="btn btn-success submit">Save</button>
                        </div>
                    </form>
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script src='https://kit.fontawesome.com/a076d05399.js'></script>
<script>
$(document).ready(function(){
    $(".submit").attr("disabled", 'disabled'); 
        $(".currentPassword").keyup(function() {
            let currentPassword = $(this).val();
            $.ajax({
                url:'/admin/matchPassword',
                data:{currentPassword:currentPassword},
                type:'get',
                success:function(data){
                    if(data == "matched"){
                        $(".icon").html("<i style='color: green; font-size:20px' class='far fa-grin-alt'></i>");
                        $(".submit").attr("disabled", 'disabled'); 
                        $(".newPassword").removeAttr("disabled",'disabled');
                        $(".retypePassword").removeAttr("disabled",'disabled');
                        $(".retypePassword").keyup(function(){
                            let retypePassword = $(this).val();
                            let newPassword = $(".newPassword").val();
                            if(retypePassword !='' && retypePassword == newPassword){
                                $(".re_icon").html("<i style='color: green; font-size:20px' class='far fa-grin-alt'></i>");
                                $(".submit").removeAttr("disabled","disabled");
                            }
                            else{
                                $(".re_icon").html("<i style='color: red; font-size:20px' class='far fa-frown'></i>");
                                $(".submit").attr("disabled", 'disabled');
                            }
                        })
                    }else{
                        $(".icon").html("<i style='color: red; font-size:20px' class='far fa-frown'></i>");
                        $(".newPassword").attr("disabled",'disabled');
                        $(".retypePassword").attr("disabled",'disabled');
                    }
                    
                }


                
            })
    });
})
</script>
@endsection