<aside class="main-sidebar">
    <div class="sidebar">
        <div class="user-panel">
            <div class="image pull-left">
                <img src="/{{ Auth::user()->picture ?? 'backend/files/profile.jpg' }}" class="img-circle" alt="User Image">
            </div>
            <div class="info">
                <h4>Welcome</h4>
                <p>{{ Auth::user()->name }}</p>
            </div>
        </div>
       
        <!-- sidebar menu -->
        <ul class="sidebar-menu">
            <li class="active">
                <a href="{{ url('/admin') }}"><i class="fa fa-hospital-o"></i><span>Dashboard</span>
                </a>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-credit-card-alt"></i><span>RBAC</span>
                    <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ url('/admin/rbac/role') }}">Role</a></li>
                    <li><a href="{{ url('/admin/rbac/user') }}">User</a></li>
                    <li><a href="{{ url('/admin/rbac/user_access') }}">User Access</a></li>
                </ul>
            </li>
            @can('Department')
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-sitemap"></i><span>Department</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    @can('Department_Add')
                    <li><a href="{{ url('/admin/department/create') }}">Add Department</a></li>
                    @endcan
                    @can('Department_List')
                    <li><a href="{{ url('/admin/department') }}">Department list</a></li>
                    @endcan
                </ul>
            </li>
            @endcan
            @can('Doctor')
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-user-md"></i><span>Doctor</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    @can('Doctor_Add')
                    <li><a href="{{ url('/admin/doctor/create') }}">Add Doctor</a></li> 
                    @endcan
                    @can('Doctor_List')
                    <li><a href="{{ url('/admin/doctor') }}">Doctor list</a></li>
                    @endcan
                </ul>
            </li> 
            @endcan
            @can('Patient')
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-user"></i><span>Patient</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    @can('Patient_Add')
                    <li><a href="{{ url('/admin/patient/create') }}">Add patient</a></li>
                    @endcan
                    @can('Patient_List')
                    <li><a href="{{ url('/admin/patient') }}">patient list</a></li>
                    @endcan
                </ul>
            </li>
            @endcan
            @can('Schedule')
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-list-alt"></i> <span>Schedule</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    @can('Schedule_Add')
                    <li><a href="{{ url('/admin/schedule/create') }}">Add schedule</a></li>
                    @endcan
                    @can('Schedule_List')
                    <li><a href="{{ url('/admin/schedule') }}">schedule list</a></li>
                    @endcan
                </ul>
            </li>
            @endcan

            <li class="treeview">
                    <a href="#">
                    <i class="fa fa-file-text"></i><span>Report</span>
                    <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ url('/admin/doctor-report') }}">Doctor Report</a></li>
                </ul>
            </li>
            
            {{-- <li class="treeview">
                <a href="#">
                    <i class="fa fa-check-square-o"></i><span>Appionment</span>
                    <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ url('/admin/appointment/create') }}">Add appoinemnt</a></li>
                    <li><a href="{{ url('/admin/appointment') }}">Appionment list</a></li>
                </ul>
            </li> --}}
            @can('Appointment')
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-credit-card-alt"></i><span>Online Appionment</span>
                    <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    {{-- <li><a href="add-payment.html">Add payment</a></li> --}}
                    @can('Appointment_list')
                    <li><a href="{{ url('/admin/online-appointment') }}">Appionment list</a></li>
                    @endcan
                </ul>
            </li>
            @endcan
            @can('Test')
            <li class="treeview">
                    <a href="#">
                    <i class="fa fa-file-text"></i><span>Test</span>
                    <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    @can('Test_Type')
                    <li><a href="{{ url('/admin/test') }}">Test Type List</a></li>
                    @endcan
                    {{-- @can('Test_Bill') --}}
                    <li><a href="{{ url('/admin/test-bill') }}">Test Bill List</a></li>
                    {{-- @endcan --}}
                    {{-- @can('Test_Add')
                    <li><a href="{{ url('/admin/patient-test/create') }}">Test Add</a></li>
                    @endcan
                    @can('Test_List')
                    <li><a href="{{ url('/admin/patient-test') }}">Test List</a></li>
                    @endcan --}}
                </ul>
            </li>
            @endcan
            @can('Medicine')
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-user-circle-o"></i><span>Medicine</span>
                    <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    @can('Medicine_Type')
                    <li><a href="{{ url('/admin/medicine-type') }}">Medicine Type list</a></li>
                    @endcan
                    @can('Generic_List')
                    <li><a href="{{ url('/admin/generic') }}">Generic list</a></li>
                    @endcan
                    @can('Manufacturer_List')
                    <li><a href="{{ url('/admin/manufacturer') }}">Manufacture list</a></li>
                    @endcan
                    @can('Add_Medicine')
                    <li><a href="{{ url('/admin/medicine/create') }}">Add Medicine</a></li>
                    @endcan
                    @can('Medicine_List')
                    <li><a href="{{ url('/admin/medicine') }}">Medicine list</a></li>
                    @endcan
                </ul>
            </li>
            @endcan
            @can('Prescription')
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-file-text"></i><span>Prescription</span>
                    <span class="pull-right-container">
                     <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    @can('Prescription_Add')
                    <li><a href="{{ url('/admin/prescription/create') }}">Prescription Add</a></li>
                    @endcan
                    @can('Prescription_List')
                    <li><a href="{{ url('/admin/prescription') }}">Prescription List</a></li>
                    @endcan
                </ul>
            </li>
            @endcan
            @can('Account')
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-file-text-o"></i><span>Account</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    @can('Account_List')
                    <li><a href="{{ url('/admin/account') }}">Account List</a></li>
                    @endcan
                    @can('Payment_List')
                    <li><a href="{{ url('/admin/payment') }}">Payment list</a></li>
                    @endcan
                    @can('Account_Invoice_List')
                    <li><a href="{{ url('/admin/account-invoice') }}">Account Invoice list</a></li>
                    @endcan

                </ul>
            </li>
            @endcan
            @can('Billing')
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-bed"></i><span>Billing</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    @can('Service_Billing')
                    <li><a href="{{ url('/admin/service') }}">Service</a></li>
                    @endcan
                    @can('Payment_Billing')
                    <li><a href="{{ url('/admin/payment-method') }}">payment method</a></li>
                    @endcan
                    @can('Billing_Invoice')
                    <li><a href="{{ url('/admin') }}">Billing Invoice</a></li>
                    @endcan
                </ul>
            </li>
            @endcan
            
            @can('Human_Resource')
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-list-alt fw"></i><span>Human Resource</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    @can('Employee_Type')
                    <li><a href="{{ url('/admin/employee-roll') }}">Employee Type List</a></li>
                    @endcan
                    @can('Employee_Add')
                    <li><a href="{{ url('/admin/employee/create') }}">Add Employee</a></li>
                    @endcan
                    @can('Employee_List')
                    <li><a href="{{ url('/admin/employee') }}">Employee List</a></li>
                    @endcan
                </ul>
            </li>
            @endcan
            @can('Settings')
            <li>
                <a href="{{ url('/admin/setting') }}">
                    <i class="fa fa-window-maximize"></i><span>Settings</span> 
                </a>
            </li>
            @endcan
            @can('Notice')
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-file-text-o"></i><span>Notice</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    @can('Notice_Add')
                    <li><a href="{{ url('/admin/notice/create') }}">Add Notice</a></li>
                    @endcan
                    @can('Notice_List')
                    <li><a href="{{ url('/admin/notice') }}">Notice list</a></li>
                    @endcan

                </ul>
            </li>
            @endcan
            @can('Mail')
            <li>
                <a href="{{ url('/admin/mail') }}">
                    <i class="fa fa-window-maximize"></i><span>Mail</span> 
                </a>
            </li>
            @endcan
            {{-- 
            
        
        
        
        
        <li>
            <a href="mailbox.html">
             <i class="fa fa-envelope"></i><span> Mail</span>
         </a>
     </li>
     <li>
        <a href="widgets.html">
            <i class="fa fa-shopping-bag"></i><span> Widgets</span> 
        </a>
    </li>
    <li class="treeview">
        <a href="#">
            <i class="fa fa-file-text"></i><span>pages</span>
            <span class="pull-right-container">
             <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li><a href="register.html">Sign up</a></li>
            <li><a href="login.html">Sign in</a></li>
            <li><a href="forget_password.html">Forget password</a></li>
            <li><a href="lockscreen.html">Lockscreen</a></li>
            <li><a href="404.html">404 Error</a></li>
            <li><a href="505.html">505 Error</a></li>
            <li><a href="blank.html">Blank Page</a></li>
            <li><a href="profile.html">Profile page</a></li>
        </ul>
    </li>
    <li class="treeview">
        <a href="#">
            <i class="fa fa-list-alt fw"></i><span> User Interface</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li><a href="calender.html">Calender</a></li>
            <li><a href="buttons.html">Buttons</a></li>
            <li><a href="panels.html">Panels</a></li>
            <li><a href="typography.html">Typography</a></li>
            <li><a href="tabs.html">Tabs & accordian</a></li>
            <li><a href="icons_fontawesome.html">Icons</a></li>
            <li><a href="notification.html">Notifications</a></li>
            <li><a href="profile.html">Modals</a></li>
            <li><a href="gridSystem.html">grid</a></li>
            <li><a href="slider.html">slider</a></li>
            <li><a href="timeline.html">Timeline</a></li>
            <li><a href="invoice.html">Invoice</a></li>
            <li><a href="labels-badges-alerts.html">Badges</a></li>
            <li><a href="progressbars.html">progress bar</a></li>
            
        </ul>
    </li>
    
    
                     --}}
</ul>
</div> <!-- /.sidebar -->
</aside>