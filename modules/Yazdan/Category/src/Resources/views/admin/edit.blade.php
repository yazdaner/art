@extends('Dashboard::master')
@section('breadcrumb')
    <li><a href="{{route('admin.categories.index')}}" title="دسته بندی ها">دسته بندی ها</a></li>
    <li><a href="#" title="ویرایش">ویرایش</a></li>
@endsection
@section('content')
    <div class="col-4 bg-white p-0 margin-top-30 margin-auto">
        <p class="box__title">ویرایش دسته بندی</p>
        <form action="{{route('admin.categories.update',$category->id)}}" method="post" class="padding-30">
            @csrf
            @method('put')
            <x-input value="{{$category->title}}" name="title" type="text" placeholder="نام دسته بندی" />


            <x-input value="{{$category->slug}}" name="slug" type="text" placeholder="نام انگلیسی دسته بندی" />


                <p class="box__title margin-top-15">نوع دسته بندی</p>
                <x-validation-error field="type" />
                <x-validation-error field="parent_id" />

                <div class="notificationGroup">
                    <input id="parent-field" name="type" type="radio" />
                    <label for="parent-field">پدر</label>
                </div>

                <div class="notificationGroup">
                    <input id="child-field" name="type" type="radio" />
                    <label for="child-field">فرزند</label>
                </div>

                <div class="selectTypeContainer d-none">
                    <p class="box__title margin-bottom-15">نوع دسته بندی</p>
                    <select name="type" id="parent_id">
                        <option value="">ندارد</option>
                        @foreach ($types as $name => $type)
                        <option value="{{$type}}">{{__($name)}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="selectParentContainer d-none">
                    <p class="box__title margin-bottom-15">انتخاب دسته پدر</p>
                    <select name="parent_id" id="parent_id">
                        <option value="">ندارد</option>
                        @foreach ($parentCategories as $category)
                        <option value="{{$category->id}}">{{$category->title}}</option>
                        @endforeach
                    </select>
                </div>

            <button type="submit" class="btn btn-yazdan">ویرایش</button>
        </form>
    </div>
@endsection
@section('script')
<script>
    $('#parent-field').on('click', function (e) {
        $('.selectParentContainer').addClass('d-none')
        $('.selectTypeContainer').removeClass('d-none')

    });
    $('#child-field').on('click', function (e) {
        $('.selectParentContainer').removeClass('d-none')
        $('.selectTypeContainer').addClass('d-none')
    });
</script>
@endsection
