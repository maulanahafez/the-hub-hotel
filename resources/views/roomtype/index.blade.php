<x-layout.layout>
  <!-- Rooms -->
  <section class="mx-auto max-w-6xl px-6 py-24">
    <div class="container mx-auto">
      <span class="relative inline-block">
        <span class="font-open-sans text-sky-950 text-2xl font-bold md:text-3xl">
          Hotel Rooms
        </span>
        <span class="bg-sky-950 absolute -right-6 top-1/2 h-2.5 w-2.5 -translate-y-1/2 rotate-45 rounded-sm"></span>
        <span class="bg-sky-950 absolute left-[110%] top-1/2 hidden h-px w-40 -translate-y-1/2 rounded-sm sm:inline">
        </span>
      </span>
      <h2 class="mt-1 max-w-lg text-sm">
        Welcome to our luxurious hotel rooms, where comfort and style meet to
        provide you with an unforgettable stay. Immerse yourself in the
        exquisite ambiance of our thoughtfully designed accommodations,
        crafted with attention to every detail.
      </h2>
      <div class="mt-8 grid grid-cols-1 justify-center gap-x-4 gap-y-6 sm:grid-cols-2 lg:grid-cols-3">
        @foreach ($roomTypes as $roomType)
          @foreach ($roomType->roomTypeImages as $image)
            @if ($loop->first)
              @php
                $path = $image->path;
              @endphp
            @endif
          @endforeach
          <a href="{{ route('home.room-type.details', ['roomType' => $roomType->slug]) }}"
            class="mx-auto max-w-xs overflow-hidden rounded-lg border border-black/30 shadow-md transition hover:border-sky-500 hover:shadow-xl md:max-w-none">
            <div>
              <img
                @isset($path)
                  src="{{ asset('storage/' . $path) }}"
                @else
                  src="/"
                @endisset
                alt=""
                class="" />
            </div>
            @php
              $path = '';
            @endphp
            <div class="px-4 py-3">
              <div class="flex items-center justify-between">
                <h1 class="text-md font-poppins font-bold capitalize">{{ $roomType->type }}</h1>
                <p class="text-sm font-semibold text-sky-500">${{ $roomType->price_per_day }}</p>
              </div>
              <div class="mt-2 flex items-center gap-x-6 text-[12px] text-gray-500">
                <div class="flex items-center gap-x-2 capitalize">
                  <i class="fa-solid fa-bed"></i>
                  <p>{{ $roomType->bed_qty }} {{ $roomType->bed_type }} Bed</p>
                </div>
                <div class="flex items-center gap-x-2">
                  <i class="fa-solid fa-users"></i>
                  <p>{{ $roomType->capacity }}</p>
                </div>
              </div>
              <p class="line-clamp-3 mt-2 text-[12px]">
                {{ $roomType->desc }}
              </p>
            </div>
          </a>
        @endforeach
      </div>
    </div>
  </section>
</x-layout.layout>
