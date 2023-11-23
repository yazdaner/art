<?php

use Yazdan\Media\Services\MediaFileService;


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


function storeImages($request)
{
    if (isset($request->images)) {
        $images = [];
        foreach ($request->images as $image) {
            $response = MediaFileService::publicUpload($image);
            if ($response == false) {
                newFeedbacks('نا موفق', 'فرمت فایل نامعتبر میباشد', 'error');
                return back();
            }
            $images[] = $response->id;
        }
        $request->request->add(['images_id' => $images]);
    }
    return $request;
}

function destroyImage($model)
{
    if ($model->media) $model->media->delete();
}

function destroyImages($model)
{
    if ($model->galleries) {
        foreach ($model->galleries as $image) {
            $image->media->delete();
        }
    }
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
