<?php

namespace Database\Seeders;

use App\Models\ModelsPermission;
use Illuminate\Database\Seeder;

class PermisionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            // RBAC Module has 3 Feature's
            //RBAC Module's
            [
                'name'        => 'RBAC',
                'guard_name'  => 'web',
                'module_name' => null,
                'details'     => 'MODULE',
                'type'        => null,
            ],

            //Feature's
            [
                'name'        => 'Role',
                'guard_name'  => 'web',
                'module_name' => 'RBAC',
                'details'     => 'FEATURE',
                'type'        => null,
            ],
            [
                'name'        => 'User',
                'guard_name'  => 'web',
                'module_name' => 'RBAC',
                'details'     => 'FEATURE',
                'type'        => null,
            ],
            [
                'name'        => 'User_Access',
                'guard_name'  => 'web',
                'module_name' => 'RBAC',
                'details'     => 'FEATURE',
                'type'        => null,
            ],

            //Role Control

            [
                'name'        => 'Add_Role',
                'guard_name'  => 'web',
                'module_name' => 'Role',
                'details'     => 'Add_Role',
                'type'        => 1,
            ],
            [
                'name'        => 'Delete_Role',
                'guard_name'  => 'web',
                'module_name' => 'Role',
                'details'     => 'Delete_Role',
                'type'        => 4,
            ],
            [
                'name'        => 'View_Permissions',
                'guard_name'  => 'web',
                'module_name' => 'Role',
                'details'     => 'View_Permissions',
                'type'        => 5,
            ],

            //User Control

            [
                'name'        => 'Add_User',
                'guard_name'  => 'web',
                'module_name' => 'User',
                'details'     => 'Add_User',
                'type'        => 1,
            ],
            [
                'name'        => 'Delete_User',
                'guard_name'  => 'web',
                'module_name' => 'User',
                'details'     => 'Delete_User',
                'type'        => 4,
            ],

            //User_Access Control
            [
                'name'        => 'access_for_user',
                'guard_name'  => 'web',
                'module_name' => 'User_Access',
                'details'     => 'access_for_user',
                'type'        => 1,
            ],

            //Patient  Module has 0 Feature's
            //Patient Module
            [
                'name'        => 'Patient',
                'guard_name'  => 'web',
                'module_name' => null,
                'details'     => 'MODULE',
                'type'        => null,
            ],
            //Patient Control
            [
                'name'        => 'Add_Patient',
                'guard_name'  => 'web',
                'module_name' => 'Patient',
                'details'     => 'Add_Patient',
                'type'        => 1,
            ],
            [
                'name'        => 'Edit_Patient',
                'guard_name'  => 'web',
                'module_name' => 'Patient',
                'details'     => 'Edit_Patient',
                'type'        => 2,
            ],
            [
                'name'        => 'Status_Patient',
                'guard_name'  => 'web',
                'module_name' => 'Patient',
                'details'     => 'Status_Patient',
                'type'        => 3,
            ],
            [
                'name'        => 'Delete_Patient',
                'guard_name'  => 'web',
                'module_name' => 'Patient',
                'details'     => 'Delete_Patient',
                'type'        => 4,
            ],
            [
                'name'        => 'View_Patient',
                'guard_name'  => 'web',
                'module_name' => 'Patient',
                'details'     => 'View_Patient',
                'type'        => 5,
            ],
            //Employee  Module has 0 Feature's
            //Employee Module
            [
                'name'        => 'Employee',
                'guard_name'  => 'web',
                'module_name' => null,
                'details'     => 'MODULE',
                'type'        => null,
            ],
            //Employee Control
            [
                'name'        => 'Add_Employee',
                'guard_name'  => 'web',
                'module_name' => 'Employee',
                'details'     => 'Add_Employee',
                'type'        => 1,
            ],
            [
                'name'        => 'Edit_Employee',
                'guard_name'  => 'web',
                'module_name' => 'Employee',
                'details'     => 'Edit_Employee',
                'type'        => 2,
            ],
            [
                'name'        => 'Status_Employee',
                'guard_name'  => 'web',
                'module_name' => 'Employee',
                'details'     => 'Status_Employee',
                'type'        => 3,
            ],
            [
                'name'        => 'Delete_Employee',
                'guard_name'  => 'web',
                'module_name' => 'Employee',
                'details'     => 'Delete_Employee',
                'type'        => 4,
            ],
            [
                'name'        => 'View_Employee',
                'guard_name'  => 'web',
                'module_name' => 'Employee',
                'details'     => 'View_Employee',
                'type'        => 5,
            ],
            //Start Doctor Module
            // Doctor Module has 3 Feature's
            //Doctor Module's
            [
                'name'        => 'Doctor_Section',
                'guard_name'  => 'web',
                'module_name' => null,
                'details'     => 'MODULE',
                'type'        => null,
            ],

            //Feature's
            [
                'name'        => 'Department',
                'guard_name'  => 'web',
                'module_name' => 'Doctor_Section',
                'details'     => 'FEATURE',
                'type'        => null,
            ],
            [
                'name'        => 'Doctor',
                'guard_name'  => 'web',
                'module_name' => 'Doctor_Section',
                'details'     => 'FEATURE',
                'type'        => null,
            ],
            [
                'name'        => 'Schedule',
                'guard_name'  => 'web',
                'module_name' => 'Doctor_Section',
                'details'     => 'FEATURE',
                'type'        => null,
            ],
            [
                'name'        => 'Appointment',
                'guard_name'  => 'web',
                'module_name' => 'Doctor_Section',
                'details'     => 'FEATURE',
                'type'        => null,
            ],
            [
                'name'        => 'Prescription',
                'guard_name'  => 'web',
                'module_name' => 'Doctor_Section',
                'details'     => 'FEATURE',
                'type'        => null,
            ],

            //Department Control

            [
                'name'        => 'Add_Department',
                'guard_name'  => 'web',
                'module_name' => 'Department',
                'details'     => 'Add_Department',
                'type'        => 1,
            ],
            [
                'name'        => 'Edit_Department',
                'guard_name'  => 'web',
                'module_name' => 'Department',
                'details'     => 'Edit_Department',
                'type'        => 2,
            ],
            [
                'name'        => 'Status_Department',
                'guard_name'  => 'web',
                'module_name' => 'Department',
                'details'     => 'Status_Department',
                'type'        => 3,
            ],
            [
                'name'        => 'Delete_Department',
                'guard_name'  => 'web',
                'module_name' => 'Department',
                'details'     => 'Delete_Department',
                'type'        => 4,
            ],
            [
                'name'        => 'View_Department',
                'guard_name'  => 'web',
                'module_name' => 'Department',
                'details'     => 'View_Department',
                'type'        => 5,
            ],
            //Doctor Control

            [
                'name'        => 'Add_Doctor',
                'guard_name'  => 'web',
                'module_name' => 'Doctor',
                'details'     => 'Add_Doctor',
                'type'        => 1,
            ],
            [
                'name'        => 'Edit_Doctor',
                'guard_name'  => 'web',
                'module_name' => 'Doctor',
                'details'     => 'Edit_Doctor',
                'type'        => 2,
            ],
            [
                'name'        => 'Status_Doctor',
                'guard_name'  => 'web',
                'module_name' => 'Doctor',
                'details'     => 'Status_Doctor',
                'type'        => 3,
            ],
            [
                'name'        => 'Delete_Doctor',
                'guard_name'  => 'web',
                'module_name' => 'Doctor',
                'details'     => 'Delete_Doctor',
                'type'        => 4,
            ],
            [
                'name'        => 'View_Doctor',
                'guard_name'  => 'web',
                'module_name' => 'Doctor',
                'details'     => 'View_Doctor',
                'type'        => 5,
            ],
            //Schedule Control

            [
                'name'        => 'Add_Schedule',
                'guard_name'  => 'web',
                'module_name' => 'Schedule',
                'details'     => 'Add_Schedule',
                'type'        => 1,
            ],
            [
                'name'        => 'Edit_Schedule',
                'guard_name'  => 'web',
                'module_name' => 'Schedule',
                'details'     => 'Edit_Schedule',
                'type'        => 2,
            ],
            [
                'name'        => 'Status_Schedule',
                'guard_name'  => 'web',
                'module_name' => 'Schedule',
                'details'     => 'Status_Schedule',
                'type'        => 3,
            ],
            [
                'name'        => 'Delete_Schedule',
                'guard_name'  => 'web',
                'module_name' => 'Schedule',
                'details'     => 'Delete_Schedule',
                'type'        => 4,
            ],
            [
                'name'        => 'View_Schedule',
                'guard_name'  => 'web',
                'module_name' => 'Schedule',
                'details'     => 'View_Schedule',
                'type'        => 5,
            ],

            //Appointment Control

            [
                'name'        => 'Add_Appointment',
                'guard_name'  => 'web',
                'module_name' => 'Appointment',
                'details'     => 'Add_Appointment',
                'type'        => 1,
            ],
            [
                'name'        => 'Edit_Appointment',
                'guard_name'  => 'web',
                'module_name' => 'Appointment',
                'details'     => 'Edit_Appointment',
                'type'        => 2,
            ],
            [
                'name'        => 'Status_Appointment',
                'guard_name'  => 'web',
                'module_name' => 'Appointment',
                'details'     => 'Status_Appointment',
                'type'        => 3,
            ],
            [
                'name'        => 'Delete_Appointment',
                'guard_name'  => 'web',
                'module_name' => 'Appointment',
                'details'     => 'Delete_Appointment',
                'type'        => 4,
            ],
            [
                'name'        => 'View_Appointment',
                'guard_name'  => 'web',
                'module_name' => 'Appointment',
                'details'     => 'View_Appointment',
                'type'        => 5,
            ],
            //Prescription Control

            [
                'name'        => 'Add_Prescription',
                'guard_name'  => 'web',
                'module_name' => 'Prescription',
                'details'     => 'Add_Prescription',
                'type'        => 1,
            ],
            [
                'name'        => 'Edit_Prescription',
                'guard_name'  => 'web',
                'module_name' => 'Prescription',
                'details'     => 'Edit_Prescription',
                'type'        => 2,
            ],
            [
                'name'        => 'Status_Prescription',
                'guard_name'  => 'web',
                'module_name' => 'Prescription',
                'details'     => 'Status_Prescription',
                'type'        => 3,
            ],
            [
                'name'        => 'Delete_Prescription',
                'guard_name'  => 'web',
                'module_name' => 'Prescription',
                'details'     => 'Delete_Prescription',
                'type'        => 4,
            ],
            [
                'name'        => 'View_Prescription',
                'guard_name'  => 'web',
                'module_name' => 'Prescription',
                'details'     => 'View_Prescription',
                'type'        => 5,
            ],
            //End Doctor Module

            //Start Test Module
            // Test Module has 2 Feature's
            //Test Module's
            [
                'name'        => 'Test',
                'guard_name'  => 'web',
                'module_name' => null,
                'details'     => 'MODULE',
                'type'        => null,
            ],

            //Feature's
            [
                'name'        => 'Test_Type',
                'guard_name'  => 'web',
                'module_name' => 'Test',
                'details'     => 'FEATURE',
                'type'        => null,
            ],
            [
                'name'        => 'Test_Bill',
                'guard_name'  => 'web',
                'module_name' => 'Test',
                'details'     => 'FEATURE',
                'type'        => null,
            ],

            //Test_Type Control

            [
                'name'        => 'Add_Test_Type',
                'guard_name'  => 'web',
                'module_name' => 'Test_Type',
                'details'     => 'Add_Test_Type',
                'type'        => 1,
            ],
            [
                'name'        => 'Edit_Test_Type',
                'guard_name'  => 'web',
                'module_name' => 'Test_Type',
                'details'     => 'Edit_Test_Type',
                'type'        => 2,
            ],
            [
                'name'        => 'Status_Test_Type',
                'guard_name'  => 'web',
                'module_name' => 'Test_Type',
                'details'     => 'Status_Test_Type',
                'type'        => 3,
            ],
            [
                'name'        => 'Delete_Test_Type',
                'guard_name'  => 'web',
                'module_name' => 'Test_Type',
                'details'     => 'Delete_Test_Type',
                'type'        => 4,
            ],
            [
                'name'        => 'View_Test_Type',
                'guard_name'  => 'web',
                'module_name' => 'Test_Type',
                'details'     => 'View_Test_Type',
                'type'        => 5,
            ],
            //Test_Bill Control

            [
                'name'        => 'Add_Test_Bill',
                'guard_name'  => 'web',
                'module_name' => 'Test_Bill',
                'details'     => 'Add_Test_Bill',
                'type'        => 1,
            ],
            [
                'name'        => 'Edit_Test_Bill',
                'guard_name'  => 'web',
                'module_name' => 'Test_Bill',
                'details'     => 'Edit_Test_Bill',
                'type'        => 2,
            ],
            [
                'name'        => 'Status_Test_Bill',
                'guard_name'  => 'web',
                'module_name' => 'Test_Bill',
                'details'     => 'Status_Test_Bill',
                'type'        => 3,
            ],
            [
                'name'        => 'Delete_Test_Bill',
                'guard_name'  => 'web',
                'module_name' => 'Test_Bill',
                'details'     => 'Delete_Test_Bill',
                'type'        => 4,
            ],
            [
                'name'        => 'View_Test_Bill',
                'guard_name'  => 'web',
                'module_name' => 'Test_Bill',
                'details'     => 'View_Test_Bill',
                'type'        => 5,
            ],
            //End Test Module

            //Start Expenses Module
            // Expenses Module has 2 Feature's
            //Expenses Module's
            [
                'name'        => 'Expenses',
                'guard_name'  => 'web',
                'module_name' => null,
                'details'     => 'MODULE',
                'type'        => null,
            ],

            //Feature's
            [
                'name'        => 'Expenses_Type',
                'guard_name'  => 'web',
                'module_name' => 'Expenses',
                'details'     => 'FEATURE',
                'type'        => null,
            ],
            [
                'name'        => 'Expenses_Bill',
                'guard_name'  => 'web',
                'module_name' => 'Expenses',
                'details'     => 'FEATURE',
                'type'        => null,
            ],

            //Expenses_Type Control

            [
                'name'        => 'Add_Expenses_Type',
                'guard_name'  => 'web',
                'module_name' => 'Test_Expenses',
                'details'     => 'Add_Expenses_Type',
                'type'        => 1,
            ],
            [
                'name'        => 'Edit_Expenses_Type',
                'guard_name'  => 'web',
                'module_name' => 'Expenses_Type',
                'details'     => 'Edit_Expenses_Type',
                'type'        => 2,
            ],
            [
                'name'        => 'Status_Expenses_Type',
                'guard_name'  => 'web',
                'module_name' => 'Expenses_Type',
                'details'     => 'Status_Expenses_Type',
                'type'        => 3,
            ],
            [
                'name'        => 'Delete_Expenses_Type',
                'guard_name'  => 'web',
                'module_name' => 'Expenses_Type',
                'details'     => 'Delete_Expenses_Type',
                'type'        => 4,
            ],
            [
                'name'        => 'View_Expenses_Type',
                'guard_name'  => 'web',
                'module_name' => 'Expenses_Type',
                'details'     => 'View_Expenses_Type',
                'type'        => 5,
            ],
            //Expenses_Bill Control

            [
                'name'        => 'Add_Expenses_Bill',
                'guard_name'  => 'web',
                'module_name' => 'Expenses_Bill',
                'details'     => 'Add_Expenses_Bill',
                'type'        => 1,
            ],
            [
                'name'        => 'Edit_Expenses_Bill',
                'guard_name'  => 'web',
                'module_name' => 'Expenses_Bill',
                'details'     => 'Edit_Expenses_Bill',
                'type'        => 2,
            ],
            [
                'name'        => 'Status_Expenses_Bill',
                'guard_name'  => 'web',
                'module_name' => 'Expenses_Bill',
                'details'     => 'Status_Expenses_Bill',
                'type'        => 3,
            ],
            [
                'name'        => 'Delete_Expenses_Bill',
                'guard_name'  => 'web',
                'module_name' => 'Expenses_Bill',
                'details'     => 'Delete_Expenses_Bill',
                'type'        => 4,
            ],
            [
                'name'        => 'View_Expenses_Bill',
                'guard_name'  => 'web',
                'module_name' => 'Expenses_Bill',
                'details'     => 'View_Expenses_Bill',
                'type'        => 5,
            ],
            //End Expenses Module

