<section class="section recent-part">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-heading">
                    <h2>Sản phẩm mới nhất</h2>
                </div>
            </div>
        </div>
        <div class="row row-cols-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5">
            @include('partials.products')
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="section-btn-25"><a href="{{route('product.list')}}" class="btn btn-outline"><i class="fas fa-eye"></i><span>Tất cả</span></a></div>
            </div>
        </div>
    </div>
</section>