@extends('Dashboard::master')
@section('breadcrumb')
<li><a href="#" title="سفارشات مشتری">سفارشات مشتری</a></li>
@endsection
@section('content')
<div class="main-content padding-0 users">
    <div class="row no-gutters">
        <div class="col-12 margin-left-10 margin-bottom-15 border-radius-3">
            <p class="box__title">سفارشات مشتری</p>
            <div class="table__box">
                <table class="table">
                    <thead role="rowgroup">
                        <tr role="row" class="title-row">
                            <th>#</th>
                            <th scope="col">شماره سفارش</th>
                            <th scope="col">تاریخ</th>
                            <th scope="col">پاسخ</th>
                            <th scope="col">مشاهده سفارش</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $key => $order)
                        <tr role="row" class="">
                            <td>{{$orders->firstItem() + $key}}</td>
                            <td>{{$order->key}}</td>
                            <td>{{verta($order->created_at)->format('Y/m/d H:i')}}</td>
                            <td><a class="btn-show btn btn-yazdan" href="#sendResponseModal" rel="modal:open"
                                onclick="sendResponse({{$order->id}})"
                                >پاسخ</a></td>
                            <td><a class="btn-show btn btn-yazdan" href="#ordersModal" rel="modal:open"
                                    onclick="showOrder(event,'{{json_encode($order)}}','{{$order->getImage(300)}}','{{__($order->canvas)}}','{{__($order->shape)}}')">نمایش</a>
                            </td>

                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
            @include('CustomerOrder::admin.ordersData')
            @include('CustomerOrder::admin.sendResponse')
        </div>
    </div>
</div>
@endsection
@section('style')
<link rel="stylesheet" href="../panel/css/modal.css">
@endsection
@section('script')
<script src="../panel/js/modal.js"></script>
<script>
    function showOrder(e,order,img,canvas,shape){
        e.preventDefault();
        let data = JSON.parse(order);
        $("#ShowOrder .key").text(data.key);
        $("#ShowOrder .name").text(data.name);
        $("#ShowOrder .phone").text(data.phone);
        $("#ShowOrder .size").text(data.size);
        $("#ShowOrder .canvas").text(canvas);
        $("#ShowOrder #shape").text(shape);
        $("#ShowOrder .media").attr('src',img);
        $("#ShowOrder .description").text(data.description);
        $("#ShowOrder .invoicing").text(data.invoicing);
        $("#ShowOrder .response").text(data.response);
        $("#key").text(data.key);
    }

    function sendResponse(id){

        let form = document.getElementById('sendResponseForm');
        let action = "{{route('admin.customerOrders.sendResponse',888)}}";
        form.action = action.replace(888,id);
    }
</script>
@endsection
