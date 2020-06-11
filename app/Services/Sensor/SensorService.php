<?php

namespace App\Services\Sensor;

use App\Services\CRUDService;
use App\Sensor;

class SensorService implements CRUDService
{
    public function create(array $attributes)
    {
        return Sensor::create($attributes);
    }

    public function show($id)
    {
        $sensor = Sensor::findOrFail($id);
        
        return $sensor;
    }

    public function update($id, array $attributes)
    {
        $sensor = Sensor::findOrFail($id);
       
        $sensor->update($attributes);

        return $sensor;
    }

    public function delete($id)
    {
        $sensor = Sensor::findOrFail($id);

        return $sensor->delete();
    }

    public function calculateDistance(array $attributes)
    {
        $sensors = Sensor::take($attributes['limit'])->get();

        return $sensors->map(function($sensor, $i) use ($attributes) {
             return $distances[] = sqrt(pow($attributes['point_x'] - $sensor['point_x'],2) + pow($attributes['point_y'] - $sensor['point_y'],2));
        });
    }


}