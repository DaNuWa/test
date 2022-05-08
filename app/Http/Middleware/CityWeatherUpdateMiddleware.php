<?php

namespace App\Http\Middleware;

use App\Models\CityWeather;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CityWeatherUpdateMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (auth()->check()) {

            $key = env('WEATHER_API');
            $cities=[config('app.city1'),config('app.city2')];
            $tempInfo=[];

            foreach ($cities as $index=> $city) {
                $response = Http::get("https://api.openweathermap.org/data/2.5/weather?q=$city&appid=$key");
                $temp=$response->json()['main']['temp'];
                if($index==0){
                    $tempInfo['city1_temp']=$temp;
                }else{
                    $tempInfo['city2_temp']=$temp;
                }
            }

            auth()->user()->cityWeatherDetails()->create($tempInfo);
        }

        return $next($request);
    }

}
