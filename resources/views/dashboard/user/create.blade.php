<x-layout.layout-dashboard>
    <!-- Content -->
    <div class="mt-[53px] p-5 lg:ml-[256px]">
        <div class="grid grid-cols-1 gap-y-4 rounded-md bg-white px-5 py-6 shadow-dark-custom lg:order-first">
            <h1 class="border-b border-black/20 pb-1 font-poppins text-3xl">
                Create new account
            </h1>
            <form method="post" action="{{ route('user.store') }}" class="grid max-w-sm grid-cols-1 gap-y-4"
                x-data="accountForm">
                @if ($errors->any())
                    <div class="grid grid-cols-1 gap-y-1 rounded-md bg-red-500 px-6 py-2 text-sm text-white">
                        @foreach ($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                    </div>
                @endif
                @csrf
                <div>
                    <label for="email" class="block font-semibold">
                        Email
                    </label>
                    <input type="text" name="email" id="email" placeholder="Email" value="{{ old('email') }}"
                        class="mt-1 w-full min-w-fit max-w-full rounded-sm border border-black/20 px-4 py-1 focus:outline-sky-500" />
                    <p class="mt-0.5 text-[12px] text-black/60">
                        Used for making a reservation through the website
                    </p>
                </div>
                <div>
                    <label for="name" class="block font-semibold">
                        Name
                    </label>
                    <input type="text" name="name" id="name" placeholder="Name" value="{{ old('name') }}"
                        class="mt-1 w-full min-w-fit max-w-full rounded-sm border border-black/20 px-4 py-1 focus:outline-sky-500" />
                    <p class="mt-0.5 text-[12px] text-black/60">
                        Used for identification and reservation confirmation when making a
                        reservation
                    </p>
                </div>
                <div>
                    <label for="password" class="block font-semibold">
                        Password
                    </label>
                    <input type="password" name="password" id="password" placeholder="Password" :value="form.password"
                        x-model="form.password"
                        class="mt-1 w-full min-w-fit max-w-full rounded-sm border border-black/20 px-4 py-1 focus:outline-sky-500" />
                    <p class="mt-0.5 text-[12px] text-black/60">
                        Account security. We won't share your password to anyone
                    </p>
                </div>
                <div>
                    <label for="password" class="block font-semibold">
                        Password Confirmation
                    </label>
                    <input type="password" name="password_confirmation" id="password_confirmation"
                        placeholder="Password Confirmation" :value="form.password_confirmation"
                        x-model="form.password_confirmation"
                        class="mt-1 w-full min-w-fit max-w-full rounded-sm border border-black/20 px-4 py-1 focus:outline-sky-500" />
                    <p class="mt-0.5 text-[12px] text-black/60">
                        For prevent mistakes and ensure that you have entered your
                        password accurately
                    </p>
                </div>
                <div class="">
                    <h1 class="font-semibold">Role</h1>
                    <div class="flex flex-wrap items-center gap-x-4 gap-y-2 text-sm text-white">
                        <div>
                            <input type="radio" name="role" id="admin" value="admin" />
                            <label class="inline-block rounded-full bg-green-500 px-4 py-1" for="admin">Admin</label>
                        </div>
                        <div>
                            <input type="radio" name="role" id="receptionist" value="receptionist" />
                            <label class="inline-block rounded-full bg-rose-500 px-4 py-1"
                                for="receptionist">Receptionist</label>
                        </div>
                        <div>
                            <input type="radio" name="role" id="user" value="user" />
                            <label class="inline-block rounded-full bg-blue-500 px-4 py-1" for="user">User</label>
                        </div>
                    </div>
                </div>
                <div class="flex justify-end gap-x-3">
                    <button class="inline-block cursor-pointer rounded-sm bg-blue-500 px-4 py-1 text-white">
                        <span>Create</span>
                    </button>
                </div>
                <p x-text="form.email"></p>
                <p x-text="form.name"></p>
                <p x-text="form.password"></p>
            </form>
        </div>

    </div>
</x-layout.layout-dashboard>
