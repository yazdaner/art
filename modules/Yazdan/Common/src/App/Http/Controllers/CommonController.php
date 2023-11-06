<?php

namespace Yazdan\Common\App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yazdan\Common\App\Models\Common;
use Yazdan\Media\Services\MediaFileService;

class CommonController extends Controller
{
    public function postImagesUpload(Request $request)
    {
        $file = $request->file('upload');
        $base_name = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        $ext = $file->getClientOriginalExtension();
        $file_name = $base_name . '_' . time() . '.' . $ext;
        $file->storeAs('images/posts', $file_name, 'public_files');
        $funcNum = $request->CKEditorFuncNum;
        $fileUrl = asset('images/posts/' . $file_name);
        return response("<script>window.parent.CKEDITOR.tools.callFunction( {$funcNum}, '{$fileUrl}' ,'فایل به درستی آپلود شد' );</script>");
    }

}
