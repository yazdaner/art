@extends('Dashboard::master')
@section('breadcrumb')
<li><a href="{{route('admin.courses.index')}}" title="دوره ها">دوره ها</a></li>
<li><a href="#" title="ویرایش">ویرایش</a></li>
@endsection
@section('content')
<div class="main-content users">
    <div class="row no-gutters bg-white">
        <div class="col-12 p-0">
            <p class="box__title">ویرایش دوره</p>
            <form action="{{route('admin.courses.update',$course->id)}}" method="post" class="padding-30"
                enctype="multipart/form-data">
                @method('put')
                @csrf

                <x-input name="title" type="text" placeholder="عنوان" value="{{ $course->title }}" />
                <x-input name="slug" type="text" placeholder="عنوان انگلیسی" value="{{ $course->slug }}" />
                <x-input name="spot_course_token" type="text" placeholder="شناسه اسپات دوره"
                    value="{{ $course->spot_course_token }}" />

                <x-input name="price" type="number" placeholder="قیمت" value="{{ $course->price }}" />
                <x-input name="price2" type="number" placeholder="قیمت ویژه" value="{{ $course->price2 }}" />
                <x-input name="time" type="number" placeholder="مدت کل دوره (دقیقه)" value="{{ $course->time }}" />
                <x-input name="priority" type="text" placeholder="الویت نمایش دوره" value="{{ $course->priority }}" />

                <x-select name="status" placeholder="وضعیت دوره">
                    @foreach ($statuses as $status)
                    <option value="{{$status}}" @if ($course->status == $status) selected @endif>@lang($status)</option>
                    @endforeach
                </x-select>

                <x-file-upload name="media" placeholder="تصویر دوره" :value="$course->media" />
                <x-video-upload name="video" placeholder="ویدیو دمو دوره" :value="$course->video"/>

                <div class="col-12">
                    <x-text-area name="description" placeholder="توضیحات" value="{{ $course->description }}" />
                </div>

                <div class="col-12">
                    <x-text-area name="body" placeholder="محتوا" value="{{ $course->body }}" />
                </div>

                <button type="submit" class="btn btn-yazdan">ویرایش</button>

            </form>
        </div>
    </div>
</div>
@endsection
@include('Common::views.admin.ckeditor',['names' => ['body']])
