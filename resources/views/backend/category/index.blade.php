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
                    <form action="{{ route('client.category.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                         <div class="mb-3">
                            <label for="">Enter Category Name</label>
                            <input type="text" name="name" class="form-control">
                         </div>

                         <div class="mb-3">
                            <label for="">Enter Category Parent</label>
                             <select name="parent_id" id="" class="form-control">
                                <option value="" selected disabled>Select Parent Category</option>
                                @foreach ($categories as $category)
                               <option value="{{ $category->id }}">{{ $category->name }}</option>
                               @endforeach
                                
                             </select>
                         </div>

                         <div class="mb-3">
                            <label for="">Enter Image</label>
                            <input type="file" name="photo" class="form-control">
                         </div>
                         <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
              </div>
        </div>


        {{-- category show --}}
         <div class="col-lg-8 mt-4">
            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                  <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Home</button>
                  <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Trashed</button>
                   
                </div>
            </nav>
              <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                    <h4>All Categories</h4>
                    <table class="table table-striped">
                        <thead>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Slug</th>
                            <th>Post Count</th>
                            <th>Actions</th>
                        </thead>
                        @foreach ($categories as $category)
                        <tr>
                            <td>
                                <img src="{{ asset("storage/uploads/category/".$category->image)}}" alt="" style="width:50px">
                            </td>
                            <td>
                               {{  $category->name; }}
                            </td>
                            <td>
                                {{ $category->slug; }}
                            </td>
                            <td>
                                {{ $category->posts_count }}
                            </td>
                            
                            <td>
                                <form action="{{ route('client.category.destroy', $category->id) }}" method="POST" class="d-inline">
                                    @method('DELETE')
                                    @csrf
                                    <button class="p_btn">Delete</button>
                                </form>
        
                                <a href="{{ route('client.category.edit', $category->id) }}" class="p_btn">Edit</a>
                                <a href="{{ route('client.category.show', $category->id) }}" class="p_btn">View</a>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                    <h4>All Categories</h4>
                    <table class="table table-striped">
                        <thead>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Slug</th>
                            <th>Post Count</th>
                            <th>Actions</th>
                        </thead>
                        @foreach ($trashCategories as $category)
                        <tr>
                            <td>
                                <img src="{{ asset("storage/uploads/category/".$category->image)}}" alt="" style="width:50px">
                            </td>
                            <td>
                               {{  $category->name; }}
                            </td>
                            <td>
                                {{ $category->slug; }}
                            </td>

                            <td>
                                {{ count($category->posts); }}
                            </td>
                            
                            <td>
                                <a href="{{ route('client.category.forceDelete',$category->id) }}" class="p_btn">Hard Delete</a>
                                <a href="{{ route('client.category.restore', $category->id) }}" class="p_btn">Restore</a>
                                <a href="{{ route('client.category.show', $category->id) }}" class="p_btn">View</a>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
                 
              </div>
        
         </div>
      </div>
 </div>
 @endsection