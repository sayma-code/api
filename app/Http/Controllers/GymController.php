<?php

namespace App\Http\Controllers;

use App\Models\Gym;
use Illuminate\Http\Request;

class GymController extends Controller
{
    public function findNearestGyms(Request $request)
    {
        // Try to get user's IP-based location if latitude/longitude are not provided
       $ip = "8.8.8.8";
    $url = "https://geolocation-db.com/json/$ip&position=true";

    $locationData = json_decode(file_get_contents($url), true);    
    return $this->searchNearestGyms($locationData['latitude'], $locationData['longitude']);
    }

    private function searchNearestGyms($latitude, $longitude)
    {
        $radius = 10;
        $gyms = Gym::selectRaw(
            "
        id, name, address, latitude, longitude,
        (6371 * acos(cos(radians(?)) * cos(radians(latitude)) 
        * cos(radians(longitude) - radians(?)) + sin(radians(?)) 
        * sin(radians(latitude)))) AS distance",
            [$latitude, $longitude, $latitude]
        )
            ->having("distance", "<", $radius)
            ->orderBy("distance")
            ->get();
            if ($gyms->isEmpty()) {
                return response()->json(['message' => 'No gyms found within the specified radius.'], 404);
            }
        return response()->json($gyms);
    }
}
