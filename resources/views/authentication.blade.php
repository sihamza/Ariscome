@extends('layout.basic')

@section('main')
<div class="h-screen" style="background: #edf2f7;">
    <!-- Display Container (not part of component) START -->
    <div class="bg-gray-200 h-full" style="background: #edf2f7;">

        <!-- Carousel Body -->
        <div class="relative block md:flex items-center bg-white shadow-md">
            <div class="relative w-full md:w-1/3 h-full overflow-hidden " style="min-height: 4rem;">
                <img class="absolute inset-0 w-full h-full object-cover object-center" src="https://ak0.picdn.net/shutterstock/videos/28318900/thumb/11.jpg" alt="">
                <div class="absolute inset-0 w-full h-full bg-blue-900 opacity-75"></div>
                <div class="absolute inset-0 w-full h-full flex items-center justify-center fill-current text-white">
                    <h1 class="prime-font text-lg"> Ariscome </h1>
                </div>
            </div>
            <div class="w-full md:w-full h-full bg-white rounded-lg">
                <svg class="hidden md:block absolute inset-y-0 h-full w-24 fill-current text-gray-300 -ml-12" viewBox="0 0 100 100" preserveAspectRatio="none">
                    <polygon points="50,0 100,0 50,100 0,100" />
                </svg>
                <a href='./' class="mx-5 float-right text-blue-800 cursor:pointer text-white font-bold text-xs py-2 px-4 rounded inline-flex items-center">
                    <span class="captalize"> Home
                        <i class="w-4 h-4 ml-1 fas fa-home"></i> </span>
                </a>
            </div>
        </div>

        <!-- Carousel Tabs -->
        <div class="flex items-center pt-5 justify-between">

        </div>
        <div class="h-full" style="background: #edf2f7;">
            <div class="px-5 flex">
                <form method="post" action="./register" class="bg-white shadow-md m-2 w-1/2 rounded px-8 pt-6 pb-8 mb-4 flex-col my-2">
                    @csrf
                    <div class="flex-col align-center">
                        <h1 class="text-blue-800 font-bold text-lg"> Join us now </h1>
                        <hr class="mt-2 w-1/3 mb-10">
                    </div>
                    <div class="-mx-3 md:flex mb-6">
                        <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                            <label class="block text-blue-800 uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-first-name">
                                First Name
                            </label>
                            <input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3" id="grid-first-name" type="text" placeholder="Jane" name="nom" required>
                        </div>
                        <div class="md:w-1/2 px-3">
                            <label class="block text-blue-800 uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-last-name">
                                Last Name
                            </label>
                            <input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4" id="grid-last-name" type="text" placeholder="Doe" name="prenom" required>
                        </div>
                    </div>
                    <div class="-mx-3 md:flex mb-6">
                        <div class="md:w-full px-3">
                            <label class="block text-blue-800 uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-password">
                                Email
                            </label>
                            <input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4 mb-3" id="grid-password" type="email" placeholder="ex@mail.com" name="email" required>
                            <p class="text-red-500 text-xs italic"> {{ session('emailExist') }} </p>
                            @php
                            Session::forget('emailExist');
                            @endphp
                        </div>
                    </div>
                    <div class="-mx-3 md:flex mb-6">
                        <div class="md:w-full px-3">
                            <label class="block text-blue-800 uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-password">
                                Password
                            </label>
                            <input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4 mb-3" id="grid-password" type="password" placeholder="******************" name="password" required>
                            <p class="text-blue-500 text-xs italic">Make it as long and as crazy as you'd like</p>
                        </div>
                    </div>
                    <div class="-mx-3 md:flex mb-2">
                        <div class="md:w-3/4 px-3 mb-6 md:mb-0">
                            <label class="block uppercase tracking-wide text-blue-800 text-xs font-bold mb-2" for="grid-city">
                                City
                            </label>
                            <input class="appearance-none block w-full bg-grey-lighter text-blue-800 border border-grey-lighter rounded py-3 px-4" id="grid-city" type="text" placeholder="Albuquerque" name="adresse" required>
                        </div>
                        <div class="md:w-1/3 px-3">
                            <label class="block uppercase tracking-wide text-blue-800 text-xs font-bold mb-2" for="grid-zip">
                                Zip
                            </label>
                            <input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4" id="grid-zip" type="text" placeholder="90210" name="zip" required>
                        </div>
                    </div>
                    <button type="submit" class="bg-blue-800 mt-3 float-right hover:bg-blue-600 text-white font-bold text-xs py-2 px-4 rounded inline-flex items-center">
                        <span class="captalize">
                            <i class="w-4 h-4 mr-1 fas fa-user-plus"></i> Register </span>
                    </button>
                </form>
                <form method="post" action="./login" class="bg-white shadow-md rounded h-full m-2 w-1/2 px-8 pt-6 pb-8 mb-4 flex-col my-2">
                    @csrf
                    <div class="flex-col align-center">
                        <h1 class="text-blue-800 font-bold text-lg"> Log in </h1>
                        <hr class="mt-2 w-1/4 mb-10">
                    </div>
                    <div class="-mx-3 md:flex mb-6">
                        <div class="md:w-full px-3">
                            <label class="block text-blue-800 uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-password">
                                Email
                            </label>
                            <input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4 mb-3" id="grid-password" type="email" placeholder="ex@mail.com" name="email" required>
                            <p class="text-red-500 text-xs italic"> {{ session('credError') }} </p>
                            @php
                            Session::forget('credError');
                            @endphp
                        </div>
                    </div>
                    <div class="-mx-3 md:flex mb-6">
                        <div class="md:w-full px-3">
                            <label class="block text-blue-800 uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-password">
                                Password
                            </label>
                            <input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4 mb-3" id="grid-password" type="password" placeholder="******************" name="password" required>
                            <a href="#">
                                <p class="text-blue-500 text-xs italic"> Did you forget your password ?</p>
                            </a>
                        </div>
                    </div>
                    <button type="submit" class="bg-blue-800 float-right hover:bg-blue-600 text-white font-bold text-xs py-2 px-4 rounded inline-flex items-center">
                        <span class="captalize">
                            <i class="w-4 h-4 mr-1 fas fa-sign-in-alt"></i> Connect </span>
                    </button>
                </form>
            </div>
            @include('layout.footer')

        </div>
    </div>
    <!-- Display Container (not part of component) END -->

</div>
@endsection
