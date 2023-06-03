<x-layout.layout-dashboard>
    <!-- Content -->
    <div class="mt-[53px] p-5 lg:ml-[256px]">
        <div class="flex flex-wrap gap-x-4 gap-y-4">
            <div>
                <div class="rounded-md bg-white px-5 py-6 shadow-dark-custom">
                    <i class="fa-regular fa-user text-9xl"></i>
                </div>
            </div>
            <div class="grow">
                <div class="grid grid-cols-1 gap-y-4 rounded-md bg-white px-5 py-6 shadow-dark-custom lg:order-first">
                    <h1 class="border-b border-black/20 pb-1 font-poppins text-3xl">
                        Account Details
                    </h1>
                    @if ($errors->any())
                        <div class="grid grid-cols-1 gap-y-1 rounded-md bg-red-500 px-6 py-2 text-sm text-white">
                            @foreach ($errors->all() as $error)
                                <p>{{ $error }}</p>
                            @endforeach
                        </div>
                    @endif
                    <form method="post" action="{{ route('user.update', ['user' => $user->id]) }}"
                        class="grid max-w-sm grid-cols-1 gap-y-4" x-data="accountForm">
                        @csrf
                        <div>
                            <label for="email" class="block font-semibold">
                                Email
                            </label>
                            <input type="text" name="email" id="email" placeholder="Email"
                                :value="form.email" x-model="form.email" :readonly="!edit"
                                class="mt-1 w-full min-w-fit max-w-full rounded-sm border border-black/20 px-4 py-1 focus:outline-sky-500"
                                :class="edit ? 'bg-white' : 'bg-gray-100'" required />
                            <p class="mt-0.5 text-[12px] text-black/60">
                                Used for making a reservation through the website
                            </p>
                        </div>
                        <div>
                            <label for="name" class="block font-semibold">
                                Name
                            </label>
                            <input type="text" name="name" id="name" placeholder="Name"
                                :value="form.name" x-model="form.name" :readonly="!edit"
                                class="mt-1 w-full min-w-fit max-w-full rounded-sm border border-black/20 px-4 py-1 focus:outline-sky-500"
                                :class="edit ? null 'bg-white' : 'bg-gray-100'" required />
                            <p class="mt-0.5 text-[12px] text-black/60">
                                Used for identification and reservation confirmation when
                                making a reservation
                            </p>
                        </div>
                        <div>
                            <label for="password" class="block font-semibold">
                                Password
                            </label>
                            <input type="password" name="password" id="password" placeholder="Password"
                                :value="form.password" x-model="form.password" :readonly="!edit"
                                class="mt-1 w-full min-w-fit max-w-full rounded-sm border border-black/20 px-4 py-1 focus:outline-sky-500"
                                :class="edit ? 'bg-white' : 'bg-gray-100'" required />
                            <p class="mt-0.5 text-[12px] text-black/60">
                                Account security. We won't share your password to anyone
                            </p>
                        </div>
                        <div x-show="edit">
                            <label for="password" class="block font-semibold">
                                Password Confirmation
                            </label>
                            <input type="password" name="password_confirmation" id="password_confirmation"
                                placeholder="Password Confirmation" :value="form.password_confirmation"
                                x-model="form.password_confirmation" :readonly="!edit"
                                class="mt-1 w-full min-w-fit max-w-full rounded-sm border border-black/20 px-4 py-1 focus:outline-sky-500"
                                :class="edit ? 'bg-white' : 'bg-gray-100'" required />
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
                        <div class="flex justify-end gap-x-3">
                            <span class="inline-block cursor-pointer rounded-sm bg-green-500 px-4 py-1 text-white"
                                x-show="!edit" x-on:click="edit = true">
                                <span>Edit Profile</span>
                            </span>
                            <span class="inline-block cursor-pointer rounded-sm bg-yellow-500 px-4 py-1 text-white"
                                x-show="edit" x-on:click="location.reload()">
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
                    </form>
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
