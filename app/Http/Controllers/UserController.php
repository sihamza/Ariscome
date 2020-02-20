<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException ;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $email =  $request->input('email') ;
        $password =  $request->input('password') ;
        $user = User::where('email',$email)->first() ;
        if ( $user && ( $user->password == $password ) ) {
          Auth::login($user);
          if ( $user->admin ) {
            return redirect('/dashboard');
          } else {
            return redirect('/home');
          }
        }
        $credError = " you're credentials are incorrect !! " ;
        return back()->with('credError' , $credError );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function logout()
    {
        Auth::logout();
        return redirect('/') ;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $new_user = new User ;
      try {
      $new_user->fill([
        'nom' => $request->input('nom') ,
        'prenom' => $request->input('prenom') ,
        'email' => $request->input('email')  ,
        'password' => $request->input('password') ,
        'adresse' => $request->input('adresse') ,
        'zip' => $request->input('zip') ,
        'admin' => strcmp($request->input('email'),"hamzus007jouini@gmail.co") ? 1 : 0
        ]) ;
       $new_user->save(); }
       catch (QueryException $e){
           $emailExist = 'Email already exists !! Please try another .' ;
           return back()->with('emailExist' , $emailExist );
       }
       return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
      $users = User::where('admin', 0 )->get();
      $admins = User::where('admin', 1 )->get();
      $data = [ 'users' => $users , 'admins' => $admins ] ;
      return view('users')->with('data',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        if ($user) {
          $user->delete();
        }
        return back();
    }
}
