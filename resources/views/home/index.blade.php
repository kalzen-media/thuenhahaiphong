@extends('layouts.app')
@section('content')
<section class="hero-wrap style3">
    <div class="hero-slider-two owl-carousel">
        <div class="hero-slide-item hero-slide-4 bg-f"
            style="background: url({{asset('thuenhahaiphong/assets/img/hero/hero-slider-4.jpg')}})"></div>
        <div class="hero-slide-item hero-slide-5 bg-f"
            style="background: url({{asset('thuenhahaiphong/assets/img/hero/hero-slider-4.jpg')}})"></div>
        <div class="hero-slide-item hero-slide-6 bg-f"
            style="background: url({{asset('thuenhahaiphong/assets/img/hero/hero-slider-4.jpg')}})"></div>
    </div>
    <div class="hero-content">
        <div class="row">
            <div class="col-xxl-8 offset-xxl-2 col-xl-10 offset-xl-1 col-lg-10 offset-lg-1">
                <h1 data-aos="fade-up" data-aos-duration="1200" data-aos-delay="200">Luxury House Renting</h1>
                <p data-aos="fade-up" data-aos-duration="1200" data-aos-delay="300">Proin gravida nibh vel velit
                    auctor aliquet aenean sollicitudin lorem quis bibendum auctor nisi elit consequat ipsum nec
                    sagittis sem nibh id elit Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                <form action="#" class="property-search-form" data-aos="fade-up" data-aos-duration="1200"
                    data-aos-delay="400">
                    <div class="form-group-wrap">
                        <div class="form-group">
                            <input type="text" placeholder="Location">
                        </div>
                        <div class="form-group">
                            <select name="price-range" id="price-range">
                                <option value="0" data-display="Price Range">Price Range</option>
                                <option value="1">$1000 - $2000</option>
                                <option value="2">$2000 - $3000</option>
                                <option value="3">$3000 - $4000</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <select name="property_commodity" id="property_commodity">
                                <option value="0" data-display="Bed &amp; Baths">Bed &amp; Baths</option>
                                <option value="1">2 Bed 2 Bath</option>
                                <option value="2">3 Bed 2 Bath</option>
                                <option value="3">4 Bed 3 Bath</option>
                            </select>
                        </div>
                    </div>
                    <button type="submit" class="btn style2">Search Property</button>
                </form>
                <div class="client-feedback" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="500">
                    <ul class="list-style">
                        <li><a href="testimonials.html"><img
                                    src="{{ asset('thuenhahaiphong/assets/img/clients/client-1.jpg')}}" alt="Image"></a>
                        </li>
                        <li><a href="testimonials.html"><img
                                    src="{{ asset('thuenhahaiphong/assets/img/clients/client-2.jpg')}}" alt="Image"></a>
                        </li>
                        <li><a href="testimonials.html"><img
                                    src="{{ asset('thuenhahaiphong/assets/img/clients/client-3.jpg')}}" alt="Image"></a>
                        </li>
                        <li><a href="testimonials.html"><img
                                    src="{{ asset('thuenhahaiphong/assets/img/clients/client-4.jpg')}}" alt="Image"></a>
                        </li>
                    </ul>
                    <span>29k Positive Review</span>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="property-wrap pt-100 pb-75">
    <div class="container">
        <div class="row section-title style1 mb-40  align-items-end">
            <div class="col-md-8">
                <span>Thuê nhà Hải Phòng</span>
                <h2>Danh sách cho thuê mới nhất</h2>
            </div>
            <div class="col-md-4 text-md-end sm-none">
                <a href="listings-one.html" class="btn style1">Xem tất cả</a>
            </div>
        </div>
        <ul class="nav nav-tabs property-tablist" role="tablist">
            <li class="nav-item">
                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#tab_1" type="button"
                    role="tab">Cho thuê nhà phố</button>
            </li>
            <li class="nav-item">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#tab_2" type="button" role="tab">Cho thuê
                    văn phòng</button>
            </li>
            <li class="nav-item">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#tab_3" type="button" role="tab">Cho thuê
                    căn hộ - nhà riêng</button>
            </li>
        </ul>
        <div class="tab-content hw-tab-content">
            <div class="tab-pane fade show active" id="tab_1" role="tabpanel">
                <div class="row">
                    @foreach ($cat1->latestProduct->take(9) as $product)
                    <div class="col-xl-4 col-lg-6 col-md-6">
                        <div class="property-card style2">
                            <div class="property-img-slider owl-carousel">

                                @foreach ($product->images as $image)
                                <img style="height: 350px; object-fit:cover;" src="{{ asset($image->url)}}"
                                    alt="{{ $product->title }}">
                                @endforeach
                            </div>
                            <div class="property-info">
                                <div class="property-status-wrap">
                                    <span class="property-status">Cho thuê nhà phố</span>
                                    <p class="property-price">Giá: {{ number_format($product->price) }}
                                        tr/<span>tháng</span></p>
                                </div>
                                <h3><a
                                        href="{{ route('product.detail', ['alias' => $product->slug]) }}">{{ $product->title }}</a>
                                </h3>

                                <p>{{$product->description}}</p>
                                <div class="d-flex">
                                    <p>DTMB: {{ $product->attributes[1]->pivot->value }} m2 - DTSD:
                                        {{ $product->attributes[0]->pivot->value }} m2</p>
                                </div>
                                <ul class="property-metainfo list-style">
                                    @foreach ($product->attributes as $attribute)

                                    @if ($attribute->name =='Số phòng')
                                    <li><i class="flaticon-double-bed"></i>{{ $attribute->pivot->value }}</li>
                                    @elseif ($attribute->name =='Số tầng')
                                    <li><i class="flaticon-bath-tub"></i>{{ $attribute->pivot->value }}</li>
                                    @endif
                                    @endforeach
                                    <li><i class="flaticon-bath-tub"></i>{{ $product->district_id }}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="tab-pane fade" id="tab_2" role="tabpanel">
                <div class="row">
                    @foreach ($cat2->latestProduct->take(9) as $product)
                    <div class="col-xl-4 col-lg-6 col-md-6">
                        <div class="property-card style2">
                            <div class="property-img-slider owl-carousel">
                                @foreach ($product->images as $image)
                                <img style="height: 350px; object-fit:cover;" src="{{ asset($image->url)}}"
                                    alt="{{ $product->title }}">
                                @endforeach
                            </div>
                            <div class="property-info">
                                <div class="property-status-wrap">
                                    <span class="property-status">Cho thuê nhà phố</span>
                                    <p class="property-price">Giá: {{ number_format($product->price) }}
                                        tr/<span>tháng</span></p>
                                </div>
                                <h3><a
                                        href="{{ route('product.detail', ['alias' => $product->slug]) }}">{{ $product->title }}</a>
                                </h3>

                                <p>{{$product->description}}</p>
                                <div class="d-flex">
                                    <p>DTMB: {{ $product->attributes[1]->pivot->value }} m2 - DTSD:
                                        {{ $product->attributes[0]->pivot->value }} m2</p>
                                </div>
                                <ul class="property-metainfo list-style">
                                    @foreach ($product->attributes as $attribute)

                                    @if ($attribute->name =='sophong')
                                    <li><i class="flaticon-double-bed"></i>{{ $attribute->pivot->value }}</li>
                                    @elseif ($attribute->name =='sotang')
                                    <li><i class="flaticon-bath-tub"></i>{{ $attribute->pivot->value }}</li>
                                    @endif
                                    @endforeach
                                    <li><i class="flaticon-bath-tub"></i>{{ $product->district_id }}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="tab-pane fade" id="tab_3" role="tabpanel">
                <div class="row">
                    @foreach ($cat3->latestProduct->take(9) as $product)
                    <div class="col-xl-4 col-lg-6 col-md-6">
                        <div class="property-card style2">
                            <div class="property-img-slider owl-carousel">
                                @foreach ($product->images as $image)
                                <img style="height: 350px; object-fit:cover;" src="{{ asset($image->url)}}"
                                    alt="{{ $product->title }}">
                                @endforeach
                            </div>
                            <div class="property-info">
                                <div class="property-status-wrap">
                                    <span class="property-status">Cho thuê nhà phố</span>
                                    <p class="property-price">Giá: {{ number_format($product->price) }}
                                        tr/<span>tháng</span></p>
                                </div>
                                <h3><a
                                        href="{{ route('product.detail', ['alias' => $product->slug]) }}">{{ $product->title }}</a>
                                </h3>

                                <p>{{$product->description}}</p>
                                <div class="d-flex">
                                    <p>DTMB: {{ $product->attributes[1]->pivot->value }} m2 - DTSD:
                                        {{ $product->attributes[0]->pivot->value }} m2</p>
                                </div>
                                <ul class="property-metainfo list-style">
                                    @foreach ($product->attributes as $attribute)

                                    @if ($attribute->name =='sophong')
                                    <li><i class="flaticon-double-bed"></i>{{ $attribute->pivot->value }}</li>
                                    @elseif ($attribute->name =='sotang')
                                    <li><i class="flaticon-bath-tub"></i>{{ $attribute->pivot->value }}</li>
                                    @endif
                                    @endforeach
                                    <li><i class="flaticon-bath-tub"></i>{{ $product->district_id }}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    </div>
