@extends('layouts.app')
@section('meta')
<title>{{$post->title}}</title>
<meta name="keywords" content="{{collect($post->tags)->pluck('name')->join(',')}}" />
<meta name="description" content="{{substr(strip_tags($post->description),0,300)}}" />
<meta property="og:image" content="{{$post->images()->first()->url??''}}">
<meta property="og:type" content="article">
<meta property="og:title" content="{{$post->title}}">
<meta property="og:description" content="{{substr(strip_tags($post->description),0,300)}}">
@stop
@section('content')
<div class="content-wrapper">

    <div class="breadcrumb-wrap bg-f br-3">
        <div class="container">
            <div class="breadcrumb-title">
                <h1 class="text-white">{{$post->title}}</h1>
                <ul class="breadcrumb-menu list-style">
                    <li><a href="{{ route('home') }}">Trang chủ </a></li>
                    <li><a href="{{$post->categories()->first()->url}}">{{$post->categories()->first()->name}}</a></li>
                </ul>
            </div>
        </div>
    </div>


    <div class="blog-details-wrap ptb-100">
        <div class="container">
            <div class="row gx-5">
                <div class="col-xl-8 col-lg-12">
                    <article>
                        <div class="post-img">
                            <img src="{{asset($post->images()->first()->url)}}" alt="{{$post->title}}">
                        </div>
                        <ul class="post-metainfo  list-style">
                            <li><i class="flaticon-calendar"></i>{{date('d/m/Y',strtotime($post->updated_at))}}</li>
                            <li><i class="flaticon-chat-comment-oval-speech-bubble-with-text-lines"></i>{{$post->user->name??''}}</li>
                        </ul>
                        <h2>{{ $post->title }}</h2>
                        <div class="post-para">
                          {!!$post->content!!}
                        </div>
                    </article>
                    <div class="post-meta-option">
                        <div class="row gx-0 align-items-center">
                            <div class="col-md-7 col-12">
                                <div class="post-tag">
                                    <span><i class="ri-price-tag-3-line"></i>Tags:</span>
                                    <ul class="tag-list style2 list-style">
                                        <li><a href="#">Apartment</a>,</li>
                                        <li><a href="#">Villa</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-5 col-12 text-md-end text-start">
                                <div class="post-share w-100">
                                    <span>Share:</span>
                                    <ul class="social-profile style2 list-style">
                                        <li>
                                            <a target="_blank" href="https://facebook.com/">
                                                <i class="ri-facebook-fill"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a target="_blank" href="https://twitter.com/">
                                                <i class="ri-twitter-fill"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a target="_blank" href="https://linkedin.com/">
                                                <i class="ri-linkedin-fill"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a target="_blank" href="https://instagram.com/">
                                                <i class="ri-instagram-fill"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="post-author">
                        <div class="post-author-img">
                            <img src="{{ asset('thuenhahaiphong/assets/img/logo.png') }}" alt="logo">
                        </div>
                        <div class="post-author-info">
                            <h4>Thuê nhà Hải Phòng</h4>
                            <p>Claritas est etiam amet sinicus, qui sequitur lorem ipsum semet coui lectorum. Lorem
                                ipsum dolor voluptatem corporis blanditiis sadipscing elitr sed diam nonumy eirmod amet
                                sit lorem.</p>
                            <ul class="social-profile style2 list-style">
                                <li>
                                    <a target="_blank" href="https://facebook.com/">
                                        <i class="ri-facebook-fill"></i>
                                    </a>
                                </li>
                                <li>
                                    <a target="_blank" href="https://twitter.com/">
                                        <i class="ri-twitter-fill"></i>
                                    </a>
                                </li>
                                <li>
                                    <a target="_blank" href="https://linkedin.com/">
                                        <i class="ri-linkedin-fill"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    
                </div>
                <div class="col-xl-4 col-lg-12">
                    <div class="sidebar">
                        <div class="sidebar-widget style4">
                            <div class="search-box">
                                <div class="form-group">
                                    <input type="search" placeholder="Search">
                                    <button type="submit">
                                        <i class="flaticon-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="sidebar-widget categories">
                            <h4>Danh mục tin tức</h4>
                            <div class="category-box">
                                <ul class="list-style">
                                    @foreach ($categories as $category)
                                    <li>
                                        <a href="{{ route('post.category', ['alias' => $category->slug]) }}">
                                            <i class="flaticon-next"></i>
                                            {{$category->name}}
                                            <span>({{$category->posts()->count()}})</span>
                                        </a>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="sidebar-widget popular-post">
                            <h4>Bài viết xem nhiều nhất</h4>
                            <div class="popular-post-widget">
                                @foreach ($most_view as $item)
                                <div class="pp-post-item">
                                    <a href="{{ route('post.detail', ['alias' => $post->slug]) }}" class="pp-post-img">
                                        <img src="{{ asset($item->images->first()->url) }}" alt="{{$item->title}}">
                                    </a>
                                    <div class="pp-post-info">
                                        <span><i class="flaticon-calendar"></i>{{date('d/m/Y',strtotime($post->updated_at))}}</span>
                                        <h6>
                                            <a href="{{ asset($item->images->first()->url) }}">
                                                {{$item->title}}
                                            </a>
                                        </h6>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                       <!-- <div class="sidebar-widget tags">
                            <h4>Popular Tags </h4>
                            <div class="tag-list">
                                <ul class="list-style">
                                    <li><a href="posts-by-tag.html">Houses</a></li>
                                    <li><a href="posts-by-tag.html">Rooms</a></li>
                                    <li><a href="posts-by-tag.html">Garages</a></li>
                                    <li><a href="posts-by-tag.html">Flat</a></li>
                                    <li><a href="posts-by-tag.html">Modern</a></li>
                                    <li><a href="posts-by-tag.html">Luxury</a></li>
                                    <li><a href="posts-by-tag.html">Property</a></li>
                                </ul>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection