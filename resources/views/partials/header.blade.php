<header class="header-wrap style1">
            <div class="container">
                <nav class="navbar navbar-expand-md navbar-light">
                    <a class="navbar-brand" href="{{ route('index') }}">
                        <img class="logo-light" style="max-height: 82px;" src="{{  $shared_config['logo']->value }}" alt="logo">
                    </a>
                    <div class="collapse navbar-collapse main-menu-wrap" id="navbarSupportedContent">
                        <div class="menu-close d-lg-none">
                            <a href="javascript:void(0)"> <i class="ri-close-line"></i></a>
                        </div>
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item">
                                <a href="{{ route('index') }}" class="nav-link active">
                                    Trang chủ
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    Giới thiệu
                                </a>
                            </li>
                                    <li class="nav-item">
                                        <a href="{{route('product.catalogue', ['alias'=>'cho-thue-nha-pho'])}}" class="nav-link">Cho thuê nhà phố
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{route('product.catalogue', ['alias'=>'cho-thue-van-phong'])}}" class="nav-link">Cho thuê văn phòng
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{route('product.catalogue', ['alias'=>'cho-thue-can-ho-nha-rieng'])}}" class="nav-link">Căn hộ - nhà riêng</a>
                                    </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    Tin tức
                                </a>
                           
                            </li>
                       
                        </ul>
                        <div class="others-options  md-none">
                            <div class="header-btn">
                                <button type="button" class="btn style3" data-bs-toggle="modal"
                                    data-bs-target="#signIn">Báo giá</button>
                                <button type="button" class="btn style1" data-bs-toggle="modal"
                                    data-bs-target="#signUp">Liên hệ</button>
                            </div>
                        </div>
                    </div>
                </nav>
                <div class="mobile-bar-wrap">
                    <div class="mobile-menu d-lg-none">
                        <a href="javascript:void(0)"><i class="ri-menu-line"></i></a>
                    </div>
                </div>
            </div>
        </header>