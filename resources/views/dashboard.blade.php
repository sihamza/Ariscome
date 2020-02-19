@extends('layout.basic')

@section('main')
<div class="h-full" style="background: #edf2f7;">
    <!-- Display Container (not part of component) START -->
    <div class="bg-gray-200 h-full flex-col " style="background: #edf2f7;">

        <!-- Carousel Body -->
        @include('layout.authnav')

        <div class="p-5" style="background: #edf2f7;">
            <form method="post" action='/product/create' class="bg-white shadow-md  rounded px-8 pt-6 pb-8 mb-4 flex-col my-2">
                @csrf
                <div class="flex-col align-center">
                    <h1 class="text-blue-800 font-bold text-lg"> Add a product </h1>
                    <hr class="mt-2 w-1/3 mb-10">
                </div>
                <div class="-mx-3 md:flex mb-6">
                    <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                        <label class="block text-blue-800 uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-first-name">
                            Name
                        </label>
                        <input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3" id="grid-first-name" type="text" placeholder="Hikvision IR Bullet Camera" name="name" required>
                    </div>
                    <div class="md:w-1/4 px-3 mb-6 md:mb-0">
                        <label class="block text-blue-800 uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-first-name">
                            Price
                        </label>
                        <input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3" id="grid-first-name" type="number" min="0" max="2000" placeholder="300" name="price" required>
                    </div>
                    <div class="md:w-1/4 px-3">
                        <label class="block text-blue-800 uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-last-name">
                            Qty
                        </label>
                        <input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4" id="grid-last-name" type="number" min="0" max="500" placeholder="50" name="qty" required>
                    </div>
                </div>
                <div class="-mx-3 flex mb-6">
                    <div class="md:w-3/4 px-3">
                        <label class="block text-blue-800 uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-password">
                            Image
                        </label>
                        <input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4 mb-3" id="grid-password" type="text"
                          placeholder="https://images-na.ssl-images-amazon.com/images/I/718GaaGtRUL._SL1500_.jpg" name="img" required>
                        <p class="text-red-500 text-xs italic"> {{ session('emailExist') }} </p>
                        @php
                          Session::forget('emailExist');
                        @endphp
                    </div>
                </div>
                <div class="w-full flex flex-row-reverse">
                    <button type="submit" class="text-center text-green-600 font-bold p-2 text-sm rounded inline-flex items-center">
                        <span class="captalize">
                            <i class="w-4 h-4 mr-1 fas fa-plus-square"></i> Add Product </span>
                    </button>
                </div>
            </form>
            <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
              <div class="flex-col align-center">
                  <h1 class="text-blue-800 font-bold text-lg"> Users orders </h1>
                  <hr class="mt-2 w-1/3 mb-10">
              </div>
                <table class="table-fixed w-full">
                    <thead>
                        <tr class="uppercase">
                            <th class="w-1/6 text-xs text-blue-800 px-4 py-2">Id</th>
                            <th class="w-1/3 text-xs text-blue-800 px-4 py-2">name</th>
                            <th class="w-1/3 text-xs text-blue-800 px-4 py-2">price</th>
                            <th class="w-1/4 text-xs text-blue-800 px-4 py-2">qty</th>
                            <th class="w-1/6 text-xs text-blue-800 px-4 py-2">img</th>
                            <th class="w-1/6 text-xs text-blue-800 px-4 py-2">Actions </th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ( count($products) == 0 )
                        <tr>
                            <td class='border px-4 py-4 text-center italic' colspan=6> you don't have any products for now </td>
                        </tr>
                        @else

                        @foreach ($products as $product )
                        <tr>
                            <td class="text-center border px-4 py-2"> {{ $product['id'] }}</td>
                            <td class="text-center border px-4 capitalize py-2">{{ $product['name'] }}</td>
                            <td class="text-center border px-4 capitalize py-2">{{ $product['price'] }}</td>
                            <td class="text-center border px-4 py-2"> {{ $product['qty'] }} </td>
                            <td class="text-center border px-4 py-2"> <a href='{{ $product['img'] }}' class="my-2 text-blue-600 cursor:pointer text-white text-base rounded inline-flex items-center">
                                <span class="captalize">
                                    <i class="w-4 h-4 mr-2 fas fa-lg fa-image"></i> </span>
                            </a></td>
                            <td class="text-center border px-4 py-2 ">
                                <a class="text-red-600 text-base mx-1" href="/product/delete/{{$product['id']}}">
                                    <i class="fas fa-trash-alt"></i>
                                </a>
                                <a class="text-orange-500 text-base mx-1" href="/product/update/{{$product['id']}}">
                                    <i class="fas fa-user-edit"></i>
                                </a>
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
