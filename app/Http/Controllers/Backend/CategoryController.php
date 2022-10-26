<?php

namespace App\Http\Controllers\Backend;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::withCount('posts')->where('deleted_at', null)->get();
        $trashCategories = Category::withCount('posts')->onlyTrashed()->get();
        return view('backend.category.index', compact('categories', 'trashCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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
            'name' => 'required',
            'image' => 'image|mimes:jpg,jpeg,png',
        ]);
      $category_image = $request->file("photo");

      if($category_image){
        $image_name = $request->name.time(). '.' . $category_image->getClientOriginalExtension();
        $category_image->move(public_path('storage/uploads/category') ,$image_name);
      }
       
        $insert = new Category();
        $insert->name = $request->name;
        $insert->slug = Str::slug($request->name);
        $insert->parent_id = $request->parent_id;
        $insert->image = $image_name;
        $insert->save();

        return back();
     
         
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        $categories = Category::with('posts')->where('name',$category->name)->get();
        return view('Backend.Category.single_view',compact('categories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $categories = Category::with('posts')->withTrashed()->where('id',$category->id)->get();
        return view('Backend.Category.edit',compact('categories'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
         //delete extisting photo:
        $image_name = $category->image;

        $imagePath = public_path('storage/uploads/category/'.$image_name);
        if(file_exists($imagePath)){
            unlink($imagePath);
        }

        $category_image = $request->file("photo");

        if($category_image && $category_image->isValid()){
          $image_name = $request->name.time(). '.' . $category_image->getClientOriginalExtension();
  
          $category_image->move(public_path('storage/uploads/category') ,$image_name);
        }
        else{
            $image_name = $category->image;
        }

         
          $category->name = $request->name;
          $category->parent_id = $request->parent_id;
          $category->image = $image_name;
          $category->save();
        return redirect()->route('client.category.index')->with('success','Category update successfully');
           
    }

    public function restore($id){
        $data = Category::onlyTrashed()->find($id);
      
        $data->restore();
        return redirect()->route('client.category.index');
 
    }

    //Hard delete:
    public function hardDelete($id){
        $data = Category::onlyTrashed()->find($id);
        $image_name = $data->image;

        $imagePath = public_path('storage/uploads/category/'.$image_name);
        if(file_exists($imagePath)){
            unlink($imagePath);
        }

        $data->forceDelete();
        return redirect()->route('client.category.index');
 
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
     public function destroy(Category $category)
    {
        $category->delete();
        return back()->with('success','Delete successfully'); 
    }
}
