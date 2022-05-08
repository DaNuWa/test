<div>
    <div class="relative h-32 w-32 ...">
        <button
            wire:click="hottest"
            class="absolute top-0 right-0 h-10 w-1.5 bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
            Hottest first
        </button>
    </div>
    <br><br>

    <div class="relative h-32 w-32 ...">
        <button
            wire:click="chronological"
            class="absolute top-0 right-0 h-10 w-1.5 bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
            Reset order
        </button>
    </div>
    <br>

    <div class="flex mb-4">
        <div class="w-1/2 bg-gray-500 h-12">
            <table class="text-left w-full border-collapse">
                <!--Border collapse doesn't work on this site yet but it's available in newer tailwind versions -->
                <thead>
                <tr>
                    <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">{{config('app.city1')}}</th>
                </tr>
                </thead>
                <tbody class="grid-cols-2">
                @foreach($city1WeatherInfos as $index=>$info)
                    <tr class="hover:bg-grey-lighter">
                        <td class="py-4 px-6 border-b border-grey-light">
                            {{$info->created_at}}
                            <span class="ml-4">{{$info->city1Cel}} &#8451;</span>
                            <span class="ml-4">{{$info->city1Fah}} &#8457;</span>
                            <span class="ml-4">{{$info->city1_temp}} &#8457;</span>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="w-1/2 bg-gray-300 h-12">
            <table class="text-left w-full border-collapse">
                <!--Border collapse doesn't work on this site yet but it's available in newer tailwind versions -->
                <thead>
                <tr>
                    <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">{{config('app.city2')}}</th>
                </tr>
                </thead>
                <tbody class="grid-cols-2">
                @foreach($city2WeatherInfos as $index=>$info)
                    <tr class="hover:bg-grey-lighter">
                        <td class="py-4 px-6 border-b border-grey-light">
                            {{$info->created_at}}
                            <span class="ml-4">{{$info->city2Cel}} &#8451;</span>
                            <span class="ml-4">{{$info->city2Fah}} &#8457;</span>
                            <span class="ml-4">{{$info->city2_temp}} &#8457;</span>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>
