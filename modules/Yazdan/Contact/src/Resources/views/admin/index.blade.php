@extends('Dashboard::master')
@section('breadcrumb')
<li><a href="{{ route('admin.contacts.index') }}" title="پیام ها">پیام ها</a></li>
@endsection
@section('content')
<div class="main-content padding-0 categories">
    <div class="row no-gutters">
        <div class="col-12 margin-left-10 margin-bottom-15 border-radius-3">
            <p class="box__title">پیام ها</p>
            @include("Contact::admin.show")
            <div class="table__box">
                <table class="table">
                    <thead role="rowgroup">
                        <tr role="row" class="title-row">
                            <th>شناسه</th>
                            <th>نام</th>
                            <th>ایمیل</th>
                            <th>شماره تلفن</th>
                            <th>پیام</th>
                            <th>عملیات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($contacts as $contact)
                        <tr role="row" class="">
                            <td><a href="">{{ $contact->id }}</a></td>
                            <td>{{ $contact->name }}</td>
                            <td>{{ $contact->email }}</td>
                            <td>{{ $contact->mobile }}</td>
                            <td><a class="btn-show btn btn-yazdan" href="#rolesModal" rel="modal:open" onclick="showComment(event,'{{$contact->message}}')">نمایش</a></td>
                            <td>
                                <a href=""
                                    onclick="deleteItem(event, '{{ route('admin.contacts.destroy', $contact->id) }}')"
                                    class="item-delete mlg-15" title="حذف"></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@section('style')
    <link rel="stylesheet" href="{{asset('assets/css/modal.css')}}">
@endsection
@section('script')
<script src="{{asset('assets/js/modal.js')}}"></script>
<script>
    function showComment(e,comment){
        e.preventDefault();
        $("#ShowComment").text(comment)
    }
</script>
@endsection
