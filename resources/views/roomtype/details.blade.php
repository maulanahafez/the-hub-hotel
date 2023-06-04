<x-layout.layout>
  <section class="mx-auto mb-2 mt-[4rem] max-w-2xl p-4">
    <div class="container relative mx-auto">
      <div class="group relative max-h-80 overflow-hidden rounded-lg"
        x-data="{ selected: 1, count: {{ count($roomType->roomTypeImages) }} }">
        @foreach ($roomType->roomTypeImages as $image)
          <img src="{{ asset('storage/' . $image->path) }}"
            alt=""
            class="w-full object-cover"
            x-show="selected === {{ $loop->iteration }}"
            x-transition:enter="transition-all duration-500 ease-in-out"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100" />
        @endforeach
        <span
          class="absolute left-4 top-1/2 -translate-y-1/2 cursor-pointer text-4xl text-transparent transition group-hover:text-white"
          x-on:click="selected - 1 === 0 ? selected = count : selected--">
          <i class="fa-solid fa-caret-right rotate-180"></i>
        </span>
        <span
          class="absolute right-4 top-1/2 -translate-y-1/2 cursor-pointer text-4xl text-transparent transition group-hover:text-white"
          x-on:click="selected + 1 >= count ? selected = 1 : selected++">
          <i class="fa-solid fa-caret-right"></i>
        </span>
      </div>
      <form method="post"
        action=""
        class="mt-6">
        <button type="submit"
          class="hover:bg-sky-950 inline-block w-full rounded-lg bg-blue-500 py-2 text-center text-white transition">
          Book this room
        </button>
      </form>
      <div class="mt-6">
        <h1 class="font-poppins text-sky-950 text-3xl font-bold capitalize">
          {{ $roomType->type }}
        </h1>
        <p class="mt-4 indent-12 text-sm text-black/60">
          {{ $roomType->desc }}
        </p>
        <div class="mt-4 grid grid-cols-1 gap-x-2 gap-y-4 text-black/60 sm:grid-cols-2">
          <div class="flex items-center gap-x-2 capitalize">
            <i class="fa-solid fa-bed"></i>
            <p>{{ $roomType->bed_qty }} {{ $roomType->bed_type }} Bed</p>
          </div>
          <div class="flex items-center gap-x-2">
            <i class="fa-solid fa-users"></i>
            <p>{{ $roomType->capacity }} Person</p>
          </div>
          <div class="flex items-center gap-x-2">
            <i class="fa-solid fa-users"></i>
            <p class="flex gap-x-0.5">
              <span>{{ $roomType->size }} m</span>
              <span class="text-[10px]">2</span>
            </p>
          </div>
          <div class="flex items-center gap-x-2">
            <i class="fa-solid fa-money-bill"></i>
            <p class="flex gap-x-0.5">
              ${{ $roomType->price_per_day }}
            </p>
          </div>
        </div>
        <div class="mt-8">
          <h1 class="font-poppins text-sky-950 relative text-2xl font-semibold">
            <span>Room Facilities </span>
            <span class="bg-sky-950 absolute right-2 top-1/2 hidden h-px w-80 -translate-y-1/2 rounded-sm sm:inline">
            </span>
          </h1>
          <ul class="mt-4 grid list-inside list-disc grid-cols-2 gap-y-2 sm:grid-cols-3">
            @php
              $facilities = explode(',', $roomType->facility);
            @endphp
            @foreach ($facilities as $facility)
              <li>
                <span>{{ $facility }}</span>
              </li>
            @endforeach
          </ul>
        </div>
        <div class="mt-8">
          <h1 class="font-poppins text-sky-950 relative text-2xl font-semibold">
            <span>Hotel Facilities </span>

            <span class="bg-sky-950 absolute right-2 top-1/2 hidden h-px w-80 -translate-y-1/2 rounded-sm sm:inline">
            </span>
          </h1>
          <div class="mt-4 grid list-inside list-disc grid-cols-2 gap-y-2 sm:grid-cols-3">
            <div class="flex items-center gap-x-2">
              <i class="fa-solid fa-square-parking text-sky-500"></i>
              <p>Parking Area</p>
            </div>
            <div class="flex items-center gap-x-2">
              <i class="fa-solid fa-person-swimming text-sky-500"></i>
              <p>Swimming Pool</p>
            </div>
            <div class="flex items-center gap-x-2">
              <i class="fa-solid fa-dumbbell text-sky-500"></i>
              <p>Fitness Center</p>
            </div>
            <div class="flex items-center gap-x-2">
              <i class="fa-solid fa-spa text-sky-500"></i>
              <p>Spa & Massage</p>
            </div>
            <div class="flex items-center gap-x-2">
              <i class="fa-solid fa-wifi text-sky-500"></i>
              <p>Wi-Fi</p>
            </div>
            <div class="flex items-center gap-x-2">
              <i class="fa-solid fa-bell-concierge text-sky-500"></i>
              <p>Room Service</p>
            </div>
            <div class="flex items-center gap-x-2">
              <i class="fa-solid fa-utensils text-sky-500"></i>
              <p>Restaurant & Cafe</p>
            </div>
            <div class="flex items-center gap-x-2">
              <i class="fa-solid fa-gift text-sky-500"></i>
              <p>Gift Shop</p>
            </div>
            <div class="flex items-center gap-x-2">
              <i class="fa-solid fa-briefcase text-sky-500"></i>
              <p>Business Center</p>
            </div>
            <div class="flex items-center gap-x-2">
              <i class="fa-solid fa-children text-sky-500"></i>
              <p>Children Play Area</p>
            </div>
            <div class="flex items-center gap-x-2">
              <i class="fa-solid fa-jug-detergent text-sky-500"></i>
              <p>Laundry Service</p>
            </div>
            <div class="flex items-center gap-x-2">
              <i class="fa-solid fa-martini-glass text-sky-500"></i>
              <p>Bar/Lounge</p>
            </div>
          </div>
        </div>
      </div>
      <div class="mt-8 flex items-center gap-x-6 rounded-lg border-2 border-sky-500 px-8 py-4">
        <i class="fa-solid fa-users text-2xl text-sky-500"></i>
        <div>
          <p class="font-poppins text-xl">
            Got any questions? Contact us
          </p>
          <div class="mt-2 flex flex-wrap items-center gap-x-8 text-black/60">
            <p>+1-202-555-0135</p>
            <p>info@thehubhotel.com</p>
          </div>
        </div>
      </div>

    </div>
  </section>
</x-layout.layout>
