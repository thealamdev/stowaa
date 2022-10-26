@extends('layouts.frontend')
@section('breadCrunb')
@include('frontend.breadcrumb')
@endsection
@section('FrontendContent')

<div class="blog-content">
    @foreach ($posts as $post)
        
    
    <div class="post format-standard-image">
        <div class="entry-media">
            <img src="{{ asset('storage/uploads/posts/' .$post->thumbnail) }}" alt="{{ $post->title }}">
            @foreach ($post->category as $single_category)
            <button>{{ $single_category->name }}</button>
            @endforeach
             
        </div>
        <div class="entry-details">
            <div class="author">By: <a href="#">{{ $post->user->fname . ' '. $post->user->lname }}</a></div>
            <h2>{{ $post->title }}</h2>
            <div class="entry-meta">
                <ul>
                    <li><a href="#">5 Mins Read</a></li>
                    <li><a href="#">{{ $post->created_at->format('d M y') }}</a></li>
                </ul>
            </div>
        </div>

        {!! $post->body !!}
    </div>
   
 @endforeach
  
 </div> 
 @endsection
 