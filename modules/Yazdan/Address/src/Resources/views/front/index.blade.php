@extends('Home::master')
@section('homeContent')
<div class="col-lg-8 col-12">
    <div class="card border-0 rounded shadow">
        <div class="card-body">
            <div class="myaccount-content address-content">
                <h3> آدرس </h3>

                <div class="mt-4">
                    <form action="{{ route('address.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <x-input-home name="name" label="نام و نام خانوادگی" value="{{$address->name ?? ''}}">
                                    <i data-feather="user" class="fea icon-sm icons"></i>
                                </x-input-home>
                            </div>
                            <div class="col-md-6">
                                <x-input-home type="tel" name="phone" label="شماره تماس" value="{{$address->phone ?? ''}}">
                                    <i data-feather="user" class="fea icon-sm icons"></i>
                                </x-input-home>
                            </div>
                            <div class="col-md-12">
                                <x-textarea-home name="address" label="آدرس" value="{{$address->address ?? ''}}">
                                    <i data-feather="user" class="fea icon-sm icons"></i>
                                </x-textarea-home>
                            </div>
                            <div class="col-md-6">
                                <x-select-home name="province_id" label="استان" class="province-select">
                                    @foreach ($provinces as $province)
                                    <option {{ $address != null && $province->id == $address->province_id ? 'selected' : '' }} value="{{ $province->id }}">{{ $province->name }}</option>
                                    @endforeach
                                </x-select-home>
                            </div>
                            <div class="col-md-6">
                                <x-select-home name="city_id" label="شهر" class="city-select">
                                    @if ($address != null)
                                        <option value="{{ $address->city_id }}" selected>
                                            {{ $address->city->name }}
                                        </option>
                                    @endif
                                </x-select-home>
                            </div>
                            <div class="col-md-6">
                                <x-input-home type="number" name="postal_code" label="کد پستی" value="{{$address->postal_code ?? ''}}">
                                    <i data-feather="user" class="fea icon-sm icons"></i>
                                </x-input-home>
                            </div>
                            <div class="col-md-12">
                                <button class="btn btn-primary" type="submit"> ثبت آدرس
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
    <script>
        $('.province-select').change(function() {
            var provinceID = $(this).val();
            if (provinceID) {
                $.ajax({
                    type: "GET",
                    url: "{{ url('/get-province-cities-list') }}?province_id=" + provinceID,
                    success: function(res) {
                        if (res) {
                            $(".city-select").empty();

                            $.each(res, function(key, city) {
                                console.log(city);
                                $(".city-select").append('<option value="' + city.id + '">' +
                                    city.name + '</option>');
                            });

                        } else {
                            $(".city-select").empty();
                        }
                    }
                });
            } else {
                $(".city-select").empty();
            }
        });
    </script>
@endsection
