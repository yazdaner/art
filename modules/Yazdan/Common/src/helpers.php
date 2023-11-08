<?php

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Morilog\Jalali\Jalalian;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Cookie;
use Yazdan\Common\Responses\AjaxResponses;
use Yazdan\Media\Services\MediaFileService;
use Yazdan\Comment\Repositories\CommentRepository;

function newFeedbacks($title = 'با موفقعیت', $body = 'عملیات انجام شد', $type = 'success')
{
    $session = session()->has('feedbacks') ? session()->get('feedbacks') : [];
    $session[] = ['title' => $title, 'body' => $body, 'type' => $type];
    session()->flash('feedbacks', $session);
}

function providerGetRoute($path, $controller, $method, $name)
{

    return Route::get($path, ['uses' => $controller . '@' . $method, 'as' => $name]);
}


function dateFromJalali($date, $format = 'Y/m/d')
{
    return $date ? Jalalian::fromFormat($format, $date)->toCarbon() : null;
}

function getJalaliFromFormat($date, $format = "Y/m/d")
{
    return Jalalian::fromCarbon(\Carbon\Carbon::createFromFormat($format, $date))->format($format);
}

function fromCarbon($date, $format = 'Y/m/d H:i')
{
    return Jalalian::fromCarbon($date)->format($format);
}



function storeImage($request)
{
    if (isset($request->media)) {
        $images = MediaFileService::publicUpload($request->media);
        if ($images == false) {
            newFeedbacks('نا موفق', 'فرمت فایل نامعتبر میباشد', 'error');
            return back();
        }
        $request->request->add(['media_id' => $images->id]);
    }
    return $request;
}

function destroyImage($model)
{
    if ($model->media) $model->media->delete();
}

function destroyVideo($model)
{
    if ($model->video) $model->video->delete();
}

function updateImage($request, $model)
{
    if (isset($request->media)) {
        if ($model->media) {
            $model->media->delete();
        }
        $images = MediaFileService::publicUpload($request->media);
        if ($images == false) {
            newFeedbacks('نا موفق', 'فرمت فایل نامعتبر میباشد', 'error');
            return back();
        }
        $request->request->add(['media_id' => $images->id]);
    } else {
        if ($model->media && $model->media->id) {
            $request->request->add(['media_id' => $model->media->id]);
        }
    }
    return $request;
}


function storeVideo($request)
{
    if (isset($request->video)) {
        $video = MediaFileService::publicUpload($request->video);
        if ($video == false) {
            newFeedbacks('نا موفق', 'فرمت فایل نامعتبر میباشد', 'error');
            return back();
        }
        $request->request->add(['video_id' => $video->id]);
    }
    return $request;
}

function updateVideo($request, $model)
{
    if (isset($request->video)) {
        if ($model->video) {
            $model->video->delete();
        }
        $video = MediaFileService::publicUpload($request->video);
        if ($video == false) {
            newFeedbacks('نا موفق', 'فرمت فایل نامعتبر میباشد', 'error');
            return back();
        }
        $request->request->add(['video_id' => $video->id]);
    } else {
        if ($model->video && $model->video->id) {
            $request->request->add(['video_id' => $model->video->id]);
        }
    }
    return $request;
}

function checkView($model, Request $request)
{
    $tableName  = $model->getTable();
    if (!auth()->check()) {
        $cookie_name = (Str::replace('.', '', ($request->ip())) . '-' . $model->id . '-' . $tableName);
    } else {
        $cookie_name = (auth()->id() . '-' . $model->id . '-' . $tableName);
    }
    if (Cookie::get($cookie_name) == '') {
        $cookie = cookie($cookie_name, '1', 60);
        $model->incrementReadCount();
        return $cookie;
    } else {
        return false;
    }
}
