<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>

            <!-- Weather Search Form -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mt-6">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="font-semibold text-lg">{{ __('Weather Search') }}</h3>
                    
                    <form action="{{ route('weather.search') }}" method="POST">
                        @csrf
                        <div class="flex flex-col space-y-4">
                            <label for="city" class="font-semibold">{{ __('City') }}</label>
                            <input
                                type="text"
                                id="city"
                                name="city"
                                class="border border-gray-300 p-2 rounded-md"
                                required
                                placeholder="Enter city name"
                            >
                            <button
                                type="submit"
                                class="bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600"
                            >
                                {{ __('Search') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Weather Search History -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mt-6">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="font-semibold text-lg">{{ __('Weather Search History') }}</h3>

                    @if ($history->isEmpty())
                        <p>{{ __("No weather searches found.") }}</p>
                    @else
                        <table class="table-auto w-full text-left">
                            <thead>
                                <tr>
                                    <th class="px-4 py-2">{{ __('City') }}</th>
                                    <th class="px-4 py-2">{{ __('Temperature (°C)') }}</th>
                                    <th class="px-4 py-2">{{ __('Weather Description') }}</th>
                                    <th class="px-4 py-2">{{ __('Search Date') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($history as $search)
                                    @php
                                        $weatherData = json_decode($search->weather_data, true);
                                        $temperature = $weatherData['main']['temp'] ?? 'N/A';
                                        $description = $weatherData['weather'][0]['description'] ?? 'N/A';
                                    @endphp
                                    <tr>
                                        <td class="border px-4 py-2">{{ $search->city }}</td>
                                        <td class="border px-4 py-2">{{ $temperature }} °C</td>
                                        <td class="border px-4 py-2 capitalize">{{ $description }}</td>
                                        <td class="border px-4 py-2">{{ $search->created_at->format('Y-m-d H:i') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
