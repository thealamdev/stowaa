    <!-- header_section - start
        ================================================== -->
        <div class="col col-lg-3 col-md-3 col-sm-12">
             
        </div>
        <header class="header_section header-style-3">
            
            <div class="header_bottom">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col col-md-3">
                            <div class="brand_logo">
                                <a class="brand_link" href="index-2.html">
                                    <img src="{{ asset('assets/frontend/images/logo/logo_1x.png') }}" alt="{{ asset('assets/frontend/images/logo/logo_1x.png') }}">
                                </a>
                            </div>
                        </div>

                        <div class="col col-md-6">
                            <nav class="main_menu navbar navbar-expand-lg">
                                <div class="main_menu_inner collapse navbar-collapse" id="main_menu_dropdown">
                                    <button type="button" class="offcanvas_close">
                                        <i class="fal fa-times"></i>
                                    </button>
                                    <ul class="main_menu_list ul_li">
                                        <li>   
                                            <a class="nav-link" href="{{ route('frontend.index') }}" id="shop_submenu" >Home</a>             
                                        </li>
                                        @foreach ($categories as $category)
                                        <li>   
                                            <a  class=" nav-link {{ request()->is('post/' .$category->slug.'*') ? 'active': ' ' }}" href="{{ route('frontend.single.view',$category->slug) }}" id="shop_submenu" >{{ $category->name }}</a>             
                                        </li>
                                  
                                        @endforeach
                                    </ul>
                                </div>
                            </nav>

                            <div class="offcanvas_overlay"></div>
                        </div>

                      
                    </div>
                </div>
            </div>
        </header>
        <!-- header_section - end
        ================================================== -->