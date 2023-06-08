<x-layout.layout-dashboard>
  
    <div class="mt-[53px] p-5 lg:ml-[256px]">
        <div
          class="grid grid-cols-1 gap-y-4 rounded-md bg-white px-5 py-6 shadow-dark-custom lg:order-first"
        >
          <h1 class="border-b border-black/20 pb-1 font-poppins text-3xl">
            Room Details
          </h1>
          @if (session('successUpdate'))
            <div class="px-3 py-2 text-sm text-white bg-green-500 rounded-sm">
              <p>{{session('successUpdate')}}</p>
            </div>
          @endif
          <form
            method="post"
            action="{{route('room.update', ['room' => $room->id])}}"
            class="max-w-lg"
            x-data="form"
          >
            @csrf
            <div
              class="grid grid-cols-1 gap-y-4"
              :class="edit ? null : 'pointer-events-none'"
            >
              <div class="hidden">
                <label
                  for="id"
                  class="block font-semibold"
                >
                  ID
                </label>
                <input
                  type="text"
                  name="id"
                  id="id"
                  :value="form.id"
                  x-model="form.id"
                  placeholder="ID"
                  class="mt-1 w-full min-w-fit max-w-full rounded-sm border border-black/20 px-4 py-1 focus:outline-sky-500"
                />
              </div>
              <div>
                <label class="block font-semibold"> Room Type </label>
                <p class="mt-0.5 text-[12px] text-black/60">
                  Choose the room type for this room
                </p>
                <div
                  class="mt-1 flex flex-wrap items-center gap-x-4 gap-y-2 text-sm"
                  x-data="{type: '{{$room->roomType->type}}'}"
                  x-init="type = form.room_type"
                >
                @foreach ($roomTypes as $roomType)
                <div>
                  <input
                    name="room_type"
                    type="radio"
                    id="{{$roomType->type}}"
                    value="{{$roomType->type}}"
                    x-model="form.room_type"
                    class="hidden"
                  />
                  <label
                    class="flex cursor-pointer items-center gap-x-2 rounded-sm border-2 px-2 py-1"
                    for="{{$roomType->type}}"
                    :class="form.room_type === '{{$roomType->type}}' ? 'border-blue-500' : 'border-transparent'"
                  >
                    <span
                      class="h-2 w-2 rounded-full border border-black/20 ring ring-black/20 ring-offset-2"
                      :class="form.room_type === '{{$roomType->type}}' ? 'bg-blue-500' : 'bg-white'"
                    ></span>
                    {{$roomType->type}}
                  </label>
                </div>
                @endforeach
                  {{-- <div>
                    <input
                      name="room_type"
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
                      name="room_type"
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
                  id="room_code"
                  x-model="form.room_code"
                  placeholder="Room Code"
                  class="mt-1 w-full min-w-fit max-w-full rounded-sm border border-black/20 px-4 py-1 focus:outline-sky-500"
                />
                <p class="mt-0.5 text-[12px] text-black/60">
                  Unique code for this room
                </p>
              </div>
            </div>
            <div class="flex justify-end gap-x-3">
              <span
                class="inline-block cursor-pointer rounded-sm bg-green-500 px-4 py-1 text-white"
                x-show="!edit"
                x-on:click="edit = true"
              >
                Edit
              </span>
              <span
                class="inline-block cursor-pointer rounded-sm bg-gray-500 px-4 py-1 text-white"
                x-show="edit"
                x-on:click="location.reload()"
              >
                Cancel
              </span>
              <template x-if="edit">
                <button
                  type="submit"
                  class="inline-block cursor-pointer rounded-sm bg-blue-500 px-4 py-1 text-white"
                >
                  <span>Save</span>
                </button>
              </template>
            </div>
          </form>
          <form action="{{route('room.destroy', ['room' => $room->id])}}" method="post">
            @csrf
            <button type="submit"
            class="inline-block cursor-pointer rounded-sm bg-red-500 px-4 py-1 text-white" onclick="confirm('Are you sure want to delete this room?')"
            >
              Delete
            </button >
          </form>
        </div>
        <script>
          document.addEventListener("alpine:init", () => {
            Alpine.data("form", () => ({
              edit: false,
              form: {
                id: {{$room->id}},
                room_type: "{{$room->roomType->type}}",
                room_code: "{{$room->room_code}}",
              },
            }));
          });
        </script>
      </div>
  
</x-layout.layout-dashboard>