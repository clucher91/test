<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Tests\Feature\CRUDTest;
use App\Sensor;

class SensorTest extends CRUDTest
{
    protected function makeModel()
    {
        return factory($this->getClassName())->make();
    }
    
    protected function createModel()
    {
        return factory($this->getClassName())->create();
    }

    protected function assertJsonShow($model)
    {
        return collect($model->toArray())->only([
            'id', 
            'point_x',
            'point_y'
        ])->all();
    }
    
    protected function getUrl(): string
    {
        return '/api/sensores/';
    }

    protected function getTableName(): string
    {
        return 'sensors';
    }

    protected function getClassName(): string
    {
        return Sensor::class;
    }

}
