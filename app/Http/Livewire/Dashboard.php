<?php

namespace App\Http\Livewire;

use App\Models\CityWeather;
use Livewire\Component;

class Dashboard extends Component
{
    public $weatherInfos = [];
    public $city1WeatherInfos = [];
    public $city2WeatherInfos = [];

    public function mount()
    {
        $this->weatherInfos = CityWeather::where('user_id', auth()->id())->get()->map($this->mapTemp());

        $this->city1WeatherInfos = $this->weatherInfos;
        $this->city2WeatherInfos = $this->weatherInfos;
    }

    public function render()
    {
        return view('livewire.dashboard');
    }

    public function hottest()
    {
        $this->city1WeatherInfos = $this->city1WeatherInfos->sortBydesc('city1_temp')->map($this->mapTemp());
        $this->city2WeatherInfos = $this->city2WeatherInfos->sortBydesc('city2_temp')->map($this->mapTemp());
    }

    public function chronological()
    {
        $this->city1WeatherInfos = $this->city1WeatherInfos->sortBy('id')->map($this->mapTemp());
        $this->city2WeatherInfos = $this->city2WeatherInfos->sortBy('id')->map($this->mapTemp());
    }

    public function kelvinToCelcius($val)
    {
        return number_format($val - 273.15);
    }

    public function kelvinToFahrenheit($val)
    {
        return number_format((($val - 273.15) * 9 / 5) + 32);
    }

    /**
     * @return \Closure
     */
    private function mapTemp(): \Closure
    {
        return function ($info) {

            $info->city1Cel = $this->kelvinToCelcius($info->city1_temp);
            $info->city2Cel = $this->kelvinToCelcius($info->city2_temp);
            $info->city1Fah = $this->kelvinToFahrenheit($info->city1_temp);
            $info->city2Fah = $this->kelvinToFahrenheit($info->city2_temp);

            return $info;
        };
    }
}
