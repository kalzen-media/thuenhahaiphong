@extends('layouts.master')
@section('meta')
<title>Liên hệ - {{env('APP_NAME')}}</title>
<meta name="keywords" content="{{env('APP_NAME')}}" />
<meta name="description" content="{{env('APP_NAME')}}" />
<meta property="og:image" content="{{env('APP_LOGO')}}">
<meta property="og:type" content="website">
<meta property="og:title" content="{{env('APP_NAME')}}">
<meta property="og:description" content="{{env('APP_NAME')}}">
@stop
@section('content')
<div class="content-wrap ">
    <div class="pt-190 pb-130 bg-contact" style="background-image: url({{ asset('hocvienielts/bg-contact.jpg') }})">
        <!-- Shape-->
        <div class="container">
            <h1 class="m-0 text-center mb-100" data-show="startbox">{{  $shared_config['contact_title']->value }}</h1>
            <div class="row gy-30">
                <div class="col-12 col-lg-4">
                    <!-- Item-->
                    <div class="bg-white rounded-4 shadow py-40 px-30" data-show="startbox">
                        <div class="d-flex">
                            <div class="flex-shrink-0"><svg class="text-accent-1" xmlns="http://www.w3.org/2000/svg"
                                    width="16" height="16" fill="none">
                                    <path fill="currentColor"
                                        d="M16 11.98v2.408a1.604 1.604 0 0 1-1.094 1.527 1.613 1.613 0 0 1-.66.079 15.941 15.941 0 0 1-6.943-2.465A15.672 15.672 0 0 1 2.476 8.71a15.869 15.869 0 0 1-2.47-6.96A1.603 1.603 0 0 1 .96.136C1.163.047 1.384 0 1.607 0h2.414A1.61 1.61 0 0 1 5.63 1.381c.102.77.29 1.528.563 2.256a1.603 1.603 0 0 1-.362 1.694l-1.022 1.02a12.86 12.86 0 0 0 4.827 4.817l1.022-1.02a1.61 1.61 0 0 1 1.697-.36c.73.271 1.489.46 2.26.561A1.61 1.61 0 0 1 16 11.98Z" />
                                </svg></div>
                            <div class="flex-grow-1 ms-15">
                                <h5 class="m-0">Thông tin liên hệ:</h5>
                                <p class="m-0 mt-15">Hotline: {{  $shared_config['hotline']->value }}<br>Email: {{  $shared_config['email']->value }} </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-4">
                    <!-- Item-->
                    <div class="bg-white rounded-4 shadow py-40 px-30" data-show="startbox" data-show-delay="100">
                        <div class="d-flex">
                            <div class="flex-shrink-0"><svg class="text-accent-1" xmlns="http://www.w3.org/2000/svg"
                                    width="15" height="17" fill="none">
                                    <path fill="currentColor" fill-rule="evenodd"
                                        d="M7.5 17S15 12.364 15 6.955c0-1.845-.79-3.614-2.197-4.918C11.397.733 9.49 0 7.5 0 5.51 0 3.603.733 2.197 2.037.79 3.34 0 5.11 0 6.955 0 12.364 7.5 17 7.5 17ZM10 7.286c0 1.341-1.12 2.428-2.5 2.428S5 8.627 5 7.286c0-1.342 1.12-2.429 2.5-2.429S10 5.944 10 7.286Z"
                                        clip-rule="evenodd" />
                                </svg></div>
                            <div class="flex-grow-1 ms-15">
                                <h5 class="m-0">Địa chỉ:</h5>
                                <p class="m-0 mt-15"><b>Cơ sở 1:</b> 124 Tô Hiệu, P. Trại Cau, Q. Lê Chân, TP. Hải Phòng </br><b>Cơ sở 2:</b> Số 14, Ngõ 10, Nguyễn Văn Huyên, Q. Cầu Giấy, TP. Hà Nội</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-4">
                    <!-- Item-->
                    <div class="bg-white rounded-4 shadow py-40 px-30" data-show="startbox" data-show-delay="200">
                        <div class="d-flex">
                            <div class="flex-shrink-0"><svg class="text-accent-1" xmlns="http://www.w3.org/2000/svg"
                                    width="16" height="16" fill="none">
                                    <path fill="currentColor" fill-rule="evenodd"
                                        d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0ZM8.7 3.379a1 1 0 1 0-2 0v4.8a1 1 0 0 0 .553.894l3.2 1.6a1 1 0 1 0 .894-1.789L8.7 7.561V3.379Z"
                                        clip-rule="evenodd" />
                                </svg></div>
                            <div class="flex-grow-1 ms-15">
                                <h5 class="m-0">Thời gian hoạt động:</h5>
                                <p class="m-0 mt-15">Thứ 2 - Chủ nhật <br>8h00 - 21h30</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="map">
                <iframe style="width: 100%; height: 450px" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14914.022574530882!2d106.681954!3d20.85166!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x2038a9e5eb0dd1c9!2sTHE%20IELTS%20ACADEMY!5e0!3m2!1svi!2s!4v1657160473725!5m2!1svi!2s"  style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</div>
            </div>
        </div>
    </div>
</div><!-- Footer-->

@endsection
@section('scripts')
<script>
$(function() {
    console.log('Contact ready')
})
</script>

@endsection