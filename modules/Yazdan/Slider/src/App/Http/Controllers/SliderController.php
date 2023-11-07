<?php

namespace Yazdan\Slider\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Yazdan\Common\Responses\AjaxResponses;
use Yazdan\Media\Services\MediaFileService;
use Yazdan\Slider\App\Http\Requests\SliderRequest;
use Yazdan\Slider\App\Models\Slider;
use Yazdan\Slider\Repositories\SliderRepository;

class SliderController extends Controller
{
    public function index()
    {
        $this->authorize('manage', Slider::class);
        $sliders = SliderRepository::all();
        $types = SliderRepository::$types;
        return view("Slider::index", compact('sliders', 'types'));
    }

    public function store(SliderRequest $request)
    {
        $this->authorize('manage', Slider::class);

       $request = storeImage($request);
        SliderRepository::store($request);
        newFeedbacks();
        return redirect()->route('admin.sliders.index');
    }

    public function edit(Slider $slider)
    {
        $this->authorize('manage', Slider::class);
        $types = SliderRepository::$types;
        return view("Slider::edit", compact('slider', 'types'));
    }

    public function update(Slider $slider, SliderRequest $request)
    {
        $this->authorize('manage', Slider::class);

        $request = updateImage($request,$slider);

        SliderRepository::update($slider->id, $request);
        newFeedbacks();
        return redirect()->route('admin.sliders.index');
    }

    public function destroy(Slider $slider)
    {
        $this->authorize('manage', Slider::class);
        destroyImage($slider);
        $slider->delete();
        return AjaxResponses::SuccessResponses();
    }
}
