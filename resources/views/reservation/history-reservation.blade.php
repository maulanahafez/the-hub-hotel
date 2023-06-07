<x-layout.layout>
  <!-- History -->
  <section class="mx-auto mb-2 mt-[5rem] max-w-xl px-6">
    <div class="container mx-auto">
      <div x-data="{ selected: 'Pending' }">
        <span class="relative inline-block">
          <span class="font-open-sans text-sky-950 text-2xl font-bold md:text-3xl">
            Reservations
          </span>
          <span class="bg-sky-950 absolute -right-6 top-1/2 h-2.5 w-2.5 -translate-y-1/2 rotate-45 rounded-sm"></span>
          <span class="bg-sky-950 absolute left-[110%] top-1/2 hidden h-px w-40 -translate-y-1/2 rounded-sm sm:inline">
          </span>
        </span>
        <div class="mt-4 flex flex-wrap gap-x-2 gap-y-2">
          <p class="cursor-pointer rounded-sm border border-black/40 px-4 py-2 text-sm"
            :class="selected === 'Pending' ? 'bg-gray-500 text-white' : 'bg-white'"
            x-on:click="selected = 'Pending'">Pending</p>
          <p class="cursor-pointer rounded-sm border border-black/40 px-4 py-2 text-sm"
            :class="selected === 'Checked In' ? 'bg-green-500 text-white' : 'bg-white'"
            x-on:click="selected = 'Checked In'">Checked In</p>
          <p class="cursor-pointer rounded-sm border border-black/40 px-4 py-2 text-sm"
            :class="selected === 'Checked Out' ? 'bg-blue-500 text-white' : 'bg-white'"
            x-on:click="selected = 'Checked Out'">Checked Out</p>
        </div>
        <div class="mt-4">
          @if (session('checkedIn'))
            <p class="rounded-sm bg-green-500 px-3 py-2 text-[12px] text-sm text-white">
              Reservation status changed to Checked In successfully
            </p>
          @endif
          @if (session('checkedOut'))
            <p class="rounded-sm bg-green-500 px-3 py-2 text-[12px] text-sm text-white">
              Reservation status changed to Checked Out successfully
            </p>
          @endif

          {{-- @dump(Auth::user())
          @dump(Auth::user()->role) --}}
        </div>
        <div class="mt-4">
          @foreach ($reservations as $reservation)
            <div class="mb-6 rounded-lg border border-black/20 px-6 py-4"
              x-show="selected === '{{ $reservation->status }}'">
              <div class="flex flex-wrap justify-between">
                <p class="font-poppins text-sky-950 text-2xl font-semibold capitalize">
                  {{ $reservation->room->roomType->type }}
                </p>
                <p class="mt-1 text-sm">
                  @if ($reservation->status == 'Pending')
                    <span class="inline-block rounded-md bg-gray-500 px-3 py-1 text-white">
                      Pending
                    </span>
                  @elseif($reservation->status == 'Checked In')
                    <span class="rounded-md bg-green-500 px-3 py-1 text-white">
                      Checked In
                    </span>
                  @else
                    <span class="rounded-md bg-blue-500 px-3 py-1 text-white">
                      Checked Out
                    </span>
                  @endif
                </p>
              </div>
              @if (Auth::user()->role == 'receptionist' || Auth::user()->role == 'admin')
                <div class="mt-2 flex gap-x-1 text-sm">
                  <p>ID:</p>
                  <p>
                    {{ $reservation->id }}
                  </p>
                </div>
              @endif
              <div class="relative mt-2 flex flex-wrap items-center gap-x-8 text-sm text-black/60">
                <div class="flex flex-wrap gap-x-2">
                  <p>{{ $reservation->date_in }}</p>
                  <p>to</p>
                  <p>{{ $reservation->date_out }}</p>
                </div>
                <p>{{ $reservation->range }} Days</p>
              </div>
              <div class="mt-2 flex items-center gap-x-4 text-sm">
                <p class="mt-2 capitalize">
                  <i class="fa-solid fa-bed text-sky-500"></i>
                  <span class="">{{ $reservation->room->room_code }}</span>
                </p>
                <p class="mt-2">
                  <i class="fa-solid fa-credit-card text-sky-500"></i>
                  <span class="">{{ $reservation->payment_mtd }}</span>
                </p>
              </div>

              <!-- Receptionist Area -->
              @if (Auth::user()->role == 'receptionist' || Auth::user()->role == 'admin')
                <div class="mt-4 border-t border-black/20 pt-2 text-sm">
                  @if ($reservation->status == 'Pending')
                    <form action="{{ route('home.check-in', ['reservation' => $reservation->id]) }}"
                      method="post">
                      @csrf
                      <button type="submit"
                        class="inline-block rounded-md bg-green-500 px-3 py-2 text-white transition hover:bg-opacity-80">
                        Checking In
                      </button>
                    </form>
                  @elseif($reservation->status == 'Checked In')
                    <form action="{{ route('home.check-out', ['reservation' => $reservation->id]) }}"
                      method="post">
                      @csrf
                      <button type="submit"
                        class="inline-block rounded-md bg-blue-500 px-3 py-2 text-white transition hover:bg-opacity-80">
                        Checking Out
                      </button>
                    </form>
                  @endif
                </div>
              @endif
            </div>
          @endforeach
        </div>
      </div>
    </div>
  </section>
</x-layout.layout>