//Start Medicine Module
            // Medicine Module has 4 Feature's
            //Medicine Module's
            [
                'name'        => 'Medicine',
                'guard_name'  => 'web',
                'module_name' => null,
                'details'     => 'MODULE',
                'type'        => null,
            ],
            //Feature's
            [
                'name'        => 'Medicine_Type',
                'guard_name'  => 'web',
                'module_name' => 'Medicine',
                'details'     => 'FEATURE',
                'type'        => null,
            ],
            [
                'name'        => 'Generic_List',
                'guard_name'  => 'web',
                'module_name' => 'Medicine',
                'details'     => 'FEATURE',
                'type'        => null,
            ],
            [
                'name'        => 'Manufacturer_List',
                'guard_name'  => 'web',
                'module_name' => 'Medicine',
                'details'     => 'FEATURE',
                'type'        => null,
            ],
            [
                'name'        => 'Medicine_List',
                'guard_name'  => 'web',
                'module_name' => 'Medicine',
                'details'     => 'FEATURE',
                'type'        => null,
            ],

            //Medicine_Type Control

            [
                'name'        => 'Add_Medicine_Type',
                'guard_name'  => 'web',
                'module_name' => 'Medicine_Type',
                'details'     => 'Add_Medicine_Type',
                'type'        => 1,
            ],
            [
                'name'        => 'Edit_Medicine_Type',
                'guard_name'  => 'web',
                'module_name' => 'Medicine_Type',
                'details'     => 'Edit_Medicine_Type',
                'type'        => 2,
            ],
            [
                'name'        => 'Status_Medicine_Type',
                'guard_name'  => 'web',
                'module_name' => 'Medicine_Type',
                'details'     => 'Status_Medicine_Type',
                'type'        => 3,
            ],
            [
                'name'        => 'Delete_Medicine_Type',
                'guard_name'  => 'web',
                'module_name' => 'Medicine_Type',
                'details'     => 'Delete_Medicine_Type',
                'type'        => 4,
            ],
            //Generic_List Control

            [
                'name'        => 'Add_Generic',
                'guard_name'  => 'web',
                'module_name' => 'Generic_List',
                'details'     => 'Add_Generic',
                'type'        => 1,
            ],
            [
                'name'        => 'Edit_Generic',
                'guard_name'  => 'web',
                'module_name' => 'Generic_List',
                'details'     => 'Edit_Generic',
                'type'        => 2,
            ],
            [
                'name'        => 'Status_Generic',
                'guard_name'  => 'web',
                'module_name' => 'Generic_List',
                'details'     => 'Status_Generic',
                'type'        => 3,
            ],
            [
                'name'        => 'Delete_Generic',
                'guard_name'  => 'web',
                'module_name' => 'Generic_List',
                'details'     => 'Delete_Generic',
                'type'        => 4,
            ],
            [
                'name'        => 'View_Generic',
                'guard_name'  => 'web',
                'module_name' => 'Generic_List',
                'details'     => 'View_Generic',
                'type'        => 5,
            ],
            //Manufacturer_List Control
            [
                'name'        => 'Add_Manufacturer',
                'guard_name'  => 'web',
                'module_name' => 'Manufacturer_List',
                'details'     => 'Add_Manufacturer',
                'type'        => 1,
            ],
            [
                'name'        => 'Edit_Manufacturer',
                'guard_name'  => 'web',
                'module_name' => 'Manufacturer_List',
                'details'     => 'Edit_Manufacturer',
                'type'        => 2,
            ],
            [
                'name'        => 'Status_Manufacturer',
                'guard_name'  => 'web',
                'module_name' => 'Manufacturer_List',
                'details'     => 'Status_Manufacturer',
                'type'        => 3,
            ],
            [
                'name'        => 'Delete_Manufacturer',
                'guard_name'  => 'web',
                'module_name' => 'Manufacturer_List',
                'details'     => 'Delete_Manufacturer',
                'type'        => 4,
            ],
            [
                'name'        => 'View_Manufacturer',
                'guard_name'  => 'web',
                'module_name' => 'Manufacturer_List',
                'details'     => 'View_Manufacturer',
                'type'        => 5,
            ],
            //Manufacturer_List Control

            [
                'name'        => 'Add_Medicine',
                'guard_name'  => 'web',
                'module_name' => 'Medicine_List',
                'details'     => 'Add_Medicine',
                'type'        => 1,
            ],
            [
                'name'        => 'Edit_Medicine',
                'guard_name'  => 'web',
                'module_name' => 'Medicine_List',
                'details'     => 'Edit_Medicine',
                'type'        => 2,
            ],
            [
                'name'        => 'Status_Medicine',
                'guard_name'  => 'web',
                'module_name' => 'Medicine_List',
                'details'     => 'Status_Medicine',
                'type'        => 3,
            ],
            [
                'name'        => 'Delete_Medicine',
                'guard_name'  => 'web',
                'module_name' => 'Medicine_List',
                'details'     => 'Delete_Medicine',
                'type'        => 4,
            ],
            [
                'name'        => 'View_Medicine',
                'guard_name'  => 'web',
                'module_name' => 'Medicine_List',
                'details'     => 'View_Medicine',
                'type'        => 5,
            ],
            //End Medicine Module

//Start Account Module
            // Account Module has 4 Feature's
            //Account Module's
            [
                'name'        => 'Account',
                'guard_name'  => 'web',
                'module_name' => null,
                'details'     => 'MODULE',
                'type'        => null,
            ],
            //Feature's
            [
                'name'        => 'Account_List',
                'guard_name'  => 'web',
                'module_name' => 'Account',
                'details'     => 'FEATURE',
                'type'        => null,
            ],
            [
                'name'        => 'Payment_List',
                'guard_name'  => 'web',
                'module_name' => 'Account',
                'details'     => 'FEATURE',
                'type'        => null,
            ],
            [
                'name'        => 'Account_Invoice_List',
                'guard_name'  => 'web',
                'module_name' => 'Account',
                'details'     => 'FEATURE',
                'type'        => null,
            ],
            //Account_List Control

            [
                'name'        => 'Add_Account',
                'guard_name'  => 'web',
                'module_name' => 'Account_List',
                'details'     => 'Add_Account',
                'type'        => 1,
            ],
            [
                'name'        => 'Edit_Account',
                'guard_name'  => 'web',
                'module_name' => 'Account_List',
                'details'     => 'Edit_Account',
                'type'        => 2,
            ],
            [
                'name'        => 'Status_Account',
                'guard_name'  => 'web',
                'module_name' => 'Account_List',
                'details'     => 'Status_Account',
                'type'        => 3,
            ],
            [
                'name'        => 'Delete_Account',
                'guard_name'  => 'web',
                'module_name' => 'Account_List',
                'details'     => 'Delete_Account',
                'type'        => 4,
            ],
            [
                'name'        => 'View_Account',
                'guard_name'  => 'web',
                'module_name' => 'Account_List',
                'details'     => 'View_Account',
                'type'        => 5,
            ],
            //Payment_List Control
            [
                'name'        => 'Add_Payment',
                'guard_name'  => 'web',
                'module_name' => 'Payment_List',
                'details'     => 'Add_Payment',
                'type'        => 1,
            ],
            [
                'name'        => 'Edit_Payment',
                'guard_name'  => 'web',
                'module_name' => 'Payment_List',
                'details'     => 'Edit_Payment',
                'type'        => 2,
            ],
            [
                'name'        => 'Status_Payment',
                'guard_name'  => 'web',
                'module_name' => 'Payment_List',
                'details'     => 'Status_Payment',
                'type'        => 3,
            ],
            [
                'name'        => 'Delete_Payment',
                'guard_name'  => 'web',
                'module_name' => 'Payment_List',
                'details'     => 'Delete_Payment',
                'type'        => 4,
            ],
            [
                'name'        => 'View_Payment',
                'guard_name'  => 'web',
                'module_name' => 'Payment_List',
                'details'     => 'View_Payment',
                'type'        => 5,
            ],
            //Account_Invoice_List Control

            [
                'name'        => 'Add_Account_Invoice',
                'guard_name'  => 'web',
                'module_name' => 'Account_Invoice_List',
                'details'     => 'Add_Account_Invoice',
                'type'        => 1,
            ],
            [
                'name'        => 'Edit_Account_Invoice',
                'guard_name'  => 'web',
                'module_name' => 'Account_Invoice_List',
                'details'     => 'Edit_Account_Invoice',
                'type'        => 2,
            ],
            [
                'name'        => 'Status_Account_Invoice',
                'guard_name'  => 'web',
                'module_name' => 'Account_Invoice_List',
                'details'     => 'Status_Account_Invoice',
                'type'        => 3,
            ],
            [
                'name'        => 'Delete_Account_Invoice',
                'guard_name'  => 'web',
                'module_name' => 'Account_Invoice_List',
                'details'     => 'Delete_Account_Invoice',
                'type'        => 4,
            ],
            [
                'name'        => 'View_Account_Invoice',
                'guard_name'  => 'web',
                'module_name' => 'Account_Invoice_List',
                'details'     => 'View_Account_Invoice',
                'type'        => 5,
            ],
            //End Account Module