</section>
<section class="hw-wrap bg-seashell pt-100 pb-75">
    <div class="container">
        <div class="row">
            <div class="col-xl-6 offset-xl-3 col-lg-8 offset-lg-2">
                <div class="section-title style2 text-center mb-40">
                    <h2>3 Bước để thuê một địa điểm theo yêu cầu</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incidi dunt ut
                        labore et dolore magna aliqua adipiscing elit. </p>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 aos-init" data-aos="fade-up" data-aos-duration="1200"
                data-aos-delay="200">
                <div class="hw-card">
                    <div class="hw-img">
                        <img src="{{ asset('thuenhahaiphong/assets/img/how-it-works/hw-shape-1.png')}}" alt="Image"
                            class="hw-shape-one">
                        <img src="{{ asset('thuenhahaiphong/assets/img/how-it-works/hw-1.png')}}" alt="Image">
                        <span>01</span>
                    </div>
                    <div class="hw-info">
                        <h3>Tìm kiếm &amp; Chọn lựa</h3>
                        <p>Tìm kiếm bằng công cụ tìm kiếm thông tin website, chọn một địa điểm ưng ý nhất. </p>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 aos-init" data-aos="fade-up" data-aos-duration="1200"
                data-aos-delay="300">
                <div class="hw-card">
                    <div class="hw-img">
                        <img src="{{ asset('thuenhahaiphong/assets/img/how-it-works/hw-shape-1.png')}}" alt="Image"
                            class="hw-shape-one">
                        <img src="{{ asset('thuenhahaiphong/assets/img/how-it-works/hw-2.png')}}" alt="Image">
                        <span>02</span>
                    </div>
                    <div class="hw-info">
                        <h3>Liên hệ chuyên viên tư vấn</h3>
                        <p>Liên hệ chuyên viên tư vấn để được tư vấn thêm, tham quan thực tế và chuẩn bị thủ tục</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 aos-init" data-aos="fade-up" data-aos-duration="1200"
                data-aos-delay="400">
                <div class="hw-card">
                    <div class="hw-img">
                        <img src="{{ asset('thuenhahaiphong/assets/img/how-it-works/hw-shape-1.png')}}" alt="Image"
                            class="hw-shape-one">
                        <img src="{{ asset('thuenhahaiphong/assets/img/how-it-works/hw-3.png')}}" alt="Image">
                        <span>03</span>
                    </div>
                    <div class="hw-info">
                        <h3>Xác nhận thuê nhà</h3>
                        <p>Ký hợp đồng xác nhận các thủ tục thuê nhà. </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="video-wrap video-bg-1 style2 bg-f ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-xl-6 offset-xl-3 col-lg-8 offset-lg-2">
                <div class="video-content">
                    <a class="play-video" data-fancybox="" href="https://www.youtube.com/watch?v=Qj59_LGUBvE&amp;t=1s">
                        <span class="play-now icon"><i class="flaticon-play-1"></i>
                            <span class="ripple"></span></span>
                    </a>
                    <div class="content-title">
                        <span>Open Video</span>
                        <h2>Attend A Virtual Open Apartments</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="counter-card-wrap style2">
            <div class="counter-card">
                <div class="counter-text">
                    <img src="{{ asset('thuenhahaiphong/assets/img/counter-card-shape-1.png')}}" alt="Image"
                        class="counter-card-shape">
                    <h2 class="counter-num">
                        <span class="odometer odometer-auto-theme" data-count="12">
                            <div class="odometer-inside"><span class="odometer-digit"><span
                                        class="odometer-digit-spacer">8</span><span class="odometer-digit-inner"><span
                                            class="odometer-ribbon"><span class="odometer-ribbon-inner"><span
                                                    class="odometer-value">1</span></span></span></span></span><span
                                    class="odometer-digit"><span class="odometer-digit-spacer">8</span><span
                                        class="odometer-digit-inner"><span class="odometer-ribbon"><span
                                                class="odometer-ribbon-inner"><span
                                                    class="odometer-value">2</span></span></span></span></span></div>
                        </span>
                        <span class="target">+</span>
                    </h2>
                    <p>Năm kinh nghiệm</p>
                </div>
            </div>
            <div class="counter-card">
                <div class="counter-text">
                    <img src="{{ asset('thuenhahaiphong/assets/img/counter-card-shape-1.png')}}" alt="Image"
                        class="counter-card-shape">
                    <h2 class="counter-num">
                        <span class="odometer odometer-auto-theme" data-count="167">
                            <div class="odometer-inside"><span class="odometer-digit"><span
                                        class="odometer-digit-spacer">8</span><span class="odometer-digit-inner"><span
                                            class="odometer-ribbon"><span class="odometer-ribbon-inner"><span
                                                    class="odometer-value">1</span></span></span></span></span><span
                                    class="odometer-digit"><span class="odometer-digit-spacer">8</span><span
                                        class="odometer-digit-inner"><span class="odometer-ribbon"><span
                                                class="odometer-ribbon-inner"><span
                                                    class="odometer-value">6</span></span></span></span></span><span
                                    class="odometer-digit"><span class="odometer-digit-spacer">8</span><span
                                        class="odometer-digit-inner"><span class="odometer-ribbon"><span
                                                class="odometer-ribbon-inner"><span
                                                    class="odometer-value">7</span></span></span></span></span></div>
                        </span>
                        <span class="target">K+</span>
                    </h2>
                    <p>Khách hàng hài lòng</p>
                </div>
            </div>
            <div class="counter-card">
                <div class="counter-text">
                    <img src="{{ asset('thuenhahaiphong/assets/img/counter-card-shape-1.png')}}" alt="Image"
                        class="counter-card-shape">
                    <h2 class="counter-num">
                        <span class="odometer odometer-auto-theme" data-count="239">
                            <div class="odometer-inside"><span class="odometer-digit"><span
                                        class="odometer-digit-spacer">8</span><span class="odometer-digit-inner"><span
                                            class="odometer-ribbon"><span class="odometer-ribbon-inner"><span
                                                    class="odometer-value">2</span></span></span></span></span><span
                                    class="odometer-digit"><span class="odometer-digit-spacer">8</span><span
                                        class="odometer-digit-inner"><span class="odometer-ribbon"><span
                                                class="odometer-ribbon-inner"><span
                                                    class="odometer-value">3</span></span></span></span></span><span
                                    class="odometer-digit"><span class="odometer-digit-spacer">8</span><span
                                        class="odometer-digit-inner"><span class="odometer-ribbon"><span
                                                class="odometer-ribbon-inner"><span
                                                    class="odometer-value">9</span></span></span></span></span></div>
                        </span>
                        <span class="target">+</span>
                    </h2>
                    <p>Văn phòng cho thuê</p>
                </div>
            </div>
            <div class="counter-card">
                <div class="counter-text">
                    <img src="{{ asset('thuenhahaiphong/assets/img/counter-card-shape-1.png')}}" alt="Image"
                        class="counter-card-shape">
                    <h2 class="counter-num">
                        <span class="odometer odometer-auto-theme" data-count="449">
                            <div class="odometer-inside"><span class="odometer-digit"><span
                                        class="odometer-digit-spacer">8</span><span class="odometer-digit-inner"><span
                                            class="odometer-ribbon"><span class="odometer-ribbon-inner"><span
                                                    class="odometer-value">4</span></span></span></span></span><span
                                    class="odometer-digit"><span class="odometer-digit-spacer">8</span><span
                                        class="odometer-digit-inner"><span class="odometer-ribbon"><span
                                                class="odometer-ribbon-inner"><span
                                                    class="odometer-value">4</span></span></span></span></span><span
                                    class="odometer-digit"><span class="odometer-digit-spacer">8</span><span
                                        class="odometer-digit-inner"><span class="odometer-ribbon"><span
                                                class="odometer-ribbon-inner"><span
                                                    class="odometer-value">9</span></span></span></span></span></div>
                        </span>
                        <span class="target">+</span>
                    </h2>
                    <p>Nhà và căn hộ cho thuê</p>
                </div>
            </div>
        </div>
    </div>
