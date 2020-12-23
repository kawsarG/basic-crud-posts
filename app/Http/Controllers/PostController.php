<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function AllPosts(){
        return 'yup posts';
    }
    public function store(Request $request){
        $validated = $request->validate([
            'title' => 'required|unique:posts|max:255',
            'author' => 'required | min:3',
            'tags' => 'required | min:3',
            'description' => 'required',
        ]);


        $post= new Post;
        $post->title=$request->title;
        $post->auth=$request->author;
        $post->tag=$request->tags;
        $post->description=$request->description;


        $post->save();

        if($post->save()){
            $notification = array(
                'message'=>'Post added succesfully',
                'alert-type'=>'success'
            );
            return redirect()->back()->with($notification);
        }else{
            return redirect()->back();
        }
    }
    public function delete($id){

        $post = Post::find($id);
        $delete= $post->delete();
        
        if($delete){
            $notification = array(
                'message'=>'Post deleted succesfully',
                'alert-type'=>'success'
            );
            return redirect()->back()->with($notification);
        }else{
            return redirect()->back();
        }
        
    }
    public function update(){
        
    }

}