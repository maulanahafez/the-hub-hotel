<x-layout.layout-dashboard>
    <!-- Content -->
    <div class="mt-[53px] p-5 lg:ml-[256px]">
        <h1 class="font-poppins text-2xl font-semibold">Reservations</h1>
        <div class="mt-4 rounded-md bg-white px-5 py-6 shadow-dark-custom">
            <div x-data="{ available: true, unavailable: true }">
                <div class="mt-4 overflow-x-auto">
                    <table class="w-full min-w-max overflow-x-auto">
                        <thead class="font-poppins font-semibold">
                            <tr>
                                <td class="px-2"></td>
                                <td class="px-2">Name</td>
                                <td class="px-2">Date</td>
                                <td class="px-2">Total Price</td>
                                <td class="px-2">Room</td>
                                <td class="px-2">Status</td>
                                <td class="px-2">Action</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($reservations as $reservation)
                                <tr class="border-y border-black/20 text-sm" x-show="unavailable">
                                    <td class="px-2 py-3">{{ $number++ }}</td>
                                    <td class="px-2">{{ $reservation->user_name }}</td>
                                    <td class="px-2">{{ $reservation->date_in }} to {{ $reservation->date_out }}</td>
                                    <td class="px-2">{{ $reservation->total_price }}</td>
                                    <td class="px-2">{{ ucwords($reservation->room_name) }}
                                    </td>
                                    <td class="px-2">
                                        @if ($reservation->status == 'Checked Out')
                                            <span class="inline-block h-4 w-4 rounded-sm bg-green-500"></span>
                                        @elseif ($reservation->status == 'Checked In')
                                            <span class="inline-block h-4 w-4 rounded-sm bg-blue-500"></span>
                                        @else
                                            <span class="inline-block h-4 w-4 rounded-sm bg-gray-500"></span>
                                        @endif
                                    </td>
                                    <td class="px-2">
                                        <a href=""
                                            class="cursor-pointer rounded-full bg-blue-500 px-4 py-1 text-[12px] text-white transition hover:bg-blue-950">
                                            Details
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-layout.layout-dashboard>
