<!DOCTYPE html>
<html lang="en"><head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hospital Login</title>
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
                            <h3>Login</h3>
                            <small><strong>Please enter your credentials to login.</strong></small>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ url('/user/login') }}" id="loginForm" novalidate>
                        @csrf
                        <div class="form-group">
                            <label>Select User Type</label>
                            <select class="form-control" name="type">
                                <option value="patient">Patient</option>
                                <option value="doctor">Doctor</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="email">Email</label>
                            <input type="email" placeholder="example@gmail.com" title="Please enter you Email" required="" value="" name="email" id="email" class="form-control">
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="password">Password</label>
                            <input type="password" title="Please enter your password" placeholder="******" required="" value="" name="password" id="password" class="form-control">
                        </div>
                        <div class="form-group">
                            <input id="remember_me" type="checkbox" class="form-checkbox" name="remember">
                            <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                        </div>
                        <div>
                            <button class="btn btn-primary" type="submit">Login</button>
                        </div>
                        <div>
                            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ url('user/register') }}">
                                {{ __('Register') }}
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Email</th>
                            <th>password</th>
                        </tr>
                    </thead>
                    {{-- <tbody>
                        <tr>
                            <td>admin@example.com</td>
                            <td>admin@example.com</td>
                        </tr>
                        <tr>
                            <td>doctor@example.com</td>
                            <td>doctor@example.com</td>
                        </tr>
                        <tr>
                            <td>accountant@example.com</td>
                            <td>accountant@example.com</td>
                        </tr>
                        <tr>
                            <td>receptionist@example.com</td>
                            <td>receptionist@example.com</td>
                        </tr>
                        
                    </tbody> --}}
                </table>
            </div>
        </div>
        <div class="col-md-4"></div>
    </div>
</body>
@include('backend.layouts.js')
</html>

