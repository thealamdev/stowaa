@extends('layouts.frontend')
@section('FrontendContent')
    <div class="blog-content">
        @foreach ($posts as $post)
            
        <div class="post format-standard-image">
            <div class="entry-media">
                <img src="{{ asset('storage/uploads/posts/' .$post->thumbnail) }}" alt="{{ $post->title }}">

                    @foreach ($post->category as $category_name)
                    <button> {{ $category_name->name }}</button>
                    @endforeach
                 
            </div>
            <div class="entry-details">
               
                <div class="author">By: <a href="#">{{ $post->user->fname .' ' . $post->user->lname}}</a></div>
                <h3><a href="#">{{ $post->title }}</a></h3>
                <div class="entry-meta">
                    <ul>
                        <li><a href="#">5 Mins Read</a></li>
                        <li><a href="#">{{ $post->created_at->format('d M y') }}</a></li>
                    </ul>
                </div>
                <p>{{ Str::limit($post->body, 20, '...') }}</p>
                
                    {{-- {{ $post->category->pluck('slug')->first() }} --}}
                
                <a href="{{ route('frontend.singleview',["category_slug"=> $post->category->pluck('slug')->first(), "slug"=> $post->slug]) }}" class="read-more">Read More <i class="fal fa-long-arrow-right"></i></a>
            </div>
        </div>

        @endforeach
        {{  $posts->links() }}
         
        <div class="pagination-wrapper pagination-wrapper-left">
            <ul class="pg-pagination">
                <li>
                    <a href="#" aria-label="Previous">
                        <i class="fal fa-long-arrow-left"></i>
                    </a>
                </li>
                <li class="active"><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#" aria-label="Next"><i class="fal fa-long-arrow-right"></i></a></li>
            </ul>
        </div>
    </div>
@endsection
