<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\Exception;
use Illuminate\Support\Facades\DB;
use App\Models\country;
use App\Models\city;
use App\Models\state;


class NamazTimingsController extends Controller
{
    // public function getNamazTimings(Request $request)
    // {
    //     $form = $request->has('submit');

    //     if ($form) {
    //         // Handle the form submission
    //         $country_id = $request->input('country');
    //         $country = Country::where('id', $country_id)->first()->shortname;
    //         $country_name = Country::where('id', $country_id)->first()->name;
    //         $city = $request->input('city');
            
    //         // Display Namaz timings
    //         $api_url = "http://api.aladhan.com/v1/timingsByCity?city=$city&country=$country";
    //         $response = Http::get($api_url);
            
    //         if ($response->successful()) {
    //             $data = $response->json();
    //             // dd($data);
    //             $timings = $data['data']['timings'];
    //             $date = $data['data']['date'];

    //             foreach ($timings as $key => $time) {
    //                 $timeParts = explode(':', $time);
    //                 $hour = (int) $timeParts[0];
                    
    //                 // Check if the hour is greater than or equal to 12, and subtract 12
    //                 if ($hour >= 12) {
    //                     $hour -= 12;
    //                     $timings[$key] = sprintf('%02d:%s', $hour, $timeParts[1]); // Reformat the time
    //                 }
    //             }

    //             return view('namaz_timings',compact('timings','form', 'country_name','date'));
    //         } else {
    //             return redirect()->back()->with('error', 'Failed to fetch Namaz timings');
    //         }
            
    //     } else {
    //         $users = DB::table('countries')->get();
    //         $users = country::all();
    //         $ip = '';
    //         if (isset($_SERVER['HTTP_CF_CONNECTING_IP'])) {
    //             $ip=$_SERVER['HTTP_CF_CONNECTING_IP'];
    //         }elseif (isset($_SERVER['HTTP_CLIENT_IP'])) {
    //         $ip = $_SERVER['HTTP_CLIENT_IP'];
    //         } else if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    //             $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    //         } else if (isset($_SERVER['HTTP_X_FORWARDED'])) {
    //             $ip = $_SERVER['HTTP_X_FORWARDED'];
    //         } else if (isset($_SERVER['HTTP_FORWARDED_FOR'])) {
    //             $ip = $_SERVER['HTTP_FORWARDED_FOR'];
    //         } else if (isset($_SERVER['HTTP_FORWARDED'])) {
    //             $ip = $_SERVER['HTTP_FORWARDED'];
    //         } else if (isset($_SERVER['REMOTE_ADDR'])) {
    //             $ip = $_SERVER['REMOTE_ADDR'];
    //         } else {
    //             $ip = 'UNKNOWN';
    //         }

    //         $ip = '123.108.92.230';
    //         // $ip = isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : 'UNKNOWN';

    //         $dataArray = json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=".$ip),true);
    //         // dd($dataArray);
    //         $country_code=$dataArray["geoplugin_countryCode"];
    //         $currentcity=$dataArray["geoplugin_city"];

    //         return view('namaz_timings', compact('users','country_code','currentcity'));
    //     }

    // }

    public function getNamazTimings(Request $request)
{
    $users = DB::table('countries')->get();
    $users = country::all();
    
    if ($request->has('submit')) {
        // Handle the form submission
        $country_id = $request->input('country');
        $country = Country::where('id', $country_id)->first()->shortname;
        $country_name = Country::where('id', $country_id)->first()->name;
        $city = $request->input('city');
    } else {
        // Get the user's IP address
        // $ip = $request->getClientIp();
        $ip = '123.108.92.230';
        
        // Use an IP geolocation service to retrieve location information
        $geolocation_data = json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=" . $ip), true);
        // dd($geolocation_data);
        $country = $geolocation_data["geoplugin_countryCode"];
        $city = $geolocation_data["geoplugin_city"];
        $countryName = $geolocation_data["geoplugin_countryName"];
    }

    $api_url = "http://api.aladhan.com/v1/timingsByCity?city=$city&country=$country";
    $response = Http::get($api_url);
    // Display Namaz timings
    
    if ($response->successful()) {
        $data = $response->json();
        // dd($data);
        $timings = $data['data']['timings'];
        $date = $data['data']['date'];
        $methodArray = $data['data']['meta']['method'];
        // dd($methodArray);

        // Reformat timings
        foreach ($timings as $key => $time) {
            $timeParts = explode(':', $time);
            $hour = (int) $timeParts[0];

            if ($hour >= 12) {
                $hour -= 12;
                $timings[$key] = sprintf('%02d:%s', $hour, $timeParts[1]);
            }
        }

    return view('namaz_timings', compact('timings', 'date' ,'users','city' , 'country','methodArray'));

    } else {
        return redirect()->back()->with('error', 'Failed to fetch Namaz timings');
    }
}


    public function getCitiesByCountry(Request $request) {
        $countryId = $request->input('id');

        $stateIds = State::where('country_id', $countryId)->pluck('id');
        // Get the cities where the state_id is in the array of state_ids
        $cities = City::whereIn('state_id', $stateIds)->pluck('name');
    

        return response()->json($cities);
    }   
}