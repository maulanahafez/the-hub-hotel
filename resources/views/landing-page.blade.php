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
  <nav class="fixed inset-x-0 top-0 z-[1000] bg-transparent"
    :class="scrolled ? 'bg-white ' : 'bg-transparent'"
    x-data="{ scrolled: false, mobileNav: false }"
    x-on:scroll.window="pageYOffset >= 100 ? scrolled = true : scrolled = false">
    <div class="mx-auto max-w-6xl px-6">
      <div class="container mx-auto">
        <div class="mx-1 flex items-center justify-between">
          <div class="font-poppins text-xl"
            :class="scrolled ? 'text-sky-950' : 'text-white'">
            <img src="{{ asset('images/logo/logo-white.svg') }}"
              alt=""
              class="w-20"
              :class="scrolled ? 'hidden' : null" />
            <img src="{{ asset('images/logo/logo.svg') }}"
              alt=""
              class="w-20"
              :class="!scrolled ? 'hidden' : null" />
          </div>
          <div class="text-md hidden items-center gap-x-12 lg:flex"
            :class="scrolled ? 'text-sky-950' : 'text-white'">
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
              :class="scrolled ? 'text-sky-950' : 'text-white'"
              x-on:click="mobileNav = !mobileNav"
              x-show="!mobileNav"
              x-transition:enter="transition"
              x-transition:enter-start="opacity-0"
              x-transition:enter-end="opacity-100"></i>
            <i class="fa-solid fa-xmark cursor-pointer text-2xl transition hover:text-sky-500"
              :class="scrolled ? 'text-sky-950' : 'text-white'"
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

  <!-- Header -->
  <header class="bg-cover bg-top bg-no-repeat"
    style="background-image: url('{{ asset('images/hotel-1.jpg') }}')">
    <div class="bg-black/60">
      <div class="mx-auto max-w-6xl px-6 pb-24 pt-32">
        <div class="container relative z-10 mx-auto">
          <div class="mx-auto max-w-4xl text-center text-white md:order-first md:mt-0">
            <h1 class="font-poppins text-3xl font-extrabold tracking-wider md:text-4xl lg:text-6xl">
              Unveiling a World of Luxury: Immerse Yourself in Exquisite
              Hotels
            </h1>
            <p class="mx-auto mt-6 max-w-2xl text-lg text-gray-300 md:text-xl lg:mt-12 lg:text-2xl">
              Discover Your Perfect Escape with The Hub Hotel for
              Unforgettable Getaways
            </p>
            <a href="/"
              class="hover:bg-sky-950 mt-4 inline-block rounded-full bg-sky-500 px-4 py-2 font-bold text-white transition lg:hidden">
              <span>Book now</span>
            </a>
          </div>
          <div class="mt-14 hidden text-white lg:flex">
            <div class="mx-auto flex items-center rounded-full bg-black/95 px-6 py-5">
              <div class="mx-auto flex basis-2/5 items-center justify-between">
                <div class="mr-6 text-3xl text-white">
                  <i class="fa-solid fa-earth-americas"></i>
                </div>
                <p class="w-full text-center text-sm">
                  25 Minton Road, Homeland, California, 92548 United States
                </p>
              </div>
              <div class="flex basis-1/5">
                <a href="/"
                  class="mx-auto rounded-full border-2 border-sky-500 px-4 py-2 font-bold text-white transition hover:bg-sky-500">
                  <span>Book now</span>
                </a>
              </div>
              <div class="mx-auto flex basis-2/5 items-center justify-between">
                <div class="w-full text-center text-sm">
                  <p>+1-202-555-0135</p>
                  <p>info@thehubhotel.com</p>
                </div>
                <div class="ml-6 text-3xl text-white">
                  <i class="fa-regular fa-address-book"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- Featured -->
  <section class="mx-auto max-w-6xl px-6 py-12">
    <div class="container mx-auto text-center">
      <div class="text-center">
        <span class="font-open-sans text-sky-950 relative overflow-hidden text-center text-2xl font-bold md:text-3xl">
          Why Choose Us
          <span
            class="bg-sky-950 absolute -right-24 top-1/2 hidden h-0.5 w-20 -translate-y-1/2 rounded-full sm:inline"></span>
          <span
            class="bg-sky-950 absolute -left-24 top-1/2 hidden h-0.5 w-20 -translate-y-1/2 rounded-full sm:inline"></span>
        </span>
      </div>
      <h2 class="mx-auto mt-1 max-w-md text-center text-sm text-gray-600">
        At our hotel, we pride ourselves on providing an unparalleled
        experience that sets us apart from the rest. Here are compelling
        reasons why you should choose our hotel for your next stay:
      </h2>
      <div class="mt-8 grid auto-rows-fr grid-cols-2 items-start gap-4 sm:grid-cols-2 lg:grid-cols-4">
        <div class="h-full text-center">
          <div class="mx-auto flex h-20 w-20 rounded-full border border-sky-500 p-4">
            <i class="fa-solid fa-ranking-star m-auto text-3xl text-sky-500"></i>
          </div>
          <p class="text-md mt-4 font-bold">Quality Over Everything</p>
          <p class="mt-2 hidden text-sm text-black/60 sm:block">
            Unforgettable experiences start with enjoyable and top-notch
            service
          </p>
        </div>
        <div class="h-full text-center">
          <div class="mx-auto flex h-20 w-20 rounded-full border border-sky-500 p-4">
            <i class="fa-solid fa-phone-volume m-auto text-3xl text-sky-500"></i>
          </div>
          <p class="text-md mt-4 font-bold">24/7 Support</p>
          <p class="mt-2 hidden text-sm text-black/60 sm:block">
            Provide attention and assistance to ensure our guests experience
            is fulfilled
          </p>
        </div>
        <div class="h-full text-center">
          <div class="mx-auto flex h-20 w-20 rounded-full border border-sky-500 p-4">
            <i class="fa-solid fa-map-location-dot m-auto text-3xl text-sky-500"></i>
          </div>
          <p class="text-md mt-4 font-bold">Center of the City</p>
          <p class="mt-2 hidden text-sm text-black/60 sm:block">
            Located in the center of city making it the perfect hub for
            exploration
          </p>
        </div>
        <div class="h-full text-center">
          <div class="mx-auto flex h-20 w-20 rounded-full border border-sky-500 p-4">
            <i class="fa-solid fa-shield-halved m-auto text-3xl text-sky-500"></i>
          </div>
          <p class="text-md mt-4 font-bold">Safety and Security</p>
          <p class="mt-2 hidden text-sm text-black/60 sm:block">
            Provide a safe and peaceful environment to enjoy experience with
            peace of mind
          </p>
        </div>
      </div>
      <div class="mt-8">
        <div class="grid grid-cols-2 items-center gap-x-4">
          <div class="h-80">
            <img src="{{ asset('/images/hotel-2.jpg') }}"
              alt=""
              class="h-full w-full rounded-lg object-cover" />
          </div>
          <div class="flex h-80 flex-col gap-y-4">
            <div class="">
              <img src="{{ asset('/images/hotel-3.jpg') }}"
                alt=""
                class="h-[9.5rem] w-full rounded-lg object-cover" />
            </div>
            <div>
              <img src="{{ asset('/images/hotel-4.jpg') }}"
                alt=""
                class="h-[9.5rem] w-full rounded-lg object-cover" />
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Hotel Rooms -->
  <section class="mx-auto max-w-6xl px-6 py-12">
    <div class="container mx-auto">
      <div class="text-center">
        <span class="font-open-sans text-sky-950 relative overflow-hidden text-center text-2xl font-bold md:text-3xl">
          Hotel Rooms
          <span
            class="bg-sky-950 absolute -right-24 top-1/2 hidden h-0.5 w-20 -translate-y-1/2 rounded-full sm:inline"></span>
          <span
            class="bg-sky-950 absolute -left-24 top-1/2 hidden h-0.5 w-20 -translate-y-1/2 rounded-full sm:inline"></span>
        </span>
      </div>
      <h2 class="mx-auto mt-1 max-w-md text-center text-sm text-gray-600">
        Step into a realm of comfort and sophistication in our exquisite hotel
        rooms. We have meticulously crafted each space to provide a haven of
        relaxation and luxury, ensuring an unforgettable stay for our esteemed
        guests.
      </h2>
      <div class="mt-8 grid grid-cols-1 justify-center gap-4 sm:grid-cols-2 lg:grid-cols-3">
        <a href="/"
          class="mx-auto max-w-xs overflow-hidden rounded-lg border border-black/30 shadow-md transition hover:shadow-xl md:max-w-none">
          <div>
            <img src="../../assets/hotel-rooms/1.jpg"
              alt=""
              class="" />
          </div>
          <div class="px-4 py-3">
            <div class="flex items-center justify-between">
              <h1 class="text-md font-poppins font-bold">Penthouse Suite</h1>
              <p class="text-sm font-semibold text-sky-500">$1,000/night</p>
            </div>
            <div class="mt-2 flex items-center gap-x-6 text-[12px] text-gray-500">
              <div class="flex items-center gap-x-2">
                <i class="fa-solid fa-bed"></i>
                <p>1 Single Bed</p>
              </div>
              <div class="flex items-center gap-x-2">
                <i class="fa-solid fa-users"></i>
                <p>8</p>
              </div>
            </div>
            <p class="line-clamp-3 mt-2 text-[12px]">
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero
              recusandae sed delectus, possimus laboriosam quibusdam modi
              culpa sit adipisci alias.
            </p>
          </div>
        </a>
        <a href="/"
          class="mx-auto max-w-xs overflow-hidden rounded-lg border border-black/30 shadow-md transition hover:shadow-xl md:max-w-none">
          <div>
            <img src="../../assets/hotel-rooms/2.jpg"
              alt=""
              class="" />
          </div>
          <div class="px-4 py-3">
            <div class="flex items-center justify-between">
              <h1 class="text-md font-poppins font-bold">Family Room</h1>
              <p class="text-sm font-semibold text-sky-500">$1,000/night</p>
            </div>
            <div class="mt-2 flex items-center gap-x-6 text-[12px] text-gray-500">
              <div class="flex items-center gap-x-2">
                <i class="fa-solid fa-bed"></i>
                <p>1 Single Bed</p>
              </div>
              <div class="flex items-center gap-x-2">
                <i class="fa-solid fa-users"></i>
                <p>8</p>
              </div>
            </div>
            <p class="line-clamp-3 mt-2 text-[12px]">
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero
              recusandae sed delectus, possimus laboriosam quibusdam modi
              culpa sit adipisci alias.
            </p>
          </div>
        </a>
        <a href="/"
          class="mx-auto max-w-xs overflow-hidden rounded-lg border border-black/30 shadow-md transition hover:shadow-xl md:max-w-none">
          <div>
            <img src="../../assets/hotel-rooms/3.jpg"
              alt=""
              class="" />
          </div>
          <div class="px-4 py-3">
            <div class="flex items-center justify-between">
              <h1 class="text-md font-poppins font-bold">Executive Room</h1>
              <p class="text-sm font-semibold text-sky-500">$1,000/night</p>
            </div>
            <div class="mt-2 flex items-center gap-x-6 text-[12px] text-gray-500">
              <div class="flex items-center gap-x-2">
                <i class="fa-solid fa-bed"></i>
                <p>1 Single Bed</p>
              </div>
              <div class="flex items-center gap-x-2">
                <i class="fa-solid fa-users"></i>
                <p>8</p>
              </div>
            </div>
            <p class="line-clamp-3 mt-2 text-[12px]">
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero
              recusandae sed delectus, possimus laboriosam quibusdam modi
              culpa sit adipisci alias.
            </p>
          </div>
        </a>
      </div>
      <div class="mt-2 text-center">
        <a href="/"
          class="hover:bg-sky-950 mt-4 inline-block rounded-full bg-sky-500 px-4 py-2 font-bold text-white transition"><span>See
            More</span></a>
      </div>
    </div>
  </section>

  <!-- Reviews -->
  <section class="mx-auto max-w-6xl px-6 py-12">
    <div class="container mx-auto">
      <div class="text-center">
        <span class="font-open-sans text-sky-950 relative overflow-hidden text-center text-2xl font-bold md:text-3xl">
          Our Guest Reviews
          <span
            class="bg-sky-950 absolute -right-24 top-1/2 hidden h-0.5 w-20 -translate-y-1/2 rounded-full sm:inline"></span>
          <span
            class="bg-sky-950 absolute -left-24 top-1/2 hidden h-0.5 w-20 -translate-y-1/2 rounded-full sm:inline"></span>
        </span>
      </div>
      <h2 class="mx-auto mt-1 max-w-md text-center text-sm text-gray-600">
        Discover what our valued guests have to say about their experiences
        with us. Read through these genuine reviews and testimonials to get a
        glimpse into the exceptional service and unforgettable moments that
        await you at our hotel.
      </h2>
      <div class="mt-8 items-center gap-x-12 md:grid md:grid-cols-2"
        x-data="{ show: 1 }">
        <div class="shrink-0">
          <img src="{{ asset('/images/hotel-5.jpg') }}"
            alt=""
            class="mx-auto aspect-square h-80 w-full rounded-xl object-cover" />
        </div>
        <div class="relative mx-auto mt-4 max-w-lg md:mt-0">
          <div class=""
            x-show="show === 1"
            x-transition:enter="transition"
            x-transition:enter-start="opacity-0 -translate-y-20"
            x-transition:enter-end="opacity-100">
            <div class="">
              <p class="font-poppins text-sky-950 text-xl font-bold">
                Maulana Hafez
              </p>
              <p class="mt-4 text-sm text-gray-600">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed
                dicta saepe tenetur autem quos, voluptatem hic dignissimos
                praesentium maxime ea voluptatum necessitatibus pariatur dolor
                vero at earum illum totam non!
              </p>
              <div class="mt-2 flex justify-between gap-x-2">
                <p class="text-sky-500">2 days ago</p>
                <div class="flex items-center gap-x-2 text-yellow-500">
                  <p>5</p>
                  <div>
                    <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i
                      class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-regular fa-star"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class=""
            x-show="show === 2"
            x-transition:enter="transition"
            x-transition:enter-start="opacity-0 -translate-y-20"
            x-transition:enter-end="opacity-100">
            <div class="">
              <p class="font-poppins text-sky-950 text-xl font-bold">
                Ahita Bisma
              </p>
              <p class="mt-4 text-sm text-gray-600">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed
                dicta saepe tenetur autem quos, voluptatem hic dignissimos
                praesentium maxime ea voluptatum necessitatibus pariatur dolor
                vero at earum illum totam non!
              </p>
              <div class="mt-2 flex justify-between gap-x-2">
                <p class="text-sky-500">2 days ago</p>
                <div class="flex items-center gap-x-2 text-yellow-500">
                  <p>5</p>
                  <div>
                    <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i
                      class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-regular fa-star"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class=""
            x-show="show === 3"
            x-transition:enter="transition"
            x-transition:enter-start="opacity-0 -translate-y-20"
            x-transition:enter-end="opacity-100">
            <div class="">
              <p class="font-poppins text-sky-950 text-xl font-bold">
                Usriyatul Khamimah
              </p>
              <p class="mt-4 text-sm text-gray-600">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed
                dicta saepe tenetur autem quos, voluptatem hic dignissimos
                praesentium maxime ea voluptatum necessitatibus pariatur dolor
                vero at earum illum totam non!
              </p>
              <div class="mt-2 flex justify-between gap-x-2">
                <p class="text-sky-500">2 days ago</p>
                <div class="flex items-center gap-x-2 text-yellow-500">
                  <p>5</p>
                  <div>
                    <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i
                      class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-regular fa-star"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class=""
            x-show="show === 4"
            x-transition:enter="transition"
            x-transition:enter-start="opacity-0 -translate-y-20"
            x-transition:enter-end="opacity-100">
            <div class="">
              <p class="font-poppins text-sky-950 text-xl font-bold">
                Michael Andy
              </p>
              <p class="mt-4 text-sm text-gray-600">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed
                dicta saepe tenetur autem quos, voluptatem hic dignissimos
                praesentium maxime ea voluptatum necessitatibus pariatur dolor
                vero at earum illum totam non!
              </p>
              <div class="mt-2 flex justify-between gap-x-2">
                <p class="text-sky-500">2 days ago</p>
                <div class="flex items-center gap-x-2 text-yellow-500">
                  <p>5</p>
                  <div>
                    <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i
                      class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-regular fa-star"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class=""
            x-show="show === 5"
            x-transition:enter="transition"
            x-transition:enter-start="opacity-0 -translate-y-20"
            x-transition:enter-end="opacity-100">
            <div class="">
              <p class="font-poppins text-sky-950 text-xl font-bold">
                Diana Craig
              </p>
              <p class="mt-4 text-sm text-gray-600">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed
                dicta saepe tenetur autem quos, voluptatem hic dignissimos
                praesentium maxime ea voluptatum necessitatibus pariatur dolor
                vero at earum illum totam non!
              </p>
              <div class="mt-2 flex justify-between gap-x-2">
                <p class="text-sky-500">2 days ago</p>
                <div class="flex items-center gap-x-2 text-yellow-500">
                  <p>5</p>
                  <div>
                    <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i
                      class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-regular fa-star"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="absolute left-1/2 top-full mt-4 flex -translate-x-1/2">
            <span
              class="mx-auto flex h-12 w-12 cursor-pointer rounded-full bg-blue-500 transition hover:bg-sky-400 hover:shadow-lg"
              x-on:click="() => show + 1 > 5 ? show = 1 : show = show + 1">
              <i class="fa-solid fa-arrow-down m-auto text-lg text-white"></i>
            </span>
          </div>
        </div>
      </div>
    </div>
  </section>

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
</body>

</html>
