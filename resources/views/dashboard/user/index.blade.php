<x-layout.layout-dashboard>
    <!-- Content -->
    <div class="mt-[53px] p-5 lg:ml-[256px]">
        <h1 class="font-poppins text-2xl font-semibold">Accounts</h1>
        <div class="mt-4 rounded-md bg-white px-5 py-6 shadow-dark-custom">
            <div>
                <div class="flex items-center">
                    <a href="{{ route('user.create') }}"
                        class="flex items-center gap-x-2 rounded-md bg-blue-500 px-4 py-2 text-white transition hover:bg-sky-950">
                        <i class="fa-solid fa-plus text-lg"></i>
                        <span class="text-sm">Add</span>
                    </a>
                </div>
                <div class="mt-4 overflow-x-auto">
                    <table class="w-full min-w-max overflow-x-auto">
                        <thead class="font-poppins font-semibold">
                            <tr>
                                <td class="px-2"></td>
                                <td class="px-2">Name</td>
                                <td class="px-2">Email</td>
                                <td class="px-2">Role</td>
                                <td class="px-2">Action</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr class="border-y border-black/20 text-sm">
                                    <td class="px-2 py-3">{{ $number++ }}</td>
                                    <td class="px-2">{{ $user->name }}</td>
                                    <td class="px-2">{{ $user->email }}</td>
                                    <td class="px-2">
                                        @if ($user->role == 'admin')
                                            <span
                                                class="rounded-full bg-green-500 px-2 py-1 text-[12px] text-white">{{ ucfirst($user->role) }}</span>
                                        @elseif($user->role == 'user')
                                            <span
                                                class="rounded-full bg-blue-500 px-2 py-1 text-[12px] text-white">{{ ucfirst($user->role) }}</span>
                                        @else
                                            <span
                                                class="rounded-full bg-rose-500 px-2 py-1 text-[12px] text-white">{{ ucfirst($user->role) }}</span>
                                        @endif
                                    </td>
                                    <td class="px-2">
                                        <a href="{{ route('user.edit', ['user' => $user->id]) }}"
                                            class="cursor-pointer rounded-full bg-blue-500 px-4 py-1 text-[12px] text-white transition hover:bg-sky-950">
                                            Details
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-layout.layout-dashboard>
