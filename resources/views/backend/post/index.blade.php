@extends('layouts.dashboard')
@section('title','post-index')

@section('pagecontent')

@if (session('success'))
      <div class="alert alert-success">
        {{ session('success') }}
      </div>
@endif

{{-- post table start --}}
<div class="row">
    <div class="col-lg-12">
        <table class="table table-striped">
            <thead>
                <th>Post Title</th>
                <th>Post Category</th>
                <th>Post Status</th>
                <th>Post Body</th>
                <th>Slug</th>
                <th>Create Time</th>
                <th>Thumbnail</th>
                <th>Actions</th>
            </thead>
            @foreach ($posts as $post)
            <tr>
                <td>
                    {{  $post->title }}
                </td>
                <td>
                    @foreach ($post->category as $category_name)
                       <span class="p_btn">  {{ $category_name->name }}</span>
                    @endforeach
                </td>

                <td>
                    {{ $post->status }}
                </td>
                <td>
                    {{ $post->body }}
                </td>

                <td>
                    {{ $post->slug }}
                </td>
                <td>{{ $post->created_at-> diffForHumans() }}</td>
                {{-- another time function: format('D M Y') --}}
                <td>
                    <img src="{{ asset("storage/uploads/posts/" .$post->thumbnail)}}" alt="" style="width:50px">
                </td>
                 
                <td>
                     <div class="btn_main">
                    <a href="" class="p_btn">Edit</a>
                    <form class="d-inline" action="{{ route('client.post.destroy',$post->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                    <button class="p_btn">Delete</button>
                    </form>
                    <a href="{{ route('client.category.restore', $post->id) }}" class="p_btn">Update</a>
                     </div>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</div>


{{-- post table end --}}
@endsection

 
