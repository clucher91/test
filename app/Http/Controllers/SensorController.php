<?php

namespace App\Http\Controllers;

use App\Sensor;
use Illuminate\Http\Request;
use App\Http\Requests\SensorRequest;
use App\Http\Requests\SensorDistanceRequest;
use App\Services\CRUDService;

class SensorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(CRUDService $service)
    {
        $this->service = $service;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SensorRequest $request)
    {
       return $this->service->create($request->attributes());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sensor  $sensor
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->service->show($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sensor  $sensor
     * @return \Illuminate\Http\Response
     */
    public function update(SensorRequest $request, $id)
    {
        return $this->service->update($id ,$request->attributes());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sensor  $sensor
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->service->delete($id);

        return response()->json(true);
    }   


    public function distance(SensorDistanceRequest $request)
    {
       return $this->service->calculateDistance($request->attributes())->sort();
    }
}
