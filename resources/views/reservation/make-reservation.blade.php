<x-layout.layout>
  <!-- Reservations -->
  <section class="mx-auto mb-2 mt-[5rem] max-w-2xl px-6">
    <div class="container mx-auto">
      <div x-data="reservation()">
        <div class="text-center"
          x-data="{ price_per_day: {{ $roomType->price_per_day }} }">
          <h1 class="font-poppins text-2xl">Reservation</h1>
          <div class="relative mt-2 flex items-center justify-center gap-x-16">
            <div class="flex h-12 w-12 rounded-full border border-sky-500 bg-sky-500 text-lg font-bold text-white">
              <span class="m-auto">1</span>
            </div>
            <div class="flex h-12 w-12 rounded-full border border-sky-500 text-lg font-bold"
              :class="show === 2 || show === 3 ? 'bg-sky-500 text-white' : 'bg-white text-black'">
              <span class="m-auto">2</span>
            </div>
            <div class="flex h-12 w-12 rounded-full border border-sky-500 text-lg font-bold"
              :class="show === 3 ? 'bg-sky-500 text-white' : 'bg-white text-black'">
              <span class="m-auto">3</span>
            </div>
            <div class="absolute right-1/2 top-1/2 -z-10 h-px w-1/5 -translate-y-1/2"
              :class="show === 2 || show === 3 ? 'bg-sky-500' : 'bg-black'"></div>
            <div class="absolute left-1/2 top-1/2 -z-10 h-px w-1/5 -translate-y-1/2"
              :class="show === 3 ? 'bg-sky-500' : 'bg-black'"></div>
          </div>

          <!-- First Slide -->
          <div class="mt-6 items-stretch overflow-hidden rounded-lg border border-black/20 sm:flex"
            x-show="show === 1"
            x-transition:enter="transition"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100">
            <div class="shrink-0">
              <img
                @isset($roomType->roomTypeImages[0])
                  src="{{ asset('storage/' . $roomType->roomTypeImages[0]->path) }}"
                @else
                  src="https://images.unsplash.com/photo-1566665797739-1674de7a421a?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=774&q=80"
                @endisset
                alt=""
                class="h-full w-full object-cover sm:w-60" />
            </div>
            <div class="mt-4 grid grow grid-cols-1 gap-y-1 px-4 text-start text-[12px] sm:mt-0 sm:p-2">
              <h1 class="font-poppins text-xl">Reservation Information</h1>
              <p class="mt-2 text-red-500"
                x-show="firstSlide">
                Please fill the information below!
              </p>
              <div class="mt-2 grid grid-cols-1 gap-y-1 sm:grid-cols-3 sm:items-center">
                <p class="font-semibold text-black/60">Room Type</p>
                <input type="text"
                  name="type"
                  id="type"
                  placeholder="Type"
                  :value="form.type"
                  readonly
                  x-model="form.type"
                  class="col-span-2 w-full rounded-md border border-black/60 bg-gray-100 px-3 py-1 capitalize focus:outline-blue-500" />
              </div>
              <div class="grid grid-cols-1 gap-y-1 sm:grid-cols-3 sm:items-center">
                <p class="font-semibold text-black/60">Room Number</p>
                <input type="text"
                  name="room_code"
                  id="room_code"
                  placeholder="Room Code"
                  :value="form.room_code"
                  readonly
                  x-model="form.room_code"
                  class="col-span-2 w-full rounded-md border border-black/60 bg-gray-100 px-3 py-1 uppercase focus:outline-blue-500" />
              </div>
              <div class="grid grid-cols-1 gap-y-1 sm:grid-cols-3 sm:items-center">
                <p class="font-semibold text-black/60">Price per Day</p>
                <input type="text"
                  name="price_per_day"
                  id="price_per_day"
                  placeholder="Price per Day"
                  :value="price_per_day"
                  x-model="price_per_day"
                  readonly
                  class="col-span-2 w-full rounded-md border border-black/60 bg-gray-100 px-3 py-1 focus:outline-blue-500" />
              </div>
              <div class="grid grid-cols-1 gap-y-1 sm:grid-cols-3 sm:items-center">
                <p class="relative font-semibold text-black/60">
                  Date In
                  <span class="absolute -top-2 right-px text-red-500">*</span>
                </p>
                <input type="date"
                  name="date_in"
                  id="date_in"
                  placeholder="Date In"
                  x-model="form.date_in"
                  class="col-span-2 w-full rounded-md border border-black/60 px-3 py-1 focus:outline-blue-500" />
              </div>
              <div class="grid grid-cols-1 gap-y-1 sm:grid-cols-3 sm:items-center">
                <p class="relative font-semibold text-black/60">
                  Date Out
                  <span class="absolute -top-2 right-px text-red-500">*</span>
                </p>
                <input type="date"
                  name="date_out"
                  id="date_out"
                  placeholder="Date Out"
                  x-model="form.date_out"
                  class="col-span-2 w-full rounded-md border border-black/60 px-3 py-1 focus:outline-blue-500" />
              </div>
              <div class="grid w-full grid-cols-1 gap-y-1 sm:grid-cols-3 sm:items-center">
                <p class="relative font-semibold text-black/60">
                  Range
                  <span class="absolute -top-2 right-px text-red-500">*</span>
                </p>
                <div class="col-span-2 flex items-center gap-x-2">
                  <input type="number"
                    name="range"
                    id="range"
                    placeholder="Range"
                    x-model="form.range"
                    class="col-span-2 shrink-0 grow rounded-md border border-black/60 px-3 py-1 focus:outline-blue-500" />
                  <p class="text-black/60">days</p>
                </div>
              </div>
            </div>
          </div>

          <!-- Second Slide -->
          <div class="mt-6 overflow-hidden rounded-lg border border-black/20 p-4 text-start text-[12px]"
            x-show="show === 2"
            x-transition:enter="transition"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100">
            <h1 class="font-poppins text-xl">Personal Information</h1>
            <p class="mt-2 text-red-500"
              x-show="secondSlide">
              Please fill the information below!
            </p>
            <div class="mt-2 grid grid-cols-1 gap-y-1 sm:grid-cols-3 sm:items-center">
              <p class="font-semibold text-black/60">Name</p>
              <input type="text"
                name="name"
                id="name"
                placeholder="Name"
                :value="form.name"
                readonly
                x-model="form.name"
                class="col-span-2 w-full rounded-md border border-black/60 bg-gray-100 px-3 py-1 focus:outline-blue-500" />
            </div>
            <div class="mt-2 grid grid-cols-1 gap-y-1 sm:grid-cols-3 sm:items-center">
              <p class="font-semibold text-black/60">Email</p>
              <input type="email"
                name="email"
                id="email"
                placeholder="Email"
                :value="form.email"
                readonly
                x-model="form.email"
                class="col-span-2 w-full rounded-md border border-black/60 bg-gray-100 px-3 py-1 focus:outline-blue-500" />
            </div>
            <div class="mt-2 grid grid-cols-1 gap-y-1 sm:grid-cols-3 sm:items-center">
              <p class="relative font-semibold text-black/60">
                Payment Method
                <span class="absolute -top-2 right-px text-red-500">*</span>
              </p>
              <select name="payment_mtd"
                id=""
                x-model="form.payment_mtd"
                class="col-span-2 w-full rounded-md border border-black/60 px-3 py-1 focus:outline-sky-500">
                <option value>Select One</option>
                <option value="Bank Transfer">Bank Transfer</option>
                <option value="e-Wallet">e-Wallet</option>
              </select>
            </div>
          </div>

          <!-- Third Slide -->
          <div class=""
            x-show="show === 3"
            x-transition:enter="transition"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100">
            <div class="mt-6 overflow-hidden rounded-lg border border-black/20 p-4 text-start text-[12px]">
              <h1 class="font-poppins text-xl">Reservation Summary</h1>
              <form
                action="{{ route('home.reservation.store', ['roomType' => $roomType->slug, 'room' => $room->id]) }}"
                method="post"
                class="grid grid-cols-1 gap-y-2">
                @csrf
                <div class="mt-2 grid grid-cols-1 gap-y-1 sm:grid-cols-3 sm:items-center">
                  <p class="font-semibold text-black/60">Room Type</p>
                  <input type="text"
                    name="type"
                    id="type"
                    placeholder="Type"
                    value="{{ $roomType->type }}"
                    readonly
                    class="col-span-2 w-full rounded-md border border-black/60 bg-gray-100 px-3 py-1 capitalize focus:outline-blue-500" />
                </div>
                <div class="grid grid-cols-1 gap-y-1 sm:grid-cols-3 sm:items-center">
                  <p class="font-semibold text-black/60">Room Number</p>
                  <input type="text"
                    name="room_code"
                    id="room_code"
                    placeholder="Room Code"
                    value="{{ $room->room_code }}"
                    readonly
                    class="col-span-2 w-full rounded-md border border-black/60 bg-gray-100 px-3 py-1 uppercase focus:outline-blue-500" />
                </div>
                <div class="grid grid-cols-1 gap-y-1 sm:grid-cols-3 sm:items-center">
                  <p class="font-semibold text-black/60">Total Price</p>
                  <input type="text"
                    name="total_price"
                    id="total_price"
                    placeholder="Price per Day"
                    :value="price_per_day * form.range"
                    x-model="form.total_price"
                    readonly
                    class="col-span-2 w-full rounded-md border border-black/60 bg-gray-100 px-3 py-1 focus:outline-blue-500" />
                </div>
                <div class="grid grid-cols-1 gap-y-1 sm:grid-cols-3 sm:items-center">
                  <p class="font-semibold text-black/60">Date In</p>
                  <input type="date"
                    name="date_in"
                    id="date_in"
                    placeholder="Date In"
                    x-model="form.date_in"
                    readonly
                    class="col-span-2 w-full rounded-md border border-black/60 bg-gray-100 px-3 py-1 focus:outline-blue-500" />
                </div>
                <div class="grid grid-cols-1 gap-y-1 sm:grid-cols-3 sm:items-center">
                  <p class="font-semibold text-black/60">Date Out</p>
                  <input type="date"
                    name="date_out"
                    id="date_out"
                    placeholder="Date Out"
                    x-model="form.date_out"
                    readonly
                    class="col-span-2 w-full rounded-md border border-black/60 bg-gray-100 px-3 py-1 focus:outline-blue-500" />
                </div>
                <div class="grid w-full grid-cols-1 gap-y-1 sm:grid-cols-3 sm:items-center">
                  <p class="font-semibold text-black/60">Range</p>
                  <div class="col-span-2 flex items-center gap-x-2">
                    <input type="number"
                      name="range"
                      id="range"
                      placeholder="Range"
                      x-model="form.range"
                      readonly
                      class="col-span-2 shrink-0 grow rounded-md border border-black/60 bg-gray-100 px-3 py-1 focus:outline-blue-500" />
                    <p class="text-black/60">days</p>
                  </div>
                </div>
                <div class="grid grid-cols-1 gap-y-1 sm:grid-cols-3 sm:items-center">
                  <p class="font-semibold text-black/60">Name</p>
                  <input type="text"
                    name="name"
                    id="name"
                    placeholder="Name"
                    value="{{ Auth::user()->name }}"
                    readonly
                    class="col-span-2 w-full rounded-md border border-black/60 bg-gray-100 px-3 py-1 focus:outline-blue-500" />
                </div>
                <div class="grid grid-cols-1 gap-y-1 sm:grid-cols-3 sm:items-center">
                  <p class="font-semibold text-black/60">Email</p>
                  <input type="email"
                    name="email"
                    id="email"
                    placeholder="Email"
                    value="{{ Auth::user()->email }}"
                    readonly
                    class="col-span-2 w-full rounded-md border border-black/60 bg-gray-100 px-3 py-1 focus:outline-blue-500" />
                </div>
                <div class="grid grid-cols-1 gap-y-1 sm:grid-cols-3 sm:items-center">
                  <p class="font-semibold text-black/60">Payment Method</p>
                  <select name="payment_mtd"
                    id=""
                    x-model="form.payment_mtd"
                    class="col-span-2 w-full rounded-md border border-black/60 bg-gray-100 px-3 py-1 focus:outline-sky-500">
                    <option value>Select One</option>
                    <option value="Bank Transfer">Bank Transfer</option>
                    <option value="e-Wallet">e-Wallet</option>
                  </select>
                </div>
                <div class="text-end">
                  <button type="submit"
                    class="hover:bg-sky-950 rounded-lg bg-sky-500 px-3 py-2 text-white transition">
                    Make a Reservation
                  </button>
                </div>
              </form>
            </div>
          </div>

          <div class="flex justify-center gap-x-6">
            <span
              class="hover:bg-gray-950 mt-2 inline-block cursor-pointer rounded-lg bg-gray-500 px-4 py-2 text-sm text-white transition"
              x-on:click="() => {show === 2 ? goPrev1() : goPrev2()}"
              x-show="show === 2 || show === 3">
              Prev
            </span>
            <span
              class="hover:bg-sky-950 mt-2 inline-block cursor-pointer rounded-lg bg-sky-500 px-4 py-2 text-sm text-white transition"
              x-on:click="() => {show === 1 ? goNext2() : goNext3()}"
              x-show="show === 1 || show === 2">
              Next
            </span>
          </div>
        </div>
      </div>
    </div>
  </section>
  <script>
    document.addEventListener("alpine:init", () => {
      Alpine.data("reservation", () => ({
        show: 1,
        form: {
          type: '{{ $roomType->type }}',
          room_code: '{{ $room->room_code }}',
          name: '{{ Auth::user()->name }}',
          email: '{{ Auth::user()->email }}',
          date_in: null,
          date_out: null,
          range: null,
          payment_mtd: null,
          total_price: null,
        },
        firstSlide: null,
        secondSlide: null,
        thirdSlide: null,

        goNext2() {
          if (!this.form.date_in || !this.form.date_out || !this.form.range) {
            this.firstSlide = true;
          } else {
            this.firstSlide = false;
            this.show = 2;
          }
        },

        goNext3() {
          if (!this.form.payment_mtd) {
            this.secondSlide = true;
          } else {
            this.secondSlide = false;
            this.show = 3;
          }
        },

        goPrev1() {
          if (!this.form.payment_mtd) {
            this.secondSlide = true;
          } else {
            this.secondSlide = false;
            this.show = 1;
          }
        },

        goPrev2() {
          this.thirdSlide = false;
          this.show = 2;
        },
      }));
    });
  </script>
</x-layout.layout>
