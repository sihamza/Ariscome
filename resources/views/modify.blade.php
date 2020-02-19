@extends('layout.basic')

@section('main')
<div class="h-full" style="background: #edf2f7;">
    <!-- Display Container (not part of component) START -->
    <div class="bg-gray-200 h-full flex-col " style="background: #edf2f7;">

        <!-- Carousel Body -->
        @include('layout.authnav')

        <div class="p-5" style="background: #edf2f7;">
            <form method="post" action='/product/edit/' class="bg-white shadow-md  rounded px-8 pt-6 pb-8 mb-4 flex-col my-2">
                @csrf
                <div class="flex-col align-center">
                    <input type="number" name="id" value="{{$product['id']}}" hidden>
                    <h1 class="text-blue-800 font-bold text-lg"> modify a product </h1>
                    <hr class="mt-2 w-1/3 mb-10">
                </div>
                <div class="-mx-3 md:flex mb-6">
                    <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                        <label class="block text-blue-800 uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-first-name">
                            Name
                        </label>
                        <input value="{{ $product['name'] }}" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3" id="grid-first-name" type="text" placeholder="Hikvision IR Bullet Camera"
                          name="name" required>
                    </div>
                    <div class="md:w-1/4 px-3 mb-6 md:mb-0">
                        <label class="block text-blue-800 uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-first-name">
                            Price
                        </label>
                        <input value="{{ $product['price'] }}" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3" id="grid-first-name" type="number" min="0" max="2000" placeholder="300"
                          name="price" required>
                    </div>
                    <div class="md:w-1/4 px-3">
                        <label class="block text-blue-800 uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-last-name">
                            Qty
                        </label>
                        <input value="{{ $product['qty'] }}" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4" id="grid-last-name" type="number" min="0" max="500" placeholder="50"
                          name="qty" required>
                    </div>
                </div>
                <div class="-mx-3 flex mb-6">
                    <div class="md:w-3/4 px-3">
                        <label class="block text-blue-800 uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-password">
                            Image
                        </label>
                        <input value="{{ $product['img'] }}" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4 mb-3" id="grid-password" type="text"
                          placeholder="https://images-na.ssl-images-amazon.com/images/I/718GaaGtRUL._SL1500_.jpg" name="img" required>
                        <p class="text-red-500 text-xs italic"> {{ session('emailExist') }} </p>
                        @php
                        Session::forget('emailExist');
                        @endphp
                    </div>
                </div>
                <div class="w-full flex flex-row-reverse">
                    <button type="submit" class="text-center text-orange-500 font-bold p-2 text-sm rounded inline-flex items-center">
                        <span class="captalize">
                            <i class="w-4 h-4 mr-1 fas fa-edit"></i> Modify Product </span>
                    </button>
                </div>
            </form>
            <p class="text-center text-gray-500 text-xs">
                Ariscome - &copy; 2020
            </p>
        </div>


    </div>
    <!-- Display Container (not part of component) END -->

</div>
@endsection
