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

    public function getClosestStation($city_name, $latitude, $longitude){
        $station = new Station();

        $response = $station->getFilteredResponse($city_name, true); // always filter closed
        $prefer_element = $response->first();

        if ($latitude && $longitude){
            $closest_delta_a = 99999;
            $closest_delta_b = $closest_delta_a;

            foreach($response as $element){
                $delta_a = abs($latitude - $element->latitude);
                $delta_b = abs($longitude - $element->longitude);

                if ($delta_a < $closest_delta_a) {
                    $closest_delta_a = $delta_a;
                    if ($delta_b < $closest_delta_b){
                        $closest_delta_b = $delta_b;
                        $prefer_element = $element;
                    }
                }
            }
        }

        return $prefer_element;
    }
}
