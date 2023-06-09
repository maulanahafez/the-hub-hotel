<x-layout.layout-dashboard>
  <div class="mt-[53px] p-5 lg:ml-[256px]">
    <h1 class="font-poppins text-2xl font-semibold">Rooms</h1>
    <div class="shadow-dark-custom mt-4 rounded-md bg-white px-5 py-6">
      <div x-data="{ available: true, occupied: true }">
        <div class="flex flex-wrap items-center justify-between gap-x-4 gap-y-2">
          <a href="{{ route('room.create') }}"
            class="hover:bg-sky-950 flex items-center gap-x-2 rounded-md bg-blue-500 px-4 py-2 text-white transition">
            <i class="fa-solid fa-plus text-lg"></i>
            <span class="text-sm">Add</span>
          </a>
          {{-- <div class="flex flex-wrap gap-x-4 gap-y-2">
            <span class="cursor-pointer rounded-md border-2 px-4 py-1 text-sm transition"
              x-on:click="[available, occupied] = [true, true]"
              :class="available && occupied ? 'bg-blue-500 border-blue-500 text-white' : 'border-black/20 bg-white'">
              All
            </span>
            <span class="cursor-pointer rounded-md border-2 px-4 py-1 text-sm transition"
              x-on:click="[available, occupied] = [true, false]"
              :class="available && !occupied ? 'bg-blue-500 border-blue-500 text-white' : 'border-black/20 bg-white'">
              Available
            </span>
            <span class="cursor-pointer rounded-md border-2 px-4 py-1 text-sm transition"
              x-on:click="[available, occupied] = [false, true]"
              :class="!available && occupied ? 'bg-blue-500 border-blue-500 text-white' : 'border-black/20 bg-white'">
              Unavailable
            </span>
          </div> --}}
        </div>
        @if (session('successStore'))
          <div>
            <p class="mt-4 rounded-sm bg-green-500 px-3 py-2 text-white">Room has been created successfully!</p>
          </div>
        @endif
        @if (session('successDelete'))
          <div>
            <p class="mt-4 rounded-sm bg-green-500 px-3 py-2 text-white">Room has been deleted successfully!</p>
          </div>
        @endif
        <div class="mt-4 overflow-x-auto">
          <table class="w-full min-w-max overflow-x-auto"
            id="room">
            <thead class="font-poppins font-semibold">
              <tr>
                <td class="px-2"></td>
                <td class="px-2">Type</td>
                <td class="px-2">Room Code</td>
                <td class="px-2">Status</td>
                <td class="px-2">Action</td>
              </tr>
            </thead>
            <tbody>
              @foreach ($rooms as $room)
                <tr class="border-y border-black/20 text-sm"
                  x-show="{{ strtolower($room->status) }}">
                  <td class="px-2 py-3">
                    {{ $loop->iteration }}
                  </td>
                  <td class="px-2 capitalize">
                    {{ $room->roomType->type }}
                  </td>
                  <td class="px-2 uppercase">
                    {{ $room->room_code }}
                  </td>
                  <td class="px-2">
                    @if ($room->status == 'Available')
                      <span class="rounded-full bg-green-500 px-3 py-1 text-[12px] text-white">
                        Available
                      </span>
                    @else
                      <span class="rounded-full bg-black/60 px-3 py-1 text-[12px] text-white">
                        Unavailable
                      </span>
                    @endif
                  </td>
                  <td class="px-2">
                    <a href="{{ route('room.edit', ['room' => $room->id]) }}"
                      class="hover:bg-blue-950 cursor-pointer rounded-full bg-blue-500 px-4 py-1 text-[12px] text-white transition">
                      Details
                    </a>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
          <script>
            $(document).ready(function() {
              $('#room').DataTable();
            });
          </script>
        </div>
      </div>
    </div>
  </div>
</x-layout.layout-dashboard>
