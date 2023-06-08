<x-layout.layout-dashboard>
  <!-- Content -->
  {{-- @dump($reservations) --}}
  <div class="mt-[53px] p-5 lg:ml-[256px]">
    <h1 class="font-poppins text-2xl font-semibold">Reservations</h1>
    <div class="shadow-dark-custom mt-4 rounded-md bg-white px-5 py-4">
      <div x-data="{ selected: 'All' }">
        <div class="overflow-x-auto">
          <div class="mt-4 flex flex-wrap justify-end gap-x-2 gap-y-2">
            <p class="cursor-pointer rounded-sm border border-black/40 px-3 py-1 text-[12px]"
              :class="selected === 'All' ? 'bg-yellow-500 text-white' : 'bg-white'"
              x-on:click="selected = 'All'">All</p>
            <p class="cursor-pointer rounded-sm border border-black/40 px-3 py-1 text-[12px]"
              :class="selected === 'Pending' ? 'bg-gray-500 text-white' : 'bg-white'"
              x-on:click="selected = 'Pending'">Pending</p>
            <p class="cursor-pointer rounded-sm border border-black/40 px-3 py-1 text-[12px]"
              :class="selected === 'Checked In' ? 'bg-green-500 text-white' : 'bg-white'"
              x-on:click="selected = 'Checked In'">Checked In</p>
            <p class="cursor-pointer rounded-sm border border-black/40 px-3 py-1 text-[12px]"
              :class="selected === 'Checked Out' ? 'bg-blue-500 text-white' : 'bg-white'"
              x-on:click="selected = 'Checked Out'">Checked Out</p>
          </div>
          <table class="mt-6 w-full min-w-max overflow-x-auto">
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
                <tr class="border-y border-black/20 text-sm"
                  x-show="selected == 'All' ? selected == 'All' : selected == '{{ ucfirst($reservation->status) }}'">
                  <td class="px-2 py-3">{{ $loop->iteration }}</td>
                  <td class="px-2">{{ $reservation->user->name }}</td>
                  <td class="px-2">{{ $reservation->date_in }} to {{ $reservation->date_out }}</td>
                  <td class="px-2">${{ $reservation->total_price }}</td>
                  <td class="px-2 capitalize">{{ $reservation->room->roomType->type }}
                    {{ $reservation->room->room_code }}</td>
                  <td class="px-2">
                    @if ($reservation->status == 'Pending')
                      <span class="inline-block h-4 w-4 rounded-sm bg-gray-500"></span>
                    @elseif($reservation->status == 'Checked In')
                      <span class="inline-block h-4 w-4 rounded-sm bg-green-500"></span>
                    @else
                      <span class="inline-block h-4 w-4 rounded-sm bg-blue-500"></span>
                    @endif
                  </td>
                  <td class="px-2">
                    <a href="{{ route('reservation.detail', ['reservation' => $reservation->id]) }}"
                      class="hover:bg-blue-950 cursor-pointer rounded-full bg-blue-500 px-4 py-1 text-[12px] text-white transition">
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
