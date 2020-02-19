@extends('layout.basic')

@section('main')
<div class="h-full" style="background: #edf2f7;">
    <!-- Display Container (not part of component) START -->
    <div class="bg-gray-200 h-full flex-col " style="background: #edf2f7;">
        @include('layout.authnav')
        <div class="p-5 flex flex-row justify-center">
          <div class="p2 w-1/2 rounded-lg bg-white shadow-md ">
              <div class="flex-col align-center w-full p-5 pb-0 ml-5">
                  <h1 class="text-blue-800 font-bold text-lg"> Check our products </h1>
                  <hr class="mt-2 w-1/3 ">
              </div>
              <div class="flex flex-wrap">
                <div class="p-5 w-1/2">
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
                        </div>
                    </div>
                </div>
                <div class="p-5 w-1/2">
                  <form method="post" action="/item/buy" >
                    @csrf
                  <div class="flex justify-between m-6">
                      <input type="number" name="id" value="{{ $product['id'] }}" hidden>
                      <span class="my-1" > Name : </span> <span class="block text-blue-600 font-semibold text-base my-1"> {{ $product['name'] }}  </span>
                  </div>
                  <div class="flex justify-between m-6">
                      <span class="my-1" > Price : </span> <span class="block text-blue-600 font-semibold text-base my-1"> {{ $product['price'] }} TND  </span>
                  </div>
                  <div class="flex justify-between m-6">
                      <span class="my-1" > Qty : </span> <span class="block text-blue-600 font-semibold text-base my-1"> <input type="number" min=1 max={{ $product['qty']}} value="1" name="qty" class="text-right">  </span>
                  </div>
                  <div class="flex justify-between m-6">
                      <span class="my-1" > <a href='/home' class="text-red-600 font-bold cursor:pointer text-white text-base rounded inline-flex items-center">
                          <span class="captalize">
                              <i class="w-4 h-4 mr-2 fas fa-backspace"></i>  Cancel </span>
                      </a> </span> <span class="block text-blue-600 font-semibold text-base my-1"> <button type="submit" class="text-blue-800 font-bold cursor:pointer text-white text-base rounded inline-flex items-center">
                          <span class="captalize">
                              <i class="w-4 h-4 mr-2 fas fa-shopping-cart"></i>  Buy </span>
                      </button> </span>
                  </div>
                </form>
                </div>
              </div>
          </div>
        </div>
        @include('layout.footer')
    </div>
  </div>
</div>
@endsection
