<?php
namespace Yazdan\About\Repositories;

use Yazdan\About\App\Models\About;
use Yazdan\Media\Services\MediaFileService;

class AboutRepository
{

    public static function findById($id)
    {
        return About::find($id);
    }

    static $defaultAbout = [
        'body' => 'about us',
    ];

    public static function update($id, $request)
    {
        $setting = static::findById($id);


        $data = [
            'description1' => $request['description1'],
            'description2' => $request['description2'],
            'description3' => $request['description3'],
            'body' => $request['body'],
        ];

        if(isset($request['banner1'])){
            $images = MediaFileService::publicUpload($request['banner1']);
            if ($images == false) {
                newFeedbacks('نا موفق', 'فرمت فایل نامعتبر میباشد', 'error');
                return back();
            }
            $data['banner1'] = $images->id;

        }

        if(isset($request['banner2'])){
            $images = MediaFileService::publicUpload($request['banner2']);
            if ($images == false) {
                newFeedbacks('نا موفق', 'فرمت فایل نامعتبر میباشد', 'error');
                return back();
            }
            $data['banner2'] = $images->id;
        }

        if(isset($request['banner3'])){
            $images = MediaFileService::publicUpload($request['banner3']);
            if ($images == false) {
                newFeedbacks('نا موفق', 'فرمت فایل نامعتبر میباشد', 'error');
                return back();
            }
            $data['banner3'] = $images->id;

        }
        $setting->update($data);
    }
}
