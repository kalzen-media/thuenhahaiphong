@extends('layouts.app')
@section('meta')
<title>{{$product->title}}</title>
<meta name="keywords" content="{{collect($product->tags)->pluck('name')->join(',')}}" />
<meta name="description" content="{{substr(strip_tags($product->description),0,300)}}" />
<meta property="og:image" content="{{$product->images()->first()->url??''}}">
<meta property="og:type" content="product">
<meta property="og:title" content="{{$product->title}}">
<meta property="og:description" content="{{substr(strip_tags($product->description),0,300)}}">
@stop
@section('styles')

@endsection
@section('content')
<div class="content-wrapper">

    <div class="breadcrumb-wrap bg-f br-1">
        <div class="container">
            <div class="breadcrumb-title">
                <h1 class="text-white">{{ $product->title }}</h1>
                <ul class="breadcrumb-menu list-style">
                    <li><a href="{{ route('home') }}">Trang chủ </a></li>
                    <li><a href="listings-one.html">{{ $product->catalogues->first()->name}}</a></li>
                    <li>Thông tin chi tiết</li>
                </ul>
            </div>
        </div>
    </div>


    <section class="property-details-wrap pt-100 pb-75">
        <div class="container">
            <div class="row">
                <div class="col-xl-8">
                    <div class="property-details">
                        <div class="row align-items-start">
                            <div class="col-md-8">
                                <div class="property-title">
                                    <h2>{{ $product->title }}</h2>
                                    <ul class="property-metainfo list-style">
                                        <li><i class="flaticon-location"></i>64/A, Ist Aveneu, High Street, Florida, USA
                                        </li>
                                        <li><i class="flaticon-square"></i>1310 Sqft</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <p class="property-price">{{ $product->price}} tr<span>/ tháng</span></p>
                            </div>
                        </div>
                        <div class="property-img-slider owl-carousel">
                            @foreach ($product->images as $image)
                            <img src="{{ asset($image->url)}}"
                                alt="{{ $product->title }}">
                            @endforeach
                        </div>
                        <div class="property-desc mt-20">
                            <h4>Thông tin chi tiết</h4>
                            {!!$product->content!!}
                        </div>
                        <div class="property-desc">
                            <h4>Thông tin khác</h4>
                            <div class="row">
                                @foreach ($product->attributes as $attribute)
                                <div class="col-md-4">
                                    <ul class="property-features list-style">
                                        <li>{{$attribute->name}} : <span>{{$attribute->pivot->value}}</span></li>
                                    </ul>
                                </div>
                                @endforeach
                            </div>
                        </div>
                   <!--     <div class="property-desc">
                            <h4>Property Features</h4>
                            <div class="row">
                                <div class="col-md-4">
                                    <ul class="property-annuties list-style">
                                        <li><i class="ri-checkbox-multiple-line"></i>Air Conditioned</li>
                                        <li><i class="ri-checkbox-multiple-line"></i>Swimming Pool</li>
                                        <li><i class="ri-checkbox-multiple-line"></i>Fitness Gym </li>
                                    </ul>
                                </div>
                                <div class="col-md-4">
                                    <ul class="property-annuties list-style">
                                        <li><i class="ri-checkbox-multiple-line"></i>Security Garage </li>
                                        <li><i class="ri-checkbox-multiple-line"></i>Window Coverings </li>
                                        <li><i class="ri-checkbox-multiple-line"></i>Laundry</li>
                                    </ul>
                                </div>
                                <div class="col-md-4">
                                    <ul class="property-annuties list-style">
                                        <li><i class="ri-checkbox-multiple-line"></i>Parking</li>
                                        <li><i class="ri-checkbox-multiple-line"></i>Fireplace</li>
                                        <li><i class="ri-checkbox-multiple-line"></i>Refrigerator</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="property-desc">
                            <h4>Property Video</h4>
                            <div class="property-video">
                                <img src="assets/img/property/single-property-2.jpg" alt="Image">
                                <a class="play-video" data-fancybox=""
                                    href="https://www.youtube.com/watch?v=Qj59_LGUBvE">
                                    <span class="play-now icon"><i class="flaticon-play-1"></i>
                                        <span class="ripple"></span></span>
                                </a>
                            </div>
                        </div>
                        <div class="property-desc">
                            <h4>3 Reviews</h4>
                            <div class="property-review comment-item-wrap">
                                <div class="comment-item">
                                    <div class="comment-author-img">
                                        <img src="assets/img/clients/client-1.jpg" alt="mage">
                                    </div>
                                    <div class="comment-author-wrap">
                                        <div class="comment-author-info">
                                            <div class="row align-items-start">
                                                <div class="col-md-9 col-sm-12 col-12 order-md-1 order-sm-1 order-1">
                                                    <div class="comment-author-name">
                                                        <h5>Olivic Dsuza</h5>
                                                        <span class="comment-date">22/04/2022</span>
                                                    </div>
                                                </div>
                                                <div
                                                    class="col-md-3 col-sm-12 col-12 text-md-end order-md-2 order-sm-3 order-2">
                                                    <ul class="ratings list-style">
                                                        <li><i class="ri-star-s-fill"></i></li>
                                                        <li><i class="ri-star-s-fill"></i></li>
                                                        <li><i class="ri-star-s-fill"></i></li>
                                                        <li><i class="ri-star-s-fill"></i></li>
                                                        <li><i class="ri-star-half-s-fill"></i></li>
                                                    </ul>
                                                </div>
                                                <div class="col-md-12 col-sm-12 col-12 order-md-3 order-sm-2 order-3">
                                                    <div class="comment-text">
                                                        <p>Nulla porttitor accumsan tincidunt. Praesent sapien massa,
                                                            convallis a pellentesque nec, egestas non nisi. Cras
                                                            ultricies ligula sed magna dictum porta. Vestibulum ante
                                                            ipsum primis in faucibus orci luctus et ultrices posuere
                                                            cubilia Curae; Donec velit neque, auctor sit amet aliquam
                                                            vel.
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="comment-item">
                                    <div class="comment-author-img">
                                        <img src="assets/img/clients/client-2.jpg" alt="mage">
                                    </div>
                                    <div class="comment-author-wrap">
                                        <div class="comment-author-info">
                                            <div class="row align-items-start">
                                                <div class="col-md-9 col-sm-12 col-12 order-md-1 order-sm-1 order-1">
                                                    <div class="comment-author-name">
                                                        <h5>Josef Haris</h5>
                                                        <span class="comment-date">15/04/2022</span>
                                                    </div>
                                                </div>
                                                <div
                                                    class="col-md-3 col-sm-12 col-12 text-md-end order-md-2 order-sm-3 order-2">
                                                    <ul class="ratings list-style">
                                                        <li><i class="ri-star-s-fill"></i></li>
                                                        <li><i class="ri-star-s-fill"></i></li>
                                                        <li><i class="ri-star-s-fill"></i></li>
                                                        <li><i class="ri-star-s-fill"></i></li>
                                                        <li><i class="ri-star-half-s-fill"></i></li>
                                                    </ul>
                                                </div>
                                                <div class="col-md-12 col-sm-12 col-12 order-md-3 order-sm-2 order-3">
                                                    <div class="comment-text">
                                                        <p>Nulla porttitor accumsan tincidunt. Praesent sapien massa,
                                                            convallis a pellentesque nec, egestas non nisi. Cras
                                                            ultricies ligula sed magna dictum porta. Vestibulum ante
                                                            ipsum primis in faucibus orci luctus et ultrices posuere
                                                            cubilia Curae; Donec velit neque, auctor sit amet aliquam
                                                            vel.
                                                        </p>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="property-img mb-0 mt-25">
                                                                    <img src="assets/img/property/property-1.jpg"
                                                                        alt="Image">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="property-img mb-0 mt-25">
                                                                    <img src="assets/img/property/property-2.jpg"
                                                                        alt="Image">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="comment-item">
                                    <div class="comment-author-img">
                                        <img src="assets/img/clients/client-3.jpg" alt="mage">
                                    </div>
                                    <div class="comment-author-wrap">
                                        <div class="comment-author-info">
                                            <div class="row align-items-start">
                                                <div class="col-md-9 col-sm-12 col-12 order-md-1 order-sm-1 order-1">
                                                    <div class="comment-author-name">
                                                        <h5>Boris jhonson</h5>
                                                        <span class="comment-date">27/03/2022</span>
                                                    </div>
                                                </div>
                                                <div
                                                    class="col-md-3 col-sm-12 col-12 text-md-end order-md-2 order-sm-3 order-2">
                                                    <ul class="ratings list-style">
                                                        <li><i class="ri-star-s-fill"></i></li>
                                                        <li><i class="ri-star-s-fill"></i></li>
                                                        <li><i class="ri-star-s-fill"></i></li>
                                                        <li><i class="ri-star-s-fill"></i></li>
                                                        <li><i class="ri-star-half-s-fill"></i></li>
                                                    </ul>
                                                </div>
                                                <div class="col-md-12 col-sm-12 col-12 order-md-3 order-sm-2 order-3">
                                                    <div class="comment-text">
                                                        <p>Nulla porttitor accumsan tincidunt. Praesent sapien massa,
                                                            convallis a pellentesque nec, egestas non nisi. Cras
                                                            ultricies ligula sed magna dictum porta. Vestibulum ante
                                                            ipsum primis in faucibus orci luctus et ultrices posuere
                                                            cubilia Curae; Donec velit neque, auctor sit amet aliquam
                                                            vel.
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="property-desc">
                            <h4>Add Your Review</h4>
                            <form class="review-form">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <p>Your ratings for this property</p>
                                            <div class="star-rating">
                                                <input id="star-5" type="radio" name="rating" value="star-5">
                                                <label for="star-5" title="5 stars">
                                                    <i class="active ri-star-fill" aria-hidden="true"></i>
                                                </label>
                                                <input id="star-4" type="radio" name="rating" value="star-4">
                                                <label for="star-4" title="4 stars">
                                                    <i class="active ri-star-fill" aria-hidden="true"></i>
                                                </label>
                                                <input id="star-3" type="radio" name="rating" value="star-3">
                                                <label for="star-3" title="3 stars">
                                                    <i class="active ri-star-fill" aria-hidden="true"></i>
                                                </label>
                                                <input id="star-2" type="radio" name="rating" value="star-2">
                                                <label for="star-2" title="2 stars">
                                                    <i class="active ri-star-fill" aria-hidden="true"></i>
                                                </label>
                                                <input id="star-1" type="radio" name="rating" value="star-1">
                                                <label for="star-1" title="1 star">
                                                    <i class="active ri-star-fill" aria-hidden="true"></i>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 text-md-end">
                                        <div class='file form-group'>
                                            <label for='input-file'>Upload Image</label>
                                            <input id='input-file' type='file' />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" placeholder="First name">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" placeholder="Last name">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="text" placeholder="Email Address">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <textarea id="msg" cols="30" rows="6"
                                                placeholder="Write A Review"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <button type="submit" class="btn style2">
                                            Submit Review
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>-->
                        <!--<div class="property-desc">
                            <h4>Similar Property</h4>
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="property-card style2">
                                        <div class="property-img-slider owl-carousel">
                                            <img src="assets/img/property/property-10.jpg" alt="Image">
                                            <img src="assets/img/property/property-1.jpg" alt="Image">
                                            <img src="assets/img/property/property-11.jpg" alt="Image">
                                        </div>
                                        <div class="property-info">
                                            <div class="property-status-wrap">
                                                <span class="property-status">For Rent</span>
                                                <p class="property-price">$34,900/<span>month</span></p>
                                            </div>
                                            <h3><a href="listing-details.html">Villa In Luis Park</a></h3>
                                            <p><i class="flaticon-location"></i>64, 1st Aveneu, High Steet, USA</p>
                                            <ul class="property-metainfo list-style">
                                                <li><i class="flaticon-double-bed"></i>06</li>
                                                <li><i class="flaticon-bath-tub"></i>04</li>
                                                <li><i class="flaticon-square"></i>3100 sqft</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="property-card style2">
                                        <div class="property-img-slider owl-carousel">
                                            <img src="assets/img/property/property-2.jpg" alt="Image">
                                            <img src="assets/img/property/property-7.jpg" alt="Image">
                                            <img src="assets/img/property/property-8.jpg" alt="Image">
                                        </div>
                                        <div class="property-info">
                                            <div class="property-status-wrap">
                                                <span class="property-status">For Sale</span>
                                                <p class="property-price">$21,400</p>
                                            </div>
                                            <h3><a href="listing-details.html">Modern Apartment</a></h3>
                                            <p><i class="flaticon-location"></i>123/A, Miles Ave, North Steet, USA</p>
                                            <ul class="property-metainfo list-style">
                                                <li><i class="flaticon-double-bed"></i>05</li>
                                                <li><i class="flaticon-bath-tub"></i>03</li>
                                                <li><i class="flaticon-square"></i>2500 sqft</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="sidebar">
                        
                        <div class="sidebar-widget">
                            <h4>Cùng địa điểm</h4>
                            @foreach ($related as $item)
                            <div class="property-thumb-item">
                                <div class="property-thumb-img">
                                    <img src="{{ asset($item->images->first()->url) }}" alt="{{ $item->title }}">
                                </div>
                                <div class="property-thumb-info">
                                    <h6><a href="{{ route('product.detail', ['alias' => $item->slug]) }}">{{ $item->title }}</a></h6>
                                    <p>{{ $item->price }} tr<span>/tháng</span></p>
                                </div>
                            </div>
                        @endforeach
                        </div>
                        <div class="sidebar-widget">
                            <h4>Thông tin liên hệ</h4>
                            <div class="agent-info-box">
                                <div class="agent-name-wrap">
                                    <div class="agent-img">
                                        <img src="{{ asset('thuenhahaiphong/assets/img/clients/client-1.jpg')}}" alt="Image">
                                    </div>
                                    <div class="agent-name">
                                        <h6><a href="#">Mr. Thắng</a></h6>
                                        <span>Chuyên viên tư vấn BĐS</span>
                                    </div>
                                </div>
                                <ul class="agent-address list-style">
                                    <li><i class="ri-map-pin-line"></i>Tầng 5 số 19 Điện Biên Phủ, Ngô Quyền, Hải Phòng</li>
                                    <li><i class="ri-phone-line"></i>0975271555</li>
                                    <li><i class="ri-mail-send-line"></i><a
                                            href="#"
                                            class="__cf_email__"
                                            data-cfemail="93fafdf5fcd3f9f2faf7f6fdbdf0fcfe">thuenhahaiphong@gmail.com</a>
                                    </li>
                                </ul>
                                <form action="#" class="agent-contact">
                                    <div class="form-group">
                                        <input type="text" placeholder="Họ và tên">
                                    </div>
                                    <div class="form-group">
                                        <input type="number" placeholder="Số điện thoại">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" placeholder="Email liên hệ">
                                    </div>
                                    <div class="form-group">
                                        <textarea name="msg" id="msg" cols="30" rows="10"
                                            placeholder="Nội dung"></textarea>
                                    </div>
                                    <button class="btn style2">Gửi yêu cầu</button>
                                </form>
                            </div>
                        </div>
                        <div class="sidebar-widget">
                            <h4>Popular Tags</h4>
                            <ul class="tag-list list-style">
                                <li><a href="listings.html">Houses</a></li>
                                <li><a href="listings.html">Rooms</a></li>
                                <li><a href="listings.html">Garages</a></li>
                                <li><a href="listings.html">Flat</a></li>
                                <li><a href="listings.html">Modern</a></li>
                                <li><a href="listings.html">Luxury</a></li>
                                <li><a href="listings.html">Property</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>

@endsection
@section('scripts')
<script>
$(function() {
    console.log('Product detail ready')
})
</script>
@endsection