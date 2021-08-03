<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\StationRequestForm;
use App\Http\Controllers\Controller;
use App\Services\EstationService;
use Illuminate\Http\Request;

class EstationController extends Controller
{
    protected $service;

    public function __construct(EstationService $service)
    {
        $this->service = $service;
    }

    public function store(StationRequestForm $request)
    {
        return response()->json($this->service->create($request->validated()));
    }

    public function version()
    {
        return $this->service->version();
    }

    public function update(StationRequestForm $request, $recordId)
    {
        $status = $this->service->update($recordId, $request->all());
        return response()->json(['status' => $status], 200);
    }

    public function destroy(StationRequestForm $request, $id)
    {
        return response()->json(['status' => $this->service->delete($id)], 201);
    }

    public function index()
    {
        return response()->json(['items' => $this->service->get()], 200);
    }

    public function show(Request $request, $id)
    {
        $request['id'] = $id;
        return $this->search($request);
    }

    public function closest(Request $request)
    {
        $params = $request->all();
        if (!(isset($params['radius']) && isset($params['longitude']) && isset($params['latitude']))) {
            return response()->json(['success' => false, 'message' => 'radius, longitude, latitude is required!'], 501);
        }

        $elements = $this->service->findClosest($params['radius'], $params['longitude'], $params['latitude']);
        return response()->json(['success' => true, 'items' => $elements], 200);
    }

    public function search(Request $request)
    {
        $payload  = $request->all();
        $stations = $this->service->search($payload);

        return response()->json(['success' => true, 'payload' => $payload, 'stations' => $stations], 200);
    }
}
