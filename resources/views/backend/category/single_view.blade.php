@extends('layouts.dashboard')
@section('title', 'single view')
@section('pagecontent')
     
            <div class="row">
                <div class="col-lg-12">
                    <table class="table table-striped">
                         <thead>
                
                            <th>Category</th>
                            <th>Post Title</th>
                            <th>Post Deccription</th>
                            <th>Post Image</th>
                            <th>Action</th>
                         </thead>
                         @foreach ($categories as $category)
                         @foreach ($category->posts as $single)
                         <tr>
                            <td>{{$category->name }}</td>
                            <td>{{$single->title }}</td>
                            <td>{{$single->body }}</td>
                            <td>
                                <img src="{{ asset('storage/uploads/posts/' .$single->thumbnail)}}" alt="$single->thumbnail" width="50">
                            </td>
                            <td>
                                
                                <a href="{{ route('dashboard.category.edit',$category->id) }}" class="p_btn">Edit</a>
                            </td>
                         </tr>
                         
                      
                         @endforeach
                         @endforeach
                    </table>
                </div>
            </div>
      
@endsection