<form action="{{route('users.updatePhoto')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="profile__info border cursor-pointer text-center">
        <div class="avatar__img">

            <img src="{{auth()->user()->getAvatar()}}" class="avatar___img">


            <input name="image" onchange="this.form.submit()" type="file" accept="image/*" class="hidden avatar-img__input">
            <div class="v-dialog__container" style="display: block;"></div>
            <div class="box__camera default__avatar"></div>
        </div>
        <span class="profile__name">کاربر : {{auth()->user()->username}}</span>
    </div>
</form>
