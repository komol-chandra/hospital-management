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
            DoctorSeeder::class,
            PatientSeeder::class,
            ScheduleSeeder::class,
            TestSeeder::class,
            PatientTestSeeder::class,
            MedicineTypeSeeder::class,
            GenericSeeder::class,
            MedicineSeeder::class,
            ManufacturerSeeder::class,
        ]);
    }
}
