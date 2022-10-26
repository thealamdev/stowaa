<?php

namespace App\Http\Controllers\Backend;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::with('category')->orderBy('id','DESC')->get();
        return view('backend.post.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::select('id','name')->get();
        return view('backend.post.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required|max:255',
            'category'=>'required',
            'body'=> 'required|max:250',
            'status'=>'required',
            'thumbnail'=> 'required|image|mimes:jpg,jpeg,png|max:10000',
        ],
        $message=[
            'title.required' => 'Enter a post title',
            'category.required' => 'Enter a Post Category',
            'body.required' => 'Enter a Post body',
            'status.required' => 'Enter a Post Status',
            'thumbnail.required' => 'Enter a Post Thumbmail',
            'thumbnail.image' =>'Please Enter an Image',
            'thumbnail.mimis' =>'Please Enter proper image type',
        ]
    );

       
        $post_image = $request->file("thumbnail");
         
        if($post_image){
            $image_name = $request->title . time(). '.' . $post_image->getClientOriginalExtension();
            $post_image->move(public_path('storage/uploads/posts') ,$image_name);
        }

         $posts = new Post();
         $posts->title = $request->title;
         $posts->user_id = Auth::user()->id;
        //  $posts->category_id = $request->category;
         $posts->slug =  Str::slug($request->title);
         $posts->body = $request->body;
         $posts->status =  $request->status;
         $posts->thumbnail = $image_name;
         $posts->save();
         $posts->category()->attach($request->category);

        return redirect(route('client.post.index'))->with('success','Post Inserted Successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return back()->with('success','Delete Successfully');
    }


}
