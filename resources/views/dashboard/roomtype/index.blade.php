<x-layout.layout-dashboard>
  <section class="mt-[53px] p-5 lg:ml-[256px]">
    <h1 class="font-poppins text-2xl font-semibold">Room Types</h1>
    <div class="shadow-dark-custom mt-4 rounded-md bg-white px-5 py-6">
      <div>
        <div class="flex items-center">
          <a href="{{ route('room-type.create') }}"
            class="hover:bg-sky-950 flex items-center gap-x-2 rounded-md bg-blue-500 px-4 py-2 text-white transition">
            <i class="fa-solid fa-plus text-lg"></i>
            <span class="text-sm">Add</span>
          </a>
        </div>
        <div class="mt-4 overflow-x-auto">
          <table class="w-full min-w-max overflow-x-auto">
            <thead class="font-poppins font-semibold">
              <tr>
                <!-- <td class="px-2"></td> -->
                <td class="px-2">Name</td>
                <td class="px-2">Description</td>
                <td class="px-2">Size</td>
                <td class="px-2">Capacity</td>
                <td class="px-2">Bed</td>
                <td class="px-2">Price</td>
                <td class="px-2">Action</td>
              </tr>
            </thead>
            <tbody>
              @foreach ($roomTypes as $roomType)
                <tr class="border-y border-black/20 text-sm">
                  <!-- <td class="px-2">1</td> -->
                  <td class="px-2 capitalize">{{ $roomType->type }}</td>
                  <td class="max-w-sm px-2 py-3">
                    {{ $roomType->desc }}
                  </td>
                  <td class="px-2">{{ $roomType->size }}</td>
                  <td class="px-2">
                    <span>{{ $roomType->capacity }}</span>
                    <i class="fa-solid fa-person"></i>
                  </td>
                  <td class="px-2 capitalize">{{ $roomType->bed_qty }} {{ $roomType->bed_type }} bed</td>
                  <td class="px-2">${{ $roomType->price_per_day }}</td>
                  <td class="px-2">
                    <a href="{{ route('room-type.show', ['roomType' => $roomType->slug]) }}"
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
  </section>
</x-layout.layout-dashboard>
