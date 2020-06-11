<?php

use Illuminate\Database\Seeder;
use App\Sensor;

class SensorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Sensor::class, 10)->create();
    }
}
