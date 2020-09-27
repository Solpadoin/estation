<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Station extends Model
{
    use HasFactory;

    protected $fillable = [
        'city',
        'hour_start',
        'hour_end',
        'latitude',
        'longitude'
    ];

    public function getCityAttribute($value){
        return ucfirst($value);
    }

    public function getFromCity($city_name){
        return $this->where('city', 'LIKE', '%' . $city_name . '%')->get();
    }

    public function getFilteredResponse($city_name, $open){
        $response = $this->getFromCity($city_name);
        if ($open){
            $current_time = date("H:i:s", time());
            $response = $response->where('hour_start', '<', $current_time)->where('hour_end', '>', $current_time);
        }

        return $response;
    }
}
