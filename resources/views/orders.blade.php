@extends('layout.basic')

@section('main')
<div class="h-full" style="background: #edf2f7;">
    <!-- Display Container (not part of component) START -->
    <div class="bg-gray-200 h-full flex-col " style="background: #edf2f7;">

        <!-- Carousel Body -->
        @include('layout.authnav')

        <div class="p-5" style="background: #edf2f7;">
            <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
              <div class="flex-col align-center">
                  <h1 class="text-blue-800 font-bold text-lg"> Users orders </h1>
                  <hr class="mt-2 w-1/3 mb-10">
              </div>
                <table class="table-fixed w-full">
                    <thead>
                        <tr class="uppercase">
                          <th class="w-1/6 text-xs text-blue-800 px-4 py-2"> status </th>
                            <th class="w-1/6 text-xs text-blue-800 px-4 py-2"> id </th>
                            <th class="w-1/3 text-xs text-blue-800 px-4 py-2"> User </th>
                            <th class="w-1/3 text-xs text-blue-800 px-4 py-2"> Product</th>
                            <th class="w-1/6 text-xs text-blue-800 px-4 py-2"> qty </th>
                            <th class="w-1/4 text-xs text-blue-800 px-4 py-2"> revenue</th>
                            <th class="w-1/6 text-xs text-blue-800 px-4 py-2">Actions </th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ( count($orders) == 0 )
                        <tr>
                            <td class='border px-4 py-4 text-center italic' colspan=6> you don't have any orders for now </td>
                        </tr>
                        @else

                        @foreach ($orders as $order )
                        <tr>
                            <td class="text-center border px-4 py-2 italic {{ $order['confirmed'] ? 'text-green-600' : 'text-orange-400' }} "> <i class="{{ !$order['confirmed'] ? 'text-orange-500 fas fa-hourglass-end' : 'text-green-600 fas fa-check-circle' }} text-base mx-1"></i></td>
                            <td class="text-center border px-4 py-2"> {{ $order['id'] }}</td>
                            <td class="text-center border px-4 capitalize py-2">{{ $order['user_id'] }}</td>
                            <td class="text-center border px-4 capitalize py-2">{{ $order['product_id'] }}</td>
                            <td class="text-center border px-4 py-2"> {{ $order['qty'] }} </td>
                            <td class="text-center border px-4 py-2">{{ $order['revenue']}}</td>
                            <td class="text-center border px-4 py-2 flex justify-center">
                              @if ( $order['confirmed'] == 0)
                                <a class="text-blue-600 text-base mx-1" href="/order/update/{{$order['id']}}">
                                    <i class="fas fa-check"></i> </a>
                                  <a class="text-red-600 text-base mx-1" href="/order/delete/{{$order['id']}}">
                                      <i class="fas fa-trash-alt"></i>
                                  </a>
                              @else
                                <a class="text-gray-400 text-base mx-1" href="/order/delete/{{$order['id']}}">
                                    <i class="fas fa-minus-circle"></i>
                                </a>
                              @endif

                            </td>
                        </tr>
                        @endforeach
                        @endif

                    </tbody>
                </table>
            </div>
            @include('layout.footer')
        </div>


    </div>
    <!-- Display Container (not part of component) END -->

</div>
@endsection