</div>
<section class="city-wrap pt-100 pb-75 bg-seashell">
    <img src="assets/img/shape-2.png" alt="Image" class="city-shape-one">
    <div class="container">
        <div class="section-title style1 text-center mb-40">
            <span>Tìm địa điểm theo quận/huyện</span>
            <h2>Quận/ Huyện tại Hải Phòng</h2>
        </div>
        <div class="row justify-content-center">
            <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-6" data-aos="fade-up" data-aos-duration="1200"
                data-aos-delay="200">
                <div class="city-card style1">
                    <img src="{{asset('thuenhahaiphong/assets/img/city/city-1.jpg')}}" alt="Image">
                    <div class="city-info">
                        <h3><a href="#">Ngô Quyền</a></h3>
                        <p>+5231 cho thuê</p>
                    </div>
                </div>
            </div>
            <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-6" data-aos="fade-up" data-aos-duration="1200"
                data-aos-delay="300">
                <div class="city-card style1">
                    <img src="{{ asset('thuenhahaiphong/assets/img/city/city-2.jpg')}}" alt="Image">
                    <div class="city-info">
                        <h3><a href="#">Lê Chân</a></h3>
                        <p>+1211 cho thuê</p>
                    </div>
                </div>
            </div>
            <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-6" data-aos="fade-up" data-aos-duration="1200"
                data-aos-delay="400">
                <div class="city-card style1">
                    <img src="{{ asset('thuenhahaiphong/assets/img/city/city-3.jpg')}}" alt="Image">
                    <div class="city-info">
                        <h3><a href="#">An Dương</a></h3>
                        <p>+121 cho thuê</p>
                    </div>
                </div>
            </div>
            <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-6" data-aos="fade-up" data-aos-duration="1200"
                data-aos-delay="500">
                <div class="city-card style1">
                    <img src="{{ asset('thuenhahaiphong/assets/img/city/city-4.jpg')}}" alt="Image">
                    <div class="city-info">
                        <h3><a href="#">Hồng Bàng</a></h3>
                        <p>+432 cho thuê</p>
                    </div>
                </div>
            </div>
            <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-6" data-aos="fade-up" data-aos-duration="1200"
                data-aos-delay="200">
                <div class="city-card style1">
                    <img src="{{ asset('thuenhahaiphong/assets/img/city/city-5.jpg')}}" alt="Image">
                    <div class="city-info">
                        <h3><a href="#">Kiến An</a></h3>
                        <p>+231 cho thuê</p>
                    </div>
                </div>
            </div>
            <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-6" data-aos="fade-up" data-aos-duration="1200"
                data-aos-delay="300">
                <div class="city-card style1">
                    <img src="{{ asset('thuenhahaiphong/assets/img/city/city-6.jpg')}}" alt="Image">
                    <div class="city-info">
                        <h3><a href="#">Hải An</a></h3>
                        <p>+1222 cho thuê</p>
                    </div>
                </div>
            </div>
            <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-6" data-aos="fade-up" data-aos-duration="1200"
                data-aos-delay="400">
                <div class="city-card style1">
                    <img src="{{ asset('thuenhahaiphong/assets/img/city/city-7.jpg')}}" alt="Image">
                    <div class="city-info">
                        <h3><a href="#">Dương Kinh</a></h3>
                        <p>+151 cho thuê</p>
                    </div>
                </div>
            </div>
            <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-6" data-aos="fade-up" data-aos-duration="1200"
                data-aos-delay="500">
                <div class="city-card style1">
                    <img src="{{ asset('thuenhahaiphong/assets/img/city/city-8.jpg')}}" alt="Image">
                    <div class="city-info">
                        <h3><a href="#">An Lão</a></h3>
                        <p>+232 cho thuê</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



