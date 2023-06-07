<x-layout.layout-dashboard>
  <!-- Content -->
  <div class="mt-[53px] p-5 lg:ml-[256px]">
    <div class="mx-auto max-w-6xl">
      <div class="container mx-auto">
        <div class="">
          <div class="flex flex-wrap gap-x-6 gap-y-4">
            <div class="shadow-dark-custom rounded-md bg-green-500 px-5 py-3 text-white">
              <div class="text-sky-950 text-4xl">
                <i class="fa-regular fa-credit-card"></i>
              </div>
              <p class="font-poppins mt-1 text-base text-gray-100">
                Total Earning
              </p>
              <p class="font-poppins mt-1 gap-x-1 text-xl font-semibold">
                <span>$</span>
                <span>{{ $totalEarnings }}</span>
              </p>
            </div>
            <div class="shadow-dark-custom rounded-md bg-purple-500 px-5 py-3 text-white">
              <div class="text-sky-950 text-4xl">
                <i class="fa-regular fa-square-check"></i>
              </div>
              <p class="font-poppins mt-1 text-base text-gray-100">
                Total Transaction
              </p>
              <p class="font-poppins mt-1 gap-x-1 text-xl font-semibold">
                {{ $totalTransactions }}
              </p>
              <p class="mt-1 text-sm text-gray-200">this month</p>
            </div>
            <div class="shadow-dark-custom rounded-md bg-blue-500 px-5 py-3 text-white">
              <div class="text-sky-950 text-4xl">
                <i class="fa-regular fa-user"></i>
              </div>
              <p class="font-poppins mt-1 text-base text-gray-100">
                User Registered
              </p>
              <p class="font-poppins mt-1 gap-x-1 text-xl font-semibold">
                {{ $userRegistered }}
              </p>
              <p class="mt-1 text-sm text-gray-200">accounts</p>
            </div>
            <div class="shadow-dark-custom rounded-md bg-rose-500 px-5 py-3 text-white">
              <div class="text-sky-950 text-4xl">
                <i class="fa-regular fa-circle-check"></i>
              </div>
              <p class="font-poppins mt-1 text-base text-gray-100">
                Rooms Available
              </p>
              <p class="font-poppins mt-1 gap-x-1 text-xl font-semibold">
                {{ $roomsAvailable }}
              </p>
              <p class="mt-1 text-sm text-gray-200">rooms</p>
            </div>
            <div class="shadow-dark-custom rounded-md bg-yellow-500 px-5 py-3 text-white">
              <div class="text-sky-950 text-4xl">
                <i class="fa-regular fa-star"></i>
              </div>
              <p class="d font-poppins mt-1 text-base text-gray-100">
                Rating Reviews
              </p>
              <p class="font-poppins mt-1 gap-x-1 text-xl font-semibold">
                {{ $rating }}
              </p>
            </div>
          </div>
          <div class="shadow-dark-custom mt-4 rounded-md bg-white px-5 py-6">
            <div>
              <h1 class="font-poppins text-2xl font-semibold">
                Newest Transaction
              </h1>
              <div class="overflow-x-auto">
                <table class="mt-4 w-full min-w-max overflow-x-auto">
                  <thead class="font-poppins font-semibold">
                    <tr>
                      <td class="px-2">Status</td>
                      <td class="px-2">Name</td>
                      <td class="px-2">Room</td>
                      <td class="px-2"></td>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($reservations as $reservation)
                      <tr class="border-y border-black/20 text-sm">
                        <td class="px-2 py-3">
                          @if ($reservation->status == 'Pending')
                            <span class="block h-5 w-5 rounded-sm bg-gray-500"></span>
                          @elseif($reservation->status == 'Checked In')
                            <span class="block h-5 w-5 rounded-sm bg-green-500"></span>
                          @else
                            <span class="block h-5 w-5 rounded-sm bg-blue-500"></span>
                          @endif
                        </td>
                        <td class="px-2">{{ $reservation->user->name }}</td>
                        <td class="px-2 capitalize">{{ $reservation->room->roomType->type }}
                          {{ $reservation->room->room_code }}
                        </td>
                        <td class="px-2">
                          <a href="{{ route('reservation.detail', ['reservation' => $reservation->id]) }}"
                            class="hover:bg-sky-950 cursor-pointer rounded-full bg-blue-500 px-4 py-1 text-[12px] text-white transition">
                            Detail
                          </a>
                        </td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <div class="shadow-dark-custom mt-4 rounded-md bg-white px-5 py-6">
            <div>
              <h1 class="font-poppins text-2xl font-semibold">New User</h1>
              <div class="overflow-x-auto">
                <table class="mt-4 w-full min-w-max overflow-x-auto">
                  <thead class="font-poppins font-semibold">
                    <tr>
                      <td class="px-2"></td>
                      <td class="px-2">Name</td>
                      <td class="px-2">Email</td>
                      <td></td>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($users as $user)
                      <tr class="border-y border-black/20 text-sm">
                        <td class="px-2 py-3">{{ $loop->iteration }}</td>
                        <td class="px-2">{{ $user->name }}</td>
                        <td class="px-2">
                          {{ $user->email }}
                        </td>
                        <td>
                          <a href="{{ route('user.edit', ['user' => $user->id]) }}"
                            class="hover:bg-sky-950 cursor-pointer rounded-full bg-blue-500 px-4 py-1 text-[12px] text-white transition">
                            Detail
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
      </div>
    </div>
  </div>
</x-layout.layout-dashboard>
