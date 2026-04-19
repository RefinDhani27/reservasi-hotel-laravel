<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard Admin') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if (session('success'))
                <div class="mb-6 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded shadow-sm"
                    role="alert">
                    <strong class="font-bold">Berhasil!</strong>
                    <span class="block sm:inline"> {{ session('success') }} </span>
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 border border-gray-200">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8 border-b border-gray-200 pb-8">

                    <div class="bg-blue-50 rounded-lg p-4 border border-blue-100 flex items-center">
                        <div class="p-3 rounded-full bg-blue-100 text-blue-600 mr-4">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2">
                                </path>
                            </svg>
                        </div>
                        <div>
                            <p class="mb-2 text-sm font-medium text-blue-600">Total Pesanan</p>
                            <p class="text-3xl font-bold text-gray-900">{{ $totalPesanan }}</p>
                        </div>
                    </div>

                    <div class="bg-green-50 rounded-lg p-4 border border-green-100 flex items-center">
                        <div class="p-3 rounded-full bg-green-100 text-green-600 mr-4">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                                </path>
                            </svg>
                        </div>
                        <div>
                            <p class="mb-2 text-sm font-medium text-green-600">Total Pendapatan</p>
                            <p class="text-2xl font-bold text-gray-900">Rp
                                {{ number_format($totalPendapatan, 0, ',', '.') }}</p>
                        </div>
                    </div>

                    <div class="bg-yellow-50 rounded-lg p-4 border border-yellow-100 flex items-center">
                        <div class="p-3 rounded-full bg-yellow-100 text-yellow-600 mr-4">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <div>
                            <p class="mb-2 text-sm font-medium text-yellow-600">Menunggu Review</p>
                            <p class="text-3xl font-bold text-gray-900">{{ $pesananPending }}</p>
                        </div>
                    </div>

                    <div class="bg-indigo-50 rounded-lg p-4 border border-indigo-100 flex items-center">
                        <div class="p-3 rounded-full bg-indigo-100 text-indigo-600 mr-4">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                                </path>
                            </svg>
                        </div>
                        <div>
                            <p class="mb-2 text-sm font-medium text-indigo-600">Kamar Tersedia</p>
                            <p class="text-3xl font-bold text-gray-900">{{ $kamarTersedia }}</p>
                        </div>
                    </div>

                </div>

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
                                        @if ($reservasi->status === 'pending')
                                            <form action="{{ route('admin.reservasi.update', $reservasi->id) }}"
                                                method="POST" class="inline-block">
                                                @csrf
                                                @method('PATCH')
                                                <input type="hidden" name="status" value="confirmed">
                                                <button type="submit"
                                                    class="text-green-600 hover:text-green-900 font-bold mr-3">Setujui</button>
                                            </form>

                                            <form action="{{ route('admin.reservasi.update', $reservasi->id) }}"
                                                method="POST" class="inline-block">
                                                @csrf
                                                @method('PATCH')
                                                <input type="hidden" name="status" value="canceled">
                                                <button type="submit"
                                                    class="text-red-600 hover:text-red-900 font-bold">Tolak</button>
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
