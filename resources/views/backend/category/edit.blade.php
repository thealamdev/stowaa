@extends('layouts.dashboard')
@section('title','Category')

@section('pagecontent')
<div class="container">
   <div class="row">
       {{-- category table --}}
       <div class="col-lg-5">
           <div class="card mt-4 m-auto" style="width: 40rem;">      
                <h3 class="text-center">Category Select</h3>   
               <div class="card-body">
                @foreach ($categories as $category)
                   <form action="{{ route('dashboard.category.update',$category->id) }}" method="POST" enctype="multipart/form-data">
                       @csrf
                       @method('PUT')
                        <div class="mb-3">
                           <label for="">Enter Category Name</label>
                           <input type="text" name="name" class="form-control" value="{{$category->name}}">
                        </div>

                        <div class="mb-3">
                           <label for="">Enter Category Parent</label>
                            <select name="parent_id" id="" class="form-control">
                               <option value="" selected disabled>Select Parent Category</option>
                              @foreach ($categories as $category)
                              <option value="{{ $category->id }}">{{ $category->name }} </option>
                              @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                           <label for="">Enter Image</label>
                           <input type="file" name="photo" class="form-control">
                           <img src="{{ asset("storage/uploads/category/".$category->image) }}" alt="$category->photo" style="width:100px" class="py-3">
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary">Update</button>
                   </form>
                 @endforeach
               </div>
             </div>
       </div>
     </div>
</div>
     
@endsection