@extends('Dashboard::master')
@section('breadcrumb')
    <li><a href="#" title="دوره ها">دوره ها</a></li>
@endsection
@section('content')
<div class="main-content padding-0">
    <div class="row no-gutters">
        <div class="col-12 margin-left-10 margin-bottom-15 border-radius-3">
            <div class="justify-content-between box__title pb-4">
                <h3 class="btn">دوره ها</h3>
                <a class="btn btn-yazdan" href="{{route('admin.courses.create')}}">ایجاد دوره</a>
            </div>
            <div class="table__box">
                <table class="table">
                    <thead role="rowgroup">
                        <tr role="row" class="title-row">
                            <th>شناسه</th>
                            <th>بنر</th>
                            <th>عنوان</th>
                            <th>اسلاگ</th>
                            <th>عملیات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($courses as $key => $course)
                            <tr role="row" class="">
                                <td><a href="">{{$courses->firstItem() + $key}}</a></td>
                                <td>
                                    <a href="{{$course->getAvatar()}}" target="_blank"><img src="{{$course->getAvatar(60)}}" class="profile_sm"></a>
                                </td>
                                <td><a href="">{{$course->title}}</a></td>
                                <td>{{$course->slug}}</td>
                                <td>
                                    <a href="" onclick="deleteItem(event,'{{route('admin.courses.destroy',$course->id)}}')" class="item-delete mlg-15" title="حذف"></a>
                                    <a href="{{route('admin.courses.edit',$course->id)}}" class="item-edit" title="ویرایش"></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{ $courses->links('pagination.admin') }}
        </div>
    </div>
</div>
@endsection
