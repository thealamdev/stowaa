<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;

class FrontendController extends Controller
{
    //index page view :
    public function index(){
        $posts = Post::with(['user','category'])->where('status','publish')->orderBy('id','desc')->paginate(4);

        $recent_posts = Post::where('status','publish')->select('id','created_at','title','body','thumbnail')->orderBy('created_at','desc')->limit(4)->get();

        $categories = Category::withCount('posts')->get();
        return view('frontend.index',compact('posts','recent_posts','categories'));
    }

   

    // single view page:
    public function singleView(Request $request){
        $recent_posts = Post::where('status','publish')->select('id','created_at','title','body','thumbnail')->orderBy('created_at','desc')->limit(4)->get();
        $categories = Category::where('slug',$request->slug)->withCount('posts')->get();
        $posts = Post::where('slug',$request->slug)->with('category')->get();
        return view('frontend.singleview',compact('posts','recent_posts','categories'));
    }

    public function singlePageView($slug,Request $request){
        $posts = Category::with('posts')->where('slug',$slug)->where('status',true)->firstOrFail();
        return view('frontend.archive',compact('posts'));
    }

   // search function:
   public function search(Request $request){
     return $request->search;
}
   
}
