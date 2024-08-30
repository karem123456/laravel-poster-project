<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
        public function home(){

            $posts = Post::orderBy('created_at' , 'desc')->get();
            
            return view('home' ,['posts' => $posts]);
        }
        
        public function search(){
            $search = request()->search;
            
            $posts = Post::where('title' , $search)->orderBy('created_at' , 'desc')->get();
            
            return view('home' ,['posts' => $posts]);
        }

        public function postsStore(){

            request()->validate([
                'title' => 'required|min:3',
                'content' => 'required|min:5',
                'category' => 'required',
                'image' => 'image|mimes:jpg,jpeg,png',
            ]);

            Post::create([
                'user_id' => auth()->user()->id,
                'title' => request()->title,
                'content' => request()->content,
                'category' => request()->category,
                'image' => request()->has('image') ? request()->image->store('images'): null,
            ]);

            return redirect(route('home'));
        }
    
    public function edit($postid){

        $post = Post::find($postid);
        return view('posts.edit' ,['post' => $post]);
    }
    public function update($postid){
        
        request()->validate([
            'title' => 'required|min:3',
            'content' => 'required|min:5',
            'category' => 'required|exists:posts,category',
            'image' => 'image|mimes:jpg,jpeg,png',
        ]);
        
        $post = Post::find($postid);
        $post->update([
            'title' => request()->title,
            'content' => request()->content,
            'category' => request()->category,
            'image' => request()->image,
        ]);
        return redirect(route('profile'));
    }
    public function delete($postid){

        $post = Post::find($postid);
        $post->delete();
        return redirect()->back();
    }
    public function view($postid){

        $post = Post::find($postid);

        $comments = Comment::where('post_id' , $postid)->orderBy('id' , 'desc')->get();

        return view('posts.show' , ['post' => $post , 'comments' => $comments]);
    }
    public function createComment($postid){

        request()->validate([
            'text' => 'required|min:1'
        ]);

        Comment::create([
            'user_id' => auth()->user()->id,
            'post_id' => $postid,
            'text' => request()->text,
        ]);

        return redirect()->back();
    }

    public function categories($category){

        if($category == "all"){

            return redirect(route('home'));
        }

        $posts = Post::where('category' , $category)->orderBy('created_at' , 'desc')->get();    

        return view('home' , ['posts' => $posts]);
    }
}
