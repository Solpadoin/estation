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

    public function getCityAttribute($value)
    {
        return ucfirst($value);
    }

    public function getLatitudeAttribute($value)
    {
        return ucfirst($value);
    }

    public function getLongtitudeAttribute($value)
    {
        return ucfirst($value);
    }

    public function getFromCity($city_name)
    {
        return $this->where('city', 'LIKE', '%' . $city_name . '%')->get();
    }

    public function getOpenedEstations($city_name, $opened)
    {
        $response = $this->getFromCity($city_name);
        if ($opened) {
            $current_time = date("H:i:s", time());
            $response = $response->where('hour_start', '<', $current_time)->where('hour_end', '>', $current_time);
        }

        return $response;
    }

    public static function findMatches(array $matches)
    {
        $query = self::select('*');

        if (!empty($matches) && count($matches) > 0) {
            foreach ($matches as $item => $value) {
                $query->where($item, $value);
            }
        }

        return $query->get();
    }
}
