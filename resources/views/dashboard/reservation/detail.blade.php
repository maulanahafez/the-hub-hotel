<x-layout.layout-dashboard>
    <!-- Content -->
    <div class="mt-[53px] p-5 lg:ml-[256px]">
        <div class="grid grid-cols-1 gap-y-4 rounded-md bg-white px-5 py-6 shadow-dark-custom lg:order-first">
            <h1 class="border-b border-black/20 pb-1 font-poppins text-3xl">
                Reservation Details
            </h1>

            @if ($errors->any())
                <div class="grid grid-cols-1 gap-y-1 rounded-md bg-red-500 px-6 py-2 text-sm text-white">
                    @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif

            <form method="post" action="{{ route('reservation.update', ['reservation' => $reservation->slug]) }}"
                class="grid max-w-lg grid-cols-1 gap-y-4" x-data='form'>
                @csrf
                <div class="grid grid-cols-1 gap-x-2 gap-y-4 sm:grid-cols-3">
                    <div class="">
                        <label for="date_in" class="block font-semibold">
                            Date In
                        </label>
                        <input type="date" name="date_in" id="date_in" placeholder="Date In" x-model="form.date_in"
                            :value="form.date_in"
                            class="mt-1 w-full min-w-fit max-w-full rounded-sm border border-black/20 px-2 py-1 text-[12px] focus:outline-sky-500"
                            readonly />
                    </div>
                    <div class="">
                        <label for="date_out" class="block font-semibold">
                            Date Out
                        </label>
                        <input type="date" name="date_out" id="date_out" placeholder="Date Out"
                            x-model="form.date_out" :value="form.date_out"
                            class="mt-1 w-full min-w-fit max-w-full rounded-sm border border-black/20 px-2 py-1 text-[12px] focus:outline-sky-500"
                            readonly />
                    </div>
                    <div class="">
                        <label for="range" class="block font-semibold">
                            Range
                        </label>
                        <input type="number" name="range" id="range" placeholder="Range" x-model="form.range"
                            :value="form.range"
                            class="mt-1 w-full min-w-fit max-w-full rounded-sm border border-black/20 px-2 py-1 text-[12px] focus:outline-sky-500"
                            readonly />
                    </div>
                </div>
                <div>
                    <label for="name" class="block font-semibold">
                        Guest Name
                    </label>
                    <input type="text" name="name" id="name" placeholder="Guest Name" :value="form.name"
                        class="mt-1 w-full min-w-fit max-w-full rounded-sm border border-black/20 px-4 py-1 text-[12px] focus:outline-sky-500"
                        readonly />
                </div>
                <div>
                    <label for="email" class="block font-semibold">
                        Guest Email
                    </label>
                    <input type="email" name="email" id="email" placeholder="Guest Email" :value="form.email"
                        class="mt-1 w-full min-w-fit max-w-full rounded-sm border border-black/20 px-4 py-1 text-[12px] focus:outline-sky-500"
                        readonly />
                </div>
                <div>
                    <label for="total_price" class="block font-semibold">
                        Total Price
                    </label>
                    <input type="text" name="total_price" id="total_price" placeholder="Total Price"
                        x-model="form.total_price" :value="form.total_price"
                        class="mt-1 w-full min-w-fit max-w-full rounded-sm border border-black/20 px-4 py-1 text-[12px] focus:outline-sky-500"
                        readonly />
                    <p class="mt-0.5 text-[12px] text-black/60">
                        Total price to pay for this reservation
                    </p>
                </div>
                <div>
                    {{-- <div class="" x-data="{ checked: '' }" x-init="checked = form.payment_mtd">
                        <div class="grid grid-cols-1 gap-y-4">
                            <div>
                                <p class="font-semibold x-on:click="console.log(form.payment_mtd)"">Payment Method</p>
                                <div class="mt-2 flex flex-wrap items-center gap-x-4 gap-y-2 text-sm">
                                    <div>
                                        <input type="radio" name="payment_mtd" id="e-Wallet" value="e-Wallet"
                                            x-model="checked" class="hidden" :readonly="true"/>
                                        <label
                                            class="flex cursor-pointer items-center gap-x-2 rounded-sm border-2 px-2 py-1"
                                            for="e-Wallet"
                                            :class="checked === 'e-Wallet' ? 'border-blue-500' :
                                                'border-transparent'">
                                            <span
                                                class="h-2 w-2 rounded-full border border-black/20 ring ring-black/20 ring-offset-2"
                                                :class="checked === 'e-Wallet' ? 'bg-blue-500' :
                                                    'bg-white'"></span>
                                            e-Wallet
                                        </label>
                                    </div>
                                    <div>
                                        <input type="radio" name="payment_mtd" id="bank_trasfer" value="Bank Transfer"
                                            x-model="checked" class="hidden" :readonly="true"/>
                                        <label
                                            class="flex cursor-pointer items-center gap-x-2 rounded-sm border-2 px-2 py-1"
                                            for="bank_trasfer"
                                            :class="checked === 'Bank Transfer' ? 'border-blue-500' :
                                                'border-transparent'">
                                            <span
                                                class="h-2 w-2 rounded-full border border-black/20 ring ring-black/20 ring-offset-2"
                                                :class="checked === 'Bank Transfer' ? 'bg-blue-500' :
                                                    'bg-white'"></span>
                                            Bank Transfer
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                    <label for="payment_mtd" class="block font-semibold">
                        Payment Method
                    </label>
                    <input type="text" name="payment_mtd" id="payment_mtd" placeholder="Payment Method"
                        :value="form.payment_mtd"
                        class="mt-1 w-full min-w-fit max-w-full rounded-sm border border-black/20 px-4 py-1 text-[12px] focus:outline-sky-500"
                        readonly />
                    <p class="mt-0.5 text-[12px] text-black/60">
                        The payment method used for this reservation
                    </p>
                </div>
                <div x-data="form.status">
                    <p class="block font-semibold">Status</p>
                    <p class="mt-1 rounded-sm bg-green-500 px-4 py-1 text-white"
                        x-bind:class="{ 'bg-green-500': form.status === 'Checked In', 'bg-red-500': form.status ===
                            'Checked Out', 'bg-gray-500': form.status === 'Pending' }">
                        <span x-text="'Guest is ' + form.status"></span>
                    </p>
                </div>
                <div class="flex justify-end gap-x-3">
                    <form method="POST"
                        action="{{ route('reservation.update', ['reservation' => $reservation->slug]) }}">
                        @csrf
                        <input type="hidden" name="status" value="Checked Out">
                        <button type="submit"
                            class="inline-block cursor-pointer rounded-sm bg-blue-500 px-4 py-1 text-white">
                            <span>Checking Out</span>
                        </button>
                    </form>
                    <form method="POST"
                        action="{{ route('reservation.update', ['reservation' => $reservation->slug]) }}">
                        @csrf
                        <input type="hidden" name="status" value="Checked In">
                        <button type="submit"
                            class="inline-block cursor-pointer rounded-sm bg-green-500 px-4 py-1 text-white">
                            <span>Checking In</span>
                        </button>
                    </form>
                    {{-- <button class="inline-block cursor-pointer rounded-sm bg-blue-500 px-4 py-1 text-white"
                        x-on:click="form.status => 'Checked Out'">
                        <span>Checking Out</span>
                    </button>
                    <button class="inline-block cursor-pointer rounded-sm bg-green-500 px-4 py-1 text-white"
                        x-on:click="updateStatus('Checked In')">
                        <span>Checking In</span>
                    </button> --}}
                </div>
            </form>
        </div>
        <script>
            document.addEventListener("alpine:init", () => {
                Alpine.data("handlePayment", () => ({
                    payment_mtd: [],
                }));

                Alpine.data("form", () => ({
                    edit: false,
                    form: {
                        date_in: "{{ $reservation->date_in }}",
                        date_out: "{{ $reservation->date_out }}",
                        name: "{{ $reservation->user->name }}",
                        email: "{{ $reservation->user->email }}",
                        range: "{{ $reservation->range }}",
                        total_price: "{{ $reservation->total_price }}",
                        payment_mtd: "{{ $reservation->payment_mtd }}",
                        status: "{{ $reservation->status }}",
                        new_payment_mtd: [],

                        get payments() {
                            return this.payment_mtd.split(",");
                        },
                    },
                }));
            });
        </script>
    </div>
</x-layout.layout-dashboard>
