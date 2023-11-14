@extends('Dashboard::master')
@section('breadcrumb')
<li><a href="{{route('admin.courses.index')}}" title="دوره ها">دوره ها</a></li>
<li><a href="#" title="ایجاد">ایجاد</a></li>
@endsection
@section('content')
<div class="main-content users">
    <div class="row no-gutters bg-white">
        <div class="col-12 p-0">
            <p class="box__title">ایجاد دوره</p>
            <form action="{{route('admin.courses.store')}}" method="post" class="padding-30"
                enctype="multipart/form-data">
                @csrf

                <x-input name="title" type="text" placeholder="عنوان" />
                <x-input name="slug" type="text" placeholder="عنوان انگلیسی" />
                <x-input name="spot_course_token" type="text" placeholder="شناسه اسپات دوره" />

                <x-input name="price" type="number" placeholder="قیمت" />
                <x-input name="price2" type="number" placeholder="قیمت ویژه" />
                <x-input name="time" type="number" placeholder="مدت کل دوره (دقیقه)" />
                <x-input name="priority" type="text" placeholder="الویت نمایش دوره" />

                <x-select name="status" placeholder="وضعیت دوره">
                    @foreach ($statuses as $status)
                        <option value="{{$status}}" @if (old('status') == $status) selected @endif>@lang($status)</option>
                    @endforeach
                </x-select>

                <x-file-upload name="media" placeholder="تصویر دوره" />
                <x-video-upload name="video" placeholder="ویدیو دمو دوره" />

                <div class="col-12">
                    <x-text-area name="description" placeholder="توضیحات" />
                </div>

                <div class="col-12">
                    <x-text-area name="body" placeholder="محتوا" />
                </div>

                <button type="submit" class="btn btn-yazdan">ایجاد</button>

            </form>
        </div>
    </div>
</div>
@endsection
@include('Common::views.admin.ckeditor',['names' => ['body']])
