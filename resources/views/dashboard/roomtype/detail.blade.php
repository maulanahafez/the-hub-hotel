<x-layout.layout-dashboard>
  <section class="mt-[53px] p-5 lg:ml-[256px]">
    <div class="shadow-dark-custom rounded-md bg-white px-8 py-8 lg:order-first">
      <h1 class="font-poppins mb-4 border-b border-black/20 text-3xl">
        Room Type Details
      </h1>
      <div class="flex flex-wrap gap-x-4 gap-y-4">
        <form method="post"
          action="{{ route('room-type.update', ['roomType' => $roomType->slug]) }}"
          class="lg:max-w-lg"
          x-data="form">
          @csrf
          @if ($errors->any())
            <div class="grid grid-cols-1 gap-y-1 rounded-md bg-red-500 px-6 py-2 text-sm text-white">
              @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
              @endforeach
            </div>
          @endif
          <div class="grid grid-cols-1 gap-y-6"
            :class="edit ? null : 'pointer-events-none'">
            <div class="pointer-events-none">
              <label for="type"
                class="block font-semibold">
                Type Name
              </label>
              <input type="text"
                name="type"
                id="type"
                x-model="form.type"
                :value="form.type"
                placeholder="Type Name"
                class="mt-1 w-full min-w-fit max-w-full rounded-sm border border-black/20 bg-black/5 px-2 py-1 text-sm capitalize focus:outline-sky-500" />
              <p class="mt-0.5 text-[12px] text-black/60">
                Used for guests to choose the specific type of room they prefer
                for their stay
              </p>
            </div>
            <div>
              <label for="desc"
                class="block font-semibold">
                Description
              </label>
              <textarea name="desc"
                id="desc"
                placeholder="Description"
                rows="5"
                class="mt-1 w-full min-w-fit max-w-full resize-y rounded-sm border border-black/20 px-2 py-1 text-sm focus:outline-sky-500"
                x-model="form.desc"
                :value="form.desc"></textarea>
              <p class="mt-0.5 text-[12px] text-black/60">
                Description about this hotel room's type
              </p>
            </div>
            <div class="grid grid-cols-1 gap-x-2 gap-y-4 sm:grid-cols-2">
              <div class="">
                <label for="size"
                  class="block font-semibold">
                  Size
                </label>
                <input type="number"
                  name="size"
                  id="size"
                  x-model="form.size"
                  :value="form.size"
                  placeholder="Size"
                  class="mt-1 w-full min-w-fit max-w-full rounded-sm border border-black/20 px-2 py-1 text-sm focus:outline-sky-500" />
                <p class="mt-0.5 flex text-[12px] text-black/60">
                  <span>The room size in m</span>
                  <span class="text-[8px]">2</span>
                </p>
              </div>
              <div class="">
                <label for="capacity"
                  class="block font-semibold">
                  Capacity
                </label>
                <input type="number"
                  name="capacity"
                  id="capacity"
                  x-model="form.capacity"
                  :value="form.capacity"
                  placeholder="Capacity"
                  class="mt-1 w-full min-w-fit max-w-full rounded-sm border border-black/20 px-2 py-1 text-sm focus:outline-sky-500" />
                <p class="mt-0.5 text-[12px] text-black/60">
                  The maximum capacity of person
                </p>
              </div>
            </div>
            <div class=""
              x-data="{ checked: '' }"
              x-init="checked = form.bed_type">
              <h1 class="mb-1 text-xl font-semibold">
                Bed
              </h1>
              <div class="grid grid-cols-1 gap-y-4">
                <div>
                  <p class="font-semibold">Bed Type</p>
                  <div class="mt-2 flex flex-wrap items-center gap-x-4 gap-y-2 text-sm">
                    <div>
                      <input type="radio"
                        name="bed_type"
                        id="single"
                        value="single"
                        x-model="checked"
                        class="hidden" />
                      <label class="inline-block cursor-pointer rounded-sm border px-4 py-1 transition"
                        for="single"
                        :class="checked === 'single' ? 'border-blue-950 bg-blue-500 text-white' : 'border-black/40'">
                        Single
                      </label>
                    </div>
                    <div>
                      <input type="radio"
                        name="bed_type"
                        id="double"
                        value="double"
                        x-model="checked"
                        class="hidden" />
                      <label class="inline-block cursor-pointer rounded-sm border px-4 py-1 transition"
                        for="double"
                        :class="checked === 'double' ? 'border-green-950 text-white bg-green-500' : 'border-black/40'">
                        Double
                      </label>
                    </div>
                    <div>
                      <input type="radio"
                        name="bed_type"
                        id="queen"
                        value="queen"
                        x-model="checked"
                        class="hidden" />
                      <label class="inline-block cursor-pointer rounded-sm border px-4 py-1 transition"
                        for="queen"
                        :class="checked === 'queen' ? 'border-rose-950 text-white bg-rose-500' : 'border-black/40'">
                        Queen
                      </label>
                    </div>
                    <div>
                      <input type="radio"
                        name="bed_type"
                        id="king"
                        value="king"
                        x-model="checked"
                        class="hidden" />
                      <label class="inline-block cursor-pointer rounded-sm border px-4 py-1 transition"
                        for="king"
                        :class="checked === 'king' ? 'border-yellow-950 text-white bg-yellow-500' : 'border-black/40'">
                        King
                      </label>
                    </div>
                  </div>
                  <p class="mt-0.5 text-[12px] text-black/60">
                    Choose the specific type of bed for this hotel room's type
                  </p>
                </div>
                <div>
                  <label for="type"
                    class="block font-semibold">
                    Quantity
                  </label>
                  <input type="number"
                    name="bed_qty"
                    id="bed_qty"
                    :value="form.bed_qty"
                    x-model="form.bed_qty"
                    placeholder="Bed Quantity"
                    class="mt-1 w-full min-w-fit max-w-full rounded-sm border border-black/20 px-2 py-1 text-sm focus:outline-sky-500" />
                  <p class="mt-0.5 text-[12px] text-black/60">
                    Number of bed for each room
                  </p>
                </div>
              </div>
            </div>
            <div x-data="handleFacility"
              x-init="facility = form.facilities">
              <h1 class="mb-1 text-xl font-semibold">Facility</h1>
              <p class="mt-0.5 text-[12px] text-black/60"
                x-on:click="console.log(Object.values(facility).includes('Air Conditioner'))">
                Choose the facilities for this room's type
              </p>
              <textarea name="facility"
                :value="facility"
                id=""
                class="hidden w-full resize-y"></textarea>
              <div class="mt-2 grid grid-cols-1 gap-y-4 text-sm">
                <div>
                  <p class="font-semibold">Common Facilities</p>
                  <div class="mt-1 flex flex-wrap items-center gap-x-4 gap-y-2 text-sm">
                    <div>
                      <input type="checkbox"
                        id="airconditioner"
                        value="Air Conditioner"
                        x-model="facility"
                        class="hidden" />
                      <label class="flex cursor-pointer items-center gap-x-2 rounded-sm border-2 px-2 py-1"
                        for="airconditioner"
                        :class="Object.values(facility).includes('Air Conditioner') ? 'border-blue-500' : 'border-transparent'">
                        <span class="h-2 w-2 rounded-full border border-black/20 ring ring-black/20 ring-offset-2"
                          :class="Object.values(facility).includes('Air Conditioner') ? 'bg-blue-500' : 'bg-white'"></span>
                        Air Conditioner
                      </label>
                    </div>
                    <div>
                      <input type="checkbox"
                        id="tv"
                        value="TV"
                        x-model="facility"
                        class="hidden" />
                      <label class="flex cursor-pointer items-center gap-x-2 rounded-sm border-2 px-2 py-1"
                        for="tv"
                        :class="Object.values(facility).includes('TV') ? 'border-blue-500' : 'border-transparent'">
                        <span class="h-2 w-2 rounded-full border border-black/20 ring ring-black/20 ring-offset-2"
                          :class="Object.values(facility).includes('TV') ? 'bg-blue-500' : 'bg-white'"></span>
                        TV
                      </label>
                    </div>
                    <div>
                      <input type="checkbox"
                        id="refrigerator"
                        value="Refrigerator"
                        x-model="facility"
                        class="hidden" />
                      <label class="flex cursor-pointer items-center gap-x-2 rounded-sm border-2 px-2 py-1"
                        for="refrigerator"
                        :class="Object.values(facility).includes('Refrigerator') ? 'border-blue-500' : 'border-transparent'">
                        <span class="h-2 w-2 rounded-full border border-black/20 ring ring-black/20 ring-offset-2"
                          :class="Object.values(facility).includes('Refrigerator') ? 'bg-blue-500' : 'bg-white'"></span>
                        Refrigerator
                      </label>
                    </div>
                    <div>
                      <input type="checkbox"
                        id="bathtub"
                        value="Bathtub"
                        x-model="facility"
                        class="hidden" />
                      <label class="flex cursor-pointer items-center gap-x-2 rounded-sm border-2 px-2 py-1"
                        for="bathtub"
                        :class="Object.values(facility).includes('Bathtub') ? 'border-blue-500' : 'border-transparent'">
                        <span class="h-2 w-2 rounded-full border border-black/20 ring ring-black/20 ring-offset-2"
                          :class="Object.values(facility).includes('Bathtub') ? 'bg-blue-500' : 'bg-white'"></span>
                        Bathtub
                      </label>
                    </div>
                    <div>
                      <input type="checkbox"
                        id="shower"
                        value="Shower"
                        x-model="facility"
                        class="hidden" />
                      <label class="flex cursor-pointer items-center gap-x-2 rounded-sm border-2 px-2 py-1"
                        for="shower"
                        :class="Object.values(facility).includes('Shower') ? 'border-blue-500' : 'border-transparent'">
                        <span class="h-2 w-2 rounded-full border border-black/20 ring ring-black/20 ring-offset-2"
                          :class="Object.values(facility).includes('Shower') ? 'bg-blue-500' : 'bg-white'"></span>
                        Shower
                      </label>
                    </div>
                    <div>
                      <input type="checkbox"
                        id="work-desk"
                        value="Work Desk"
                        x-model="facility"
                        class="hidden" />
                      <label class="flex cursor-pointer items-center gap-x-2 rounded-sm border-2 px-2 py-1"
                        for="work-desk"
                        :class="Object.values(facility).includes('Work Desk') ? 'border-blue-500' : 'border-transparent'">
                        <span class="h-2 w-2 rounded-full border border-black/20 ring ring-black/20 ring-offset-2"
                          :class="Object.values(facility).includes('Work Desk') ? 'bg-blue-500' : 'bg-white'"></span>
                        Work Desk
                      </label>
                    </div>
                    <div>
                      <input type="checkbox"
                        id="microwave"
                        value="Microwave"
                        x-model="facility"
                        class="hidden" />
                      <label class="flex cursor-pointer items-center gap-x-2 rounded-sm border-2 px-2 py-1"
                        for="microwave"
                        :class="Object.values(facility).includes('Microwave') ? 'border-blue-500' : 'border-transparent'">
                        <span class="h-2 w-2 rounded-full border border-black/20 ring ring-black/20 ring-offset-2"
                          :class="Object.values(facility).includes('Microwave') ? 'bg-blue-500' : 'bg-white'"></span>
                        Microwave
                      </label>
                    </div>
                    <div>
                      <input type="checkbox"
                        id="Fireplace"
                        value="Fireplace"
                        x-model="facility"
                        class="hidden" />
                      <label class="flex cursor-pointer items-center gap-x-2 rounded-sm border-2 px-2 py-1"
                        for="Fireplace"
                        :class="Object.values(facility).includes('Fireplace') ? 'border-blue-500' : 'border-transparent'">
                        <span class="h-2 w-2 rounded-full border border-black/20 ring ring-black/20 ring-offset-2"
                          :class="Object.values(facility).includes('Fireplace') ? 'bg-blue-500' : 'bg-white'"></span>
                        Fireplace
                      </label>
                    </div>
                  </div>
                </div>
                <div>
                  <p class="font-semibold">Additional Room</p>
                  <div>
                    <div class="mt-1 flex flex-wrap items-center gap-x-4 gap-y-2 text-sm">
                      <div>
                        <input type="checkbox"
                          id="kitchenette"
                          value="Kitchenette"
                          x-model="facility"
                          class="hidden" />
                        <label class="flex cursor-pointer items-center gap-x-2 rounded-sm border-2 px-2 py-1"
                          for="kitchenette"
                          :class="Object.values(facility).includes('Kitchenette') ? 'border-blue-500' : 'border-transparent'">
                          <span class="h-2 w-2 rounded-full border border-black/20 ring ring-black/20 ring-offset-2"
                            :class="Object.values(facility).includes('Kitchenette') ? 'bg-blue-500' : 'bg-white'"></span>
                          Kitchenette
                        </label>
                      </div>
                      <div>
                        <input type="checkbox"
                          id="balcony"
                          value="Balcony"
                          x-model="facility"
                          class="hidden" />
                        <label class="flex cursor-pointer items-center gap-x-2 rounded-sm border-2 px-2 py-1"
                          for="balcony"
                          :class="Object.values(facility).includes('Balcony') ? 'border-blue-500' : 'border-transparent'">
                          <span class="h-2 w-2 rounded-full border border-black/20 ring ring-black/20 ring-offset-2"
                            :class="Object.values(facility).includes('Balcony') ? 'bg-blue-500' : 'bg-white'"></span>
                          Balcony
                        </label>
                      </div>
                      <div>
                        <input type="checkbox"
                          id="living-room"
                          value="Living Room"
                          x-model="facility"
                          class="hidden" />
                        <label class="flex cursor-pointer items-center gap-x-2 rounded-sm border-2 px-2 py-1"
                          for="living-room"
                          :class="Object.values(facility).includes('Living Room') ? 'border-blue-500' : 'border-transparent'">
                          <span class="h-2 w-2 rounded-full border border-black/20 ring ring-black/20 ring-offset-2"
                            :class="Object.values(facility).includes('Living Room') ? 'bg-blue-500' : 'bg-white'"></span>
                          Living Room
                        </label>
                      </div>
                      <div>
                        <input type="checkbox"
                          id="office-room"
                          value="Office Room"
                          x-model="facility"
                          class="hidden" />
                        <label class="flex cursor-pointer items-center gap-x-2 rounded-sm border-2 px-2 py-1"
                          for="office-room"
                          :class="Object.values(facility).includes('Office Room') ? 'border-blue-500' : 'border-transparent'">
                          <span class="h-2 w-2 rounded-full border border-black/20 ring ring-black/20 ring-offset-2"
                            :class="Object.values(facility).includes('Office Room') ? 'bg-blue-500' : 'bg-white'"></span>
                          Office Room
                        </label>
                      </div>
                      <div>
                        <input type="checkbox"
                          id="minibar"
                          value="Minibar"
                          x-model="facility"
                          class="hidden" />
                        <label class="flex cursor-pointer items-center gap-x-2 rounded-sm border-2 px-2 py-1"
                          for="minibar"
                          :class="Object.values(facility).includes('Minibar') ? 'border-blue-500' : 'border-transparent'">
                          <span class="h-2 w-2 rounded-full border border-black/20 ring ring-black/20 ring-offset-2"
                            :class="Object.values(facility).includes('Minibar') ? 'bg-blue-500' : 'bg-white'"></span>
                          Minibar
                        </label>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div>
              <label for="price_per_day"
                class="block font-semibold">
                Price per Day
              </label>
              <input type="number"
                name="price_per_day"
                id="price_per_day"
                :value="form.price_per_day"
                x-model="form.price_per_day"
                placeholder="Price Per Day"
                class="mt-1 w-full min-w-fit max-w-full rounded-sm border border-black/20 px-2 py-1 text-sm focus:outline-sky-500" />
              <p class="mt-0.5 text-[12px] text-black/60">
                The cost per day for this room's type in USD
              </p>
            </div>
          </div>
          <div class="flex justify-end gap-x-3">
            <span class="inline-block cursor-pointer rounded-sm bg-green-500 px-4 py-1 text-white"
              x-show="!edit"
              x-on:click="edit = true">
              Edit
            </span>
            <span class="inline-block cursor-pointer rounded-sm bg-gray-500 px-4 py-1 text-white"
              x-show="edit"
              x-on:click="location.reload()">
              Cancel
            </span>
            <template x-if="edit">
              <button type="submit"
                class="inline-block cursor-pointer rounded-sm bg-blue-500 px-4 py-1 text-white">
                <span>Save</span>
              </button>
            </template>
          </div>

        </form>
        <div x-data="{ add: false }"
          class="grow">
          @if (session('success'))
            <div class="mb-4 rounded-sm bg-green-500 py-2 px-3 text-sm text-white">
              {{ session('success') }}
            </div>
          @endif
          <div class="relative flex flex-col"
            x-data="{ show: 1, max: {{ count($roomType->roomTypeImages) }} }">
            @foreach ($roomType->roomTypeImages as $image)
              <img x-show="show === {{ $loop->iteration }}"
                src="{{ asset('storage/' . $image->path) }}"
                alt=""
                class="m-auto w-56 rounded-sm object-cover">
            @endforeach
            @if (count($roomType->roomTypeImages) != 0)
              <i x-on:click="show === max ? show = 1 : show++"
                class="fa-solid fa-chevron-right absolute right-2 top-1/2 -translate-y-1/2 cursor-pointer text-xl text-black"></i>
              <i x-on:click="show - 1 === 0 ? show = max : show--"
                class="fa-solid fa-chevron-left absolute left-2 top-1/2 -translate-y-1/2 cursor-pointer text-xl text-black"></i>
            @endif
          </div>
          <div class="mt-4 flex justify-center">
            <span x-on:click="add = true"
              x-show="!add"
              class="hover:bg-blue-950 inline-block cursor-pointer rounded-sm bg-blue-500 px-3 py-2 text-[12px] text-white">Add
              Image
            </span>
          </div>
          <form action="{{ route('room-type.store-image') }}"
            x-show="add"
            method="post"
            class="mt-4"
            enctype="multipart/form-data"
            accept="image/png, image/jpeg">
            @csrf
            <div x-data="handleImage">
              <label for="image"
                class="cursor-pointer">
                <div class="flex rounded-xl border-4 border-dashed py-4 px-5">
                  <img x-show="imgUrl != ''"
                    :src="imgUrl"
                    alt=""
                    class="m-auto h-40 w-40 object-contain object-center">
                  <div x-show="imgUrl == ''"
                    class="m-auto flex-col items-center justify-center text-center text-black/50">
                    <div class="flex text-3xl">
                      <i class="fa-solid fa-image m-auto"></i>
                    </div>
                    <p class="mt-2 text-sm">Select an Image</p>
                    <p class="text-[12px]">(jpg, jpeg, png)</p>
                  </div>
                </div>
              </label>
              <input type="file"
                name="image"
                id="image"
                class="hidden"
                x-on:change="imgInput">
              <input type="text"
                name="id"
                class="hidden"
                value="{{ $roomType->id }}">
              <input type="text"
                name="slug"
                class="hidden"
                value="{{ $roomType->slug }}">
            </div>
            <script>
              document.addEventListener('alpine:init', () => {
                Alpine.data('handleImage', () => ({
                  imgUrl: '',
                  imgInput(event) {
                    if (event.target.files.length > 0) {
                      this.imgUrl = URL.createObjectURL(event.target.files[0])
                    }
                  }
                }))
              })
            </script>
            <div class="mt-4 flex flex-wrap justify-end gap-x-2">
              <span x-on:click="add = false"
                class="cursor-pointer rounded-sm bg-gray-500 px-3 py-2 text-[12px] text-white">
                Cancel
              </span>
              <button type="submit"
                class="rounded-sm bg-blue-500 px-3 py-2 text-[12px] text-white">Add</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <script>
      document.addEventListener("alpine:init", () => {
        Alpine.data("handleFacility", () => ({
          facility: [],
        }));

        Alpine.data("form", () => ({
          edit: false,
          form: {
            type: "{{ $roomType->type }}",
            desc: "{{ $roomType->desc }}",
            size: {{ $roomType->size }},
            capacity: {{ $roomType->capacity }},
            bed_type: "{{ $roomType->bed_type }}",
            bed_qty: {{ $roomType->bed_qty }},
            facility: "{{ $roomType->facility }}",
            price_per_day: {{ $roomType->price_per_day }},
            new_facility: [],

            get facilities() {
              return this.facility.split(",");
            },
          },
        }));
      });
    </script>
  </section>
</x-layout.layout-dashboard>
