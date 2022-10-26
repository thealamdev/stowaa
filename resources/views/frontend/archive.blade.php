<!doctype html>
<html lang="en">


<!-- Mirrored from products.wp-ts.com/stowaa/html/blog.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 05 Sep 2022 06:54:07 GMT -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>{{ config('app.name') }}</title>
    {{-- <link rel="shortcut icon" href="assets/images/logo/favourite_icon_1.png"> --}}

    <!-- fraimwork - css include -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/css/bootstrap.min.css') }}">

    <!-- icon font - css include -->
    <link rel="stylesheet" type="text/css" href=" {{asset('assets/frontend/css/fontawesome.css')}}">
    <link rel="stylesheet" type="text/css" href=" {{asset('assets/frontend/css/stroke-gap-icons.css')}}">
    <link rel="stylesheet" type="text/css" href=" {{asset('assets/frontend/css/icofont.css')}}">

    <!-- animation - css include -->
    <link rel="stylesheet" type="text/css" href=" {{asset('assets/frontend/css/animate.css')}}">

    <!-- carousel - css include -->
    <link rel="stylesheet" type="text/css" href=" {{asset('assets/frontend/css/slick.css')}}">
    <link rel="stylesheet" type="text/css" href=" {{asset('assets/frontend/css/slick-theme.css')}}">
    <link rel="stylesheet" type="text/css" href=" {{asset('assets/frontend/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" type="text/css" href=" {{asset('assets/frontend/css/owl.theme.default.min.css')}}">

    <!-- popup - css include -->
    <link rel="stylesheet" type="text/css" href=" {{asset('assets/frontend/css/magnific-popup.css')}}">
    <link rel="stylesheet" type="text/css" href=" {{asset('assets/frontend/css/jquery.fancybox.css')}}">

    <!-- jquery-ui - css include -->
    <link rel="stylesheet" type="text/css" href=" {{asset('assets/frontend/css/jquery-ui.css')}}">

    <!-- select option - css include -->
    <link rel="stylesheet" type="text/css" href=" {{asset('assets/frontend/css/nice-select.css')}}">

    <!-- custom - css include -->
    <link rel="stylesheet" type="text/css" href=" {{asset('assets/frontend/css/style.css')}}">
</head>


<body>

    <!-- body_wrap - start -->
    <div class="body_wrap">

        <!-- backtotop - start -->
        <div class="backtotop">
            <a href="#" class="scroll">
                <i class="far fa-arrow-up"></i>
            </a>
        </div>
        <!-- backtotop - end -->

        <!-- preloader - start -->
        <div id="preloader"></div>
        <!-- preloader - end -->
        @include('frontend.header')

        <main>
             
             
            <div class="row">
                
                 
                @foreach ($posts->posts as $post)
                <div class="col col-lg-4 content">
                    <div class="container">
                       <section class="blog-pg-section section_space">
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
                 
                  </section>
            
                </div>
         </div> 
         @endforeach 
        </div>
 
                  
        </main>
        <!-- main body - end
        ================================================== -->
            @include('frontend.footer')
    </div>
    <!-- body_wrap - end -->

    <!-- fraimwork - jquery include -->
    <script src="{{ asset('assets/frontend/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/jquery-plugins-collection.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/jquery-plugins-collection.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/gmaps.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/main.js') }}"></script>
 
    <!-- google map  -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDk2HrmqE4sWSei0XdKGbOMOHN3Mm2Bf-M&amp;ver=2.1.6"></script>
    <script src="assets/js/gmaps.min.js"></script>

</body>

<!-- Mirrored from products.wp-ts.com/stowaa/html/blog.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 05 Sep 2022 06:54:11 GMT -->
</html>