@extends('layouts.app')
@section('meta')
@if(isset($catalogue))
<title>{{$catalogue->name}} - {{env('APP_NAME')}}</title>
<meta name="keywords" content="{{$catalogue->tags->pluck('name')->join(', ')}}" />
<meta name="description" content="{{$catalogue->description}}" />
<meta property="og:image" content="{{$catalogue->image->url??''}}">
<meta property="og:type" content="product">
<meta property="og:title" content="{{$catalogue->name}}">
<meta property="og:description" content="{{$catalogue->description}}">
@else
<title>Sản phẩm - {{env('APP_NAME')}}</title>
<meta name="keywords" content="{{env('APP_NAME')}}" />
<meta name="description" content="{{env('APP_NAME')}}" />
<meta property="og:image" content="{{env('APP_LOGO')}}">
<meta property="og:type" content="website">
<meta property="og:title" content="{{env('APP_NAME')}}">
<meta property="og:description" content="{{env('APP_NAME')}}">
@endif
@stop
@section('styles')

@endsection
@section('content')
<div class="content-wrapper">

    <div class="breadcrumb-wrap bg-f br-1">
        <div class="container">
            <div class="breadcrumb-title">
                <h1 class="text-white">{{ $catalogue->name }}</h1>
                <ul class="breadcrumb-menu list-style">
                    <li><a href="{{route('index')}}">Trang chủ </a></li>
                    <li>{{ $catalogue->name }}</li>
                </ul>
            </div>
        </div>
    </div>


    <section class="listing-wrap ptb-100">
        <div class="container">
            <div class="row gx-5">
                <div class="col-xl-8">
                    <div class="row align-items-center mb-25">
                        <div class="col-md-8">
                            <div class="profuct-result">
                               <!-- <p> Results Found</p> -->
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="filter-item-cat">
                                <select>
                                    <option value="1">Mặt bằng mới nhất</option>
                                    <option value="2">Giá từ cao đến thấp</option>
                                    <option value="3">Giá từ thấp đến cao</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                    @foreach ($products as $product)
                    <div class="col-xl-6 col-lg-6 col-md-6">
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
                    {{$products->links()}}
                </div>
                <div class="col-xl-4">
                    <div class="sidebar">
                        <div class="sidebar-widget">
                            <h4>Tìm kiếm mặt bằng</h4>
                            <form action="#" class="filter-widget">
                                <div class="form-group">
                                    <label for="price-range">Khoảng giá</label>
                                    <div id="slider-range" class="price-range mar-bot-20"></div>
                                    <input type="text" id="amount_one">
                                </div>
                                <div class="form-group">
                                    <input type="text" placeholder="Từ khóa">
                                </div>
                                <div class="form-group">
                                    <select name="category" id="category">
                                        <option data-show="Lọc theo danh mục" value="0">Lọc theo danh mục</option>
                                        <option value="1">Cho thuê nhà phố</option>
                                        <option value="2">Cho thuê văn phòng</option>
                                        <option value="3">Căn hộ - nhà riêng</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <select name="region" id="region">
                                        <option data-show="Filter By Region" value="0">Lọc theo quận/huyện</option>
                                        <option value="1">Apartment</option>
                                        <option value="2">Villa</option>
                                        <option value="3">Condo</option>
                                    </select>
                                </div>
                               
                                <div class="form-group">
                                    <select name="price_range" id="price_range">
                                        <option data-show="Price Range" value="0">Lọc theo diện tích sử dụng</option>
                                        <option value="1">0 - 100m2</option>
                                        <option value="2">100 - 200m2</option>
                                        <option value="3">200 - 500m2</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <button class="btn style2 d-block w-100">Tìm kiếm</button>
                                </div>
                            </form>
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
function sort(order) {
    $('#header-search').find('[name=sort]').remove()
    $('#header-search').append(`<input name="sort" type="hidden" value="${order}"/>`)
    $('#header-search').trigger('submit')
}
$(function() {
    console.log('Product list ready')
})
</script>
<script>
"use strict";
$(document).ready(function() {
    var $range_cost = $("#range_cost");
    $range_cost.ionRangeSlider({
        type: "double",
        grid: true,
        min: 0,
        max: 20000,
        from: 100,
        to: 10000,
        prefix: "$",
    });
    $range_cost.on("change", function() {
        var $this = $(this),
            value = $this.prop("value").split(";");

        $('#range_cost_ttl').html("$" + value[0] + " - $" + value[1]);
    });
});
</script>
@endsection