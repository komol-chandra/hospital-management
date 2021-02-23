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
            BloodSeeder::class,
            DaySeeder::class,
            UserSeeder::class,
            DepartmentSeeder::class,
            EmployeeRollSeeder::class,
            PermisionSeeder::class,
            TestSeeder::class,
            MedicineTypeSeeder::class,
            GenericSeeder::class,
            MedicineSeeder::class,
            ManufacturerSeeder::class,
            EmployeeSeeder::class,
            SettingSeeder::class,
            AccountTypeSeeder::class,
            AccountSeeder::class,
            PaymentSeeder::class,
            ServiceSeeder::class,
            PaymentMethodSeeder::class,
        ]);
    }
}
