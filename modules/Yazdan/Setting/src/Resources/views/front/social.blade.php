@if ($setting->facebook)
<li class="list-inline-item"><a href="{{$setting->facebook}}" class="rounded"><i data-feather="facebook"
            class="fea icon-sm fea-social"></i></a></li>
@endif

@if ($setting->instagram)
<li class="list-inline-item"><a href="{{$setting->instagram}}" class="rounded"><i data-feather="instagram"
            class="fea icon-sm fea-social"></i></a></li>
@endif

@if ($setting->twitter)
<li class="list-inline-item"><a href="{{$setting->twitter}}" class="rounded"><i data-feather="twitter"
            class="fea icon-sm fea-social"></i></a></li>
@endif

@if ($setting->linkedin)
<li class="list-inline-item"><a href="{{$setting->linkedin}}" class="rounded"><i data-feather="linkedin"
            class="fea icon-sm fea-social"></i></a></li>
@endif

@if ($setting->youtube)
<li class="list-inline-item"><a href="{{$setting->youtube}}" class="rounded"><i data-feather="youtube"
            class="fea icon-sm fea-social"></i></a></li>
@endif

@if ($setting->whatsapp)
<li class="list-inline-item"><a href="{{$setting->whatsapp}}" class="rounded p-top-2"><i class="bi bi-whatsapp"></i></a>
</li>
@endif

@if ($setting->telegram)
<li class="list-inline-item"><a href="{{$setting->telegram}}" class="rounded p-top-2"><i class="bi bi-telegram"></i></a>
</li>
@endif
