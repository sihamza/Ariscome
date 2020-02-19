<div class="relative block md:flex items-center bg-white shadow-md">
    <div class="relative w-full md:w-1/3 h-full overflow-hidden " style="min-height: 4rem;">
        <img class="absolute inset-0 w-full h-full object-cover object-center" src="https://ak0.picdn.net/shutterstock/videos/28318900/thumb/11.jpg" alt="">
        <div class="absolute inset-0 w-full h-full bg-blue-900 opacity-75"></div>
        <div class="absolute inset-0 w-full h-full flex items-center justify-center fill-current text-white">
            <h1 class="prime-font text-lg"> Ariscome </h1>
        </div>
    </div>
    <div class="w-full  md:w-full h-full bg-white rounded-lg">
        <svg class="hidden md:block absolute inset-y-0 h-full w-24 fill-current text-gray-300 -ml-12" viewBox="0 0 100 100" preserveAspectRatio="none">
            <polygon points="50,0 100,0 50,100 0,100" />
        </svg>
        <div class="flex flex-row-reverse">
            <a href='/logout' class="mx-5 text-red-600 cursor:pointer text-white font-bold text-xs py-2 px-4 rounded inline-flex items-center">
                <span class="captalize"> Sign out
                    <i class="w-4 h-4 ml-1 fas fa-sign-out-alt"></i></span>
            </a>
            @if (Auth::user()->admin)
              <a class="mx-5 cursor:pointer text-white font-bold text-xs py-2 px-4 rounded inline-flex items-center {{ (request()->is('users')) ? 'text-blue-500' : 'text-blue-800' }}" href="/users" >
                  <span> <i class="w-4 h-4 ml-1 fas fa-users"></i> Users </span>
              </a><a class="mx-5  cursor:pointer text-white font-bold text-xs py-2 px-4 rounded inline-flex items-center {{ (request()->is('orders')) ? 'text-blue-500' : 'text-blue-800' }}" href="/orders">
                  <span> <i class="w-4 h-4 ml-1 fas fa-tags"></i> Orders </span>
              </a><a class="mx-5 cursor:pointer text-white font-bold text-xs py-2 px-4 rounded inline-flex items-center {{ (request()->is('dashboard')) ? 'text-blue-500' : 'text-blue-800' }}" href="/dashboard">
                  <span> <i class="w-4 h-4 ml-1 fas fa-layer-group"></i> Products </span>
              </a>
            @endif
            <!--<a class="text-gray-600 block focus:outline-none">
              Tab 4
          </a>   -->
        </div>

    </div>
</div>
