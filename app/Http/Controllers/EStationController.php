<?php

namespace App\Http\Controllers;

use App\Http\Requests\StationRequestForm;
use App\Models\Station;
use Illuminate\Http\Request;

class EStationController extends Controller
{
    public function store(StationRequestForm $request){
        $station = new Station();
        return response()->json($station->create($request->validated(), 201));
    }

    public function update(StationRequestForm $request, $id){
        $station = Station::findOrFail($id);
        $station->update($request->all());

        return response()->json($station, 201);
    }

    public function destroy(StationRequestForm $request, $id){
        $station = Station::findOrFail($id);
        if($station->delete())
            return response(null, 204);
    }

    public function index(){
        return response()->json(Station::all(), 200);
    }

    public function show($id){
        return response()->json(Station::findOrFail($id), 200);
    }

    public function getFromCity($city_name, $open = null){
        $station = new Station();
        return response()->json($station->getFilteredResponse($city_name, $open));
    }

    public function getClosestStation(){
        $station = new Station();

    }
}
