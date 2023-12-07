@extends('Home::master')
@section('homeContent')
<div class="col-lg-8 col-12">
    <div class="card border-0 rounded shadow">
        <div class="card-body">
            <div class="myaccount-content address-content">
                <div class="d-flex justify-content-between align-items-center">
                    <h3>لیست سفارشات نقاشی</h3>
                    <a class="btn btn-primary" href="{{route('customer.orders.create')}}">سفارش</a>
                </div>
                @include('CustomerOrder::home.response')
                <div class="mt-4">
                    <div class="table-responsive">
                        <table class="table table-center">
                            <thead>
                                <tr>
                                    <th scope="col">شماره سفارش</th>
                                    <th scope="col">تاریخ</th>
                                    <th scope="col">پاسخ</th>
                                    <th scope="col">مشاهده سفارش</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                <tr>
                                    <td>{{$order->key}}</td>
                                    <td>{{verta($order->created_at)->format('Y/m/d H:i')}}</td>
                                    <td>{{$order->response == null ? 'در انتظار پاسخ' : 'پاسخ داده شده'}}</td>
                                    <td>
                                        <button onclick="showOrder(event,'{{json_encode($order)}}','{{$order->getImage(300)}}')" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                            مشاهده
                                        </button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
    function showOrder(e,order,img){
        e.preventDefault();
        let data = JSON.parse(order);
        $("#ShowOrder .name").text(data.name);
        $("#ShowOrder .phone").text(data.phone);
        $("#ShowOrder .size").text(data.size);
        $("#ShowOrder .canvas").text(data.canvas);
        $("#ShowOrder .shape").text(data.shape);
        $("#ShowOrder .media").attr('src',img);
        $("#ShowOrder .description").text(data.description);
        $("#ShowOrder .invoicing").text(data.invoicing);
        $("#ShowOrder .response").text(data.response);
        $("#key").text(data.key);
    }
</script>
@endsection
