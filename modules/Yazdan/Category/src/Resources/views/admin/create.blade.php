<div class="col-4 bg-white p-0">
    <p class="box__title">ایجاد دسته بندی جدید</p>
    <form action="{{route('admin.categories.store')}}" method="post" class="padding-30">
        @csrf
        <x-input name="title" type="text" placeholder="نام دسته بندی" />

        <x-input name="slug" type="text" placeholder="نام انگلیسی دسته بندی" />


        <p class="box__title margin-top-15">نوع دسته بندی</p>
        <x-validation-error field="type" />

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
                @foreach ($categories as $category)
                <option value="{{$category->id}}">{{$category->title}}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-yazdan">اضافه کردن</button>
    </form>
</div>
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
