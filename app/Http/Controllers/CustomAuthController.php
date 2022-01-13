<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
class CustomAuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function registration()
    {
        return view('auth.registration');
    }
    public function registerUser(Request $request)
    {
      $request->validate([
          'full_name' => 'required',
          'email' => 'required|email|unique:users',
          'password' => 'required|min:5|max:12'
      ]);
      $user = new User();
      $user->full_name = $request->full_name;
      $user->email = $request->email;
      $user->password = Hash::make($request->password);
      $res = $user->save();
      if($res)
      {
          return back()->with('success','User Register ');
      }
      else{
          return back()->with('fail','something gone wrong');

      }
    }
    public function loginUser(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:5|max:12'
        ]);

        $user = User::where('email','=',$request->email)->first();
        if($user)
        {
            if(Hash::check($request->password,$user->password))
            {
                $request->session()->put('loginId',$user->id);
                return redirect('dashboard');

            }else{
                return back()->with('fail','password  not match');
            }
        }
        else
        {
            return back()->with('fail','This eamil not registered');
        }

  
    }

    public function dashboard()
    {
        $data = array();
        if(Session::has('loginId'))
        {
            $data = User::where('id', '=', Session::get('loginId'))->first();
        }
        
        return view('auth.dashboard',compact('data'));
    }

    public function logout()
    {
        if(Session::has('loginId'))
        {
            Session::pull('loginId');
            return redirect('login');
        }
    }
}
