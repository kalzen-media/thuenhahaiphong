@extends('layouts.app')
@section('meta')
@if(isset($category))
<title>{{$category->name}} - {{env('APP_NAME')}}</title>
<meta name="keywords" content="{{$category->tags->pluck('name')->join(', ')}}" />
<meta name="description" content="{{$category->description}}" />
<meta property="og:image" content="{{$category->image?$category->image->url:''}}">
<meta property="og:type" content="article">
<meta property="og:title" content="{{$category->name}}">
<meta property="og:description" content="{{$category->description}}">
@else
<title>Tin tức - {{env('APP_NAME')}}</title>
<meta name="keywords" content="{{env('APP_NAME')}}" />
<meta name="description" content="{{env('APP_NAME')}}" />
<meta property="og:image" content="{{env('APP_LOGO')}}">
<meta property="og:type" content="website">
<meta property="og:title" content="{{env('APP_NAME')}}">
<meta property="og:description" content="{{env('APP_NAME')}}">
@endif
@stop
@section('content')
<div class="body-page">
    <div class="container">
        <div class="row">
            <!-- breadcums -->
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Trang chủ</a></li>
                    @if (isset($category_parent))
                    <li class="breadcrumb-item"><a href="{{ route('post.category', ['alias' => $category_parent->slug]) }}">{{$category_parent->name}}</a></li>
                    @endif
                    <li class="breadcrumb-item active" aria-current="page">{{$category->name}}</li>
                </ol>
            </nav>
            <div class="col-lg-8">
                @foreach ($posts as $post)
                @if($loop->index == 0)
                <article class="card card-post-2">
                    <a class="thumbnail  hover-overlay mb-3" href="{{$post->url}}">
                        <img class="thumbnail-img" loading="lazy" src="{{$post->images->first()->url}}" alt="{{$post->title}}">
                    </a>
                    <div class="card-body p-0">
                        <h5 class="card-title mt-10">
                            <a href="{{$post->url}}">{{$post->title}}</a>
                        </h5>
                        <p class="card-text text-muted">{{ $post->description}}</p>
                        <div class="d-flex justify-content-between text-muted">
                            <p>{{ $post->created_at}}</p>
                            <p>{{ $post->viewed}} lượt xem</p>
                        </div>
                    </div>
                </article>
                @endif
                @endforeach
                <hr>
                <div class="list-post">
                @foreach ($posts as $post)
                @if($loop->index > 0)
                    <article class="card card-post">
                        <div class="row g-3 gx-md-4">
                            <div class="col-sm-5">
                            <a class="thumbnail  hover-overlay mb-3" href="{{$post->url}}">
                        <img class="thumbnail-img" loading="lazy"
                            src="{{$post->images->first()->url}}"
                            alt="{{$post->title}}">
                    </a>
                            </div>
                            <div class="col-sm-7">
                                <div class="card-body">
                                    <h5 class="card-title">
                                        <a
                                            href="{{$post->url}}">{{$post->title}}</a>
                                    </h5>
                                    <p class="card-text text-muted mb-2">{{ \Illuminate\Support\Str::limit($post->description, 150, $end='...') }}
                                    </p>
                                    <a class="card-read-more text-muted mt-auto fs-sm"
                                        href="{{$post->url}}">Xem
                                        chi tiết
                                    </a>
                                </div>
                            </div>
                        </div>
                    </article>
                    <hr>
                    @endif
                @endforeach
                </div>
            </div>
            <div class="col-lg-4">
                <div class="ads">
                    <a href="#"><img src="{{ asset('hocvienielts/ads.jpg') }}" alt="quảng cáo"></a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script>
$(function() {
    console.log('Post index ready')
})
</script>
@endsection