//Start Billing Module
            // Billing Module has 4 Feature's
            //Billing Module's
            [
                'name'        => 'Billing',
                'guard_name'  => 'web',
                'module_name' => null,
                'details'     => 'MODULE',
                'type'        => null,
            ],
            //Feature's
            [
                'name'        => 'Service_Billing',
                'guard_name'  => 'web',
                'module_name' => 'Billing',
                'details'     => 'FEATURE',
                'type'        => null,
            ],
            [
                'name'        => 'Payment_Billing',
                'guard_name'  => 'web',
                'module_name' => 'Billing',
                'details'     => 'FEATURE',
                'type'        => null,
            ],
            [
                'name'        => 'Billing_Invoice',
                'guard_name'  => 'web',
                'module_name' => 'Billing',
                'details'     => 'FEATURE',
                'type'        => null,
            ],
            //Service_Billing Control
            [
                'name'        => 'Add_Service_Billing',
                'guard_name'  => 'web',
                'module_name' => 'Service_Billing',
                'details'     => 'Add_Service_Billing',
                'type'        => 1,
            ],
            [
                'name'        => 'Edit_Service_Billing',
                'guard_name'  => 'web',
                'module_name' => 'Service_Billing',
                'details'     => 'Edit_Service_Billing',
                'type'        => 2,
            ],
            [
                'name'        => 'Status_Service_Billing',
                'guard_name'  => 'web',
                'module_name' => 'Service_Billing',
                'details'     => 'Status_Service_Billing',
                'type'        => 3,
            ],
            [
                'name'        => 'Delete_Service_Billing',
                'guard_name'  => 'web',
                'module_name' => 'Service_Billing',
                'details'     => 'Delete_Service_Billing',
                'type'        => 4,
            ],
            [
                'name'        => 'View_Service_Billing',
                'guard_name'  => 'web',
                'module_name' => 'Service_Billing',
                'details'     => 'View_Service_Billing',
                'type'        => 5,
            ],
            //Payment_Billing Control

            [
                'name'        => 'Add_Payment_Billing',
                'guard_name'  => 'web',
                'module_name' => 'Payment_Billing',
                'details'     => 'Add_Payment_Billing',
                'type'        => 1,
            ],
            [
                'name'        => 'Edit_Payment_Billing',
                'guard_name'  => 'web',
                'module_name' => 'Payment_Billing',
                'details'     => 'Edit_Payment_Billing',
                'type'        => 2,
            ],
            [
                'name'        => 'Status_Payment_Billing',
                'guard_name'  => 'web',
                'module_name' => 'Payment_Billing',
                'details'     => 'Status_Payment_Billing',
                'type'        => 3,
            ],
            [
                'name'        => 'Delete_Payment_Billing',
                'guard_name'  => 'web',
                'module_name' => 'Payment_Billing',
                'details'     => 'Delete_Payment_Billing',
                'type'        => 4,
            ],
            [
                'name'        => 'View_Payment_Billing',
                'guard_name'  => 'web',
                'module_name' => 'Payment_Billing',
                'details'     => 'View_Payment_Billing',
                'type'        => 5,
            ],
            //Billing_Invoice Control

            [
                'name'        => 'Add_Billing_Invoice',
                'guard_name'  => 'web',
                'module_name' => 'Billing_Invoice',
                'details'     => 'Add_Billing_Invoice',
                'type'        => 1,
            ],
            [
                'name'        => 'Edit_Billing_Invoice',
                'guard_name'  => 'web',
                'module_name' => 'Billing_Invoice',
                'details'     => 'Edit_Billing_Invoice',
                'type'        => 2,
            ],
            [
                'name'        => 'Status_Billing_Invoice',
                'guard_name'  => 'web',
                'module_name' => 'Billing_Invoice',
                'details'     => 'Status_Billing_Invoice',
                'type'        => 3,
            ],
            [
                'name'        => 'Delete_Billing_Invoice',
                'guard_name'  => 'web',
                'module_name' => 'Billing_Invoice',
                'details'     => 'Delete_Billing_Invoice',
                'type'        => 4,
            ],
            [
                'name'        => 'View_Billing_Invoice',
                'guard_name'  => 'web',
                'module_name' => 'Billing_Invoice',
                'details'     => 'View_Billing_Invoice',
                'type'        => 5,
            ],
            //End Billing Module

