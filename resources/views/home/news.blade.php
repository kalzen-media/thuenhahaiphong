

 <!-- News Section Start -->
 <section class="pdt-110 pdb-80">
        <div class="section-title mrb-30 mrb-md-60">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-xl-6">
                        <h5 class="mrb-15 text-primary-color side-line-left">News And Updates</h5>
                        <h2 class="mrb-30">Tin tức và Sự kiện</h2>
                    </div>
                    <div class="col-lg-4 col-xl-6 align-self-center text-left text-lg-right">
                        <a href="#" class="cs-btn-one btn-primary-color btn-md">Xem tất cả</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="section-content">
            <div class="container">
                <div class="row justify-content-center">
                @foreach($posts as $post)
                    <div class="col-md-12 col-lg-6 col-xl-4">
                        <div class="news-wrapper mrb-30">
                            <div class="news-thumb">
                                <img src="{{$post->images->first()->url??''}}" class="img-full" alt="blog">
                                <div class="news-date">
                                    <div class="entry-date">{{date('d',strtotime($post->updated_at))}} <br> <span>{{date('m',strtotime($post->updated_at))}}</span></div>
                                </div>
                            </div>
                            <div class="news-description">
                                <h4 class="the-title"><a href="{{ route('post.detail',['alias' => $post->slug])}}">{{$post->title}}</a></h4>
                            </div>
                            <div class="news-bottom-part">
                                <div class="post-author">
                                    <div class="author-img">
                                        <a href="#">
                                            <img src="{{ asset('frontend/images/testimonials/testimonial-img3.jpg')}}" class="rounded-circle" alt="#">
                                        </a>
                                    </div>
                                    <span><a href="#" class="text-primary-color">{{$post->user->name??''}}</a></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- News Section End -->
   