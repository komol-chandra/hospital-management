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


            {{-- @can('RBAC')
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-credit-card-alt"></i><span>RBAC</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    @can('Role')<li><a href="{{ url('/admin/rbac/role') }}">Role</a></li>@endcan
                    @can('User')<li><a href="{{ url('/admin/rbac/user') }}">User</a></li>@endcan
                    @can('User_Access')<li><a href="{{ url('/admin/rbac/user_access') }}">User Access</a></li>@endcan
                </ul>
            </li>
            @endcan --}}
            @can('Patient')
            <li>
                <a href="{{ url('/admin/patient') }}">
                    <i class="fa fa-window-maximize"></i><span>Patient List</span>
                </a>
            </li>
            @endcan
            @can('Employee')
            <li>
                <a href="{{ url('/admin/employee') }}">
                    <i class="fa fa-window-maximize"></i><span>Employee List</span> 
                </a>
            </li>
            @endcan
            @can('Doctor_Section')
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-sitemap"></i><span>Doctor Section</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    @can('Department')<li><a href="{{ url('/admin/department') }}">Department list</a></li>@endcan
                    @can('Doctor')<li><a href="{{ url('/admin/doctor') }}">Doctor list</a></li>@endcan
                    @can('Schedule')<li><a href="{{ url('/admin/schedule') }}">Schedule list</a></li>@endcan
                    @can('Appointment')<li><a href="{{ url('/admin/online-appointment') }}">Appointment list</a></li>@endcan
                    @can('Prescription')<li><a href="{{ url('/admin/prescription') }}">Prescription List</a></li>@endcan
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
                    @can('Test_Type')<li><a href="{{ url('/admin/test') }}">Test Type List</a></li>@endcan
                    @can('Test_Bill')<li><a href="{{ url('/admin/test-bill') }}">Test Bill List</a></li>@endcan
                </ul>
            </li>
            @endcan
            @can('Expenses')
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-file-text"></i><span>Expenses</span>
                    <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    @can('Expenses_Type')<li><a href="{{ url('/admin/expense') }}">Expenses Type List</a></li>@endcan
                    @can('Expenses_Bill')<li><a href="{{ url('/admin/expense-bill') }}">Expenses Bill List</a></li>@endcan
                </ul>
            </li>
            @endcan
            @can('Medicine')
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-user-circle-o"></i><span>Pharmacy Basic Info</span>
                    <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    @can('Medicine_Type')<li><a href="{{ url('/admin/medicine-type') }}">Medicine Type list</a></li>@endcan
                    @can('Generic_List')<li><a href="{{ url('/admin/generic') }}">Generic list</a></li>@endcan
                    <li><a href="{{ url('/admin/unit-type') }}">Unit Type list</a></li>
                    @can('Manufacturer_List')<li><a href="{{ url('/admin/manufacturer') }}">Manufacture list</a></li>@endcan
                    @can('Medicine_List')<li><a href="{{ url('/admin/medicine') }}">Medicine list</a></li>@endcan
                </ul>
            </li>
            @endcan




            
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-user-circle-o"></i><span>Stock,Sele & Report</span>
                    <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ url('/admin/stock/create') }}">Add Stock</a></li>
                    <li><a href="{{ url('/admin/stock') }}"> Stock List</a></li>
                    <li><a href="{{ url('/admin/customer') }}"> Customer List</a></li>
                    <li><a href="{{ url('/admin/stock') }}">Add Sale</a></li>
                    <li><a href="{{ url('/admin/stock') }}"> Sale List</a></li>
                </ul>
            </li>



            @can('Account')
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-file-text-o"></i><span>Account</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    @can('Account_List')<li><a href="{{ url('/admin/account') }}">Account List</a></li>@endcan
                    @can('Payment_List')<li><a href="{{ url('/admin/payment') }}">Payment list</a></li>@endcan
                    @can('Account_Invoice_List')<li><a href="{{ url('/admin/account-invoice') }}">Account Invoice list</a></li>@endcan
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
                    @can('Service_Billing')<li><a href="{{ url('/admin/service') }}">Service</a></li>@endcan
                    @can('Payment_Billing')<li><a href="{{ url('/admin/payment-method') }}">payment method</a></li>@endcan
                    @can('Billing_Invoice')<li><a href="{{ url('/admin') }}">Billing Invoice</a></li>@endcan
                </ul>
            </li>
            @endcan
            @can('Report')
            <li class="treeview">
            <a href="#">
                <i class="fa fa-file-text"></i><span>Report</span>
                <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
                <ul class="treeview-menu">
                    @can('Income_Report')<li><a href="{{ url('/admin/income-report') }}">Income</a></li>@endcan
                    @can('Top_Doctor')<li><a href="{{ url('/admin/appointment-report') }}">Top Doctor By Appointment</a></li>@endcan
                    @can('Expenses_Report')<li><a href="{{ url('/admin/expense-report') }}">Expenses Report</a></li>@endcan
                    @can('Profit_Loss_Report')<li><a href="{{ url('/admin/profit-loss-report') }}">Profit & Loss Report</a></li>@endcan
                </ul>
            </li>
            @endcan
            @can('Setting_Section')
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-sitemap"></i><span>Settings Section</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    @can('Mail')<li><a href="{{ url('/admin/mail') }}">Mail</a></li>@endcan
                    @can('Notice')<li><a href="{{ url('/admin/notice') }}">Notice</a></li>@endcan
                    @can('Settings')<li><a href="{{ url('/admin/setting') }}">Settings</a></li>@endcan
                </ul>
            </li>
            @endcan
        </ul>
    </div> <!-- /.sidebar -->
</aside>