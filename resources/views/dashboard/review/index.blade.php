<x-layout.layout-dashboard>
    <div class="mt-[53px] p-5 lg:ml-[256px]">
        <h1 class="font-poppins text-2xl font-semibold">Rating and Reviews</h1>
        <div class="mt-4 rounded-md bg-white px-5 py-6 shadow-dark-custom">
          <div>
            <div class="mt-4 overflow-x-auto">
              <table class="w-full min-w-max overflow-x-auto">
                <thead class="font-poppins font-semibold">
                  <tr>
                    <!-- <td class="px-2"></td> -->
                    <td class="px-2">Name</td>
                    <td class="px-2">Rating</td>
                    <td class="px-2">Reviews</td>
                    <td class="px-2">Status</td>
                    <td class="px-2">Action</td>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($reviews as $review)
                    <tr class="border-y border-black/20 text-sm">
                      <!-- <td class="px-2">1</td> -->
                      <td class="px-2">{{Auth::user()->name}}</td>
                      <td class="px-2">
                        <i class="fa-solid fa-star text-yellow-500"></i>
                        <span>
                            {{$review->rating}}
                        </span>
                      </td>
                      <td class="max-w-sm px-2 py-3">
                        {{$review->review}}
                      </td>
                      <td class="px-2">
                        <span
                          class="rounded-full bg-gray-500 px-2 py-1 text-[12px] text-white"
                        >
                          Hidden
                        </span>
                      </td>
                      <td class="px-2">
                        <a
                          href=""
                          class="cursor-pointer rounded-full bg-yellow-500 px-4 py-1 text-[12px] text-white transition hover:bg-yellow-950"
                        >
                          Hide
                        </a>
                        <!-- <a
                          href=""
                          class="cursor-pointer rounded-full bg-blue-500 px-4 py-1 text-[12px] text-white transition hover:bg-blue-950"
                        >
                          Show
                        </a> -->
                      </td>
                    </tr>
                        
                    @endforeach
                  {{-- <tr class="border-y border-black/20 text-sm">
                    <!-- <td class="px-2">2</td> -->
                    <td class="px-2">Maulana Hafez</td>
                    <td class="px-2">
                      <i class="fa-solid fa-star text-yellow-500"></i>
                      <span>5</span>
                    </td>
                    <td class="max-w-sm px-2 py-3">
                      Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                      Natus temporibus deserunt earum fugit voluptatem quia nisi
                      corrupti consequuntur tempore exercitationem, quis beatae,
                      dolor illo ipsa. Porro maiores iusto sapiente reprehenderit.
                    </td>
                    <td class="px-2">
                      <span
                        class="rounded-full bg-green-500 px-2 py-1 text-[12px] text-white"
                      >
                        Displayed
                      </span>
                    </td>
                    <td class="px-2">
                      <!-- <a
                        href=""
                        class="cursor-pointer rounded-full bg-yellow-500 px-4 py-1 text-[12px] text-white transition hover:bg-yellow-950"
                      >
                        Hide
                      </a> -->
                      <a
                        href=""
                        class="cursor-pointer rounded-full bg-blue-500 px-4 py-1 text-[12px] text-white transition hover:bg-blue-950"
                      >
                        Display
                      </a>
                    </td>
                  </tr>
                  <tr class="border-y border-black/20 text-sm">
                    <!-- <td class="px-2">3</td> -->
                    <td class="px-2">Bisma</td>
                    <td class="px-2">
                      <i class="fa-solid fa-star text-yellow-500"></i>
                      <span>5</span>
                    </td>
                    <td class="max-w-sm px-2 py-3">
                      Lorem ipsum dolor sit amet consectetur adipisicing elit. Vel
                      quo suscipit at molestias nobis corrupti eos illum sunt
                      dolorum eum?
                    </td>
                    <td class="px-2">
                      <span
                        class="rounded-full bg-gray-500 px-2 py-1 text-[12px] text-white"
                      >
                        Hidden
                      </span>
                    </td>
                    <td class="px-2">
                      <a
                        href=""
                        class="cursor-pointer rounded-full bg-yellow-500 px-4 py-1 text-[12px] text-white transition hover:bg-yellow-950"
                      >
                        Hide
                      </a>
                      <!-- <a
                        href=""
                        class="cursor-pointer rounded-full bg-blue-500 px-4 py-1 text-[12px] text-white transition hover:bg-blue-950"
                      >
                        Show
                      </a> -->
                    </td>
                  </tr>
                  <tr class="border-y border-black/20 text-sm">
                    <!-- <td class="px-2">4</td> -->
                    <td class="px-2">Maulana Hafez</td>
                    <td class="px-2">
                      <i class="fa-solid fa-star text-yellow-500"></i>
                      <span>5</span>
                    </td>
                    <td class="max-w-sm px-2 py-3">
                      Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                      Natus temporibus deserunt earum fugit voluptatem quia nisi
                      corrupti consequuntur tempore exercitationem, quis beatae,
                      dolor illo ipsa. Porro maiores iusto sapiente reprehenderit.
                    </td>
                    <td class="px-2">
                      <span
                        class="rounded-full bg-green-500 px-2 py-1 text-[12px] text-white"
                      >
                        Displayed
                      </span>
                    </td>
                    <td class="px-2">
                      <!-- <a
                        href=""
                        class="cursor-pointer rounded-full bg-yellow-500 px-4 py-1 text-[12px] text-white transition hover:bg-yellow-950"
                      >
                        Hide
                      </a> -->
                      <a
                        href=""
                        class="cursor-pointer rounded-full bg-blue-500 px-4 py-1 text-[12px] text-white transition hover:bg-blue-950"
                      >
                        Display
                      </a>
                    </td>
                  </tr> --}}
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
  
</x-layout.layout-dashboard>