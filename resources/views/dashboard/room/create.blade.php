<x-layout.layout-dashboard>
    @dump($roomTypes)
    <div class="mt-[53px] p-5 lg:ml-[256px]">
        <div
          class="grid grid-cols-1 gap-y-4 rounded-md bg-white px-5 py-6 shadow-dark-custom lg:order-first"
        >
          <h1 class="border-b border-black/20 pb-1 font-poppins text-3xl">
            Create new room
          </h1>
          @if ($errors->any())
            <div class="grid grid-cols-1 gap-y-1 rounded-md bg-red-500 px-6 py-2 text-sm text-white">
              @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
              @endforeach
            </div>
          @endif
          <form
            method="post"
            action="{{route('room.store')}}"
            class="grid max-w-lg grid-cols-1 gap-y-4"
          >
          @csrf
            <div>
              <label class="block font-semibold"> Room Type </label>
              <p class="mt-0.5 text-[12px] text-black/60">
                Choose the room type for this room
              </p>
              <div
                class="mt-1 flex flex-wrap items-center gap-x-4 gap-y-2 text-sm"
                x-data="{type: null}"
              >
              @foreach ($roomTypes as $roomType)
              <div>
                <input
                  type="radio"
                  id="{{$roomType->type}}"
                  value="{{$roomType->type}}"
                  x-model="type"
                  name="type"
                  class="hidden"
                />
                <label
                  class="flex cursor-pointer items-center gap-x-2 rounded-sm border-2 px-2 py-1"
                  for="{{$roomType->type}}"
                  :class="type === '{{$roomType->type}}' ? 'border-blue-500' : 'border-transparent'"
                >
                  <span
                    class="h-2 w-2 rounded-full border border-black/20 ring ring-black/20 ring-offset-2"
                    :class="type === '{{$roomType->type}}' ? 'bg-blue-500' : 'bg-white'"
                  ></span>
                  {{$roomType->type}}
                </label>
              </div>
                  
              @endforeach
                {{-- <div>
                  <input
                    type="radio"
                    id="Executive Room"
                    value="Executive Room"
                    x-model="type"
                    class="hidden"
                  />
                  <label
                    class="flex cursor-pointer items-center gap-x-2 rounded-sm border-2 px-2 py-1"
                    for="Executive Room"
                    :class="type === 'Executive Room' ? 'border-blue-500' : 'border-transparent'"
                  >
                    <span
                      class="h-2 w-2 rounded-full border border-black/20 ring ring-black/20 ring-offset-2"
                      :class="type === 'Executive Room' ? 'bg-blue-500' : 'bg-white'"
                    ></span>
                    Executive Room
                  </label>
                </div>
                <div>
                  <input
                    type="radio"
                    id="Family Room"
                    value="Family Room"
                    x-model="type"
                    class="hidden"
                  />
                  <label
                    class="flex cursor-pointer items-center gap-x-2 rounded-sm border-2 px-2 py-1"
                    for="Family Room"
                    :class="type === 'Family Room' ? 'border-blue-500' : 'border-transparent'"
                  >
                    <span
                      class="h-2 w-2 rounded-full border border-black/20 ring ring-black/20 ring-offset-2"
                      :class="type === 'Family Room' ? 'bg-blue-500' : 'bg-white'"
                    ></span>
                    Family Room
                  </label>
                </div> --}}
              </div>
            </div>
            <div>
              <label
                for="room-code"
                class="block font-semibold"
              >
                Room Code
              </label>
              <input
                type="text"
                name="room_code"
                id="room-code"
                placeholder="Room Code"
                class="mt-1 w-full min-w-fit max-w-full rounded-sm border border-black/20 px-4 py-1 focus:outline-sky-500"
              />
              <p class="mt-0.5 text-[12px] text-black/60">
                Unique code for this room
              </p>
            </div>
            <div class="flex justify-end gap-x-3">
              <button type="submit"
                class="inline-block cursor-pointer rounded-sm bg-blue-500 px-4 py-1 text-white"
              >
                <span>Create</span>
              </button>
            </div>
          </form>
        </div>
        <script>
          document.addEventListener("alpine:init", () => {});
        </script>
      </div>
  
</x-layout.layout-dashboard>