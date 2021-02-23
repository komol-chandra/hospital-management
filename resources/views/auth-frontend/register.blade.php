<!DOCTYPE html>
<html lang="en"><head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hospital Register</title>
    @include('backend.layouts.css')
</head>
<body>
    <!-- Content Wrapper -->
    <div class="login-wrapper">
        <div class="container-center">
            <div class="panel panel-bd">
                <div class="panel-heading">
                    <div class="view-header">
                        <div class="header-icon">
                            <i class="pe-7s-unlock"></i>
                        </div>
                        <div class="header-title">
                            <h3>Register</h3>
                            <small><strong>Please enter your credentials to login.</strong></small>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ url('/user/register') }}" id="loginForm" novalidate>
                        @csrf
                        <div class="form-group">
                            <label>Select User Type</label>
                            <select class="form-control" name="type">
                                <option value="patient">Patient</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="user-name">User Name </label>
                            <input type="text" placeholder="kiri2ka.kr" title="Please enter you User Name" required="" name="name" :value="old('name')" id="user-name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="full_name">Full Name </label>
                            <input type="text" placeholder="kiri2ka.kr" title="Please enter you User Name" required="" name="full_name" :value="old('full_name')" id="full_name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="email">Email</label>
                            <input type="email" placeholder="kiri2ka.kr" title="Please enter you email" required="" name="email" :value="old('email')" id="email" class="form-control">
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="password">New Password</label>
                            <input type="password" title="Please enter your password" placeholder="******" required="" value="" name="password" id="password" class="form-control newPassword">
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="mobile">User Mobile </label>
                            <input type="number" placeholder="kiri2ka.kr" title="Please enter you User Mobile" required="" name="mobile" :value="old('mobile')" id="mobile" class="form-control">
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="birthday">User birthday </label>
                            <input type="date" placeholder="kiri2ka.kr" title="Please enter you User birthday" required="" name="birthday" :value="old('birthday')" id="birthday" class="form-control">
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="address">User Address </label>
                            <input type="text" placeholder="dhaka" title="Please enter you User Address" required="" name="address" :value="old('address')" id="address" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Select User gender</label>
                            <select class="form-control" name="gender">
                                <option value="1">Male</option>
                                <option value="2">Female</option>
                                <option value="3">Other</option>
                            </select>
                        </div>
                        <div>
                            <button class="btn btn-primary submit" type="submit">register</button>
                        </div>
                    </form>
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ url('user/login-view') }}">
                        {{ __('Login') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
</body>

@include('backend.layouts.js')
{{-- <script src='https://kit.fontawesome.com/a076d05399.js'></script> --}}
{{-- <script>
$(document).ready(function(){
    console.log('hi');
    $(".submit").attr("disabled", 'disabled'); 
        $(".matchPassword").keyup(function() {
            let matchPassword = $(this).val();
            let newPassword = $(this).val();
            console.log(newPassword,matchPassword);
            if (matchPassword === newPassword) {
                console.log("ok");
                } else {
                console.log('error');
                }
            $.ajax({
                url:'/admin/matchPassword',
                data:{currentPassword:currentPassword},
                type:'get',
                success:function(data){
                    if(data == "matched"){
                        $(".icon").html("<i style='color: green; font-size:20px' class='far fa-grin-alt'></i>");
                        $(".submit").attr("disabled", 'disabled'); 
                        $(".newPassword").removeAttr("disabled",'disabled');
                        $(".password_confirmation").removeAttr("disabled",'disabled');
                        $(".password_confirmation").keyup(function(){
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
</script> --}}
</html>