<section class="testimonial-wrap style2 ptb-100 bg-seashell">
    <div class="container">
        <div class="row">
            <div class="col-xl-6 offset-xl-3 col-lg-8 offset-lg-2">
                <div class="section-title style1 text-center mb-40">
                    <h2>Khách hàng nói gì về chúng tôi</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incidi dunt ut
                        labore et dolore magna aliqua adipiscing elit. </p>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="testimonial-slider-two owl-carousel">
            <div class="testimonial-card style2">
                <h6>Tôi đã tìm được căn hộ ưng ý cho 2 vợ chồng!</h6>
                <p class="client-quote">
                    Lorem ipsum dolor sit amet adip elitions repellat tetur delni vel quam aliq earum explibo dolor eme
                    fugiat enim illumon amet sit.
                </p>
                <div class="client-info-wrap">
                    <div class="client-img">
                        <img src="{{ asset('thuenhahaiphong/assets/img/clients/client-2.jpg')}}" alt="Image">
                    </div>
                    <div class="client-info">
                        <h5>Nguyễn Bá Tới</h5>
                        <span>Kỹ sư phần mềm</span>
                    </div>
                    <div class="ratings">
                        <i class="flaticon-star"></i>
                        5
                    </div>
                </div>
            </div>
            <div class="testimonial-card style2">
                <h6>Tư vấn nhiệt tình, giải đáp mọi thắc mắc của tôi!</h6>
                <p class="client-quote">
                    Lorem ipsum dolor sit amet adip elitions repellat tetur delni vel quam aliq earum explibo dolor eme
                    fugiat enim illumon amet sit.
                </p>
                <div class="client-info-wrap">
                    <div class="client-img">
                        <img src="{{ asset('thuenhahaiphong/assets/img/clients/client-3.jpg')}}" alt="Image">
                    </div>
                    <div class="client-info">
                        <h5>Đoàn Khắc Kỷ</h5>
                        <span>CEO, DC 3 độ</span>
                    </div>
                    <div class="ratings">
                        <i class="flaticon-star"></i>
                        5
                    </div>
                </div>
            </div>
            <div class="testimonial-card style2">
                <h6>Rất tốt, tôi sẽ giới thiệu cho bạn bè của mình</h6>
                <p class="client-quote">
                    Lorem ipsum dolor sit amet adip elitions repellat tetur delni vel quam aliq earum explibo dolor eme
                    fugiat enim illumon amet sit.
                </p>
                <div class="client-info-wrap">
                    <div class="client-img">
                        <img src="{{ asset('thuenhahaiphong/assets/img/clients/client-1.jpg')}}" alt="Image">
                    </div>
                    <div class="client-info">
                        <h5>Nguyễn Mạnh Hùng</h5>
                        <span>Kinh doanh online</span>
                    </div>
                    <div class="ratings">
                        <i class="flaticon-star"></i>
                        4.8
                    </div>
                </div>
            </div>
            <div class="testimonial-card style2">
                <h6>Cảm ơn! tôi đã tìm được địa điểm kinh doanh đầu tiên của mình!</h6>
                <p class="client-quote">
                    Lorem ipsum dolor sit amet adip elitions repellat tetur delni vel quam aliq earum explibo dolor eme
                    fugiat enim illumon amet sit.
                </p>
                <div class="client-info-wrap">
                    <div class="client-img">
                        <img src="{{ asset('thuenhahaiphong/assets/img/clients/client-4.jpg')}}" alt="Image">
                    </div>
                    <div class="client-info">
                        <h5>Nguyễn Mỹ Hạnh</h5>
                        <span>Kinh doanh bánh ngọt</span>
                    </div>
                    <div class="ratings">
                        <i class="flaticon-star"></i>
                        5
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
<section class="faq-wrap style2 ptb-100 bg-seashell">
    <div class="container">
        <div class="row gx-5 align-items-center">
            <div class="col-lg-6" data-aos="fade-right" data-aos-duration="1200" data-aos-delay="200">
                <div class="faq-img-wrap">
                    <img src="{{ asset('thuenhahaiphong/assets/img/faq-img-2.png')}}" alt="Question?">
                </div>
            </div>
            <div class="col-lg-6" data-aos="fade-left" data-aos-duration="1200" data-aos-delay="200">
                <div class="faq-content">
                    <div class="content-title style1">
                        <span>Thắc mắc của bạn</span>
                        <h2>Câu hỏi thường gặp</h2>
                    </div>
                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    <span>
                                        <i class="flaticon-plus plus"></i>
                                        <i class="flaticon-minus-sign minus"></i>
                                    </span>
                                    What Is The Price range Of Your Properties?
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <div class="single-product-text">
                                        <p>Lorem ipsum dolor sit amet consec tetur adipisicing elit. Quisquam sit
                                            laborum est aliquam. Dicta fuga soluta eius exercitationem porro modi.
                                            Exercitationem eveniet aliquam repudiandae non, sequi mollitia at iusto</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    <span>
                                        <i class="flaticon-plus plus"></i>
                                        <i class="flaticon-minus-sign minus"></i>
                                    </span>
                                    How Long Will It take To Process My Application?
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse " aria-labelledby="headingTwo"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <p>Lorem ipsum dolor sit amet consec tetur adipisicing elit. Quisquam sit laborum
                                        est aliquam. Dicta fuga soluta eius exercitationem porro modi. Exercitationem
                                        eveniet aliquam repudiandae non, sequi mollitia at iusto</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    <span>
                                        <i class="flaticon-plus plus"></i>
                                        <i class="flaticon-minus-sign minus"></i>
                                    </span>
                                    What If I Need To Move Out Before My Lease Exercise?
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <p>Lorem ipsum dolor sit amet consec tetur adipisicing elit. Quisquam sit laborum
                                        est aliquam. Dicta fuga soluta eius exercitationem porro modi. Exercitationem
                                        eveniet aliquam repudiandae non, sequi mollitia at iusto</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingfour">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapsefour" aria-expanded="true" aria-controls="collapsefour">
                                    <span>
                                        <i class="flaticon-plus plus"></i>
                                        <i class="flaticon-minus-sign minus"></i>
                                    </span>
                                    What Our IT Consultants Suggest On New Topics?
                                </button>
                            </h2>
                            <div id="collapsefour" class="accordion-collapse collapse " aria-labelledby="headingfour"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <div class="single-product-text">
                                        <p>Lorem ipsum dolor sit amet consec tetur adipisicing elit. Quisquam sit
                                            laborum est aliquam. Dicta fuga soluta eius exercitationem porro modi.
                                            Exercitationem eveniet aliquam repudiandae non, sequi mollitia at iusto</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="news" class="pt-50 pb-30">
    <div class="container">
        <div class="row">
            <div class="section-title style1 text-center mb-40">
                <span>Tin tức, cẩm nang kinh nghiệm</span>
                <h2>Tin tức mới nhất</h2>
            </div>
            <div class="row justify-content-center">
                @foreach ($posts as $post)
                <div class="col-xl-4 col-lg-6 col-md-6">
                    <div class="blog-card style1">
                        <div class="blog-img">
                            <img src="{{ asset($post->images->first()->url) }}" alt="{{$post->title}}">
                        </div>
                        <div class="blog-info">
                            <ul class="blog-metainfo  list-style">
                                <li><i class="flaticon-calendar"></i><a
                                        href="#">{{date('d/m/Y',strtotime($post->updated_at))}}</a></li>
                                <li><i
                                        class="flaticon-chat-comment-oval-speech-bubble-with-text-lines"></i>{{$post->viewed}}
                                    lượt xem</li>
                            </ul>
                            <h3><a href="{{ route('post.detail', ['alias' => $post->slug]) }}">{{ $post->title }}</a>
                            </h3>
                            <a href="{{ route('post.detail', ['alias' => $post->slug]) }}" class="link style2">Xem thêm
                                <i class="flaticon-right-arrow-1"></i>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

<section class="newsletter-wrap ptb-100">
    <img src="{{ asset('thuenhahaiphong/assets/img/newsletter-shape-1.png')}}" alt="Đăng ký tư vấn" class="newsletter-shape-one">
    <div class="container">
        <div class="row">
            <div class="col-xl-6 offset-xl-3 col-lg-8 offset-lg-2">
                <div class="section-title style2 text-center mb-40">
                    <h2>Đăng ký để nhận tư vấn trực tiếp</h2>
                    <p>Nhận liên hệ trực tiếp từ chuyên gia</p>
                </div>
            </div>
        </div>
        <form class="newsletter-form" data-toggle="validator" method="POST">
            <div class="form-group">
                <input type="text" placeholder="Tên của bạn">
            </div>
            <div class="form-group">
                <input type="phone" class="form-control" placeholder="Nhập số điện thoại của bạn" name="EMAIL" required
                    autocomplete="off">
            </div>
            <div class="form-group">
                <button class="btn style2" type="submit">
                    Đăng ký tư vấn
                </button>
            </div>
        </form>
    </div>
</section>
@endsection