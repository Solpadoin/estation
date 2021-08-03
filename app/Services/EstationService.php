<?php

namespace App\Services;

use App\Models\Station;
use Exception;
use Illuminate\Support\Facades\Log;

class EstationService
{
    public function create($data)
    {
        $station = new Station();
        return $station->create($data, 201);
    }
    
    public function update($recordId, $data) : bool
    {
        try {
            $station = Station::findOrFail($recordId);
        }
        catch (Exception $e) {
            Log::error($e->getMessage());
            return false;
        }
        finally {
            Log::debug(self::class.': was updated with index = '.$recordId);
        }

        return $station->update($data);
    }

    public function get()
    {
        return Station::all();
    }

    public function version()
    {
        return response()->json(['app-version' => config('app.version'), 'laravel-version' => app()->version()]);
    }

    public function search($payload)
    {
       return Station::findMatches($payload);
    }

    public function delete($itemId)
    {  
        if (!isset($itemId)) {
            return false;
        }

        Station::destroy($itemId);
        return true;
    }

    public function findClosest($radius, $longitude, $latitude)
    {
        return Station::where('longitude', '>', $longitude - $radius)
                      ->where('longitude', '<', $longitude + $radius)
                      ->where('latitude' , '>', $latitude - $radius)
                      ->where('latitude' , '<', $latitude + $radius)->get();
    }
}
