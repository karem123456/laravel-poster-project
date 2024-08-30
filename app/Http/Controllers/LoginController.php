<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Mail\VerifyEmail;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class LoginController extends Controller
{
    
    public function signin(){
        
        return view('login.signin');
    }

    public function signinStore(){
        
        $request = request()->validate([
            'name' => 'required|min:3|unique:users,name',
            'email' => 'required|email',
            'password' => 'required|min:5',
            'cpassword' => 'same:password',
            'image' => 'image|mimes:png,jpg,jpeg|max:2048'
        ]);
        
        $user = User::create([
            'name' => request()->name,
            'password' => request()->password,
            'email' => request()->email,
            'image' => request()->has('image') ? request()->image->store('images'):'images/default.jpeg'
        ]);

        Auth::login($user);
        
        event(new Registered($user));

        return redirect(route('verification.notice'));
    }
    

    public function login(){

        return view('login.login');
    }

    public function loginStore(){

        request()->validate([
            'name' => 'required|min:3',
            'password' => 'required|min:5'
        ]);

        $log = request()->only('name' , 'password');

        if(Auth::attempt($log)){

            return redirect()->intended(route('home'));
        }
        return redirect()->back()->withErrors('this accont not avalid')->withInput();
    }

    public function logout(){

        
        auth()->logout();

        return view('login.login');
    }

    public function forgetPass(){

        request()->validate([
            'email' => 'required|email|exists:users'
        ]);

        $token = str()->random(69);

        DB::table('password_reset_tokens')->insert([
            'email' => request()->email,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);

        Mail::send('Mail.ressetpass',['token' => $token] , function($massege){

            $massege->to(request()->email);
            $massege->subject('poster');
        });

        return redirect(route('forgetpass'))->with('success' , 'I have send massege to your email');
    }

    public function ressetPass(){

        
        request()->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required|string|min:5',
            'cpassword' => 'same:password'
        ]);

        $updatepassword = DB::table('password_reset_tokens')->where('email' , request()->email)->first();

        if(!$updatepassword){

            return redirect(route('ressetpass'))->withErrors('this email invalid');
        }

        User::where('email' , request()->email)->first()->update(['password' => request()->password]);

        DB::table('password_reset_tokens')->where('email' , request()->email)->delete();

        $user = User::where('email' , request()->email)->first();

        auth()->login($user);

        return redirect(route('home'));
    }

}
