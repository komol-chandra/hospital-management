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
            RollSeeder::class,
            BloodSeeder::class,
            DaySeeder::class,
            UserSeeder::class,
            FrontendUserSeeder::class,
            PatientSeeder::class,
            DepartmentSeeder::class,
            PermisionSeeder::class,
            TestSeeder::class,
            MedicineTypeSeeder::class,
            GenericSeeder::class,
            ManufacturerSeeder::class,
            UnitTypeSeeder::class,
            MedicineSeeder::class,
            SettingSeeder::class,
            AccountTypeSeeder::class,
            AccountSeeder::class,
            PaymentSeeder::class,
            ServiceSeeder::class,
            PaymentMethodSeeder::class,
        ]);
    }
}
