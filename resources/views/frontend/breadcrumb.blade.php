      <!-- breadcrumb_section - start
            ================================================== -->
            <div class="breadcrumb_section">
                <div class="container">
                    @foreach ($posts as $post)
                        
                    <ul class="breadcrumb_nav ul_li">
                        <li><a href="{{ route('frontend.index') }}">Home</a></li>
                        <li><a href="{{ route('frontend.single.view',$post->category->pluck('name')->first()) }}">{{ $post->category->pluck('name')->first() }}</a></li>
                        <li>{{ $post->title }}</li>
                    </ul>
                    @endforeach
                </div>
            </div>
            <!-- breadcrumb_section - end
            ================================================== -->