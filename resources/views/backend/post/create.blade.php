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
                   <form action="{{ route('client.post.store') }}" method="POST" enctype="multipart/form-data">
                       @csrf
                        <div class="mb-3">
                           <label for="">Enter Post Title</label>
                           <input type="text" name="title" class="form-control @error('title')
                              .is-invalid
                           @enderror">
                           @error('title')
                           <div class="text-danger">{{ $message }}</div>
                           @enderror
                        </div>

                        <div class="mb-3">
                            <label for="">Enter post category</label>
                             <select name="category[]" class="form-control select_two" multiple="multiple">
                                @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach   
                             </select>
                             @error('category')
                           <div class="text-danger">{{ $message }}</div>
                           @enderror
                        </div>

                        <div class="mb-3">
                           <label for="">Enter post status</label>
                            <select name="status" id="" class="form-control">
                               <option value="publish">publish</option>
                               <option value="unpublish">UnPublish</option>
                            </select>
                            @error('status')
                           <div class="text-danger">{{ $message }}</div>
                           @enderror
                        </div>

                        <div class="mb-3">
                            <label for="">Enter Post body</label>
                            <input type="text" name="body" class="form-control">
                            @error('body')
                           <div class="text-danger">{{ $message }}</div>
                           @enderror
                         </div>

                        <div class="mb-3">
                           <label for="">Enter Thumbnail</label>
                           <input type="file" name="thumbnail" class="form-control">
                           @error('thumbnail')
                           <div class="text-danger">{{ $message }}</div>
                           @enderror
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary">Post</button>
                   </form>
               </div>
             </div>
       </div>

 
     </div>
</div>
     
@endsection

@section('footer_js')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
   $(document).ready(function() {
    $('.select_two').select2();
});
</script>
@endsection

@section('single_css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection