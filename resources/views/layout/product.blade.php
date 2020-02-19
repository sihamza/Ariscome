<div class="p-5 w-1/4">
    <div class="flex-shrink-0 m-6 relative overflow-hidden bg-gray-300 rounded-lg max-w-xs shadow-lg">
        <svg class="absolute bottom-0 left-0 mb-8" viewBox="0 0 375 283" fill="white" style="transform: scale(1.5); opacity: 0.3;">
            <rect x="159.52" y="175" width="152" height="152" rx="8" transform="rotate(-45 159.52 175)" fill="white" />
            <rect y="107.48" width="152" height="152" rx="8" transform="rotate(-45 0 107.48)" fill="white" />
        </svg>
        <div class="relative pt-10 px-10 flex items-center justify-center">
            <img class="relative w-40" src="{{ $product['img'] }}" alt="">
        </div>
        <div class="relative text-white px-6 pb-6 mt-6">
      <!--      <span class="block opacity-75 -mb-1">Outdoor</span> -->
            <div class="flex justify-between">
                <span class="block text-blue-600 font-semibold text-base my-1"> {{ $product['name'] }}  </span>
            </div>
            <div class="flex justify-between mt-2">
              <a href='/item/{{ $product['id'] }}' class="text-blue-800 font-bold cursor:pointer text-white text-base rounded inline-flex items-center">
                  <span class="captalize">
                      <i class="w-4 h-4 mr-2 fas fa-shopping-cart"></i>  Buy </span>
              </a>
              <span class="block bg-blue-800 rounded-full text-white text-xs font-bold px-3 py-2 leading-none flex items-center"> {{ $product['price'] }} TND </span>
            </div>
        </div>
    </div>
</div>
