<x-layout.layout-dashboard>
  <!-- Content -->
  {{-- @dump($reservation) --}}
  <div class="mt-[53px] p-5 lg:ml-[256px]">
    <div class="shadow-dark-custom grid grid-cols-1 gap-y-4 rounded-md bg-white px-5 py-6 lg:order-first">
      <h1 class="font-poppins border-b border-black/20 pb-1 text-3xl">
        Reservation Details
      </h1>
      <form method="post"
        action=""
        class="grid max-w-lg grid-cols-1 gap-y-4">
        <div class="grid grid-cols-1 gap-x-2 gap-y-4 sm:grid-cols-3">
          <div class="">
            <label for="date_in"
              class="block font-semibold">
              Date In
            </label>
            <input type="date"
              name="date_in"
              readonly
              id="date_in"
              placeholder="Date In"
              value="{{ $reservation->date_in }}"
              class="mt-1 w-full min-w-fit max-w-full rounded-sm border border-black/20 px-2 py-1 text-[12px] focus:outline-sky-500" />
          </div>
          <div class="">
            <label for="date_out"
              class="block font-semibold">
              Date Out
            </label>
            <input type="date"
              name="date_out"
              readonly
              id="date_out"
              value="{{ $reservation->date_out }}"
              placeholder="Date Out"
              class="mt-1 w-full min-w-fit max-w-full rounded-sm border border-black/20 px-2 py-1 text-[12px] focus:outline-sky-500" />
          </div>
          <div class="">
            <label for="range"
              class="block font-semibold">
              Range
            </label>
            <input type="number"
              name="range"
              readonly
              id="range"
              value="{{ $reservation->range }}"
              placeholder="Range"
              class="mt-1 w-full min-w-fit max-w-full rounded-sm border border-black/20 px-2 py-1 text-[12px] focus:outline-sky-500" />
          </div>
        </div>
        <div>
          <label for="name"
            class="block font-semibold">
            Guest Name
          </label>
          <input type="text"
            name="name"
            readonly
            id="name"
            value="{{ $reservation->user->name }}"
            placeholder="Guest Name"
            class="mt-1 w-full min-w-fit max-w-full rounded-sm border border-black/20 px-4 py-1 text-[12px] focus:outline-sky-500" />
          <p class="mt-0.5 text-[12px] text-black/60">
            The guest name that made the reservation
          </p>
        </div>
        <div>
          <label for="email"
            class="block font-semibold">
            Guest Email
          </label>
          <input type="email"
            name="email"
            readonly
            id="email"
            value="{{ $reservation->user->email }}"
            placeholder="Guest Email"
            class="mt-1 w-full min-w-fit max-w-full rounded-sm border border-black/20 px-4 py-1 text-[12px] focus:outline-sky-500" />
          <p class="mt-0.5 text-[12px] text-black/60">
            The guest email that made the reservation
          </p>
        </div>
        <div>
          <label for="total_price"
            class="block font-semibold">
            Total Price
          </label>
          <input type="text"
            name="total_price"
            readonly
            id="total_price"
            value="{{ $reservation->total_price }}"
            placeholder="Total Price"
            class="mt-1 w-full min-w-fit max-w-full rounded-sm border border-black/20 px-4 py-1 text-[12px] focus:outline-sky-500" />
          <p class="mt-0.5 text-[12px] text-black/60">
            Total price to pay for this reservation
          </p>
        </div>
        <div>
          <label for="payment_mtd"
            class="block font-semibold">
            Payment Method
          </label>
          <input type="text"
            name="payment_mtd"
            readonly
            id="payment_mtd"
            value="{{ $reservation->payment_mtd }}"
            placeholder="Payment Method"
            class="mt-1 w-full min-w-fit max-w-full rounded-sm border border-black/20 px-4 py-1 text-[12px] focus:outline-sky-500" />
          <p class="mt-0.5 text-[12px] text-black/60">
            The payment method used for this reservation
          </p>
        </div>
        <div>
          <p class="block font-semibold">Status</p>
          @if ($reservation->status == 'Pending')
            <p class="mt-1 rounded-sm bg-gray-500 px-4 py-1 text-sm text-white">
              Guest is not arrived yet
            </p>
          @elseif($reservation->status == 'Checked In')
            <p class="mt-1 rounded-sm bg-green-500 px-4 py-1 text-sm text-white">
              Guest is checked in
            </p>
          @else
            <p class="mt-1 rounded-sm bg-blue-500 px-4 py-1 text-sm text-white">
              Guest is checked out
            </p>
          @endif
        </div>
        <div class="flex justify-end gap-x-3">
          {{-- <button class="inline-block cursor-pointer rounded-sm bg-blue-500 px-4 py-1 text-white">
            <span>Checking Out</span>
          </button>
          <button class="inline-block cursor-pointer rounded-sm bg-green-500 px-4 py-1 text-white">
            <span>Checking In</span>
          </button> --}}
        </div>
      </form>
    </div>
    <script>
      document.addEventListener("alpine:init", () => {
        Alpine.data("accountForm", () => ({}));
      });
    </script>
  </div>
</x-layout.layout-dashboard>
