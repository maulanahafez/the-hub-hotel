<x-layout.layout>
  @php
    // dd($reviews)
  @endphp
  <section class="mx-auto max-w-2xl px-6 py-24">
    <div class="container mx-auto"
      x-data="{ modal: false }">
      <span class="relative inline-block">
        <span class="font-open-sans text-sky-950 text-2xl font-bold md:text-3xl">
          Our Guest Reviews
        </span>
        <span class="bg-sky-950 absolute -right-6 top-1/2 h-2.5 w-2.5 -translate-y-1/2 rotate-45 rounded-sm"></span>
        <span class="bg-sky-950 absolute left-[105%] top-1/2 hidden h-px w-40 -translate-y-1/2 rounded-sm sm:inline">
        </span>
      </span>
      <h2 class="mt-1 max-w-lg text-sm">
        Discover what our valued guests have to say about their experiences
        with us. Read through these genuine reviews and testimonials to get a
        glimpse into the exceptional service and unforgettable moments that
        await you at our hotel.
      </h2>
      @auth
        <div class="">
          <span href="/"
            class="hover:bg-sky-950 mt-4 inline-block cursor-pointer rounded-lg bg-sky-500 px-4 py-2 text-sm text-white transition"
            x-on:click="modal = !modal">
            <span>Give Reviews</span>
          </span>
        </div>
        <form action="{{ route('home.review.store') }}"
          method="post"
          class="mt-6"
          x-show="modal"
          x-transition:enter="transition"
          x-transition:enter-start="opacity-0 -translate-y-8"
          x-transition:enter-end="opacity-100"
          x-transition:leave="transition"
          x-transition:leave-start="opacity-100 translate-y-8"
          x-transition:leave-end="opacity-0">
          {{-- token untuk form --}}
          @csrf
          <div class="flex items-center gap-x-4 text-xl text-gray-300"
            x-data="handleRating()">
            <template x-for="(rating, index) in ratings">
              <i :key="index"
                :class="rating ? 'fa-solid text-yellow-500' : 'fa-regular text-gray-300'"
                class="fa-star"
                x-on:mouseenter="hover(index)"
                x-on:mouseleave="leave()"
                x-on:click="handleInput(index)"></i>
            </template>
            <input type="text"
              name="rating"
              id=""
              :value="input"
              x-model="input"
              class="hidden" />
          </div>
          <script>
            document.addEventListener("alpine:init", () => {
              Alpine.data("handleRating", () => ({
                ratings: [false, false, false, false, false],
                input: 0,
                hover(index) {
                  if (this.input === 0) {
                    for (let i = 0; i < 5; i++) {
                      if (i <= index) {
                        this.ratings[i] = true;
                      } else {
                        this.ratings[i] = false;
                      }
                    }
                  }
                },
                leave() {
                  if (this.input === 0) {
                    for (let i = 0; i < 5; i++) {
                      this.ratings[i] = false;
                    }
                  }
                },
                handleInput(index) {
                  this.input = index + 1;
                  for (let i = 0; i < 5; i++) {
                    if (i <= index) {
                      this.ratings[i] = true;
                    } else {
                      this.ratings[i] = false;
                    }
                  }
                },
              }));
            });
          </script>
          <div class="mt-4">
            <textarea name="review"
              id="review"
              class="h-24 w-full resize-y rounded-lg border border-sky-600 p-3 text-sm focus:outline-sky-500"
              placeholder="Tell us your best experience with The Hub Hotel"></textarea>
          </div>
          <div class="mt-2 text-end">
            <button type="submit"
              class="rounded-lg bg-sky-500 px-4 py-2 text-white">
              Submit
            </button>
          </div>
        </form>

      @endauth
      <div class="mt-8">
        @foreach ($reviews as $review)
          <div class="border-b border-black/20 py-6">
            <div class="flex flex-wrap items-center justify-between gap-x-2 gap-y-2">
              <p class="font-poppins text-sky-950 text-lg font-bold">
                {{ $review->user->name }}
              </p>
              <p class="text-sm text-black/60">
                {{ $review->created_at->diffForHumans() }}
              </p>
            </div>
            <div class="mt-2 flex gap-x-2 text-yellow-500">
              @for ($i = 0; $i < 5; $i++)
                @if ($i < $review->rating)
                  <i class="fa-solid fa-star"></i>
                @else
                  <i class="fa-regular fa-star"></i>
                @endif
              @endfor
            </div>
            <div class="mt-3 text-sm">
              {{ $review->review }}
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </section>

</x-layout.layout>
