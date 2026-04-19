<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Formulir Pemesanan Kamar') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 border border-gray-200">
                
                <div class="mb-6 bg-blue-50 p-4 rounded-lg border border-blue-200"
                    <h3 class="text-lg font-bold text-blue-900">Detail Kamar: {{ $room->room_type }} (No: {{ $room->room_number }})</h3>
                    <p class="text-blue-700">Harga: Rp {{ number_format($room->price_per_night, 0, ',', '.') }} / malam</p>
                    <p class="text-sm text-blue-600 mt-2">{{ $room->description }}</p>
                </div>

                <form action="{{ route('reservations.store', $room->id) }}" method="POST">
                    @csrf

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                        <div>
                            <label for="check_in_date" class="block text-sm font-medium text-gray-700">Tanggal Check-In</label>
                            <input type="date" name="check_in_date" id="check_in_date"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                        </div>

                        <div>
                            <label for="check_out_date" class="block text-sm font-medium text-gray-700">Tanggal Check-Out</label>
                            <input type="date" name="check_out_date" id="check_out_date"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                        </div>
                    </div>

                    <div class="flex items-center justify-end mt-4 pt-4 border-t border-gray-100">
                        <a href="{{ route('dashboard') }}"
                            class="bg-white hover:bg-gray-50 font-semibold py-2 px-6 border border-gray-300 rounded shadow-sm transition duration-150 text-gray-700">
                            Batal
                        </a>

                        <button type="submit"
                            class="ml-4 inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-150">
                            Konfirmasi Pemesanan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
