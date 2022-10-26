@extends('layouts.dashboard')
@section('title','Post')

@section('pagecontent')
<div class="container">
   <div class="row">
       {{-- category table --}}
       <div class="col-lg-5">
           <div class="card mt-4 m-auto" style="width: 40rem;">      
                <h3 class="text-center">Category Select</h3>   
               <div class="card-body">
                   <form action="" method="POST" enctype="multipart/form-data">
                       @csrf
                        <div class="mb-3">
                           <label for="">Enter Post Title</label>
                           <input type="text" name="title" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="">Enter post category</label>
                             <select name="category" id="" class="form-control">
                                <option value="">Category</option>
                             </select>
                        </div>

                        <div class="mb-3">
                           <label for="">Enter post status</label>
                            <select name="status" id="" class="form-control">
                               <option value="unpublish">Unpublish</option>
                               <option value="publish">Publish</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="">Enter Post body</label>
                            <input type="text" name="body" class="form-control">
                         </div>

                        <div class="mb-3">
                           <label for="">Enter Thumbnail</label>
                           <input type="file" name="photo" class="form-control">
                        </div>
                        <button type="submit" name="thumbnail" class="btn btn-primary">Post</button>
                   </form>
               </div>
             </div>
       </div>

 
     </div>
</div>
     
@endsection