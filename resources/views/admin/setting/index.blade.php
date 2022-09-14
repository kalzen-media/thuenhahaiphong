@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-body">
            @include('admin.partials.message')
            <form action="{{route('admin.setting.update')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label class="font-weight-semibold">Logo </label>
                    <input type="file" class="form-control-file" data-key="image" data-fouc>
                    @if(old('image'))
                    <input type="hidden" name="image" value="{{old('image')}}" id="image">
                    <img class="mt-2" id="image_preview" height="100" src="{{old('image')}}"/>
                    @elseif (isset($config) && isset($config['logo']))
                    <input type="hidden" name="image" value="{{$config['logo']->value}}" id="image">
                    <img class="mt-2" id="image_preview" height="100" src="{{$config['logo']->value}}"/>
                    @else
                    <input type="hidden" name="image" value="" id="image">
                    <img class="mt-2" id="image_preview" style="display:none;" height="100"/>
                    @endif
                </div>

                <div class="form-group">
                    <label class="font-weight-semibold">Email </label>
                    @if(old('email'))
                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
                    @elseif(isset($config['email']))
                    <input type="email" class="form-control" id="email" name="email" value="{{ $config['email']->value }}">
                    @else
                    <input type="email" class="form-control" id="email" name="email" value="">
                    @endif
                </div>
                <div class="form-group">
                    <label class="font-weight-semibold">Địa chỉ </label>
                    @if(old('address'))
                    <input type="text" class="form-control" id="address" name="address" value="{{ old('address') }}">
                    @elseif(isset($config['address']))
                    <input type="text" class="form-control" id="address" name="address" value="{{ $config['address']->value }}">
                    @else
                    <input type="text" class="form-control" id="address" name="address" value="">
                    @endif
                </div>
                <div class="form-group">
                    <label class="font-weight-semibold">Hotline </label>
                    @if(old('hotline'))
                    <input class="form-control" id="hotline" name="hotline" value="{{ old('hotline') }}">
                    @elseif(isset($config['hotline']))
                    <input class="form-control" id="hotline" name="hotline" value="{{ $config['hotline']->value }}">
                    @else
                    <input class="form-control" id="hotline" name="hotline" value="">
                    @endif
                </div>
                <div class="form-group">
                    <label class="font-weight-semibold">Tiêu đề khối giới thiệu </label>
                    @if(old('about_title'))
                    <input class="form-control" id="about_title" name="about_title" value="{{ old('about_title') }}">
                    @elseif(isset($config['hotline']))
                    <input class="form-control" id="about_title" name="about_title" value="{{ $config['about_title']->value }}">
                    @else
                    <input class="form-control" id="about_title" name="about_title" value="">
                    @endif
                </div>
                <div class="form-group">
                    <label class="font-weight-semibold">Nội dung khối giới thiệu </label>
                    @if(old('about_content'))
                    <textarea class="ckeditor form-control" id="about_content" name="about_content"> {{ old('about_content') }}</textarea>
                    @elseif(isset($config['hotline']))
                    <textarea class="ckeditor form-control" id="about_content" name="about_content"> {{ $config['about_content']->value }}</textarea>
                    @else
                    <input class="form-control" id="about_content" name="about_content" value="">
                    @endif
                </div>
                <div class="form-group">
                    <label class="font-weight-semibold">Link ảnh khối giới thiệu</label>
                    <input type="text" class="form-control" id="about_image" name="about_image" value="{{ old('about_image')?? $config['about_image']->value }}">
                </div>
                <div class="form-group">
                    <label class="font-weight-semibold">Link video khối giới thiệu (youtube)</label>
                    <input type="text" class="form-control" id="about_video" name="about_video" value="{{ old('about_video')?? $config['about_video']->value }}">
                </div>
                <div class="form-group">
                    <label class="font-weight-semibold">Tiêu đề trang tư vấn </label>
                    <input type="text" class="form-control" id="contact_title" name="contact_title" value="{{ old('contact_title')?? $config['contact_title']->value }}">
                </div>
                <div class="form-group">
                    <label class="font-weight-semibold">Facebook </label>
                    <input type="text" class="form-control" id="facebook" name="facebook" value="{{ old('facebook')?? $config['facebook']->value }}">
                </div>
                <div class="form-group">
                    <label class="font-weight-semibold">Instagram </label>
                    <input type="text" class="form-control" id="instagram" name="instagram" value="{{ old('instagram')?? $config['instagram']->value }}">
                </div>
                <div class="form-group">
                    <label class="font-weight-semibold">Youtube </label>
                    <input type="text" class="form-control" id="youtube" name="youtube" value="{{ old('youtube')?? $config['youtube']->value }}">
                </div>
                <div class="text-right">
                    <button type="submit" class="btn btn-primary">Lưu <i class="icon-paperplane ml-2"></i></button>
                </div>
            </form>
        </div>
    </div>
<script>
    
</script>
@endsection