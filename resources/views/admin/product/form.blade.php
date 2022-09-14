@extends('layouts.admin')
@section('content')
@if (isset($record))
<form method="POST" action="{{route('admin.product.update',$record->id)}}">
    @method('PUT')
@else
<form method="POST" action="{{route('admin.product.store')}}">
@endif
    @csrf
    <div class="content">
        <div class="d-flex align-items-start flex-column flex-md-row">
            <div class="w-100 overflow-auto order-2 order-md-1">
				<div class="card">
					<div class="card-body">
                        <div class="form-group">
                            <label class="font-weight-semibold">Tên sản phẩm <span class="required"></span></label>
                            <input type="text" class="form-control maxlength" maxlength="255" required id="title" name="title" value="{{ old('title') ?: ($record->title ?? '') }}">
                            <span class="text-muted">Most optimal 10 - 70 characters.</span>
                            @error('title')
                            <label id="title-error" class="validation-invalid-label" for="title">{{$message}}</label>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-semibold">Mô tả</label>
                            <textarea class="form-control maxlength" maxlength="1500" name="description">{{ old('description') ?: ($record->description ?? '') }}</textarea>
                            <span class="text-muted">Most optimal 160 - 300 characters.</span>
                        </div>

                        <div class="form-group">
                            <label class="font-weight-semibold">Ảnh sản phẩm <span class="required"></span></label>
                            <input type="file" class="form-control-file" multiple data-key="images" data-fouc>
                            @if(old('images'))
                            <input type="hidden" name="images" value="{{old('images')}}" id="images">
                            <div class="mt-2 d-flex image-container" id="images_preview">
                                @foreach(old('images') as $image)
                                <div class="image-box">
                                    <div class="remove-image">
                                        <img src="/global_assets/images/icon/ic_delete_pink.svg" height="18" class="ic-delete" data-key="images">
                                    </div>
                                    <img height="100" class="mr-2" src="{{$image}}"/>
                                </div>
                                @endforeach
                            </div>
                            @elseif (isset($record) && $record->images)
                            <input type="hidden" name="images" value="{{$record->images->pluck('url')->join(',')}}" id="images">
                            <div class="mt-2 d-flex image-container" id="images_preview">
                                @foreach($record->images as $image)
                                <div class="image-box">
                                    <div class="remove-image">
                                        <img src="/global_assets/images/icon/ic_delete_pink.svg" height="18" class="ic-delete" data-key="images">
                                    </div>
                                    <img height="100" class="mr-2" src="{{$image->url}}"/>
                                </div>
                                @endforeach
                            </div>
                            @else
                            <input type="hidden" name="images" value="" id="images">
                            <div class="mt-2 d-flex image-container" id="images_preview" style="display:none;">
                            </div>
                            @endif
                            @error('images')
                            <label id="image-error" class="validation-invalid-label" for="images">{{$message}}</label>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-semibold">Từ khóa</label>
                            @if(old('tags'))
                            <input type="text" class="form-control tokenfield" value="{{old('tags')}}" name="tags" data-fouc>
                            @elseif(isset($record) && $record->tags)
                            <input type="text" class="form-control tokenfield" value="{{$record->tags->pluck('name')->join(', ')}}" name="tags" data-fouc>
                            @else
                            <input type="text" class="form-control tokenfield" value="" name="tags" data-fouc>
                            @endif
                        </div>

                        <div class="form-group">
                            <label class="font-weight-semibold">Nội dung bài viết <span class="required"></span></label>
                            <textarea class="ckeditor form-control" id="content" name="content" required>{{ old('content') ?: ($record->content ?? '') }}</textarea>
                            @error('content')
                            <label id="content-error" class="validation-invalid-label" for="content">{{$message}}</label>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="font-weight-semibold">Thuộc tính </label>
                            <div>
                                @include('admin.shared.select-attribute',['record'=>isset($record)?$record:null,'selected' => (isset($record) ? $record->attributes->pluck('id')->all() : null)])
                            </div>
                        </div>

                        <div class="text-right">
                            <button type="submit" class="btn btn-primary">Lưu <i class="icon-paperplane ml-2"></i></button>
                        </div>
                    </div>
				</div>
            </div>
            <div class="sidebar sidebar-light bg-transparent sidebar-component sidebar-component-right wmin-300 border-0 shadow-0 order-1 order-md-2 sidebar-expand-md">
                <div class="sidebar-content">
                    <div class="card">
                        <div class="card-body text-center">
                            <div class="form-check form-check-inline disabled">
                                <label class="form-check-label">
                                    <input type="radio" class="form-input-styled" {{isset($record) && $record->status == 1 ? 'checked' : ''}} name="status" value="1" checked data-fouc>
                                    Đăng
                                </label>
                            </div>

                            <div class="form-check form-check-inline disabled">
                                <label class="form-check-label">
                                    <input type="radio" class="form-input-styled" {{isset($record) && $record->status == 0 ? 'checked' : ''}} name="status" value="0" data-fouc>
                                    Ẩn
                                </label>
                            </div>	
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label class="font-weight-semibold">Giá</label>
                                @if(old('price'))
                                <input type="text" class="form-control" value="{{old('price')}}" name="price">
                                @elseif(isset($record) && $record->price)
                                <input type="text" class="form-control" value="{{$record->price}}" name="price">
                                @else
                                <input type="text" class="form-control" value="" name="price">
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body" id="select_category">
                            @include('admin.shared.select-category',['selected' => (isset($record) ? $record->catalogues->pluck('id')->all() : null)])
                            <button class="add-category btn btn-sm mt-2 btn-success" type="button">
                                <i class="icon-plus-circle2"></i>
                                Tạo danh mục
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection