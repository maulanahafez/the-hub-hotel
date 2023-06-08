<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible"
    content="IE=edge" />
  <meta name="viewport"
    content="width=device-width, initial-scale=1.0" />
  <title>The Hub Hotel</title>

  <!-- Style -->
  @vite('resources/css/main.css')

  <!-- Alpine.js -->
  <script defer
    src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

  <!-- Font Family -->
  <style>
    @import url("https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700;800&family=Poppins:wght@300;400;500;600;700;800;900&display=swap");
  </style>

  <!-- Font Awesome -->
  <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
    crossorigin="anonymous"
    referrerpolicy="no-referrer" />

  {{-- Datatables --}}
  <!-- jQuery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  {{-- DataTables --}}
  <link rel="stylesheet"
    href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />
  <script defer
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
    crossorigin="anonymous"></script>
  <script defer
    type="text/javascript"
    src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
</head>

<body class="font-open-sans bg-gray-100">
  <!-- Navbar -->
  <nav class="mx-auto max-w-6xl bg-white">
    <div class="container mx-auto"
      x-data="{ mobileNav: false, fixed: false }">
      <div class="fixed inset-x-0 top-0 border-b border-black/20 bg-white px-6">
        <div class="flex items-center justify-between py-1">
          <div class="">
            <img src="{{ asset('images/logo/logo.svg') }}"
              alt=""
              class="w-14" />
          </div>

          <!-- Toggler -->
          <div class="lg:hidden">
            <i class="fa-solid fa-bars cursor-pointer text-xl transition hover:text-sky-500"
              x-on:click="mobileNav = !mobileNav"
              x-show="!mobileNav"
              x-transition:enter="transition"
              x-transition:enter-start="opacity-0"
              x-transition:enter-end="opacity-100"></i>
            <i class="fa-solid fa-xmark cursor-pointer text-xl transition hover:text-sky-500"
              x-on:click="mobileNav = !mobileNav"
              x-show="mobileNav"
              x-transition:enter="transition"
              x-transition:enter-start="opacity-0"
              x-transition:enter-end="opacity-100"></i>
          </div>

          <div class="hidden lg:block">
            <div class="flex items-center gap-x-2">
              <span class="flex h-8 w-8 rounded-full border border-black/40">
                <i class="fa-solid fa-user m-auto text-black/60"></i>
              </span>
              <div class="text-[12px]">
                @auth
                  <p>{{ Auth::user()->name }}</p>
                  <p class="text-black/60">{{ Auth::user()->email }}</p>
                @endauth
              </div>
            </div>
          </div>

          {{-- Mobile Nav --}}
          <div class="fixed inset-0 z-[999] max-w-[16rem] border-r border-black/20 bg-white lg:hidden"
            x-show="mobileNav"
            x-transition:enter="transition"
            x-transition:enter-start="opacity-0 -translate-x-20"
            x-transition:enter-end="opacity-100"
            x-transition:leave="transition"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0 -translate-x-20">
            <div>
              <div class="mt-4">
                <a href="{{ route('dashboard') }}">
                  <img src="{{ asset('images/logo/logo.svg') }}"
                    alt=""
                    class="mx-auto w-16" />
                </a>
              </div>
              <div class="mt-4 px-2">
                <div>
                  <a href="/"
                    class="hover:bg-sky-950 flex w-full items-center gap-x-2 rounded-sm px-4 py-2 transition hover:text-white"
                    :class="window.location.href.includes('dashboard') && !window.location.href
                        .includes('dashboard/room') && !window.location.href.includes('dashboard/room-type') && !
                        window.location.href.includes('dashboard/review') && !window.location.href.includes(
                            'dashboard/reservation') && !window.location.href.includes('dashboard/user') ?
                        'bg-sky-500 text-white' : 'text-black'">
                    <span class="flex h-6 w-6">
                      <i class="fa-solid fa-house m-auto text-lg"></i>
                    </span>
                    <span class="text-lg">Dashboard</span>
                  </a>
                </div>
                <div class="mt-2">
                  <a href="{{ route('user.index') }}"
                    class="hover:bg-sky-950 flex w-full items-center gap-x-2 rounded-sm px-4 py-2 transition hover:text-white"
                    :class="window.location.href.includes('user') ? 'bg-sky-500 text-white' : 'text-black'">
                    <span class="flex h-6 w-6">
                      <i class="fa-solid fa-user m-auto text-lg"></i>
                    </span>
                    <span class="text-lg">Account</span>
                  </a>
                </div>
                <div class="mt-2">
                  <a href="{{ route('room-type.index') }}"
                    class="hover:bg-sky-950 flex w-full items-center gap-x-2 rounded-sm px-4 py-2 transition hover:text-white"
                    :class="window.location.href.includes('room-type') ? 'bg-sky-500 text-white' : 'text-black'">
                    <span class="flex h-6 w-6">
                      <i class="fa-solid fa-restroom m-auto text-lg"></i>
                    </span>
                    <span class="text-lg">Room Type</span>
                  </a>
                </div>
                <div class="mt-2">
                  <a href="{{ route('room.index') }}"
                    class="hover:bg-sky-950 flex w-full items-center gap-x-2 rounded-sm px-4 py-2 transition hover:text-white"
                    :class="window.location.href.includes('room') ? 'bg-sky-500 text-white' : 'text-black'">
                    <span class="flex h-6 w-6">
                      <i class="fa-solid fa-bed m-auto text-lg"></i>
                    </span>
                    <span class="text-lg">Room</span>
                  </a>
                </div>
                <div class="mt-2">
                  <a href="{{ route('reservation.index') }}"
                    class="hover:bg-sky-950 flex w-full items-center gap-x-2 rounded-sm px-4 py-2 transition hover:text-white"
                    :class="window.location.href.includes('reservation') ? 'bg-sky-500 text-white' : 'text-black'">
                    <span class="flex h-6 w-6">
                      <i class="fa-solid fa-receipt m-auto text-lg"></i>
                    </span>
                    <span class="text-lg">Reservation</span>
                  </a>
                </div>
                <div class="mt-2">
                  <a href="{{ route('review.index') }}"
                    class="hover:bg-sky-950 flex w-full items-center gap-x-2 rounded-sm px-4 py-2 transition hover:text-white"
                    :class="window.location.href.includes('review') ? 'bg-sky-500 text-white' : 'text-black'">
                    <span class="flex h-6 w-6">
                      <i class="fa-solid fa-face-smile m-auto text-lg"></i>
                    </span>
                    <span class="text-lg">Reviews</span>
                  </a>
                </div>
              </div>
            </div>
          </div>

          {{-- Nav --}}
          <div class="fixed inset-0 z-[999] hidden max-w-[16rem] border-r border-black/20 bg-white lg:block">
            <div>
              <div class="mt-4">
                <a href="/">
                  <img src="{{ asset('images/logo/logo.svg') }}"
                    alt=""
                    class="mx-auto w-16" />
                </a>
              </div>
              <div class="mt-4 px-2">
                <div>
                  <a href="{{ route('dashboard') }}"
                    class="hover:bg-sky-950 flex w-full items-center gap-x-2 rounded-sm px-4 py-2 transition hover:text-white"
                    :class="window.location.href.includes('dashboard') && !window.location.href
                        .includes('dashboard/room') && !window.location.href.includes('dashboard/room-type') && !
                        window.location.href.includes('dashboard/review') && !window.location.href.includes(
                            'dashboard/reservation') && !window.location.href.includes('dashboard/user') ?
                        'bg-sky-500 text-white' : 'text-black'">
                    <span class="flex h-6 w-6">
                      <i class="fa-solid fa-house m-auto text-lg"></i>
                    </span>
                    <span class="text-lg">Dashboard</span>
                  </a>
                </div>
                <div class="mt-2">
                  <a href="{{ route('user.index') }}"
                    class="hover:bg-sky-950 flex w-full items-center gap-x-2 rounded-sm px-4 py-2 transition hover:text-white"
                    :class="window.location.href.includes('user') ? 'bg-sky-500 text-white' : 'text-black'">
                    <span class="flex h-6 w-6">
                      <i class="fa-solid fa-user m-auto text-lg"></i>
                    </span>
                    <span class="text-lg">Account</span>
                  </a>
                </div>
                <div class="mt-2">
                  <a href="{{ route('room-type.index') }}"
                    class="hover:bg-sky-950 flex w-full items-center gap-x-2 rounded-sm px-4 py-2 transition hover:text-white"
                    :class="window.location.href.includes('room-type') ? 'bg-sky-500 text-white' : 'text-black'">
                    <span class="flex h-6 w-6">
                      <i class="fa-solid fa-restroom m-auto text-lg"></i>
                    </span>
                    <span class="text-lg">Room Type</span>
                  </a>
                </div>
                <div class="mt-2">
                  <a href="{{ route('room.index') }}"
                    class="hover:bg-sky-950 flex w-full items-center gap-x-2 rounded-sm px-4 py-2 transition hover:text-white"
                    :class="window.location.href.includes('room') && !window.location.href.includes('/room-type') ?
                        'bg-sky-500 text-white' : 'text-black'">
                    <span class="flex h-6 w-6">
                      <i class="fa-solid fa-bed m-auto text-lg"></i>
                    </span>
                    <span class="text-lg">Room</span>
                  </a>
                </div>
                <div class="mt-2">
                  <a href="{{ route('reservation.index') }}"
                    class="hover:bg-sky-950 flex w-full items-center gap-x-2 rounded-sm px-4 py-2 transition hover:text-white"
                    :class="window.location.href.includes('reservation') ? 'bg-sky-500 text-white' : 'text-black'">
                    <span class="flex h-6 w-6">
                      <i class="fa-solid fa-receipt m-auto text-lg"></i>
                    </span>
                    <span class="text-lg">Reservation</span>
                  </a>
                </div>
                <div class="mt-2">
                  <a href="{{ route('review.index') }}"
                    class="hover:bg-sky-950 flex w-full items-center gap-x-2 rounded-sm px-4 py-2 transition hover:text-white"
                    :class="window.location.href.includes('review') ? 'bg-sky-500 text-white' : 'text-black'">
                    <span class="flex h-6 w-6">
                      <i class="fa-solid fa-face-smile m-auto text-lg"></i>
                    </span>
                    <span class="text-lg">Reviews</span>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </nav>

  {{ $slot }}

</body>

</html>