//Start Report Module
            // Report Module has 4 Feature's
            //Report Module's
            [
                'name'        => 'Report',
                'guard_name'  => 'web',
                'module_name' => null,
                'details'     => 'MODULE',
                'type'        => null,
            ],
            //Feature's
            [
                'name'        => 'Income_Report',
                'guard_name'  => 'web',
                'module_name' => 'Report',
                'details'     => 'FEATURE',
                'type'        => null,
            ],
            [
                'name'        => 'Top_Doctor',
                'guard_name'  => 'web',
                'module_name' => 'Report',
                'details'     => 'FEATURE',
                'type'        => null,
            ],
            [
                'name'        => 'Expenses_Report',
                'guard_name'  => 'web',
                'module_name' => 'Report',
                'details'     => 'FEATURE',
                'type'        => null,
            ],
            [
                'name'        => 'Profit_Loss_Report',
                'guard_name'  => 'web',
                'module_name' => 'Report',
                'details'     => 'FEATURE',
                'type'        => null,
            ],
            //End Report Module

//Start Setting_Section Module
            // Setting_Section Module has 4 Feature's
            //Setting_Section Module's
            [
                'name'        => 'Setting_Section',
                'guard_name'  => 'web',
                'module_name' => null,
                'details'     => 'MODULE',
                'type'        => null,
            ],
            //Feature's
            [
                'name'        => 'Mail',
                'guard_name'  => 'web',
                'module_name' => 'Setting_Section',
                'details'     => 'FEATURE',
                'type'        => null,
            ],
            [
                'name'        => 'Notice',
                'guard_name'  => 'web',
                'module_name' => 'Setting_Section',
                'details'     => 'FEATURE',
                'type'        => null,
            ],
            [
                'name'        => 'Settings',
                'guard_name'  => 'web',
                'module_name' => 'Setting_Section',
                'details'     => 'FEATURE',
                'type'        => null,
            ],
            //Mail Control
            [
                'name'        => 'Add_Mail',
                'guard_name'  => 'web',
                'module_name' => 'Mail',
                'details'     => 'Add_Mail',
                'type'        => 1,
            ],
            [
                'name'        => 'Edit_Mail',
                'guard_name'  => 'web',
                'module_name' => 'Mail',
                'details'     => 'Edit_Mail',
                'type'        => 2,
            ],
            [
                'name'        => 'Status_Mail',
                'guard_name'  => 'web',
                'module_name' => 'Mail',
                'details'     => 'Status_Mail',
                'type'        => 3,
            ],
            [
                'name'        => 'Delete_Mail',
                'guard_name'  => 'web',
                'module_name' => 'Mail',
                'details'     => 'Delete_Mail',
                'type'        => 4,
            ],
            [
                'name'        => 'View_Mail',
                'guard_name'  => 'web',
                'module_name' => 'Mail',
                'details'     => 'View_Mail',
                'type'        => 5,
            ],
            //Notice Control

            [
                'name'        => 'Add_Notice',
                'guard_name'  => 'web',
                'module_name' => 'Notice',
                'details'     => 'Add_Notice',
                'type'        => 1,
            ],
            [
                'name'        => 'Edit_Notice',
                'guard_name'  => 'web',
                'module_name' => 'Notice',
                'details'     => 'Edit_Notice',
                'type'        => 2,
            ],
            [
                'name'        => 'Status_Notice',
                'guard_name'  => 'web',
                'module_name' => 'Notice',
                'details'     => 'Status_Notice',
                'type'        => 3,
            ],
            [
                'name'        => 'Delete_Notice',
                'guard_name'  => 'web',
                'module_name' => 'Notice',
                'details'     => 'Delete_Notice',
                'type'        => 4,
            ],
            [
                'name'        => 'View_Notice',
                'guard_name'  => 'web',
                'module_name' => 'Notice',
                'details'     => 'View_Notice',
                'type'        => 5,
            ],
        ];
        ModelsPermission::insert($permissions);
    }
}
