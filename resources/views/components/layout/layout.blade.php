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
</head>

<body class="font-open-sans">
  <!-- Navbar -->
  <nav class="fixed inset-x-0 top-0 z-[1000] bg-transparent bg-white"
    x-data="{ mobileNav: false }">
    <div class="mx-auto max-w-6xl px-6 py-3">
      <div class="container mx-auto">
        <div class="mx-1 flex items-center justify-between">
          <div class="">
            <img src="{{ asset('images/logo/logo.svg') }}"
              alt=""
              class="w-14" />
          </div>
          <div class="text-md hidden items-center gap-x-12 lg:flex">
            <div>
              <a href="{{ route('home.room-type') }}"
                class="flex items-center gap-x-2 p-2 transition hover:text-sky-500">
                <i class="fa-solid fa-bed"></i>
                <span>Rooms</span>
              </a>
            </div>
            <div>
              <a href="/"
                class="flex items-center gap-x-2 p-2 transition hover:text-sky-500">
                <i class="fa-solid fa-star"></i>
                <span>Reviews</span>
              </a>
            </div>
            <div>
              <a href="/"
                class="flex items-center gap-x-2 p-2 transition hover:text-sky-500">
                <i class="fa-solid fa-clock-rotate-left"></i>
                <span>Reservations</span>
              </a>
            </div>
            <div>
              <a href="/"
                class="hover:bg-sky-950 rounded-lg bg-sky-500 px-6 py-2 text-sm font-bold text-white transition">
                <span>Login</span>
              </a>
            </div>
          </div>

          <!-- Toggler -->
          <div class="lg:hidden">
            <i class="fa-solid fa-bars cursor-pointer text-2xl transition hover:text-sky-500"
              x-on:click="mobileNav = !mobileNav"
              x-show="!mobileNav"
              x-transition:enter="transition"
              x-transition:enter-start="opacity-0"
              x-transition:enter-end="opacity-100"></i>
            <i class="fa-solid fa-xmark cursor-pointer text-2xl transition hover:text-sky-500"
              x-on:click="mobileNav = !mobileNav"
              x-show="mobileNav"
              x-transition:enter="transition"
              x-transition:enter-start="opacity-0 "
              x-transition:enter-end="opacity-100"></i>
          </div>

          <!-- Mobile/Tablet Navbar -->
          <div class="fixed inset-0 top-[3.25rem] z-[999] max-w-xs bg-white lg:hidden"
            x-show="mobileNav"
            x-on:click.outside="mobileNav = false"
            x-transition:enter="transition"
            x-transition:enter-start="opacity-0 -translate-x-full"
            x-transition:enter-end="opacity-100"
            x-transition:leave="transition"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0 -translate-x-full">
            <div class="flex h-full flex-col gap-y-2 px-6 py-4 text-sm">
              <div>
                <a href="{{ route('home.room-type') }}"
                  class="flex items-center gap-x-2 rounded-lg px-2 py-1 transition hover:bg-sky-500 hover:text-white">
                  <div class="flex h-8 w-8">
                    <i class="fa-solid fa-bed m-auto text-lg"></i>
                  </div>
                  <span>Rooms</span>
                </a>
              </div>
              <div>
                <a href="/"
                  class="flex items-center gap-x-2 rounded-lg px-2 py-1 transition hover:bg-sky-500 hover:text-white">
                  <div class="flex h-8 w-8">
                    <i class="fa-solid fa-calendar-days m-auto text-lg"></i>
                  </div>
                  <span>Book</span>
                </a>
              </div>
              <div>
                <a href="/"
                  class="flex items-center gap-x-2 rounded-lg px-2 py-1 transition hover:bg-sky-500 hover:text-white">
                  <div class="flex h-8 w-8">
                    <i class="fa-solid fa-bell-concierge m-auto text-lg"></i>
                  </div>
                  <span>Check In</span>
                </a>
              </div>
              <div>
                <a href="/"
                  class="flex items-center gap-x-2 rounded-lg px-2 py-1 transition hover:bg-sky-500 hover:text-white">
                  <div class="flex h-8 w-8">
                    <i class="fa-solid fa-clock-rotate-left m-auto text-lg"></i>
                  </div>
                  <span>Reservations</span>
                </a>
              </div>
              <div class="flex grow">
                <a href="/"
                  class="hover:bg-sky-950 mt-auto w-full rounded-lg bg-sky-500 px-6 py-2.5 text-center text-sm font-bold text-white transition">
                  <span>Login</span>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </nav>

  {{ $slot }}

  <!-- Footer -->
  <footer class="bg-sky-950 px-6 pb-2 pt-12">
    <div class="mx-auto max-w-6xl">
      <div class="container mx-auto">
        <div class="grid grid-cols-1 gap-y-4 text-center text-white sm:grid-cols-2 md:grid-cols-4">
          <div>
            <div>
              <img src=""
                alt="" />
            </div>
            <p class="text-sm">
              Lorem ipsum dolor, sit amet consectetur adipisicing elit.
              Accusamus eius debitis, perferendis et officia maxime placeat
              ducimus nostrum voluptatem repudiandae.
            </p>
          </div>
          <div>
            <p class="font-poppins font-bold">Company</p>
            <div class="mt-1 text-sm">
              <div>
                <a href="/">About Us</a>
              </div>
              <div>
                <a href="/">Hotel Rooms</a>
              </div>
              <div>
                <a href="/">Booking</a>
              </div>
              <div>
                <a href="/">Location</a>
              </div>
            </div>
          </div>
          <div>
            <p class="font-poppins font-bold">Help</p>
            <div class="mt-1 text-sm">
              <div>
                <a href="/">Contact Center</a>
              </div>
              <div>
                <a href="/">FAQs</a>
              </div>
              <div>
                <a href="/">Privacy and Policy</a>
              </div>
            </div>
          </div>
          <div>
            <p class="font-poppins font-bold">Contact</p>
            <div class="mt-1 flex items-center justify-center gap-x-4 text-2xl">
              <div>
                <a href="/"
                  class="inline-block transition hover:scale-110">
                  <i class="fa-brands fa-instagram"></i>
                </a>
              </div>
              <div>
                <a href="/"
                  class="inline-block transition hover:scale-110">
                  <i class="fa-brands fa-facebook"></i>
                </a>
              </div>
              <div>
                <a href="/"
                  class="inline-block transition hover:scale-110">
                  <i class="fa-brands fa-youtube"></i>
                </a>
              </div>
            </div>
          </div>
        </div>
        <div class="mt-10 border-t border-white/20 pt-2 text-center text-sm text-white">
          <span>The Hub Hotel &copy; 2003-2023. All Rights Reserved</span>
        </div>
      </div>
    </div>
  </footer>

  <!-- Responsive Helper -->
  <div class="fixed bottom-20 right-0 h-12 w-12 bg-blue-200 sm:bg-red-200 md:bg-green-200 lg:bg-yellow-200"></div>
</body>

</html>
