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
                <h1 class="text-blue-800 font-bold text-lg"> Admins </h1>
                <hr class="mt-2 w-1/3 mb-10">
            </div>
              <table class="table-fixed w-full">
                  <thead>
                      <tr class="uppercase">
                          <th class="w-1/3 text-xs text-blue-800 px-4 py-2"> id </th>
                          <th class="w-1/3 text-xs text-blue-800 px-4 py-2"> name </th>
                          <th class="w-1/3 text-xs text-blue-800 px-4 py-2"> email </th>
                      </tr>
                  </thead>
                  <tbody>
                    @if ( count($data['admins']) != 0 )
                      @foreach ( $data['admins'] as $admin )
                      <tr>
                          <td class="text-center border px-4 py-2"> {{ $admin['id'] }}</td>
                          <td class="text-center border px-4 capitalize py-2">{{ $admin['nom'] . ' ' .  $admin['prenom'] }}</td>
                          <td class="text-center border px-4 py-2">{{ $admin['email'] }} </td>
                      </tr>
                      @endforeach
                    @endif
                  </tbody>
              </table>
          </div>
            <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
              <div class="flex-col align-center">
                  <h1 class="text-blue-800 font-bold text-lg"> Users  </h1>
                  <hr class="mt-2 w-1/3 mb-10">
              </div>
                <table class="table-fixed w-full">
                    <thead>
                        <tr class="uppercase">
                            <th class="w-1/3 text-xs text-blue-800 px-4 py-2"> id </th>
                            <th class="w-1/3 text-xs text-blue-800 px-4 py-2"> name  </th>
                            <th class="w-1/3 text-xs text-blue-800 px-4 py-2"> adress </th>
                            <th class="w-1/3 text-xs text-blue-800 px-4 py-2"> email </th>
                            <th class="w-1/6 text-xs text-blue-800 px-4 py-2"> Actions </th>
                        </tr>
                    </thead>
                    <tbody>

                       @if ( count($data['users']) == 0 )
                        <tr>
                            <td class='border px-4 py-4 text-center italic' colspan=6> you don't have any users for now </td>
                        </tr>
                        @else

                        @foreach ($data['users'] as $user )
                        <tr>
                            <td class="text-center border px-4 py-2"> {{ $user['id'] }}</td>
                            <td class="text-center border px-4 capitalize py-2">{{ $user['nom'] . ' ' . $user['prenom'] }}</td>
                            <td class="text-center border px-4 capitalize py-2">{{ $user['adresse'] . ' , ' . $user['zip'] }}</td>
                            <td class="text-center border px-4  py-2">{{ $user['email'] }} </td>
                            <td class="text-center border px-4 py-2 flex justify-center">
                                <a class="text-red-600 text-base mx-1" href="/user/delete/{{$user['id']}}">
                                    <i class="fas fa-trash-alt"></i>
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
