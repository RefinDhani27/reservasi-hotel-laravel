<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard Admin') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 border border-gray-200">

                <h3 class="text-lg font-bold text-gray-900 mb-6">Daftar Seluruh Transaksi Hotel</h3>

                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-800 text-white">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Nama Tamu
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Kamar</th>
                                <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Tanggal
                                    Menginap</th>
                                <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Total Harga
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Status</th>
                                <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($reservations as $reservasi)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm font-bold text-gray-900">{{ $reservasi->user->name }}</div>
                                        <div class="text-sm text-gray-500">{{ $reservasi->user->email }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm font-medium text-gray-900">{{ $reservasi->room->room_type }}
                                        </div>
                                        <div class="text-sm text-gray-500">No. {{ $reservasi->room->room_number }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                        {{ \Carbon\Carbon::parse($reservasi->check_in_date)->format('d M y') }} <br>
                                        <span class="text-gray-400">s/d</span> <br>
                                        {{ \Carbon\Carbon::parse($reservasi->check_out_date)->format('d M y') }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-bold text-blue-600">
                                        Rp {{ number_format($reservasi->total_price, 0, ',', '.') }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span
                                            class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full 
                                            {{ $reservasi->status === 'confirmed'
                                                ? 'bg-green-100 text-green-800'
                                                : ($reservasi->status === 'canceled'
                                                    ? 'bg-red-100 text-red-800'
                                                    : 'bg-yellow-100 text-yellow-800') }}">
                                            {{ strtoupper($reservasi->status) }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        @if($reservasi->status === 'pending')
                                            <form action="{{ route('admin.reservasi.update', $reservasi->id) }}" method="POST" class="inline-block">
                                                @csrf
                                                @method('PATCH')
                                                <input type="hidden" name="status" value="confirmed">
                                                <button type="submit" class="text-green-600 hover:text-green-900 font-bold mr-3">Setujui</button>
                                            </form>

                                            <form action="{{ route('admin.reservasi.update', $reservasi->id) }}" method="POST" class="inline-block">
                                                @csrf
                                                @method('PATCH')
                                                <input type="hidden" name="status" value="canceled">
                                                <button type="submit" class="text-red-600 hover:text-red-900 font-bold">Tolak</button>
                                            </form>
                                        @else
                                            <span class="text-gray-400 italic">Selesai diproses</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
