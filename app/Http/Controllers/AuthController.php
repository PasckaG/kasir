<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    //
     public function index(){
         return view('index');
     }
     public function cek_login(Request $request){
  $request->validate([
          'email' =>'required',
          'Password' =>'required',
     ]);
       $data = [
           'email' => $request->email,
          'Password' => $request->password
      ];
      if (Auth::attempt($data)){
      return redirect('home')->with ('success','berhasil login');
 }else{
      return redirect()->route('index')->with('failed','email atau password salah');
     }
      }
   
     public function Logout()
      {
         Auth::Logout();
return redirect('index');
      }
    }

