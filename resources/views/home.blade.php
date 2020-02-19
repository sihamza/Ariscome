@extends('layout.basic')

@section('main')
<div class="h-full" style="background: #edf2f7;">
    <!-- Display Container (not part of component) START -->
    <div class="bg-gray-200 h-full flex-col " style="background: #edf2f7;">
        @include('layout.authnav')

        <div class="p-5 bg-gray-200" style="background: #edf2f7;">
          <div class="p2 rounded-lg block bg-white shadow-md mb-5" >
            <div class="flex-col align-center w-full p-5 pb-0 ml-5">
                <h1 class="text-blue-800 font-bold text-lg"> Your shopping cart </h1>
                <hr class="mt-2 w-1/3 ">
            </div>
            @if (count($data['orders']) == 0)
              <div class="w-full p-10">
                <h4 class="text-center italic text-gray-600"> you don't have any orders . buy some items </h4>
              </div>
            @else
              <div class="p-5">
                <div class="flex flex-wrap">

              @foreach($data['orders'] as $order )

                <div class="p-5 w-1/4">

                    <div class="flex-shrink-0 m-6 relative overflow-hidden {{ ($order['confirmed']) ? 'bg-green-300' : 'bg-orange-300' }} {{ ($order['qty'] > $order['product']->qty ) ? 'bg-red-300' : '' }} rounded-lg max-w-xs shadow-lg">
                        <svg class="absolute bottom-0 left-0 mb-8" viewBox="0 0 375 283" fill="white" style="transform: scale(1.5); opacity: 0.3;">
                            <rect x="159.52" y="175" width="152" height="152" rx="8" transform="rotate(-45 159.52 175)" fill="white" />
                            <rect y="107.48" width="152" height="152" rx="8" transform="rotate(-45 0 107.48)" fill="white" />
                        </svg>
                        <div class="relative flex justify-between p-4 pb-0">
                          @if ($order['confirmed'])
                            <span class="captalize text-white text-sm font-semibold">
                                <i class="w-4 h-4 mr-2 fas fa-coins"></i>  {{ $order['revenue'] }} TND  </span>

                          @else
                            <a href='/item/delete/{{ $order['id'] }}' class="text-white font-bold cursor:pointer text-white text-base rounded inline-flex items-center">
                                <span class="captalize">
                                <i class="w-4 h-4 mr-2 fas fa-times-circle"></i>   </span>
                            </a>
                          @endif
                              <span class="captalize text-white">
                                {{ $order['qty'] }}  <i class="w-4 h-4 mr-2 fas fa-shopping-cart"></i>   </span>
                        </div>
                        <div class="relative pt-10 px-10 flex items-center justify-center">
                            <img class="relative w-40" src="{{ $order['img'] }}" alt="">
                        </div>
                        <div class="relative text-white px-6 pb-6 mt-6">
                          <span class="block text-center font-bold "> {{ $order['product_id'] }} </span>
                        </div>
                    </div>
                </div>
            <!--      <tr>
                      <td class="text-center border px-4 py-2"> {{ $order['qty'] }} </td>
                      <td class="text-center border px-4 capitalize py-2">{{ $order['product_id'] }}</td>
                      <td class="text-center border px-4 py-2">{{ $order['revenue']}} TND </td>
                      <td class="text-center border px-4 py-2 italic {{ $order['confirmed'] ? 'text-green-600' : 'text-orange-400' }} "> <i class="{{ !$order['confirmed'] ? 'text-orange-500 fas fa-hourglass-end' : 'text-green-600 fas fa-check-circle' }} text-base mx-1"></i></td>
                      <td class="text-center border px-4 py-2">
                          <a class="text-red-600 text-base mx-1" href="/order/delete/{{$order['id']}}">
                              <i class="fas fa-trash-alt"></i>
                          </a>
                          </a>
                          <a class="text-orange-500 text-base mx-1" href="/order/update/{{$order['id']}}">
                              <i class="fas fa-user-edit"></i>
                      </td>
                  </tr> -->
              @endforeach
            </div>

            </div>
            @endif
          </div>
        <div class="p2 rounded-lg block bg-white shadow-md ">
            <div class="flex-col align-center w-full p-5 pb-0 ml-5">
                <h1 class="text-blue-800 font-bold text-lg"> Check our products </h1>
                <hr class="mt-2 w-1/3 ">
            </div>
            <div class="flex flex-wrap">
              @if (count($data['products']) == 0)
                <div class="w-full p-10">
                  <h4 class="text-center italic text-gray-600"> we don't have any products right now . </h4>
                </div>
              @else
                @foreach($data['products'] as $product )
                  @include('layout.product',$product)
                @endforeach
              @endif
            </div>
        </div>
        @include('layout.footer')
    </div>
  </div>
</div>
@endsection
