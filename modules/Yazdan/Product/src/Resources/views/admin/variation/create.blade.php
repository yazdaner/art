<div class="col-4 bg-white p-0">
    <p class="box__title">ایجاد متغییر های محصول جدید</p>
    <form action="{{route('admin.variations.store')}}" method="post" class="padding-30">
        @csrf
        <input name="product_id" type="hidden" value="{{$product->id}}"/>
        <x-input name="title" type="text" placeholder="عنوان" />
        <x-input name="quantity" type="number" placeholder="تعداد" />
        <x-input name="price" type="number" placeholder="قیمت" />
        <x-input name="price2" type="number" placeholder="قیمت ویژه" />
        <x-input name="sku" type="text" placeholder="شناسه انبارداری" />

        <button type="submit" class="btn btn-yazdan">اضافه کردن</button>
    </form>
</div>
