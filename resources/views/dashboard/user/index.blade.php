<x-layout.layout-dashboard>
  <!-- Content -->
  <div class="mt-[53px] p-5 lg:ml-[256px]">
    <h1 class="font-poppins text-2xl font-semibold">Accounts</h1>
    <div class="shadow-dark-custom mt-4 rounded-md bg-white px-5 py-4">
      <div>
        <div class="flex items-center">
          <a href="{{ route('user.create') }}"
            class="hover:bg-sky-950 flex items-center gap-x-2 rounded-md bg-blue-500 px-4 py-2 text-white transition">
            <i class="fa-solid fa-plus text-lg"></i>
            <span class="text-sm">Add</span>
          </a>
        </div>
        @if (session('successDelete'))
          <div class="mt-4">
            <p class="rounded-md bg-green-500 px-3 py-2 text-sm text-white">Account delete successfully!</p>
          </div>
        @endif
        <div class="mt-4 overflow-x-auto"
          x-data="{ selected: 'All' }">
          {{-- <div class="mb-4 flex flex-wrap justify-end gap-x-2 gap-y-2">
            <p class="cursor-pointer rounded-sm border border-black/40 px-3 py-1 text-[12px]"
              :class="selected === 'All' ? 'bg-green-500 text-white' : 'bg-white'"
              x-on:click="selected = 'All'">All</p>
            <p class="cursor-pointer rounded-sm border border-black/40 px-3 py-1 text-[12px]"
              :class="selected === 'Admin' ? 'bg-blue-500 text-white' : 'bg-white'"
              x-on:click="selected = 'Admin'">Admin</p>
            <p class="cursor-pointer rounded-sm border border-black/40 px-3 py-1 text-[12px]"
              :class="selected === 'Receptionist' ? 'bg-rose-500 text-white' : 'bg-white'"
              x-on:click="selected = 'Receptionist'">Receptionist</p>
            <p class="cursor-pointer rounded-sm border border-black/40 px-3 py-1 text-[12px]"
              :class="selected === 'User' ? 'bg-gray-500 text-white' : 'bg-white'"
              x-on:click="selected = 'User'">User</p>
          </div> --}}
          <table class="mt-4 w-full min-w-max overflow-x-auto"
            id="user-table">
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
                <tr class="border-y border-black/20 text-sm"
                  x-show="selected == 'All' ? selected == 'All' : selected == '{{ ucfirst($user->role) }}'">
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
                      class="hover:bg-sky-950 cursor-pointer rounded-full bg-blue-500 px-4 py-1 text-[12px] text-white transition">
                      Details
                    </a>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
          <script>
            $(document).ready(function() {
              $('#user-table').DataTable();
            });
          </script>
        </div>
      </div>
    </div>
  </div>
</x-layout.layout-dashboard>
