<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class EnrollmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Enrollment::factory(10)->create();
    }
}
