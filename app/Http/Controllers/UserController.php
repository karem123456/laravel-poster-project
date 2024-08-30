<?php

namespace App\Http\Controllers;

use App\Mail\contact;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use PDO;

class UserController extends Controller
{


    public function profile(){

        $posts = Post::where('user_id' , auth()->user()->id)->get();
        return view('profiles.user' , ['posts' => $posts]);
    }

    public function update(){

        request()->validate([
            'name' => 'required|min:3 ',
            'password' => 'required|min:5',
            'cpassword' => 'required|same:password',
            'image' => 'image|mimes:jpeg,jpg,png',
        ]);

        $user = User::find(auth()->user()->id);

        $user->update([
            'name' => request()->name,
            'password' => request()->password,
            'image' => request()->has('image') ? request()->image->store('images'):'images/default.jpeg'
        ]);

        return redirect(route('profile'));
    }

    public function usersprofile($uesr_id){

        if(Auth::check()){
            if($uesr_id == auth()->user()->id){
                return redirect(route('profile'));
            }
        }
        
        
        $posts = Post::where('user_id' , $uesr_id)->get();
        $user = User::where('id' , $uesr_id)->first();
        return view('profiles.users' , ['user' => $user , 'posts' => $posts]);
    }
    
    public function contact(){

        request()->validate([
            'name' => 'required|min:2',
            'email' => 'required|email',
            'massege' => 'required|min:3',
        ]);

        Mail::to('lotfyk947@gmail.com')->send(new contact(request()->name,request()->email,request()->massege));
        return redirect(route('contact'));
    }
}
