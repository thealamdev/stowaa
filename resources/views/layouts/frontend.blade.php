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
        @yield('breadCrunb')
        <!-- main body - start
        ================================================== -->
        <main>
            
            <!-- blog_section - start
            ================================================== -->
            <!-- start blog-pg-section -->
            <section class="blog-pg-section section_space">
                <div class="container">
                    <div class="row">
                        <div class="col col-lg-8 content">
                            @yield('FrontendContent')

                        </div>
                        <div class="col col-lg-4">
                            <div class="blog-sidebar-s2">
                                <div class="widget search-widget">
                                    <h3>Search</h3>
                                    <form action="{{ route('frontend.search.submit') }}" method="GET">
                                  
                                        <div>
                                            <input type="text" name="search" class="form-control" placeholder="Search Post..">
                                            <button type="submit" name="submit"><i class="ti-search"></i></button>
                                        </div>
                                    </form>
                                </div>
            
                                <div class="widget recent-post-widget">
                                    <h3>Recent post</h3>
                                    @foreach ($recent_posts as $recent_post)
                                    <div class="posts">
                                        <div class="post">
                                            <div class="img-holder"> 
                                                <img src="{{ asset('storage/uploads/posts/' .$recent_post->thumbnail) }}" alt="{{ $recent_post->thumbnail }}">
                                            </div>
                                            <div class="details">
                                                <span class="date">{{ $recent_post->created_at->diffForHumans() }}</span>
                                                <h4><a href="#">{{ $recent_post->title }}</a></h4>
                                            </div>
                                        </div>                                     
                                    </div>
                                    @endforeach
                                     
                                </div>
            
                                <div class="widget add-widget ">
                                    <h3>Post Categories</h3>
                                    @foreach ($categories as $category)
                                    <ul class="btn btn-primary">
                                        <li style="list-style: none"><a style="color:white" href="#">{{ $category->name . '  '. $category->posts_count }}</a></li>
                                    </ul> 
                                    @endforeach
                                    
                                </div>
                                <div class="widget add-widget">
                                    <h3>Advertise</h3>
                                    <div>
                                        <div class="img-holder">
                                            <img src="{{ asset('assets/frontend/images/blog/sidebar-add-bg.jpg') }}" alt="">
                                        </div>
                                        <div class="details">
                                            <h4>World among the stalks, and grow familiar with the countless indescribabl</h4>
                                            <a href="#" class="btn btn_primary">See more</a>
                                        </div>      
                                    </div>
                                </div> 
            
                                <div class="widget tag-widget">
                                    <h3>Tags</h3>
                                    <ul>
                                        <li><a href="#">Ecommerce</a></li>
                                        <li><a href="#">Fashion</a></li>
                                        <li><a href="#">T-shirt</a></li>
                                        <li><a href="#">Furnitures</a></li>
                                        <li><a href="#">Medical</a></li>
                                        <li><a href="#">Baby</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                         
                    </div>
                </div> <!-- end container -->
            </section>
            <!-- end blog-pg-section -->


            <!-- blog_section - end
            ================================================== -->
             
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