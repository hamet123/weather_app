<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MainController extends Controller
{
    public function getHome(){
        return view('home');
    }

    public function searchWeather(Request $req){
        $city = $req->city;
        $weatherResult = Http::withoutVerifying()->get('https://api.openweathermap.org/data/2.5/weather?q='.$city.'&appid=72d649ec8f4080838d67040afdfd094a')->json();
        if($weatherResult['cod']!==404){
            return view('home')->with('weather',$weatherResult);
        } else {
            return view('home')->with('noCityFound','Please enter a valid city name');
        }
        }
}
