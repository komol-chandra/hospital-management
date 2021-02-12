<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            BloodSeeder::class,
            DaySeeder::class,
            DepartmentSeeder::class,
        ]);
        \App\Models\Doctor::factory(20)->create();
        \App\Models\Patient::factory(2000)->create();
        $this->call([
            ScheduleSeeder::class,
            TestSeeder::class,
            PatientTestSeeder::class,
            MedicineTypeSeeder::class,
            GenericSeeder::class,
            MedicineSeeder::class,
            ManufacturerSeeder::class,
            EmployeeRollSeeder::class,
            EmployeeSeeder::class,
            SettingSeeder::class,
            AccountTypeSeeder::class,
            AccountSeeder::class,
            PaymentSeeder::class,
            ServiceSeeder::class,
            PaymentMethodSeeder::class,
            PermisionSeeder::class,
        ]);
    }
}
