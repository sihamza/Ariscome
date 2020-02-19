@extends('layout.basic')

@section('main')
<div class="p-5 bg-gray-200" style="background: #edf2f7;">
    <!-- Display Container (not part of component) START -->
    <div class="relative rounded-lg block md:flex items-center mb-5 bg-white shadow-md" style="min-height: 4rem;">
        <div class="relative w-full  h-full overflow-hidden "  >
          <div class="flex flex-row float-left text-lg">
              <a class="mx-5 cursor:pointer text-white font-bold text-xs py-2 px-2 rounded inline-flex items-center {{ (request()->is('users')) ? 'text-blue-500' : 'text-blue-800' }}" href="/users" >
                  <span> <i class="w-4 h-4 ml-1 fab fa-2x fa-facebook-messenger"></i> </span>
              </a><a class="mx-5  cursor:pointer text-white font-bold text-xs py-2 px-2 rounded inline-flex items-center {{ (request()->is('orders')) ? 'text-blue-500' : 'text-blue-800' }}" href="/orders">
                  <span> <i class="w-4 h-4 ml-1 fab fa-2x fa-twitter"></i>  </span>
              </a><a class="mx-5 cursor:pointer text-white font-bold text-xs py-2 px-2 rounded inline-flex items-center {{ (request()->is('dashboard')) ? 'text-blue-500' : 'text-blue-800' }}" href="/dashboard">
                  <span> <i class="w-4 h-4 ml-1 fab fa-2x fa-instagram"></i>  </span>
              </a>
          </div>
        </div>
        <div class="w-full  md:w-full h-full bg-white rounded-lg">

            <div class="flex flex-row-reverse">
                <a href='./logout' class="mx-5 text-blue-600 cursor:pointer text-white font-bold text-xs py-2 px-4 rounded inline-flex items-center">
                    <span class="captalize"> Sign in
                        <i class="w-4 h-4 ml-1 fas fa-sign-out-alt"></i></span>
                </a>
                <!--<a class="text-gray-600 block focus:outline-none">
                  Tab 4
              </a>   -->
            </div>

        </div>
    </div>

    <div class="bg-gray-200 mb-5">

        <!-- Carousel Body -->
        <div class="relative rounded-lg block md:flex items-center bg-white shadow-md" style="min-height: 19rem;">
            <div class="relative w-full md:w-2/5 h-full overflow-hidden rounded-t-lg md:rounded-t-none md:rounded-l-lg" style="min-height: 19rem;">
                <img class="absolute inset-0 w-full h-full object-cover object-center" src="https://ak0.picdn.net/shutterstock/videos/28318900/thumb/11.jpg" alt="">
                <div class="absolute inset-0 w-full h-full bg-blue-900 opacity-75"></div>
                <div class="absolute inset-0 w-full h-full flex items-center justify-center fill-current text-white">
                  <h1 class="prime-font text-5xl"> Ariscome </h1>
                </div>
            </div>
            <div class="w-full md:w-3/5 h-full flex items-center bg-white rounded-lg">
                <div class="p-12 md:pr-24 md:pl-16 md:py-12">
                    <p class="text-gray-600"><span class="text-gray-900"> Ariscome </span> is a UK-based fashion retailer that has nearly doubled in size since last year. They integrated Stripe to deliver seamless checkout across mobile and web for
                        customers in 100+ countries, all while automatically combating fraud.</p>
                        <a href='./logout' class="my-2 text-green-500 cursor:pointer text-white text-base rounded inline-flex items-center">
                            <span class="captalize">
                                <i class="w-4 h-4 mr-2 fas fa-user-plus"></i>  Join us now </span>
                        </a>
                </div>
                <svg class="hidden md:block absolute inset-y-0 h-full w-24 fill-current text-white -ml-12" viewBox="0 0 100 100" preserveAspectRatio="none">
                    <polygon points="50,0 100,0 50,100 0,100" />
                </svg>
            </div>
        </div>

        <!-- Carousel Tabs -->

    </div>
    <div class="p2 rounded-lg block bg-white shadow-md ">
      <div class="flex-col align-center w-full p-5 pb-0 ml-5">
          <h1 class="text-blue-800 font-bold text-lg"> Check our products </h1>
          <hr class="mt-2 w-1/3">
      </div>
      <div class="flex flex-wrap">
        @if (count($products) == 0)
          <div class="w-full p-10">
            <h4 class="text-center italic text-gray-600"> we don't have any products right now . </h4>
          </div>
        @else
          @foreach($products as $product )
            @include('layout.product',$product)
          @endforeach
        @endif
    </div>
    </div>
    <!-- Display Container (not part of component) END -->
    @include('layout.footer')
</div>
@endsection
