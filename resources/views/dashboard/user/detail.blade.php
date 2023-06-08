<x-layout.layout-dashboard>
  <!-- Content -->
  <div class="mt-[53px] p-5 lg:ml-[256px]">
    <div class="flex flex-wrap gap-x-4 gap-y-4">
      <div>
        <div class="shadow-dark-custom rounded-md bg-white px-5 py-6">
          <i class="fa-regular fa-user text-9xl"></i>
        </div>
      </div>
      <div class="grow">
        <div class="shadow-dark-custom grid grid-cols-1 gap-y-4 rounded-md bg-white px-5 py-6 lg:order-first"
          x-data="{ modal: false }">
          <h1 class="font-poppins border-b border-black/20 pb-1 text-3xl">
            Account Details
          </h1>
          @if ($errors->any())
            <div class="grid grid-cols-1 gap-y-1 rounded-md bg-red-500 px-6 py-2 text-sm text-white">
              @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
              @endforeach
            </div>
          @endif
          <form method="post"
            action="{{ route('user.update', ['user' => $user->id]) }}"
            class="grid max-w-sm grid-cols-1 gap-y-4"
            x-data="accountForm">
            @csrf
            <div>
              <label for="email"
                class="block font-semibold">
                Email
              </label>
              <input type="text"
                name="email"
                id="email"
                placeholder="Email"
                :value="form.email"
                x-model="form.email"
                :readonly="!edit"
                class="mt-1 w-full min-w-fit max-w-full rounded-sm border border-black/20 px-4 py-1 focus:outline-sky-500"
                :class="edit ? 'bg-white' : 'bg-gray-100'"
                required />
              <p class="mt-0.5 text-[12px] text-black/60">
                Used for making a reservation through the website
              </p>
            </div>
            <div>
              <label for="name"
                class="block font-semibold">
                Name
              </label>
              <input type="text"
                name="name"
                id="name"
                placeholder="Name"
                :value="form.name"
                x-model="form.name"
                :readonly="!edit"
                class="mt-1 w-full min-w-fit max-w-full rounded-sm border border-black/20 px-4 py-1 focus:outline-sky-500"
                :class="edit ? null 'bg-white' : 'bg-gray-100'"
                required />
              <p class="mt-0.5 text-[12px] text-black/60">
                Used for identification and reservation confirmation when
                making a reservation
              </p>
            </div>
            <div x-show="edit">
              <label for="password"
                class="block font-semibold">
                Password
              </label>
              <input type="password"
                name="password"
                id="password"
                placeholder="Password"
                :readonly="!edit"
                class="mt-1 w-full min-w-fit max-w-full rounded-sm border border-black/20 px-4 py-1 focus:outline-sky-500"
                :class="edit ? 'bg-white' : 'bg-gray-100'"
                required />
              <p class="mt-0.5 text-[12px] text-black/60">
                Account security. We won't share your password to anyone
              </p>
            </div>
            <div x-show="edit">
              <label for="password"
                class="block font-semibold">
                Password Confirmation
              </label>
              <input type="password"
                name="password_confirmation"
                id="password_confirmation"
                placeholder="Password Confirmation"
                :value="form.password_confirmation"
                x-model="form.password_confirmation"
                :readonly="!edit"
                class="mt-1 w-full min-w-fit max-w-full rounded-sm border border-black/20 px-4 py-1 focus:outline-sky-500"
                :class="edit ? 'bg-white' : 'bg-gray-100'"
                required />
              <p class="mt-0.5 text-[12px] text-black/60">
                For prevent mistakes and ensure that you have entered your
                password accurately
              </p>
            </div>
            <div class="">
              <h1 class="font-semibold">Role</h1>
              <div class="flex items-center gap-x-1">
                @if ($user->role == 'admin')
                  <span class="h-4 w-4 rounded-full bg-green-500"></span>
                  <span class="text-sm">{{ ucfirst($user->role) }}</span>
                @elseif($user->role == 'user')
                  <span class="h-4 w-4 rounded-full bg-blue-500"></span>
                  <span class="text-sm">{{ ucfirst($user->role) }}</span>
                @else
                  <span class="h-4 w-4 rounded-full bg-red-500"></span>
                  <span class="text-sm">{{ ucfirst($user->role) }}</span>
                @endif
              </div>
            </div>
            <div class="flex flex-wrap justify-between gap-y-2">
              <div>
                <span class="inline-block cursor-pointer rounded-sm bg-red-500 px-4 py-1 text-white"
                  x-on:click="modal = true">
                  <span>Delete Profile</span>
                </span>
              </div>
              <div class="flex justify-end gap-x-3">
                <span class="inline-block cursor-pointer rounded-sm bg-green-500 px-4 py-1 text-white"
                  x-show="!edit"
                  x-on:click="edit = true">
                  <span>Edit Profile</span>
                </span>
                <span class="inline-block cursor-pointer rounded-sm bg-yellow-500 px-4 py-1 text-white"
                  x-show="edit"
                  x-on:click="location.reload()">
                  <span>Cancel</span>
                </span>
                <template x-if="edit">
                  <button type="submit"
                    class="inline-block cursor-pointer rounded-sm bg-blue-500 px-4 py-1 text-white"
                    x-on:click="edit = true">
                    <span>Save Profile</span>
                  </button>
                </template>
              </div>
            </div>
          </form>
          <div class="fixed inset-0 z-[999] flex bg-black/40"
            x-show="modal"
            x-transition:enter="transition ease-in-out duration-500"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-in-out duration-500"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0">
            <form action="{{ route('user.destroy', ['user' => $user->id]) }}"
              method="post"
              class="m-auto rounded-lg bg-white px-8 py-4">
              @csrf
              <p class="border-b border-black/40 pb-2 text-lg">Are you sure want to delete this profile?</p>
              <div class="mt-4 flex">
                <p class="mx-auto flex h-20 w-20 rounded-full border-2 border-black/80 text-3xl">
                  <i class="fa-solid fa-question m-auto"></i>
                </p>
              </div>
              <div class="mt-4 flex flex-wrap justify-center gap-2">
                <p class="cursor-pointer bg-gray-500 py-1 px-3 text-sm text-white"
                  x-on:click="modal = false">Cancel</p>
                <button type="submit"
                  class="bg-red-500 py-1 px-3 text-sm text-white">Delete</button>
              </div>
            </form>
          </div>
        </div>
        <script>
          document.addEventListener("alpine:init", () => {
            Alpine.data("accountForm", () => ({
              edit: false,
              form: {
                name: "{{ $user->name }}",
                email: "{{ $user->email }}",
                password: "{{ $user->password }}",
              },
            }));
          });
        </script>
      </div>
    </div>
  </div>
</x-layout.layout-dashboard>
