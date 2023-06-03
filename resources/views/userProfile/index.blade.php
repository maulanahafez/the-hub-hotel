<x-layout.layout>
    <section class="mx-auto mb-2 mt-[4rem] max-w-2xl rounded-xl border border-black/10 p-4">
        <div class="container mx-auto">
            @if ($errors->any())
                <div class="grid grid-cols-1 gap-y-1 rounded-md bg-red-500 px-6 py-2 text-sm text-white">
                    @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif
            <form method="post" action="{{ route('home.userProfile.edit', ['user' => $user->id]) }}"
                class="grid grid-cols-1 gap-y-6" x-data="{ edit: false }">
                @csrf

                <div class="grid items-center sm:grid-cols-3">
                    <p class="font-semibold text-black/60">Name</p>
                    <input type="text" name="name" id="name" placeholder="Name" :value="form.name"
                        x-model="form.name" :readonly="!edit"
                        class="col-span-2 w-full rounded-md border border-black/60 px-4 py-2 focus:outline-blue-500"
                        :class="edit ? null 'bg-white' : 'bg-gray-100'" required />
                </div>
                <div class="grid items-center sm:grid-cols-3">
                    <p class="font-semibold text-black/60">Email</p>
                    <input type="text" name="email" id="email" placeholder="Email" :value="form.email"
                        x-model="form.email" :readonly="!edit"
                        class="col-span-2 w-full rounded-md border border-black/60 px-4 py-2 focus:outline-blue-500"
                        :class="edit ? 'bg-white' : 'bg-gray-100'" required />
                </div>
                <div class="grid items-center sm:grid-cols-3">
                    <p class="font-semibold text-black/60">Password</p>
                    <input type="password" name="password" id="password" placeholder="Password" :value="form.password"
                        x-model="form.password" :readonly="!edit"
                        class="col-span-2 w-full rounded-md border border-black/60 px-4 py-2 focus:outline-blue-500"
                        :class="edit ? 'bg-white' : 'bg-gray-100'" required />
                </div>
                <div class="grid items-center sm:grid-cols-3" x-show="edit">
                    <p class="font-semibold text-black/60">Password Confirmation</p>
                    <input type="password" name="password_confirmation" id="password_confirmation"
                        placeholder="Password Confirmation" :value="form.password_confirmation"
                        x-model="form.password_confirmation" :readonly="!edit"
                        class="col-span-2 w-full rounded-md border border-black/60 px-4 py-2 focus:outline-blue-500"
                        :class="edit ? 'bg-white' : 'bg-gray-100'" required />
                </div>
                <div class="flex items-center justify-end gap-x-4">
                    <p class="cursor-pointer rounded-md bg-green-500 px-3 py-2 text-white transition hover:bg-green-400"
                        x-on:click="edit = true">
                        Edit Profile
                    </p>
                    <button type="submit"
                        class="rounded-md bg-blue-500 px-3 py-2 text-white transition hover:bg-blue-400" x-show="edit">
                        Save
                    </button>
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
    </section>
</x-layout.layout>
