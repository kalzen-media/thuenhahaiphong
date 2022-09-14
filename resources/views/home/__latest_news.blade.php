
    <div class="cont maincont" style="padding-top: 30px;">
        <h1><span>Tin tức mới nhất</span></h1>
        <span class="maincont-line1 maincont-line12"></span>
        <span class="maincont-line2 maincont-line22 blog-line"></span>

        <!-- Blog Sections -->
        <ul class="cont-sections">
            <li class="active">
                <a href="{{route('post.list')}}">Tất cả</a>
            </li>
            @foreach($shared_categories as $category_item)
            <li>
                <a href="{{$category_item->url}}">{{$category_item->name}}</a>
            </li>
            @endforeach
        </ul>

        <div class="blog blog-full">

            <!-- Blog Posts List - start -->
            <div class="blog-cont">
                <div id="blog-grid">
                    @foreach($latest_news as $post)
                    <div class="blog-grid-i" >
                        <div class="blog-i">
                            <a href="{{$post->url}}" class="blog-img">
                                <img src="{{$post->images()->first()->url??''}}" alt="{{$post->title}}">
                            </a>
                            <p class="blog-info">
                                <a href="{{$post->categories()->first()->url??''}}">{{$post->categories()->first()->name??''}}</a>
                                <time datetime="{{date('Y-m-d H:i',strtotime($post->created_at))}}">{{date('d.m.Y',strtotime($post->created_at))}}</time>
                            </p>
                            <h3><a href="{{$post->url}}">{{$post->title}}</a></h3>
                            <p>{{substr(strip_tags($post->description),0,100)}} <a href="{{$post->url}}">Chi tiết</a></p>
                        </div>
                    </div>
                    @endforeach
                </div>

            </div>
            <!-- Blog Posts List - end -->

        </div>
    </div>