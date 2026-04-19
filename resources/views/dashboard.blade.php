<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Daftar Kamar Hotel') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if (session('success'))
                <div class="mb-6 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded shadow-sm" role="alert">
                    <strong class="font-bold">Berhasil!</strong>
                    <span class="block sm:inline"> {{ session('success') }} </span>
                </div>
            @endif

            <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @foreach ($rooms as $room)
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 border border-gray-200">

                        <div class="flex justify-between items-center mb-4">
                            <h3 class="text-2xl font-bold text-gray-900">Kamar {{ $room->room_number }}</h3>
                            <span
                                class="px-2 py-1 text-xs font-semibold rounded-full 
                                {{ $room->status === 'available'
                                    ? 'bg-green-100 text-green-800'
                                    : ($room->status === 'booked'
                                        ? 'bg-red-100 text-red-800'
                                        : 'bg-yellow-100 text-yellow-800') }}">
                                {{ strtoupper($room->status) }} 
                            </span>
                        </div>
                        <p class="text-gray-600 font-medium mb-2">{{ $room->room_type }}</p>
                        <p class="text-sm text-gray-500 mb-4 line-clamp-2">{{ $room->description }}</p>

                        <div class="mt-auto pt-4">
                            <p class="text-lg font-semibold text-blue-600 mb-4">
                                Rp {{ number_format($room->price_per_night, 0, ',', '.') }}
                                <span class="text-sm font-normal text-gray-500">/ malam</span>
                            </p>

                            <a href="{{ route('reservations.create', $room->id) }}"
                                class="block w-full text-center bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded transition duration-150">
                                Pesan Sekarang 
                            </a>
                        </div>

                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
