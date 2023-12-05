@extends('Front::master')
@section('content')
<section class="section">
    <div class="container">
        <div class="col-md-6 mt-4 mx-auto mt-sm-0 pt-2 pt-sm-0">
            <div class="rounded shadow-lg p-4 sticky-bar">
                <div class="mb-4">
                    <h5>پیش فاکتور خرید :</h5>
                    <div class="text-center">
                        <img width="200" src="{{$course->getImage(300)}}">
                        <h6 class="mt-3">{{$course->title}}</h6>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-center table-padding mb-0">
                        <tbody>
                            <tr>
                                <td class="h6 border-0">مجموع </td>
                                <td class="text-end fw-bold border-0">{{ number_format( $course->price ) }} تومان</td>
                            </tr>
                            @php
                            $discountPrice = $course->price - $course->getPrice();
                            @endphp
                            @if ($discountPrice != 0)
                            <tr>
                                <td class="h6 border-0">مبلغ تخفیف کالا ها</td>
                                <td class="text-end fw-bold border-0">
                                    <span style="color: red">
                                        {{ number_format( $discountPrice ) }}
                                        تومان
                                    </span>
                                </td>
                            </tr>
                            @endif
                            @if (\Session::has('discountAmount'))
                            <tr>
                                <td class="h6 border-0">مبلغ کد تخفیف کالا ها</td>
                                <td class="text-end fw-bold border-0">
                                    <span style="color: red">
                                        {{ number_format( $course->getPrice() - \Session::get('discountAmount')) }}
                                        تومان
                                    </span>
                                </td>
                            </tr>
                            @endif
                            <tr class="bg-light">
                                <td class="h5 fw-bold">مبلغ قابل پرداخت </td>
                                <td class="text-end text-primary h4 fw-bold">{{number_format(\Session::get('discountAmount') ?? $course->getPrice())}}
                                    تومان</td>
                            </tr>
                        </tbody>
                    </table>

                    <div class="input-group my-4 shopping-coupon-code w-75">
                        <input type="text" class="form-control" placeholder="کد تخفیف" name="coupon-code"
                            id="coupon-code">
                        <button class="btn btn-primary" onclick="checkDiscountCode(event)">اعمال کد</button>
                        <x-validation-error field="code" />
                    </div>

                    <ul class="list-unstyled mt-4 mb-0">
                        <li>
                            <div class="custom-control custom-radio custom-control-inline">
                                <div class="form-check mb-0">
                                    <input class="form-check-input" checked type="radio" name="flexRadioDefault"
                                        id="banktransfer">
                                    <label class="form-check-label" for="banktransfer">پرداخت زرین پال</label>
                                </div>
                            </div>
                        </li>
                    </ul>


                    <div class="mt-4 pt-2">
                        <div class="d-grid">
                            <a href="{{route('digital.buy',$course->slug)}}" class="btn btn-primary">خرید</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <form action="{{route('discounts.digitalCodeCheck',$course->slug)}}" id="form-check" method="post">
        @csrf
        <input type="hidden" name="code" id="codeInput">
    </form>
</section>
@endsection
@section('script')
<script>
    function checkDiscountCode(event)
        {
            event.preventDefault();
            let code = $("#coupon-code").val();
            $("#codeInput").val(code);
            $("#form-check").submit();
        }
</script>
@endsection
