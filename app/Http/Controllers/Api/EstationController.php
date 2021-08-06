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

    /**
     * @group RESTFul API
     */
    public function store(StationRequestForm $request)
    {
        return response()->json($this->service->create($request->validated()));
    }

    /**
     * @group Version
     */
    public function version()
    {
        return $this->service->version();
    }

    /**
     * @group RESTFul API
     */
    public function update(StationRequestForm $request, $recordId)
    {
        $status = $this->service->update($recordId, $request->all());
        return response()->json(['status' => $status], 200);
    }

    /**
     * @group RESTFul API
     */
    public function destroy(StationRequestForm $request, $id)
    {
        return response()->json(['status' => $this->service->delete($id)], 201);
    }

    /**
     * @group RESTFul API
     */
    public function index()
    {
        return response()->json(['items' => $this->service->get()], 200);
    }

    /**
     * @group RESTFul API
     */
    public function show(Request $request, $id)
    {
        $request['id'] = $id;
        return $this->search($request);
    }

    /**
     * @bodyParam radius float Radius. Example: 40
     * @bodyParam longitude float Longitude. Example: 34
     * @bodyParam latitude float Latitude. Example: 76
     */
    public function closest(Request $request)
    {
        $params = $request->all();
        if (!(isset($params['radius']) && isset($params['longitude']) && isset($params['latitude']))) {
            return response()->json(['success' => false, 'message' => 'radius, longitude, latitude is required!'], 501);
        }

        $elements = $this->service->findClosest($params['radius'], $params['longitude'], $params['latitude']);
        return response()->json(['success' => true, 'items' => $elements], 200);
    }

    /**
     * @group Search Item
     */
    public function search(Request $request)
    {
        $payload  = $request->all();
        $stations = $this->service->search($payload);

        return response()->json(['success' => true, 'payload' => $payload, 'stations' => $stations], 200);
    }
}
