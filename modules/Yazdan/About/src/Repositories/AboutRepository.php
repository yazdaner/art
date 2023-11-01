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
            'frontBody' => $request['frontBody'],
        ];

        for ($i=1; $i < 6; $i++) {
            $title = 'banner'.$i;
            if(isset($request[$title])){
                $images = MediaFileService::publicUpload($request[$title]);
                if ($images == false) {
                    newFeedbacks('نا موفق', 'فرمت فایل نامعتبر میباشد', 'error');
                    return back();
                }
                $data[$title] = $images->id;
            }
        }
        $setting->update($data);
    }
}
