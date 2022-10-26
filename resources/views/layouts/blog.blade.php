   <!-- blog_section - start
            ================================================== -->
            <!-- start blog-pg-section -->
            <section class="blog-pg-section section_space">
                <div class="container">
                    <div class="row">
                        <div class="col col-lg-8 content">
                            @yield('pageContent')

                        </div>
                        <div class="col col-lg-4">
                            <div class="blog-sidebar-s2">
                                <div class="widget search-widget">
                                    <h3>Search</h3>
                                    <form>
                                        <div>
                                            <input type="text" class="form-control" placeholder="Search Post..">
                                            <button type="submit"><i class="ti-search"></i></button>
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